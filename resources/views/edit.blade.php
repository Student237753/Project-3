<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Summa Zorg - Dossier Bewerken</title>
    <link rel="icon" href="{{ asset('assets/turbo_logo.png') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('{{ asset('assets/DossierCreateBackground.gif') }}');
            background-size: cover;
            background-color: rgba(0, 0, 0, 0.5); /* Add a fallback background color */
            background-blend-mode: darken; /* Darken the image */
        }

        .content-container {
            background-color: rgba(255, 255, 255, 0.6); /* White background with opacity */
            border-radius: 16px; /* Rounded corners */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            padding: 2rem; /* Inner spacing */
        }
    </style>
</head>
<body class="flex flex-col min-h-screen gap-10">

@include('layouts.header')

<div class="flex items-center justify-center flex-grow">
    <!-- Main Content Container -->
    <div class="content-container w-full max-w-4xl">
        <form action="{{ route('update', $dossier->id) }}" method="POST" class="flex flex-wrap justify-center h-full gap-10">
            @csrf
            @method('PUT')

            <div class="w-full md:w-72">
                <h3 class="text-xl font-bold">Type:</h3>
                <select name="type" class="bg-indigo-800 text-white w-full text-center rounded-md text-xl" required>
                    <option {{ $dossier->type == 'Man' ? 'selected' : '' }}>Man</option>
                    <option {{ $dossier->type == 'Vrouw' ? 'selected' : '' }}>Vrouw</option>
                    <option {{ $dossier->type == 'Kind' ? 'selected' : '' }}>Kind</option>
                    <option {{ $dossier->type == 'Bejaarde' ? 'selected' : '' }}>Bejaarde</option>
                </select>

                <p class="text-xl font-bold mt-4">Onderwerp:</p>
                <input type="text" max="100" name="subject" value="{{ $dossier->subject }}" class="bg-indigo-800 text-white w-full rounded-md text-xl" required>

                <p class="text-xl font-bold mt-4">Onderzoeken:</p>
                <input type="text" name="research" value="{{ optional($dossier->diagnoses->first())->research }}" class="bg-indigo-800 text-white w-full rounded-md text-xl">

                <p class="text-xl font-bold mt-4">Klachten:</p>
                <input type="text" name="symptoms" value="{{ optional($dossier->diagnoses->first())->symptoms }}" class="bg-indigo-800 text-white w-full rounded-md text-xl">

                <p class="text-xl font-bold mt-4">Behandeling:</p>
                <input type="text" name="treatment" value="{{ optional($dossier->diagnoses->first()->treatments->first())->treatment }}" class="bg-indigo-800 text-white w-full rounded-md text-xl">

                <p class="text-xl font-bold mt-4">Urgentie:</p>
                <select name="urgency" class="bg-indigo-800 text-white w-full text-center rounded-md text-xl" required>
                    <option {{ optional($dossier->diagnoses->first()->treatments->first())->policy == 'U1 Levensbedreigend' ? 'selected' : '' }}>U1 Levensbedreigend</option>
                    <option {{ optional($dossier->diagnoses->first()->treatments->first())->policy == 'U2 Spoed' ? 'selected' : '' }}>U2 Spoed</option>
                    <option {{ optional($dossier->diagnoses->first()->treatments->first())->policy == 'U3 Dringend' ? 'selected' : '' }}>U3 Dringend</option>
                    <option {{ optional($dossier->diagnoses->first()->treatments->first())->policy == 'U4 Niet Dringend' ? 'selected' : '' }}>U4 Niet Dringend</option>
                    <option {{ optional($dossier->diagnoses->first()->treatments->first())->policy == 'U5 Advies' ? 'selected' : '' }}>U5 Advies</option>
                </select>

                <p class="text-xl font-bold mt-4">Afspraak:</p>
                <input type="datetime-local" name="appointment" value="{{ $dossier->appointment }}" class="bg-indigo-800 text-white w-full rounded-md text-center text-xl">
            </div>

            <div class="w-full md:w-72">
                <p class="text-xl font-bold">Organen:</p>
                <div class="flex flex-col overflow-y-auto max-h-52 bg-indigo-800 text-white text-xl p-2 rounded-md">
                    @foreach($allOrgans as $organ)
                        <div class="flex items-center gap-2">
                            <input type="checkbox" value="{{ $organ->id }}" name="organs[]" class="w-4"
                                {{ $dossier->diagnoses->first()->organs->contains($organ->id) ? 'checked' : '' }}>
                            <label for="{{ $organ->id }}" class="text-xl">{{ $organ->name }}</label>
                        </div>
                    @endforeach
                </div>

                <p class="text-xl font-bold mt-4">Opmerkingen:</p>
                <input type="text" name="Opmerkingen" value="{{ optional($dossier->diagnoses->first())->caseexplanation }}" class="bg-indigo-800 text-white w-full rounded-md text-xl">
                <div class="flex text-xl justify-end gap-2 mt-4">
                    <a class="bg-red-500 text-white w-28 text-center rounded-md py-2" href="{{ route('index') }}">
                        Annuleren
                    </a>
                    <button type="submit" class="bg-green-500 text-white w-28 text-center rounded-md py-2">Opslaan</button>
                </div>
            </div>
        </form>
    </div>
</div>

@include('layouts.footer')

</body>
</html>
