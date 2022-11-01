@extends('dashboard.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="appointmentTable" class="table table-striped table-bordered" style="width:100%">
                        <!-- <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100"> -->
                        <thead>
                            <tr>
                                <th>শাখা নাম</th>
                                <th>পদক্ষেপ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($branches as $branch)
                                <tr>
                                    <td>{{ $branch->branch_name }}</td>
                                    <td>
                                        <a href="{{ route('branch.edit', $branch->branch_id) }}"
                                            data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                class="bx bx-edit"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                class="bx bx-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#appointmentTable').DataTable({
                "order": [
                    [4, "asc"]
                ]
            });
        });
    </script>
@endsection
