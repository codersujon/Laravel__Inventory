$(document).ready(function () {
    $(document).on("click", "#Store_Supplier", function () {
        $("#Supplier_Form").validate({
            rules: {
                supplier_name: {
                    required: true,
                },
                mobile_no:{
                    required: true,
                    number: true,
                    minlength: 11,
                },
                supplier_email:{
                    required: true,
                    email: true,
                },
                address:{
                    required: true,
                }
            },
            messages: {
                supplier_name: {
                    required: "Enter supplier Name"
                },
                mobile_no:{
                    required: "Enter supplier mobile number",
                    number: "Please Enter a valid phone number",
                    minlength: "Phone number must be 11 characters",
                },
                supplier_email: {
                    required: "Please supplier email",
                    email: "Please enter a valid email",
                },
                address:{
                    required: "Please enter supplier address",
                }

            }
        });
    });
});