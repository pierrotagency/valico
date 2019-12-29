<header id="page-header">
    <div class="content-header" style="max-width: none; padding-left: 10px">
        <div class="content-header-section">
            {{-- <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="sidebar_toggle">
                <i class="fa fa-columns"></i>
            </button> --}}           
            @yield('topbar')

        </div>
       
        <!-- Right Section -->
        {{-- <div class="content-header-section">
            <!-- User Dropdown -->
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{$auth->name}}<i class="fa fa-angle-down ml-5"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right min-width-150" aria-labelledby="page-header-user-dropdown">
                    <a class="dropdown-item" href="be_pages_generic_profile.php">
                        <i class="si si-user mr-5"></i> Perfil
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="be_pages_generic_inbox.php">
                        <span><i class="si si-envelope-open mr-5"></i> Notificaciones</span>
                        <span class="badge badge-primary">3</span>
                    </a>
                    <a class="dropdown-item" href="be_pages_generic_invoice.php">
                        <i class="si si-note mr-5"></i> Invoices
                    </a>
                    <div class="dropdown-divider"></div>

                    <!-- Toggle Side Overlay -->
                    <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                    <a class="dropdown-item" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_toggle">
                        <i class="si si-wrench mr-5"></i> Preferencias
                    </a>
                    <!-- END Side Overlay -->
                    <a class="dropdown-item" href="{{ route('admin.user.edit') }}">
                        <i class="si si-user mr-5"></i> Perfil
                    </a>
                    <a class="dropdown-item" href="{{ route('admin.user.password') }}">
                        <i class="si si-lock mr-5"></i> Seguridad
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}">
                        <i class="si si-logout mr-5"></i> Salir
                    </a>
                </div>
            </div> --}}
            <!-- END User Dropdown -->

            <!-- Toggle Side Overlay -->
            <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
           {{--  <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="side_overlay_toggle">
                <i class="fa fa-sitemap"></i>
            </button> --}}
            <!-- END Toggle Side Overlay -->
        {{-- </div> --}}
        <!-- END Right Section -->
    </div>
  
    <!-- Header Search -->
    <div id="page-header-search" class="overlay-header">
        <div class="content-header content-header-fullrow">
            <form action="be_pages_generic_search.php" method="post">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <!-- Close Search Section -->
                        <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                        <button type="button" class="btn btn-secondary" data-toggle="layout" data-action="header_search_off">
                            <i class="fa fa-times"></i>
                        </button>
                        <!-- END Close Search Section -->
                    </div>
                    <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
       </div>
    </div>
    <!-- END Header Search -->

    <!-- Header Loader -->
    <!-- Please check out the Activity page under Elements category to see examples of showing/hiding it -->
    <div id="page-header-loader" class="overlay-header bg-primary">
        <div class="content-header content-header-fullrow text-center">
            <div class="content-header-item">
                <i class="fa fa-sun-o fa-spin text-white"></i>
            </div>
        </div>
    </div>
    <!-- END Header Loader -->
</header>
<!-- END Header -->
