@extends('admin.layouts.master')

@section('title','Employees')
@section('content')

<!-- Content Wrapper. Contains page content -->

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        {{-- <h1>Products ({{$products->total()}}) </h1> --}}
        <h1><button class="btn btn-primary" data-toggle="modal" data-target="#addNewModel">Add New</button> </h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Employees</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <!-- /.card-header -->
          {{-- <div class="card-header text-right">
            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#addNewModel">Add New</a>
          </div> --}}
          <div class="card-body table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Dob</th>
                  <th>Mobile</th>
                  <th>
                    Designation
                  </th>

                  <th style="width: 15%">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($employee as $emp)
                <tr>
                  {{-- <th scope="row">{{$employee->firstItem() + $loop->index}}</th> - --}}
                  <td>{{$loop->iteration}}</td>
                  <td>{{$emp->name}}</td>
                  <td>{{$emp->email}}</td>
                  <td>{{$emp->dob}}</td>
                  <td>{{$emp->mobile}}</td>
                  <td>{{$emp->designation_id}}</td>
                  <td>
                    {{-- <a href="" class="btn btn-primary btn-sm">Edit</a>
                    <a href="" class="btn btn-danger btn-sm ml-1">Delete</a> --}}
                    <button class="btn btn-primary" id="editEmployees" data-toggle="modal"
                      data-target="#editModel">Edit</button>
                    <button class="btn btn-danger">Delete</button>
                  </td>

                </tr>
                @endforeach
              </tbody>
            </table>
            <div>
              {{-- {{$products->links()}} --}}
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer clearfix">

          </div>
        </div>

      </div>

    </div>


  </div>

  {{-- edit modal --}}
  <div class="modal fade" id="editModel" fetch-designation=""
    save-action="{{route('admin.employees.edit-employees',$emp->id)}}" token="{{csrf_token()}}" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Employees</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form save-action="{{route('admin.employees.update-employees')}}" token="{{csrf_token()}}"
            enctype="multipart/form-data" id="updateForm">
            @csrf
            <input type="hidden" name="employee_id" id="employees_id" value="">
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Name:</label>
              <input type="text" name="name" id="editName" value="" class="form-control" >
            </div>

            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Gender:</label>
              <select name="gender" class="form-control" id="genderEdit">
                <option value="1">Male</option>
                <option value="2">Female</option>
                <option value="3">Transgender</option>
              </select>
            </div>

            <div class="mb-3">
              <label for="message-text" class="col-form-label">Date of birth:</label>
              <input type="text" class="form-control datepicker" value="" name="dob" id="dob_edit"></input>
            </div>

            <div class="mb-3">
              <label for="message-text" class="col-form-label">Address:</label>
              <textarea type="text" class="form-control" value="" name="address" id="address_edit"></textarea>
            </div>

            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Mobile:</label>
              <input type="text" name="mobile" value="" class="form-control" id="mobile_edit">
            </div>
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Email:</label>
              <input type="text" name="email" value="" class="form-control" id="email_edit">
            </div>

            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Departments:</label>
              <select name="depertment_id" value="" class="form-control" id="dep_id_edit">
                <option value="">Select an option</option>
                @foreach($departments as $dep)
                <option value="{{$dep->id}}">{{$dep->name}}</option>
                @endforeach

              </select>
            </div>

            {{-- designation_id --}}
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Designations:</label>
              <select name="designation_id" value="" id="designation_id_edit" class="form-control">
              </select>
            </div>

            <div class="mb-3">
              <label for="message-text" class="col-form-label">Date of Joinig:</label>
              <input type="text" class="form-control datepicker" value="" name="doj" id="doj_edit"></input>
            </div>

            <div class="mb-3">
              <label for="message-text" class="col-form-label">image:</label>
              <input type="file" class="form-control " value="" name="image" id="img_edit"></input>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary ">Update</button>
            </div>


          </form>

        </div>

      </div>
    </div>
  </div>




  <!-- Modal -->
  <div class="modal fade" id="addNewModel" fetch-designation="{{route('admin.employees.fetch-designation')}}"
    save-action="{{route('admin.employees.save')}}" token="{{csrf_token()}}" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Employees</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form action="{{route('admin.employees.save')}}" token="{{csrf_token()}}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Name:</label>
              <input type="text" name="name" class="form-control" id="name" value="">
            </div>

            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Gender:</label>
              <select name="gender" id="gender_in" class="form-control" value="">
                <option value="1">Male</option>
                <option value="2">Female</option>
                <option value="3">Transgender</option>
              </select>
            </div>

            <div class="mb-3">
              <label for="message-text" class="col-form-label">Date of birth:</label>
              <input type="text" class="form-control datepicker" name="dob" id="dob_dat" value=""></input>
            </div>

            <div class="mb-3">
              <label for="message-text" class="col-form-label">Address:</label>
              <textarea type="text" class="form-control " name="address" id="address_in" value=""></textarea>
            </div>

            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Mobile:</label>
              <input type="text" name="mobile" class="form-control" id="mobile_phone" value="">
            </div>
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Email:</label>
              <input type="text" name="email" class="form-control" id="email_adreess" value="">
            </div>

            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Departments:</label>
              <select name="depertment_id" id="dep_id" class="form-control" value="">
                <option value="">Select an option</option>
                @foreach($departments as $dep)
                <option value="{{$dep->id}}">{{$dep->name}}</option>
                @endforeach

              </select>
            </div>

            {{-- designation_id --}}
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Designations:</label>
              <select name="designation_id" id="designation_id" class="form-control" value="">
              </select>
            </div>

            <div class="mb-3">
              <label for="message-text" class="col-form-label">Date of Joinig:</label>
              <input type="text" class="form-control datepicker" name="doj" id="doj_doj" value=""></input>
            </div>

            <div class="mb-3">
              <label for="message-text" class="col-form-label">image:</label>
              <input type="file" class="form-control " name="image" id="img" value=""></input>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary saveEmployee">Save changes</button>
            </div>


          </form>

        </div>

      </div>
    </div>
  </div>
</section>
@endsection


{{-- this is done with anothe main.js page --}}

{{-- @section('scripts')
@parent

<script type="text/javascript">
  $(function() {
              $(".datepicker").datepicker();

              $('.saveEmployee').click(function(){
               //oro valur edukal
              
              var name= $('input[name=name]').val();
              var gender= $('select[name=gender]').val();
              var dob=$('input[name=dob]').val();
              var address= $('textarea[name=address]').val();
              var mobile=$('input[name=mobile').val();
              var email=$('input[name=email]').val();
              var depertmentId= $('select[name=depertment_id]').val();
              var designationId= $('select[name=designation_id]').val();
              var doj= $('input[name=doj]').val();
              var image= $('input[name=image]').val();
              
             
            $.ajax({

            });
            
             

              });



   } );
</script>
@endsection --}}