<!-- Sidebar -->
<div class="vertical-menu">
    <div data-simplebar="" style="background: #683091;" class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">মেনু</li>
                <li>
                    <a href="{{ route('home') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i><span class="badge badge-pill badge-info float-right"></span>
                        <span>ড্যাশবোর্ড</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-user"></i>
                        <span>কর্মকর্তা/কর্মচারী</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('employee.create') }}">কর্মকর্তা/কর্মচারী যোগ করুন</a></li>
                        <li><a href="{{ route('admin.list') }}">অ্যাডমিন তালিকা</a></li>
                        <li><a href="{{ route('employee.list') }}">কর্মকর্তা/কর্মচারী তালিকা</a></li>
                    </ul>
                </li>

                @if (auth()->user()->role == '1')
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-user"></i>
                            <span>পদবি</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('designation.index') }}">পদবি তালিকা</a></li>
                            <li><a href="{{ route('designation.create') }}">পদবি যোগ করুন</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-user"></i>
                            <span>শাখা</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('branch.index') }}">শাখা তালিকা</a></li>
                            <li><a href="{{ route('branch.create') }}">শাখা যোগ করুন</a></li>
                        </ul>
                    </li>
                @endif

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-user"></i>
                        <span>আবেদন</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('application.form') }}">আবেদন করুন</a></li>
                        {{--                        <li><a href="#">ফেরৎ আবেদনের তালিকা</a></li> --}}
                        <li><a href="{{ route('application.own.list') }}">আমার আবেদন তালিকা</a></li>
                        <li><a href="{{ route('pending.application') }}">অপেক্ষমান তালিকা</a></li>
                        {{--                        <li><a href="#">আবেদনকৃত তালিকা</a></li> --}}
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-user"></i>
                        <span>Report</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">

                        <li><a href="{{ route('report') }}">Advance Report</a></li>
                    </ul>
                </li>


            </ul>
        </div>
    </div>
</div>
<!-- ./Sidebar -->
