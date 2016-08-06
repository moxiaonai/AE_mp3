<?php
/**
 * Plugin Name: 莫小奈浮窗播放器适配版（本地版本）
 * Version: 1.1
 * Plugin URL: http://blog.moxiaonai.cn/
 * Description: 全站悬浮式播放器，支持网易、虾米、QQ音乐！
 * Author: 莫小奈
 * Author Email: admin@moxiaonai.cn
 * Author URL: http://blog.moxiaonai.cn/
 */

!defined('EMLOG_ROOT') && exit('access deined!');
function plugin_setting_view(){
	include(EMLOG_ROOT.'/content/plugins/AE_mp3/AE_mp3_config.php');
	?>
	<link href="/content/plugins/AE_mp3/style/style.css" type="text/css" rel="stylesheet" />
	<div class="com-hd">
		<b>莫小奈适配版播放器设置</b>
		<?php
		if(isset($_GET['setting'])){
			echo "<span class='actived'>设置保存成功! </span>";
		}
		?>
	</div>
	<form action="./plugin.php?plugin=AE_mp3&action=setting" method="post">
		<table class="tb-set">
			<tr>
				<td align="right" width="40%"><b>专辑名字：</b><br />(显示在音乐列表中的《精选专辑》)</td>
				<td><input type="text" class="txt" name="album" value="<?php echo $config["album"];?>" /></td>
			</tr>
			<tr>
				<td align="right" width="40%"><b>专辑后缀：</b><br />(《精选专辑》 - 后缀)</td>
				<td><input type="text" class="txt" name="album1" value="<?php echo $config["album1"];?>" /></td>
			</tr>
			<tr>
				<td align="right"><b>音乐名字：</b><br />(填写歌曲名字'|'分割)</td>
				<td align="left"><b>音乐ID：</b><br />(填写歌曲ID'|'分割)</td>
			</tr>
			<tr>
				<td  align="right"><textarea class="txt txt-lar" name="name"><?php echo $config["name"];?></textarea></td>
				<td  align="left"><textarea class="txt txt-lar" name="id"><?php echo $config["id"];?></textarea></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" value="保存" /></td>
			</tr>
		</table>
	</form>
	<div class="" style="width: 33.3%;margin: 0 auto;">
		<h5>歌单填写说明:</h5>
			一行一首歌曲，可使用网易云音乐、虾米音乐、百度音乐和QQ音乐的歌曲。<br>
			网易ID需要在数字后面加上wy，虾米在后面加上xm，百度音乐在后面加上bd，QQ音乐在后面加上qq，比如网易音乐ID是26108693，那么加上wy就是26108693wy<br>
			格式：<br>
			<pre>歌曲名称|歌曲名称</pre>
			<pre>歌曲ID|歌曲ID</pre>
			例如：<br>
			<pre>秋殇别恋|光辉岁月|无敌|倩女幽魂</pre>
			<pre>1772313955xm|22706999wy|0038RM350w8m1Vqq|13125209bd</pre>
			音乐ID可以在相应播放页面的地址栏中获得<br><br>
	</div>
<script>
$('#AE_mp3').addClass('sidebarsubmenu1');
</script>
	<?php
}

function plugin_setting(){
	$newConfig = '<?php
	$config = array(
	"album" => "'.$_POST['album'].'",
	"album1" => "'.$_POST['album1'].'",
	"name" => "'.str_replace("\r\n", "", $_POST['name']).'",
	"id" => "'.str_replace("\r\n", "", $_POST['id']).'"
);';
	@file_put_contents(EMLOG_ROOT.'/content/plugins/AE_mp3/AE_mp3_config.php', $newConfig);
}
?>