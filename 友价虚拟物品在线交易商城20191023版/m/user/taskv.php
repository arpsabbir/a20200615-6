<div class="taskmain1 box"><div class="d1"></div><div class="d2">������Ϣ</div></div>
<div class="taskmain2 box">
 <div class="d1">�������⣺</div>
 <div class="d2"><a href="../task/view<?=$rowtask[id]?>.html"><strong><?=$rowtask[tit]?></strong></a></div>
</div>
<div class="taskmain2 box">
 <div class="d1">����Ԥ�㣺</div>
 <div class="d2"><strong class="feng">��<?=$rowtask[money1]?></strong></div>
</div>
<div class="taskmain2 box">
 <div class="d1">����״̬��</div>
 <div class="d2"><?=returntask($rowtask[zt])?></div>
</div>
<div class="taskmain2 box">
 <div class="d1">�������ͣ�</div>
 <div class="d2"><?=returntasktype(1,$rowtask[type1id])." ".returntasktype(2,$rowtask[type2id])?></div>
</div>
<div class="taskmain3 box"></div>
