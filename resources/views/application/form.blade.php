@extends('dashboard.app')

@section('content')
    <form  action="{{route('application.store')}}" class="form-horizontal" method="post" id="formfield" role="form" enctype="multipart/form-data" accept-charset="utf-8" autocomplete="off">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">আবেদনপত্র</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">কর্মচারী</a></li>
                            <li class="breadcrumb-item active">আবেদনপত্র দাখিল করুন</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="panel-body">
            <div class="portlet-body form">

                @csrf

                <div class="form-body">
                    <div class="row">
                        <div class="col-md-2"></div>

                        <div class="col-md-3">

                            <div class="form-group">
                                <label class=" control-label">ছুটি অনুমোদনকারী: </label>
{{--                                <input type="hidden" name="name" value="{{session()->get('username') }}">--}}
{{--                                <input type="hidden" name="department" value="{{$dept->department}}">--}}
                                {{-- <input class="form-control" name=""  type="text"> --}}
                                {{-- <input type="hidden" name="selctedname" id="selectedname" />
                                <select class="js-example-basic-single" name="state">
                                 <option value="AL">wsbama</option>
                                 <option value="AL">bama</option>
                                 <option value="AL">Aewma</option>

                               </select> --}}
                                <select class="form-control js-example-basic-single" name="admin_id" id="admin_id" required>
                                    <option selected disabled value="">অনুমোদনকারী নির্বাচন করুন</option>
                                    @foreach ($superadmin as $admin)
                                        <option value="{{$admin->id}}">{{$admin->username}}</option>
                                    @endforeach


                                </select>
                            </div>

                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class=" control-label">ছুটির কারণ :</label>
                                <select name="reason" class="form-control" id="reason" required>
                                    <option selected  disabled>নির্বাচন করুন</option>
                                    <option value="শারীরিক অসুস্থ">শারীরিক অসুস্থ</option>
                                    <option value="পারিবারিক">পারিবারিক </option>
                                    <option value="অন্যান্য" id="">অন্যান্য</option>
                                </select>
                                {{-- <input type="text" class="form-control" name="reason" id="reason"> --}}
                                <textarea name="reason" id="reasonbig" class="form-control" rows="3"></textarea>


                            </div>
                        </div>

                        <div class="col-md-2"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class=" control-label">ছুটির মেয়াদকাল: </label>
                                <div class="">
                                    <input  type="date" id="start" name="start" class="form-control" required autocomplete="off">
                                </div>

                            </div>

                        </div>
                        <div class="col-md-1" style="padding-left: 50px">
                            <br>
                            <br>
                            হতে
                        </div>

                        <div class="col-md-3" >
                            <div style="padding-top: 8px">
                                <br>

                                <input  type="date" id="end" name="end" class="form-control" required  autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-7">
                            <div class="form-group">
                                <label class=" control-label">ছুটিকালীন অবস্থান : </label>
                                <input  name="stay" id="stay" class="form-control" type="text" multiple="">
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5"></div>
                    <div class="col-md-6" style="margin-left:-16px;">
                        <div class="form-group " >
                            <div>
                                <button class="btn btn-primary" onClick="window.location.href=window.location.href">পুন:স্থাপন</button>
                                <button type="button" id="preview" data-toggle="modal" data-target="#confirm-submit"  class="btn btn-success sav_btn">দাখিল </button>
                                {{-- <button type="submit" id="submitBtn" data-toggle="modal" data-target="#confirm-submit"  class="btn btn-success sav_btn">দাখিল করুন  </button> --}}
                                {{-- <button type="submit" onclick="return confirm('It is disabled only at demo mode!')" class="btn btn-success sav_btn">Submit </button> --}}
                            </div>
                            <br>

                        </div>

                    </div>

                </div>
                <center>
                    <h5 style="color: red;padding-right: 140px;">{{session('application')}}</h5>
                </center>


            </div>
        </div>
        {{-- modal --}}
        <div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        জমা নিশ্চিত করুন
                    </div>
                    <div class="modal-body">
                        আপনি কি নিশ্চিত যে আপনি নিম্নলিখিত বিবরণ জমা দিতে চান?
                        <table class="table">
                            <tr>
                                <th>অনুমোদনকারী </th>
                                <td id="adminShow"></td>
                            </tr>
                            <tr>
                                <th>কারণ</th>
                                <td id="reasonShow"></td>
                                <!-- <td>:</td> -->
                                <td id="reasonbigShow"></td>
                            </tr>
                            <tr>
                                <th>মেয়াদকাল</th>
                                <td id="daystart"></td>

                                <td id="dayend"></td>
                            </tr>
                            <tr>
                                <th>আবেদকৃত ছুটি</th>
                                <td id="days"></td>
                                <td >দিন</td>


                            </tr>

                            <tr>
                                <th>ছুটিকালীন অবস্থান</th>
                                <td id="stayShow"></td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">ফেরৎ
                        </button>
                        <button  type="submit" id="submit" class="btn btn-success success">দাখিল</a>
                    </div>
                </div>
            </div>

        </div>
    </form>
