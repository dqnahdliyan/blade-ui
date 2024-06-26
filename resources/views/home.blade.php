<x-app-layout>
    <div class="container">
        <x-card class="p-6">
            @session('sesi')
                {{ session()->get('sesi') }}
            @endsession
            This is your homepage
        </x-card>
    </div>
</x-app-layout>
