<!-- Navbar -->
<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box"style="padding-top: 30px;background:#683091;">
                <a class="logo logo-light">
                    <span class="logo-lg">
                        <h5 style="color:#ffff; font-weight: bold;">নৈমিত্তিক ছুটি ব্যবস্থাপনা</h5>
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <!-- App Search-->
            <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="bx bx-search-alt"></span>
                </div>
            </form>
        </div>

        <div class="d-flex">
            <div class="dropdown d-inline-block d-lg-none ml-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-magnify"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                    aria-labelledby="page-header-search-dropdown">
                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ..."
                                    aria-label="Recipient's username">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i
                                            class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{-- <img class="rounded-circle header-profile-user" src="{{asset('assets\images\users\avatar-1.jpg')}}" alt="Header Avatar"> --}}
                    <i style="color: red; hight:20px" class="fas fa-bell">8</i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{ url('/pending/application') }}">Name:Reason</a>
                    <a class="dropdown-item" href="{{ url('/pending/application') }}">সব দেখুন</a>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{-- <img class="rounded-circle header-profile-user" src="{{asset('assets\images\users\avatar-1.jpg')}}" alt="Header Avatar"> --}}
                    <i style="color: red; hight:20px" class="fas fa-bell">23</i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Reason:অনুমোদিত</a>
                    <a class="dropdown-item" href="#">Reason:প্রত্যাখ্যাত</a>
                    <a class="dropdown-item" href="{{ url('/application/list', session()->get('id')) }}">সব
                        দেখুন</a>
                </div>
            </div>
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{-- <img class="rounded-circle header-profile-user" src="{{asset('assets\images\users\avatar-1.jpg')}}" alt="Header Avatar"> --}}
                    <span class="d-none d-xl-inline-block ml-1">{{ session()->get('username') }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- item-->
                    @if ($req = session()->get('role') == 2)
                        <a class="dropdown-item" href="{{ url('/admin/profile') }}"><i
                                class="bx bx-user font-size-16 align-middle mr-1"></i> প্রোফাইল</a>
                    @endif
                    @if ($req = session()->get('role') == 3)
                        <a class="dropdown-item" href="{{ url('/employee/profile') }}"><i
                                class="bx bx-user font-size-16 align-middle mr-1"></i> প্রোফাইল</a>
                    @endif
                    <a class="dropdown-item text-danger" href="/logout"><i
                            class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i>প্রস্থান
                        করুন</a>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- ./Navbar -->
