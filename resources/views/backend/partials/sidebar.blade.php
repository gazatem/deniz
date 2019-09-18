<div class="sidebar">

    <div class="logo">
        <a href="{{ route('backoffice.dashboard') }}" class="simple-text logo-normal text-center">
            ADMIN PANEL
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="">
                <a href="{{ route('backoffice.dashboard') }}">
                    <i class="fas fa-igloo pl-3 align-middle"></i>
                    <span class="align-middle pl-3 menu-item">Dashboard</span>
                </a>
            </li>

            <li class="">
                <a href="{{ route('backoffice.pages') }}">
                    <i class="far fa-file pl-3 align-middle"></i>
                    <span class="align-middle pl-3 menu-item">Pages</span>
                </a>
            </li>            

            <li class="">
                <a href="{{ route('backoffice.banners') }}">
                    <i class="fas fa-images pl-3 align-middle"></i>
                    <span class="align-middle pl-3 menu-item">Banners</span>
                </a>
            </li>

            <li class="">
                <a href="{{ route('backoffice.gallery') }}">
                    <i class="far fa-image pl-3 align-middle"></i>
                    <span class="align-middle pl-3 menu-item">Gallery</span>
                </a>
            </li>

  

            <li class="">
                <a href="{{ route('backoffice.contact') }}">
                    <i class="fas fa-file-contract pl-3 align-middle"></i>
                    <span class="align-middle pl-3 menu-item">Contact</span>
                </a>
            </li>
            @if(\Auth::user()->hasRole('administrator'))
            <li class="">
                <a href="{{ route('backoffice.users') }}">
                    <i class="fas fa-users-cog pl-3 align-middle"></i>
                    <span class="align-middle pl-3 menu-item">Users</span>
                </a>
            </li>

            <li class="">
                <a href="{{ route('backoffice.blocks') }}">
                <i class="fas fa-th-large align-middle pl-3"></i>
                    <span class="align-middle pl-3 menu-item">Blocks</span>
                </a>
            </li>   
            
            <li class="">
                <a href="{{ route('backoffice.settings') }}">
                <i class="fas fa-cogs align-middle pl-3"></i>
                    <span class="align-middle pl-3 menu-item">Settings</span>
                </a>
            </li>            
            @endif
        </ul>
    </div>