@extends('admin.layouts.master')
@section('title','Employee')
@section('content')

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Employee List</h2>
                </div>
                <div class="col-12 d-flex justify-content-end">
                    <a class="btn btn-success" onClick="openModal()" href="javascript:void(0)">Create Employee</a>
                </div>

            </div>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <div class="card-body">
            <table class="table table-bordered" id="ajax-crud-datatable">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Date Of Birth</th>
                        <th>Address</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Date of Joining</th>
                        <th>Image</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    {{-- model employee --}}
    <div class="modal fade" id="employeeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changeNameHead">Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" id="FormEmploye" name="EmployeeForm" class="form-horizontal"
                        method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name"
                                    maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gender" class="col-sm-2 control-label">Gender</label>
                            <div class="col-sm-12">
                                <select class="form-control" id="gender" name="gender" required="">
                                    <option value="">Select Gender</option>
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                    <option value="3">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Date Of Birth</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="datepicker" name="dob"
                                    placeholder="Enter Date Of Birth" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-12">
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter Email" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Address</label>
                            <div class="col-sm-12">
                                <textarea class="form-control" id="address" name="address" placeholder="Enter Address"
                                    rows="4" required=""></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Mobile</label>
                            <div class="col-sm-12">
                                <input type="number" class="form-control" id="mobile" name="mobile"
                                    placeholder="Enter Mobile" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Depertment</label>
                            <div class="col-sm-12">
                                <select name="depertment_id" class="form-control" id="depertment" required="">
                                    <option value="">Select</option>
                                    @foreach ($dep as $depertment)
                                    <option value="{{$depertment->id}}">{{$depertment->name}}</option>

                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Designation</label>
                            <div class="col-sm-12">
                                <select name="designation_id" class="form-control" id="designationSelect">
                                    <option value="">Select</option>
                                    {{-- <option value="1">name</option> --}}

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Date Of Joining</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="datepicker_doj" name="doj"
                                    placeholder="Enter Date Of Joining" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Image</label>
                            <div class="col-sm-12">
                                <input type="file" class="form-control" name="image">
                            </div>
                        </div>

                        <div class="col-sm-offset-2 col-sm-10"><br />
                            <button type="submit" class="btn btn-primary" id="btn-save">Save changes</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready( function () {
            $( function() {
            $( "#datepicker" ).datepicker();
            $( "#datepicker_doj" ).datepicker();

            });
            $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            
            //set daata in list
   $('#ajax-crud-datatable').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('admin.employees.employees') }}",
    columns: [
    { data: 'id'},
    { data: 'name'  },
    { data: 'gender_text' },
    { data: 'dob' },
    { data: 'address' },
    { data: 'mobile'},
    { data: 'email'},
    { data: 'doj'},
    { data: 'image'},
    { data: 'created_at'},
   

    { data: 'action', name: 'action', orderable: false},
    ],
    order: [[0, 'desc']]
    });

   
 });



      

     function openModal(){
     var employeeModal = new bootstrap.Modal(document.getElementById('employeeModal'));
      employeeModal.show();

      $('#changeNameHead').html('Add Employee');
      $('#FormEmploye').trigger('reset');
      $('#id').val('');
    
     }
    

     //save data
   $('#EmployeeForm').submit(function (e){
    e.preventDefault();
    var formData = new FormData(this);
    // console.log(formdata);
    $.ajax({
        type:"POST",
        url: "{{ route('admin.employees.save')}}",
        data:formData,
        cache:false,
        contentType: false,
        processData: false,
        success:(data)=>{
            console.log(data);

        },
        error:function(data){
            console.log(data);
        }
        

    });
   

   });

$('select[name=depertment_id]').change(function(){
var depertment_id =$(this).val();
console.log(depertment_id);

$.ajax({
type:"POST",
url: "{{ route('admin.employees.fetchDesignation')}}",
data:{'depertmentId': depertment_id},
cache:false,
success:(response)=>{
    console.log(response);
    if(response){
        var optionalHtml = '';
        
        for (let i = 0; i < response.data.length; i++) { const element=response.data[i]; optionalHtml +=`<option value='${element.id}'>
            ${element.name}</option>`;
            }
            //console.log(optionalHtml);
            $('#designationSelect').append(optionalHtml);

    }
    
    

  



},
error:function(data){

}


});

   });

   
  

   






    </script>

</body>

</html>


@endsection