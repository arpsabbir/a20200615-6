if ($("#js_ads_banner_top_slide").length){  //�жϵ�ǰ����Ƿ�չ�������û�У���ִ��������� 
  var $slidebannertop = $("#js_ads_banner_top_slide"),$bannertop = $("#js_ads_banner_top"); 
  setTimeout(function(){$bannertop.slideUp(1000);$slidebannertop.slideDown(1000);},2500); //2500����(2.5��)��С����ջأ������쿪��ִ��ʱ�䶼��1��(1000����) 
  setTimeout(function(){$slidebannertop.slideUp(1000,function (){$bannertop.slideDown(1000);});},6500); //С���չ���� 
}