<?
include("../config/conn.php");
include("../config/function.php");
$admin=intval($_GET[admin]);
$id=intval($_GET[id]);
if(empty($admin) || empty($id)){Audit_alert("��Դ����",weburl,"parent.");}
if($admin==1){
 while0("*","yjcode_pro where id=".$id);if(!$row=mysql_fetch_array($res)){Audit_alert("��Դ����",weburl,"parent.");}
 $tit=$row[tit];
}

//�ٱ�B
if($_GET[control]=="jb"){
 zwzr();
 if(strtolower($_SESSION["authnum_session"])!=strtolower(sqlzhuru($_POST["t1"]))){Audit_alert("��֤�벻��ȷ�������޸���֤�룡","jubao.php?admin=".$admin."&id=".$id);}
 $sj=date("Y-m-d H:i:s");
 intotable("yjcode_jubao","bh,sj,jbqq,jbid,admin,tyid,txt,zt,uip","'".returnbh()."','".$sj."','".sqlzhuru($_POST[t2])."',".$id.",".$admin.",".intval($_POST[d1]).",'".sqlzhuru1($_POST[content])."',1,'".getuip()."'");
 php_toheader("jubao.php?t=suc&admin=".$admin."&id=".$id);
}
//�ٱ�E
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�ٱ�����</title>
<link href="../css/global.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../config/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="../config/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" src="../config/ueditor/lang/zh-cn/zh-cn.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript">
function tj(){
if(document.f1.t1.value==""){alert("��������֤��");document.f1.t1.focus();return false;}
layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
f1.action="jubao.php?control=jb&admin=<?=$admin?>&id=<?=$id?>";
}
function miaos(){
parent.location.reload();
}
</script>
<style type="text/css">
.jubao{float:left;width:650px;text-align:left;height:450px;}
.jubao .d1{float:left;width:620px;height:27px;padding:11px 0 0 30px;background:url(../img/deng.png) no-repeat;background-position:10px 10px;background-color:#F6F9FF;}
.jubao .uk{float:left;width:650px;font-size:14px;margin:20px 0 0 0;}
.jubao .uk li{float:left;}
.jubao .uk li .inp{float:left;font-size:14px;height:30px;border:#E6E6E6 solid 1px;}
.jubao .uk .l1{width:95px;text-align:right;padding:6px 15px 0 0;height:44px;font-weight:700;}
.jubao .uk .l21{width:540px;height:44px;font-weight:700;padding:6px 0 0 0;}
.jubao .uk .l2{width:540px;height:50px;}
.jubao .uk .l3{width:95px;text-align:right;padding:6px 15px 0 0;height:184px;font-weight:700;}
.jubao .uk .l4{width:503px;padding-right:37px;height:190px;font-weight:700;}
.jubao .uk .l6{width:215px;height:50px;}
.jubao .uk .l6 .img1{float:left;margin:0 0 0 10px;height:31px;}
.jubao .uk .l5{width:540px;height:50px;padding:0 0 0 110px;}
.jubao .uk .l5 input{float:left;cursor:pointer;color:#fff;font-size:14px;width:92px;height:32px;background-color:#1AA094;border:0;}
.suc{float:left;width:410px;font-size:14px;color:#6B6B6B;background:url(../img/suc.jpg) no-repeat;background-position:110px 140px;padding:150px 0 0 240px;height:50px;line-height:35px;text-align:center;height:250px;text-align:left;}
.suc strong{font-size:16px;color:#ff6600;}
</style>
</head>
<body>
<? if(empty($_GET[t])){?>
<form name="f1" method="post" onsubmit="return tj()">
<div class="jubao fontyh">
 <div class="d1">�ṩ��Ч��ƾ֤��ӿ�ٱ����̣�ͬʱ���Ƕ�������Ϣ���Ա���!</div>
 <ul class="uk">
 <li class="l1">�ٱ�����</li>
 <li class="l21" style="color:#0101FF;font-weight:700;"><?=$tit?></li>
 <li class="l1">�ٱ�����</li>
 <li class="l2">
 <select name="d1" class="inp fontyh">
 <? while1("*","yjcode_jubaotype where admin=".$admin." and zt=0 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>"><?=$row1[tit]?></option>
 <? }?>
 <option value="0">����һЩ�ٱ�ԭ�������·���д���������</option>
 </select>
 </li>
 <li class="l3">�ٱ�ԭ��</li>
 <li class="l4"><script id="editor" name="content" type="text/plain" style="width:503px;height:115px;"><?=$row[bz]?></script></li>
 <li class="l1">��֤��</li>
 <li class="l6"><input type="text" class="inp" style="width:90px;" name="t1" /><img src="../config/getYZM.php" onClick="this.src='../config/getYZM.php?'+Math.random();" class="img1" /></li>
 <li class="l1" style="letter-spacing:1px;color:#999;">��ϵQQ</li>
 <li class="l6"><input type="text" class="inp" style="width:178px;" name="t2" /></li>
 <li class="l5"><input type="submit" class="fontyh" value="�ύ�ٱ�" /></li>
 </ul>
</div>
</form>
<script language="javascript">
//ʵ�����༭��
var ue= UE.getEditor('editor'
, {
            toolbars:[
            [
                'link',
                'insertimage', 'attachment']
        ]
        });
</script>
<? }elseif($_GET[t]=="suc"){?>
 <div class="suc fontyh">
 <strong>�ٱ���Ϣ�Ѿ��ύ�ɹ�����л����֧��</strong><br>
 <span id="miao">5</span>����Զ���ת(��δ��ת,��ˢ��)
 </div>
 <script language="javascript">
 setTimeout("miaos()",4000);
 </script>
<? }?>
</body>
</html>