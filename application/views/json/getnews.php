<?php
###
### Method: POST
### fields: email, password
###

if(count($news) != 1 || !isset($news[0]->id))
{
    $output = array("type" => 'failure');
}
else
{
    $id = $news[0]->id;
    $image = isset($news[0]->image) ? $news[0]->image : '';
    $headline = isset($news[0]->header) ? $news[0]->header : '';
    $text = isset($news[0]->text) ? $news[0]->text : '';
    $newsid = isset($news[0]->newsid) ? $news[0]->newsid : 0;
    $published = isset($news[0]->published) ? $news[0]->published : null;
    $curVersion = isset($news[0]->version) ? $news[0]->version : 1;
    
    $newsVersions = $newsTeaser_model->getNewsVersions($id);
    $showVersion = $version;
    
    $output = array(
		"type" => 'success',
        "id" => $id,
		"image" => $image,
		"headline" => $headline,
        "text" => $text,
        "newsid" => $newsid,
        "published" => $published,
        "newsVersions" => $newsVersions,
        "curVersion" => $curVersion,
        "showVersion" => $showVersion
		); 
}
