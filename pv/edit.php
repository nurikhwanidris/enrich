<!-- DB Conn -->
<?php include('../include/core/db/dbcon.php') ?>

<!-- Title -->
<?php $title = "Edit Payment Voucher" ?>

<!-- Display All Data -->
<?php
// Get data from PV table
$pv = $_GET['PV'];
$sql = "SELECT * FROM PV WHERE SerialNum = '$pv'";
$result = mysqli_query($conn, $sql);
$rowPV = mysqli_fetch_assoc($result);

// Get data from PV Items
$sqlItem = "SELECT * FROM pv_items WHERE pv_id = '$pv'";
$resultItem = mysqli_query($conn, $sqlItem);
$rowPVItem = mysqli_fetch_assoc($resultItem);

?>

<!-- Header -->
<?php include('../include/assets/templates/header.php') ?>

<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- JQuery UI -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<!-- Navigation -->
<?php include('../include/assets/templates/nav.php') ?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <form action="pv-save.php" method="POST">
                <?php
                if (isset($_GET['notify'])) {
                    $pv = $_GET['PV'];
                    echo '
                    <div class="alert alert-success alert-dismissible fade show my-4" role="alert">
                    <strong>' . $pv . ' berjaya disimpan</strong> Klik <a href="view?PV=' . $pv . '">sini</a> untuk preview
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                ';
                }
                ?>
                <h4 class="my-4">Add New Payment Voucher</h4>
                <div class="card mb-4">
                    <div class="card-header">
                        Voucher Details
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="md-form">
                                    <input value="<?= $rowPV['SerialNum'] ?>" type="text" name="SerialNum" id="SerialNum" class="form-control disabled">
                                    <label for="SerialNum">Serial Number</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="md-form form-sm">
                                    <input type="text" name="ReferenceNum" id="ReferenceNum" class="form-control form-control-sm" value="<?= $rowPV['ReferenceNum'] ?>">
                                    <label for="ReferenceNum">Reference Number</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        Payment Details
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="md-form form-sm">
                                    <select name="PaymentOption" id="selectPayment" class="browser-default custom-select">
                                        <option value="">Select</option>
                                        <option value="Cash" <?php if ($rowPV['PaymentOption'] == 'Cash') {
                                                                    echo "selected";
                                                                } ?>>Cash</option>
                                        <option value="Cheque" <?php if ($rowPV['PaymentOption'] == 'Cheque') {
                                                                    echo "selected";
                                                                } ?>>Cheque</option>
                                        <option value="Online Transfer" <?php if ($rowPV['PaymentOption'] == 'Online Transfer') {
                                                                            echo "selected";
                                                                        } ?>>Online Transfer</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- Online Transfer -->
                        <div class="row" id="onlineTransfer">
                            <div class="col-lg-4">
                                <div class="md-form form-sm">
                                    <input type="text" name="OnlinePayTo" id="OnlinePayToValue" class="form-control form-control-sm" onInput="OnlinePayTo()" value="<?= $rowPV['OnlinePayTo']; ?>">
                                    <label for="OnlinePayTo">Pay to</label>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="md-form form-sm">
                                    <input type="text" name="BankName" id="BankNameValue" class="form-control form-control-sm" onInput="BankName()" <?= $rowPV['BankName']; ?>>
                                    <label for="BankName">Bank Name</label>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="md-form form-sm">
                                    <input type="text" name="AccNumber" id="AccNumber" class="form-control form-control-sm" onInput="AccNumber()" value="<?= $rowPV['AccNumber']; ?>">
                                    <label for="AccNumber">Account Number</label>
                                </div>
                            </div>
                        </div>
                        <!-- Cheque -->
                        <div class="row" id="cheque">
                            <div class="col-lg-4">
                                <div class="md-form form-sm">
                                    <input type="text" name="ChequePayTo" id="" class="form-control form-control-sm" value="<?= $rowPV['ChequePayTo']; ?>">
                                    <label for="onlinePayTo">Pay to</label>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="md-form form-sm">
                                    <input type="text" name="ChequeBank" id="" class="form-control form-control-sm" value="<?= $rowPV['ChequeBank']; ?>">
                                    <label for="ChequeBank">Bank Name (Cheque)</label>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="md-form form-sm">
                                    <input type="text" name="ChequeAccount" id="" class="form-control form-control-sm" value="<?= $rowPV['ChequeAccount']; ?>">
                                    <label for="ChequeAccount">Account Number</label>
                                </div>
                            </div>
                        </div>
                        <!-- Cash -->
                        <div class="row" id="cash">
                            <div class="col-lg-6">
                                <div class="md-form form-sm">
                                    <input type="text" name="CashPayTo" id="CashPayTo" class="form-control form-control-sm" value="<?= $rowPV['CashPayTo']; ?>">
                                    <label for="CashPayTo">Pay to</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="md-form form-sm">
                                    <input type="text" name="CashIC" id=CashIC" class="form-control form-control-sm" value="<?= $rowPV['CashIC']; ?>">
                                    <label for="CashIC">IC / Passport No</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        Items Description
                    </div>
                    <div class="card-body">
                        <div id="table" class="table-editable">
                            <table class="table table-responsive-md table-borderless text-center align-middle">
                                <thead class="table-dark">
                                    <tr>
                                        <th class="text-left">Item Description</th>
                                        <th class="text-center">Total / RM</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="pt-3-half" style="width: 70%;">
                                            <div class="md-form">
                                                <input type="text" name="Item1Desc" id="form1" class="form-control" value="<?= $rowPVItem['Item1Desc']; ?>">
                                            </div>
                                        </td>
                                        <td class="pt-3-half" style="width: 30%;">
                                            <div class="md-form">
                                                <input type="text" id="Item1Total" class="form-control text-center" name="Item1Total" value="<?= $rowPVItem['Item1Total']; ?>" onchange="totalSemua();">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pt-3-half" style="width: 70%;">
                                            <div class="md-form">
                                                <input type="text" id="form1" class="form-control" name="Item2Desc" value="<?= $rowPVItem['Item2Desc']; ?>">
                                            </div>
                                        </td>
                                        <td class="pt-3-half" style="width: 30%;">
                                            <div class="md-form">
                                                <input type="text" id="Item2Total" class="form-control text-center" name="Item2Total" value="<?= $rowPVItem['Item2Total']; ?>" onchange="totalSemua();">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pt-3-half" style="width: 70%;">
                                            <div class="md-form">
                                                <input type="text" id="form1" class="form-control" name="Item3Desc" value="<?= $rowPVItem['Item3Desc']; ?>">
                                            </div>
                                        </td>
                                        <td class="pt-3-half" style="width: 30%;">
                                            <div class="md-form">
                                                <input type="text" id="Item3Total" class="form-control text-center" name="Item3Total" value="<?= $rowPVItem['Item3Total']; ?>" onchange="totalSemua();">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pt-3-half" style="width: 70%;">
                                            <div class="md-form">
                                                <input type="text" id="form1" name="Item4Desc" class="form-control" value="<?= $rowPVItem['Item4Desc']; ?>">
                                            </div>
                                        </td>
                                        <td class="pt-3-half" style="width: 30%;">
                                            <div class="md-form">
                                                <input type="text" id="Item4Total" class="form-control text-center" name="Item4Total" value="<?= $rowPVItem['Item4Total']; ?>" onchange="totalSemua();">
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td class="text-center" style="vertical-align: middle;"><strong>Grand
                                                Total</strong></td>
                                        <td>
                                            <div class="md-form">
                                                <input style="border-bottom: 3px double;" type="text" id="GrandTotal" class="form-control text-center" name="GrandTotal" value="<?= $rowPVItem['GrandTotal']; ?>">
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="text-center py-4">
                    <button name="save" class="btn btn-success" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Space between account numbers -->
<script>
    document.getElementById('AccNumber').addEventListener('input', function(e) {
        e.target.value = e.target.value.replace(/[^\dA-Z]/g, '').replace(/(.{4})/g, '$1 ').trim();
    });
</script>

<!-- Calculator -->
<script>
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
</script>

<!-- Type of Payment -->
<script>
    $(function() {
        $('#onlineTransfer') <?php if ($rowPV['PaymentOption'] == 'Online Transfer') {
                                    echo ".show()";
                                } else {
                                    echo ".hide()";
                                } ?>;
        $('#cheque') <?php if ($rowPV['PaymentOption'] == 'Cheque') {
                            echo ".show()";
                        } else {
                            echo ".hide()";
                        } ?>;
        $('#cash') <?php if ($rowPV['PaymentOption'] == 'Cash') {
                        echo ".show()";
                    } else {
                        echo ".hide()";
                    } ?>;
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
</script>

<!-- Footer -->
<?php include('../include/assets/templates/footer.php') ?>