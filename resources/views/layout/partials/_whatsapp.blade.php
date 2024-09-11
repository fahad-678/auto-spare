<style>
    .float-whatsapp {
        position: fixed;
        bottom: 40px;
        right: 40px;
        border-radius: 50px;
        text-align: center;
        font-size: 30px;
        box-shadow: 2px 2px 3px #999;
        z-index: 10;
    }

    .float-whatsapp i {
        padding-top: 4px;
        padding-left: 6px;
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.1);
        }

        100% {
            transform: scale(1);
        }
    }

    .float-whatsapp img:hover {
        animation: pulse 1s infinite;
    }

    @media (max-width: 768px) {
        .float-whatsapp {
            bottom: 20px;
            right: 20px;
        }

        .float-whatsapp img {
            width: 45px;
            height: 45px;
        }
    }
</style>
<a href="https://wa.me/{{ env('WHATSAPP_NUMBER') }}" class="float-whatsapp bg-success" target="_blank">
    <img src="{{ asset('assets/media/svg/social-logos/whatsapp.svg') }}" width="60px" height="60px" alt="whatsapp">
    {{-- <i class="fab fa-whatsapp my-float "></i> --}}
</a>
