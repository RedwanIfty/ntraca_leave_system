@extends('dashboard.app')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card" style="background-color:#683091; border-radius: 20px">
                        <div class="card-body" style="text-align: center">
                            <div style="text-align: center">
                                <h3 style="text-align: center; color:#ffff !important" class="text-primary">স্বাগতম
                                    {{ auth()->user()->username }}
                                    !</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3 "></div>
                <div class="col-sm-6">
                    <div class="card" style="background-color:#683091; border-radius: 20px">
                        <div class="card-body" style="text-align: center">
                            <div style="text-align: center">
                                <h3 style="text-align: center; color:#ffff !important" class="text-primary">দাপ্তরিক</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-4">
                    <a href="/emp/leave/list">
                        <div class="card" style="background-color:#8bc643; border-radius: 20px">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="avatar-xs mr-3">
                                        <span class="avatar-title rounded-circle bg-soft-primary text-primary font-size-18">
                                            <i style="color: saddlebrown" class="bx bx-user"></i>
                                        </span>
                                    </div>
                                    <h2 style="color: #ffff !important; padding-right:5px;font-size:51px;">
                                        3 </h2>
                                    <h4 style="color: #ffff !important;" class="font-size-54 mt-4">জন</h4>
                                </div>
                                <div class="text-muted">
                                    <h4 style="color: #ffff !important;padding-left:49px;font-size:27px;">ছুটিতে</i>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-sm-4">
                    <a href="/emp/join/list">
                        <div class="card" style="background-color:#8bc643; border-radius: 20px">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="avatar-xs mr-3">
                                        <span class="avatar-title rounded-circle bg-soft-primary text-primary font-size-18">
                                            <i class="bx bx-user"></i>
                                        </span>
                                    </div>

                                    <h2 style="color: #ffff !important; padding-right:5px;font-size:51px;">
                                        35 </h2>
                                    <h4 style="color: #ffff !important;" class="font-size-54 mt-4">জন</h4>
                                </div>
                                <div class="text-muted">
                                    <h4 style="color: #ffff !important;padding-left:49px;font-size:27px;">কর্মরত</i>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3 "></div>
                <div class="col-sm-6">
                    <div class="card" style="background-color:#683091; border-radius: 20px">
                        <div class="card-body" style="text-align: center">
                            <div style="text-align: center">
                                <h3 style="text-align: center; color:#ffff !important" class="text-primary">ব্যক্তিগত
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-4">
                    <a href="/leave/list">
                        <div class="card" style="background-color:#8bc643;  border-radius: 20px">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="avatar-xs mr-3">
                                        <span class="avatar-title rounded-circle bg-soft-primary text-primary font-size-18">
                                            <i style="color: saddlebrown" class="bx bx-user"></i>
                                        </span>
                                    </div>
                                    <h4 class="font-size-54 mb-0">সর্বমোট ছুটি নিয়েছে</h4>
                                </div>
                                <div class="text-muted mt-4">
                                    <h4>21 জন</h4>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-4">
                    <a href="/join/list">
                        <div class="card" style="background-color:#8bc643;  border-radius: 20px">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="avatar-xs mr-3">
                                        <span class="avatar-title rounded-circle bg-soft-primary text-primary font-size-18">
                                            <i class="bx bx-user"></i>
                                        </span>
                                    </div>

                                    <h4 class="font-size-54 mb-0">সর্বমোট অফিস করছে</h4>
                                </div>
                                <div class="text-muted mt-4">
                                    <h4> 87 জন</h4>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>


                <div class="col-sm-2"></div>
                <div class="col-sm-2"></div>

                <div class="col-sm-4">
                    <div class="card" style="background-color:#8bc643;  border-radius: 20px">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="avatar-xs mr-3">
                                    <span class="avatar-title rounded-circle bg-soft-primary text-primary font-size-18">
                                        <i style="color: saddlebrown" class="bx bx-user"></i>
                                    </span>
                                </div>

                                <h2 style="color: #ffff !important; padding-right:5px;font-size:51px">
                                    {{$myLeave->sum('approved_total_days')}} </h2>
                                <h4 style="color: #ffff !important;" class="font-size-54 mt-4"> দিন</h4>
                            </div>
                            <div class="text-muted">
                                <h4 style="color: #ffff !important;padding-left: 49px;font-size: 27px;"> ভোগকৃত ছুটি
                                  </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card" style="background-color:#8bc643;   border-radius: 20px">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="avatar-xs mr-3">
                                    <span class="avatar-title rounded-circle bg-soft-primary text-primary font-size-18">
                                        <i style="color: saddlebrown" class="bx bx-user"></i>
                                    </span>
                                </div>

                                <h2 style="color: #ffff !important; padding-right:5px;font-size:51px;">
                                    {{20-$myLeave->sum('approved_total_days')}} </h2>
                                <h4 style="color: #ffff !important;" class="font-size-54 mt-4">দিন </h4>
                            </div>
                            <div class="text-muted">
                                <h4 style="color: #ffff !important;padding-left: 49px;font-size: 27px;"> অবশিষ্ট ছুটি
                                    </i></h4>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <div class="row" align="center">

        <div class="col-sm-4 mx-auto">
            <a href="{{route('pending.application')}}">
                <div class="card" style="background-color: #683091; border-radius: 20px">
                    <div class="card-body" style="text-align: center; font-size:x-large;color:#ffff;font:bolder">
                        জমাকৃত আবেদন
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 mx-auto">
            <a href="{{route('application.form')}}">
                <div class="card" style="background-color: #683091; border-radius: 20px">
                    <div class="card-body" style="text-align: center; font-size:x-large;color:#ffff;font:bolder">
                        আবেদন
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection
