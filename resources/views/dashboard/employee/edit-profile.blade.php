@extends('dashboard.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">প্রোফাইল হালনাগাদ</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">প্রোফাইল</a></li>
                        <li class="breadcrumb-item active">হালনাগাদ</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <form method="post" action="{{ route('profile.updateprofile') }}">
                                @csrf
                                @method('PUT')

                                <x-auth.input id='fullname' type='text' label='নাম' :value='$user->username' />
                                <x-auth.input id='phone' type='text' label='মোবাইল' :value='$user->phone_number' />
                                <x-auth.input id='email' type='email' label='ইমেইল' :value='$user->email' />
                                <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">হালনাগাদ
                                    করুন</button>
                        </div>
                        </form>
                        <div class="col-sm-6">
                            <form method="post" action="{{ route('profile.updatepassword') }}">
                                @csrf
                                @method('PUT')

                                <x-auth.input id='password' type='password' label='বর্তমান পাসওয়ার্ড' />
                                <x-auth.input id='new-password' type='password' label='নতুন পাসওয়ার্ড' />
                                <x-auth.input id='confirm-password' type='password' label='পাসওয়ার্ড নিশ্চিত করুন' />
                                <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">পাসওয়ার্ড
                                    পরিবর্তন করুন</button>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
