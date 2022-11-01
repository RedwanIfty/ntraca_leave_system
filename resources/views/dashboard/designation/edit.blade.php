@extends('dashboard.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">পদবি সংশোধন করুন</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">পদবি</a></li>
                        <li class="breadcrumb-item active">পদবি সংশোধন</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('designation.update', $designation->designation_id) }}">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-sm-6">
                                <x-auth.input id='name' type='text' label='পদবির নাম' :value='$designation->designation_name' />
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
