<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�û�������� - <?=webname?></title>
<? include("cssjs.html");?>
<link href="css/sell.css" rel="stylesheet" type="text/css" />
<script language="javascript">
function addty1(){
layer.open({
  type: 2,
  area: ['322px', '190px'],
  title:["��Ʒ����","text-align:left"],
  skin: 'layui-layer-rim', //���ϱ߿�
  content:['protype1lx.php', 'no'] 
});
}
function addty2(x){
layer.open({
  type: 2,
  area: ['322px', '230px'],
  title:["��Ʒ����","text-align:left"],
  skin: 'layui-layer-rim', //���ϱ߿�
  content:['protype2lx.php?ty1id='+x, 'no'] 
});
}
function updty1(x){
layer.open({
  type: 2,
  area: ['322px', '190px'],
  title:["��Ʒ����","text-align:left"],
  skin: 'layui-layer-rim', //���ϱ߿�
  content:['protype1.php?bh='+x, 'no'] 
});
}
function updty2(x){
layer.open({
  type: 2,
  area: ['322px', '230px'],
  title:["��Ʒ����","text-align:left"],
  skin: 'layui-layer-rim', //���ϱ߿�
  content:['protype2.php?bh='+x, 'no'] 
});
}
function glover(x){
 document.getElementById("gl"+x).style.display="";
}
function glout(x){
 document.getElementById("gl"+x).style.display="none";
}
function del(x){
document.getElementById("chk"+x).checked=true;
NcheckDEL(15,'yjcode_protype');
}
</script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("top.php");?>
<div class="yjcode">

<? include("left.php");?>

<!--RB-->
<div class="userright">
 
 <? include("rcap4.php");?>
 <script language="javascript">
 document.getElementById("rcap3").className="l1 l2";
 </script>

 <!--��B-->
 <div class="rkuang">

 <div class="ksedi">
  <div class="d1">
  <a href="javascript:;" onclick="NcheckDEL(15,'yjcode_protype')" class="a1">ɾ��</a>
  <a href="javascript:;" onclick="addty1()" class="a2">��ӷ���</a>
  </div>
 </div>
 
 <ul class="protypecap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">��������</li>
 <li class="l3">����</li>
 <li class="l4">�༭ʱ��</li>
 <li class="l5">����</li>
 </ul>
 <? while1("*","yjcode_protype where userid=".$luserid." and admin=1 and zt=0 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <ul class="protypelist">
 <li class="l1"><input name="C1" type="checkbox" id="chk<?=$row1[id]?>" value="<?=$row1[id]?>xcf0" /></li>
 <li class="l2"><?=$row1[name1]?></li>
 <li class="l3"><?=$row1[xh]?></li>
 <li class="l4"><?=$row1[sj]?></li>
 <li class="l5" onmouseover="glover(<?=$row1[id]?>)" onmouseout="glout(<?=$row1[id]?>)">
  <span class="s1">����</span>
  <div class="gl" style="display:none;" id="gl<?=$row1[id]?>">
  <a href="javascript:void(0);" onclick="updty1('<?=$row1[bh]?>')">�޸���Ϣ</a>
  <a href="javascript:void(0);" onclick="addty2(<?=$row1[id]?>)">�������</a>
  <a href="javascript:void(0);" onclick="del(<?=$row1[id]?>)">ɾ�����</a>
  </div>
 </li>
 </ul>
 <? while2("*","yjcode_protype where userid=".$luserid." and admin=2 and zt=0 and name1='".$row1[name1]."' order by xh asc");while($row2=mysql_fetch_array($res2)){?>
 <ul class="protypelist2">
 <li class="l1"><input name="C1" type="checkbox" id="chk<?=$row2[id]?>" value="0xcf<?=$row2[id]?>" /></li>
 <li class="l2"><?=$row2[name2]?></li>
 <li class="l3"><?=$row2[xh]?></li>
 <li class="l4"><?=$row2[sj]?></li>
 <li class="l5" onmouseover="glover(<?=$row2[id]?>)" onmouseout="glout(<?=$row2[id]?>)">
  <span class="s1">����</span>
  <div class="gl" style="display:none;" id="gl<?=$row2[id]?>">
  <a href="javascript:void(0);" onclick="updty2('<?=$row2[bh]?>')">�޸���Ϣ</a>
  <a href="javascript:void(0);" onclick="del(<?=$row2[id]?>)">ɾ�����</a>
  </div>
 </li>
 </ul>
 <? }?>
 <? }?>

 <div class="clear clear15"></div>
 
 </div>
 <!--��E-->

</div> 
<!--RE-->

</div>

<div class="clear clear15"></div>
<? include("../tem/bottom.html");?>
</body>
</html>