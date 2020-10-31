<!-- Get DB Conn -->
<?php include('../core/db/dbcon.php') ?>

<?php
if (isset($_POST['createUser'])) {
    if (empty($_POST['fName']) || empty($_POST['lName']) || empty($_POST['username']) || empty($_POST['email'])) {
        $alert = "alert-danger";
        $message = "Penuhkan semua ruang kosong";
    } else {
        $fName = mysqli_real_escape_string($conn, $_POST['fName']);
        $lName = mysqli_real_escape_string($conn, $_POST['lName']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);

        // Password generation
        function password_generate($chars)
        {
            $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz!@#-^&*()_';
            return substr(str_shuffle($data), 0, $chars);
        }

        $password = password_generate(12);

        // Check if user already exist
        $check = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $check);

        if (mysqli_num_rows($result) > 0) {
            $alert = "alert-danger";
            $message = "User sudah wujud dalam database!";
        } else {
            //$passwordHashed = password_hash($password, PASSWORD_DEFAULT);
            $user = "INSERT INTO users (username, email, pwd, fname, lname) VALUES ('$username', '$email', '$password','$fName', '$lName')";

            if ($result = mysqli_query($conn, $user)) {
                $alert = "alert-success";
                $message = "Berjaya insert user <hr> Sila check email anda.";

                // Email new registration to user
                $to = $email;
                $subject = "User Registration";
                $txt = "
                <html>
                    <head>
                        <title>User Registration</title>
                    </head>
                    <body>
                        <p>Welcome " . $fName . "</p>

                        <table>
                            <tr>
                                <th style='text-align:left;'>First Name</th>
                                <td>:</td>
                                <td>" . $fName . "</td>
                            </tr>
                            <tr>
                                <th style='text-align:left;'>Last Name</th>
                                <td>:</td>
                                <td>" . $lName . "</td>
                            </tr>
                            <tr>
                                <th style='text-align:left;'>Username</th>
                                <td>:</td>
                                <td>" . $username . "</td>
                            </tr>
                            <tr>
                                <th style='text-align:left;'>Email</th>
                                <td>:</td>
                                <td>" . $email . "</td>
                            </tr>
                            <tr>
                                <th style='text-align:left;'>Password</th>
                                <td>:</td>
                                <td>" . $password . "</td>
                            </tr>
                        </table><br>
                        <p>Please change your password by clicking <a href='localhost/enrich/user/password-change'>here</a></p>
                    </body>
                </html>
                ";
                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // More headers
                $headers .= 'From: <webmaster@example.com>' . "\r\n";
                $headers .= 'Cc: myboss@example.com' . "\r\n";

                mail($to, $subject, $txt, $headers);
            } else {
                $alert = "alert-danger";
                $message = "Error woi " . mysqli_error($conn) . " Panggil Ikhwan";
            }
        }
    }
}
?>


<!-- Title -->
<?php $title = "Register New User" ?>

<!-- Header -->
<?php include('../assets/templates/header.php') ?>

<!-- JQuery UI -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<!-- Nav -->
<?php include('../assets/templates/nav.php') ?>

<!-- Content -->
<div class="container">
    <div class="col-md-6 mx-auto my-4">
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
                    </div>
                    <div class="form-row my-4">
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
                    </div>
                    <div class="form-row my-4">
                        <div class="col">
                            <!-- E-mail -->
                            <input type="email" id="defaultRegisterFormEmail" class="form-control mb-4" placeholder="E-mail" name="email">
                        </div>
                    </div>
                    <button name="createUser" class="btn btn-info my-4 btn-block" type="submit">Submit</button>
                </form>
                <!-- Default form register -->
            </div>
        </div>
        <?php
        if (isset($_POST['createUser'])) { ?>
            <div class="alert <?= $alert; ?> alert-dismissible fade show my-4" role="alert">
                <?= $message; ?>
            </div>
        <?php } ?>
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
        //$(".alert").alert('close')
    </script>
    <!-- Footer -->
    <?php
    // include('../assets/templates/footer.php') 
    ?>