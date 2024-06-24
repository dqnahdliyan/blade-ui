@extends('layouts.base', ['title' => $title ?? null])
@section('content')
    <div class="grid min-h-screen w-full md:grid-cols-[220px_1fr] lg:grid-cols-[280px_1fr]">

        <!-- Responsive Sidebar (Drawer) -->
        <x-drawer name="navigation" class="md:hidden">
            <div class="flex flex-shrink-0 items-center border-b px-4 h-[60px] lg:px-6">
                <a href="/" class="flex items-center gap-2 font-semibold">
                    <x-application-logo class="size-6"/>
                    <span class="">{{ config('app.name') }}</span>
                </a>
            </div>

            <div class="flex h-[calc(100vh-15rem)] overflow-auto py-2 scroll-smooth scroll">
                <nav class="flex flex-col items-start w-full gap-1 px-2 text-sm lg:px-4">
                    @foreach ($components as $component)
                        <a class="px-4 py-2 inline-flex capitalize items-center [&_svg]:size-4 w-full gap-x-2 transition duration-200 text-sm font-medium tracking-tight hover:bg-accent rounded-lg {{ request()->url() === route('design-system', $component) ? ' text-foreground bg-accent' : ' text-muted-foreground hover:text-foreground' }}"
                           href="{{ route('design-system', $component) }}">{{ $component }}</a>
                    @endforeach
                </nav>
            </div>
        </x-drawer>

        <!-- Sidebar -->
        <div class="sticky top-0 hidden max-h-screen overflow-auto border-r md:block">
            <div class="flex flex-shrink-0 items-center border-b px-4 h-[60px] lg:px-6">
                <a href="/" class="flex items-center gap-2 font-semibold">
                    <x-application-logo class="size-6"/>
                    <span class="">{{ config('app.name') }}</span>
                </a>
            </div>

            <div class="flex h-[calc(100vh-4rem)] overflow-auto py-2 scroll-smooth scroll">
                <nav class="flex flex-col items-start w-full gap-1 px-2 text-sm lg:px-4">
                    @foreach ($components as $component)
                        <a class="px-4 py-2 inline-flex capitalize items-center [&_svg]:size-4 w-full gap-x-2 transition duration-200 text-sm font-medium tracking-tight hover:bg-accent rounded-lg {{ request()->url() === route('design-system', $component) ? ' text-foreground bg-accent' : ' text-muted-foreground hover:text-foreground' }}"
                           href="{{ route('design-system', $component) }}">{{ $component }}</a>
                    @endforeach
                </nav>
            </div>
        </div>
        <div class="flex flex-col w-full overflow-auto">
            <header class="flex container items-center gap-2 border-b bg-background h-[60px]">
                <x-button x-data="" x-on:click.prevent="$dispatch('open-drawer', 'navigation')"
                          variant="outline" size="icon" class="inline-flex border-border md:hidden">
                    <x-lucide-menu class="w-6 h-6"/>
                </x-button>
                <div class="pl-2 mr-auto text-xl font-semibold border-l-2 md:border-none md:pl-4">
                    @isset($title)
                        <h3>{{ $title }}</h3>
                    @endisset
                </div>
                <x-theme-toggle/>
                @guest
                    <x-nav-link class="w-fit" :href="route('login')" :active="request()->routeIs('login')">
                        {{ __('Login') }}
                    </x-nav-link>
                @endguest
                @auth
                    <x-dropdown class="w-48" align="right">
                        <x-slot name="trigger">
                            <div class="p-2 border rounded-full size-10">
                                <x-lucide-user-circle class="stroke-1 text-muted-foreground"/>
                            </div>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Profile -->
                            <x-dropdown.label>
                                <span class="font-semibold">{{ Auth::user()->name }}</span>
                                <span class="text-sm">{{ Auth::user()->email }}</span>
                            </x-dropdown.label>
                            <hr/>
                            <x-dropdown.link :href="route('profile.edit')">
                                <x-lucide-settings-2 class="mr-2"/>
                                {{ __('Profile') }}
                            </x-dropdown.link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown.link :href="route('logout')"
                                                 onclick="event.preventDefault(); this.closest('form').submit();">
                                    <x-lucide-log-out class="mr-2"/>
                                    {{ __('Log Out') }}
                                </x-dropdown.link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @endauth
            </header>
            <main class="container py-4 md:py-6">
                {{ $slot }}
            </main>
        </div>
    </div>
@endsection
