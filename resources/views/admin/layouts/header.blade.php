<div class="header">

    @php
    $isAdministrator = auth()->check() && auth()->user()->role_as == 0;
    @endphp
    @php
    $depart = DB::connection('sqlsrv')
    ->table('departments')
    ->whereNotNull('name')
    ->get();
    @endphp

    <div>
        <ul class="navbar-nav">

            <!-- begin::navigation-toggler -->
            <li class="nav-item navigation-toggler">
                <a href="#" class="nav-link" title="Hide navigation">
                    <i data-feather="arrow-left"></i>
                </a>
            </li>
            <li class="nav-item navigation-toggler mobile-toggler">
                <a href="#" class="nav-link" title="Show navigation">
                    <i data-feather="menu"></i>
                </a>
            </li>
            <!-- end::navigation-toggler -->
            <li class="nav-item">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Create</a>
                @foreach ($depart as $department)
                    <div class="dropdown-menu">
                        @if ($department->name == 'โรงยาง' && auth()->user()->department_id == 1)
                            <a href="{{ url('/admin/rubbers/create') }}" class="dropdown-item">เพิ่มสูตรยาง</a>
                        @endif

                        @if (!$isAdministrator)
                            <a href="{{ url('/admin/customers/create') }}" class="dropdown-item">เพิ่มลูกค้า</a>
                            <a href="{{ url('/admin/products/create') }}" class="dropdown-item">เพิ่มกลุ่มสินค้า</a>
                            <a href="{{ url('/admin/departments/create') }}" class="dropdown-item">เพิ่มแผนก</a>
                            <a href="{{ url('/admin/usermanagement/create') }}" class="dropdown-item">เพิ่มผู้ใช้</a>
                        @endif
                    </div>
                @endforeach
            </li>

            @if (!$isAdministrator)
                <li class="nav-item">
                    <a href="{{ url('/admin/customers') }}" class="nav-link {{ Request::is('admin/customers*') ? 'active' : '' }}" data-toggle="">ชื่อลูกค้า</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/admin/products') }}" class="nav-link {{ Request::is('admin/customers*') ? 'active' : '' }}" data-toggle="">กลุ่มสินค้า</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/admin/departments') }}" class="nav-link {{ Request::is('admin/departments*') ? 'active' : '' }}" data-toggle="">แผนก</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/admin/usermanagement') }}" class="nav-link {{ Request::is('admin/usermanagement*') ? 'active' : '' }}" data-toggle="">ผู้ใช้</a>
                </li>
            @endif
            {{-- <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Apps</a>
                <div class="dropdown-menu dropdown-menu-big">
                    <div class="p-3">
                        <div class="row row-xs">
                            <div class="col-6">
                                <a href="chat.html">
                                    <div class="p-3 border-radius-1 border text-center mb-3">
                                        <i class="width-23 height-23" data-feather="message-circle"></i>
                                        <div class="mt-2">Chat</div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="inbox.html">
                                    <div class="p-3 border-radius-1 border text-center mb-3">
                                        <i class="width-23 height-23" data-feather="mail"></i>
                                        <div class="mt-2">Mail</div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="app-todo.html">
                                    <div class="p-3 border-radius-1 border text-center">
                                        <i class="width-23 height-23" data-feather="check-circle"></i>
                                        <div class="mt-2">Todo</div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="file-manager.html">
                                    <div class="p-3 border-radius-1 border text-center">
                                        <i class="width-23 height-23" data-feather="file"></i>
                                        <div class="mt-2">File Manager</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </li> --}}
        </ul>
    </div>

    <div>
        <ul class="navbar-nav">

            {{-- <li class="nav-item">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <img width="18" class="mr-2" src="assets/media/image/flags/261-china.png" alt="flag"> China
                </a>
                <div class="dropdown-menu">
                    <a href="#" class="dropdown-item">
                        <img width="18" src="assets/media/image/flags/003-tanzania.png" class="mr-2" alt="flag">
                        Tanzania
                    </a>
                    <a href="#" class="dropdown-item">
                        <img width="18" src="assets/media/image/flags/262-united-kingdom.png" class="mr-2"
                             alt="flag"> United Kingdom
                    </a>
                    <a href="#" class="dropdown-item">
                        <img width="18" src="assets/media/image/flags/013-tunisia.png" class="mr-2" alt="flag">
                        Tunisia
                    </a>
                    <a href="#" class="dropdown-item">
                        <img width="18" src="assets/media/image/flags/044-spain.png" class="mr-2" alt="flag"> Spain
                    </a>
                </div>
            </li> --}}

            <!-- begin::header search -->
            {{-- <li class="nav-item">
                <a href="#" class="nav-link" title="Search" data-toggle="dropdown">
                    <i data-feather="search"></i>
                </a>
                <div class="dropdown-menu p-2 dropdown-menu-right">
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <div class="input-group-prepend">
                                <button class="btn" type="button">
                                    <i data-feather="search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li> --}}
            <!-- end::header search -->

            <!-- begin::header minimize/maximize -->
{{-- <li class="nav-item dropdown">
                <a href="#" class="nav-link" title="Fullscreen" data-toggle="fullscreen">
                    <i class="maximize" data-feather="maximize"></i>
                    <i class="minimize" data-feather="minimize"></i>
                </a>
            </li>

        </ul> --}}
        <li class="nav-item dropdown">

            @auth
                @if(auth()->user()->name === 'Apirak')
                    <p>Welcome, <strong>Admin</strong></p>
                @else
                    <p>Welcome, <strong>{{ auth()->user()->name }}</strong></p>
                @endif
            @else
                <p>Welcome, Guest</p>
            @endauth

        </li>

    </ul>

        <!-- begin::mobile header toggler -->
        <ul class="navbar-nav d-flex align-items-center">
            <li class="nav-item header-toggler">
                <a href="#" class="nav-link">
                    <i data-feather="arrow-down"></i>
                </a>
            </li>
        </ul>
        <!-- end::mobile header toggler -->
    </div>

</div>
