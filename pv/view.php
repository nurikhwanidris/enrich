<!-- Get DB Conn -->
<?php include('../include/core/db/dbcon.php') ?>

<!-- Title -->
<?php $title = "View Payment Voucher" ?>


<!-- Display PV details from database -->
<?php

$SerialNum = $_GET['PV'];
// Get from main PV table
$sql = "SELECT * FROM pv WHERE SerialNum ='$SerialNum'";
$result = mysqli_query($conn, $sql);
$rowPV = mysqli_fetch_assoc($result);

// Get from PV item table
$sqlItem = "SELECT * FROM pv_items WHERE pv_id = '$SerialNum' ";
$resultItem = mysqli_query($conn, $sqlItem);
$rowPVitem = mysqli_fetch_assoc($resultItem);

?>

<!-- Header -->
<?php include('../include/assets/templates/header.php') ?>
<style>
    .topright {
        position: absolute;
        top: 8px;
        right: 16px;
        font-size: 18px;
    }
</style>
<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- JQuery UI -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<!-- Navigation -->
<?php include('../include/assets/templates/nav.php') ?>

<!-- Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12" style="position: relative;">
            <div class="text-center my-3">
                <img src="/enrich/include/assets/img/logo-black.png" alt="" srcset="">
                <div class="topright text-right">
                    <strong>
                        <?= $rowPV['SerialNum']; ?><br><?= $rowPV['ReferenceNum']; ?>
                    </strong>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center">
        <h3><strong>Payment Voucher</strong></h3>
    </div>
    <div class="row">
        <table class="table">
            <tr>aa
                <th>Payment Option</th>
                <td>:</td>
                <td><?= $rowPV['PaymentOption']; ?></td>
            </tr>
            <tr>
                <th>Pay to</th>
                <td>:</td>
                <td><?= $rowPV['PayTo']; ?></td>
            </tr>
            <tr>
                <th>Bank Name</th>
                <td>:</td>
                <td><?= $rowPV['BankName']; ?></td>
            </tr>
            <tr>
                <th>Account Number</th>
                <td>:</td>
                <td><?= $rowPV['AccNumber']; ?></td>
            </tr>
        </table>
    </div>
</div>


<!-- Footer -->
<?php include('../include/assets/templates/footer.php') ?>

<!-- Space between account numbers -->
<!-- <script>
    document.getElementById('AccNumber').addEventListener('input', function(e) {
        e.target.value = e.target.value.replace(/[^\dA-Z]/g, '').replace(/(.{4})/g, '$1 ').trim();
    });
</script> -->

<!-- Calculator -->
<!-- <script>
    function totalSemua() {
        var Item1Total = $('#Item1Total').val();
        var Item2Total = $('#Item2Total').val();
        var Item3Total = $('#Item3Total').val();
        var Item4Total = $('#Item4Total').val();
        var GrandTotal = $('#GrandTotal').val();
        if (Item1Total != '' || Item2Total != '' || Item3Total != '' || Item4Total != '') {
            $('#GrandTotal').val(
                parseFloat(Item1Total) + parseFloat(Item2Total) + parseFloat(Item3Total) + parseFloat(Item4Total)
            );
        }
    }
</script> -->

<!-- Type of Payment -->
<!-- <script>
    $(function() {
        $('#onlineTransfer').hide();
        $('#cheque').hide();
        $('#cash').hide();
        $('#selectPayment').change(function() {
            if ($('#selectPayment').val() == 'Online Transfer') {
                $('#onlineTransfer').show();
            } else {
                $('#onlineTransfer').hide();
            }
            if ($('#selectPayment').val() == 'Cheque') {
                $('#cheque').show();
            } else {
                $('#cheque').hide();
            }
            if ($('#selectPayment').val() == 'Cash') {
                $('#cash').show();
            } else {
                $('#cash').hide();
            }
        });
    });
</script> -->

<!-- Footer -->
<?php include('../include/assets/templates/footer.php') ?>