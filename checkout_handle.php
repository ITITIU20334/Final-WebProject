<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

include "admin/config/config.php";

$name = $_POST['full-name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$iduser = $_SESSION['id-user'];
$total_price = $_POST['total-price'];
$note = $_POST['note'];
$email = $_POST['email'];

$pro_arr = '';

echo $name  . $address . $phone .$total_price. $note. $iduser. $email;

if(isset($_SESSION['cart'])){
    foreach ($_SESSION['cart'] as $key => $product) {
        $data .= '(Name: '.$product['model'].'x'.$product['quantity'].'x $'.$product['price'].')-';
    }
}

if($name != '' )
{
    $sql = ("INSERT INTO bills(user_id,name ,total_price, address, phone, note, date, email) values(?,?,?,?,?,?,now(),?)");
    $stm = $conn->prepare($sql);
    $stm->execute([$iduser, $name, $total_price,$address, $phone,$note, $email]);
    $id_bill = $conn->lastInsertId();
    if(isset($_SESSION['cart'])){
        foreach ($_SESSION['cart'] as $key => $product) {
            $sql = ("INSERT INTO detail_bill(id_bills,id_product,quantity,price) values(?,?,?,?)");
            $stm = $conn->prepare($sql);
            $stm->execute([$id_bill, $product['id'], $product['quantity'], $product['price']]);
            echo '
            <script>
            confirm["Order Success"];
            window.location.href="viewcart.php";
            </script>
            ';
        }
    }
}

if(isset($_POST['order-submit']))
{
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->Username   = 'tailoveco@gmail.com';                  //SMTP username
        $mail->Password   = 'inrxkhkmzzjippzi';                                //SMTP password

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //ENCRYPTION_SMTPS 465 - Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('tailoveco@gmail.com', 'Mickey Team');
        $mail->addAddress($email, 'Order Bill');     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Order Bill Confirm';

        $bodyContent = '<div>Hello, This your bill:</div>
            <div>Fullname: '.$name.'</div>
            <div>Address: '.$address.'</div>
            <div>Phone number: '.$phone.'</div>
            <div>Ordered Product: '.$data.'</div>
            <div>Total Price: '.$total_price.'</div>
            <div>Note: '.$note.'</div>
        ';

        $mail->Body = $bodyContent; 
        
        if($mail->send())
        {
            $_SESSION['status'] = true;
            header("Location: {$_SERVER["viewcart.php"]}");
            exit(0);
        }
        else
        {
            $_SESSION['status'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            header("Location: {$_SERVER["HTTP_REFERER"]}");
            exit(0);
        }
        
       
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
else
{
    header('Location: viewcart.php');
    exit(0);
}

?>