<x-dashboard-layout>
    <x-slot name="title">Dashboard</x-slot>
    <div class="container">
        <x-card class="p-6">
            {{ session()->get('sesi') }}
            You're logged in!
        </x-card>
    </div>
</x-dashboard-layout>
