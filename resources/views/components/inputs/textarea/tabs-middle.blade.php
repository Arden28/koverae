@props([
    'value',
])


<div class="text-break k_cell k_wrap_input ">
    <textarea wire:model="{{ $value->model }}" id="" cols="30" rows="10" class="k_input textearea" placeholder="Note interne">
    </textarea>
    @error($value->model) <span class="text-danger">{{ $message }}</span> @enderror
</div>
