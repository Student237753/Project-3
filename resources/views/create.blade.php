<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Summa Zorg - Nieuw Dossier</title>
</head>
<body>

    @include('layouts.header')

    {{--#region main (left)--}}
    <div>

        <h3>Type:</h3>
        <select name="type">
            <option>Man</option>
            <option>Vrouw</option>
            <option>Kind</option>
            <option>Bejaarde</option>
        </select>

        <p>Onderwerp</p>
        <input type="text" max="100" name="onderwerp">

        <p>Onderzoeken:</p>
        <input type="text" max="100" name="onderzoeken">

        <p>Klachten:</p>
        <input type="text" max="100" name="klachten">
    </div>

    {{--#endregion--}}

    {{--#region main (right)--}}
    <div>
        <p>Organen:</p>
        @foreach($organen as $orgaan)
        <div>
            <p>{{$orgaan}}</p><input type="checkbox">
        </div>
        @endforeach
    </div>

    <p>Beleid:</p>
    <select name="beleid">
        <option>U1 Levensbedreigend</option>
        <option>U2 Spoed</option>
        <option>U3 Dringend</option>
        <option>U4 Niet Dringend</option>
        <option>U5 Advies</option>
    </select>

    <p>Behandeling:</p>
    <input type="text" name="behandeling">
    {{--#endregion--}}

    {{--#region conclusion--}}
    <div>
        <button>Annuleren</button>
        <button>Opslaan</button>
    </div>
    {{--#endregion--}}
</body>
</html>
