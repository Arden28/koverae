@props([
    'value',
    'data'
])

<div class="d-flex" style="margin-bottom: 8px;">
    <!-- Input Label -->
    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0  text-break text-900">
        <label class="k_form_label">
            {{ $value->label }}
        </label>
    </div>
    <!-- Input Form -->
    <div class="k_cell k_wrap_input flex-grow-1 mb-3">
        <div class="k_field_tags d-inline-flex flex-wrap gap-1 k_tags_input k_input">
            @foreach ($this->purchases_taxes as $tax)
            @php
                $tax = \Modules\Invoicing\Entities\Tax\Tax::find($tax);
            @endphp

            <span class="k_tag d-inline-flex align-items-center w-auto badge rounded-pill k_tag_color_0">
                <div class="k_tag_badge_text text-truncate">
                    {{ $tax->name }}
                    <a href="" class="k_delete opacity-100-hover ps-1 opacity-75">
                        <i class="bi bi-x"></i>
                    </a>
                </div>
            </span>
            @endforeach

            <input type="{{ $value->type }}" wire:model="" class="k_input w-auto" id="taxes_id">
        </div>
        @error($value->model) <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>

