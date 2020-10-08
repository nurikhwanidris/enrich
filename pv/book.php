<?php
// require $_SERVER['DOCUMENT_ROOT'] . '/matta/include/core/sessions.php';
// require $_SERVER['DOCUMENT_ROOT'] . '/matta/include/core/link.php';
// require $_SERVER['DOCUMENT_ROOT'] . '/matta/include/core/db.php';

// //Display from package
// $packageID = $_GET['packageID'];
// $sql = "SELECT * FROM package WHERE package_id = '$packageID'";
// $result = mysqli_query($package, $sql);
// if (!$row = mysqli_fetch_assoc($result)) {
//     echo '<h3 style="text-align: center;">Something went wrong. Panggil Ikhwan</h3>';
// }

// if (isset($_GET['submit'])) {
//     $sql = "SELECT * FROM package WHERE package_id = '$packageID'";
//     $result = mysqli_query($package, $sql);
//     $row = mysqli_fetch_array($result);
//     if ($_GET['twn'] !== '') {
//         $twn = $row['package_twn'] * $_GET['twn'];
//     } elseif ($_GET['sgl']) {
//         $sgl = $row['package_sgl'] * $_GET['sgl'];
//     } elseif ($_GET['ctw']) {
//         $ctw = $row['package_ctw'] * $_GET['ctw'];
//     } elseif ($_GET['cwb']) {
//         $cwb = $row['package_cwb'] * $_GET['cwb'];
//     } elseif ($_GET['cnb']) {
//         $cnb = $row['package_ctw'] * $_GET['cnb'];
//     }
//     $kira = $twn + $sgl + $ctw + $cwb + $cnb;
// }

// $sqlBooking = "SELECT id FROM matta ORDER BY id DESC";
// $resultBooking = mysqli_query($package, $sqlBooking);
// $rowBooking = mysqli_fetch_assoc($resultBooking);
// $shit = $rowBooking['id'] + 1;
// $booking = '' . str_pad($shit, 7, '0', STR_PAD_LEFT);
// 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.rawgit.com/djibe/bootstrap-select/v1.13.0-dev/dist/css/bootstrap-select-daemonite.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
</head>

<style>
    #GrandTotal {
        border-bottom-style: solid;
        border-bottom-color: coral;
    }
