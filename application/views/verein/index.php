<div id="bigPictures">
	<a href="<?php echo URL; ?>verein/kooperation">
		<div class="bigPicture">
			<img src="<?php echo URL; ?>public/img/verein/bigPicture1.jpg" />
			<div class="bigPicturePadding">
				<div class="bigPictureTitle color-1">Kooperation</div>
				<div class="bigPictureDescription">Hier ein ganz kurzer Teaser auf die Kategorie.</div>
			</div>
		</div>
	</a>
	<a href="<?php echo URL; ?>verein/technik">
		<div class="bigPicture">
			<img src="<?php echo URL; ?>public/img/verein/bigPicture2.jpg" />
			<div class="bigPicturePadding">
				<div class="bigPictureTitle color-2">Technik</div>
				<div class="bigPictureDescription">Hier ein ganz kurzer Teaser auf die Kategorie.</div>
			</div>
		</div>
	</a>
	<a href="<?php echo URL; ?>verein/musik">
		<div class="bigPicture">
			<img src="<?php echo URL; ?>public/img/verein/bigPicture3.jpg" />
			<div class="bigPicturePadding">
				<div class="bigPictureTitle color-3">Musik</div>
				<div class="bigPictureDescription">Hier ein ganz kurzer Teaser auf die Kategorie.</div>
			</div>
		</div>
	</a>
	<a href="<?php echo URL; ?>verein/sport">
		<div class="bigPicture last">
			<img src="<?php echo URL; ?>public/img/verein/bigPicture4.jpg" />
			<div class="bigPicturePadding">
				<div class="bigPictureTitle color-4">Sport</div>
				<div class="bigPictureDescription">Hier ein ganz kurzer Teaser auf die Kategorie.</div>
			</div>
		</div>
	</a>
</div>
<div id="news">
	<div class="pageTitle">Aktuelles</div>
    <div class="editSection">
        <button id="addNews"><i class="fa fa-plus fa-fw"></i> News erstellen</button>
        <button id="showUnpublished"><i class="fa fa-download fa-fw"></i> Zeige nicht veröffentlichte News</button>
    </div>
    
    <?php foreach ($lastNews as $news) { ?>
    <div class="newsSingle">
        <input type="hidden" class="newsId" value="<?php echo $news->id; ?>" />
		<div class="newsHeadline"><?php if(isset($news->header)) echo $news->header; ?></div>
        <?php if(isset($news->image) && $news->image!=null) { ?>
            <img class="newsImage" src="<?php echo URL.$news->image; ?>">
        <?php } ?>
		<div class="newsTeaser"><?php if(isset($news->text)) echo $news->text; ?></div>
		<div class="newsMeta">
            <?php if(isset($news->newsid) && $news->newsid != null) { ?>
                <a href="news.php?id=<?php echo $news->newsid; ?>">weiterlesen</a><br />
            <?php } 
                  if(isset($news->published)) { 
                      if($news->published == null) {
                          echo '<i>noch nicht veröffentlicht</i>';
                      } else {
                          echo '(vom <span class="newsDate">'.date("d.m.Y - H:i",strtotime($news->published)).'</span>)';
                      }
                  } ?>
		</div>
        <div style="clear:left"></div>
        <div class="editSection">
            <button class="newsEdit"><i class="fa fa-edit fa-fw"></i> Bearbeiten</button>
            <button><i class="fa fa-remove fa-fw"></i> Löschen</button><br />
            Aktuelle Version: <i>keine veröffentlicht</i><br />
            Version wählen: 
            <select id="newsVersion">
               <option value="5">5 - 15.10.14 - 10:20 (123)</option>
               <option value="4">4 - 15.10.14 - 10:19</option>
               <option value="3">3 - 15.10.14 - 10:17</option>
               <option value="2">2 - 15.10.14 - 10:15</option>
               <option value="1">1 - 15.10.14 - 10:09</option>
             </select>
            <button><i class="fa fa-eye fa-fw"></i> Anzeigen</button>
            <button><i class="fa fa-upload fa-fw"></i> Version veröffentlichen</button>
        </div>
	</div>
    <?php } ?>
    <div id="newsModal" class="modal">
        <div class="modalHeader">
            <h3>Newseditor</h3>
        </div>
        <form name="newsModalForm" onSubmit="saveNews()">
            <input id="newsModalTeaserId" type="hidden" />
            <div class="txt">
                <label for="newsModalHeadline">&Uuml;berschrift</label>
                <input id="newsModalHeadline" type="text" required />
            </div>
            <div class="txt">
                <label for="newsModalImage">Bild</label>
                <input id="newsModalImage" type="text" />
                <button onclick="return false;"><i class="fa fa-image fa-fw"></i> Bild auswählen</button>
            </div>
            <div class="txt">
                <label for="newsModalText">Text</label>
                <textarea id="newsModalText" type="text" cols="55" rows="20" required ></textarea>
            </div>
            <div class="btn clearfix">
				<button type="submit" onClick="saveNews(); return false;"><i class="fa fa-save fa-fw"></i> Speichern</button>
				<button class="close cancel"><i class="fa fa-remove fa-fw"></i> Abbruch</button>
			</div>

        </form>
    </div>
</div>