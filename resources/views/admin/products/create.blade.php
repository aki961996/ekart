@extends('admin.layouts.master')
@section('title','create')
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Create Products</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Create Products</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>


<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">

          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{route('admin.product.save')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" id="" placeholder="Enter Name">
              </div>

              <div class="form-group">
                <label for="">Price</label>
                <input type="text" name="price" class="form-control" id="" placeholder="Enter Price">
              </div>

              <div class="form-group">
                <label for="">Category</label>
                <select name="category_id" class="form-control">
                  <option value=""> Select An Option</option>
                  @foreach ($categories as $cat)
                  <option value="{{$cat->id}}">{{$cat->name}}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label>File input</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                  </div>
                </div>
              </div>



              <div class="form-group">
                <label for="">Status</label>
                <input type="radio" value="1" name="status"> Yes
                <input type="radio" value="0" name="status"> No
              </div>

              <div class="form-group">
                <label>Is fav</label>
                <input type="radio" value="1" name="is_favorite"> Yes
                <input type="radio" value="0" name="is_favorite"> No
              </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary" ata-toggle="modal"
                data-target="#staticBackdrop">Submit</button>
            </div>
          </form>
        </div>




      </div>

    </div>

  </div>
</section>
@endsection