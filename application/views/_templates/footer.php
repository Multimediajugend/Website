	<div id="footer">
		<div class="footerbox">
			Weiter Projekte:<br />
			<a href="http://www.hsf-clanwars.de" target="_blank">www.hsf-clanwars.de</a><br />
			<a href="http://www.damnsmalllan.de" target="_blank">www.damnsmalllan.de</a>
		</div>
		<div class="footerbox">
			Fehler gefunden?<br />
			<a href="https://github.com/Multimediajugend/Website/issues" target="_blank">Fehler melden!</a><br />
			<a href="" onClick="$('#loginModal').trigger('openModal'); return false;">Admin</a>
		</div>
		<div class="footerbox last">Copyright 2010-<?php echo date("Y"); ?> Design, Logo and Content by Multimediale Jugendarbeit Sachsen e.V.</div>
	</div>
</div>
<div data-content="login">
	<div id="loginModal">
		<div class="modalHeader">
			<h3>Administration</h3>
		</div>
		<form action="">
			<div class="txt">
				<label for="email">Email:</label>
				<input id="email" type="text">
			</div>
			<div class="txt">
				<label for="password">Password:</label>
				<input id="password" type="password">
			</div>
			<div class="btn clearfix">
				<a class="close" href="#">Login</a>
				<a class="close cancel" href="#">Abbruch</a>
			</div>
		</form>
	</div>
</div>
</body>
</html>