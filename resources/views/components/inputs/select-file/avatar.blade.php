@props([
    'value',
])
<div>
    <!-- Employee Avatar -->
    <div class="k_employee_avatar m-0 p-0">
        <!-- Image Uploader -->
        <img src="{{ asset('assets/images/people/default_avatar.png') }}" alt="" class="img img-fluid">
        <!-- <small class="k_button_icon">
            <i class="bi bi-circle text-success align-middle"></i>
        </small>-->
        <!-- Image selector -->
        <div class="select-file d-flex position-absolute justify-content-between w100 bottom-0">
            <button class="k_select_file_button btn btn-light border-0 rounded-circle m-1 p-1">
                <i class="bi bi-pencil"></i>
            </button>
            <button class="k_select_file_button btn btn-light border-0 rounded-circle m-1 p-1">
                <i class="bi bi-trash"></i>
            </button>
        </div>
    </div>
</div>
