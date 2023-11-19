$(document).ready(function () {
    $(document).on("click", "#Store_Supplier, #Store_Customer", function () {
        $("#default_Form").validate({
            rules: {
                supplier_name: {
                    required: true,
                },
                customer_name: {
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
                customer_email:{
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
                customer_name: {
                    required: "Enter customer Name"
                },
                mobile_no:{
                    required: "Enter mobile number",
                    number: "Please Enter a valid phone number",
                    minlength: "Phone number must be 11 characters",
                },
                supplier_email: {
                    required: "Enter supplier email",
                    email: "Please enter a valid email",
                },
                customer_email: {
                    required: "Enter customer email",
                    email: "Please enter a valid email",
                },
                address:{
                    required: "Enter address",
                }
            }
        });
    });
});