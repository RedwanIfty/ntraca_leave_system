<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ url('public/assets/images/log.png') }}">

    <title>নৈমিত্তিক ছুটি ব্যবস্থাপনা</title>

    <!-- Bootstrap Css -->
    <link href="{{ url('public/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="{{ url('public/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="{{ url('public/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-soft-primary">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">নৈমিত্তিক ছুটি ব্যবস্থাপনায় আপনাকে স্বাগতম!</h5>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="{{ url('public/assets/images/profile-img.png') }}" alt=""
                                        class="img-fluid">
                                </div>
                            </div>
                        </div>

                        <div class="card-body pt-0">
                            <div>
                                <a>
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="{{ url('public/assets/images/log.png') }}" alt=""
                                                class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>
                            </div>

                            @forelse($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @empty
                            @endforelse

                            <div class="p-2 pb-3">
                                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <x-auth.input id='username' type='text' label='ইমেইল/মোবাইল নম্বর' />
                                    <x-auth.input id='password' type='password' label='পাসওয়ার্ড' />

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customControlInline">
                                        <label class="custom-control-label" for="customControlInline">স্মরণ
                                            রাখুন</label>
                                        <a href="#" class="font-weight-medium text-primary"
                                            style="padding-left: 147px;">অ্যাকাউন্টটি পুনরূদ্ধার করুন</a></p>
                                    </div>

                                    <div class="mt-3">
                                        <button class="btn btn-primary btn-block waves-effect waves-light"
                                            type="submit">প্রবেশ করুন</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5 text-center">
                        <div>
                            <p>©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> নৈমিত্তিক ছুটি ব্যবস্থাপনা | সহযোগীতায় <a
                                    href="https://www.tradewave.com.bd">Tradewave Technology</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{ url('public/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('public/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('public/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ url('public/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ url('public/assets/libs/node-waves/waves.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ url('public/assets/js/app.js') }}"></script>
</body>

</html>
