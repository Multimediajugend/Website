// common way to initialize jQuery
$(function() {
	// initialize things....
	$("#loginErrorMessage").hide();
	$('[data-content="admin"]').hide();


	//check for login
	if(localStorage.getItem("token"))
	{
		//TODO: CHECK IF TOKEN IS STILL VALID!

		//retrieve users meta data and save to sessionStorage

		startAdmin();
	}
});

var loginBlocked = false;

// initialize login form modal:
$(function () {
	$("#loginModal").easyModal({
		autoOpen: false,
		overlayOpacity: 0.5,
		overlayColor: "#333",
		overlayClose: false,
		closeOnEscape: true
	});
});

function login() {

	if (loginBlocked)
		return;

	loginBlocked = true;

	var dataUrl = "json/login";
	var loginStuff = { email: $("#loginEmail").val(), password: $("#loginPassword").val() };

	$.ajax({
		type: "post",
		url: dataUrl,
		dataType: "json",
		data: JSON.stringify(loginStuff),
		success: processLoginResponse,
		error: function (o, c, m) { throw (m); }
	});

	function processLoginResponse(data)
	{
		switch (data.type) {
			case 'failure':
				$("#loginErrorMessage").show();
				break;
			case 'success':
				$("#loginErrorMessage").hide();
				$('#loginModal').trigger('closeModal');

				//save login reponse data:
				//token to persistent storage
				localStorage.setItem("token", data.token);
				//and all the other stuff to the session storage
				sessionStorage.setItem("user", data.user.email);
				sessionStorage.setItem("firstname", data.user.firstname);
				sessionStorage.setItem("lastname", data.user.lastname);
				sessionStorage.setItem("id", data.user.id);
				sessionStorage.setItem("lastlogin", data.user.lastlogin);

				startAdmin();

				$("html, body").animate({ scrollTop: 0 }, "slow");

				break;
		}

		loginBlocked = false;
	}
}

function startAdmin() {
	getBindElement('admin', 'vorname').text(sessionStorage.getItem("firstname") + ' ' + sessionStorage.getItem("lastname"));
	$('[data-content="admin"]').show();
}

function endAdmin() {
	getBindElement('admin', 'vorname').text("");
	$('[data-content="admin"]').hide();
	clearStorage();
}

function getBindElement(module, name) {
	return $('[data-content="' + module + '"] [data-binding="' + name + '"]');
}

function clearStorage() {
	localStorage.removeItem("token");
	//and all the other stuff to the session storage
	sessionStorage.removeItem("user");
	sessionStorage.removeItem("firstname");
	sessionStorage.removeItem("lastname");
	sessionStorage.removeItem("id");
	sessionStorage.removeItem("lastlogin");
}