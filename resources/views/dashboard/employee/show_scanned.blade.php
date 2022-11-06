<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    {{--    <link rel="shortcut icon" href="{{ url('public/assets/images/log.png') }}"> --}}

    <title>নৈমিত্তিক ছুটি ব্যবস্থাপনা</title>

    <!-- select2 css -->
    <link rel="stylesheet" href="{{ url('public/assets/libs/select2/css/select2.min.css') }}">
    <!-- bootstrap-datepicker css -->
    <link rel="stylesheet" href="{{ url('public/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('public/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">

    <!-- Responsive datatable examples -->
    <link rel="stylesheet"
          href="{{ url('public/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="{{ url('public/assets/css/bootstrap.min.css') }}">
    <!-- Icons Css -->
    <link rel="stylesheet" href="{{ url('public/assets/css/icons.min.css') }}">
    <!-- App Css-->
    <link rel="stylesheet" href="{{ url('public/assets/css/app.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">
    <script src="{{ url('public/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('public/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- select2 -->

    {{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" /> --}}

    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
</head>
<br>
<br>
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0 font-size-18">কর্মকর্তা/কর্মচারীর তথ্য</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{ $user->username }}</a></li>
                    <li class="breadcrumb-item active">তথ্য</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-4">
        <div class="card overflow-hidden">
            <div class="bg-soft-primary">
                <div class="row">
                    <div class="col-7">
                        <div class="text-primary p-3">
                            <p>কর্মকর্তা/কর্মচারীর তথ্য</p>
                            <h5 class="text-primary">{{ $user->username }}</h5>
                        </div>
                    </div>
                    <div class="col-5 align-self-end">
                        <img src="{{ asset('public\assets\images\profile-img.png') }}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="card-body pt-0">
                <div class="row pt-2">
                    <div class="col-sm-4">
                        <h5 class="font-size-15 text-truncate">{{ $role->role_name }}</h5>
                    </div>
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="font-size-15">পদবি: {{ $designation->designation_name }}</h5>
                                <p class="text-muted mb-0">ইমেইল: {{ $user->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-8">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">ব্যক্তিগত তথ্য</h4>
                <div class="table-responsive">
                    <table class="table table-nowrap mb-0">
                        <tbody>
                        <tr>
                            <th scope="row">নাম:</th>
                            <td>{{ $user->username }}</td>
                        </tr>
                        <tr>
                            <th scope="row">মুঠোফোন :</th>
                            <td>{{ $user->phone_number }}</td>
                        </tr>
                        <tr>
                            <th scope="row">ইমেইল :</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th scope="row">শাখা :</th>
                            <td>{{ $branch->branch_name }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@php

    use Rakibhstu\Banglanumber\NumberToBangla;
    use Rajurayhan\Bndatetime\BnDateTimeConverter;
        $numto = new NumberToBangla();
        $dateConverter  =  new  BnDateTimeConverter();

@endphp

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        {{-- <th>#</th> --}}

                        <th>আবেদনের তারিখ</th>
                        <th>তারিখ হতে</th>
                        <th>তারিখ পর্যন্ত</th>
                        <th>আবেদনকৃত ছুটি</th>
                        <th>অনুমোদিত ছুটি</th>
                        <th>অবস্থান</th>
                        <th> কারণ</th>
                        <th>অবস্থা</th>

                    </tr>
                    </thead>


                    <tbody>
                    @foreach($applications as $app)
                        <tr>
                            <td>{{ $dateConverter->getConvertedDateTime($app->created_at,  'BnEn', 'l jS F Y')}}</td>
                            <td>{{ $dateConverter->getConvertedDateTime($app->start_date,  'BnEn', 'l jS F Y')}}</td>
                            <td>{{ $dateConverter->getConvertedDateTime($app->end_date,  'BnEn', 'l jS F Y')}}</td>
                            <td>{{ $numto->bnNum($app->applied_total_days)}} </td>
                            <td>{{ $numto->bnNum($app->approved_total_days)}} </td>
                            <td>{{$app->stay_location}}</td>
                            <td>{{$app->reason}}</td>
                            <td>{{$app->status_name}}</td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<!-- JAVASCRIPT -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.js"></script>



<!-- bootstrap-datepicker js -->
{{--<script src="{{ url('public/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>--}}

<!-- Required datatable js -->
<script src="{{ url('public/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('public/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

<!-- Responsive examples -->
<script src="{{ url('public/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ url('public/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
<!-- apexcharts -->
{{--    <script src="{{ url('public/assets/libs/apexcharts/apexcharts.min.js') }}"></script> --}}
<!-- Saas dashboard init -->
{{--    <script src="{{ url('public/assets/js/pages/saas-dashboard.init.js') }}"></script> --}}

{{--<script src="{{ url('public/assets/js/app.js') }}"></script>--}}
<script src="{{ url('public/assets/js/pages/datatables.init.js') }}"></script>
<!-- apexcharts -->
</body>

</html>
