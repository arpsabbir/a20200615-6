<div class="treebox">
 <ul class="menu">

 <li class="level1" id="leftmenu1" onclick="leftonc(1)">
  <a href="javascript:void(0);" class="a1"><em></em>������<i></i></a>
  <ul class="level2">
  <li><a href="adtype.php">������</a></li>
  </ul>
 </li>

 <li class="level1" id="leftmenu2" onclick="leftonc(2)">
  <a href="javascript:void(0);" class="a1"><em></em>��������<i></i></a>
  <ul class="level2">
  <li><a href="helplist.php">�����б�</a></li>
  <li><a href="helplx.php">��Ӱ�����Ϣ</a></li>
  </ul>
 </li>

 <li class="level1" id="leftmenu3" onclick="leftonc(3)">
  <a href="javascript:void(0);" class="a1"><em></em>�������<i></i></a>
  <ul class="level2">
  <li><a href="tasklist.php">��������</a></li>
  <li><a href="tasklist.php?zt=1"  class="red">��˵�������</a></li>
  <li><a href="taskhflist.php">�����������</a></li>
  <li><a href="tasklist1.php">��������</a></li>
  <li><a href="tasklist1.php?zt=105"  class="red">��˶�������</a></li>
  <li><a href="taskhflist1.php">�����������</a></li>
  </ul>
 </li>

 <li class="level1" id="leftmenu5" onclick="leftonc(5)">
  <a href="javascript:void(0);" class="a1"><em></em>�ٱ�����<i></i></a>
  <ul class="level2">
  <li><a href="jubaolist.php">���оٱ���Ϣ</a></li>
  <li><a href="jubaolist.php?zt=1">δ�鿴����Ϣ</a></li>
  </ul>
 </li>

 <li class="level1" id="leftmenu4" onclick="leftonc(4)">
  <a href="javascript:void(0);" class="a1"><em></em>��������<i></i></a>
  <ul class="level2">
  <li><a href="gdlist.php">���й���</a></li>
  <? for($i=1;$i<=4;$i++){?>
  <li><a href="gdlist.php?gdzt=<?=$i?>"><?=returngdzt($i)?></a></li>
  <? }?>
  </ul>
 </li>

 </ul>
</div>
<!--LEFT E-->
<script language="javascript">
leftonc(<?=$leftid?>);
</script>







