<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Login||Ekart</title>
</head>

<body>

    <div class="container ">
        <div class="row justify-content-end min-vh-100 align-items-center">
            <div class="col-sm-5 ">
                <h2 class="mb-3">Sign In</h2>

                <form action="{{route('admin.do.login')}}" method="post" class="form-signin">

                    @csrf
                    {{-- user invlid msg --}}
                    <div>
                        @if($msg= Session::get('message'))
                        <div class="alert alert-danger">
                            <p class="mb-0">{{ $msg }}</p>
                        </div>
                        @endif
                    </div>
                    {{-- logout msg --}}
                    {{-- <div>
                        @if($msg= Session::get('logout'))
                        <div class="alert alert-success">
                            <p class="mb-0">{{ $msg }}</p>
                        </div>
                        @endif
                    </div> --}}


                    <div class="form-label-group">
                        <input type="text" class="form-control" name="username" placeholder="User Name" required>
                        <label>User Name</label>
                    </div>

                    <div class="form-label-group">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                        <label>Password</label>
                    </div>

                    <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" name="remember_me" value="1"> Remember me
                        </label>
                    </div>

                    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
</body>

</html>