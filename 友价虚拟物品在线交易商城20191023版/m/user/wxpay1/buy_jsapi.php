<?php
include("../../../config/conn.php");
include("../../../config/function.php");
sesCheck_m();

while0("*","yjcode_dingdang where wxddbh='".$_SESSION[wxddbh]."'");$row=mysql_fetch_array($res);$moneyv=$row['money1']*100;

$lib_path	= dirname(__FILE__)."/";
require_once $lib_path."WxPay.Config.php";
require_once $lib_path."WxPay.Api.php";
require_once $lib_path."WxPay.Notify.php";
require_once $lib_path."WxPay.JsApiPay.php";
require_once $lib_path."log.php";


require_once "wxconfig.php";


WxPayConfig::set_appid( $payment['wxpay_jspay_appid'] );
WxPayConfig::set_appsecret( $payment['wxpay_jspay_appsecret']);	

WxPayConfig::set_mchid( $payment['wxpay_jspay_mchid'] );
WxPayConfig::set_key( $payment['wxpay_jspay_key'] );





	if ( empty($_SESSION['wxpay_jspay_openid'])  ){
		
		if( empty($payment)  ){
			return false;
		}

		$tools = new JsApiPay();
		$openid = $tools->GetOpenid();
		$_SESSION['wxpay_jspay_openid'] = $openid;
	}


		
		
		$html = '<div style="text-align:center"><button class="btn btn-primary c-btn3" type="button" onclick="javascript:alert(\'����΢�ſͻ��˴�����\')">΢�Ű�ȫ֧��</button></div>';

		// ��ҳ��Ȩ��ȡ�û�openid
        if (! isset($_SESSION['wxpay_jspay_openid']) || empty($_SESSION['wxpay_jspay_openid'])) {
			echo $html;
           exit();
        }
		$openId = $_SESSION['wxpay_jspay_openid'];
		

		$root_url = weburl;
		//$root_url = str_replace('mobile/', '', $root_url);
		$notify_url = $root_url.'m/user/wxpay1/carpay_notify.php';



		
		$out_trade_no = $_SESSION['wxddbh'];


//var_dump($notify_url);

//iconv("GB2312","UTF-8//IGNORE",webname."��Ʒ����")
		//ͳһ�µ�
		$tools = new JsApiPay();
		$input = new WxPayUnifiedOrder();
		$input->SetBody(  $out_trade_no );
		$input->SetAttach( $out_trade_no );		//�̻�֧����־
		$input->SetOut_trade_no( $out_trade_no );		//�̻������� 
		$input->SetTotal_fee(  $moneyv ); //�ܽ��
		$input->SetTime_start(date("YmdHis"));
		//$input->SetTime_expire(date("YmdHis", time() + 600));
		//$input->SetGoods_tag("test");
		$input->SetNotify_url( $notify_url );	//֪ͨ��ַ 
		$input->SetTrade_type("JSAPI");	//��������
		$input->SetProduct_id( $out_trade_no );


		$input->SetOpenid($openId);
		$wxpay_order = WxPayApi::unifiedOrder($input);
		

		if ( $wxpay_order['return_code'] != 'FALL' ){
			$jsApiParameters = $tools->GetJsApiParameters($wxpay_order);
		
			$error = '';
			if ( strpos($jsApiParameters, 'error:') === 0 ){
				$error = str_replace('error:', '', $jsApiParameters);
				$jsApiParameters = '{}';
			}
		}else{
			$error = $wxpay_order['return_msg'];
		}
		
		echo '<meta name="viewport" content="width=device-width, initial-scale=1"/> ';
		$html = '<div style="text-align:center"><button class="btn btn-primary c-btn3" type="button" onclick="javascript:alert(\'����΢�ſͻ��˴�����\')">΢�Ű�ȫ֧��</button></div>';
        if( empty($error) )
        {
			$js = '<script type="text/javascript">
				function jsApiCall()
				{
					WeixinJSBridge.invoke(
						"getBrandWCPayRequest",
						'.$jsApiParameters.',
						function(res){
							//WeixinJSBridge.log(res.err_msg);
							if(res.err_msg == "get_brand_wcpay_request:ok"){
								//alert(res.err_code+res.err_desc+res.err_msg);
								window.location.href = "'. weburl .'m/user/order.php";
								//window.location.replace("'. $root_url .'");
							}else{
								//������ת����������ҳ��
								alert(֧��ʧ��);
								window.location.href = "./index.php";
							}
						}
					);
				}
				function callpay()
				{
					if (typeof WeixinJSBridge == "undefined"){
						if( document.addEventListener ){
							document.addEventListener("WeixinJSBridgeReady", jsApiCall, false);
						}else if (document.attachEvent){
							document.attachEvent("WeixinJSBridgeReady", jsApiCall); 
							document.attachEvent("onWeixinJSBridgeReady", jsApiCall);
						}
					}else{
						jsApiCall();
					}
				}
				function gouser(){location.href="../";}
				callpay()
				</script>';
			$html = '<div align="center">
		<button style="width:210px; height:50px; border-radius: 15px;background-color:#FE6714; border:0px #FE6714 solid; cursor: pointer;  color:white;  font-size:16px;margin-top:20px;" type="button" onClick="callpay()" >���֧��</button><button style="width:210px; height:50px; border-radius: 15px;background-color:#1E9FFF; border:0px #FE6714 solid; cursor: pointer;  color:white;  font-size:16px;margin-top:30px;" type="button" onClick="gouser()" >���ػ�Ա����</button>
	</div>'.$js;
        }else{
			$html = '<div style="text-align:center"><button class="btn btn-primary c-btn3" type="button" onclick="javascript:alert(\''. $error .'\')">΢�Ű�ȫ֧��</button></div>';
		}
        
        echo  $html;
	
exit;
?>

