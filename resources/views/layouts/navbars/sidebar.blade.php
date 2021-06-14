<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-1" href="{{ route('home') }}">
            <img src="{{ asset('argon') }}/img/brand/gesta-de-estoques-just-in-time-x-just-in-case2.png" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-1-800x80.jpg">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Bem-vindo(a)!') }}</h6>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('Meu perfil') }}</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('argon') }}/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="ni ni-tv-2 text-primary"></i> {{ __('Dashboard') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active"  href="{{ route('user.index') }}">
                    <i class="fas fa-user-plus"></i>
                        <span class="nav-link-text" >{{ __('Usuário') }}</span>
                    </a>      
                </li>
                <li class="nav-item">
                    <a class="nav-link active"  href="{{ route('aluno.index') }}">
                    <i class="fas fa-user"></i>
                        <span class="nav-link-text" >{{ __('Aluno') }}</span>
                    </a>      
                </li>
                <li class="nav-item">
                    <a class="nav-link active"  href="{{ route('professor.index') }}">
                    <i class="fab fa-product-hunt"></i>
                        <span class="nav-link-text" >{{ __('Professor') }}</span>
                    </a>      
                </li>
                <li class="nav-item">
                    <a class="nav-link active"  href="{{ route('area.index') }}">
                    <i class="fa fa-list-alt"></i>
                        <span class="nav-link-text" >{{ __('Aréas') }}</span>
                    </a>      
                </li>
                <li class="nav-item">
                    <a class="nav-link active"  href="{{ route('tema.index') }}">
                    <i class="fa fa-list-alt"></i>
                        <span class="nav-link-text" >{{ __('Temas') }}</span>
                    </a>      
                </li>
                <li class="nav-item">
                    <a class="nav-link active"  href="{{ route('projeto.index') }}">
                    <i class="fa fa-list-alt"></i>
                        <span class="nav-link-text" >{{ __('Projetos') }}</span>
                    </a>      
                </li>
            </ul>
        </div>
    </div>
</nav>