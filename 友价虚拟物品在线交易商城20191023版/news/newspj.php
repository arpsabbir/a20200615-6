<?
include("../config/conn.php");
include("../config/function.php");

zwzr();
$bh=sqlzhuru($_POST[bh]);
$pjt=sqlzhuru($_POST[pjt]);
while0("id,bh,userid","yjcode_news where bh='".$bh."'");if(!$row=mysql_fetch_array($res)){Audit_alert("��Ϣ�����ڣ�","./");}
$_SESSION["tzURL"]=weburl."news/"."txtlist_i".$row[id]."v.html#pj";
if(empty($_SESSION["SHOPUSER"])){Audit_alert("���ȵ�¼��","../reg/");}
if(empty($pjt)){Audit_alert("�������ݲ���Ϊ�գ�","txtlist_i".$row[id]."v.html");}
$userid=returnuserid($_SESSION["SHOPUSER"]);
$fbuserid=returnjgdw($row[userid],"",0);
while1("*","yjcode_newspj where newsbh='".$bh."' and userid=".$userid." order by sj desc");if($row1=mysql_fetch_array($res1)){
 $sj1=date("Y-m-d H:i:s",strtotime("-60 second"));
 if($row1[sj]>$sj1){Audit_alert("����̫��Ƶ��������Ϣһ�£�","txtlist_i".$row[id]."v.html");}
}
$sj=date("Y-m-d H:i:s");
$uip=$_SERVER["REMOTE_ADDR"];
intotable("yjcode_newspj","newsbh,fbuserid,userid,sj,uip,txt,hf,zt","'".$bh."',".$fbuserid.",".$userid.",'".$sj."','".$uip."','".$pjt."','',1");
php_toheader("pjlist_i".$row[id]."v.html#pj");
?>
