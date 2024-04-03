<div>
    <div class="row category_section_buttons" style="margin-bottom: 10px;">
        <div class="d-flex w-100 ">
            <span wire:click="changeCategory('')" class="category_button rounded-1 flex-column align-items-center justify-content-center p-1 h-100">
                <i class="bi bi-house-fill"></i>
            </span>
            <div class="d-flex w-100 section_buttons wrapper">
                @foreach($categories as $category)
                <span wire:click="changeCategory({{ $category->id }})" class="category_button flex-column align-items-center justify-content-center p-1 h-100">
                    {{ $category->category_name }}
                </span>
                @endforeach
            </div>
        </div>
    </div>
</div>
