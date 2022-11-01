@extends('dashboard.app')

@section('content')
    @php
        use Rakibhstu\Banglanumber\NumberToBangla;
use Rajurayhan\Bndatetime\BnDateTimeConverter;
   $numto = new NumberToBangla();
   $dateConverter  =  new  BnDateTimeConverter();


    @endphp
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                        <tr>

                            {{-- <th>আবেদনের কারণ</th>
                            <th>আবেদনের তারিখ</th> --}}

                            <th>ছুটির মেয়াদকাল শুরু</th>
                            <th>ছুটির মেয়াদকাল শেষ</th>

                            <th>আবেদনকৃত ছুটি</th>
                            <th>অনুমোদিত ছুটি</th>


                            {{-- <th>অবস্থান</th> --}}
                            <th>বর্তমান অবস্থা</th>
                            <th>বিস্তারিত</th>

                        </tr>
                        </thead>

                        <tbody>
                        @foreach($applications as $app)
                            <tr>

                                <td>{{$app->start_date}}</td>
                                <td>{{$app->end_date}}</td>
                                <td>{{$app->applied_total_days}}</td>
                                <td>{{$app->approved_total_days}}</td>
                                <td>{{$app->status}}</td>
                                <td>{{$app->reason}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
@endsection


@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
@endsection

@section('js')
    <script>


    </script>
@endsection
