<div>
    @section('title', $adjustment->reference .' - Ajustements de stock')
    <livewire:inventory::form.scrap-form :adjustment="$adjustment" />
</div>
