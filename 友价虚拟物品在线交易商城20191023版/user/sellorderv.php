 <? 
 $sj=date("Y-m-d H:i:s");
 $au="../product/view".returnproid($row[probh]).".html";
 $sqlb1="select * from yjcode_user where id=".$row[userid];mysql_query("SET NAMES 'GBK'");$resb1=mysql_query($sqlb1);$rowb1=mysql_fetch_array($resb1);
 ?>
 
 <div class="orderv2">
  <ul class="u1">
  <li class="l1"><a href="<?=$au?>" target="_blank"><?=$row[tit]?></a></li>
  <li class="l2"><span>���:<?=$orderbh?></span></li>
  <li class="l3"><span class="s1">�������</span><span class="s2"><?=returnjgdian($row[money1]*$row[num]+$row[yunfei])?></span></li>
  <li class="l4"><span class="s1">��Ʒ����</span><span class="s2"><?=$row[num]?></span></li>
  <li class="l5"><span class="s1">����״̬</span><span class="s2"><?=returnorderzt($row[ddzt])?></span></li>
  <li class="l6"><span class="s1">��� [<strong><?=$rowb1[nc]?></strong>]</span><? if(!empty($rowb1[uqq])){?><a href="javascript:void(0);" onclick="opentangqq('<?=$rowb1[uqq]?>')" class="s2"><?=$rowb1[uqq]?></a><? }?><span class="s3"><?=$rowb1[mot]?></span></li>
  </ul>
  
  <? if(!empty($ifztcontrol)){?>
  <!--״̬˵��B-->
  <div class="ztcontrol">
   <div class="d1"></div>
   <div class="d2">
   
    <? if($row[ddzt]=="wait"){?>
    <div class="ds1">����Ѿ������ˣ��뾡�췢����</div>
    <div class="ds3">
    <a href="fahuo.php?orderbh=<?=$orderbh?>" class="a1">����</a>
    <a href="sellclose.php?orderbh=<?=$orderbh?>" class="a0">ȡ������</a>
    </div>
    <? }?>
    
    <? if($row[ddzt]=="close"){?>
    <div class="ds1">���� <?=$row[closesj]?> ȡ���˸ñʶ�����</div>
    <div class="ds2">���֧���Ŀ����Ѿ��˻����Ա�˺š�</div>
    <? }?>
    
    <? if($row[ddzt]=="suc"){?>
    <div class="ds1">��ϲ�����ñʶ����Ѿ����׳ɹ���</div>
    <div class="ds2"><strong>���ѣ�</strong>�������Ҫ����Ʒ�����<a href="<?=$au?>" target="_blank">�ٴι���</a>��</div>
    <? }?>
    
    <? if($row[ddzt]=="backsuc"){?>
    <div class="ds1">���� <?=$row[tkoksj]?> ͬ������ҵ��˿����룬�����Ѿ��˻ص�����˻��С�</div>
    <div class="ds2">����˵����<?=returnjgdw($row[tkjg],"","ͬ���˿�")?></div>
    <? }?>
    
    <? 
	if($row[ddzt]=="backerr"){
    while1("*","yjcode_db where orderbh='".$orderbh."'");$row1=mysql_fetch_array($res1);
    $second=strtotime($row1[dboksj])-strtotime($sj);
    $day = floor($second/(3600*24));
    $second = $second%(3600*24);//��ȥ����֮��ʣ���ʱ��
    $hour = floor($second/3600);
    $second = $second%3600;//��ȥ��Сʱ֮��ʣ���ʱ�� 
    $minute = floor($second/60);
    $second = $second%60;//��ȥ������֮��ʣ���ʱ�� 
    $sjcv=$day."��".$hour."ʱ".$minute."��".$second."��";
    ?>
    <div class="ds1">���� <?=$row[tkoksj]?> �ܾ�����ҵ��˿����롣����˵����<?=returnjgdw($row[tkjg],"","ͬ���˿�")?></div>
    <div class="ds2">�ʽ𵣱�ʣ�ࣺ<?=$sjcv?></div>
    <? }?>
    
    <? 
	if($row[ddzt]=="back"){
    while1("*","yjcode_tk where orderbh='".$orderbh."'");$row1=mysql_fetch_array($res1);
    $second=strtotime($row1[tkoksj])-strtotime($sj);
    $day = floor($second/(3600*24));
    $second = $second%(3600*24);//��ȥ����֮��ʣ���ʱ��
    $hour = floor($second/3600);
    $second = $second%3600;//��ȥ��Сʱ֮��ʣ���ʱ�� 
    $minute = floor($second/60);
    $second = $second%60;//��ȥ������֮��ʣ���ʱ�� 
    $sjcv=$day."��".$hour."ʱ".$minute."��".$second."��";
    ?>
    <div class="ds1">�˿���Ҫ��������Ҫ�� <?=$sjcv?> �ڴ���ö������˿����롣</div>
    <div class="ds2">�����ʱδ����ϵͳ���Զ��ж�Ϊ��ͬ�����˿����롣</div>
    <div class="ds3">
    <a href="selltk.php?orderbh=<?=$orderbh?>" class="a1">�����˿�</a>
    </div>
    <? }?>
    
    <? 
	if($row[ddzt]=="db"){
    while1("*","yjcode_db where orderbh='".$orderbh."'");$row1=mysql_fetch_array($res1);
    $second=strtotime($row1[dboksj])-strtotime($sj);
    $day = floor($second/(3600*24));
    $second = $second%(3600*24);//��ȥ����֮��ʣ���ʱ��
    $hour = floor($second/3600);
    $second = $second%3600;//��ȥ��Сʱ֮��ʣ���ʱ�� 
    $minute = floor($second/60);
    $second = $second%60;//��ȥ������֮��ʣ���ʱ�� 
    $sjcv=$day."��".$hour."ʱ".$minute."��".$second."��";
	?>
    <div class="ds1">���ѷ������ȴ����ȷ���ջ���</div>
    <div class="ds2">�ʽ𵣱�ʣ��ʱ�䣺<?=$sjcv?></div>
    <? }?>

    <? if($row[ddzt]=="jf"){?>
    <div class="ds1">���������ƽ̨���봦�����˿���ף�����������ʽ𽫱����ᣬֱ��������ϡ��������ύ������������֤�ݡ�</div>
    <div class="ds3"><a href="orderjf2.php?orderbh=<?=$orderbh?>" class="a1">�鿴��¼</a></div>
    <? }?>

    <? if($row[ddzt]=="jfbuy"){?>
    <div class="ds1">ƽ̨�Ѿ��ж����ν��׾���Ϊ���ʤ�ߣ������Ѿ��˻ص���ҵ��˻���</div>
    <div class="ds3"><a href="orderjf2.php?orderbh=<?=$orderbh?>" class="a0">�鿴��ͨ��¼</a></div>
    <? }?>

    <? if($row[ddzt]=="jfsell"){?>
    <div class="ds1">ƽ̨�Ѿ��ж����ν��׾���Ϊ��ʤ�ߣ������Ѿ��Զ������������˻���</div>
    <div class="ds3"><a href="orderjf2.php?orderbh=<?=$orderbh?>" class="a0">�鿴��ͨ��¼</a></div>
    <? }?>
    
   </div>
  </div>
  <!--״̬˵��E-->
  <? }?>
  
  <ul class="u2">
  <li class="l1">�µ�ʱ��</li><li class="l2"><?=$row[sj]?></li>
  <li class="l1">ѡ���ײ�</li><li class="l2"><?=returnjgdw($row[tcv],"","��")?></li>
  </ul>
  <? if(!empty($row[liuyan])){?>
  <table class="table1" border="0" cellspacing="0" cellpadding="0">
  <tr>
  <td class="td1">��������</td>
  <td class="td2"><?=$row[liuyan]?></td>
  </tr>
  </table>
  <? }?>
  <? if(!empty($row[buyform])){?>
  <table class="table1" border="0" cellspacing="0" cellpadding="0">
  <tr>
  <td class="td1">������Ϣ</td>
  <td class="td2"><?=$row[buyform]?></td>
  </tr>
  </table>
  <? }?>
  <? if(!empty($row[shdz])){?>
  <table class="table1" border="0" cellspacing="0" cellpadding="0">
  <tr>
  <td class="td1">�ջ���ַ</td>
  <td class="td2"><?=$row[shdz]?></td>
  </tr>
  </table>
  <? }?>
 
  <? if(!empty($row[fhtxt])){?>
  <table class="table1" border="0" cellspacing="0" cellpadding="0">
  <tr>
  <td class="td1">������ע</td>
  <td class="td2"><?=$row[fhtxt]?></td>
  </tr>
  </table>
  <? }?>
 
  <table class="table1" border="0" cellspacing="0" cellpadding="0">
  <tr>
  <td class="td1">�ջ���Ϣ</td>
  <td class="td2">
  <? 
  $sqlpro="select * from yjcode_pro where bh='".$row[probh]."'";mysql_query("SET NAMES 'GBK'");$respro=mysql_query($sqlpro);if($rowpro=mysql_fetch_array($respro)){
  $tcfhxs=0;
  if(!empty($row[tcid])){
   while2("*","yjcode_taocan where id=".$row[tcid]);if($row2=mysql_fetch_array($res2)){$tcfhxs=$row2[fhxs];}
  }
  ?>
 
  <? if((1==$rowpro[fhxs] && empty($tcfhxs)) || 1==$tcfhxs){?><strong class="blue">�ֶ�����</strong><? }?>
  <? if(1==$tcfhxs){?><strong class="blue">�ֶ�����</strong><? }?>
 
  <? if(2==$rowpro[fhxs] && empty($tcfhxs)){?>
  <strong>�ö�����Ʒͨ���������أ�����Ϊ������Ϣ��</strong><br>
  <strong class="blue">���̵�ַ��<a href="<?=$rowpro[wpurl]?>" target="_blank"><?=$rowpro[wpurl]?></a><br>�������룺<?=$rowpro[wppwd]?><br>��ѹ���룺<?=$rowpro[wppwd1]?></strong>
  <? }?>
  <? if(2==$tcfhxs){?>
  <strong>�ö�����Ʒͨ���������أ�����Ϊ������Ϣ��</strong><br>
  <strong class="blue">���̵�ַ��<a href="<?=$row2[wpurl]?>" target="_blank"><?=$row2[wpurl]?></a><br>�������룺<?=$row2[wppwd]?><br>��ѹ���룺<?=$row2[wppwd1]?></strong>
  <? }?>
 
  <? if(3==$rowpro[fhxs] && empty($tcfhxs)){if(empty($rowpro[upty])){$u=weburl."upload/".$rowpro[userid]."/".$rowpro[bh]."/".$rowpro[upf];}else{$u=$rowpro[upf];}?>
  <strong>�ö�������Ʒ�Ѿ����������������ͼ������</strong><br>
  <a href="<?=$u?>" target="_blank"><img border="0" style="margin-top:5px;" src="img/down.jpg" /></a>
  <? }?>
  <? if(3==$tcfhxs){if(empty($rowpro[upty])){$u=weburl."upload/".$rowpro[userid]."/".$rowpro[bh]."/".$row2[upf];}else{$u=$row2[upf];}?>
  <strong>�ö�������Ʒ�Ѿ����������������ͼ������</strong><br>
  <a href="<?=$u?>" target="_blank"><img border="0" style="margin-top:5px;" src="img/down.jpg" /></a>
  <? }?>
 
  <? if((4==$rowpro[fhxs] && empty($tcfhxs)) || 4==$tcfhxs){?>
  <strong>������Ϣ</strong><br>
  <span class="fontc">
  <? if(!empty($rowpro[downurl])){echo "������ص�ַ��<a href='".$rowpro[downurl]."' target='_blank'>��������������</a><br>";}?>
  <?=$row[txt]?>
  </span>
  <? }?>
 
  <? if((5==$rowpro[fhxs] && empty($tcfhxs)) || 5==$tcfhxs){?>
  <strong>���������Ϣ��</strong><br>
  <? if(!empty($row[kdid])){while1("*","yjcode_kuaidi where id=".$row[kdid]);if($row1=mysql_fetch_array($res1)){$kdbh=$row1[kdbh];$kddh=$row[kddh];?>
  ��ݹ�˾��<a href="<?=$row1[kdweb]?>" target="_blank" class="green"><?=$row1[tit]?></a><br>
  ��ݵ��ţ�<strong><?=$kddh?></strong><br>
  <? while1("*","yjcode_chajian where cjbh='cj001' and zt=0");if($row1=mysql_fetch_array($res1)){include("../config/chajian/cj001/index.php");}?>
  <? }}?>
  <? }?>
 
  <? }else{?>
  <strong class="red">�ף��ܱ�Ǹ���޷��ṩ�ö����ķ�����Ϣ�����Ѿ�ɾ����Ʒ��Ϣ��</strong>
  <? }?>
  </td>
  </tr>
  </table>

  
 </div>
 
  
 <div class="jfgtlist">
  <div class="cap">&nbsp;&nbsp;��ͨ��¼</div>
  <? 
  $i=1;
  while1("*","yjcode_orderlog where orderbh='".$orderbh."' and selluserid=".$userid." order by sj asc");while($row1=mysql_fetch_array($res1)){
  $txt=$row1[txt];
  if($row1[admin]==1){$tp=returntppd("../upload/".$row1[userid]."/user.jpg","img/nonetx.gif");$sf="��";}
  elseif($row1[admin]==2){$tp=returntppd("../upload/".$row1[selluserid]."/user.jpg","img/nonetx.gif");$sf="����";}
  elseif($row1[admin]==3){$tp="img/nonetx.jpg";$sf="ƽ̨";}
  ?>
  <ul class="u1<? if($i==1){?> u0<? }?>">
  <li class="l1"><img src="<?=$tp?>" width="40" height="40" /></li>
  <li class="l2">[<?=$sf?>] <?=$txt?><br><?=$row1[sj]?></li>
  </ul>
  <? $i++;}?>
 </div>
