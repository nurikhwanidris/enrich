<!-- Title -->
<?php $title = "Payment Voucher" ?>

<!-- Header -->
<?php include('../include/assets/templates/header.php') ?>

<!-- Navigation -->
<?php include('../include/assets/templates/nav.php') ?>

<!-- Content -->
<div class="container">
    <div class="row" style="background-color:cadetblue;">
        <h3 class="m-3 text-white">Manage your PV here</h3>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row my-2">
                <div class="col-md-2">
                    <a href="../pv/add"><button class="btn btn-primary">+ Add New</button></a>
                </div>
                <div class="col-md-4">
                    <button class="btn btn-secondary">All</button>
                    <button class="btn btn-secondary">New</button>
                    <button class="btn btn-secondary">Cancelled</button>
                    <button class="btn btn-secondary">Recurring</button>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control float-right" placeholder="Search">
                </div>
            </div>
            <div class="row my-3">
                <table class="table table-bordered">
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
                        <tr>
                            <td>1</td>
                            <td>PV20180900227</td>
                            <td>AZUWARRIDAH BINTI ABDULLAH</td>
                            <td>2,800.00</td>
                            <td><a href="#">Print</a>&nbsp;<a href="#">Edit</a>&nbsp;<a href="#">Delete</a></td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>PV20180900227</td>
                            <td>AZUWARRIDAH BINTI ABDULLAH</td>
                            <td>2,800.00</td>
                            <td><a href="#">Print</a>&nbsp;<a href="#">Edit</a>&nbsp;<a href="#">Delete</a></td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>PV20180900227</td>
                            <td>AZUWARRIDAH BINTI ABDULLAH</td>
                            <td>2,800.00</td>
                            <td><a href="#">Print</a>&nbsp;<a href="#">Edit</a>&nbsp;<a href="#">Delete</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include('../include/assets/templates/footer.php') ?>