@props([
    'value',
])
@if($this->journal)
<div class="d-flex" style="margin-bottom: 8px;">
    <!-- Input Label -->
    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0  text-break text-900">
        <label class="k_form_label">
            {{ $value->label }} :
        </label>
    </div>
    <!-- Input Form -->
    <div class="k_cell k_wrap_input flex-grow-1">
        <span class="cursor-text" id="{{ $value->model }}_0">{{ \Modules\Accounting\Entities\Journal::find($this->journal)->name }}</span>
    </div>
</div>
@endif
