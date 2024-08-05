    <!-- begin::navigation -->
    <div class="navigation">
     @php
        $isAdministrator = auth()->check() && auth()->user()->department_id == 1;
        $departments = DB::connection('sqlsrv')
            ->table('departments')
            ->whereNotNull('name')
            ->get();
    @endphp
        <div class="navigation-menu-tab">
            <div>
                <div class="navigation-menu-tab-header" data-toggle="tooltip" title="Roxana Roussell"
                    data-placement="right">
                    <a href="#" class="nav-link" data-toggle="dropdown" aria-expanded="false">
                        <figure class="avatar avatar-sm">
                            <img src="https://media.jobthai.com/v1/images/logo-pic-map/74459_logo_20200722134112.png"
                                class="rounded-circle" alt="avatar">
                        </figure>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                        <div class="p-3 text-center"
                            data-backround-image="https://media.jobthai.com/v1/images/logo-pic-map/74459_logo_20200722134112.png">
                            <figure class="avatar mb-3">
                                <img src="https://media.jobthai.com/v1/images/logo-pic-map/74459_logo_20200722134112.png"
                                    class="rounded-circle" alt="image">
                            </figure>
                            <h6 class="d-flex align-items-center justify-content-center">
                                Roxana Roussell
                                <a href="#" class="btn btn-primary btn-sm ml-2" data-toggle="tooltip"
                                    title="Edit profile">
                                    <i data-feather="edit-2"></i>
                                </a>
                            </h6>
                            <small>Balance: <strong>$105</strong></small>
                        </div>
                        <div class="dropdown-menu-body">
                            <div class="border-bottom p-4">
                                <h6 class="text-uppercase font-size-11 d-flex justify-content-between">
                                    Storage
                                    <span>%25</span>
                                </h6>
                                <div class="progress" style="height: 8px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 35%;"
                                        aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="list-group list-group-flush">
                                <a href="#" class="list-group-item">Profile</a>
                                <a href="#" class="list-group-item d-flex">
                                    Followers <span class="text-muted ml-auto">214</span>
                                </a>
                                <a href="#" class="list-group-item d-flex">
                                    Inbox <span class="text-muted ml-auto">18</span>
                                </a>
                                <a href="#" class="list-group-item" data-sidebar-target="#settings">Billing</a>
                                <a href="#" class="list-group-item" data-sidebar-target="#settings">Need help?</a>
                                <a href="#" class="list-group-item text-danger"
                                    data-sidebar-target="#settings">Sign Out!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-grow-1">
                <ul>
                    <li>
                        <a class="active" href="#" data-toggle="tooltip" data-placement="right" title="Dashboards"
                            data-nav-target="#dashboards">
                            <i data-feather="bar-chart-2"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" data-toggle="tooltip" data-placement="right" title="Apps"
                            data-nav-target="#apps">
                            <i data-feather="command"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" data-toggle="tooltip" data-placement="right" title="UI Elements"
                            data-nav-target="#elements">
                            <i data-feather="layers"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" data-toggle="tooltip" data-placement="right" title="Pages"
                            data-nav-target="#pages">
                            <i data-feather="copy"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div>
                <ul>
                    <li>
                        <a href="#" data-toggle="tooltip" data-placement="right" title="Settings">
                            <i data-feather="settings"></i>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        <!-- begin::navigation menu -->
        <div class="navigation-menu-body">

            <!-- begin::navigation-logo -->
            <div>
                <div id="navigation-logo">
                    <a href="index.html">
                        <img class="logo"
                            src="https://media.jobthai.com/v1/images/logo-pic-map/74459_logo_20200722134112.png"
                            style="height: 50px" alt="logo">
                        <img class="logo-light"
                            src="https://media.jobthai.com/v1/images/logo-pic-map/74459_logo_20200722134112.png"
                            style="height: 50px" alt="light logo">
                    </a>
                </div>
            </div>
            <!-- end::navigation-logo -->

            <div class="navigation-menu-group">

                <div class="open" id="dashboards">
                    <ul>
                        <li class="navigation-divider">Dashboards</li>
                        <li><a class="active" href="index.html">Menu</a></li>

                    @if ($isAdministrator)
                        @foreach ($departments as $department)
                            @if ($department->name == 'โรงยาง' && auth()->user()->department_id == 1)
                                <li>
                                    <a href="#">1.ข้อมูลสูตรยาง</a>
                                    <ul>
                                        <li><a href="{{ url('/admin/rubbers/create') }}"><i data-feather="plus-circle"></i> เพิ่มสูตรยาง</a></li>
                                        <li><a href="{{ url('/admin/rubbers/testlabstep') }}"><i data-feather="server"></i> บันทึกข้อมูล</a></li>
                                        <li><a href="{{ url('/admin/rubbers') }}"><i data-feather="git-merge"></i> สูตรยางสำเร็จ</a></li>
                                    </ul>
                                </li>
                            @endif
                        @endforeach
                    @endif
                        <li>
                            <a href="#">2.สั่งผลิด</a>
                            <ul>
                                <li><a href="alerts.html"><i data-feather="plus-circle"></i> เปิดใบสั่งผลิต</a></li>
                                <li><a href="alerts.html"><i data-feather="edit"></i>แก้ใขใบสั่งผลิต</a></li>
                                <li><a href="alerts.html"><i data-feather="file-minus"></i>ดูใบสั่งผลิตทั้งหมด</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">3.ติดตามงาน</a>
                            <ul>
                                <li><a href="alerts.html">Alert</a></li>
                                <li><a href="accordion.html">Accordion</a></li>
                                <li><a href="buttons.html">Buttons</a></li>
                                <li><a href="dropdown.html">Dropdown</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">4.คลัง Compound</a>
                            <ul>
                                <li><a href="alerts.html">Alert</a></li>
                                <li><a href="accordion.html">Accordion</a></li>
                                <li><a href="buttons.html">Buttons</a></li>
                                <li><a href="dropdown.html">Dropdown</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">5.อนุมัติรายการ</a>
                            <ul>
                                <li><a href="alerts.html">Alert</a></li>
                                <li><a href="accordion.html">Accordion</a></li>
                                <li><a href="buttons.html">Buttons</a></li>
                                <li><a href="dropdown.html">Dropdown</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">6.จัดการข้อมูลหลัก</a>
                            <ul>
                                <li><a href="alerts.html">Alert</a></li>
                                <li><a href="accordion.html">Accordion</a></li>
                                <li><a href="buttons.html">Buttons</a></li>
                                <li><a href="dropdown.html">Dropdown</a></li>
                            </ul>
                        </li>
                        <li class="navigation-divider">Followers</li>
                        <li>
                            {{-- @if (auth()->check())
                                @if (auth()->user()->isOnline())
                                    <p>User is currently online</p>
                                @else
                                    <p>User is currently offline</p>
                                @endif
                            @else
                                <p>User is not logged in</p>
                            @endif --}}
                            {{-- <div class="avatar-group ml-4">
                                <a href="#" class="avatar">
                                    <span class="avatar-title bg-success rounded-circle">E</span>
                                </a>
                                <a href="#" class="avatar">
                                    <img src="https://via.placeholder.com/128X128" class="rounded-circle" alt="avatar">
                                </a>
                                <a href="#" class="avatar">
                                    <img src="https://via.placeholder.com/128X128" class="rounded-circle" alt="avatar">
                                </a>
                                <a href="#" class="avatar">
                                    <span class="avatar-title bg-info rounded-circle">C</span>
                                </a>
                                <a href="#" class="avatar">
                                    <span class="avatar-title bg-dark rounded-circle">+30</span>
                                </a>
                            </div> --}}
                        </li>
                    </ul>
                </div>
                <div id="apps">
                    <ul>
                        <li class="navigation-divider">Web Apps</li>
                        <li>
                            <a href="chat.html">
                                <span>Chat</span>
                                <span class="badge badge-danger">5</span>
                            </a>
                        </li>
                        <li>
                            <a href="inbox.html">
                                <span>Mail</span>
                            </a>
                        </li>
                        <li>
                            <a href="app-todo.html">
                                <span>Todo</span>
                                <span class="badge badge-warning">2</span>
                            </a>
                        </li>
                        <li>
                            <a href="file-manager.html">
                                <span>File Manager</span>
                            </a>
                        </li>
                        <li>
                            <a href="calendar.html">
                                <span>Calendar</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div id="elements">
                    <ul>
                        <li class="navigation-divider">UI Elements</li>
                        <li>
                            <a href="#">Basic</a>
                            <ul>
                                <li><a href="alerts.html">Alert</a></li>
                                <li><a href="accordion.html">Accordion</a></li>
                                <li><a href="buttons.html">Buttons</a></li>
                                <li><a href="dropdown.html">Dropdown</a></li>
                                <li><a href="list-group.html">List Group</a></li>
                                <li><a href="pagination.html">Pagination</a></li>
                                <li><a href="typography.html">Typography</a></li>
                                <li><a href="media-object.html">Media Object</a></li>
                                <li><a href="progress.html">Progress</a></li>
                                <li><a href="modal.html">Modal</a></li>
                                <li><a href="spinners.html">Spinners</a></li>
                                <li><a href="navs.html">Navs</a></li>
                                <li><a href="tab.html">Tab</a></li>
                                <li><a href="tooltip.html">Tooltip</a></li>
                                <li><a href="popovers.html">Popovers</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Cards</a>
                            <ul>
                                <li><a href="basic-cards.html">Basic Cards </a></li>
                                <li><a href="image-cards.html">Image Cards </a></li>
                                <li><a href="card-scroll.html">Card Scroll </a></li>
                                <li><a href="other-cards.html">Others </a></li>
                            </ul>
                        </li>
                        <li><a href="avatar.html">Avatar</a></li>
                        <li><a href="icons.html">Icons</a></li>
                        <li><a href="colors.html">Colors</a></li>
                        <li>
                            <a href="#">Plugins</a>
                            <ul>
                                <li><a href="sweet-alert.html">Sweet Alert</a></li>
                                <li><a href="lightbox.html">Lightbox</a></li>
                                <li><a href="toast.html">Toast</a></li>
                                <li><a href="tour.html">Tour</a></li>
                                <li><a href="slick-slide.html">Slick Slide</a></li>
                                <li><a href="nestable.html">Nestable</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Forms</a>
                            <ul>
                                <li><a href="basic-form.html">Form Layouts</a></li>
                                <li><a href="custom-form.html">Custom Forms</a></li>
                                <li><a href="advanced-form.html">Advanced Form</a></li>
                                <li><a href="form-validation.html">Validation</a></li>
                                <li><a href="form-wizard.html">Wizard</a></li>
                                <li><a href="file-upload.html">File Upload</a></li>
                                <li><a href="datepicker.html">Datepicker</a></li>
                                <li><a href="timepicker.html">Timepicker</a></li>
                                <li><a href="colorpicker.html">Colorpicker</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Tables</a>
                            <ul>
                                <li><a href="tables.html">Basic Tables</a></li>
                                <li><a href="data-table.html">Datatable</a></li>
                                <li><a href="responsive-table.html">Responsive Tables</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Charts</a>
                            <ul>
                                <li><a href="apexchart.html">Apex</a></li>
                                <li><a href="chartjs.html">Chartjs</a></li>
                                <li><a href="justgage.html">Justgage</a></li>
                                <li><a href="morsis.html">Morsis</a></li>
                                <li><a href="peity.html">Peity</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Maps</a>
                            <ul>
                                <li><a href="google-map.html">Google</a></li>
                                <li><a href="vector-map.html">Vector</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div id="pages">
                    <ul>
                        <li class="navigation-divider">Pages</li>
                        <li><a href="login.html">Login</a></li>
                        <li><a href="register.html">Register</a></li>
                        <li><a href="recover-password.html">Recovery Password</a></li>
                        <li><a href="lock-screen.html">Lock Screen</a></li>
                        <li><a href="profile.html">Profile</a></li>
                        <li><a href="timeline.html">Timeline</a></li>
                        <li><a href="invoice.html">Invoice</a></li>

                        <li><a href="pricing-table.html">Pricing Table</a></li>
                        <li><a href="search-result.html">Search Result</a></li>
                        <li>
                            <a href="#">Error Pages</a>
                            <ul>
                                <li><a href="404.html">404</a></li>
                                <li><a href="404-2.html">404 V2</a></li>
                                <li><a href="503.html">503</a></li>
                                <li><a href="mean-at-work.html">Mean at Work</a></li>
                            </ul>
                        </li>
                        <li><a href="blank-page.html">Starter Page</a></li>
                        <li>
                            <a href="#">Email Templates</a>
                            <ul>
                                <li><a href="email-template-basic.html">Basic</a></li>
                                <li><a href="email-template-alert.html">Alert</a></li>
                                <li><a href="email-template-billing.html">Billing</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Menu Level</a>
                            <ul>
                                <li>
                                    <a href="#">Menu Level</a>
                                    <ul>
                                        <li>
                                            <a href="#">Menu Level </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end::navigation menu -->

    </div>
    <!-- end::navigation -->
