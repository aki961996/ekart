@extends('admin.layouts.master')

@section('title','Products')
@section('content')
{{-- success nsg --}}
{{-- @if($msg= Session::get('message'))
<div class="alert alert-success">
  <p class="">{{ $msg }}</p>
</div>
@endif --}}
{{-- success nsg end --}}

@if($msg = Session::get('message'))
<div class="alert alert-info alert-dismissible fade show" role="alert">
  <p class="m-0">{{ $msg }}</p>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif




<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Products ({{$products->total()}}) </h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Products</li>
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
          <div class="card-header text-right">
            <a href="{{route('admin.product.create')}}" class="btn btn-primary">Add Products</a>
          </div>

          <div class="card-header text-right">

            <a href="{{route('admin.students.students')}}" class="btn btn-success"> <i
                class="fas fa-plus-circle"></i></a>
          </div>


          {{-- script --}}
          <script>
            @if(Session::has('message'))
                      Swal.fire({
                          title: "{{ Session::get('message') }}",
                          icon: 'success',
                          showCancelButton: false,
                          confirmButtonText: 'OK'
                      });
                  @endif
          </script>

          {{-- end script --}}

          <div class="card-body table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Category</th>
                  <th>Staus</th>
                  <th>Favorite</th>
                  <th style="width: 15%">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($products as $pro)
                <tr>
                  {{-- <th scope="row">{{$user->firstItem() + $loop->index}}</th> --}}
                  <td>{{$products->firstItem()+ $loop->index}}</td>
                  <td class="align-middle">
                    <img style='width:100px;' src="{{ asset('storage/images/' . $pro->image) }}" alt="">
                  </td>
                  <td>{{$pro->name}}</td>
                  <td>{{number_format($pro->price,2)}}</td>
                  <td>{{$pro->category->name}}</td>
                  <td>{{$pro->status_text}}</td>
                  <td>{{$pro->is_favorite_text}}</td>
                  <td>

                    <a href="{{route('admin.product.edit',encrypt($pro->id))}}" class="btn btn-primary btn-sm">Edit</a>
                    <a href="{{route('admin.product.delete',encrypt($pro->id))}}"
                      class="btn btn-danger btn-sm ml-1">Delete</a>



                  </td>

                </tr>
                @endforeach

              </tbody>
            </table>
            <div>
              {{$products->links()}}
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer clearfix">

          </div>
        </div>

      </div>

    </div>


  </div>

</section>
@endsection