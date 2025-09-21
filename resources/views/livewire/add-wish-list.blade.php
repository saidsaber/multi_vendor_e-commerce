<div class="product-action-vertical">
    @if (isset($product->wishList))
        <button type="submit" class="btn btn-link p-0 border-0 bg-transparent" title="إزالة من المفضلة"
            wire:click="remove({{ $product->wishList->id }})">
            <i class="fa-solid fa-heart" style="font-size:24px; color:#3399ff;"></i>
        </button>
    @else
        <button type="submit" class="btn btn-link p-0 border-0 bg-transparent" title="إضافة للمفضلة"
            wire:click="add({{ $product->id }})">
            <i class="fa-regular fa-heart" style="font-size:24px; color:#3399ff;"></i>
        </button>
    @endif
</div><!-- End .product-action -->
