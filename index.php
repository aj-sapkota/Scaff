<?php
session_start();
require('addon/dbConnect.php');
// Check if already logged in 
if (isset($_SESSION['email'])) {
    switch ($_SESSION['account_type']) {
        case "CV":
            header('Location: client_viewer_home.php');
            break;
        case "CA":
            header('Location: client_admin_home.php');
            break;
        case "SU":
            header('Location: system_user_home.php');
            break;
        case "SA":
            header('Location: system_admin_home.php');
            break;
    }
}
$login_alert = "";
// If tried to access other pages without logging in
if (isset($_SESSION['login_alert'])) {
    $login_alert = "Please Login First";
    unset($_SESSION['login_alert']);
}
// Login button is pressed
if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["psw"];
    $query = $connect->query("select * from client_register where client_email='$email'");
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $rowcount = $query->rowCount();
    if ($rowcount > 0) {
        if (password_verify($password, $result['password'])) {
            $_SESSION['name'] = $result['client_name'];
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $result['password'];
            $_SESSION['account_type'] = $result['account_type'];
            $_SESSION['id']=$result['client_id'];
            $_SESSION['order_num']=$result['order_num'];

            switch ($result['account_type']) {
                case "CV":
                    header('Location: client_viewer_home.php');
                    break;
                case "CA":
                    header('Location: client_admin_home.php');
                    break;
                case "SU":
                    header('Location: system_user_home.php');
                    break;
                case "SA":
                    header('Location: system_admin_home.php');
                    break;
            }
        } else {
            $login_alert = "Incorrect Password";
        }
    } else {
        $login_alert = "User not Found";
    }
}


?>
        <!DOCTYPE html>
        <html lang="en">

        <?php include('html/head.html'); ?>

        <body>

            <div class="container-fluid buddy">
                <div class="mainback">
                    <div class="container">
                        <div class="row">
                            <div class="col-10 col-sm-9 col-md-7 col-lg-5 mx-auto">
                                <div class="card card-signin my-5">
                                    <div class="card-body">
                                        <div class="login-text">Log In</div>
                                        <div class="imgcontainer">

                                            <img src="img/avatar.png" alt="Avatar" class="avatar">

                                        </div>
                                        <form class="form-signin " method="post" action="index.php">
                                            <div class="form-label-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend input-group-text">
                                                        <i class="fas fa-envelope"></i>
                                                    </div>
                                                    <input type="email" id="inputEmail" class=" form-control " placeholder="Email address" value="<?php echo @$email ?>" name="email" spellcheck="false" required autocomplete="off" autofocus>
                                                </div>
                                            </div>

                                            <div class="form-label-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend input-group-text">
                                                        <i class="fas fa-unlock"></i>
                                                    </div>
                                                    <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="psw" required autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="custom-control custom-checkbox mb-3">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1" checked>
                                                <label class="custom-control-label" for="customCheck1">Remember password</label>
                                            </div>
                                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="login" value="Login">Log In</button>

                                        </form>
                                        <?php
                                        if ($login_alert != "") {
                                            echo '<div class="error">' . $login_alert . '</div>';
                                        } ?>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </body>
        </html>