 <? 
 $sj=date("Y-m-d H:i:s");
 $au="../product/view".returnproid($row[probh]).".html";
 $sqls1="select * from yjcode_user where id=".$row[selluserid];mysql_query("SET NAMES 'GBK'");$ress1=mysql_query($sqls1);$rows1=mysql_fetch_array($ress1);
 ?>
 
 <div class="orderv1">
 
 
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
  <td class="td1">���ҷ�����ע</td>
  <td class="td2"><?=$row[fhtxt]?></td>
  </tr>
  </table>
  <? }?>
  
  <? if($row[ddzt]=="db" || $row[ddzt]=="suc"){?>
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
 
  <? if((1==$rowpro[fhxs] && empty($tcfhxs)) || 1==$tcfhxs){?><strong class="blue">�ö�������Ʒ�������ֶ�����������ϵ����</strong><? }?>
 
  <? if(2==$rowpro[fhxs] && empty($tcfhxs)){?>
  <strong>�ö�����Ʒͨ���������أ������������Ϣ���أ�</strong><br>
  <strong class="blue">���̵�ַ��<a href="<?=$rowpro[wpurl]?>" target="_blank"><?=$rowpro[wpurl]?></a><br>�������룺<?=$rowpro[wppwd]?><br>��ѹ���룺<?=$rowpro[wppwd1]?></strong>
  <? }?>
  <? if(2==$tcfhxs){?>
  <strong>�ö�����Ʒͨ���������أ������������Ϣ���أ�</strong><br>
  <strong class="blue">���̵�ַ��<a href="<?=$row2[wpurl]?>" target="_blank"><?=$row2[wpurl]?></a><br>�������룺<?=$row2[wppwd]?><br>��ѹ���룺<?=$row2[wppwd1]?></strong>
  <? }?>
 
  <? if(3==$rowpro[fhxs] && empty($tcfhxs)){if(empty($rowpro[upty])){$u=weburl."upload/".$rowpro[userid]."/".$rowpro[bh]."/".$rowpro[upf];}else{$u=$rowpro[upf];}?>
  <strong>�ö�������Ʒ�Ѿ���������������������ͼ���������</strong><br>
  <a href="<?=$u?>" target="_blank"><img border="0" style="margin-top:5px;" src="img/down.jpg" /></a>
  <? }?>
  <? if(3==$tcfhxs){if(empty($rowpro[upty])){$u=weburl."upload/".$rowpro[userid]."/".$rowpro[bh]."/".$row2[upf];}else{$u=$row2[upf];}?>
  <strong>�ö�������Ʒ�Ѿ���������������������ͼ���������</strong><br>
  <a href="<?=$u?>" target="_blank"><img border="0" style="margin-top:5px;" src="img/down.jpg" /></a>
  <? }?>
 
  <? if((4==$rowpro[fhxs] && empty($tcfhxs)) || 4==$tcfhxs){?>
  <strong>������������Ŀ�����Ϣ</strong><br>
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
  <strong class="red">�ף��ܱ�Ǹ���޷��ṩ�ö����ķ�����Ϣ�����ѱ�����ɾ����������ϵ����</strong>
  <? }?>
  </td>
  </tr>
  </table>
  <? }?>

 
  <ul class="u1">
  <li class="l1"><a href="<?=$au?>" target="_blank"><?=$row[tit]?></a></li>
  <li class="l2"><span>���:<?=$orderbh?></span></li>
  <li class="l3"><span class="s1">�������</span><span class="s2"><?=returnjgdian($row[money1]*$row[num]+$row[yunfei])?></span></li>
  <li class="l4"><span class="s1">��Ʒ����</span><span class="s2"><?=$row[num]?></span></li>
  <li class="l5"><span class="s1">����״̬</span><span class="s2"><?=returnorderzt($row[ddzt])?></span></li>
  <li class="l6"><span class="s1">���� [<strong><?=$rows1[nc]?></strong>]</span><? if(!empty($rows1[uqq])){?><a href="javascript:void(0);" onclick="opentangqq('<?=$rows1[uqq]?>')" class="s2"><?=$rows1[uqq]?></a><? }?><span class="s3"><?=$rows1[mot]?></span></li>
  </ul>
  
  <? if(!empty($ifztcontrol)){?>
  <!--״̬˵��B-->
  <div class="ztcontrol">
   <div class="d1"></div>
   <div class="d2">
   
    <? if($row[ddzt]=="wait"){?>
    <div class="ds1">�������յ����Ķ���������׼�������������ĵȴ��¡�</div>
    <div class="ds2"><strong>���ѣ�</strong>������ҳ�ʱ��δ�����������ԡ�<a href="ordertk.php?orderbh=<?=$orderbh?>">�����˿�</a>��������Ҳͦ�����ף������ԡ�<a href="http://wpa.qq.com/msgrd?v=3&uin=<?=$rows1[uqq]?>&site=<?=weburl?>&menu=yes" class="s2" target="_blank">�������Ҿ��췢��</a>����</div>
    <div class="ds3">
    <a href="http://wpa.qq.com/msgrd?v=3&uin=<?=$rows1[uqq]?>&site=<?=weburl?>&menu=yes" class="a1" target="_blank">�������Ҿ��췢��</a>
    <a href="ordertk.php?orderbh=<?=$orderbh?>" class="a0">�����˿�</a>
    </div>
    <? }?>
    
    <? if($row[ddzt]=="close"){?>
    <div class="ds1">���� <?=$row[closesj]?> ȡ���˸ñʶ�����</div>
    <div class="ds2"><strong>���ѣ�</strong>�������Ҫ����Ʒ�����<a href="<?=$au?>" target="_blank">�ٴι���</a>��</div>
    <? }?>
    
    <? if($row[ddzt]=="suc"){?>
    <div class="ds1">��ϲ�����ñʶ����Ѿ����׳ɹ���</div>
    <div class="ds2"><strong>���ѣ�</strong>�������Ҫ����Ʒ�����<a href="<?=$au?>" target="_blank">�ٴι���</a>��</div>
    <? if(panduan("orderbh,userid","yjcode_propj where orderbh='".$orderbh."' and userid=".$userid)==0){?>
    <div class="ds3"><a href="orderpj.php?orderbh=<?=$orderbh?>" class="a1">д����׬����</a></div>
    <? }?>
    <? }?>
    
    <? if($row[ddzt]=="backsuc"){?>
    <div class="ds1">������ <?=$row[tkoksj]?> ͬ���������˿����룬�����Ѿ��˻ص������˻��С�<br>����˵����<?=returnjgdw($row[tkjg],"","ͬ���˿�")?></div>
    <div class="ds2"><strong>���ѣ�</strong>�������Ҫ����Ʒ�����<a href="<?=$au?>" target="_blank">�ٴι���</a>��</div>
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
    <div class="ds1">������ <?=$row[tkoksj]?> �ܾ��������˿����롣<br>����˵����<?=returnjgdw($row[tkjg],"","ͬ���˿�")?></div>
    <div class="ds2"><strong>���ѣ�</strong>�����Ʒû�����⣬����Խ��С�<a href="shouhuo.php?orderbh=<?=$orderbh?>">ȷ���ջ�</a>���������Ʒ�����⣬����ԡ�<a href="../help/aboutview4.html" target="_blank">����ͷ�����</a>��<br>������� <span class="red"><?=$sjcv?></span> �ڽ�����ز���������ϵͳ�Զ���ɸñʶ������ʽ����������˻�</div>
    <div class="ds3">
    <a href="shouhuo.php?orderbh=<?=$orderbh?>" class="a1">ȷ���ջ�</a>
    <a href="orderjf.php?orderbh=<?=$orderbh?>" class="a0">����ͷ�����</a>
    </div>
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
    <div class="ds1">�˿����봦���У�������Ҫ�� <?=$sjcv?> �ڴ�������˿����롣</div>
    <div class="ds2"><strong>���ѣ�</strong>�����Ʒ�������ҷ��涼�����⣬��Ҳ����Ҫ����Ʒ����ô�����<a href="orderqxtk.php?orderbh=<?=$orderbh?>">ȡ���˿�����</a>��<br>���� <?=$row[tksj]?> �������˿�<br>����˿����ɣ�</div>
    <div class="ds4"><?=$row[tkly]?></div>
    <div class="ds3">
    <a href="orderqxtk.php?orderbh=<?=$orderbh?>" class="a1">ȡ���˿�����</a>
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
    <div class="ds1">�����ѷ������ȴ���ȷ���ջ����ʽ𵣱�ʣ��ʱ�䣺<?=$sjcv?></div>
    <div class="ds2"><strong>���ѣ�</strong>�����յ���Ʒ��ȷ��û����󣬿ɽ��С�<a href="shouhuo.php?orderbh=<?=$orderbh?>">ȷ���ջ�</a>������ɴ˴ν���;�ڴ��ڼ��뾡��ע���ʽ𵣱�ʣ��ʱ�䣬���ٽ���ʱ��㣬��Ʒ��Ȼ��������������δ�輰ʱ��������ȡ�<a href="orderyc.php?orderbh=<?=$orderbh?>">�ӳ�����ʱ��</a>����<a href="ordertk.php?orderbh=<?=$orderbh?>">�����˿�</a>�����ȴ��������������١�<a href="shouhuo.php?orderbh=<?=$orderbh?>">ȷ���ջ�</a>����<a href="orderqxtk.php?orderbh=<?=$orderbh?>">ȡ���˿�</a>������������������ŵ���Է���������ʱ�����Զ���ɽ��ס��ʽ𵣱�ʱ������󣬿���Զ�ת�������˻���</div>
    <div class="ds3">
    <a href="shouhuo.php?orderbh=<?=$orderbh?>" class="a1">ȷ���ջ�</a>
    <a href="orderyc.php?orderbh=<?=$orderbh?>" class="a0">�ӳ�����ʱ��</a>
    <a href="ordertk.php?orderbh=<?=$orderbh?>" class="a0">�����˿�</a>
    <a href="orderqxtk.php?orderbh=<?=$orderbh?>" class="a0">ȡ���˿�</a>
    </div>
    <? }?>

    <? if($row[ddzt]=="jf"){?>
    <div class="ds1">���Ѿ�������ƽ̨�ͷ����봦������������ʽ𽫱����ᣬֱ��������ϡ��������ύ������������֤�ݡ�</div>
    <div class="ds3"><a href="orderjf1.php?orderbh=<?=$orderbh?>" class="a1">�ύ��֤��</a></div>
    <? }?>

    <? if($row[ddzt]=="jfbuy"){?>
    <div class="ds1">ƽ̨�Ѿ��ж����ν��׾���Ϊ���ʤ�ߣ������Ѿ��˻ص������˻���</div>
    <div class="ds3"><a href="orderjf1.php?orderbh=<?=$orderbh?>" class="a0">�鿴��ͨ��¼</a></div>
    <? }?>

    <? if($row[ddzt]=="jfsell"){?>
    <div class="ds1">ƽ̨�Ѿ��ж����ν��׾���Ϊ����ʤ�ߣ������Ѿ��Զ������������˻���</div>
    <div class="ds3"><a href="orderjf1.php?orderbh=<?=$orderbh?>" class="a0">�鿴��ͨ��¼</a></div>
    <? }?>
    
   </div>
  </div>
  <!--״̬˵��E-->
  <? }?>
  
 </div>
 
  
 <div class="jfgtlist">
  <div class="cap">&nbsp;&nbsp;��ͨ��¼</div>
  <? 
  $i=1;
  while1("*","yjcode_orderlog where orderbh='".$orderbh."' and userid=".$userid." order by sj asc");while($row1=mysql_fetch_array($res1)){
  $txt=$row1[txt];
  if($row1[admin]==1){$tp=returntppd("../upload/".$row1[userid]."/user.jpg","img/nonetx.gif");$sf="��";}
  elseif($row1[admin]==2){$tp=returntppd("../upload/".$row1[useridhf]."/user.jpg","img/nonetx.gif");$sf="����";}
  elseif($row1[admin]==3){$tp="img/nonetx.jpg";$sf="ƽ̨";}
  ?>
  <ul class="u1<? if($i==1){?> u0<? }?>">
  <li class="l1"><img src="<?=$tp?>" width="40" height="40" /></li>
  <li class="l2">[<?=$sf?>] <?=$txt?><br><?=$row1[sj]?></li>
  </ul>
  <? $i++;}?>
 </div>
