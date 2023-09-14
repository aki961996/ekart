@extends('admin.layouts.master')
@section('title','Edit')
@section('content')


<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Products</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Edit Products</li>
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
                    <form action="{{route('admin.product.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="product_id" value="{{encrypt($product_all_details->id)}}">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" value="{{$product_all_details->name}}"
                                    class="form-control" id="name" placeholder="Enter Name">
                            </div>

                            <div class="form-group">
                                <label for="">Price</label>
                                <input type="text" name="price" value="{{$product_all_details->price}}"
                                    class="form-control" id="gender" placeholder="Enter Price">
                            </div>

                            {{-- <div class="form-group">
                                <label for="">Category</label>
                                <select name="category_id" class="form-control">
                                    <option value=""> Select An Option</option>
                                    @foreach ($categories_all_details as $cat)
                                    <option value="{{$cat->id}}" @if($cat->id
                                        == $product_all_details->category_id) selected="selected"
                                        @endif >{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                            <div class="form-group">
                                <label for="">Category</label>
                                <select name="category_id" class="form-control">
                                    <option value=""> Select An Option</option>
                                    @foreach ($categories_all_details as $cat)
                                    <option @selected($cat->id
                                        == $product_all_details->category_id) value="{{$cat->id}}"
                                        >{{$cat->name}}</option>
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
                                <img src="{{asset('storage/images/'.$product_all_details->image)}}" width="100" alt="">
                            </div>
                            {{-- <div class="form-group mb-0">
                                <label for="">Status</label>
                            </div>
                            <div class="form-group">
                                <input type="radio" id="active" name="status" value="1" @if($product_all_details->status
                                == "Active") checked="checked"
                                @endif>
                                <label for="active">Active</label><br>
                                <input type="radio" id="inactive" name="status" value="0"
                                    @if($product_all_details->status == "Inactive") checked="checked"
                                @endif>
                                <label for="inactive">Inactive</label><br>
                            </div> --}}

                            <div class="form-group mb-0">
                                <label for="">Status</label>
                            </div>
                            <div class="form-group">
                                <input type="radio" id="active" name="status" value="1"
                                    @checked($product_all_details->status
                                == 1) >
                                <label for="active">Active</label><br>
                                <input type="radio" id="inactive" name="status" value="0"
                                    @checked($product_all_details->status == 0)

                                >
                                <label for="inactive">Inactive</label><br>
                            </div>



                            {{-- <div class="form-group">
                                <label for="">Status</label>
                                <input type="radio" value="1" @if($product_all_details->status == 1) selected="selected"
                                @endif name="status"> Active
                                <input type="radio" value="0" @if($product_all_details->status == 0) selected="selected"
                                @endif name="status"> Inactive
                            </div> --}}

                            <div class="form-group mb-0">
                                <label for="">Is fav</label>
                            </div>

                            <div class="form-group">

                                <input type="radio" value="1" name="is_favorite"
                                    @checked($product_all_details->is_favorite
                                == 1) > Yes
                                <input type="radio" value="0" name="is_favorite"
                                    @checked($product_all_details->is_favorite
                                == 0) > No
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" ata-toggle="modal"
                                data-target="#staticBackdrop">update</button>
                        </div>
                    </form>
                </div>




            </div>

        </div>

    </div>
</section>
@endsection