@endsection


@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
@endsection

@section('js')
    <script>

        $(document).ready(function(){
            const picker = document.getElementById('start');
            // const picker =  $("input[type='date']");
            picker.addEventListener('input', function(e){
                var day = new Date(this.value).getUTCDay();
                if([5,6].includes(day)){
                    e.preventDefault();
                    this.value = '';
                    alert('Weekends not allowed');
                }
            });

            const picker2 = document.getElementById('end');
            picker2.addEventListener('input', function(e){
                var day = new Date(this.value).getUTCDay();
                if([5,6].includes(day)){
                    e.preventDefault();
                    this.value = '';
                    alert('Weekends not allowed');
                }
            });

        });


        $('#reasonbig').hide().attr('name','');
        $('#reason').change(function () {
            if($(this).val() == 'অন্যান্য'){
                $(this).hide().attr('name','');
                $('#reasonbig').show().attr('name','reason');
            }


        });
        $('#preview').click(function(e) {
            e.preventDefault();
            let app_id = $('#admin_id').val();
            let st = $('#start').val();
            let ed = $('#end').val();
            var date1 = new Date(st);
            var date2 = new Date(ed);
            var reason=$('#reason').val();

            if(!app_id){
                alert("please select admin");
                return false;
            }

            if(!st){
                alert("please select start date");
                return false;
            }

            if(!reason){
                alert("please select reason");
                return false;
            }


            var Difference_In_Time = date2.getTime() - date1.getTime();
            var Difference_In= Difference_In_Time / (1000 * 3600 * 24);
            var Difference_In_Days = Difference_In + 1;

            var date1 =  formatdate(date1);
            var date2 =  formatdate2(date2);



            console.log(Difference_In_Days);
            $('#days').text(Difference_In_Days);
            $('#daystart').text(date1);
            $('#dayend').text(date2);
            $('#reasonShow').text($('#reason').val());
            $('#reasonbigShow').text($('#reasonbig').val());
            $('#startShow').text($('#start').val());
            $('#endShow').text($('#end').val());
            $('#stayShow').text($('#stay').val());
            const adminShow   = document.getElementById('adminShow');

            $.ajax({
                type: 'POST',
                url: "{!! route('WeekDayCount') !!}",
                cache: false,
                data: {_token: "{{csrf_token()}}",'startDt': date1,'endDt':date2},
                success: function (data) {
                    $('#days').text(data.days);
                    $('#daystart').text(data.startDt);
                    $('#dayend').text(data.endDt);

                    console.log(data);
                    // reloadTable();
                }
            });

            // axios.get(`/admin-app/${app_id}`)
            //     .then(response=>{
            //         let adminShow = response.data.admin.username;
            //         $('#adminShow').text(adminShow);
            //     })
        });

        // $("#admin_id").on('change',function(event){
        //       let value = event.target.value;
        //       console.dir(event.target);
        //       $("#selectName").val(value);
        //       console.log(value);
        // });

        $('#submit').click(function(){
            console.log('this is running');
            $('#confirm-submit').modal('hide')
            $('#formfield').submit();
        });
    </script>
    <!-- End Page-content -->
    {{-- @if(isset($success) && $success == true)
    <script>
     Swal.fire(
         'success','New Application Create sucessfully done','success'
     );

</script> --}}


    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
    <script>
        function formatdate(date1) {
            const monthNames = [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "May",
                "Jun",
                "Jul",
                "Aug",
                "Sep",
                "Oct",
                "Nov",
                "Dec",
            ];

            const year = date1.getFullYear();
            const month = monthNames[date1.getMonth()];
            const date = date1.getDate();
            return `${date}-${month}-${year}`;
        }
        function formatdate2(date2) {
            const monthNames = [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "May",
                "Jun",
                "Jul",
                "Aug",
                "Sep",
                "Oct",
                "Nov",
                "Dec",
            ];

            const year = date2.getFullYear();
            const month = monthNames[date2.getMonth()];
            const date = date2.getDate();
            return `${date}-${month}-${year}`;
        }
    </script>
@endsection
