
function updateVisitTimes(id){
$(document).ready(function(){
        	$.get("http://zhaocong.comp.nus.edu.sg/classifier/midman/auto_increase_visit_times.php?id="+id);}
             );
}


$(document).ready(function() {
	// validate signup form on keyup and submit
	var validator = $("#signupform").validate({
		rules: {
			username: {
				required: true,
				minlength: 2
			},
			password: {
				password: "#username"
			},
			password_confirm: {
				required: true,
				equalTo: "#password"
			}
		},
		messages: {
			username: {
				required: "Enter a username",
				minlength: jQuery.format("Enter at least {0} characters")
			},
			password_confirm: {
				required: "Repeat your password",
				minlength: jQuery.format("Enter at least {0} characters"),
				equalTo: "Enter the same password as above"
			}
		},
		// the errorPlacement has to take the table layout into account
		errorPlacement: function(error, element) {
			error.prependTo( element.parent().next() );
		},
		// specifying a submitHandler prevents the default submit, good for the demo
		submitHandler: function() {
			alert("submitted!");
		},
		// set this class to error-labels to indicate valid fields
		success: function(label) {
			// set &nbsp; as text for IE
			label.html("&nbsp;").addClass("checked");
		}
	});
});