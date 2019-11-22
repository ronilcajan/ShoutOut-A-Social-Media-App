toastr.options = {
	closeButton: false,
	debug: false,
	newestOnTop: false,
	progressBar: true,
	positionClass: "toast-top-center",
	preventDuplicates: true,
	onclick: null,
	showDuration: "300",
	hideDuration: "1000",
	timeOut: "5000",
	extendedTimeOut: "1000",
	showEasing: "swing",
	hideEasing: "linear",
	showMethod: "fadeIn",
	hideMethod: "fadeOut"
};
$(document).ready(function(e) {

    // =============  Signup Ajax here ==================
	$(".signup-btn").click(function(e) {
		e.preventDefault();
		var user = $(".username").val();
		var email = $(".email").val();
		var pass = $("#password").val();
		var pass2 = $(".password1").val();

		if ($.trim(user) == false) {
			toastr.warning("Please fill your username!");
            $("#username").focus();
            $('#username').addClass('is-invalid');
		} else if ($.trim(email) == false) {
            $("#email").focus();
            $('#email').addClass('is-invalid');
            $('#username').removeClass('is-invalid');
            $('#username').addClass('is-valid');
			toastr.warning("Please fill your email correctly!");
		} else if (email.includes("@") == false) {
            $("#email").focus();
            $('#email').addClass('is-invalid');
            $('#username').removeClass('is-invalid');
            $('#username').addClass('is-valid');
			toastr.warning("Please include '@' in your email!");
		} else if ($.trim(pass).length < 8) {
            $("#password").focus();
            $('#password').addClass('is-invalid');
            $('#email').removeClass('is-invalid');
            $('#email').addClass('is-valid');
            toastr.warning("Please enter 8 or more characters!");
		} else if ($.trim(pass2) != $.trim(pass)) {
            $("#password1").focus();
            $('#password').removeClass('is-invalid');
            $('#password').addClass('is-valid');
            $('#password1').addClass('is-invalid');
            toastr.warning("Password did not match!");
		} else {
			$.ajax({
				type: "POST",
				url: "signup-submit",
				data: {
					username: user,
					email: email,
					password: pass,
					password1: pass2
				},
				dataType: "json",
				cache: false,
				success: function(response) {
					if (response.success == true) {
						window.location = response.message;
					} else {
                        if(response.message.includes('Username')){
                            toastr.error(response.message);
                            $('#username').addClass('is-invalid');
                        }else{
                            toastr.error(response.message);
                        }
					}
				}
			});
			return false;
		}
    });
    
    // =============  Login Ajax here ==================
    $('.login-btn').click(function(e){
        e.preventDefault();
		var user = $(".username").val();
        var pass = $("#password").val();

        if ($.trim(user) == false) {
			toastr.warning("Please enter your username!");
            $("#username").focus();
            $('#username').addClass('is-invalid');
        } else if($.trim(pass) == false){
            $("#password").focus();
            $('#username').removeClass('is-invalid');
            $('#username').addClass('is-valid');
            toastr.warning("Please enter you password!");
        }else{
            $.ajax({
                type: "POST",
                url: "login-user",
                data: {
                    username: user,
                    password: pass
                },
                dataType: "json",
                cache: false,
                success: function(response) {
                    if (response.success == true) {
                        window.location = response.message;
                    } else {
                        toastr.error(response.message);
                        $('#username').removeClass('is-valid');
                        $('#username').addClass('is-invalid');
                        $('#password').addClass('is-invalid');
                    }
                }
            });
            return false;
        }
    });

});
