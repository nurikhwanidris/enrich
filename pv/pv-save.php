<?php

// error_reporting(E_ALL);

require $_SERVER['DOCUMENT_ROOT'] . '/enrich/include/core/db/dbcon.php';


if (isset($_POST['submit'])) {
    // Get pay to who from create PV
    $SerialNum = $_POST['SerialNum'];
    $ReferenceNum = $_POST['ReferenceNum'];
    $PaymentOption = $_POST['PaymentOption'];
    $OnlinePayTo = $_POST['OnlinePayTo'];
    $AccNumber = $_POST['AccNumber'];
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
    $CreatedAt = date('Y-m-d h:i:sa');


    // Check if PV number already exists
    $check = "SELECT SerialNum from PV WHERE SerialNum ='$SerialNum'";
    $result = mysqli_query($conn, $check);
    if (mysqli_num_rows($result) > 1) {
        echo $SerialNum . " dah wujud";
    } else {
        // Insert into database
        $PV = "INSERT INTO pv (SerialNum, ReferenceNum, PaymentOption, OnlinePayTo, AccNumber, BankName, ChequePayTo, ChequeBank, ChequeAccount, CashPayTo, CashIC,CreatedAt) VALUES('$SerialNum','$ReferenceNum','$PaymentOption','$OnlinePayTo','$AccNumber','$BankName','$ChequePayTo','$ChequeBank','$ChequeAccount','$CashPayTo','$CashIC','$CreatedAt')";

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
}

if (isset($_POST['save'])) {
    // Get pay to who from create PV
    $SerialNum = $_POST['SerialNum'];
    $ReferenceNum = $_POST['ReferenceNum'];
    $PaymentOption = $_POST['PaymentOption'];
    $OnlinePayTo = $_POST['OnlinePayTo'];
    $AccNumber = $_POST['AccNumber'];
    $BankName = $_POST['BankName'];
    $ChequePayTo = $_POST['ChequePayTo'];
    $ChequeBank = $_POST['ChequeBank'];
    $ChequeAccount = $_POST['ChequeAccount'];
    $CashPayTo = $_POST['CashPayTo'];
    $CashIC = $_POST['CashIC'];
    $ModifiedAt = date('Y-m-d h:i:sa');

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

    $PV = "UPDATE pv SET 
    ReferenceNum = '$ReferenceNum',
    PaymentOption = '$PaymentOption',
    OnlinePayTo = '$OnlinePayTo',
    AccNumber = '$AccNumber',
    BankName = '$BankName',
    ChequePayTo = '$ChequePayTo',
    ChequeBank = '$ChequeBank',
    ChequeAccount = '$ChequeAccount',
    CashPayTo = '$CashPayTo',
    CashIC = '$CashIC',
    ModifiedAt = '$ModifiedAt'
    WHERE SerialNum = '$SerialNum'
    ";

    $PVitems = "UPDATE pv_items SET
    Item1Desc = '$Item1Desc',
    Item1Total = '$Item1Total',
    Item2Desc = '$Item2Desc',
    Item2Total = '$Item2Total',
    Item3Desc = '$Item3Desc',
    Item3Total = '$Item3Total',
    Item4Desc = '$Item4Desc',
    Item4Total = '$Item4Total',
    GrandTotal = '$GrandTotal'
     WHERE pv_id = '$SerialNum'
    ";

    if ($result = mysqli_query($conn, $PV) && $resultPV = mysqli_query($conn, $PVitems)) {
        echo "
            <script>
                location.href = 'edit?notify=1&PV=" . $SerialNum . "';
            </script>
        ";
    } else {
        echo "Error woi " . mysqli_error($conn) . " Panggil Ikhwan";
    }
}
