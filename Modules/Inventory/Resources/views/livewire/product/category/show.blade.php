<div>
    @section('title', $category->category_name)

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:inventory::navbar.control-panel.product-category-form-panel :category="$category" />
    @endsection

    <!-- Form -->
    <livewire:inventory::form.category-form :category="$category" />

</div>
