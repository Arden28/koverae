<div>
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-break">Koverae</h4>
        <span class="btn-close" wire:click="$dispatch('closeModal')"></span>
      </div>
      <div class="modal-body position-relative">

        <div class="k_form_renderer k_form_nosheet k_form_editable d-block">

            <div class="k_inner_group">
              <div class="d-flex" style="margin-bottom: 8px;">
                  <!-- Input Label -->
                  <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                      <label class="k_form_label">
                          Destinataires :
                      </label>
                  </div>
                  <!-- Input Form -->
                  <div class="k_cell k_wrap_input flex-grow-1" style="height: 30px;">
                      <input type="text" wire:model.live="email" wire:change='addEmail' class="mr-2 k_input" style="padding: 1px 0 0; width: 25%" id="date_0">
                      @error('email') <span class="error">{{ $message }}</span> @enderror
                      <div class="ml-2 overflow-y-auto w-75">
                          @foreach ($recipient_emails as $index => $email)
                          <a class="cursor-pointer badge rounded-pill k_web_settings_users" style="background-color: #097274;">
                              < {{ $email }} >
                              <i class="bi bi-x cancelled_icon" wire:click="removeEmail({{ $index }})" data-bs-toggle="tooltip" data-bs-placement="right" title="Retirer"></i>
                          </a>
                          @endforeach
                          <span wire:loading wire:target="addEmail">...</span>
                      </div>
                  </div>
              </div>
                <div class="d-flex" style="margin-bottom: 8px;">
                    <!-- Input Label -->
                    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                        <label class="k_form_label">
                            Sujet :
                        </label>
                    </div>
                    <!-- Input Form -->
                    <div class="k_cell k_wrap_input flex-grow-1">
                        <input type="text" wire:model.blur="subject" class="k_input" style="padding: 1px 0 0" id="date_0">
                        @error('subject') <span class="error">{{ $message }}</span> @enderror
                      </div>
                </div>

                <div class="note-editable koverae-editable-editor koverae-editor" contenteditable="true" id="body_0" wire:model="content" >
                    {!! $content !!}
                </div>

            </div>

            {{-- <div class="k_inner_group">
                <div class="d-flex" style="margin-bottom: 8px;">
                  <div x-data="{ fileInput: null }">
                    <label for="fileInput" class="p-2 m-1 border-0 rounded k_select_file_button btn btn-light">
                        <span x-text="fileInput ? fileInput.name + ' (' + fileInput.type + ')' : 'Choose File'"></span>
                        <input type="file" id="fileInput" wire:model="file" x-ref="fileInput" class="d-none" />
                      </label>
                  </div>
                  <div
                      x-data="{ uploading: false, progress: 0 }"
                      x-on:livewire-upload-start="uploading = true"
                      x-on:livewire-upload-finish="uploading = false"
                      x-on:livewire-upload-error="uploading = false"
                      x-on:livewire-upload-progress="progress = $event.detail.progress">
                      @if ($file)
                          <img src="{{ $file->temporaryUrl() }}">
                      @endif
                      <!-- File Input -->
                      <input type="file" wire:model="file">

                      <!-- Progress Bar -->
                      <div x-show="uploading">
                          <progress max="100" x-bind:value="progress"></progress>
                      </div>
                  </div>
                </div>
            </div> --}}

            <div class="k_inner_group">
              <div class="d-flex" style="margin-bottom: 8px;">
                  <!-- Input Label -->
                  <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                      <label class="k_form_label">
                          Modèle d'email :
                      </label>
                  </div>
                  <!-- Input Form -->
                  <div class="k_cell k_wrap_input flex-grow-1">
                      <select wire:model.blur="template_id" class="k_input" style="padding: 1px 10px 1px 0; width: 372px;" id="model_0">
                          <option value=""></option>
                          @foreach($templates as $t)
                              <option value="{{ $t->id }}">{{ $t->name }}</option>
                          @endforeach
                      </select>@error('template_id') <span class="error">{{ $message }}</span> @enderror
                  </div>
              </div>
          </div>

        </div>
      </div>
      <div class="flex-wrap gap-1 modal-footer justify-content-around justify-content-sm-start w-100">
        <footer class="gap-1">
            <button wire:click.prevent="sendEmail" wire:target="sendEmail" class="btn btn-primary">Envoyer <i class="bi bi-check-all"></i> <span wire:target="sendEmail" wire:loading>...</span></button>

            <span class="btn btn-secondary" wire:click="$dispatch('closeModal')" wire:target="$dispatch('closeModal')">Annuler</span>
        </footer>
      </div>
    </div>
</div>
