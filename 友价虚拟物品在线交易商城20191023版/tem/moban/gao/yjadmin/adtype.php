<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>����ϵͳ</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/ad.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu5").className="a1";
</script>

<div class="yjcode">
 <? $leftid=1;include("menu_ad.php");?>

<div class="right">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0602,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>
 
 <? include("rightcap2.php");?>
 <script language="javascript">document.getElementById("rtit1").className="a1";</script>

 <!--begin-->
 <ul class="adtypecap">
 <li class="l1">��涨λ���</li>
 <li class="l2">˵��</li>
 <li class="l3">����</li>
 </ul>
 <?
 $adbh=array("ADDL","ADLP","ADI00","ADI02","gao_qh","ADI13","ADI14","ADTOP","gao_01","gao_02","gao_03","gao_04","gao_05","gao_06","ADKF");
 $adtit=array("�������","��ҳ�������","��ҳ�������","�����˵�","��ҳ�л�ͼƬ","��ҳ�ײ��������","��ҳ�ײ���������","ȫվ�������","�л���ͼ�·����","��ݲ˵����Сͼ��","��ҳ��Ʒ�б�Сͼ��","�ײ�������1","�ײ�������2","��ҳͳ���Ҳ���","�Ҳ��Զ���ͷ�");
 $adsize=array("100*?","1150*?","1150*?","","1920*400","150*52","","1150*?","1150*?","18*17","26*22","","","550*50","");
 $admust=array("pic","pic","pic","font","pic","pic","font","","","pic","pic","font","font","pic","code");
 for($i=0;$i<count($adbh);$i++){
 $adurl="adlist.php?bh=".$adbh[$i]."&sm=".urlencode($adtit[$i]."-".$adsize[$i])."&must=".$admust[$i];
 ?>
 <ul class="adtypelist">
 <li class="l1"><?=$adbh[$i]?></li>
 <li class="l2"><?=$adtit[$i]." ".$adsize[$i]?></li>
 <li class="l3">
 <a href="<?=$adurl?>">�б�</a><span></span>
 <a href="ad_lx.php?bh=<?=$adbh[$i]?>&sm=<?=urlencode($adtit[$i]."-".$adsize[$i])?>&must=<?=$admust[$i]?>">����</a>
 </li>
 </ul>
 <?
 }
 ?>
 <!--end-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>