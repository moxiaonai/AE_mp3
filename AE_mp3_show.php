<?php if(!defined('EMLOG_ROOT')){die('err');} 
include(EMLOG_ROOT.'/content/plugins/AE_mp3/AE_mp3_config.php');

?>
var wenkmList=[{
song_album:"<?php echo $config["album"];?>",
song_album1:"<?php echo $config["album1"];?>",
song_file:"/",song_name:"<?php echo $config["name"];?>".split("|"),
song_id:"<?php echo $config["id"];?>".split("|")
}];