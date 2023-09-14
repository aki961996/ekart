<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
</head>

<body>
    <div class="contaner mt-2">
        <div class="row">
            <div class="col-12 d-flex justify-content-between mb-2">
                <a href="javascript:void(0)" onclick="add()" class="btn btn-info mt-3">Demo</a>
            </div>
        </div>

    </div>

    {{-- modal --}}
    <div class="modal fade" id="demoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">demo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" id="demoForm" name="demoForm" class="form-horizontal"
                        method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-lable">Name</label>
                            <div class="col-sm-12">
                                <input type="text" name="fname" id="fname" class="form-control" placeholder="Enter Name"
                                    required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-lable">Last name</label>
                            <div class="col-sm-12">
                                <input type="text" name="lname" id="lname" class="form-control" placeholder="Enter Name"
                                    required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="btn-demo">Save changes</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

    {{-- modal end --}}

    <script type="text/javascript">
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
                }

            });

    });
        function add(){
        $('#demoModal').modal('show');
    }

    $('#demoForm').submit(function(event){
      
       event.preventDefault();
       var formData = new FormData(this);
      // console.log(formData);
       $.ajax({
        type:'POST',
        url:"{{route('admin.demo.store')}}",
        cache:false,
        data:formData,
        processData:false,
        contentType:false,
        success:(data)=>{
        console.log(data);
        },
        error:function(data){
        console.log(data);
        }



       });



    });






    </script>
</body>

</html>