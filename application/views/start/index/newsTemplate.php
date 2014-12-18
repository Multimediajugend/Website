<div class="newsSingle" id="news<?php echo $id; ?>">
    <div class="newsHeadline"><?php echo $headline; ?></div>
    <div class="newsImageWrapper"<?php if($image=='') echo ' style="display: none;"' ?>>
        <img class="newsImage" src="<?php echo URL.$image; ?>">
    </div>
    <div class="newsTextWrapper">
        <div class="newsTeaser"><?php echo $text; ?></div>
        <div class="newsMeta">
            <span class="newsMoreWrapper"<?php if($newsid == 0) echo ' style="display: none;"' ?>>
                <a href="news.php?id=<?php echo $newsid; ?>">weiterlesen</a><br />
            </span>
            <span class="newsUnpublished"<?php if($published) echo ' style="display: none;"' ?>>
                <i>noch nicht ver&ouml;ffentlicht</i>
            </span>
            <span class="newsPublished"<?php if(!$published) echo ' style="display: none;"' ?>>
                (vom <span class="newsDate"><?php echo date("d.m.Y - H:i",strtotime($published)); ?></span>)
            </span>
        </div>
    </div>
    <div style="clear:left"></div>
    <div class="editSection">
        <button class="newsEdit"><i class="fa fa-edit fa-fw"></i> Bearbeiten</button>
        <button><i class="fa fa-remove fa-fw"></i> L&ouml;schen</button><br />
        Aktuelle Version:
        <span class="newsCurVersion"><?php echo $curVersion; ?></span> - 
        Version anzeigen: 
        <select class="newsVersion">
            <?php foreach($newsVersions as $ver) { 
                echo '<option value="'.$ver->version.'"';
                if($ver->version == $showVersion)
                    echo ' selected';
                echo '>'.$ver->version.' - '.$ver->modified.' ('.$ver->userid.')</option>';
            }
            ?>
        </select><br />
        <span class="newsHide"<?php if(!$published) echo ' style="display: none;"' ?>>
            <button class="newsUnpublish"><i class="fa fa-eye-slash fa-fw"></i> News verbergen</button>
        </span>
        <span class="newsShow"<?php if($published) echo ' style="display: none;"' ?>>
            News am
            <input type="text" class="newsDateTimePicker" value="<?php echo date("d.m.Y - H:i"); ?>" />
            <button class="newsPublish"><i class="fa fa-upload fa-fw"></i> ver&ouml;ffentlichen</button>
        </span>
    </div>
</div>