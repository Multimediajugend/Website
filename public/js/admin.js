/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function startAdmin() {
    console.log("admins.js loaded");
    
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

    $('.newsDateTimePicker').datetimepicker({
        lang:'de',
        format:'d.m.Y - H:i',
        weeks: true,
        dayOfWeekStart: 1
    });

    $('.newsUnpublish').click(function() {
        var news = $(this).closest(".newsSingle")[0];
        var id = news.id.substr(4);
        
        var dataUrl = "json/unpublishnews/"+id+"?token=" + localStorage.getItem("token");

        $.ajax({
            type: "get",
            url: dataUrl,
            dataType: "json",
            success: unpublishResponse,
            error: function (o, c, m) { throw (m); }
        });
    });
    
    $('.newsPublish').click(function() {
        var news = $(this).closest(".newsSingle")[0];
        var id = news.id.substr(4);
        
        var date = $(news).find('.newsDateTimePicker').val();
        
        var dataUrl = "json/publishnews/"+id+"/"+date+"?token=" + localStorage.getItem("token");

        $.ajax({
            type: "get",
            url: dataUrl,
            dataType: "json",
            success: publishResponse,
            error: function (o, c, m) { throw (m); }
        });
    });
    
    $('.newsEdit').click(function(e) {
        var news = $(this).closest(".newsSingle")[0];
        var id = news.id.substr(4);
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
    
    $('.newsVersion').change(function() {
        var news = $(this).closest(".newsSingle")[0];
        var id = news.id.substr(4);
        var ver = $(this).find('option:selected').val();
        
        getNews(id, ver);
    });

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

function getNews(id, ver) {
    var dataUrl = "json/getnews/" + id + "/" + ver + "?token=" + localStorage.getItem("token");

    $.ajax({
        type: "get",
        url: dataUrl,
        dataType: "json",
        success: getNewsResponse,
        error: function (o, c, m) { throw (m); }
    });
}

function getNewsResponse(data) {
    if(data.type != 'success')
        return;

    var news = $("#news"+data.id);
    
    if(news.length > 0)
    {
        updateNews(data.id,
                   data.headline,
                   data.image,
                   data.text,
                   data.newsid,
                   data.published,
                   data.curVersion,
                   data.newsVersions,
                   data.showVersion);
        return;
    } else {
        // TODO: create news
    }
}

function publishResponse(data) {
    if(data.type != 'success')
        return;
    
    getNews(data.id, data.version);
}

function unpublishResponse(data) {
    if(data.type != 'success')
        return;
    
    getNews(data.id, data.version);
}

function publishResponse(data) {
    if(data.type != 'success')
        return;
    
    getNews(data.id, data.version);
}

function updateNews(id, headline, image, text, newsid, published, curVersion, newsVersions, showVersion)
{
    var news = $("#news"+id);
    if(news.length != 1)
        return;
    
    $(news).find('.newsHeadline').text(headline);
    if(image=='') {
        $(news).find('.newsImageWrapper').hide();
    } else {
        $(news).find('.newsImage').attr('src', image);
        $(news).find('.newsImageWrapper').show();
    }
    
    $(news).find('.newsTeaser').text(text);
    
    if(newsid==0) {
        $(news).find('.newsMoreWrapper').hide();
    } else {
        // TODO: set newsid
        $(news).find('.newsMoreWrapper').show();
    }
    
    if(published) {
        $(news).find('.newsUnpublished').hide();
        var dateString = dateToStr(new Date(Date.parse(published)));
        $(news).find('.newsDate').text(dateString);
        $(news).find('.newsPublished').show();
        
        $(news).find('.newsShow').hide();
        $(news).find('.newsHide').show();
    } else {
        $(news).find('.newsPublished').hide();
        $(news).find('.newsUnpublished').show();

        $(news).find('.newsHide').hide();
        $(news).find('.newsShow').show();
    }
    
    $(news).find(".newsCurVersion").text(curVersion);
    
    $(news).find(".newsVersion").empty();   
    for(var i=0; i<newsVersions.length; i++)
    {
        var ver = newsVersions[i];
        var option = '<option value="'+ver.version+'"'
        if(ver.version==showVersion)
            option += ' selected';
        option += '>'+ver.version+' - '+ver.modified+' ('+ver.userid+')</option>';
        $(news).find(".newsVersion").append(option)
    }
}

function dateToStr(d) {
    var date = d.getDate();
    date = date<10?'0'+date:date;
    var month = d.getMonth()+1;
    month = month<10?'0'+month:month;
    var year = d.getFullYear();
    var hour = d.getHours();
    hour = hour<10?'0'+hour:hour;
    var min = d.getMinutes();
    min = min<10?'0'+min:min;
    
    return date+'.'+month+'.'+year+' - '+hour+':'+min;
}