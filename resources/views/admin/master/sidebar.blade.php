 <!-- Sidebar -->

    {{-- @php(var_dump($route)) --}}


<nav id="sidebar">
    <!-- Sidebar Scroll Container -->
    <div id="sidebar-scroll">
        <!-- Sidebar Content -->
        <div class="sidebar-content">
            <!-- Side Header -->
            <div class="content-header content-header-fullrow px-15">
                <!-- Mini Mode -->
                <div class="content-header-section sidebar-mini-visible-b">
                    <!-- Logo -->
                    <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                        <span class="text-dual-primary-dark">c</span><span class="text-primary">b</span>
                    </span>
                    <!-- END Logo -->
                </div>
                <!-- END Mini Mode -->

                <!-- Normal Mode -->
                <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                    <!-- Close Sidebar, Visible only on mobile screens -->
                    <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                    <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                        <i class="fa fa-times text-danger"></i>
                    </button>
                    <!-- END Close Sidebar -->

                    <!-- Logo -->
                    <div class="content-header-item">
                        <a class="link-effect font-w700" href="/">
                            <div id="main-logo"></div>
                        </a>
                    </div>
                    <!-- END Logo -->
                </div>
                <!-- END Normal Mode -->
            </div>
            <!-- END Side Header -->

            <!-- Side User -->
            <div class="content-side content-side-full content-side-user px-10 align-parent">
                <!-- Visible only in mini mode -->
                <div class="sidebar-mini-visible-b align-v animated fadeIn">
                    <img class="img-avatar img-avatar32" src="/images/tmp/avatars/avatar15.jpg" alt="">
                </div>
                <!-- END Visible only in mini mode -->

                <!-- Visible only in normal mode -->
                <div class="sidebar-mini-hidden-b text-center">
                    {{-- <a class="img-link" href="#">
                        <img class="img-avatar" src="/images/tmp/avatars/avatar15.jpg" alt="">
                    </a> --}}
                    <ul class="list-inline mt-10">
                        <li class="list-inline-item">
                            <a class="link-effect text-dual-primary-dark font-size-xs font-w600 text-uppercase" href="#">{{$auth->name}}</a>
                        </li>
                        {{-- @if($auth->isGod())
                        <li class="list-inline-item">                            
                            <a class="link-effect text-dual-primary-dark" href="{{ route('admin.user.edit') }}">
                                <i class="si si-user"></i>
                            </a>
                        </li>
                        @endif --}}
                        <li class="list-inline-item">                                
                            <a class="link-effect text-dual-primary-dark" href="{{ route('admin.user.password') }}">
                                <i class="si si-lock"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="link-effect text-dual-primary-dark" href="{{ route('logout') }}">
                                <i class="si si-logout"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- END Visible only in normal mode -->
            </div>
            <!-- END Side User -->


            <div class="content-side content-side-full">                
                <form action="be_pages_generic_search.php" method="post">
                    <div class="input-group">
                        <select class="js-select2" id="page_search" style="width: 100%;" data-placeholder="Buscar.." >
                            <option></option>
                        </select>                          
                    </div>
                </form>
            </div>

            <!-- Side Navigation -->
            <div class="content-side content-side-full">
                <ul class="nav-main">
                    <li>
                        <a class="{{in_array($route,['admin.home'])?'active':''}}" href="{{route('admin.home')}}"><i class="si si-cup"></i><span class="sidebar-mini-hide">Inicio</span></a>
                    </li>


                    @if($auth->hasProfile('Contenidos'))
                        <li>
                            <a class="{{in_array($route,['admin.folder.panel'])?'active':''}}" href="{{route('admin.folder.panel')}}"><i class="fa fa-cube"></i><span class="sidebar-mini-hide">Explorador</span></a>
                        </li>
                    @endif
                    @if($auth->hasProfile('Eventos'))
                        <li>
                            <a class="{{in_array($route,['admin.calendar.index'])?'active':''}}" href="{{route('admin.calendar.index')}}"><i class="fa fa-calendar"></i><span class="sidebar-mini-hide">Eventos</span></a>
                        </li>
                    @endif
                    @if($auth->hasProfile('Vencimientos'))
                        <li>
                            <a class="{{in_array($route,['admin.calendar_vencimientos.index'])?'active':''}}" href="{{route('admin.calendar_vencimientos.index')}}"><i class="fa fa-calendar"></i><span class="sidebar-mini-hide">Vencimientos</span></a>
                        </li>
                    @endif
                    @if($auth->hasProfile('Marketing'))
                    <li>
                        <a class="{{in_array($route,['admin.campanias.index'])?'active':''}}" href="{{route('admin.campanias.index')}}"><i class="fa fa-window-restore"></i><span class="sidebar-mini-hide">Campañas</span></a>
                    </li>
                    @endif
                    @if($auth->isGod())
                        <li>
                            <a class="{{in_array($route,['admin.fields.index'])?'active':''}}" href="{{route('admin.fields.index')}}"><i class="fa fa-cog"></i><span class="sidebar-mini-hide">Encabezado y Pié</span></a>
                        </li>
                        <li>
                            <a class="{{in_array($route,['admin.alert.list'])?'active':''}} {{in_array($route,['admin.alert.edit'])?'active':''}}" href="{{route('admin.alert.list')}}"><i class="fa fa-warning"></i><span class="sidebar-mini-hide">Alertas</span></a>
                        </li>
                        <li>
                            <a class="{{in_array($route,['admin.user.list'])?'active':''}} {{in_array($route,['admin.user.edit'])?'active':''}}" href="{{route('admin.user.list')}}"><i class="si si-users"></i><span class="sidebar-mini-hide">Usuarios</span></a>
                        </li>
                    @endif

