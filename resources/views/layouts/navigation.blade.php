
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
               

                <a class="nav-item nav-link" href="{{ route('GetOpera') }}">
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
                              <form action="">
                            <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                Log Out
                        </a></form></div>
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