<?
 global $rowcontrol;
 $sj=date("Y-m-d H:i:s");
 $uip=$_SERVER["REMOTE_ADDR"];
 //��ʼִ�й���
 $carid=preg_split("/xcf/",$caridarr);
 for($i=0;$i<=count($carid);$i++){
 if($carid[$i]!=""){
  $sqlc="select * from yjcode_car where id=".$carid[$i];mysql_query("SET NAMES 'GBK'");$resc=mysql_query($sqlc);if($rowc=mysql_fetch_array($resc)){
  $sql="select * from yjcode_pro where bh='".$rowc[probh]."' and zt=0 and ifxj=0";mysql_query("SET NAMES 'GBK'");$res=mysql_query($sql);
  if($row=mysql_fetch_array($res)){
  /////////////////////////////////��ʼ��һ����
  $fhxsnum=$rowc[tcfhxs];
  if(empty($fhxsnum) || $fhxsnum==99){$fhxsnum=$row[fhxs];}
  $orderbh=time().$i.rnd_num(100);
  $allmoney=$rowc[money1]*$rowc[num]+$rowc[yunfei];
  $sqlu="select id,money1,email from yjcode_user where id=".$rowc[userid];mysql_query("SET NAMES 'GBK'");$resu=mysql_query($sqlu);if(!$rowu=mysql_fetch_array($resu)){exit;}
  
  $usermoney=sprintf("%.2f",$rowu[money1]);
  $allmoney=sprintf("%.2f",$allmoney);
  if($usermoney<$allmoney){exit;}
  
  intotable("yjcode_order","probh,sj,uip,selluserid,userid,money1,orderbh,num,tit,ddzt,tcv,buyform,tcid,fhxs,shdz,yunfei,liuyan","'".$row[bh]."','".$sj."','".$uip."',".$row[userid].",".$rowc[userid].",".$rowc[money1].",'".$orderbh."',".$rowc[num].",'".$row[tit]."','wait','".$rowc[tcv]."','".$rowc[buyform]."',".$rowc[tcid].",".$fhxsnum.",'".$rowc[shdz]."',".$rowc[yunfei].",'".$rowc[bz]."'");
  PointUpdateM($rowc[userid],$allmoney*(-1));
  PointIntoM($rowc[userid],"������Ʒ,����".$rowc[num],$allmoney*(-1));
  updatetable("yjcode_pro","xsnum=xsnum+".$rowc[num].",lastsj='".$sj."' where id=".$row[id]);
  
  if(empty($rowc[tcid]) || empty($rowc[tcfhxs])){
  $kc=$row[kcnum]-$rowc[num];updatetable("yjcode_pro","kcnum=".$kc." where id=".$row[id]);
  //���ײͻ��ײ͸�����Ʒ�Զ�������ƷB
  if($row[fhxs]==2 || $row[fhxs]==3 || $row[fhxs]==4){
  updatetable("yjcode_order","fhsj='".$sj."',ddzt='db' where ddzt='wait' and orderbh='".$orderbh."'");
  $dbsj=$rowcontrol[dbsj];
  $sqldb="select * from yjcode_type where id=".$row[ty1id];mysql_query("SET NAMES 'GBK'");$resdb=mysql_query($sqldb);if($rowdb=mysql_fetch_array($resdb)){
  if(!empty($rowdb[dbsj])){$dbsj=$rowdb[dbsj];}
  }
  $oksj=date("Y-m-d H:i:s",strtotime("+".$dbsj." day"));
  $c_tit="�����Ѿ�������������뵣���׶Σ��ȴ����ȷ���ջ�";
  intotable("yjcode_db","money1,sj,selluserid,userid,dboksj,probh,tit,orderbh","".$allmoney.",'".$sj."',".$row[userid].",".$rowc[userid].",'".$oksj."','".$row[bh]."','".$c_tit."','".$orderbh."'");
   //����B
   if(4==$row[fhxs]){
	$sqla="select * from yjcode_kc where probh='".$row[bh]."' and ifok=0 and userid=".$row[userid]." order by id asc limit ".$rowc[num];mysql_query("SET NAMES 'GBK'");
	$resa=mysql_query($sqla);while($rowa=mysql_fetch_array($resa)){
	$txt=$txt."���ţ�".$rowa[ka]." ���룺".$rowa[mi]."<br>";
    updatetable("yjcode_kc","ifok=1,sj='".$sj."',uip='".$uip."',userid1=".$rowc[userid]." where id=".$rowa[id]);
	} 
   }
   //����E
  }
  //���ײͻ��ײ͸�����Ʒ�Զ�������ƷE
  }else{
  //���ײ��Զ�������ƷB
  updatetable("yjcode_taocan","kcnum=kcnum-".$rowc[num]." where id=".$rowc[tcid]);
  if($rowc[tcfhxs]==2 || $rowc[tcfhxs]==3 || $rowc[tcfhxs]==4){
  updatetable("yjcode_order","fhsj='".$sj."',ddzt='db' where ddzt='wait' and orderbh='".$orderbh."'");
  $dbsj=$rowcontrol[dbsj];
  $sqldb="select * from yjcode_type where id=".$row[ty1id];mysql_query("SET NAMES 'GBK'");$resdb=mysql_query($sqldb);if($rowdb=mysql_fetch_array($resdb)){
  if(!empty($rowdb[dbsj])){$dbsj=$rowdb[dbsj];}
  }
  $oksj=date("Y-m-d H:i:s",strtotime("+".$dbsj." day"));
  $c_tit="�����Ѿ�������������뵣���׶Σ��ȴ����ȷ���ջ�";
  intotable("yjcode_db","money1,sj,selluserid,userid,dboksj,probh,tit,orderbh","".$allmoney.",'".$sj."',".$row[userid].",".$rowc[userid].",'".$oksj."','".$row[bh]."','".$c_tit."','".$orderbh."'");
   //����B
   if(4==$rowc[tcfhxs]){
	$sqla="select * from yjcode_taocan_kc where probh='".$row[bh]."' and tcid=".$rowc[tcid]." and ifok=0 and userid=".$row[userid]." order by id asc limit ".$rowc[num];mysql_query("SET NAMES 'GBK'");
	$resa=mysql_query($sqla);while($rowa=mysql_fetch_array($resa)){
	$txt=$txt."���ţ�".$rowa[ka]." ���룺".$rowa[mi]."<br>";
    updatetable("yjcode_taocan_kc","ifok=1,sj='".$sj."',uip='".$uip."',userid1=".$rowc[userid]." where id=".$rowa[id]);
	} 
   }
   //����E
  }
  //���ײ��Զ�������ƷE
  }
  updatetable("yjcode_order","txt='".$txt."' where orderbh='".$orderbh."'");
  
  //д���ʼ�B
  $sqlm="select id,email,ifemail,ordertx2 from yjcode_user where id=".$row[userid];mysql_query("SET NAMES 'GBK'");$resm=mysql_query($sqlm);if(!$rowm=mysql_fetch_array($resm)){exit;}
  if(1==$rowm[ifemail] && !empty($rowm[email]) && empty($rowm[ordertx2])){
   $t="�ף����¶��������뾡���¼��վ������".weburl;
   $sqls="select * from yjcode_smsmail where admin=1 and tyid=1 and fa='".$rowm[email]."' and userid=".$rowu[id]."";mysql_query("SET NAMES 'GBK'");$ress=mysql_query($sqls);
   if(!$rows=mysql_fetch_array($ress)){
   intotable("yjcode_smsmail","admin,fa,tyid,userid,selluserid,txt,tit","1,'".$rowm[email]."',1,".$rowu[id].",".$rowm[id].",'".$t."','���Ķ�����Ϣ'");
   }
  }
  //д���ʼ�E
  
  //д�����B
  $sqlm="select id,mot,ifmot,ordertx1 from yjcode_user where id=".$row[userid];mysql_query("SET NAMES 'GBK'");$resm=mysql_query($sqlm);if(!$rowm=mysql_fetch_array($resm)){exit;}
  if(1==$rowm[ifmot] && !empty($rowm[mot]) && empty($rowm[ordertx1])){
   $t="�ף����¶��������뾡���¼��վ������������ƷΪ��\${tit}";
   $sqls="select * from yjcode_smsmail where admin=2 and tyid=1 and fa='".$rowm[mot]."' and userid=".$rowu[id]."";mysql_query("SET NAMES 'GBK'");$ress=mysql_query($sqls);
   if(!$rows=mysql_fetch_array($ress)){
   $dt=sprintf("%.2f",$allmoney);
   intotable("yjcode_smsmail","admin,fa,tyid,userid,selluserid,txt,tit","2,'".$rowm[mot]."',1,".$rowu[id].",".$rowm[id].",'".$t."','".$dt."'");
   }
  }
  //д�����E

  deletetable("yjcode_car where id=".$rowc[id]);
  //////////////////////////////////������һ����
  }
 }	 
 }
 }
 //����ִ�й���
?>