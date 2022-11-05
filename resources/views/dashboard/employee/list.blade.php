@extends('dashboard.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">{{ $listTitle }}</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">কর্মকর্তা/কর্মচারী</a></li>
                        <li class="breadcrumb-item active">{{ $listTitle }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="appointmentTable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>নাম ও পদবি</th>
                                <th>শাখা</th>
                                <th>ইমেইল</th>
                                <th>মোবাইল</th>
                                <th>পদক্ষেপ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td><b>{{ $user->username }}</b> ({{ $user->designation_name }})</td>
                                    <td>{{ $user->branch_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="details"><i
                                                class="fas fa-eye"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                class="bx bx-edit"></i></a>
                                        <a href="#"
                                            onclick=" event.preventDefault(); if(confirm('ব্যবহারকারী মুছে ফেলতে চাচ্ছেন কি?')) { document.getElementById({{ $user->id }}).submit(); }"
                                            data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                class="bx bx-trash"></i>
                                            <form id="{{ $user->id }}"
                                                action="{{ Route('employee.destroy', $user->id) }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </a>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">তথ্য পাওয়া যায়নি</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <td>নাম</td>
                            <td id="first_nameShow"></td>
                        </tr>
                        <tr>
                            <td>ইমেইল</td>
                            <td id="emailShow"></td>
                        </tr>
                        <tr>
                            <td>পদবী</td>
                            <td id="departmentShow"></td>
                        </tr>
                        <tr>
                            <td>শাখা</td>
                            <td id="branchShow"></td>
                        </tr>
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
        $(() => {
            $(document).on('click', '.submitBtn', function(e) {
                e.preventDefault();
                let email = this.dataset.total_days;
                let department = this.dataset.end;
                let branch = this.dataset.start;
                let first_name = this.dataset.first_name;
                let id = this.dataset.id;


                console.log(id);

                axios.get(`/leave-list/${id}`)
                    .then(response => {
                        // console.log(response.data);

                        var rows = ""
                        data = response.data;
                        console.log(data);
                        let row = data.map((el) => {
                            console.log(el);
                            return ` <tr>

                                      <td style="padding:0px 10px;">${el.start}</td>
                                      <td style="padding:0px 10px;">${el.end}</td>
                                      <td style="padding:0px 10px;">${el.stay}</td>
                                      <td style="padding:0px 10px;">${el.reason} </td>



                                    </tr>`
                        });

                        $('#wishlistToShow').html(row);


                        //   $('#wishlistToShow').html('row');
                        //   $.each(response.data, function(key,value){

                        //      rows =

                        //     ` <tr>

                    //                             <th style="padding:0px 10px;">mesba</th>
                    //                             <th style="padding:0px 10px;">${value.leave.end}</th>
                    //                             <th style="padding:0px 10px;">${value.leave.stay}</th>
                    //                             <th style="padding:0px 10px;">${value.leave.reason} </th>


                    //                           </tr>`;
                        //     $('#wishlistToShow').append(rows);

                        //     });
                    })
                    .catch(error => {
                        console.log(error);
                    })


                $('#emailShow').text(email);
                $('#departmentShow').text(department);
                $('#branchShow').text(branch);
                $('#first_nameShow').text(first_name);
            })
        });


        // function addDriverToSelectBox(data){
        //     let selectBox = document.querySelector('#driver');
        //              console.log("mesba");
        //     data.forEach(item=>{
        //         const tr =document.createElement('tr');

        //         tr.textContent=item.start;


        //         tr.value=item.id;
        //         selectBox.appendChild(tr);


        //     })
        // }
    </script>

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
