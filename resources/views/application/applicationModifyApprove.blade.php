@extends('dashboard.app')

@section('content')

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    @php

        use Rakibhstu\Banglanumber\NumberToBangla;
        use Rajurayhan\Bndatetime\BnDateTimeConverter;
            $numto = new NumberToBangla();
            $dateConverter  =  new  BnDateTimeConverter();

    @endphp
    @php
        $total_days = $numto->bnNum($applications->applied_total_days);


    @endphp

        <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <!-- <h4 class="mb-0 font-size-18">আবেদনপত্র </h4> -->



            </div>
        </div>
    </div>
    <!-- end page title -->
    <center>
        <div class="panel-body">
            <div class="portlet-body form">
                <form   class="form-horizontal" method="post"  action="{{route('application.modifyApproveStore',$applications->id)}}"  enctype="multipart/form-data" accept-charset="utf-8" autocomplete="off">
                    @csrf

                    <div class="form-body">

                        <div class="row">
                            <div class="col-md-12">
                                <h3 style="font-weight: bold;"  class="text-muted"><a href="#" class="text-dark">{{$applications->first_name}}</a></h3>
                                <h5 style="font-weight: bold;">{{$applications->designation_name}}</h5>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                                <Label>আবেদনকৃত ছুটি</Label>
                                <input class="form-control" disabled name="approved_total_days" id="approved_total_days" type="text" value="{{$total_days}} দিন">
                            </div>
                            <div class="col-md-6"></div>


                        </div>
                        <br></br>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-2">
                                <Label>ছুটির মেয়াদকাল শুরু</Label>
                                <input class="form-control" name="approved_start_date" type="date" id="date1" value="{{$applications->start_date}}" onchange="DayCount()">
                            </div>
                            <div class="col-md-2">
                                <Label>ছুটির মেয়াদকাল শেষ</Label>
                                <input class="form-control" name="approved_end_date" id="date2" type="date" value="{{$applications->end_date}}" onchange="DayCount()">
                            </div>

                            <div class="col-md-2"></div>
                        </div> <br>
                        <div class="row">

                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                                <label for="" class="from-control"><h3>মন্তব্য</h3></label> <br>
                                {{-- <input type="textarea" class="form-control" cols="50" rows="3"> --}}
                                <textarea  name="comment"  id="" cols="45" rows="4"></textarea>

                            </div>
                            <div class="col-md-6"></div>
                        </div>

                    </div>

                    <div class="form-group ">
                        <div class="row">

                            <div class="col-md-3"></div>
                            <div class="col-md-2">
                                <button type="submit"  class="btn btn-success sav_btn"> দাখিল</button>
                            </div>


                            {{-- <button type="submit" onclick="return confirm('It is disabled only at demo mode!')" class="btn btn-success sav_btn">Submit </button> --}}

                        </div>

                </form>
            </div>
        </div>
    </center>


@endsection
@section('css')
    /*<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">*/
@endsection
@section('js')
    <script>
        function DayCount(){
            date1=$('#date1').val();
            date2=$('#date2').val();
            $.ajax({
                type: 'POST',
                url: "{!! route('WeekDayCount') !!}",
                cache: false,
                data: {_token: "{{csrf_token()}}",'startDt': date1,'endDt':date2},
                success: function (data) {
                    $('#approved_total_days').val(data.days+ ' দিন');
                    // $('#daystart').text(data.startDt);
                    // $('#dayend').text(data.endDt);

                    // console.log(data);
                    // reloadTable();
                }
            });

        }

    </script>
@endsection