</style>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/matta/include/core/head.php'; ?>
    <div class="container">
        <form action="confirm.php" method="POST">
            <input type="text" name="packageID" id="" value="<?php echo $packageID; ?>" class="d-none">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            Staff Details
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <!-- Material input -->
                                    <div class="md-form">
                                        <input value="<?php echo $_SESSION['uid'] ?>" type="text" id="StaffName" class="form-control disabled">
                                        <label for="StaffName">Staff</label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="md-form form-sm">
                                        <input type="text" name="ReceiptNo" id="ReceiptNo" class="form-control form-control-sm" required>
                                        <label for="ReceiptNo">Receipt No</label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="md-form form-sm">
                                        <input type="text" name="BookNum" id="BookNumValue" class="form-control form-control-sm disabled" onInput="BookingNumber()" value="BK<?php echo $booking; ?>">
                                        <label for="BookNumValue">Booking No.</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            Participant Details
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="md-form form-sm">
                                        <input type="text" name="ClientName" id="clientNameValue" class="form-control form-control-sm" onInput="clientName()" required>
                                        <label for="ClientName">Participant Name</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="md-form form-sm">
                                        <input type="text" name="ClientIC" id="ClientICValue" class="form-control form-control-sm" placeholder="000000-00-0000" required>
                                        <label for="ClientIC">Participant IC No.</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="md-form form-sm">
                                        <input type="text" name="ClientPhone" id="ClientPhone" class="form-control form-control-sm" required>
                                        <label for="ClientPhone">Telephone Num.</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="md-form form-sm">
                                        <input type="email" name="ClientEmail" id="ClientEmail" class="form-control form-control-sm" required>
                                        <label for="ClientEmail">Email</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="md-form form-sm">
                                        <input type="text" name="ClientAddress" id="ClientAddress" class="form-control form-control-sm">
                                        <label for="ClientAddress">Address</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="md-form form-sm">
                                        <input type="text" name="ClientCity" id="ClientCity" class="form-control form-control-sm">
                                        <label for="ClientCity">City</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="md-form form-sm">
                                        <input type="text" name="ClientState" id="ClientState" class="form-control form-control-sm">
                                        <label for="ClientState">State</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            Package Details : Part A
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="md-form form-sm">
                                        <input type="text" name="PackageName" id="PackageName" class="form-control form-control-sm disabled" value="<?php echo $row['package_name'] ?>" readonly>
                                        <label for="PackageName">Package Name</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="md-form form-sm">
                                        <input type="text" name="PackageDate" id="PackageDate" class="form-control form-control-sm disabled" value="<?php echo $row['package_date'] ?>" readonly>
                                        <label for="PackageDate">Departure Date</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="md-form form-sm">
                                        <input type="number" name="PackageAdt" id="PackageAdt" class="form-control form-control-sm" onInput="PackageADT()">
                                        <label for="PackageAdt">Adult</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="md-form form-sm">
                                        <input type="number" name="PackageWE" id="PackageWE" class="form-control form-control-sm" onInput="WargaEmas()">
                                        <label for="PackageWE">Warga Emas</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="md-form form-sm">
                                        <input type="number" name="PackageCWB" id="PackageCWB" class="form-control form-control-sm" onInput="ChildWithBed()">
                                        <label for="PackageCWB">Child with Bed</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="md-form form-sm">
                                        <input type="number" name="PackageCNB" id="PackageCNB" class="form-control form-control-sm" onInput="ChildNoBed()">
                                        <label for="PackageCNB">Child No Bed</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="md-form form-sm">
                                        <input type="number" name="PackageINF" id="PackageINF" class="form-control form-control-sm" onInput="Infant()">
                                        <label for="PackageINF">Infant</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="md-form form-sm">
                                        <input type="text" name="PackageDouble" id="PackageDouble" class="form-control form-control-sm">
                                        <label for="PackageDouble">Twin / Double</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="md-form form-sm">
                                        <input type="text" name="PackageTriple" id="PackageTriple" class="form-control form-control-sm">
                                        <label for="PackageTriple">Triple</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            Package Details : Part B
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th style="border-style: none;">&nbsp;</th>
                                                <th style="text-align: center;">Price</th>
                                                <th style="text-align: center;">Pax</th>
                                                <th style="text-align: center;">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th style="vertical-align: middle;" data-toggle="tooltip" title="RM<?php echo $row['package_twn'] ?>">Adult</th>
                                                <td style="text-align: center; width: 25%;">
                                                    <div class="md-form form-sm">
                                                        <input type="text" name="PriceADT" id="PriceADT" class="form-control form-control-sm" style="text-align: center;" onInput="totalAdult()" value="0">
                                                    </div>
                                                </td>
                                                <td style="text-align: center; width: 25%;">
                                                    <div class="md-form form-sm">
                                                        <input type="text" name="ADTpax" id="ADTpax" class="form-control form-control-sm disabled" style="text-align: center;" readonly value="0">
                                                    </div>
                                                </td>
                                                <td style="text-align: center; width: 25%;">
                                                    <div class="md-form form-sm">
                                                        <!-- <span id="TotalADT"></span> -->
                                                        <input type="text" name="TotalADT" id="TotalADT" class="form-control form-control-sm disabled" style="text-align: center;" readonly value="0">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th style="vertical-align: middle;">Warga Emas</th>
                                                <td style="text-align: center; width: 25%;">
                                                    <div class="md-form form-sm">
                                                        <input type="text" name="PriceWE" id="PriceWE" class="form-control form-control-sm" style="text-align: center;" onInput="totalWE()" value="0">
                                                    </div>
                                                </td>
                                                <td style="text-align: center; width: 25%;">
                                                    <div class="md-form form-sm">
                                                        <input type="text" name="WEpax" id="WEpax" class="form-control form-control-sm disabled" style="text-align: center;" readonly value="0">
                                                    </div>
                                                </td>
                                                <td style="text-align: center; width: 25%;">
                                                    <div class="md-form form-sm">
                                                        <input type="text" name="TotalWE" id="TotalWE" class="form-control form-control-sm disabled" style="text-align: center;" readonly value="0">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th style="vertical-align: middle;" data-toggle="tooltip" title="RM<?php echo $row['package_cwb'] ?>">Child with Bed</th>
                                                <td style="text-align: center; width: 25%;">
                                                    <div class="md-form form-sm">
                                                        <input type="text" name="PriceCWB" id="PriceCWB" class="form-control form-control-sm" style="text-align: center;" onInput="totalCWB()" value="0">
                                                    </div>
                                                </td>
                                                <td style="text-align: center; width: 25%;">
                                                    <div class="md-form form-sm">
                                                        <input type="text" name="CWBpax" id="CWBpax" class="form-control form-control-sm disabled" style="text-align: center;" readonly value="0">
                                                    </div>
                                                </td>
                                                <td style="text-align: center; width: 25%;">
                                                    <div class="md-form form-sm">
                                                        <input type="text" name="TotalCWB" id="TotalCWB" class="form-control form-control-sm disabled" style="text-align: center;" readonly value="0">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th style="vertical-align: middle;" data-toggle="tooltip" title="RM<?php echo $row['package_cnb'] ?>">Child No Bed</th>
                                                <td style="text-align: center; width: 25%;">
                                                    <div class="md-form form-sm">
                                                        <input type="text" name="PriceCNB" id="PriceCNB" class="form-control form-control-sm" style="text-align: center;" onInput="totalCNB()" value="0">
                                                    </div>
                                                </td>
                                                <td style="text-align: center; width: 25%;">
                                                    <div class="md-form form-sm">
                                                        <input type="text" name="CNBpax" id="CNBpax" class="form-control form-control-sm disabled" style="text-align: center;" readonly value="0">
                                                    </div>
                                                </td>
                                                <td style="text-align: center; width: 25%;">
                                                    <div class="md-form form-sm">
                                                        <input type="text" name="TotalCNB" id="TotalCNB" class="form-control form-control-sm disabled" style="text-align: center;" readonly value="0">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th style="vertical-align: middle;">Infant</th>
                                                <td style="text-align: center; width: 25%;">
                                                    <div class="md-form form-sm">
                                                        <input type="text" name="PriceINF" id="PriceINF" style="text-align: center;" class="form-control form-control-sm" onInput="totalINF()" value="0">
                                                    </div>
                                                </td>
                                                <td style="text-align: center; width: 25%;">
                                                    <div class="md-form form-sm">
                                                        <input type="text" name="INFpax" id="INFpax" class="form-control form-control-sm disabled" style="text-align: center;" readonly value="0">
                                                    </div>
                                                </td>
                                                <td style="text-align: center; width: 25%;">
                                                    <div class="md-form form-sm">
                                                        <input type="text" name="TotalINF" id="TotalINF" class="form-control form-control-sm disabled" style="text-align: center;" readonly value="0">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <th style="vertical-align: middle;">Booking Fee / Deposit</th>
                                                <td style="text-align: center; width: 25%;">
                                                    <div class="md-form form-sm">
                                                        <select name="BookingPrice" id="BookingPrice" class="form-control" onChange="totalPAX(); totalBook(); totalSemua(); BookPax();">
                                                            <option value="">Select</option>
                                                            <option value="500">Below RM 1999</option>
                                                            <option value="700">RM 2000 - RM 3999</option>
                                                            <option value="1000">RM 4000 - RM 5999</option>
                                                            <option value="1500">RM 6000 - RM 7999</option>
                                                            <option value="2000">RM 8000 & Above</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td style="text-align: center; width: 25%;">
                                                    <div class="md-form form-sm">
                                                        <input type="text" name="BookingPax" id="BookingPax" class="form-control form-control-sm disabled" style="text-align: center;" readonly onChange="">
                                                    </div>
                                                </td>
                                                <td style="text-align: center; width: 25%;">
                                                    <div class="md-form form-sm">
                                                        <input type="text" name="BookingTotal" id="BookingTotal" class="form-control form-control-sm disabled" style="text-align: center;">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <th colspan="3">Balance Remaining</th>
                                                <td style="text-align: center; width: 25%;">
                                                    <div class="md-form form-sm">
                                                        <input type="text" name="GrandTotal" id="GrandTotal" class="form-control form-control-sm" style="text-align: center;" readonly value="0">
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header">
                            Additional Details
                        </div>
                        <div class="card-body">
                            <div class="col-lg-12">
                                <!-- Default unchecked -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="insurance" class="custom-control-input" id="nak" onclick="insurance()" value="nakInsurance">
                                    <label class="custom-control-label" for="nak">Tick if customer agreed to buy
                                        insurance</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3" style="display:block" id="takmau">
                        <div class="card-header">
                            Indemnity Form
                        </div>
                        <div class="card-body">
                            <div class="col-lg-12 text-justify mb-2">
                                I, <span style="text-decoration: underline; font-weight: bold;" id="clientNameOutput">John Doe</span> (Booking
                                Num. <span style="text-decoration: underline; font-weight: bold;" id="BookNumOutput">BK<?php echo $booking; ?></span>)
                                representing <span style="text-decoration: underline; font-weight: bold;" id="Pax">0</span>
                                individuals agreed that representatives from Wan Vacation Sdn Bhd (KPL 6811)(891404-D)
                                already informed and offered me about the travel insurance and I declined to accept the
                                offer
                            </div>
                            <div class="col-lg-12 text-justify mb-2">
                                I agreed to not blame Wan Vacation Sdn Bhd (KPL 6811)(891404-D) as the resposible party
                                for the event of failure and inability to inform me in regards of Travel Insuance for my
                                trip abroad.
                            </div>
                            <div class="col-lg-12 text-justify mb-2">
                                I also agreed not to put Wan Vacation Sdn Bhd (KPL 6811)(891404-D) as the responsible
                                party in any arising unexpected problem(s) or occurance(s) due to the absence of travel
                                insurance during my trip abroad.
                            </div>
                        </div>
                    </div>
                    <button type="reset" class="float-right btn btn-danger">Reset</button>
                    <button type="submit" class="float-right btn btn-success" target>Submit</button>
                </div>
            </div>
        </form>
    </div>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/matta/include/core/foot.php'; ?>
