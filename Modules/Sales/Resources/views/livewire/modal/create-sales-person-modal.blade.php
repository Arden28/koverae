<div>
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-break">{{ __('translator::components.modals.salesperson.title-create') }}</h4>
        <span class="btn-close" wire:click="$dispatch('closeModal')"></span>
      </div>
      <div class="k_form_sheet modal-body position-relative">

        <div class="mb-3 text-center k-alert alert-info" style="height: 50px; width: 100%; font-size: 14px;">
            {{ __('translator::components.modals.salesperson.form.alert') }}
        </div>

        <div class="m-0 mb-2 row justify-content-between position-relative w-100">
            <!-- title-->
            <div class="ke_title mw-75 pe-2 ps-0">
                <!-- Name -->
                <span for="" class="k_form_label font-weight-bold">{{ __('translator::components.modals.salesperson.form.name.label') }}</span>
                <h1 class="flex-row d-flex align-items-center">
                    <input type="text"wire:model="name" class="k_input" id="name_k" placeholder="{{ __('translator::components.modals.salesperson.form.name.placeholder') }}">
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                </h1>
                <!-- Email -->
                <span class="k_form_label font-weight-bold">
                    {{ __('translator::components.modals.salesperson.form.email.label') }}
                    <sup><i class="bi bi-question-circle-fill" style="color: #0E6163" data-toggle="tooltip" data-placement="top" title="Use to log in the system"></i></sup>
                </span>
                <h2>
                    <input type="email" wire:model="email" class="k_input" id="job_title" placeholder="{{ __('translator::components.modals.salesperson.form.email.placeholder') }}">
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                </h2>

                <!-- Phone -->
                <div class="mt-2 d-flex" style="margin-bottom: 8px;">
                    <!-- Input Label -->
                    <label class="k_form_label" style="margin-right: 4px;">
                        {{ __('translator::components.modals.salesperson.form.phone.label') }}
                    </label>
                    <!-- Input Form -->
                    <div class="k_cell k_wrap_input flex-grow-1">
                        <input type="tel" wire:model="phone" class="k_input" id="date_0">
                        @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Phone -->
                <div class="mt-2 d-flex" style="margin-bottom: 8px;">
                    <!-- Input Label -->
                    <label class="k_form_label" style="margin-right: 4px;">
                        {{ __('translator::components.modals.salesperson.form.create-employee.label') }}
                    </label>
                    <!-- Input Form -->
                    <div class="k_cell k_wrap_input flex-grow-1">
                        <div class="k_field_widget k_field_boolean">
                            <div class="k-checkbox form-check d-inline-block">
                                <input type="checkbox" wire:model="isEmployee" class="form-check-input" style="color: #0E6163" onclick="checkStatus(this)">
                            </div>
                        </div>

                        @error("isEmployee") <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

            </div>
            <!-- Employee Avatar -->
            <div class="p-0 m-0 k_employee_avatar">
                <!-- Image Uploader -->
                <img src="{{ asset('assets/images/people/default_avatar.png') }}" alt="" class="img img-fluid">
                <!-- <small class="k_button_icon">
                    <i class="align-middle bi bi-circle text-success"></i>
                </small>-->
                <!-- Image selector -->
                <div class="bottom-0 select-file d-flex position-absolute justify-content-between w100">
                    <button class="p-1 m-1 border-0 k_select_file_button btn btn-light rounded-circle">
                        <i class="bi bi-pencil"></i>
                    </button>
                    <button class="p-1 m-1 border-0 k_select_file_button btn btn-light rounded-circle">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
            </div>
        </div>
      </div>
      <div class="flex-wrap gap-1 modal-footer justify-content-around justify-content-sm-start w-100">
        <footer class="gap-1">
            <button wire:click.prevent="saveClose" wire:target="saveClose" class="btn btn-primary">{{ __('translator::components.modals.salesperson.buttons.save-close') }} <i class="bi bi-check-all"></i> <span wire:target="saveClose" wire:loading>...</span></button>
            <span class="btn btn-secondary" wire:click="$dispatch('closeModal')" wire:target="$dispatch('closeModal')">{{ __('translator::components.modals.salesperson.buttons.discard') }} <span wire:target="$dispatch('closeModal')" wire:loading>...</span>
        </footer>
      </div>
    </div>
</div>
