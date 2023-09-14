$(function () {
    $(".datepicker").datepicker();

    $(".saveEmployee").click(function () {
        // console.log("sefg");
        //oro valur edukal
        var name = $("#name").val();
        //  console.log(name);
        var gender = $("#gender_in").val();
        //  console.log(gender);
        var dob = $("#dob_dat").val();
        console.log(dob);
        var address = $("#address_in").val();
        var mobile = $("#mobile_phone").val();
        var email = $("#email_adreess").val();
        var depertmentId = $("#dep_id").val();
        var designationId = $("#designation_id").val();
        var doj = $("#doj_doj").val();
        var image = $("#img").val();

        $.ajax({
            type: "POST",
            url: $("#addNewModel").attr("save-action"),

            headers: {
                "X-CSRF-TOKEN": $("#addNewModel").attr("token"),
            },

            data: {
                // _token: $("#addNewModel").attr("token"),
                name: name,
                gender: gender,
                dob: dob,
                address: address,
                mobile: mobile,
                email: email,
                depertment_id: depertmentId,
                designation_id: designationId,
                doj: doj,
                image: image,
            },
            success: function (response) {
                // console.log(response);
                if (response.status == 200) {
                    $("#addNewModel").modal("hide");
                }
            },
        });
    });

    $("select[name=depertment_id]").change(function () {
        var depertmentId = $(this).val();

        if (depertmentId != "") {
            $.ajax({
                type: "POST",
                url: $("#addNewModel").attr("fetch-designation"),

                headers: {
                    "X-CSRF-TOKEN": $("#addNewModel").attr("token"),
                },

                data: {
                    // _token: $("#addNewModel").attr("token"),
                    depertment_id: depertmentId,
                },
                dataType: "JSON",
                success: function (response) {
                    let optionHtml = "";
                    for (let i = 0; i < response.data.length; i++) {
                        const element = response.data[i];
                        optionHtml += `<option value='${element.id}'>${element.name}</option>`;
                    }

                    $("select[name=designation_id]").html(optionHtml);
                },
            });
        }
    });

    // edit ajax
    $("#editEmployees").click(function () {

        $.ajax({
            type: "GET",
            url: $("#editModel").attr("save-action"),
            dataType: "JSON",
            data: {
                id:id
            },
            headers: {
                "X-CSRF-TOKEN": $("#editModel").attr("token"),
            },

            success: function (response) {
                //console.log(response);
                if (response.status === 200) {
                    $("#employees_id").val(response.message.id);
                    $("#editName").val(response.message.name);
                    $("#genderEdit").val(response.message.gender);
                    $("#dob_edit").val(response.message.dob);
                    $("#address_edit").val(response.message.address);
                    $("#mobile_edit").val(response.message.mobile);
                    $("#email_edit").val(response.message.email);
                    $("#dep_id_edit").val(response.message.depertment_id);
                    $("#designation_id_edit").val(
                        response.message.designation_id
                    );
                    $("#doj_edit").val(response.message.doj);
                }
            },
        });
    });

    //update
    $("#updateForm").submit(function (e) {
        e.preventDefault();
        var id = $("input[name=employee_id]").val();
        var name = $("input[name=name]").val();
        var gender = $("select[name=gender]").val();
        var dob = $("input[name=dob]").val();
        var address = $("textarea[name=address]").val();
        var mobile = $("input[name=mobile").val();
        var email = $("input[name=email]").val();
        var depertmentId = $("#depertment_id").val();
        //console.log(depertmentId);
        // var depertmentId = $("select[name=depertment_id]").val();
        var designationId = $("#designation_id").val();
        //console.log(designationId);
        var doj = $("input[name=doj]").val();
        var image = $("input[name=image]").val();
        var newData = {
            id: id,
            name: name,
            gender: gender,
            dob: dob,
            address: address,
            mobile: mobile,
            email: email,
            depertmentId: depertmentId,
            designationId: designationId,
            doj: doj,
            image: image,
        };

        $.ajax({
            type: "POST",
            url: $("#updateForm").attr("save-action"),
            dataType: "JSON",
            data: newData,

            headers: {
                "X-CSRF-TOKEN": $("#updateForm").attr("token"),
            },

            success: function (response) {
                console.log(response);
                if (response.status == 200) {
                    $("#editModel").modal("hide");
                }
            },
        });
    });
});
