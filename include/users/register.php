<!-- Get DB Conn -->
<?php include('../core/db/dbcon.php') ?>

<?php
if (isset($_POST['createUser'])) {
    if (!empty($_POST['fName'])) {
        $fName = $_POST['fName'];
    } else {
        echo "First Name can't be empty";
    }
    if (!empty($_POST['lName'])) {
        $lName = $_POST['lName'];
    } else {
        echo "Last Name can't be empty";
    }
    if (!empty($_POST['username'])) {
        $username = $_POST['username'];
    } else {
        echo "Username can't be empty";
    }
    if (!empty($_POST['email'])) {
        $email = $_POST['email'];
    } else {
        echo "Email can't be empty";
    }
    $password = $_POST['password'];
    // Check if user already exist
    $check = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $check);

    if (mysqli_num_rows($result) > 1) {
        echo "User dah wujud ni";
    } else {
        $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
        $user = "INSERT INTO users (username, email, pwd, fname, lname) VALUES ('$username', '$email', '$passwordHashed','$fName', '$lName')";

        if ($result = mysqli_query($conn, $user)) {
            echo "Berjaya insert user";
        } else {
            echo "Error woi " . mysqli_error($conn) . " Panggil Ikhwan";
        }
    }
}
?>


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
                <form class="text-center md-form" action="register" method="POST">
                    <div class="form-row my-4">
                        <div class="col">
                            <!-- First name -->
                            <input type="text" id="defaultRegisterFormFirstName" class="form-control" placeholder="First name" name="fName">
                        </div>
                        <div class="col">
                            <!-- Last name -->
                            <input type="text" id="defaultRegisterFormLastName" class="form-control" placeholder="Last name" name="lName">
                        </div>
                    </div>

                    <div class="form-row my-4">
                        <div class="col">
                            <!-- Username -->
                            <input type="text" id="defaultRegisterFormUsername" class="form-control mb-4" placeholder="Username" name="username">
                        </div>
                        <div class="col">
                            <!-- E-mail -->
                            <input type="email" id="defaultRegisterFormEmail" class="form-control mb-4" placeholder="E-mail" name="email">
                        </div>
                    </div>
                    <div class="form-row my-4">
                        <div class="col">
                            <!-- Password -->
                            <input type="password" id="txtNewPassword" class="form-control" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock">
                            <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4 text-left">
                                At least 8 characters and 1 digit
                            </small>

                        </div>
                        <div class="col">
                            <!-- Confirm Password -->
                            <input type="password" id="txtConfirmPassword" class="form-control" placeholder="Confirm password" aria-describedby="" name="password">
                            <small id="CheckPasswordMatch" class="form-text text-muted mb-4 text-left">
                                Please confirm your password
                            </small>
                        </div>
                    </div>
                    <button name="createUser" class="btn btn-info my-4 btn-block" type="submit">Submit</button>
                </form>
                <!-- Default form register -->
            </div>
        </div>
    </div>
    <script>
        function checkPasswordMatch() {
            var password = $("#txtNewPassword").val();
            var confirmPassword = $("#txtConfirmPassword").val();
            if (password != confirmPassword)
                $("#CheckPasswordMatch").html("Passwords did not match!").removeClass("text-success").addClass("text-danger");
            else
                $("#CheckPasswordMatch").html("Passwords match!").removeClass('text-danger').addClass("text-success");
        }
        $(document).ready(function() {
            $("#txtConfirmPassword").keyup(checkPasswordMatch);
        });
    </script>
    <!-- Footer -->
    <?php
    // include('../assets/templates/footer.php') 
    ?>