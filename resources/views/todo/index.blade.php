{{-- <div>
    <!-- Simplicity is an acquired taste. - Katharine Gerould -->
</div> --}}
@extends('admin.layouts.master')
@section('title','Todo')
@section('content')

<body>
    <div class="container">
        <div class="d-flex bd-highlight mb-4">
            <div class="p-2 w-100 bd-highlight">
                <h2>Todo App</h2>
            </div>
            <div class="p-2 flex-shrink-0 bd-highlight">
                <div class="pull-right mb-2">
                    <a class="btn btn-success" onClick="add()" href="javascript:void(0)"> Create Todo</a>
                </div>
            </div>
        </div>
        <div>
            <table class="table table-inverse" id="todo-datatable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                </thead>


            </table>
            {{-- modal --}}
            <div class="modal fade" id="formModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="formModalLabel">Create Todo</h4>
                        </div>
                        <div class="modal-body">
                            <form action="javascript:void(0)" id="myForm" name="myForm" class="form-horizontal"
                                novalidate="">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        placeholder="Enter title" value="">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" class="form-control" id="description" name="description"
                                        placeholder="Enter Description" value="">
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" id="btn-save" value="add">Save
                                        changes
                                    </button>
                                    {{-- <button type="submit" class="btn btn-primary" id="btn-save">Save
                                        changes</button> --}}
                                    <input type="hidden" id="todo_id" name="todo_id" value="0">
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
@endsection