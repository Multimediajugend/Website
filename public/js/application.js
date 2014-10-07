// common way to initialize jQuery
$(function() {
    
});


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