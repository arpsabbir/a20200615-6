<? 
if(empty($qzmotweb) && empty($rowuser[ifmot]) && $rowcontrol["qzmot"]){Audit_alert("��������ʵ����Ҫ�����Ȱ������ֻ�����","mobbd.php");}
if(empty($userztweb) && empty($rowuser[zt])){php_toheader("userzt.php");}
?>
<!--��B-->
<div class="userleft">
 <div class="menu">
  
  <? if(2!=$rowuser[shopzt] && 4!=$rowuser[shopzt]){?>
  <? if($rowcontrol[ifopenshop]=="on"){?>
  <div class="cap">��������</div>
  <div class="d1">
  <a href="openshop1.php">��Ҫ����</a>
  </div>
  <? }?>
  
  <? }elseif(4==$rowuser[shopzt]){?>
  <div class="cap">��������</div>
  <div class="d1">
  <a href="openshop4.php">���̵�������</a>
  </div>
  
  <? 
  }else{
  $a=returncount("yjcode_order where selluserid=".$rowuser[id]." and ddzt='wait'");
  ?>
  <div class="cap">��������</div>
  <div class="d1">
  <a href="sellorder.php"<? if($a>0){?> class="al"<? }?>>���۶���</a>
  <? if($a>0){?><a href="sellorder.php?ddzt=wait" class="ar">����<span class="fh"><?=$a?></span></a><? }?>
  <a href="productlist.php" class="al">��Ʒ�б�</a><a href="productlx.php" class="ar">����</a>
  <a href="propjlist.php">���۹���</a>
  <? $a=returncount("yjcode_wenda where selluserid=".$rowuser[id]." and hftxt=''");?>
  <a href="prowdlist.php"<? if($a>0){?> class="al"<? }?>>��Ʒ�ʴ�</a><? if($a>0){?><a href="prowdlist.php?ifhf=no" class="ar">�ʴ�<span class="fh"><?=$a?></span></a><? }?>
  <a href="yunfeilist.php">�˷�ģ��</a>
  <a href="shop.php" class="al">��������</a><a href="<?=returnmyweb($rowuser[id],$rowuser[myweb])?>" class="ar" target="_blank">Ԥ��</a>
  <a href="adlx1.php">�������ϵͳ</a>
  </div>
  
  <? }?>

  <div class="cap">�ҵĲ�Ʒ</div>
  <div class="d1">
  <a href="order.php">�ҵĶ���</a>
  <a href="car.php">���ﳵ</a>
  <a href="favpro.php">�ҵ��ղ�</a>
  </div>

  <? if(empty($rowcontrol[iftask])){?>
  <div class="cap">�������</div>
  <div class="d1">
  <a href="tasklist.php">���ǹ���</a>
  <a href="taskhflist.php">���ǽ��ַ�</a>
  <a href="<?=weburl?>task/taskadd.php" target="_blank">��������</a>
  </div>
  <? }?>
  
  <div class="cap">��������</div>
  <div class="d1">
  <a href="newslist.php" class="al">�ҵĸ��</a><a href="newslx.php" class="ar">Ͷ��</a>
  <a href="tjuid.php">���Ƽ��Ļ�Ա</a>
  </div>
  
 </div>
</div>
<!--��E-->
