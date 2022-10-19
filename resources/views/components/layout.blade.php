<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="icon" href="images/favicon.png"/>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />

    {{-- Alpine Js CDN --}}
    <script src="//unpkg.com/alpinejs" defer></script>

    {{--Tail Wind CDN-------------------------------------}}

    {{-- this url is filter in Iran! --}}
    {{--    <script src="https://cdn.tailwindcss.com"></script>--}}

    {{-- the tailwind file is in "public/js/tailwind.3.1.8.js" --}}
    <script src="{{asset('js/tailwind.3.1.8.js')}}" defer></script>
    <script defer>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#ef3b2d",
                    },
                },
            },
        };
    </script>


    <title>LaraGigs</title>
</head>
<body class="mb-48">
{{--FLASH MESSAGE---------------------------------------------------------------------------}}
<x-flash-message/>


{{--NAVBAR---------------------------------------------------------------------------}}
<nav class="flex justify-between items-center mb-4">
    <a href="/laragigs/public"
    ><img class="w-24 p-3 logo" src="{{asset('images/logo.png')}}" alt="LOGO"/></a>
    <ul class="flex space-x-6 mr-6 text-lg">
        @auth
            <li>
                <span class="font-bold uppercase">{{auth()->user()->name}}</span>
            </li>
            <li>
                <a href="/laragigs/public/listings/manage" class="hover:text-lime-700"
                ><i class="fa-solid fa-gear"></i> Manage Jobs</a>
            </li>
            <li>
                <form action="/laragigs/public/logout" method="POST" class="inline">
                    @csrf
                    <button type="submit">
                        <i class="fa-solid fa-door-closed"></i> Logout
                    </button>
                </form>
            </li>
        @else
            <li>
                <a href="/laragigs/public/register" class="hover:text-lime-700"
                ><i class="fa-solid fa-user-plus"></i> Register</a>
            </li>
            <li>
                <a href="/laragigs/public/login" class="hover:text-lime-700"
                ><i class="fa-solid fa-arrow-right-to-bracket"></i> Login</a>
            </li>
        @endauth
    </ul>
</nav>

<main>
    {{--CONTENT--------------------------------------------------------------------------}}
    {{$slot}}
    {{--    @yield('content')--}}
</main>

{{--FOOTER---------------------------------------------------------------------------}}
<footer
    class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-lime-700 text-white h-12 mt-24 opacity-80 md:justify-center"
>
    <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>

    <a href="/laragigs/public/listings/create"
       class="absolute top-2 right-10 bg-black text-white py-1 px-3"
    >Post Job</a>
</footer>

</body>
</html>
