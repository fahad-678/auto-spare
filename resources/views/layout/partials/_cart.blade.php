<style>
    .float-cart {
        position: fixed;
        bottom: 35px;
        right: 120px;
        text-align: center;
        font-size: 30px;
        z-index: 10;
        padding: 10px;
    }

    .float-cart img {
        width: 45px;
        height: 45px;
    }

    .float-cart-img:hover {
        animation: pulse 1s infinite;
    }

    @media (max-width: 768px) {
        .float-cart {
            bottom: 18px;
            right: 82px;
        }

        .float-cart img {
            width: 43px;
            height: 40px;
        }

        .float-cart:hover {
            scale: 1.1;
            transition: all 0.5s ease;
        }
    }
</style>

<a href="{{ request()->routeIs('cart.index') ? '#' : route('cart.index') }}"
    class="float-cart bg-white rounded-circle shadow p-md-3 p-1">
    <img src="{{ asset('assets/media/img/cart.png') }}" class="float-cart-img" alt="Cart">
</a>
