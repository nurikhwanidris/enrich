<!-- Get DB Conn -->
<?php include('../include/core/db/dbcon.php') ?>

<!-- Title -->
<?php $title = "Payment Voucher" ?>

<!-- Display All Data -->
<?php
// Get Data from PV
$sql = "SELECT pv.SerialNum, pv.PaymentOption, pv.OnlinePayTo, pv.AccNumber, pv.BankName, pv.ChequePayTo, pv.ChequeBank, pv.ChequeAccount, pv.CashPayTo, pv.CashIC, pv_items.GrandTotal FROM pv_items, pv GROUP BY pv.SerialNum ORDER BY pv.id DESC";
$result = mysqli_query($conn, $sql);
?>

<!-- Header -->
<?php include('../include/assets/templates/header.php') ?>


<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- JQuery UI -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<!-- Datatable Script -->
<script src="/enrich/include/assets/js/addons/datatables.min.js"></script>

<!-- Navigation -->
<?php include('../include/assets/templates/nav.php') ?>

<!-- Datatable CSS -->
<link rel="stylesheet" href="/enrich/include/assets/css/addons/datatables.min.css">

<!-- Content -->
<div class="container">
    <div class="row" style="background-color:cadetblue;">
        <h3 class="m-3 text-white">Manage your PV here</h3>
    </div>
    <div class="col-md-12">
        <div class="row my-2">
            <div class="col-md-2">
                <a href="../pv/add"><button class="btn btn-primary">+ Add New</button></a>
            </div>
            <div class="col-md-4">
                <button class="btn btn-secondary">All</button>
                <button class="btn btn-secondary">New</button>
            </div>
        </div>
        <div class="my-3">
            <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>PV Ref Num</th>
                        <th>Pay to</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php while ($rowPV = mysqli_fetch_array($result)) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><a href="view?PV=<?= $rowPV['SerialNum']; ?>"><?= $rowPV['SerialNum']; ?></a></td>
                            <td>
                                <?php
                                if ($rowPV['OnlinePayTo']) {
                                    echo $rowPV['OnlinePayTo'];
                                } elseif ($rowPV['ChequePayTo']) {
                                    echo $rowPV['ChequePayTo'];
                                } elseif ($rowPV['CashPayTo']) {
                                    echo $rowPV['CashPayTo'];
                                }
                                ?>
                            </td>
                            <td>2,800.00</td>
                            <td><a href="#">Print</a>&nbsp;<a href="#">Edit</a>&nbsp;<a href="#">Delete</a></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#dtBasicExample').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });
</script>

<!-- Footer -->
<?php include('../include/assets/templates/footer.php') ?>