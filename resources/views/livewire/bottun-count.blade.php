<div class="header-right">
    <div class="wishlist">
        <a href="{{ route('whishlist') }}" title="Wishlist">
            <div class="icon">
                <i class="icon-heart-o"></i>
                <span class="wishlist-count badge">{{ $wishListCount }}</span>
            </div>
            <p>Wishlist</p>
        </a>
    </div><!-- End .compare-dropdown -->

    <div class="dropdown cart-dropdown">
        <a href="{{ route('cart') }}" class="dropdown-toggle" aria-expanded="false" data-display="static">
            <div class="icon">
                <i class="icon-shopping-cart"></i>
                <span class="cart-count">{{ $cartCount }}</span>
            </div>
            <p>Cart</p>
        </a>
    </div><!-- End .cart-dropdown -->
</div><!-- End .header-right -->
