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
                                    <select name="department" id="department" class="form-control">
                                        <option selected disabled>নির্বাচন করুন</option>
                                        <option>সিনিয়র সচিব</option>
                                        <option>অতিরিক্ত সচিব</option>
                                        <option>মাননীয় প্রতিমন্ত্রীর একান্ত সচিব</option>
                                        <option>একান্ত সচিব</option>
                                        <option>সিনিয়র সচিবের একান্ত সচিব</option>
                                        <option>যুগ্মসচিব</option>
                                        <option>উপসচিব</option>
                                        <option>সিনিয়র সহকারী সচিব</option>
                                        <option>সহকারী সচিব</option>
                                        <option>সিনিয়র সিস্টেম এনালিস্ট</option>
                                        <option>সিনিয়র মেইন্টেনেন্স ইঞ্জিনিয়ার</option>
                                        <option>সিস্টেম এনালিস্ট</option>
                                        <option>প্রোগ্রামার</option>
                                        <option>সহকারী মেইন্টেনেন্স ইঞ্জিনিয়ার</option>
                                    </select>
                                    @if ($errors->has('department'))
                                        <div style="color:red"> {{ $errors->first('department') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="control-label">শাখা</label>
                                    <select name="branch" class="form-control select2">
                                        <option selected disabled>নির্বাচন করুন</option>
                                        <option>মাননীয় প্রতিমন্ত্রীর দপ্তর</option>
                                        <option>সিনিয়ন সচিবের দপ্তর</option>
                                        <option>প্রশাসন অনুবিভাগ</option>
                                        <option>বাজেট ও নিরীক্ষা অনুবিভাগ</option>
                                        <option>পরিকল্পনা ও উন্নয়ন অনুবিভাগ</option>
                                        <option>আইসিটি প্রমোশন ও ব্র্যান্ডিং অনুবিভাগ</option>
                                        <option>আইসিটি প্রমোশন ও গবেষণা অনুবিভাগ</option>
                                        <option>অর্গানাইজেশনাল সাপোর্ট অনুবিভাগ</option>
                                        <option>ডিজিটাল গভনেন্স ও সিকিউরিটি অনুবিভাগ</option>
                                        <option>আইন ও পলিসি অনুবিভাগ</option>
                                        <option>প্রশাসনিক কর্মকর্তা,ব্যক্তিগত কর্মকর্তা ও সহকারী হিসাবরক্ষণ কর্মকর্তা
                                        </option>
                                        <option>লজিস্টিক সেবা অধিশাখা</option>
                                        <option>প্রশাসন অধিশাখা</option>
                                        <option>জাতীয় সংসদ ও আন্তঃমন্ত্রণালয় শাখা ও কাউন্সিল অফিসার</option>
                                        <option>লজিস্টিক সেবা-১ শাখা</option>
                                        <option>প্রশাসন শাখা</option>
                                        <option>লজিস্টিক সেবা-২ শাখা</option>
                                        <option>লাইব্রেরি ও গবেষণা শাখা</option>
                                        <option>বাজেট ও নিরীক্ষা অধিশাখা</option>
                                        <option>রাজস্ব বাজেট শাখা</option>
                                        <option>উন্নয়ন বাজেট শাখা</option>
                                        <option>হিসাব ও নিরীক্ষা শাখা</option>
                                        <option>পরিকল্পনা অধিশাখা</option>
                                        <option>উন্নয়ন, বাস্তবায়ন, পরিবীক্ষণ ও মূল্যায়ন অধিশাখা</option>
                                        <option>সমন্বয় শাখা</option>
                                        <option>পরিকল্পনা-১ শাখা</option>
                                        <option>পরিকল্পনা-৩ শাখা</option>
                                        <option>পরিকল্পনা-২ শাখা</option>
                                        <option>পরিবীক্ষণ ও মূল্যায়ন-১ শাখা</option>
                                        <option>পরিবীক্ষণ ও মূল্যায়ন-২ শাখা</option>
                                        <option>হিউম্যান রিসোর্স ডেভেলপমেন্ট অধিশাখা</option>
                                        <option>আইসিটি প্রমোশন অধিশাখা</option>
                                        <option>আইসিটি প্রমোশন ও ব্র্যান্ডিং শাখা</option>
                                        <option>কর্মসম্পাদন ও কৌশল শাখা</option>
                                        <option>গবেষণা ও ফেলোশিপ শাখা</option>
                                        <option>উদ্ভাবনী ও বিশেষ অনুদান শাখা</option>
                                        <option>আন্তর্জাতিক বিষয়াবলী শাখা</option>
                                        <option>কর্মসম্পাদন ও কৌশল শাখা</option>
                                        <option>অর্গানাইজেশনাল সাপোর্ট অধিশাখা</option>
                                        <option>সংস্থা-১</option>
                                        <option>সংস্থা-২ শাখা</option>
                                        <option>সংস্থা-৩ শাখা</option>
                                        <option>ডিজিটাল কো-অর্ডিনেশন ও কো-অপারেশন অধিশাখা</option>
                                        <option>ডিজিটাল গভর্নেন্স ও ইমপ্লিমেন্টেশন অধিশাখা</option>
                                        <option>ডিজিটাল সিকিউরিটি ও অপারেশন অধিশাখা</option>
                                        <option>ডিজিটাল কো-অর্ডিনেশন শাখা এবং ডিজিটাল গভর্নেন্স শাখা</option>
                                        <option>ডিজিটাল সিকিউরিটি মনিটরিং ও অপারেশন শাখা এবং ডিজিটাল কো-অপারেশন শাখা
                                        </option>
                                        <option>ই-সার্ভিস ইমপ্লিমেন্টেশন শাখা এবং ডিজিটাল সিকিউরিটি ও স্ট্যান্ডার্ড শাখা
                                        </option>
                                        <option>আইন অধিশাখা</option>
                                        <option>পলিসি শাখা</option>
                                        <option>পলিসি অধিশাখা</option>
                                        <option>পলিসি বাস্তবায়ন শাখা</option>
                                        <option>আইন ও বিধি প্রণয়ন শাখা</option>
                                        <option>লিগ্যাল শাখা</option>
                                        <option>সমন্বয় শাখা</option>
                                        <option>রাজস্ব বাজেট শাখা ও প্রশাসন অধিশাখা</option>
                                        <option>আইসিটি প্রমোশন ও ব্র্যান্ডিং শাখা</option>
                                        <option>লজিস্টিক সেবা-২ শাখা</option>
                                        <option>উন্নয়ন বাজেট শাখা</option>
                                        <option>প্রশাসন শাখা</option>
                                        <option>বৃত্তি ও ফেলোশিপ শাখা</option>
                                        <option>আন্তর্জাতিক বিষয় ও ঘটনাবলী সম্পর্কিত শাখা</option>
                                        <option>আইন ও বিধি প্রণয়ন শাখা এবং লিগ্যাল শাখা</option>
                                        <option>পরিকল্পনা-১ শাখা</option>
                                        <option>সংস্থা-৩ শাখা</option>
                                        <option>প্রশাসন শাখা</option>
                                        <option>লজিস্টিক সেবা-১ শাখা</option>
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
