<div class="wrapper">
    <div class="grid twoThird">
        <div class="pageTitle">Media meets People 2015</div>
        <div class="pageText">
            <a href="http://www.mephasin.de/" target="_blank"><img src="<?php echo URL; ?>/public/img/news/mmp2015/mephasin.png" style="float:left; margin-right: 10px;" /></a>
            <p>In diesem Jahr findet erneut unsere Veranstaltung "Media meets People" am <b>23.05.2015</b> statt. Wir haben uns in die Räumlichkeiten des Kinder- und Jugendhauses "Substanz", auch als "Blaues Haus" bekannt, auf der <b>Heinrich-Schütz-Straße 47, 09130 Chemnitz</b>, eingemietet. Wo genau das ist seht ihr rechts in der Karte. Einlass ist ab 22 Uhr.</p>
            <p>Für die musikalische Unterhaltung sorgen dieses mal <a href="http://www.mental-hospital.de/">Mental Hospital</a> (<a href="https://de-de.facebook.com/menhos.de">Facebook</a>), sowie <a href="http://www.mephasin.de/">Mephasin</a> (<a href="https://www.facebook.com/mephasin">Facebook</a>). Wer schon einmal in die Musik
                <a href="http://www.mental-hospital.de/" target="_blank"><img src="<?php echo URL; ?>/public/img/news/mmp2015/mentalhospital.png" align="right" style="margin-left: 10px;" /></a>
                hereinhören mag findet weiter unten ein paar Videos von beiden Bands.</p>            
            <p>Der Unkostenbeitrag für die Veranstaltung liegt für Gäste bei 6,50€ im Vorverkauf, sowie 8,00€ an der Abendkasse. Mitglieder des Vereins zahlen 3,00€. Da die Räumlichkeiten lediglich Platz für <b>70 Personen</b> bieten, wird es eine Gästeliste geben. Darauf stehen diejenigen die per Vorkasse gezahlt haben, sowie die Vereinsmitglieder. Nähere Informationen findet ihr weiter unten unter "Unkostenbeitrag".</p>
        </div>
    </div>
    <div class="grid oneThird">
        <div class="pageTitle">Anfahrt</div>
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script><div style="overflow:hidden;height:375px;width:300px;"><div id="gmap_canvas" style="height:375px;width:300px;"></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style><a class="google-map-code" href="http://www.pureblack.de/google-maps/" id="get-map-data">google maps</a></div><script type="text/javascript"> function init_map(){var myOptions = {zoom:14,center:new google.maps.LatLng(50.84082,12.947990000000004),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(50.84082, 12.947990000000004)});infowindow = new google.maps.InfoWindow({content:"<b>Media meets People</b><br/>Heinrich Sch&uuml;tz Stra&szlig;e 47<br/>09130 Chemnitz" });google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
        <a href="http://maps.google.com/maps?daddr=Heinrich+Sch%C3%BCtz+Stra%C3%9Fe+47+09130+Chemnitz"><i class="fa fa-car fa-fw" title="Routenplaner"></i> <b>Routenplaner</b></a>
    </div>
</div>
<div class="wrapper">
    <div class="pageTitle" id="Unkosten">Unkostenbeitrag</div>
    <div class="pageText">
        Mitglieder des Vereins Multimediale Jugendarbeit Sachsen e.V.: <b>3,00€</b><br />
        Gäste Abendkasse: <b>8,00€</b><br />
        Gäste Vorverkauf: <b>6,50€</b><br />
        <br />
        Der Kartenvorverkauf über PayPal ist bis 22.05.2015 24:00 Uhr möglich.<br/>
        Für den Fall, dass kein PayPal-Konto zur Verfügung steht, aber dennoch ein Kartenvorverkauf gewünscht ist, schreibt uns bitte eine E-Mail an <a href="&#109;&#097;&#105;&#108;&#116;&#111;&#058;mmp&#064;multimediajugend&#46;de">mmp&#064;multimediajugend&#46;de</a>. Wir senden euch dann unsere Bankverbindungsdaten zu oder finden eine andere Möglichkeit.<br />
        Nach erfolgter Zahlung erhaltet ihr eine Bestätigung per E-Mail und werdet automatisch auf die Gästeliste gesetzt, denkt daher bitte daran euren Ausweis einzupacken.<br />
        <?php
        if($mmpquantity < 60)
        {
        ?>
            <?php
            $date = new DateTime('now');
            $end = new DateTime('2015-05-22 23:59:59');
            if($date < $end)
            {
            ?>
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                Anzahl: <a href="#" onclick="change(-1); return false;"><i class="fa fa-minus-square fa-fw" title="Weniger"></i></a>
                <input id="quantity" name="quantity" type="text" readonly style="width:25px;" value="1" onchange="change(0)"/>
                <a href="#" onclick="change(1); return false;"><i class="fa fa-plus-square fa-fw" title="Mehr"></i></a>            
                <input id="mmpTicketPrice" type="text" readonly style="width:50px;" value="6,50 €"/>        
                <input type="hidden" name="cmd" value="_s-xclick">
                <input type="hidden" name="hosted_button_id" value="WAUG3DJE7NAP6">
                <input type="image" src="https://www.paypalobjects.com/de_DE/DE/i/btn/btn_paynow_SM.gif" border="0" name="submit" alt="Jetzt einfach, schnell und sicher online bezahlen – mit PayPal.">
                <img alt="" border="0" src="https://www.paypalobjects.com/de_DE/i/scr/pixel.gif" width="1" height="1">
            </form>    
            <?php
            } else {
            ?>
            <h3>Der Kartenvorverkauf ist bereits beendet.</h3>
            <?php
            }
            ?>
        <?php
        } else {
        ?>
            <h3>Es wurden bereits alle Karten verkauft.</h3>
        <?php
        }
        
        if($mmpquantity > 40){
            echo "<h3><b>".$mmpquantity."/70 Karten verkauft</b></h3>";
        }      

        ?>
    </div>
</div>
<div class="wrapper">
    <div class="pageTitle">Videos</div>
    <div class="pageText">
        <h2>Mental-Hospital</h2>
        <iframe width="470" height="265" src="https://www.youtube.com/embed/RLf4pe5VUsk" frameborder="0" allowfullscreen></iframe>
        <iframe width="470" height="265" src="https://www.youtube.com/embed/LwTKEqIEEkI" frameborder="0" allowfullscreen></iframe><br />
        <h2>Mephasin</h2>
        <iframe width="470" height="265" src="https://www.youtube.com/embed/6dKs4LqFj4c" frameborder="0" allowfullscreen></iframe>
        <iframe width="470" height="265" src="https://www.youtube.com/embed/Kmea9aclHcg" frameborder="0" allowfullscreen></iframe><br />
        
    </div>
</div>
<script type="text/javascript">
    function change(value) {
        var cnt = parseInt($('#quantity').val());
        cnt += value;
        changeValue(cnt);
    }
    function changeValue(value) {
        if(isNaN(value))
            value=1;
        if(value>5)
            value=5;
        if(value<1)
            value=1;
        $('#quantity').val(value);
        var price = value*6.5;
        var stringPrice = price.toFixed(2) + ' €';
        stringPrice = stringPrice.replace('.', ',');
        $('#mmpTicketPrice').val(stringPrice)
    }
</script>