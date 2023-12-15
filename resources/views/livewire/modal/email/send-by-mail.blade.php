<div>
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-break">Koverae</h4>
        {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> --}}
      </div>
      <form wire:submit.prevent="sendEmail">
        <div class="modal-body position-relative">
          <div class="k_form_renderer k_form_nosheet k_form_editable d-block">

              <div class="k_inner_group">
                  <div class="d-flex" style="margin-bottom: 8px;">
                      <!-- Input Label -->
                      <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0  text-break text-900">
                          <label class="k_form_label">
                              Destinataires :
                          </label>
                      </div>
                      <!-- Input Form -->
                      <div class="k_cell k_wrap_input flex-grow-1">
                          <input type="text" wire:model="email" class="k_input" style="padding: 1px 0 0; width: 25%" id="date_0">
                          @error('email') <span class="error">{{ $message }}</span> @enderror
                          <div class="w-75 d-flex">
                              @foreach ($recipient_emails as $email)
                              <a class="badge rounded-pill cursor-pointer k_web_settings_users" style="background-color: #097274;">
                                  < {{ $email }} >
                                  <i class="bi bi-x cancelled_icon" wire:click.prevent="removeEmail({{ $email }})" data-bs-toggle="tooltip" data-bs-placement="right" title="Retirer"></i>
                              </a>
                              @endforeach
                          </div>
                      </div>
                  </div>

                  <div class="d-flex" style="margin-bottom: 8px;">
                      <!-- Input Label -->
                      <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0  text-break text-900">
                          <label class="k_form_label">
                              Sujet :
                          </label>
                      </div>
                      <!-- Input Form -->
                      <div class="k_cell k_wrap_input flex-grow-1">
                          <input type="text" wire:model="subject" class="k_input" style="padding: 1px 0 0" id="date_0">
                          @error('subject') <span class="error">{{ $message }}</span> @enderror
                        </div>
                  </div>

                  <div class="note-editable koverae-editable-editor koverae-editor" contenteditable="true" id="body_0" wire:model="content" >
                      {!! $content !!}
                  </div>

              </div>


              <div class="k_inner_group">
                  <div class="d-flex" style="margin-bottom: 8px;">
                      <!-- Input Label -->
                      <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0  text-break text-900">
                          <label class="k_form_label">
                              Modèle d'email :
                          </label>
                      </div>
                      <!-- Input Form -->
                      <div class="k_cell k_wrap_input flex-grow-1">
                          <select wire:model="template_id" class="k_input" style="padding: 1px 10px 1px 0; width: 372px;" id="model_0">
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
        <div class="modal-footer justify-content-around justify-content-sm-start flex-wrap gap-1 w-100">
          <footer>
              <button wire:loading.remove type="submit" wire:target="sendEmail" class="btn btn-primary">Envoyer</button>
              <button wire:loading wire:target="sendEmail" class="btn btn-primary">....</button>

              <button class="btn btn-secondary" data-dismiss="modal">Annuler</button>
          </footer>
        </div>
      </form>
    </div>
</div>
