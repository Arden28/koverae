<div>
    <div class="card-lg border-0 shadow-sm bg-white">
        <div class="card-body" id="left-product-side-product">
            <livewire:search.input-search/>
            <livewire:pos::display.product.filter :categories="$categories"/>
            <!-- Loading spinner -->
            <div wire:loading.flex class="col-12 position-absolute justify-content-center align-items-center" style="top:0;right:0;left:0;bottom:0;background-color: rgba(255,255,255,0.5);z-index: 99;">
                <div class="spinner-border" style="color: #045054;" role="status">
                    <span class="sr-only"></span>
                </div>
            </div>
            <div class="product-list row gap-2 p-1 overflow-y-auto h-screen">
                @forelse($products as $product)
                <article class="flex-column product position-relative d-flex align-items-start ps-0 text-start cursor-pointer transition-base">
                    <!-- Product Tag Info -->
                    <div class="product-information-tag mb-3 position-absolute" style="right:0px;top: 0px;">
                        <i class="bi bi-info" style="font-size: 14px;"></i>
                    </div>
                    <!-- Product Stock Info -->
                    <div class="badge badge-info mb-3 position-absolute" style="left:10px;top: 10px;">{{ $product->product_quantity }}</div>
                    <!-- Product Image -->
                    {{-- <img height="200" src="{{ $product->getFirstMediaUrl('images') }}" class="card-img-top" alt="Product Image"> --}}
                    @if($product->image_path)
                    <img wire:click.prevent="selectProduct({{ $product }})" src="{{ Storage::disk('public')->url($product->image_path) }}" class="card-img-top w-100" alt="{{ $product->product_name }}">
                    @else
                    <img wire:click.prevent="selectProduct({{ $product }})" src="{{ asset('assets/images/default/product.png') }}" class="card-img-top w-100" alt="{{ $product->product_name }}">
                    @endif

                    <div class="product-content d-flex flex-column justify-content-between mx-2 py-1">
                        <!-- Product Name -->
                        <div class="product-name no-image fw-bolder overflow-hidden lh-sm" id="product_{{ $product->id }}">
                            {{ $product->product_name }}
                        </div>
                        <span class="price-tag py-1 fw-bolder" style="color: #045054;">
                            {{ format_currency($product->product_price / 100) }}
                        </span>
                    </div>
                </article>
                @empty

                @endforelse
            </div>
            <div @class(['mt-3' => $products->hasPages()])>
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
