<?
include("../../../../config/conn.php");
include("../../../../config/function.php");
$wxlogin=preg_split("/,/",$rowcontrol[wxlogin]);
?>
<div class="bfb bfbtop">
<div class="yjcode">

 <a class="a1" href="<?=weburl?>"><?=webname?>�����׵����߽�����վ</a>
 <a class="a2" href="<?=weburl?>help/">����</a>
 <a class="a3" href="<?=weburl?>user/qiandao.php">ÿ��ǩ��</a>
 
 <div id="notlogin" style="display:none;">
 <a class="a4" href="<?=weburl?>reg/reg.php">ע��</a>
 <a class="a5" href="<?=weburl?>reg/">��¼</a>
 <a class="a6" href="<?=weburl?>config/qq/oauth/index.php" target="_blank">QQ��¼</a>
 <? if($rowcontrol[wxlogin]!="" && $rowcontrol[wxlogin]!=","){?>
 <a class="a7" href="https://open.weixin.qq.com/connect/qrconnect?appid=<?=$wxlogin[0]?>&redirect_uri=<?=urlencode(weburl."reg/wxlogin.php")?>&response_type=code&scope=snsapi_login#wechat_redirect" target="_blank">΢�ŵ�¼</a>
 <? }?>
 </div>
 
 <div id="yeslogin" style="display:none;">
 <a class="a8" href="<?=weburl?>user/un.php">�˳�</a>
 <a class="a5" href="<?=weburl?>user/">��ӭ����<span id="yesuid"></span></a>
 </div>
 
</div>
</div>
<span id="webhttp" style="display:none"><?=weburl?></span>
<script language="javascript">
userCheckses();
</script>
<div class="yjcode"><? adwhile("ADTOP");?></div>