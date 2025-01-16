<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Summa Zorg | {{ $dossier->type }}</title>
    <link rel="icon" href="{{ asset('assets/SummaLogoHeader.png') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #f9fafb;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col">
    @include('layouts.header')
<main class="flex-grow flex items-center justify-center py-8 px-4">
    <div class="bg-white rounded-lg shadow-lg p-8 max-w-3xl w-full">
        <h2 class="text-2xl font-bold text-indigo-900 mb-6">Dossier Details</h2>
        <div class="space-y-4">
            <div class="flex justify-between items-center">
                <span class="font-semibold text-gray-700">Type Patient:</span>
                <span class="text-gray-900">{{ $dossier->type }}</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="font-semibold text-gray-700">Onderwerp:</span>
                <span class="text-gray-900">{{ $dossier->subject }}</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="font-semibold text-gray-700">Afspraak:</span>
                <span class="text-gray-900">
        @if($dossier->appointment)
                        {{ $dossier->appointment->format('d-m-Y H:i') }}
                    @else
                        Geen afspraak ingepland
                    @endif
                </span>
            </div>
            <div class="flex justify-between items-center">
                <span class="font-semibold text-gray-700">Aangemaakt op:</span>
                <span class="text-gray-900">{{ $dossier->created_at->format('d-m-Y H:i') }}</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="font-semibold text-gray-700">Laatst aangepast op:</span>
                <span class="text-gray-900">{{ $dossier->updated_at->format('d-m-Y H:i') }}</span>
            </div>
        </div>
        <div class="mt-6 flex space-x-4">
            <a href="{{ route('edit', $dossier->id) }}"
               class="bg-indigo-900 text-white py-2 px-4 rounded-lg shadow hover:bg-indigo-700">
                Bewerken
            </a>
            <form action="{{ route('destroy', $dossier->id) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je dit dossier wilt verwijderen?');">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="bg-red-600 text-white py-2 px-4 rounded-lg shadow hover:bg-red-500">
                    Verwijderen
                </button>
            </form>
            <a href="{{ route('index') }}"
               class="bg-gray-300 text-gray-700 py-2 px-4 rounded-lg shadow hover:bg-gray-200">
                Terug naar overzicht
            </a>
        </div>
    </div>
</main>
    @include('layouts.footer')
</body>
</html>
