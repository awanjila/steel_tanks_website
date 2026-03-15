<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Meksis Engineering | Water Tanks & Steel Structures')</title>

    <meta name="title" content="@yield('meta_title', 'Meksis Engineering | Elevated Steel Tanks, GRP & Galvanized Water Tanks Kenya')" />
    <meta name="description" content="@yield('meta_description', 'Meksis Engineering supplies and installs elevated steel water tanks, galvanized steel tanks, GRP water tanks, and steel towers across Kenya. Durable, certified, and custom-built.')" />
    <meta name="keywords" id="dynamic-keywords" content="Elevated Steel Water Tanks Kenya, Galvanized Steel Tanks, GRP Water Tanks Kenya, Steel Towers, Water Storage Solutions Kenya, Industrial Water Tanks">

    <!-- Open Graph -->
    <meta property="og:title" content="@yield('meta_title', 'Meksis Engineering | Water Tanks & Steel Structures Kenya')">
    <meta property="og:description" content="@yield('meta_description', 'Meksis Engineering supplies and installs elevated steel water tanks, galvanized steel tanks, GRP water tanks, and steel towers across Kenya.')">
    <meta property="og:image" content="{{ asset('front-assets/images/meksis-og.jpg') }}">
    <meta property="og:url" content="https://meksis.co.ke">
    <meta property="og:type" content="website">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('meta_title', 'Meksis Engineering | Water Tanks & Steel Structures')">
    <meta name="twitter:description" content="@yield('meta_description', 'Elevated steel water tanks, galvanized tanks, GRP tanks and steel towers in Kenya.')">
    <meta name="twitter:image" content="{{ asset('front-assets/images/meksis-og.jpg') }}">

    @include('client.partials.styles')
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Google tag -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-xxxxxxxxx"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'AW-xxxxxxxxx');
    </script>
</head>

<div id="app">
<body class="default-home">

    <!-- Main content Start -->
    <div class="main-content">

        <!-- Header -->
        <div class="full-width-header">
            @include('client.partials.header')
        </div>

        @yield('content')

    </div>

    <!-- Footer -->
    @include('client.partials.footer')

    <!-- Scroll Up -->
    <div id="scrollUp" class="orange-color">
        <i class="fa fa-angle-up"></i>
    </div>

    <!-- WhatsApp Button -->
    <whatsapp-button></whatsapp-button>

    <!-- Search Modal -->
    <div aria-hidden="true" class="modal fade search-modal" role="dialog" tabindex="-1">
        <button type="button" class="close" data-dismiss="modal">
            <span class="flaticon-cross"></span>
        </button>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="search-block clearfix">
                    <form>
                        <div class="form-group">
                            <input class="form-control" placeholder="Search tanks, towers &amp; structures..." type="text">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</div>

@include('client.partials.scripts')
@yield('scripts')

<!-- Dynamic Keywords by Country -->
<script>
    function updateMetaKeywords(country) {
        const baseKeywords = "Elevated Steel Water Tanks, Galvanized Steel Tanks, GRP Water Tanks, Steel Towers, Water Storage Solutions";
        document.getElementById('dynamic-keywords')
            .setAttribute('content', `${baseKeywords}, ${country}`);
    }

    fetch('https://ipapi.co/json/')
        .then(response => response.json())
        .then(data => updateMetaKeywords(data.country_name))
        .catch(() => updateMetaKeywords('Kenya'));
</script>

<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('css/cart.css') }}">
<script src="{{ asset('js/app.js') }}" defer></script>

<script>
    window.paypalClientId = "{{ config('services.paypal.client_id') }}";
    window.paypalMode    = "{{ config('services.paypal.mode') }}";
</script>

</html>