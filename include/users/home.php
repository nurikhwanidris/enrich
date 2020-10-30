<!-- Get DB Conn -->
<?php include('../core/db/dbcon.php') ?>

<!-- Title -->
<?php $title = "Manage Users" ?>

<!-- Get All the users -->
<?php

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

?>

<!-- Header -->
<?php include('../assets/templates/header.php') ?>

<!-- Navigation -->
<?php include('../assets/templates/nav.php') ?>

<div class="container">
    <div class="col-md-12 mx-auto my-4">
        <div class="card my-3">
            <div class="card-header info-color white-text text-center py-4">
                Manage your Users here
            </div>
            <div class="card-body px-lg-5">
                <div class="row my-2">
                    <a href="/enrich/include/users/register" class="btn btn-md btn-primary">+ Add New User</a>
                </div>
                <div class="row my-2">
                    <table class="table table-stripped table-bordered">
                        <thead>
                            <tr>
                                <th style="vertical-align:middle; text-align: center;">#</th>
                                <th style="vertical-align:middle;">Name</th>
                                <th style="vertical-align:middle; text-align: center;">Position</th>
                                <th style="vertical-align:middle; text-align: center;">Department</th>
                                <th style="vertical-align:middle; text-align: center;">Role</th>
                                <th style="vertical-align:middle; text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            while ($row = mysqli_fetch_array($result)) : ?>
                                <tr>
                                    <td style="vertical-align:middle; text-align: center;">
                                        <?= $i++; ?>
                                    </td>
                                    <td style="vertical-align:middle;">
                                        <?= $row['fname']; ?>
                                    </td>
                                    <td style="vertical-align:middle; text-align: center;">
                                        Nanti dulu
                                    </td>
                                    <td style="vertical-align:middle; text-align: center;">
                                        Nanti dulu
                                    </td>
                                    <td style="vertical-align:middle; text-align: center;">
                                        Nanti dulu
                                    </td>
                                    <td style="vertical-align:middle; text-align: center;">
                                        <button class="btn btn-sm btn-warning"><i class="far fa-edit"></i></button>&nbsp; <button class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>