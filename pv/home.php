<!-- Get DB Conn -->
<?php include('../include/core/db/dbcon.php') ?>

<!-- Title -->
<?php $title = "Payment Voucher" ?>

<!-- Display All Data -->
<?php
// Get Data from PV
$sql = "SELECT * FROM pv INNER JOIN pv_items ON pv.SerialNum = pv_items.pv_id GROUP BY pv.SerialNum ORDER BY pv.ID DESC";
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
    <div class="col-md-12">
        <div class="row my-3" style="background-color:cadetblue;">
            <h3 class="m-3 text-white">Manage your PV here</h3>
        </div>
        <div class="row my-2">
            <div class="col-md-2">
                <a href="../pv/add"><button class="btn btn-primary">+ Add New</button></a>
            </div>
        </div>
        <div class="my-3">
            <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>PV Ref Num</th>
                        <th>Pay to</th>
                        <th>Method</th>
                        <th>Total</th>
                        <th>Created at</th>
                        <th>Modified at</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php while ($rowPV = mysqli_fetch_array($result)) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><a href="view?PV=<?= $rowPV['SerialNum']; ?>" target="_blank"><?= $rowPV['SerialNum']; ?></a></td>
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
                            <td><?= $rowPV['PaymentOption']; ?></td>
                            <td>RM<?= $rowPV['GrandTotal']; ?></td>
                            <td><?= $rowPV['CreatedAt']; ?></td>
                            <td><?= $rowPV['ModifiedAt']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Print JSON -->
<script>
    function rvOffices() {
        $.ajax({
            url: 'https://api.greenhouse.io/v1/boards/roivantsciences/offices',
            type: 'GET',
            dataType: 'text',
            success: function(data) {
                var json_result = JSON.parse(data);
                //console.log(json_result); // The whole JSON
                console.log(json_result.offices[0].name);
            }
        });
    }
    rvOffices();
</script>

<!-- Datatable -->
<script>
    $(document).ready(function() {
        $('#dtBasicExample').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });
</script>

<!-- Footer -->
<?php include('../include/assets/templates/footer.php') ?>