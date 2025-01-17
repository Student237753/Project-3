<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('assets/SummaLogoHeader.png') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Summa Zorg | Overzicht</title>

    <style>
        body {
            margin: 0;
            font-family: 'Figtree', sans-serif;
        }

        main {
            background-image: url('{{ asset('assets/HomepageBackgroundDocter.gif') }}');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
        }
    </style>
</head>
<body class="flex flex-col min-h-screen">
<header>
    @include('layouts.homeheader')
</header>
<main class="relative flex-grow flex items-center justify-center">
    <!-- Overlay for darkening the Gif background -->
    <div class="absolute inset-0 bg-black bg-opacity-30 z-10"></div>

    <!-- White Background div with 60% opacity -->
    <div class="relative z-10 bg-white bg-opacity-60 p-8 sm:p-12 rounded-lg w-11/12 max-w-5xl mx-auto flex flex-col overflow-y-auto" style="max-height: 80vh;">
        <div class="w-full">
            <!-- "Type" and "Onderwerp" Header Row  -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-center text-white bg-indigo-900 p-4 rounded-t-lg">
                <div class="text-center font-bold">Type:</div>
                <div class="text-center font-bold">Onderwerp:</div>
            </div>
            <div class="divide-y divide-indigo-800 ">
                @foreach($dossiers as $dossier)
                    <div class=" hover:bg-indigo-800 grid grid-cols-1 md:grid-cols-3 gap-4 items-center bg-indigo-900 p-4 rounded-lg mt-2">
                        <div class="text-center text-white font-semibold">{{ $dossier->type }}</div>
                        <div class="text-center text-white font-semibold">{{ $dossier->subject }}</div>
                        <div class="flex justify-center md:justify-end space-x-2">
                            <form action="{{ route('destroy', $dossier->id) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je dit dossier wilt verwijderen?');">
                                @csrf
                                @method('DELETE')
                                <button class="bg-white text-black font-semibold px-4 py-1 rounded-lg shadow hover:bg-gray-100 w-full md:w-auto" type="submit">
                                    Verwijderen
                                </button>
                            </form>
                            <a href="{{ route('edit', $dossier->id) }}" class="bg-white text-black font-semibold px-4 py-1 rounded-lg shadow hover:bg-gray-100 w-full md:w-auto">
                                Bewerken
                            </a>
                            <a href="{{ route('show', $dossier->id) }}" class="bg-white text-black font-semibold px-4 py-1 rounded-lg shadow hover:bg-gray-100 w-full md:w-auto">
                                Bekijk
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</main>
@include('layouts.footer')
</body>
</html>
