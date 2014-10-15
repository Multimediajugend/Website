// common way to initialize jQuery
$(function () {
	// initialize things....
	$("#loginErrorMessage").hide();
	$('[data-content="admin"]').hide();


	//check if token is still valid and session storage is still empty (first visit)
	if (localStorage.getItem("token") && !sessionStorage.getItem("id")) {
		//CHECK IF TOKEN IS STILL VALID!
		var dataUrl = "json/checktoken?token=" + localStorage.getItem("token");

		$.ajax({
			type: "get",
			url: dataUrl,
			dataType: "json",
			success: processCheckResponse,
			error: function (o, c, m) { throw (m); }
		});

		function processCheckResponse(data) {
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
	else if (sessionStorage.getItem("id")) {
		//start adminpanel if session storage is already set (navigated from one page to another)
		startAdmin();
	}

	$("#loginModal").easyModal({
		autoOpen: false,
		overlayOpacity: 0.5,
		overlayColor: "#333",
		overlayClose: false,
		closeOnEscape: true
	});
    
    $("#newsModal").easyModal({
		autoOpen: false,
		overlayOpacity: 0.5,
		overlayColor: "#333",
		overlayClose: false,
		closeOnEscape: true
	});
    
    $('#addNews').click(function() {
        showNewsModal('', '', '', '');
    });
    
    $('.newsEdit').click(function(e) {
        var news = $(this).closest(".newsSingle")[0];
        var id = $(news).find('.newsId').val();
        var headline = $(news).find('.newsHeadline').text();
        var text = $(news).find('.newsTeaser').text();
        var image = '';
        if($(news).find('.newsImage').length > 0)
        {
            image = $(news).find('.newsImage').attr('src');
            image = image.replace(_url, '');
        }
        
        showNewsModal(id, image, headline, text);
    });
});

var loginBlocked = false;

function clickAdminButton() {
	//check: already logged in?
	if (sessionStorage.getItem("id")) {
		//scroll to admin-panel
		$("html, body").animate({ scrollTop: 0 }, "slow");
	}
	else {
		$('#loginModal').trigger('openModal');
	}
}

function login() {

	if (loginBlocked)
		return;

	//block login function to prevent multiple 'login' clicks
	loginBlocked = true;

	var dataUrl = _url + "json/login";
	var loginStuff = { email: $("#loginEmail").val(), password: $("#loginPassword").val() };

	$.ajax({
		type: "post",
		url: dataUrl,
		dataType: "json",
		data: JSON.stringify(loginStuff),
		success: processLoginResponse,
		error: function (o, c, m) { throw (m); }
	});

	function processLoginResponse(data) {
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
	if (sessionStorage.getItem("contenteditorActivated"))
		startContenteditor();
    $('#header').css( "padding-top", "52px" );
}

function endAdmin() {
	//getBindElement('admin', 'vorname').text("");
	$('[data-content="admin"]').hide();
    $('#header').css( "padding-top", "" );
    endContenteditor();
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

function toggleContenteditor() {
	//if bereits aktiviert, dann deaktivieren:
	if (sessionStorage.getItem("contenteditorActivated"))
		endContenteditor();
	else
		startContenteditor();
}

function startContenteditor() {
	sessionStorage.setItem("contenteditorActivated", "true");
	$('#adminPanelButtonContents').addClass("active");
	//editierbuttons usw einblenden....
    $('.editSection').show();
}

function endContenteditor() {
	sessionStorage.removeItem("contenteditorActivated");
	$('#adminPanelButtonContents').removeClass("active");
	//zeuch ausblenden....
    $('.editSection').hide();
}

function showNewsModal(id, image, headline, text) {
    $('#newsModalTeaserId').val(id);
    $('#newsModalImage').val(image);
    $('#newsModalHeadline').val(headline);
    $('#newsModalText').val(text);
    
    $('#newsModal').trigger('openModal');
}

function saveNews() {
    var id = parseInt($('#newsModalTeaserId').val());
    var headline = $('#newsModalHeadline').val();
    var image = $('#newsModalImage').val();
    var text = $('#newsModalText').val();
    if(isNaN(id))
    {
        //TODO: add News
        console.log('add news');
    }
    else
    {
        //TODO: modify News
        console.log('modify news:' + id);
    }
    $('#newsModal').trigger('closeModal');
}