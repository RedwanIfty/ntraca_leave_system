@extends('dashboard.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">কর্মকর্তা/কর্মচারীর তথ্য হালনাগাদ করুন</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">কর্মকর্তা/কর্মচারী</a></li>
                        <li class="breadcrumb-item active">তথ্য হালনাগাদ</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('employee.update', $user->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-sm-6">
                                <x-auth.input id='fullname' type='text' label='নাম' :value='$user->username' />
                                <x-auth.input id='phone' type='text' label='মোবাইল' :value='$user->phone_number' />
                                <x-auth.input id='email' type='email' label='ইমেইল' :value='$user->email' />
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="department">পদবি</label>
                                    <select name="designation" id="department" class="form-control" required>
                                        <option selected disabled>নির্বাচন করুন</option>
                                        @foreach ($designations as $desg)
                                            <option value="{{ $desg->designation_id }}"
                                                @if ($employee['designation'] == $desg->designation_id) selected @endif>
                                                {{ $desg->designation_name }}
                                            </option>
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
                                        @foreach ($branches as $branch)
                                            <option value="{{ $branch->branch_id }}"
                                                @if ($employee['branch'] == $branch->branch_id) selected @endif>{{ $branch->branch_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="department">ভূমিকা</label>
                                    <select name="role" id="role" class="form-control" required>
                                        <option selected disabled>নির্বাচন করুন</option>
                                        @forelse ($roles as $role)
                                            <option value="{{ $role->role_id }}"
                                                @if ($user['role'] == $role->role_id) selected @endif>{{ $role->role_name }}
                                            </option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @if ($errors->has('department'))
                                        <div style="color:red"> {{ $errors->first('department') }}</div>
                                    @endif
                                </div>
                                <div class="card"></div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">হালনাগাদ করুন</button>
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
