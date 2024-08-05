<?php
ob_start();
session_start();
include("admin/inc/config.php");
include("admin/inc/functions.php");
include("admin/inc/CSRF_Protect.php");

?>

<?php

if (isset($_POST['form1'])) {

    $valid = 1;

    if(empty($_POST['cust_name'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_123."<br>";
    }

    if(empty($_POST['cust_email'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_131."<br>";
    } 
    // else {
    //     if (filter_var($_POST['cust_email'], FILTER_VALIDATE_EMAIL) === false) {
    //         $valid = 0;
    //         $error_message .= LANG_VALUE_134."<br>";
    //     } else {
    //         $statement = $pdo->prepare("SELECT * FROM tbl_customer WHERE cust_email=?");
    //         $statement->execute(array($_POST['cust_email']));
    //         $total = $statement->rowCount();                            
    //         if($total) {
    //             $valid = 0;
    //             $error_message .= LANG_VALUE_147."<br>";
    //         }
    //     }
    // }

    if(empty($_POST['cust_phone'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_124."<br>";
    }

    if(empty($_POST['cust_address'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_125."<br>";
    }

    if(empty($_POST['cust_country'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_126."<br>";
    }

    if(empty($_POST['cust_city'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_127."<br>";
    }

    if(empty($_POST['cust_state'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_128."<br>";
    }

    if(empty($_POST['cust_zip'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_129."<br>";
    }

    if( empty($_POST['cust_password']) || empty($_POST['cust_re_password']) ) {
        $valid = 0;
        $error_message .= LANG_VALUE_138."<br>";
    }

    if( !empty($_POST['cust_password']) && !empty($_POST['cust_re_password']) ) {
        if($_POST['cust_password'] != $_POST['cust_re_password']) {
            $valid = 0;
            $error_message .= LANG_VALUE_139."<br>";
        }
    }

    if($valid == 1) {

        // echo $token = md5(time());
        // echo $cust_datetime = date('Y-m-d h:i:s');
        // echo $cust_timestamp = time();

        // echo md5($_POST['cust_password']);
        // echo $token;
        // echo $cust_datetime;
        // echo $cust_timestamp;

        // echo $_POST['cust_name'];
        // echo $_POST['cust_cname'];
        // echo $_POST['cust_email'];
        // echo $_POST['cust_phone'];
        // echo $_POST['cust_country'];
        // echo $_POST['cust_address'];
        // echo $_POST['cust_city'];
        // echo $_POST['cust_state'];
        // echo $_POST['cust_zip'];

        // die;

        $cust_name=$_POST['cust_name'];
        $cust_cname=$_POST['cust_cname'];
        $cust_email=$_POST['cust_email'];
        $cust_phone=$_POST['cust_phone'];
        $cust_country=$_POST['cust_country'];
        $cust_address=$_POST['cust_address'];
        $cust_city=$_POST['cust_city'];
        $cust_state=$_POST['cust_state'];
        $cust_zip=$_POST['cust_zip'];
        $md5=md5($_POST['cust_password']);

        // echo $cust_name;
        // echo $cust_cname;
        // echo $cust_email;
        // echo $cust_phone;
        // echo $cust_country;
        // echo $cust_address;
        // echo $cust_city;
        // echo $cust_state;
        // echo $cust_zip;
        // echo $md5;

        // saving into the database
        $sql = "INSERT INTO `ecommerceweb`.`tbl_customer` (cust_name,cust_cname,cust_email,cust_phone,cust_country,cust_address,cust_city,cust_state,cust_zip,cust_b_name,cust_b_cname,cust_b_phone,cust_b_country,cust_b_address,cust_b_city) VALUES ('$cust_name','$cust_cname','$cust_email','$cust_phone','$cust_country','$cust_address','$cust_city','$cust_state','$cust_zip','','','','','','')";

        
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "Data inserted successfully.";
        } else {
            echo "Error: Unable to insert data. Please try again later. Error Message: " . mysqli_error($conn);
        }

        die;


//         // Send email for confirmation of the account
//         $to = $_POST['cust_email'];
        
//         $subject = LANG_VALUE_150;
//         $verify_link = BASE_URL.'verify.php?email='.$to.'&token='.$token;
//         $message = '
// '.LANG_VALUE_151.'<br><br>

// <a href="'.$verify_link.'">'.$verify_link.'</a>';

//         $headers = "From: noreply@" . BASE_URL . "\r\n" .
//                    "Reply-To: noreply@" . BASE_URL . "\r\n" .
//                    "X-Mailer: PHP/" . phpversion() . "\r\n" . 
//                    "MIME-Version: 1.0\r\n" . 
//                    "Content-Type: text/html; charset=ISO-8859-1\r\n";
        
//         // Sending Email
//         mail($to, $subject, $message, $headers);

        // unset($_POST['cust_name']);
        // unset($_POST['cust_cname']);
        // unset($_POST['cust_email']);
        // unset($_POST['cust_phone']);
        // unset($_POST['cust_address']);
        // unset($_POST['cust_city']);
        // unset($_POST['cust_state']);
        // unset($_POST['cust_zip']);

        // $success_message = LANG_VALUE_152;
    }
}
?>