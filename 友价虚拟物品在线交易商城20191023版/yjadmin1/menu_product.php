<div class="treebox">
 <ul class="menu">

 <li class="level1" id="leftmenu1" onclick="leftonc(1)">
  <a href="javascript:void(0);" class="a1"><em></em>��Ʒ����<i></i></a>
  <ul class="level2">
  <li><a href="productlist.php">������Ʒ</a></li>
  <li><a href="productlist.php?zt=0">���ڳ��۵���Ʒ</a></li>
  <li><a href="productlist.php?zt=1" class="red">��Ҫ��˵���Ʒ</a></li>
  <li><a href="productlx.php">������Ʒ</a></li>
  <li><a href="propjlist.php">�����б�</a></li>
  </ul>
 </li>

 <li class="level1" id="leftmenu2" onclick="leftonc(2)">
  <a href="javascript:void(0);" class="a1"><em></em>��ֵ����<i></i></a>
  <ul class="level2">
  <li><a href="paykamilist.php">�����б�</a></li>
  </ul>
 </li>

 </ul>
</div>
<!--LEFT E-->
<script language="javascript">
leftonc(<?=$leftid?>);
</script>