{{-- <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                  
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                   
                    @role('Admin')
                    <a href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    <x-nav-link :href="route('operators.GetOperators')" :active="request()->routeIs('operators.GetOperators')">
                        {{ __('Gestion operateurs') }}
                    </x-nav-link>
                    <x-nav-link :href="route('abonnements.index')" :active="request()->routeIs('abonnements.index')">
                        {{ __('Gestion Abonnement') }}
                    </x-nav-link>
                    <x-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.index')">
                        {{ __('Gestion categories') }}
                    </x-nav-link>
                    
                    @endrole

                    @role('owner')
                    <x-nav-link :href="route('dashboard_oner')" :active="request()->routeIs('dashboard_oner')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                  
                    <x-nav-link :href="route('plan.plan_owner')" :active="request()->routeIs('plan.plan_owner')">
                        {{ __(" plan d'abonnement") }}
                    </x-nav-link>

                    <x-nav-link :href="route('operators.GetOpera')" :active="request()->routeIs('operators.GetOpera')">
                        {{ __('Gestion operateurs') }}
                    </x-nav-link>
                    <x-nav-link :href="route('menus.index')" :active="request()->routeIs('menus.index')">
                        {{ __('Gestion menus') }}
                    </x-nav-link>
                    <x-nav-link :href="route('Articles.index')" :active="request()->routeIs('Articles.index')">
                        {{ __('Gestion articles') }}
                    </x-nav-link>
                    @endrole
                    @role('operator')
                    @can('add')
                    <x-nav-link :href="route('menu.index')" :active="request()->routeIs('menu.index')">
                        {{ __('Gestion menus') }}
                    </x-nav-link>
                    <x-nav-link :href="route('Article.index')" :active="request()->routeIs('Article.index')">
                        {{ __('Gestion articles') }}
                    </x-nav-link>
                    @endcan
                   
                    @endrole
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav> --}}
<div class="container-xxl position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
        <a href="" class="navbar-brand p-0">
            <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Restoran</h1>
            <!-- <img src="img/logo.png" alt="Logo"> -->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            
        
            <div class="navbar-nav ms-auto py-0 pe-4">
                <a href="{{ route('/') }}" class="nav-item nav-link active">Home</a>
                @role('Admin')
               
                <a class="nav-item nav-link" href="{{ route('dashboard') }}" >
                    Dashboard
                </a>

                <a class="nav-item nav-link" href="{{ route('operators.GetOperators') }}" >
                    Gestion operateurs
                </a>
                <a class="nav-item nav-link" href="{{ route('abonnements.index') }}" >
                    Gestion Abonnement
                </a>
                <a class="nav-item nav-link" href="{{ route('categories.index') }}">
                    Gestion categories
                </a>
                
                
                
                @endrole

                @role('owner')
               

                <a class="nav-item nav-link" href="{{ route('operators.GetOpera') }}">
                   Gestion operateurs
                </a>
                <a class="nav-item nav-link" href="{{ route('plan.plan_owner') }}">
                    plan d'abonnement
                </a>
                <a class="nav-item nav-link" href="{{ route('menus.index') }}">
                    Gestion articles
                </a>
                <a class="nav-item nav-link" href="{{ route('Articles.index') }}">
                    Gestion articles
                </a>
                
                @endrole
                @role('operator')
                @can('add')
                <a href="{{ route('menu.index') }}" >
                    Gestion menus
                </a>
                <a href="{{ route('Article.index') }}" >
                    Gestion articles
                </a>
                @endcan
               
                @endrole

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{ Auth::user()->name }}</a>
                    <div class="dropdown-menu m-0">
                        <a href="{{ route('profile.edit') }}" class="dropdown-item">profile</a>
                       
                        <div class="dropdown-item"><form method="POST" action="{{ route('logout') }}">
                            @csrf
        
                            <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                Log Out
                        </a></div>
                    </div>
                </div>
            </div>
            
              
    </nav>

    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container my-5 py-5">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 text-center text-lg-start">
                    <h1 class="display-3 text-white animated slideInLeft">{{ __('welcome '. Auth::user()->name ) }}</h1>
                    <a href="#" class="nav-link " >{{ Auth::user()->email }}</a>

                </div>
                
            </div>
        </div>
    </div>
</div>