<x-dashboard-layout>
    <x-slot name='title'>Users</x-slot>
    <x-card>
        <x-slot name="header">
            <x-slot name="title">Users</x-slot>
            <x-slot name="description">List of users</x-slot>
            <x-slot name="actions">
                <x-button href="{{ route('users.create') }}">Add New User</x-button>
            </x-slot>
        </x-slot>
        <x-slot name="content">
            <x-table.option></x-table.option>
            <x-table>
                <x-table.header>
                    <x-table.row>
                        <x-table.head>#</x-table.head>
                        <x-table.head>Name</x-table.head>
                        <x-table.head>Email</x-table.head>
                        <x-table.head class="text-center">Action</x-table.head>
                    </x-table.row>
                </x-table.header>
                <x-table.body>
                    @foreach ($users as $user)
                        <x-table.row>
                            <x-table.cell>{{ $loop->iteration }}</x-table.cell>
                            <x-table.cell>{{ $user->name }}</x-table.cell>
                            <x-table.cell>{{ $user->email }}</x-table.cell>
                            <x-table.cell class="text-center">
                                <x-button href="{{ route('users.edit', $user) }}">Edit</x-button>
                            </x-table.cell>
                        </x-table.row>
                    @endforeach
                </x-table.body>
            </x-table>
        </x-slot>
    </x-card>
    <div class="py-8">
        {{ $users->links() }}
    </div>
</x-dashboard-layout>
