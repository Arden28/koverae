<div>
    <div class="modal-content">
      <div class="modal-header">
        <button class="btn btn-primary" data-dismiss="modal">Créer</button>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body position-relative overflow-y-auto">
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Adresse</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $key => $customer)
                <tr :key="$key">
                    <td wire:click="pick({{ $customer->id }})" class="cursor-pointer">
                        {{ $customer->name }}
                    </td>
                    <td>
                        {{ $customer->street }}, {{ $customer->city }}
                    </td>
                    <td>
                        {{ $customer->email }}
                    </td>
                    <td>
                        {{ $customer->phone }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
      </div>
      <div class="modal-footer justify-content-around justify-content-sm-start flex-wrap gap-1 w-100">
        <footer>
            <button class="btn btn-secondary" data-dismiss="modal">Valider</button>
        </footer>
      </div>
    </div>
</div>
