<div>
    <div class="position-relative">
        <input type="text" class="k_input cursor-text" placeholder="Tapez pour trouver votre produit"
        wire:model.live="query" />
    </div>
    <div class="position-absolute">
        <ul class="dropdown-menu show" id="customDropdown" style="display: none;">
            <li class="dropdown-item" wire:loading  wire:offline.remove>
                <div class="spinner-border" style="color: #017E84; height: 15px; width: 15px; margin-right: 5px;" role="status">
                    <span class="sr-only"></span>
                </div>
                <span>En cours de chargement</span>
            </li>
            <li class="dropdown-item" wire:offline>
                <div class="spinner-border" style="color: #017E84; height: 15px; width: 15px; margin-right: 5px;" role="status">
                    <span class="sr-only"></span>
                </div>
                <span>Vous êtes hors ligne</span>
            </li>
            @if(!empty($searchResults))
                @foreach ($searchResults as $result)
                <li class="dropdown-item cursor-pointer" wire:click.prevent="select('{{ $result }}')" wire:target="select('{{ $result }}')" wire:loading.remove>
                    {{ $result }}
                </li>
                @endforeach
            @elseif($query == '')
                @php
                    $attribute =  reset($this->searchAttributes);
                @endphp
                @foreach ($this->model::all() as $m)
                <li class="dropdown-item cursor-pointer" wire:click.prevent="select('{{ $m->$attribute }}')" wire:target="select('{{ $m->$attribute }}')" wire:loading.remove>
                    {{ $m->$attribute }}
                </li>
                @endforeach
            @elseif(empty($searchResults))
                <li class="dropdown-item cursor-pointer" wire:loading.remove>
                    Ajouter {{ $query }}
                </li>
            @endif
        </ul>
    </div>
    <!-- Loading -->
    <div class="k-loading cursor-pointer pb-1" wire:loading>
        <p>En cours de chargement ...</p>
    </div>
</div>

@script
    <script>
        // Toggle dropdown menu visibility when the input field is clicked
        document.getElementById('dynamic').addEventListener('click', function(event) {
            var dropdown = document.getElementById('customDropdown');
            dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
            event.stopPropagation(); // Prevent event propagation to avoid immediate hiding
        });

        // Hide dropdown menu when clicking outside of the input and dropdown
        document.addEventListener('click', function(event) {
            var dropdown = document.getElementById('customDropdown');
            var input = document.getElementById('dynamic'); // Ensure the correct input ID is used

            if (!dropdown.contains(event.target) && event.target !== input) {
                dropdown.style.display = 'none';
            }
        });
    </script>
@endscript
