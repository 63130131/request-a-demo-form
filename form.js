$(document).ready(function() {
	$("form").submit(function(event) {
		event.preventDefault();
		var name = $("#nameF").val();
		var email = $("#emailF").val();
		var phone = $("#phoneF").val();
		var restaurant = $("#restaurantF").val();
		var zip = $("#zipF").val();
		$(".form-message").load("mail.php", {
			name: name,
			email: mail,
			phone: phone,
			restaurant: restaurant,
			submit: submit

		})
	})
})