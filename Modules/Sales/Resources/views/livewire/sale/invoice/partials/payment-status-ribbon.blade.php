@if(isset($this->payment_status) && $this->payment_status == 'paid')
    <div class="box col-9">
        <div class="k-folded-ribbon success">
            <span class="word">
                {{ __('Payé') }}
            </span>
        </div>
    </div>
@elseif(isset($this->payment_status) && $this->payment_status == 'partial')
    <div class="box col-9">
        <div class="k-folded-ribbon pending">
            <span class="word">
                {{ __('Partiel') }}
            </span>
        </div>
    </div>
@endif
