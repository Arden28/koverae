@props([
    'value',
])
<div>
    <!-- Employee Avatar -->
    <div class="p-0 m-0 k_employee_avatar">
        <!-- Image Uploader -->
        <img src="{{ asset('assets/images/people/default_avatar.png') }}" alt="" class="img img-fluid">
        <!-- <small class="k_button_icon">
            <i class="align-middle bi bi-circle text-success"></i>
        </small>-->
        <!-- Image selector -->
        <div class="select-file d-flex position-absolute justify-content-between w100 bottom-0 {{ $this->blocked ? 'd-none' : '' }}">
            <button class="p-1 m-1 border-0 k_select_file_button btn btn-light rounded-circle">
                <i class="bi bi-pencil"></i>
            </button>
            <button class="p-1 m-1 border-0 k_select_file_button btn btn-light rounded-circle">
                <i class="bi bi-trash"></i>
            </button>
        </div>
    </div>
</div>
