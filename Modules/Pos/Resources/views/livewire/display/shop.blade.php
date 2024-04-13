<div>
    @section('title', $pos->name)

    {{-- @section('breadcrumb')
    <div class="page-header d-print-none text-black">
      <div class="container-fluid">
        <div class="row g-2 align-items-center">
          <div class="col">
            <!-- Page pre-title -->
            <div class="page-pretitle">
              {{ __('Magasin') }}
            </div>
            <h2 class="page-title " style="color: #fff; font-size: 22px; font-weight: 600;">
              {{ $pos->name }}
            </h2>

          </div>
          <!-- Page title actions -->
          <div class="col-auto ms-auto d-print-none">
          </div>
        </div>
      </div>
    </div>
    @endsection --}}
    <div class="container-fluid">
        <div class="row">
            <!-- Left Part -->
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12" id="product-box">
                <livewire:pos::display.product.product-lists :categories="$product_categories"/>
            </div>
            <!-- Right Part -->
            <div class="col-lg-4 gap-2 col-md-12 d-lg-block" id="checkout-box">
                <livewire:pos::display.checkout :pos="$pos" :cart-instance="'pos-order'" :customers="$customers"/>
            </div>
        </div>
    </div>

    <!-- Fixed Bottom Bar -->
    <div class="fixed-bar d-flex d-lg-none">
        <button class="btn-switch_pane rounded-0 fw-bolder review-button" wire:click="payClick" wire:target="payClick" id="pay-order">
            <span class="fs-1 d-block">
                Payer
            </span>
            <span>
                {{ format_currency($total_amount) }}
            </span>
        </button>
        <button class="btn-switch_pane text-black rounded-0 fw-bolder review-button">
            <span class="fs-1 d-block">
                Commande
            </span>
            <span>
                {{ $total_items }} article(s)
            </span>
        </button>
    </div>

    <!-- Loading -->
    @include('includes.loading')

</div>
@section('scripts')

@endsection
