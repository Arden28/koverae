<div>
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-break">Koverae</h4>
        {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> --}}
      </div>
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
                        <input type="text" wire:model="people" class="k_input" style="padding: 1px 0 0; width: 25%" id="date_0">
                        <div class="w-75 d-flex">
                            <a class="badge rounded-pill cursor-pointer k_web_settings_users" style="background-color: #097274;">
                                Arden : < laudbouetoum..
                                <i class="bi bi-x cancelled_icon" data-bs-toggle="tooltip" data-bs-placement="right" title="Retirer"></i>
                            </a>
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
                        <input type="text" wire:model="people" class="k_input" style="padding: 1px 0 0" id="date_0">
                    </div>
                </div>

                <div class="note-editable koverae-editable-editor koverae-editor" contenteditable="true" id="body_0" >
                    Bonjour,

                    Votre commande S00003 d'un montant de 50 FCFA a été confirmée.
                    Merci de votre confiance !
                    
                    N'hésitez pas à nous contacter si vous avez des questions.
                    
                    --
                    Administrator
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
                        <select wire:model="people" class="k_input" style="padding: 1px 0 0" id="model_0">
                            <option value="">Ventes : Confirmation de commande</option>
                        </select>    
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer justify-content-around justify-content-sm-start flex-wrap gap-1 w-100">
        <footer>
            <button class="btn btn-primary">Envoyer</button>
            <button class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        </footer>
      </div>
    </div>
</div>