@extends('dashboard.app')
@section('css')
    <style>
        @media print {
            /*body * {*/
            /*    visibility: hidden;*/
            /*}*/
            .printme, .printme * {
                visibility: visible;
            }

            .printme {
                position: absolute;
                left: 0;
                top: 0;
            }

            .printme, .printme:last-child {
                page-break-after: avoid;
            }

            .display-none-on, .display-none-on * {
                display: none !important;
            }

            html, body {
                height: auto;
                font-size: 20pt; /* changing to 10pt has no impact */
            }

        }
    </style>
@endsection
@section('content')
    @php

        use Rakibhstu\Banglanumber\NumberToBangla;
        use Rajurayhan\Bndatetime\BnDateTimeConverter;
            $numto = new NumberToBangla();
            $dateConverter  =  new  BnDateTimeConverter();

    @endphp

    <div>
        <div class="visible-print text-center">

{{--            <p>Scan me to return to the original page.</p>--}}
        </div>
        <div align="right">
            তারিখঃ: {{$dateConverter->getConvertedDateTime($application->created_at,  'BnEn', 'l jS F Y')}}</div>

        বরাবর, <br>
        মহাপরিচালক/বিভাগীয় প্রধান <br>
        ………………………………. <br>
        ……………………………….<br>

        মাধ্যমঃ যথাযথ কর্তৃপক্ষ।<br>
        বিষয় : {{$numto->bnNum($application->applied_total_days)}} দিনের নৈমিত্তিক ছুটির জন্য আবেদন। <br>
        <br>
        <br>

        জনাব <br>
        <div style=" text-align: justify;text-justify: inter-word;">
            সম্মান প্রদর্শন পূর্বক বিনীত নিবেদন এই যে {{$application->reason}}
            জন্য আগামী {{$dateConverter->getConvertedDateTime($application->start_date,  'BnEn', 'l jS F Y')}}. খ্রিঃ
            তারিখ হতে {{$dateConverter->getConvertedDateTime($application->end_date,  'BnEn', 'l jS F Y')}}.খ্রিঃ তারিখ
            পর্যন্ত কর্মস্থলে উপস্থিত হতে পারব না বিধায় নৈমিত্তিক ছুটির প্রয়োজন।
        </div>
        <br>
        <div style=" text-align: justify;text-justify: inter-word;">
            অতএব, জনাবের নিকট বিনীত প্রার্থনা এই যে, আমাকে উল্লেখিত {{$numto->bnNum($application->applied_total_days)}}
            দিনের নৈমিত্তিক ছুটি মঞ্জুরসহ কর্মস্থল ত্যাগের অনুমতিদানে মর্জি হয়।
        </div>
        <br>
        @php
            $pendingLeave=20-$totalApprovedLeave;
        @endphp
        উল্লেখ্য, চলতি পঞ্জিকা বৎসরে আমার {{$numto->bnNum($pendingLeave)}} দিন ছুটি পাওনা আছে। <br>


        <br>
        <br>
        <br>
        <table style="width: 100%">
            <tr>
                <td width="60%">ছুটিকালীন ঠিকানা <br>
                    {{$application->stay_location}}



                </td>
                <td width="40%">
                    নিবেদক <br>
                    স্বাক্ষরঃ &nbsp; <img src="{{url('/public')}}/signature/{{ $application->signature}}" height="70"><br>
                    নামঃ {{$application->first_name}}<br>
                    পদবীঃ {{$application->designation_name}}<br>
                </td>
            </tr>
            <tr>
                <td>    {!! QrCode::size(100)->generate(url('https://github.com/SimpleSoftwareIO/simple-qrcode/tree/develop/docs/en')); !!}</td>
                <td></td>
            </tr>
        </table>


    </div>

@endsection
