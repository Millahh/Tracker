<aside id="default-sidebar" class="bg-[#77AFB7] fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class=" w-1/2 mx-auto my-7">
        <x-application-logo/>
    </div>
    <div class="mx-10 pt-3 border-t-2">
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="nav-sidebar">
            {{ __('Dashboard') }}
        </x-nav-link>
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="nav-sidebar">
            {{ __('My Tasks') }}
        </x-nav-link>
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="nav-sidebar">
            {{ __('Completed') }}
        </x-nav-link>
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="nav-sidebar">
            {{ __('Log Out') }}
        </x-nav-link>
    </div>
    
</aside>
