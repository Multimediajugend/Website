<div class="newsSingle" id="news<?php echo $id; ?>">
    <div class="newsHeadline"><?php echo $headline; ?></div>
    <div class="newsImageWrapper">
        <?php if($image != null) { ?>
            <img class="newsImage" src="<?php echo URL.$image; ?>">
        <?php } ?>
    </div>
    <div class="newsTeaser"><?php echo $text; ?></div>
    <div class="newsMeta">
        <div class="newsMoreWrapper">
        <?php if($newsid != null) { ?>
            <a href="news.php?id=<?php echo $newsid; ?>">weiterlesen</a><br />
        <?php } ?>
        </div>
        
        <?php
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
        <span class="newsCurVersion">
        <?php
            if($published == null) {
                echo '<i>noch keine ver&ouml;ffentlicht</i>';
            } else {
                echo $news->version;
            }
        ?>
        </span><br />
        Version anzeigen: 
        <select class="newsVersion">
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