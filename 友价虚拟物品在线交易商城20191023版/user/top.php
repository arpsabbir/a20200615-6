<?
$sj=date("Y-m-d H:i:s");
$sqluser="select * from yjcode_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
$rowuser=mysql_fetch_array($resuser);
if(empty($rowuser[mybh])){updatetable("yjcode_user","mybh='".returnbh()."' where id=".$rowuser[id]);}
if($sj>$rowuser[dqsj] && !empty($rowuser[dqsj])){updatetable("yjcode_user","shopzt=4 where shopzt=2 and id=".$rowuser[id]);}

$luserid=$rowuser[id];
sellmoneytj($luserid);
$autoses="(selluserid=".$luserid." or userid=".$luserid.")";
if(is_file("auto.php")){include("auto.php");}
?>

<div class="bfb usertop">
<div class="yjcode">
 
 <? if(is_file("img/logo.png")){?>
 <div class="d1"><a href="../"><img src="img/logo.png" /></a></div>
 <? }?>
 <ul class="u1">
 <li class="l1">�û�����</li>
 <li class="l2"><a href="./" class="a1">���ػ�Ա��ҳ</a></li>
 </ul>
 
 <div class="d2"><a href="../">��ҳ</a></div>
 
 <div class="d3">
  <a href="inf.php" class="a1">�˻�����</a>
  <div class="d3v">
  <a href="inf.php">��������</a>
  <a href="userdj.php">��Ա�ȼ�</a>
  <a href="smrz.php">ʵ����֤</a>
  <a href="mobbd.php">�ֻ���֤</a>
  <a href="emailbd.php">������֤</a>
  <a href="touxiang.php">����ͷ��</a>
  <a href="shdzlist.php">�ջ���ַ</a>
  </div>
 </div>
 
 <div class="d3">
  <a href="paylog.php" class="a1">�������</a>
  <div class="d3v">
  <a href="paylog.php">��ϸ�ʽ��¼</a>
  <a href="pay.php">��Ҫ��ֵ</a>
  <a href="tixian.php">��Ҫ����</a>
  <a href="tixianlog.php">���ּ�¼</a>
  <a href="baomoneylog.php">��֤�����</a>
  <a href="jflog.php">���ֹ���</a>
  </div>
 </div>
 
 <div class="d3">
  <a href="gdlist.php" class="a1">��������</a>
  <div class="d3v">
  <a href="gdlist.php">�ҵĹ���</a>
  <a href="gdlx.php">�ύ����</a>
  </div>
 </div>
 
 <div class="d3">
  <a href="pwd.php" class="a1">��ȫ����</a>
  <div class="d3v">
  <a href="pwd.php">��¼����</a>
  <a href="zfmm.php">֧������</a>
  <a href="qq.php">QQ��</a>
  <? 
  $wxlogin=preg_split("/,/",$rowcontrol[wxlogin]);
  if($rowcontrol[wxlogin]!="" && $rowcontrol[wxlogin]!=","){
  ?>
  <a href="weixin.php">΢�Ű�</a>
  <?
  }
  ?>
  <a href="loginlog.php">��¼��¼</a>
  </div>
 </div>
 
 <div class="d4" style="display:none;"><a href="">��Ϣ</a><span>0</span></div>
 
</div>
</div>

<? if(strcmp(sha1("123456"),$rowuser[pwd])==0){?><div class="yjcode"><div class="pwderr">���ĵ�ǰ����Ϊ123456�����ڼ򵥣������������޸�!��<a href="pwd.php">����޸ĵ�¼����</a>��</div></div><? }?>
<? if(strcmp($rowuser[pwd],$rowuser[zfmm])==0){?><div class="yjcode"><div class="pwderr">����֧���������¼����һ�£����������޸�!��<a href="zfmm.php">����޸�֧������</a>��</div></div><? }?>
