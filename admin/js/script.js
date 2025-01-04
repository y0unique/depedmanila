$(document).ready(function () {
    $("#show-login").click(function () {
        $("#login-form").show();
        $("#error-message").empty();
    });

    // Login form submit
    $("#login-form").submit(function (e) {
        e.preventDefault();
        var username = $("#webusername").val();
        var password = $("#webpassword").val();
        
        $.ajax({
            type: "POST",
            url: "database/login_inc.php",
            data: {
                username: username,
                password: password
            },
            success: function (response) {
                var result = JSON.parse(response);
                if (result.status === "success") {
                    alert(result.message);
                    window.location.href = "index.php";
                } else {
                    alert(result.message);
                    $("#webpassword").val('');
                    $("#error-message").html(result.message);
                }
            },
            error: function () {
                console.log("Error during AJAX request.");
            }
        });
    });
});
