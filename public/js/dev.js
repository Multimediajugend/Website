/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function editUser(id) {
    if($('#user-'+id).height() < 50)
    {
        $('#user-'+id).css('cursor', 'auto');
        $('#user-'+id+' .userWrapperSmall').fadeOut(400, function(){
            $('#user-'+id+' .userWrapperBig').fadeIn(400);
        });
        $('#user-'+id).animate({
            height: "75px",
        }, 400);
    }
}

function cancelEditUser(id) {
    if($('#user-'+id).height() > 50)
    {
        $('#user-'+id+' .userWrapperBig').fadeOut(400, function(){
            $('#user-'+id+' .userWrapperSmall').fadeIn(400);
            $('#user-'+id).animate({
                height: "25px",
            }, 400, function() {
                $('#user-'+id).css('cursor', 'pointer');
            });
        });
    }
}

function editGroup(id) {
    if($('#group-'+id).height() < 50)
    {
        $('#group-'+id).css('cursor', 'auto');
        $('#group-'+id+' .groupWrapperSmall').fadeOut(400, function(){
            $('#group-'+id+' .groupWrapperBig').fadeIn(400);
        });
        $('#group-'+id).animate({
            height: "75px",
        }, 400);
    }
}