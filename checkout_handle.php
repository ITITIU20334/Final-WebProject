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

function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

if (!isValidEmail($email)) {
    $_SESSION['error'] = "Email is in wrong format! Please check again.";
    header("Location: index.php");
    exit(0);
}

if ($name != '') {
    $sql = "INSERT INTO bills(user_id, name, total_price, address, phone, note, date, email) VALUES (?, ?, ?, ?, ?, ?, now(), ?)";
    $stm = $conn->prepare($sql);
    $stm->execute([$iduser, $name, $total_price, $address, $phone, $note, $email]);
    $id_bill = $conn->lastInsertId();

    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $product) {
            $sql = "INSERT INTO detail_bill(id_bills, id_product, quantity, price) VALUES (?, ?, ?, ?)";
            $stm = $conn->prepare($sql);
            $stm->execute([$id_bill, $product['id'], $product['quantity'], $product['price']]);
        }
    }
}

if (isset($_POST['order-submit'])) {
    // Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';

    try {
        // Server settings
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = 'smtp.gmail.com';
        $mail->Username = 'tailoveco@gmail.com';
        $mail->Password = 'inrxkhkmzzjippzi';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('tailoveco@gmail.com', 'Mickey Team');
        $mail->addAddress($email, 'Order Bill');

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Order Bill Confirm';

        $bodyContent = "<h4>Thank you, {$name}, for placing an order with us!</h4>";
        $bodyContent .= "<h4>Order ID: {$id_bill}</h4>";
        $bodyContent .= "<h4>Order includes:</h4>";

        foreach ($_SESSION['cart'] as $key => $val) {
            $bodyContent .= "<ul style='border:1px solid blue; margin:10px;'>
                        <li> Product Name: {$val['model']}</li>
                        <li> Product ID: {$val['id']}</li>
                        <li> Price: \${$val['price']}</li>
                        <li> Quantity: {$val['quantity']}</li>
                    </ul>";
        }

        $bodyContent .= "<h4>Total Order Value: \${$total_price}</h4>";
        $bodyContent .= "<h4>Order Notes: {$note}</h4>";

        $mail->Body = $bodyContent;

        if ($mail->send()) {
            $_SESSION['status'] = true;
            header("Location: viewcart.php");
            exit(0);
        } else {
            $_SESSION['status'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit(0);
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    header('Location: viewcart.php');
    exit(0);
}
?>
