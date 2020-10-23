<!-- Get DB Conn -->
<?php include('../core/db/dbcon.php') ?>

<!-- Title -->
<?php $title = "Register New User" ?>

<!-- Header -->
<?php include('../assets/templates/header.php') ?>

<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- JQuery UI -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<!-- Nav -->
<?php include('../assets/templates/nav.php') ?>

<!-- Content -->
<div class="container">
    <div class="col-md-8 mx-auto my-4">
        <div class="card">
            <h5 class="card-header info-color white-text text-center py-4">
                <strong>Register User</strong>
            </h5>
            <div class="card-body px-lg-5 pt-0">
                <!-- Default form register -->
                <form class="text-center md-form" action="#!">
                    <div class="form-row my-4">
                        <div class="col">
                            <!-- First name -->
                            <input type="text" id="defaultRegisterFormFirstName" class="form-control" placeholder="First name">
                        </div>
                        <div class="col">
                            <!-- Last name -->
                            <input type="text" id="defaultRegisterFormLastName" class="form-control" placeholder="Last name">
                        </div>
                    </div>

                    <div class="form-row my-4">
                        <div class="col">
                            <!-- Username -->
                            <input type="text" id="defaultRegisterFormUsername" class="form-control mb-4" placeholder="Username">
                        </div>
                        <div class="col">
                            <!-- E-mail -->
                            <input type="email" id="defaultRegisterFormEmail" class="form-control mb-4" placeholder="E-mail">
                        </div>
                    </div>
                    <div class="form-row my-4">
                        <div class="col">
                            <!-- Password -->
                            <input type="password" id="defaultRegisterFormPassword" class="form-control" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock">
                            <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4 text-left">
                                At least 8 characters and 1 digit
                            </small>

                        </div>
                        <div class="col">
                            <input type="password" id="defaultRegisterFormPassword" class="form-control" placeholder="Confirm password" aria-describedby="defaultRegisterFormPasswordHelpBlock">
                            <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4 text-left">
                                Please confirm your password
                            </small>
                        </div>
                    </div>

                    <button class="btn btn-info my-4 btn-block" type="submit">Sign in</button>

                </form>
                <!-- Default form register -->
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?php
// include('../assets/templates/footer.php') 
?>