@extends('dashboard.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">শাখা সংশোধন করুন</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">শাখা</a></li>
                        <li class="breadcrumb-item active">শাখা সংশোধন</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('branch.update', $branch->branch_id) }}">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-sm-6">
                                <x-auth.input id='name' type='text' label='শাখার নাম' :value='$branch->branch_name' />
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">হালনাগাদ করুন</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- End Page-content -->
        @if (isset($success) && $success == true)
            <script>
                Swal.fire(
                    'সাফল্য', 'নতুন অ্যাডমিন সফলভাবে সম্পন্ন হয়েছে', 'সাফল্য'
                );
            </script>
        @endif
    @endsection
