// common way to initialize jQuery
$(function() {
	// initialize things....
	$("#loginErrorMessage").hide();
	$('[data-content="admin"]').hide();


	//check if token is still valid
	if(localStorage.getItem("token") && !sessionStorage.getItem("id"))
	{
		//CHECK IF TOKEN IS STILL VALID!
		var dataUrl = "json/checktoken?token=" + localStorage.getItem("token");

		$.ajax({
			type: "get",
			url: dataUrl,
			dataType: "json",
			success: processCheckResponse,
			error: function (o, c, m) { throw (m); }
		});

		function processCheckResponse(data)
		{
			switch (data.type) {
				case 'failure':
					endAdmin();
					break;
				case 'success':
					//save authentication reponse data:
					setStorage(data.token, data.user);
					startAdmin();
					break;
			}
		}
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

	//block login function to prevent multiple 'login' clicks
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

				//save login reponse data
				setStorage(data.token, data.user);
				//show admin panel etc...
				startAdmin();
				//scroll to admin-panel
				$("html, body").animate({ scrollTop: 0 }, "slow");

				break;
		}
		//release login-button
		loginBlocked = false;
	}
}

function startAdmin() {
	getBindElement('admin', 'vorname').text(sessionStorage.getItem("firstname") + ' ' + sessionStorage.getItem("lastname"));
	$('[data-content="admin"]').show();
}

function endAdmin() {
	//getBindElement('admin', 'vorname').text("");
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

function setStorage(token, userdata) {
	//token to persistent storage
	localStorage.setItem("token", token);
	//and all the other stuff to the session storage
	sessionStorage.setItem("user", userdata.email);
	sessionStorage.setItem("firstname", userdata.firstname);
	sessionStorage.setItem("lastname", userdata.lastname);
	sessionStorage.setItem("id", userdata.id);
	sessionStorage.setItem("lastlogin", userdata.lastlogin);
}