{{--                    
                    <li>
                        <a class="" href=""><i class="si si-layers"></i><span class="sidebar-mini-hide">Contenidos</span></a>
                    </li>
                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-badge"></i><span class="sidebar-mini-hide">Page Kits</span></a>
                        <ul>
                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#"><span class="sidebar-mini-hide">aaaDashboards</span></a>
                                <ul>
                                    <li>
                                        <a href="be_pages_dashboard2.php"><span class="sidebar-mini-hide">Dashboard 2</span></a>
                                    </li>
                                    <li>
                                        <a href="be_pages_dashboard3.php"><span class="sidebar-mini-hide">Dashboard 3</span></a>
                                    </li>
                                    <li>
                                        <a href="be_pages_dashboard4.php"><span class="sidebar-mini-hide">xxxxxxx 4</span></a>
                                    </li>
                                    <li>
                                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><span class="sidebar-mini-hide">Crypto</span></a>
                                        <ul>
                                            <li>
                                                <a href="be_pages_crypto_dashboard.php">Dashboard</a>
                                            </li>
                                            <li>
                                                <a href="be_pages_crypto_buy_sell.php">Buy/Sell</a>
                                            </li>
                                            <li>
                                                <a href="be_pages_crypto_wallets.php">Wallets</a>
                                            </li>
                                            <li>
                                                <a href="be_pages_crypto_settings.php">Settings</a>
                                            </li>
                                            <li>
                                                <a class="nav-submenu" data-toggle="nav-submenu" href="#"><span class="sidebar-mini-hide">Crypto</span></a>
                                                <ul>
                                                    <li>
                                                        <a href="be_pages_crypto_dashboard.php">Dashboard</a>
                                                    </li>
                                                    <li>
                                                        <a href="be_pages_crypto_buy_sell.php">Buy/Sell</a>
                                                    </li>
                                                    <li>
                                                        <a href="be_pages_crypto_wallets.php">Wallets</a>
                                                    </li>
                                                    <li>
                                                        <a href="be_pages_crypto_settings.php">Settings</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#"><span class="sidebar-mini-hide">Crypto</span></a>
                                <ul>
                                    <li>
                                        <a href="be_pages_crypto_dashboard.php">Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="be_pages_crypto_buy_sell.php">Buy/Sell</a>
                                    </li>
                                    <li>
                                        <a href="be_pages_crypto_wallets.php">Wallets</a>
                                    </li>
                                    <li>
                                        <a href="be_pages_crypto_settings.php">Settings</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#"><span class="sidebar-mini-hide">e-Commerce</span></a>
                                <ul>
                                    <li>
                                        <a href="be_pages_ecom_dashboard.php">Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="be_pages_ecom_orders.php">Orders</a>
                                    </li>
                                    <li>
                                        <a href="be_pages_ecom_order.php">Order</a>
                                    </li>
                                    <li>
                                        <a href="be_pages_ecom_products.php">Products</a>
                                    </li>
                                    <li>
                                        <a href="be_pages_ecom_product_edit.php">Product Edit</a>
                                    </li>
                                    <li>
                                        <a href="be_pages_ecom_customer.php">Customer</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#"><span class="sidebar-mini-hide">e-Learning</span></a>
                                <ul>
                                    <li>
                                        <a href="be_pages_elearning_courses.php">Courses</a>
                                    </li>
                                    <li>
                                        <a href="be_pages_elearning_course.php">Course</a>
                                    </li>
                                    <li>
                                        <a href="be_pages_elearning_lesson.php">Lesson</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#"><span class="sidebar-mini-hide">Forum</span></a>
                                <ul>
                                    <li>
                                        <a href="be_pages_forum_categories.php">Categories</a>
                                    </li>
                                    <li>
                                        <a href="be_pages_forum_topics.php">Topics</a>
                                    </li>
                                    <li>
                                        <a href="be_pages_forum_discussion.php">Discussion</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#"><span class="sidebar-mini-hide">Boxed Backend</span></a>
                                <ul>
                                    <li>
                                        <a href="bd_dashboard.php">Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="bd_search.php">Search</a>
                                    </li>
                                    <li>
                                        <a href="bd_variations_hero_simple_1.php">Hero Simple 1</a>
                                    </li>
                                    <li>
                                        <a href="bd_variations_hero_simple_2.php">Hero Simple 2</a>
                                    </li>
                                    <li>
                                        <a href="bd_variations_hero_simple_3.php">Hero Simple 3</a>
                                    </li>
                                    <li>
                                        <a href="bd_variations_hero_simple_4.php">Hero Simple 4</a>
                                    </li>
                                    <li>
                                        <a href="bd_variations_hero_image_1.php">Hero Image 1</a>
                                    </li>
                                    <li>
                                        <a href="bd_variations_hero_image_2.php">Hero Image 2</a>
                                    </li>
                                    <li>
                                        <a href="bd_variations_hero_image_3.php">Hero Image 3</a>
                                    </li>
                                    <li>
                                        <a href="bd_variations_hero_image_4.php">Hero Image 4</a>
                                    </li>
                                    <li>
                                        <a href="bd_variations_hero_video_1.php">Hero Video 1</a>
                                    </li>
                                    <li>
                                        <a href="bd_variations_hero_video_2.php">Hero Video 2</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li> --}}



                     {{--
                    <li class="nav-main-heading"><span class="sidebar-mini-visible">UI</span><span class="sidebar-mini-hidden">User Interface</span></li>
                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-puzzle"></i><span class="sidebar-mini-hide">Blocks</span></a>
                        <ul>
                            <li>
                                <a href="be_blocks.php">Styles</a>
                            </li>
                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#">Widgets</a>
                                <ul>
                                    <li>
                                        <a href="be_blocks_widgets_users.php">Users</a>
                                    </li>
                                    <li>
                                        <a href="be_blocks_widgets_stats.php">Stats</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="be_blocks_tiles.php">Tiles</a>
                            </li>
                            <li>
                                <a href="be_blocks_draggable.php">Draggable</a>
                            </li>
                            <li>
                                <a href="be_blocks_api.php">API</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-note"></i><span class="sidebar-mini-hide">Forms</span></a>
                        <ul>
                            <li>
                                <a href="be_forms_elements_bootstrap.php">Bootstrap Elements</a>
                            </li>
                            <li>
                                <a href="be_forms_elements_material.php">Material Elements</a>
                            </li>
                            <li>
                                <a href="be_forms_css_inputs.php">CSS Inputs</a>
                            </li>
                            <li>
                                <a href="be_forms_plugins.php">Plugins</a>
                            </li>
                            <li>
                                <a href="be_forms_editors.php">Editors</a>
                            </li>
                            <li>
                                <a href="be_forms_validation.php">Validation</a>
                            </li>
                            <li>
                                <a href="be_forms_wizard.php">Wizard</a>
                            </li>
                            <li>
                                <a href="be_forms_premade.php">Pre-made</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-main-heading"><span class="sidebar-mini-visible">BD</span><span class="sidebar-mini-hidden">Build</span></li>
                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-vector"></i><span class="sidebar-mini-hide">Layout</span></a>
                        <ul>
                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#">General</a>
                                <ul>
                                    <li>
                                        <a href="be_layout_default.php">Default</a>
                                    </li>
                                    <li>
                                        <a href="be_layout_flipped.php">Flipped</a>
                                    </li>
                                    <li>
                                        <a href="be_layout_native_scrolling.php">Native Scrolling</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#">Header</a>
                                <ul>
                                    <li>
                                        <a class="nav-submenu" data-toggle="nav-submenu" href="#">Static</a>
                                        <ul>
                                            <li>
                                                <a href="be_layout_header_modern.php">Modern</a>
                                            </li>
                                            <li>
                                                <a href="be_layout_header_classic.php">Classic</a>
                                            </li>
                                            <li>
                                                <a href="be_layout_header_classic_inverse.php">Classic Inverse</a>
                                            </li>
                                            <li>
                                                <a href="be_layout_header_glass.php">Glass</a>
                                            </li>
                                            <li>
                                                <a href="be_layout_header_glass_inverse.php">Glass Inverse</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a class="nav-submenu" data-toggle="nav-submenu" href="#">Fixed</a>
                                        <ul>
                                            <li>
                                                <a href="be_layout_header_fixed_modern.php">Modern</a>
                                            </li>
                                            <li>
                                                <a href="be_layout_header_fixed_classic.php">Classic</a>
                                            </li>
                                            <li>
                                                <a href="be_layout_header_fixed_classic_inverse.php">Classic Inverse</a>
                                            </li>
                                            <li>
                                                <a href="be_layout_header_fixed_glass.php">Glass</a>
                                            </li>
                                            <li>
                                                <a href="be_layout_header_fixed_glass_inverse.php">Glass Inverse</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#">Sidebar</a>
                                <ul>
                                    <li>
                                        <a href="be_layout_sidebar_inverse.php">Inverse</a>
                                    </li>
                                    <li>
                                        <a href="be_layout_sidebar_hidden.php">Hidden</a>
                                    </li>
                                    <li>
                                        <a href="be_layout_sidebar_mini.php">Mini</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#">Side Overlay</a>
                                <ul>
                                    <li>
                                        <a href="be_layout_side_overlay_visible.php">Visible</a>
                                    </li>
                                    <li>
                                        <a href="be_layout_side_overlay_hoverable.php">Hoverable</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#">Main Content</a>
                                <ul>
                                    <li>
                                        <a href="be_layout_content_boxed.php">Boxed</a>
                                    </li>
                                    <li>
                                        <a href="be_layout_content_narrow.php">Narrow</a>
                                    </li>
                                    <li>
                                        <a href="be_layout_content_full_width.php">Full Width</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#">Hero</a>
                                <ul>
                                    <li>
                                        <a href="be_layout_hero_color.php">Color</a>
                                    </li>
                                    <li>
                                        <a href="be_layout_hero_image.php">Image</a>
                                    </li>
                                    <li>
                                        <a href="be_layout_hero_video.php">Video</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="be_layout_api.php">API</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-trophy"></i><span class="sidebar-mini-hide">Components</span></a>
                        <ul>
                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#"><span class="sidebar-mini-hide">Main Menu</span></a>
                                <ul>
                                    <li>
                                        <a href="#">Link 1-1</a>
                                    </li>
                                    <li>
                                        <a href="#">Link 1-2</a>
                                    </li>
                                    <li>
                                        <a class="nav-submenu" data-toggle="nav-submenu" href="#">Sub Level 2</a>
                                        <ul>
                                            <li>
                                                <a href="#">Link 2-1</a>
                                            </li>
                                            <li>
                                                <a href="#">Link 2-2</a>
                                            </li>
                                            <li>
                                                <a class="nav-submenu" data-toggle="nav-submenu" href="#">Sub Level 3</a>
                                                <ul>
                                                    <li>
                                                        <a href="#">Link 3-1</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Link 3-2</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#">Chat</a>
                                <ul>
                                    <li>
                                        <a href="be_comp_chat_multiple.php">Multiple</a>
                                    </li>
                                    <li>
                                        <a href="be_comp_chat_single.php">Single</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="be_comp_charts.php">Charts</a>
                            </li>
                            <li>
                                <a href="be_comp_gallery.php">Gallery</a>
                            </li>
                            <li>
                                <a href="be_comp_sliders.php">Sliders</a>
                            </li>
                            <li>
                                <a href="be_comp_scrolling.php">Scrolling</a>
                            </li>
                            <li>
                                <a href="be_comp_rating.php">Rating</a>
                            </li>
                            <li>
                                <a href="be_comp_filtering.php">Filtering</a>
                            </li>
                            <li>
                                <a href="be_comp_appear.php">Appear</a>
                            </li>
                            <li>
                                <a href="be_comp_countto.php">CountTo</a>
                            </li>
                            <li>
                                <a href="be_comp_calendar.php">Calendar</a>
                            </li>
                            <li>
                                <a href="be_comp_image_cropper.php">Image Cropper</a>
                            </li>
                            <li>
                                <a href="be_comp_maps_google.php">Google Maps</a>
                            </li>
                            <li>
                                <a href="be_comp_maps_vector.php">Vector Maps</a>
                            </li>
                            <li>
                                <a href="be_comp_syntax_highlighting.php">Syntax Highlighting</a>
                            </li>
                        </ul>
                    </li> --}}

                </ul>
            </div>
            <!-- END Side Navigation -->
        </div>
        <!-- Sidebar Content -->
    </div>
    <!-- END Sidebar Scroll Container -->
</nav>
<!-- END Sidebar -->


