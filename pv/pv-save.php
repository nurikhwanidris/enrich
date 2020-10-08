<?php

// error_reporting(E_ALL);

require $_SERVER['DOCUMENT_ROOT'] . '/enrich/include/core/db/dbcon.php';


// Get pay to who from create PV
$SerialNum = $_POST['SerialNum'];
$ReferenceNum = $_POST['ReferenceNum'];
$PaymentOption = $_POST['PaymentOption'];
$OnlinePayTo = $_POST['OnlinePayTo'];
$BankName = $_POST['BankName'];
$ChequePayTo = $_POST['ChequePayTo'];
$ChequeBank = $_POST['ChequeBank'];
$ChequeAccount = $_POST['ChequeAccount'];
$CashPayTo = $_POST['CashPayTo'];
$CashIC = $_POST['CashIC'];

// Get Item details
$Item1Desc = $_POST['Item1Desc'];
$Item1Total = $_POST['Item1Total'];
$Item2Desc = $_POST['Item2Desc'];
$Item2Total = $_POST['Item2Total'];
$Item3Desc = $_POST['Item3Desc'];
$Item3Total = $_POST['Item3Total'];
$Item4Desc = $_POST['Item4Desc'];
$Item4Total = $_POST['Item4Total'];
$GrandTotal = $_POST['GrandTotal'];


// Check if PV number already exists
$check = "SELECT SerialNum from PV WHERE SerialNum ='$SerialNum'";
$result = mysqli_query($conn, $check);
if (mysqli_num_rows($result) > 1) {
    echo $SerialNum . " dah wujud";
} else {
    // Insert into database
    $PV = "INSERT INTO pv (SerialNum, ReferenceNum, PaymentOption, OnlinePayTo, BankName, ChequePayTo, ChequeBank, ChequeAccount, CashPayTo, CashIC) VALUES('$SerialNum','$ReferenceNum','$PaymentOption','$OnlinePayTo','$BankName','$ChequePayTo','$ChequeBank','$ChequeAccount','$CashPayTo','$CashIC')";

    $PV_items = "INSERT INTO pv_items (pv_id, Item1Desc, Item1Total, Item2Desc, Item2Total, Item3Desc, Item3Total, Item4Desc, Item4Total, GrandTotal) VALUES ('$SerialNum','$Item1Desc','$Item1Total','$Item2Desc','$Item2Total','$Item3Desc','$Item3Total','$Item4Desc','$Item4Total','$GrandTotal')";

    if ($result = mysqli_query($conn, $PV) && $resultPV = mysqli_query($conn, $PV_items)) {
        echo "Berjaya insert ke database.";
        echo "
            <script>
                location.href = 'add?notify=1&PV=" . $SerialNum . "';
            </script>
        ";
    } else {
        echo "Error woi " . mysqli_error($conn) . " Panggil Ikhwan";
    }
}
