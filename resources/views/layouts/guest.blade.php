<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body::before {
            content: "";
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.3);
            /* semi-transparent black */
            z-index: -1;
            /* put the layer behind the content */
        }

        input {
            border: 2px solid #191919;
            padding: 0.5rem !important
        }
    </style>
    <!-- Scripts -->
</head>

<body class="bg-cover bg-center relative" style="background-image:url('/uoz.jpg')">
    {{-- <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0">

    </div> --}}
    <div class="flex h-screen justify-center items-center">
        <div class="text-center w-full">
            <div class="text-center">
                <div class="w-full sm:max-w-md mt-6 bg-white shadow-md overflow-hidden sm:rounded-lg mx-auto">
                    <div class="flex justify-center">
                        <a href="/">
                            <img src="/logo.jpg" alt="uoz-logo" class="w-24 mt-4">
                        </a>
                    </div>

                    <div
                        class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg mx-auto">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
