/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function () {
    // initialize things....
    $("#loginErrorMessage").hide();
    $('[data-content="admin"]').hide();

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
                    loadScript();
                    break;
            }
        }
    }
    else if (sessionStorage.getItem("id")) {
        //start adminpanel if session storage is already set (navigated from one page to another)
        loadScript();
    }
    
    $("#loginModal").easyModal({
        autoOpen: false,
        overlayOpacity: 0.5,
        overlayColor: "#333",
        overlayClose: false,
        closeOnEscape: true
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

    function processLoginResponse(data) {
        switch (data.type) {
            case 'failure':
                $("#loginErrorMessage").show();
                break;
            case 'success':
                $("#loginErrorMessage").hide();
                $('#loginModal').trigger('closeModal');

                //save login reponse data
                setStorage(data.token, data.user, data.script);
                //show admin panel etc...
                loadScript();
                //scroll to admin-panel
                $("html, body").animate({ scrollTop: 0 }, "slow");
                break;
        }
        //release login-button
        loginBlocked = false;
    }
}

function loadScript() {
    // asynchroneus load of the admin-script
    if(!$('script#admin').length){
        $('head').append('<script id="admin" src="'+localStorage.getItem("script")+'"></' + 'script>');
    }
    startAdmin();
}

function setStorage(token, userdata, adminscript) {
    //token to persistent storage
    localStorage.setItem("token", token);
    //url to the adminscript
    localStorage.setItem("script", adminscript)
    //and all the other stuff to the session storage
    sessionStorage.setItem("user", userdata.email);
    sessionStorage.setItem("firstname", userdata.firstname);
    sessionStorage.setItem("lastname", userdata.lastname);
    sessionStorage.setItem("id", userdata.id);
    sessionStorage.setItem("lastlogin", userdata.lastlogin);
}

function clearStorage() {
    localStorage.removeItem("token");
    localStorage.removeItem("script")
    //and all the other stuff to the session storage
    sessionStorage.removeItem("user");
    sessionStorage.removeItem("firstname");
    sessionStorage.removeItem("lastname");
    sessionStorage.removeItem("id");
    sessionStorage.removeItem("lastlogin");
    sessionStorage.removeItem("contenteditorActivated");
}

