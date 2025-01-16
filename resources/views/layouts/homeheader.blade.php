<div class="bg-indigo-900 flex items-center justify-between p-4 h-20">
    <!-- Logo Placeholder -->
    <div class="flex items-center">
        <a href="{{ route('index') }}">
        <img src="{{ asset('assets/SummaLogoHeader.png') }}" alt="Logo" class="h-16">
        </a>
    </div>

    <!-- Title -->
    <div class="flex-1 text-center pl-28">
        <h1 class="text-white text-4xl font-bold">
            Summa Zorg
        </h1>
    </div>

    <!-- Create new dossier Button -->
    <div class="flex items-center">
        <a href="{{route('create')}}" class="bg-white text-black font-bold px-6 py-2 rounded-full shadow hover:bg-gray-100">
            Maak nieuwe dossier aan
        </a>
    </div>
</div>
