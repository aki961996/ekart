$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
       

    $("#todo-datatable").DataTable({
        processing: true,
        serverSide: true,
        ajax: todo_url,
        columns: [
            { data: "id", name: "id" },
            { data: "title", name: "title" },
            { data: "description", name: "description" },

            { data: "created_at", name: "created_at" },
            { data: "action", name: "action", orderable: false },
        ],
        order: [[0, "desc"]],
    });
});

function add() {
    $("#formModal").modal("show");
    $("#myForm").trigger("restet");
}
