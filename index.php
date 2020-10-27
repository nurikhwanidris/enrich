<!-- Get DB Conn -->
<?php include('../enrich/include/core/db/dbcon.php') ?>

<!-- Title -->
<?php $title = "Login" ?>

<!-- Login -->
<?php

if (isset($_POST['signin'])) {
    if (empty($_POST['email']) || empty($_POST['pwd'])) {
        $alert = "alert-danger";
        $message = "Fields can't be empty";
    } else {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                if (password_verify($pwd, $row['pwd'])) {
                    // Return true
                    $_SESSION['fname'] = $row['fname'];

                    $alert = "alert-success";
                    $message = "Welcome " . $_SESSION['fname'] . "! ";
                    $message .= "<hr>";
                    $message .= "You will be redirected in 5 seconds";
                    echo "
                     <script>
                        window.setTimeout(function() {
                            window.location.href = '/enrich/pv/home';
                        }, 5000);
                     </script>
                    ";
                } else {
                    // Return false
                    $alert = "alert-danger";
                    $message = "Password did not match any of our records";
                }
            }
        } else {
            $alert = "alert-danger";
            $message = "Error woi! " . mysqli_error($conn) . " Panggil Ikhwan";
        }
    }
}

?>

<!-- Header -->
<?php include('../enrich/include/assets/templates/header.php') ?>

<!-- Content -->
<div class="container">
    <div class="col-md-6 mx-auto my-4 text-center">
        <img src="/enrich/include/assets/img/logo-black.png" alt="" srcset="" class="img my-4">

        <!-- Default form login -->
        <form class="text-center border border-light p-5 md-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">

            <p class="h4 mb-4">Sign in</p>
            <div class="form-row my-4">
                <!-- Email -->
                <input type="email" name="email" id="" class="form-control" placeholder="Email">

                <!-- Password -->
                <input type="password" name="pwd" id="" class="form-control" placeholder="Password">
            </div>

            <div class="d-flex justify-content-around">
                <div>
                    <!-- Forgot password -->
                    <a href="">Forgot password?</a>
                </div>
            </div>

            <!-- Sign in button -->
            <button class="btn btn-info btn-block my-4" type="submit" name="signin">Sign in</button>

            <!-- Register -->
            <p>Not a member?
                <a href="">Register</a>
            </p>

        </form>
        <!-- Default form login -->
    </div>
    <?php if (isset($_POST['signin'])) { ?>
        <div class="col-md-6 mx-auto my-4">
            <div class="alert <?= $alert; ?> text-center" role="alert">
                <?= $message; ?>
            </div>
        </div>
    <?php  } ?>
    <?php if (isset($_GET['msg']) == "logout") { ?>
        <div class="col-md-6 mx-auto my-4">
            <div class="alert alert-success text-center" role="alert">
                You've logged out
            </div>
        </div>
    <?php  } ?>

    <!-- Dimiss the alert -->
    <script>
        $(".alert").delay(4000).slideUp(200, function() {
            $(this).alert('close');
        });
    </script>
</div>