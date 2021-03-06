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
<main>
    <div class="container">
        <div class="col-md-12">
            <div class="card my-3">
                <div class="card-header info-color white-text text-center py-4">
                    Manage your PV here
                </div>
                <div class="card-body px-lg-5">
                    <div class="row my-2">
                        <div class="col-md-4">
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
                                        <td class="align-middle"><?= $i++; ?></td>
                                        <td class="align-middle"><a href="view?PV=<?= $rowPV['SerialNum']; ?>" target="_blank"><?= $rowPV['SerialNum']; ?></a></td>
                                        <td class="align-middle">
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
                                        <td class="align-middle"><?= $rowPV['PaymentOption']; ?></td>
                                        <td class="align-middle">RM<?= $rowPV['GrandTotal']; ?></td>
                                        <td class="align-middle"><?= $rowPV['CreatedAt']; ?></td>
                                        <td class="align-middle"><?= $rowPV['ModifiedAt']; ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
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
        $('#dtBasicExample').DataTable({
            "order": [
                [1, "desc"]
            ]
        });
        $('.dataTables_length').addClass('bs-select');
    });
</script>

<!-- Active nav script -->
<script>
    $(function() {
        $('nav a[href^="/' + location.pathname.split("/")[1] + '"]').addClass('active');
    });
</script>

<!-- Footer -->
<?php include('../include/assets/templates/footer.php') ?>