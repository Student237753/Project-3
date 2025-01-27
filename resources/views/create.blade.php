<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Summa Zorg - Nieuw Dossier</title>
    <link rel="icon" href="{{ asset('assets/turbo_logo.png') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex flex-col min-h-screen gap-10">

@include('layouts.header')
<div class="flex items-center justify-center flex-grow">
    <form action="{{route('store')}}" method="POST" class="flex flex-wrap justify-center h-full gap-52 w-full">
        @csrf
        {{--linker zijde van de pagina--}}
        <div class="col-start-1 w-72">
            <h3 class="text-xl">Type: <span class="text-red-700">*</span></h3>
            <select name="type" class="bg-indigo-800 text-white w-full text-center rounded-md text-xl" required>
                <option>Man</option>
                <option>Vrouw</option>
                <option>Kind</option>
                <option>Bejaarde</option>
            </select>

            <p class="text-xl">Onderwerp: <span class="text-red-700">*</span></p>
            <input type="text" max="100" name="subject" class="bg-indigo-800 text-white w-full rounded-md text-xl"
                   required>

            <p class="text-xl">Onderzoeken:</p>
            <input type="text" max="100" name="research" class="bg-indigo-800 text-white w-full rounded-md text-xl">

            <p class="text-xl">Klachten: <span class="text-red-700">*</span></p>
            <input type="text" max="100" name="symptoms" class="bg-indigo-800 text-white w-full rounded-md text-xl" required>

            <p class="text-xl">Behandeling:</p>
            <input type="text" name="treatment" class="bg-indigo-800 text-white w-full rounded-md text-xl">

            <p class="text-xl">Urgentie: <span class="text-red-700">*</span></p>
            <select name="policy" class="bg-indigo-800 text-white w-full text-center rounded-md text-xl" required>
                <option>U1 Levensbedreigend</option>
                <option>U2 Spoed</option>
                <option>U3 Dringend</option>
                <option>U4 Niet Dringend</option>
                <option>U5 Advies</option>
            </select>

            <p class="text-xl">Afspraak:</p>
            <input type="datetime-local" name="appointment" class="bg-indigo-800 text-white w-full rounded-md text-center text-xl">
        </div>

        {{--rechter zijde van de pagina--}}
        <div class="col-start-2 w-72">
            <p class="text-xl">Organen:</p>
            <div class="flex flex-col overflow-y-auto max-h-52 bg-indigo-800 text-white text-xl">
            @foreach(\App\Organs::cases() as $organ)
                    <div class="flex">
                        <input type="checkbox" value="{{$organ}}" class="w-4 mr-1 ml-1" name="organs"><label for="{{$organ}}">{{$organ}}</label>
                    </div>
            @endforeach
            </div>

            <p class="text-xl">Opmerkingen:</p>
            <textarea class="bg-indigo-800 text-white h-32 w-full rounded-md text-xl" name="caseexplanation"></textarea>

            <div class="flex text-xl justify-end gap-2">
                <a class="bg-red-500 text-white w-28 text-center" href="{{route('index')}}">
                    Annuleren
                </a>
                <button type="submit" class="bg-green-500 text-white w-28 text-center">Aanmaken</button>
            </div>
        </div>
    </form>
</div>
@include('layouts.footer')
</body>
</html>