</body>

<script>
    $('input[type=text], input[type=password], input[type=email], input[type=url], input[type=tel], input[type=number], input[type=search], input[type=date], input[type=time], textarea')
        .each(function(element, i) {
            if ((element.value !== undefined && element.value.length > 0) || $(this).attr('placeholder') !== null) {
                $(this).siblings('label').addClass('active');
            } else {
                $(this).siblings('label').removeClass('active');
            }
        });
</script>

<script>
    function insurance() {
        // Get the checkbox
        var checkBox = document.getElementById("nak");
        // Get the output text
        var takmau = document.getElementById("takmau");

        // If the checkbox is checked, display the output text
        if (checkBox.checked == true) {
            takmau.style.display = "none";
        } else {
            takmau.style.display = "block";
        }
    }
</script>

<script>
    function clientName() {
        var clientNameValue = document.getElementById("clientNameValue");
        var s = clientNameValue.value;

        var clientNameOutput = document.getElementById("clientNameOutput");
        clientNameOutput.innerText = s;
    }

    function BookingNumber() {
        var BookNumValue = document.getElementById("BookNumValue");
        var ss = BookNumValue.value;

        var BookNumOutput = document.getElementById("BookNumOutput");
        BookNumOutput.innerText = ss;
    }

    function PackageADT() {
        var value = $("#PackageAdt").val();
        var fields = $("#ADTpax");
        fields.each(function(i) {
            $(this).val(value);
        });
    }

    function BookPax() {
        var BookingPax = document.getElementById("BookingPax");
        var sss = BookingPax.value;

        var Pax = document.getElementById("Pax");
        Pax.innerText = sss;
    }

    function WargaEmas() {
        var value = $("#PackageWE").val();
        var fields = $("#WEpax");
        fields.each(function(i) {
            $(this).val(value);
        });
    }

    function ChildWithBed() {
        var value = $("#PackageCWB").val();
        var fields = $("#CWBpax");
        fields.each(function(i) {
            $(this).val(value);
        });
    }

    function ChildNoBed() {
        var value = $("#PackageCNB").val();
        var fields = $("#CNBpax");
        fields.each(function(i) {
            $(this).val(value);
        });
    }

    function Infant() {
        var value = $("#PackageINF").val();
        var fields = $("#INFpax");
        fields.each(function(i) {
            $(this).val(value);
        });
    }

    function totalAdult() {
        $('#TotalADT').val(
            parseFloat($('#PriceADT').val(), 10) * parseFloat($("#ADTpax").val(), 10)
        );
    }

    function totalWE() {
        $('#TotalWE').val(
            parseFloat($('#PriceWE').val(), 10) * parseFloat($("#WEpax").val(), 10)
        );
    }

    function totalCWB() {
        $('#TotalCWB').val(
            parseFloat($('#PriceCWB').val(), 10) * parseFloat($("#CWBpax").val(), 10)
        );
    }

    function totalCNB() {
        $('#TotalCNB').val(
            parseFloat($('#PriceCNB').val(), 10) * parseFloat($("#CNBpax").val(), 10)
        );
    }

    function totalINF() {
        $('#TotalINF').val(
            parseFloat($('#PriceINF').val(), 10) * parseFloat($("#INFpax").val(), 10)
        );
    }

    function totalPAX() {
        $('#BookingPax').val(
            parseFloat($('#ADTpax').val(), 10) + parseFloat($("#WEpax").val(), 10) + parseFloat($("#CWBpax").val(),
                10) + parseFloat($("#CNBpax").val(), 10) + parseFloat($("#INFpax").val(), 10)
        );
    }

    function totalBook() {
        $('#BookingTotal').val(
            parseFloat($('#BookingPrice').val(), 10) * parseFloat($("#BookingPax").val(), 10)
        );
    }

    function totalSemua() {
        var TotalADT = $('#TotalADT').val();
        var TotalWE = $('#TotalWE').val();
        var TotalCWB = $('#TotalCWB').val();
        var TotalCNB = $('#TotalCNB').val();
        var TotalINF = $('#TotalINF').val();
        var GrandTotal = $('#GrandTotal').val();
        var BookingTotal = $('#BookingTotal').val();
        if (TotalADT != '' || TotalWE != '' || TotalCWB != '' || TotalCNB != '' || TotalINF != '') {
            $('#GrandTotal').val(
                parseFloat(TotalADT) + parseFloat(TotalWE) + parseFloat(TotalCWB) + parseFloat(TotalCNB) + parseFloat(TotalINF) - parseFloat(BookingTotal)
            );
        }
    }

    $("#ClientPhone").keyup(function() {
        var prefix = "+60"
        if (this.value.indexOf(prefix) !== 0) {
            this.value = prefix + this.value;
        }
    });
</script>



</html>