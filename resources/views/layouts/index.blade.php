<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />


    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Document</title>
</head>

<body>


    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">E M S </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav">
                    <a href="{{ url('/dashboard') }}"
                        class="rounded-md px-3 py-2   text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        <u> log in</u>
                    </a>
                    <a href="{{ url('/register') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        <u>register</u>
                    </a>
                    {{-- <a href="{{ url('/') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        <u>log out</u>
                    </a> --}}
                </ul>
            </div>



        </div>
    </nav>


    <div class="flex w-full h-screen justify-center pt-4 pb-4 rounded-lg">
        <h1 class="absolute z-10 bg-transparent text-yellow-300 justify-center items-center"></h1>
        <img width="1000" src="{{ asset('images/event.jpeg') }}" class="p-3  object-cover md:h-96"
            alt="Workspace Image">
    </div>

    <div class="flex flex-row lg:flex-row container lg:m-5 my-5">
        <div class="container lg:w-1/2">
            <p>À Propos</p>
            <h1 class="text-bold fs-1">E M S</h1>
            <p>L’event management, également appelé gestion d’événements, consiste à superviser, gérer et diriger tous
                les processus et toute la logistique entrant en jeu avant et pendant un événement. Celui-ci peut être
                n’importe quel type de rassemblement organisé : conférence, mariage, gala de charité, etc.

                Les event managers s’occupent de tout mettre en œuvre pour que l’événement se passe dans les meilleures
                conditions. Ils font en sorte de suivre un event planning qui comprend le déroulement des étapes et le
                rôle de chaque acteur. Ils gèrent donc le personnel, les finances, ainsi que les relations avec les
                divers fournisseurs.

                Si vous souhaitez vous lancer en tant qu’event manager/gestionnaire d’événements, alors cet article est
                parfait pour vous. Voyons donc précisément en quoi consiste l’event management, son fonctionnement, son
                rôle, ainsi que les compétences nécessaires pour réussir dans ce domaine.</p>
        </div>
        <div class="lg:w-1/2 pt-5">
            <video src="{{ asset('vidéo/Event Highlights.mp4') }}" controls></video>
        </div>
    </div>


    <div class="d-flex flex-row pt-5 gap-4  justify-center pb-5 ">
        @foreach ($events as $event)
            <div class="card btn btn-outline-secondary" style="width: 18rem;">
                <ul class="list-group list-group-flush  ">
                    <h1 class="text-start"><b>Event Name</b> </h1>
                    <li class="list-group-item">{{ $event->name }}</li>
                    <h1 class="text-start"><b>Event dateStart</b></h1>

                    <li class="list-group-item">{{ $event->dateStart }}</li>
                    <h1 class="text-start"> <b>Event dateEnd</b></h1>
                    <li class="list-group-item">{{ $event->dateEnd }}</li>

                    <h1 class="text-start"> <b>Event timeEnd</b></h1>
                    <li class="list-group-item">{{ $event->timeEnd }}</li>

                    {{-- <li class="list-group-item">{{ $event->dateStart }}</li>
                <h1>Event dateStart</h1> --}}



                </ul>
                <div class="d-flex flex-row w-40 ">
                    <div class="card-footer btn btn-outline-success">
                        {{-- <a href="{{ url('/register') }}"> reserve event</a> --}}

                        {{-- onclick="window.location.href='/session'" --}}
                    </div>
                    <form action="/session" method="get">
                        @csrf
                        <div class="card-footer btn btn-primary">
                            <button href="{{ route('event.buy', $event) }}">Buy</button>
                        </div>
                    </form>
                </div>

            </div>
        @endforeach
    </div>


    @yield('content')


    <footer class="btn btn-secondary w-100 p-10 font-[sans-serif] ">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="lg:flex lg:items-center">
            </div>

            <div class="lg:flex lg:items-center">
                <ul class="flex space-x-6">
                    <li>
                        <a href="javascript:void(0)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-gray-300 hover:fill-white w-7 h-7"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M19 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7v-7h-2v-3h2V8.5A3.5 3.5 0 0 1 15.5 5H18v3h-2a1 1 0 0 0-1 1v2h3v3h-3v7h4a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-gray-300 hover:fill-white w-7 h-7"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M21 5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5zm-2.5 8.2v5.3h-2.79v-4.93a1.4 1.4 0 0 0-1.4-1.4c-.77 0-1.39.63-1.39 1.4v4.93h-2.79v-8.37h2.79v1.11c.48-.78 1.47-1.3 2.32-1.3 1.8 0 3.26 1.46 3.26 3.26zM6.88 8.56a1.686 1.686 0 0 0 0-3.37 1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68zm1.39 1.57v8.37H5.5v-8.37h2.77z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                class="fill-gray-300 hover:fill-white w-7 h-7" viewBox="0 0 24 24">
                                <path
                                    d="M22.92 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.83 4.5 17.72 4 16.46 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98-3.56-.18-6.73-1.89-8.84-4.48-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.9 20.29 6.16 21 8.58 21c7.88 0 12.21-6.54 12.21-12.21 0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>

            <div>
                <h4 class="text-lg font-semibold mb-6 text-white">Contact Us</h4>
                <ul class="space-y-4">
                    <li>
                        <a href="javascript:void(0)" class="text-gray-300 hover:text-white text-sm">Email</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="text-gray-300 hover:text-white text-sm">Phone <br>
                            0745363566</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="text-gray-300 hover:text-white text-sm">Address <br>
                            EventManagementSystem@gmail.com</a>
                    </li>
                </ul>
            </div>

            <div>
                <h4 class="text-lg font-semibold mb-6 text-white">Information</h4>
                <ul class="space-y-4">
                    <li>
                        <a href="javascript:void(0)" class="text-gray-300 hover:text-white text-sm">About Us</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="text-gray-300 hover:text-white text-sm">Terms &amp;
                            Conditions</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="text-gray-300 hover:text-white text-sm">Privacy Policy</a>
                    </li>
                </ul>
            </div>
        </div>

        <p class='text-gray-300 text-sm mt-10'>© 2023<a href='https://readymadeui.com/' target='_blank'
                class="hover:underline mx-1">EVENT MANAGEMENT SYSTEM</a>All Rights Reserved.
        </p>
        {{-- 
        <div class="grid grid-cols-1 md:grid-cols-3 grid-flow-row gap-6">
            <div class="px-4 py-2 bg-blue-600 text-gray-100 rounded-md mr-4 hover:bg-blue-700"><a
                    href="https://twitter.com/digitalocean">Twitter</a></div>
            <div class="px-4 py-2 bg-blue-600 text-gray-100 rounded-md mr-4 hover:bg-blue-700"><a
                    href="https://www.linkedin.com/company/digitalocean">LinkedIn</a></div>
            <div class="px-4 py-2 bg-blue-600 text-gray-100 rounded-md mr-4 hover:bg-blue-700"><a
                    href="https://instagram.com/thedigitalocean">Instagram</a></div>
        </div> --}}
    </footer>



</body>

</html>
