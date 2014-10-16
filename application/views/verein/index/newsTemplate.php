<div class="newsSingle">
    <input type="hidden" class="newsId" value="<?php echo $news->id; ?>" />
    <div class="newsHeadline"><?php if(isset($news->header)) echo $news->header; ?></div>
        <?php if($image != null) { ?>
            <img class="newsImage" src="<?php echo URL.$image; ?>">
        <?php } ?>
    <div class="newsTeaser"><?php echo $text; ?></div>
    <div class="newsMeta">
        <?php if($newsid != null) { ?>
            <a href="news.php?id=<?php echo $newsid; ?>">weiterlesen</a><br />
        <?php } 
              if(isset($news->published)) { 
                  if($news->published == null) {
                      echo '<i>noch nicht ver&ouml;ffentlicht</i>';
                  } else {
                      echo '(vom <span class="newsDate">'.date("d.m.Y - H:i",strtotime($news->published)).'</span>)';
                  }
              } ?>
    </div>
    <div style="clear:left"></div>
    <div class="editSection">
        <button class="newsEdit"><i class="fa fa-edit fa-fw"></i> Bearbeiten</button>
        <button><i class="fa fa-remove fa-fw"></i> L&ouml;schen</button><br />
        Aktuelle Version:
        <?php
            if($published == null) {
                echo '<i>noch keine ver&ouml;ffentlicht</i>';
            } else {
                echo $news->version;
            }
        ?><br />
        Version anzeigen: 
        <select id="newsVersion">
            <?php foreach($newsVersions as $ver) { 
                echo '<option value="'.$ver->version.'"';
                if($ver->version == $showVersion)
                    echo ' selected';
                echo '>'.$ver->version.' - '.$ver->modified.' ('.$ver->userid.')</option>';
            }
            ?>
         </select>
        <button><i class="fa fa-upload fa-fw"></i> Version ver&ouml;ffentlichen</button>
    </div>
</div>