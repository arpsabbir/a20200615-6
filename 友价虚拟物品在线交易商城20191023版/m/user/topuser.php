<?
$sqluser="select * from yjcode_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("../reg/");}
$usertx="../../upload/".$rowuser[id]."/user.jpg";if(!is_file($usertx)){$usertx="../../user/img/nonetx.gif";}
$shoplogo="../../upload/".$rowuser[id]."/shop.jpg";if(!is_file($shoplogo)){$shoplogo="img/shoplogo.png";}

if(empty($qzmotweb) && empty($rowuser[ifmot]) && $rowcontrol["qzmot"]){Audit_alert("����ʵ����Ҫ�����Ȱ������ֻ�����","mobbd.php");}
if(empty($userztweb) && empty($rowuser[zt])){php_toheader("userzt.php");}

?>
<span id="webhttp" style="display:none"><?=weburl?></span>
<? if(strcmp(sha1("123456"),$rowuser[pwd])==0){?><div class="rts box"><div class="d1">����ǰ����Ϊ123456�����ڼ򵥣������������޸�!<br><a href="pwd.php">����޸ĵ�¼����</a></div></div><? }?>
