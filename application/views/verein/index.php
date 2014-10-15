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
        <button><i class="fa fa-plus fa-fw"></i> News erstellen</button>
        <button><i class="fa fa-download fa-fw"></i> Zeige nicht veröffentlichte News</button>
    </div>
    
    <?php foreach ($lastNews as $news) { ?>
    <div class="newsSingle">
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
                          echo '(vom <span class="newsDate">'.date("d.m.Y - H:i:s",strtotime($news->published)).'</span>)';
                      }
                  } ?>
		</div>
        <div style="clear:left" />
        <div class="editSection">
            <button><i class="fa fa-edit fa-fw"></i> bearbeiten</button>
            <button><i class="fa fa-remove fa-fw"></i> löschen</button>
            <button><i class="fa fa-eye-slash fa-fw"></i> anzeigen</button>
        </div>
	</div>
    <?php } ?>
</div>