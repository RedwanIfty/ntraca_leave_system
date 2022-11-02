@extends('dashboard.app')

@section('content')
    @php

        use Rakibhstu\Banglanumber\NumberToBangla;
        use Rajurayhan\Bndatetime\BnDateTimeConverter;
            $numto = new NumberToBangla();
            $dateConverter  =  new  BnDateTimeConverter();

    @endphp


    <div class="row">
        @foreach ($applications as $application)
            <div class="col-xl-6 col-sm-6">

                <div class="card text-center" style="background-color:#ffff; border-radius: 20px">
                    <div class="card-body" style="background-color: white;border-radius: 20px">
                        <h3 style="font-weight: bold;"  class="text-muted"><a href="#" class="text-dark">{{$application->first_name}}</a></h3>
                        <h5 style="font-weight: bold;">{{$application->designation_name}}</h5>
                        @php
                            $total_days = $numto->bnNum($application->applied_total_days);

                            $start=   $dateConverter->getConvertedDateTime($application->start_date,  'BnEn', '');
                            $end=   $dateConverter->getConvertedDateTime($application->end_date,  'BnEn', '');
                            $created_at=   $dateConverter->getConvertedDateTime($application->created_at,  'BnEn', '');
                        @endphp
                        <div class="row">
                            <div class="col-md-4">
                                <label class="font-size-15">মেয়াদকাল শুরু</label><br>
                                <span >{{$start}}</span>
                            </div>
                            <div class="col-md-4">
                                <label class="font-size-15">মেয়াদকাল শেষ</label><br>
                                <span >{{$end}}</span>
                            </div>
                            <div class="col-md-4">
                                <label class="font-size-15">আবেদনকৃত ছুটি</label><br>
                                <span >{{$total_days}} দিন</span>
                            </div>

                        </div>
                        <br>
                        @php
                            $year=\Carbon\Carbon::now();
                            $now=$year->year;
                            $app=$application->employee_id;
                            $appp=\App\Models\Application::where('employee_id',$app)->where('status',2)->whereYear('end_date',$now)->sum('approved_total_days');

                              $app = $numto->bnNum($appp);
                              $ap=20-$appp;
                              $ap = $numto->bnNum($ap);
                        @endphp
                        <div class="row">

                            <div class="col-md-3"><label class="font-size-15">ভোগকৃত ছুটি</label><br>
                                <span >{{$app}} দিন</span>
                            </div>
                            <div class="col-md-3">
                                <label class="font-size-15">অবশিষ্ট ছুটি</label><br>
                                <span >{{$ap}} দিন</span>
                            </div>
                            <div class="col-md-3"><label class="font-size-15">ছুটির কারন</label><br>
                                <span >{{$application->reason}}</span>
                            </div>
                            <div class="col-md-3">
                                <label class="font-size-15">ছুটিকালীন অবস্থান</label><br>
                                <span >{{$application->stay_location}}</span>
                            </div>


                        </div>
                        <br>
                        <div class="row" >
                            <div class="col-md-1" style="padding-left:102px;"></div>
                            <div class="col-md-3" >

                                                    <a href="{{route('application.approve',$application->id)}}"><button class="btn btn-success"  value="1">অনুমোদন</button></a>
{{--                                <a href="#"><button class="btn btn-success"  value="1">অনুমোদন</button></a>--}}
                            </div>
                            <div class="col-md-3">
                                                    <a href="{{route('application.modifyApprove',$application->id)}}"><button class="btn btn-success"  value="1">সংশোধন</button></a>
{{--                                <a href="#"><button class="btn btn-success"  value="1">সংশোধন</button></a>--}}
                            </div>
                            <div class="col-md-3">
                                {{--                    <a href="/confirm/reject/{{$application->id}}"> <button class="btn btn-danger"  value="0">বাতিল</button></a>--}}
                                <a href="#"> <button class="btn btn-danger"  value="0">বাতিল</button></a>

                            </div>
                            <div class="col-md-3"></div>
                            {{-- <div class="col-md-4">
                             <a href="/application/return/{{$application->id}}"><button class="btn btn-primary">ফিরিয়ে দিন</button></a>
                            </div> --}}
                        </div>



                    </div>

                </div>

            </div>
        @endforeach
    </div>

@endsection
@section('css')
    /*<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">*/
@endsection
@section('js')
    <script>

    </script>
@endsection
