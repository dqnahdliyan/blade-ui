<div class="flex flex-shrink-0 items-center border-b px-4 h-[60px] lg:px-6">
    <a href="/" class="flex items-center gap-2 font-semibold">
        <x-application-logo class="size-6 fill-danger"/>
        <span class="">{{ config('app.name') }}</span>
    </a>
</div>

<div class="flex h-[calc(100vh-15rem)] overflow-auto py-2 scroll-smooth scroll">
    <nav class="flex flex-col items-start w-full gap-1 px-2 text-sm lg:px-4">
        <x-nav-link :href="route('home')" :active="request()->routeIs('home')">{{ __('Home') }}</x-nav-link>
        <x-nav-link :href="route('dashboard')"
                    :active="request()->routeIs('dashboard')">{{ __('Dashboard') }}</x-nav-link>
        <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.*')">{{ __('Users') }}</x-nav-link>
    </nav>
</div>

<div class="mt-auto h-[80px] p-4 space-y-1">
    <x-card class="flex flex-row items-center gap-2 p-2 mb-2 border">
        <div class="p-2 border rounded-full size-10">
            <x-lucide-user-circle class="stroke-1 text-muted-foreground"/>
        </div>
        <div class="flex flex-col gap-0.5">
            <div class="text-sm font-semibold">{{ Auth::user()->name }}</div>
            <div class="text-xs">{{ Auth::user()->email }}</div>
        </div>
    </x-card>

    <x-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
        <x-lucide-settings/>
        {{ __('Profile') }}
    </x-nav-link>

    <!-- Authentication -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <x-nav-link :href="route('logout')"
                    onclick="event.preventDefault();
                                        this.closest('form').submit();">
            <x-lucide-log-out/>
            {{ __('Log Out') }}
        </x-nav-link>
    </form>
</div>
