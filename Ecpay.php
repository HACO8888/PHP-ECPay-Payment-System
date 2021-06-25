<?php
include('ECPay.Payment.Integration.php');
$prefix = time() * rand(1, 5);

try {
    $I_name = $_POST['ItemName'];
    $I_Money = $_POST['TotalAmount'];
    $I_Payment = $_POST['ChoosePayment'];
    $obj = new ECPay_AllInOne();
    //服務參數
    $obj->ServiceURL  = "https://payment.ecpay.com.tw/Cashier/AioCheckOut/V5"; 
    $obj->HashKey     = '';                                    
    $obj->HashIV      = '';                                    
    $obj->MerchantID  = '';                                             
    $obj->EncryptType = '1';                                                   


    //基本參數(請依系統規劃自行調整)
    $MerchantTradeNo = "NO" . strtoupper(strip_tags(substr($prefix, 0, 10)));
    $obj->Send['ReturnURL']         = "http://example.com/payEcpay.php";   
    $obj->Send['MerchantTradeNo']   = $MerchantTradeNo;               
    $obj->Send['MerchantTradeDate'] = date('Y/m/d H:i:s');            
    $obj->Send['TotalAmount']       = $I_Money;                       
    $obj->Send['TradeDesc']         = "A Desc";
    if ($I_Payment == 'ALL'){
        $obj->Send['ChoosePayment']     = ECPay_PaymentMethod::ALL;   
    }elseif ($I_Payment == 'Credit'){
        $obj->Send['ChoosePayment']     = ECPay_PaymentMethod::Credit;   
    }elseif ($I_Payment == 'WebATM'){
        $obj->Send['ChoosePayment']     = ECPay_PaymentMethod::WebATM;   
    }elseif ($I_Payment == 'ATM'){
        $obj->Send['ChoosePayment']     = ECPay_PaymentMethod::ATM;   
    }elseif ($I_Payment == 'CVS'){
        $obj->Send['ChoosePayment']     = ECPay_PaymentMethod::CVS;   
    }elseif ($I_Payment == 'BARCODE'){
        $obj->Send['ChoosePayment']     = ECPay_PaymentMethod::BARCODE;   
    }

    //訂單的商品資料
    array_push($obj->Send['Items'], array(
        'Name' => $I_name, 'Price' => (int)$I_Money,
        'Currency' => "元", 'Quantity' => (int) "1", 'URL' => "dedwed"
    ));
    //產生訂單(auto submit至ECPay)
    $obj->CheckOut();
} catch (Exception $e) {
    echo $e->getMessage();
}
?>