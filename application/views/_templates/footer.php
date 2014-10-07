	<div id="footer">
		<div class="footerbox">
			Weiter Projekte:<br />
			<a href="http://www.hsf-clanwars.de" target="_blank"><i class="fa fa-external-link fa-fw"></i> www.hsf-clanwars.de</a><br />
			<a href="http://www.damnsmalllan.de" target="_blank"><i class="fa fa-external-link fa-fw"></i> www.damnsmalllan.de</a>
		</div>
		<div class="footerbox">Copyright 2010-<?php echo date("Y"); ?> Design, Logo and Content by Multimediale Jugendarbeit Sachsen e.V.</div>
		<div class="footerbox last">
			<a href="https://github.com/Multimediajugend/Website/issues" target="_blank"><i class="fa fa-warning fa-fw"></i> Fehler gefunden?</a><br />
			<a href="<?php echo URL; ?>impressum" target="_blank"><i class="fa fa-info fa-fw"></i> Impressum</a><br />
			<a href="" onClick="$('#loginModal').trigger('openModal'); return false;"><i class="fa fa-lock fa-fw"></i> Admin</a>
		</div>
	</div>
</div>
<div data-content="login">
	<div id="loginModal">
		<div class="modalHeader">
			<h3>Administration</h3>
		</div>
		<form action="">
			<div class="txt">
				<label for="loginEmail">Email:</label>
				<input id="loginEmail" type="text">
			</div>
			<div class="txt">
				<label for="loginPassword">Password:</label>
				<input id="loginPassword" type="password">
			</div>
			<div class="btn clearfix">
				<a href="" onClick="login(); return false;">Login</a>
				<a class="close cancel" href="#">Abbruch</a>
			</div>
		</form>
	</div>
</div>
</body>
</html>