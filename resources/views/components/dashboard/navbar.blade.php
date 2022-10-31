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
        </div>

        <div class="d-flex">
            {{--            <div class="dropdown d-inline-block"> --}}
            {{--                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" --}}
            {{--                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> --}}
            {{--                    --}}{{-- <img class="rounded-circle header-profile-user" src="{{asset('assets\images\users\avatar-1.jpg')}}" alt="Header Avatar"> --}}
            {{--                    <i style="color: red; hight:20px" class="fas fa-bell">8</i> --}}
            {{--                </button> --}}
            {{--                <div class="dropdown-menu dropdown-menu-right"> --}}
            {{--                    <a class="dropdown-item" href="{{ url('/pending/application') }}">Name:Reason</a> --}}
            {{--                    <a class="dropdown-item" href="{{ url('/pending/application') }}">সব দেখুন</a> --}}
            {{--                </div> --}}
            {{--            </div> --}}

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{-- <img class="rounded-circle header-profile-user" src="{{asset('assets\images\users\avatar-1.jpg')}}" alt="Header Avatar"> --}}
                    <i style="color: red; hight:20px" class="fas fa-bell">1</i>
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
                    <span class="d-none d-xl-inline-block ml-1">{{ auth()->user()->username }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    @if (auth()->user()->role == 2)
                        <a class="dropdown-item" href="{{ url('/admin/profile') }}"><i
                                class="bx bx-user font-size-16 align-middle mr-1"></i> প্রোফাইল</a>
                    @endif
                    @if (auth()->user()->role == 3)
                        <a class="dropdown-item" href="{{ url('/employee/profile') }}"><i
                                class="bx bx-user font-size-16 align-middle mr-1"></i> প্রোফাইল</a>
                    @endif

                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">প্রস্থান
                            করুন</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- ./Navbar -->
