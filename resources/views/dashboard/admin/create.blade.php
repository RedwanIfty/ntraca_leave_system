@extends('dashboard.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">অ্যাডমিন যুক্ত করুন</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">অ্যাডমিন</a></li>
                        <li class="breadcrumb-item active">অ্যাডমিন যোগ</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="#" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="first_name">নাম</label>
                                    <input id="first_name" name="first_name" type="text" value="{{ old('first_name') }}"
                                        class="form-control">
                                    @if ($errors->has('first_name'))
                                        <div style="color:red"> {{ $errors->first('first_name') }}</div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="phone">মোবাইল</label>
                                    <input id="phone" name="phone" type="text" value="{{ old('phone') }}"
                                        class="form-control">
                                    @if ($errors->has('phone'))
                                        <div style="color:red"> {{ $errors->first('phone') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="email">ইমেইল</label>
                                    <input id="email" name="email" type="text" value="{{ old('email') }}"
                                        class="form-control">
                                    @if ($errors->has('email'))
                                        <div style="color:red"> {{ $errors->first('email') }}</div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="password">পাসওয়ার্ড</label>
                                    <input id="password" name="password" type="password" value="{{ old('password') }}"
                                        class="form-control">
                                    @if ($errors->has('password'))
                                        <div style="color:red"> {{ $errors->first('password') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="department">পদবি</label>
                                    <!-- <input id="department" name="department" type="text" value="{{ old('department') }}" class="form-control"> -->
                                    <select name="designation" id="department" class="form-control" required>
                                        <option selected disabled>নির্বাচন করুন</option>
                                        @foreach($designations as $desg)
                                            <option value="{{$desg->designation_id }}">স{{$desg->designation_name }}</option>
                                        @endforeach

                                    </select>
                                    @if ($errors->has('department'))
                                        <div style="color:red"> {{ $errors->first('department') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="control-label">শাখা</label>
                                    <select name="branch" class="form-control select2">
                                        <option selected disabled>নির্বাচন করুন</option>
                                        @foreach($branches as $branch)
                                            <option value="{{$branch->branch_id  }}">স{{$branch->branch_name }}</option>
                                        @endforeach
                                       
                                    </select>
                                </div>
                                <div class="card"></div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light"> যোগ করুন</button>
                    </form>
                </div>
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
