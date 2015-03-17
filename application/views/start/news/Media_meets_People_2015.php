<div class="wrapper">
    <div class="grid twoThird">
        <div class="pageTitle">Media meets People 2015</div>
        <div class="pageText">
            <a href="http://www.mephasin.de/" target="_blank"><img src="<?php echo URL; ?>/public/img/mephasin.png" style="float:left; margin-right: 10px;" /></a>
            <p>In diesem Jahr findet erneut unsere Veranstaltung "Media meets People" am <b>23.05.2015</b> statt. Wir haben uns in die Räumlichkeiten des Kinder- und Jugendhauses "Substanz", auch als "Blaues Haus" bekannt, auf der <b>Heinrich-Schütz-Straße 47, 09130 Chemnitz</b>, eingemietet. Wo genau das ist seht ihr rechts in der Karte. Einlass ist ab 21 Uhr.</p>
            <p>Für die musikalische Unterhaltung sorgen dieses mal <a href="#">Janiz</a>, sowie <a href="#">Mephasin</a>. Wer schon einmal in die Musik hereinhören mag findet weiter unten ein paar Videos von beiden Bands.</p>
            <p>Der Unkostenbeitrag für die Veranstaltung liegt für Gäste bei 8,00€ und für Vereinsmitglieder bei 3,00€. Die Räumlichkeiten bieten lediglich Platz für <b>70 Personen</b>. Daher werden wir eine <b>Gästeliste</b> anbieten.
            <a href="http://www.janizofficial.com/" target="_blank"><img src="<?php echo URL; ?>/public/img/janiz.png" align="right" style="margin-left: 10px;" /></a>
            Vereinsmitglieder stehen automatisch auf der Gästeliste. Gäste können sich vor der Veranstaltung einen Platz auf der Gästeliste sichern, indem sie im vorraus einen reduzierten Unkostenbeitrag von 6,50€ zahlen. Nähere Informationen dazu unter "Unkostenbeitrag".</p>
        </div>
    </div>
    <div class="grid oneThird">
        <div class="pageTitle">Anfahrt</div>
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script><div style="overflow:hidden;height:375px;width:300px;"><div id="gmap_canvas" style="height:375px;width:300px;"></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style><a class="google-map-code" href="http://www.pureblack.de/google-maps/" id="get-map-data">google maps</a></div><script type="text/javascript"> function init_map(){var myOptions = {zoom:14,center:new google.maps.LatLng(50.84082,12.947990000000004),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(50.84082, 12.947990000000004)});infowindow = new google.maps.InfoWindow({content:"<b>Media meets People</b><br/>Heinricht Sch&uuml;tz Stra&szlig;e 47<br/>09130 Chemnitz" });google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
    </div>
</div>
<div class="wrapper">
    <div class="pageTitle">Unkostenbeitrag</div>
    <div class="pageText">
        Mitglieder des Vereins Multimediale Jugendarbeit Sachsen e.V.: <b>3,00€</b><br />
        Gäste Abendkasse: <b>8,00€</b><br />
        Gäste Vorverkauf: <b>6,50€</b><br />
        <br />
        Der Kartenvorverkauf über PayPal ist bis 22.05.2015 24:00 Uhr möglich.<br/>
        Für den Fall, dass keine PayPal-Konto zur Verfügung steht, aber dennoch ein Kartenvorverkauf gewünscht ist, schreibt uns bitte eine E-Mail an <a href="mailto:mmp@multimediajugend.de">mmp@multimediajugend.de</a>. Wir senden euch dann unsere Bankverbindungsdaten zu oder finden eine andere Möglichkeit.<br />
        Nach erfolgter Zahlung erhaltet ihr eine Bestätigung per E-Mail und werdet automatisch auf die Gästeliste gesetzt. 
        <br />
        Anzahl: <input id="mmpTicketSlider" type="range" value="0" max="5" min="0" style="width:75px;" onchange="printValue();" />
        <input id="mmpTicketValue" type="text" disabled style="width:25px;" value="0"/>
        <input id="mmpTicketPrice" type="text" disabled style="width:50px;" value="0,00 €"/>
        <input type="button" value="Jetzt zahlen" />
    </div>
</div>
<div class="wrapper">
    <div class="pageTitle">Videos</div>
    <div class="pageText">
        Janiz:
        Mephasin
    </div>
</div>
<script type="text/javascript">
    function printValue() {
        var cnt = $('#mmpTicketSlider').val()
        $('#mmpTicketValue').val(cnt);
        var price = cnt*6.5;
        var stringPrice = price.toFixed(2) + ' €';
        stringPrice = stringPrice.replace('.', ',');
        $('#mmpTicketPrice').val(stringPrice)
    }
</script>