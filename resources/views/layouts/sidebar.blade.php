<aside id="default-sidebar" class="bg-[#77AFB7] fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 shadow-lg shadow-gray-500" aria-label="Sidebar">
    <div class=" w-1/2 mx-auto my-7">
        <x-application-logo/>
    </div>
    <div class="nav-container">
        <hr class="mb-3">
        @if (Auth::user()->role === "employee")
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="nav-sidebar">
                {{ __('Dashboard') }}
            </x-nav-link>
            <x-nav-link :href="route('my-tasks')" :active="request()->routeIs('my-tasks')" class="nav-sidebar">
                {{ __('My Tasks') }}
            </x-nav-link>
            <x-nav-link :href="route('completed-tasks')" :active="request()->routeIs('completed-tasks')" class="nav-sidebar">
                {{ __('Completed')}}
            </x-nav-link>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                            confirm('Are you sure you want to Log Out?');
                                    this.closest('form').submit();">
                    {{ __(' Log Out') }}
                </x-nav-link>
            </form>
        @else
            <x-nav-link :href="route('tasks')" :active="request()->routeIs('tasks')" class="nav-sidebar">
                {{ __('Tasks') }}
            </x-nav-link>
            <x-nav-link :href="route('finished-tasks')" :active="request()->routeIs('finished-tasks')" class="nav-sidebar">
                {{ __('Completed') }}
            </x-nav-link>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-nav-link :href="route('logout')" 
                        onclick="event.preventDefault();
                            confirm('Are you sure you want to Log Out?');
                                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-nav-link>
            </form>
        @endif
    </div>
</aside>


 <!-- Responsive Navigation -->
<nav x-data="{ open: false }" class="bg-[#77AFB7]">
    <!-- Hamburger -->
    <div class="-me-2 flex items-center sm:hidden">
        <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:stroke-black hover:stroke-black focus:text-gray-500 transition duration-150 ease-in-out">
            <svg class="h-6 w-6 focus:stroke-[#3E5457] hover:stroke-[#3E5457]" stroke="white" fill="none" viewBox="0 0 24 24">
                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @if (Auth::user()->role === "employer")
                <x-responsive-nav-link :href="route('tasks')" :active="request()->routeIs('tasks')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            @else
                <x-responsive-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                    {{ __('Tasks') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pb-1 border-t border-gray-200">
            <div class="mt-1 space-y-1">
                @if (Auth::user()->role === "employee")
                    <x-responsive-nav-link :href="route('my-tasks')" :active="request()->routeIs('my-tasks')">
                        {{ __('My Tasks') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Completed') }}
                    </x-responsive-nav-link>
                @else
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Completed') }}
                    </x-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                confirm('Are you sure you want to Log Out?');
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
