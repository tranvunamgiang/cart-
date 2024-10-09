<?php 
session_start();
require_once("./functions/dbp.php");
require_once("./functions/cart.php");
require_once("./functions/paypal.php");
$customer_name = $_POST["customer_name"];
$email = $_POST["email"];
$telephone = $_POST["telephone"];
$shipping_address = $_POST["shipping_address"];
$payment_method = $_POST["payment_method"];


$items = getCartItems();
if(count($items) == 0){
    header("Location: cart.php");
    die();
}
$grand_total = 0;
foreach($items as $item){
    $grand_total += $item["price"] * $item["buy_qty"];
}
$now= date("Y-m-d H:i:s");
$sql = "insert into orders(
                created_at,
                grand_total,
                paid,
                payment_method,
                shipping_address,
                customer_name,
                email,
                telephone,
                status
                
                ) VALUES(
                    '$now',
                    $grand_total,
                    0,
                    '$payment_method',
                    '$shipping_address',
                    '$customer_name',
                    '$email',
                    '$telephone',
                    0
                    
                )";
$order_id = insert($sql);
if($order_id != null){
    foreach($items as $item){
        $product_id = $item["id"];
        $buy_qty = $item["buy_qty"];
        $price = $item["price"];
        $sql = "insert into order_items(order_id,product_id,buy_qty,price)
             VALUES($order_id,$product_id, $buy_qty,$price);";
        insert($sql);
        $sql_update = "update products set qty=qty-$buy_qty where id=$product_id"; // tru di so hang hoa da duoc dat trong csdl
        update($sql_update);     
    }
    // $_SESSION("cart") = null;
    // send email to customer
    $from_email = "tranvunamgiang98@gmail.com";
    $headers = "From: $from_email";
    $subject = "Thông tin đơn hàng #$order_id";
    $message = file_get_contents("./mail/order_template.php");
    mail($email, $subject,$message,$headers);




    if($payment_method =="PAYPAL"){
        // thong tin tai khoan paypal
        $client_id = "ASG7H0EDPdEvgQR0iF2QIp9iuyCpGB7UR9KUTxmenTSJ7-WLF21hV1kY4LGEe0w7m88skuTg8kuSkvnp";
        $client_secret= "EEmNnUUnG_ChacxJsnCNQzB4b29zZOxTTFX0tRM2Kqu9bpUpiQbqEfzRh5KCWO62arb41z3HcXhDD14j";

        // url nhan ket qua 
        $success_url = "http://localhost:8888/success_paypal.php?order_id=$order_id";
        $fail_url = "http://localhost:8888/fail_paypal.php?order_id=$order_id";

        // kiem tra tai khoan paypal va lay access token
        $access_token = get_access_token($client_id , $client_secret);

        // neu access token ok thi tao thanh toan
        $payment= create_payment($access_token , $success_url , $fail_url , $grand_total);

        // chuyen khach hang sang trang thanh toan cua paypal 
        header("Location:".$payment['links']['1']['href']);
    }
    header("Location: /thankyou.php");
    die();
}
header("Location: /checkout.php");