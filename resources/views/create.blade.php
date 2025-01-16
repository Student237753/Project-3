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
            <h3 class="text-xl">Type:</h3>
            <select name="type" class="bg-indigo-800 text-white w-full text-center rounded-md text-xl" required>
                <option>Man</option>
                <option>Vrouw</option>
                <option>Kind</option>
                <option>Bejaarde</option>
            </select>

            <p class="text-xl">Onderwerp:</p>
            <input type="text" max="100" name="subject" class="bg-indigo-800 text-white w-full rounded-md text-xl"
                   required>

            <p class="text-xl">Onderzoeken:</p>
            <input type="text" max="100" name="research" class="bg-indigo-800 text-white w-full rounded-md text-xl">

            <p class="text-xl">Klachten:</p>
            <input type="text" max="100" name="symptoms" class="bg-indigo-800 text-white w-full rounded-md text-xl" required>

            <p class="text-xl">Behandeling:</p>
            <input type="text" name="treatment" class="bg-indigo-800 text-white w-full rounded-md text-xl">

            <p class="text-xl">Urgentie:</p>
            <select name="urgency" class="bg-indigo-800 text-white w-full text-center rounded-md text-xl" required>
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
                <div class="flex">
                    <input type="checkbox" value="Hersenen" class="w-4" name="organs"><label for="Hersenen">Hersenen</label>
                </div>
                <div class="flex">
                    <input type="checkbox" value="Hart" class="w-4" name="organs"><label for="Hart">Hart</label>php
                </div>
                <div class="flex">
                    <input type="checkbox" value="Longen" class="w-4" name="organs"><label for="Longen">Longen</label>
                </div>
                <div class="flex">
                    <input type="checkbox" value="Slokdarm" class="w-4" name="organs"><label for="Slokdarm">Slokdarm</label>
                </div>
                <div class="flex">
                    <input type="checkbox" value="Luchtpijp" class="w-4" name="organs"><label for="Luchtpijp">Luchtpijp</label>
                </div>
                <div class="flex">
                    <input type="checkbox" value="Dikke darm" class="w-4" name="organs"><label for="Dikke darm">Dikke darm</label>
                </div>
                <div class="flex">
                    <input type="checkbox" value="Dunne darm" class="w-4" name="organs"><label for="Dunne darm">Dunne darm</label>
                </div>
                <div class="flex">
                    <input type="checkbox" value="Twaalfvingerige darm" class="w-4" name="organs"><label for="Twaalfvingerige darm">Twaalfvingerige darm</label>
                </div>
                <div class="flex">
                    <input type="checkbox" value="Endeldarm" class="w-4" name="organs"><label for="Endeldarm">Endeldarm</label>
                </div>
                <div class="flex">
                    <input type="checkbox" value="Maag" class="w-4" name="organs"><label for="Maag">Maag</label>
                </div>
                <div class="flex">
                    <input type="checkbox" value="Lever" class="w-4" name="organs"><label for="Lever">Lever</label>
                </div>
                <div class="flex">
                    <input type="checkbox" value="Galblaas" class="w-4" name="organs"><label for="Galblaas">Galblaas</label>
                </div>
                <div class="flex">
                    <input type="checkbox" value="Nieren" class="w-4" name="organs"><label for="Nieren">Nieren</label>
                </div>
                <div class="flex">
                    <input type="checkbox" value="Blaas" class="w-4" name="organs"><label for="Blaas">Blaas</label>
                </div>
                <div class="flex">
                    <input type="checkbox" value="Baarmoeder" class="w-4" name="organs"><label for="Baarmoeder">Baarmoeder</label>
                </div>
                <div class="flex">
                    <input type="checkbox" value="Ogen" class="w-4" name="organs"><label for="Ogen">Ogen</label>
                </div>
                <div class="flex">
                    <input type="checkbox" value="Oren" class="w-4" name="organs"><label for="Oren">Oren</label>
                </div>
                <div class="flex">
                    <input type="checkbox" value="Neus" class="w-4" name="organs"><label for="Neus">Neus</label>
                </div>
                <div class="flex">
                    <input type="checkbox" value="Mondholte" class="w-4" name="organs"><label for="Mondholte">Mondholte</label>
                </div>
                <div class="flex">
                    <input type="checkbox" value="Keelholte" class="w-4" name="organs"><label for="Keelholte">Keelholte</label>
                </div>
                <div class="flex">
                    <input type="checkbox" value="Schildklier" class="w-4" name="organs"><label for="Schildklier">Schildklier</label>
                </div>
                <div class="flex">
                    <input type="checkbox" value="Alvleesklier" class="w-4" name="organs"><label for="Alvleesklier">Alvleesklier</label>
                </div>
                <div class="flex">
                    <input type="checkbox" value="Kleine bloedsomloop" class="w-4" name="organs"><label for="Kleine bloedsomloop">Kleine bloedsomloop</label>
                </div>
                <div class="flex">
                    <input type="checkbox" value="Grote bloedsomloop" class="w-4" name="organs"><label for="Grote bloedsomloop">Grote bloedsomloop</label>
                </div>
                <div class="flex">
                    <input type="checkbox" value="Aorta" class="w-4" name="organs"><label for="Aorta">Aorta</label>
                </div>
                <div class="flex">
                    <input type="checkbox" value="Huid" class="w-4" name="organs"><label for="Huid">Huid</label>
                </div>
                <div class="flex">
                    <input type="checkbox" value="Eierstokken" class="w-4" name="organs"><label for="Eierstokken">Eierstokken</label>
                </div>
                <div class="flex">
                    <input type="checkbox" value="Prostaat" class="w-4" name="organs"><label for="Prostaat">Prostaat</label>
                </div>
                <div class="flex">
                    <input type="checkbox" value="Zaadballen" class="w-4" name="organs"><label for="Zaadballen">Zaadballen</label>
                </div>
                <div class="flex">
                    <input type="checkbox" value="Skelet" class="w-4" name="organs"><label for="Skelet">Skelet</label>
                </div>
                <div class="flex">
                    <input type="checkbox" value="Hypofyse" class="w-4" name="organs"><label for="Hypofyse">Hypofyse</label>
                </div>
                <div class="flex">
                    <input type="checkbox" value="Lymfeklieren" class="w-4" name="organs"><label for="Lymfeklieren">Lymfeklieren</label>
                </div>
                <div class="flex">
                    <input type="checkbox" value="Zenuwstelsel" class="w-4" name="organs"><label for="Zenuwstelsel">Zenuwstelsel</label>
                </div>
                <div class="flex">
                    <input type="checkbox" value="Extremiteiten" class="w-4" name="organs"><label for="Extremiteiten">Extremiteiten</label>
                </div>
            </div>

            <p class="text-xl">Opmerkingen:</p>
            <textarea class="bg-indigo-800 text-white h-32 w-full rounded-md text-xl" name="questions"></textarea>

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
