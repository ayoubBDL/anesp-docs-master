<?php
session_start();
include './inc/connect.php';

$message = "";
ob_start();

?>
<!DOCTYPE html>
<html>

<head>
    <title>ANESP Documents</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <meta name="description" content="ANESP docs page">
    <link rel="icon" href="./assets/images/favicon.png">
    <link rel="stylesheet" href="./assets/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/styles.css">
    <style>
        #login {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <?php
    
    if (isset($_POST['submit'])) {
        $uname = $_POST['uname'];
        if (empty($_POST['uname']) || empty($_POST['passwd'])) {
            header("location:login.php");
            ob_end_flush();
        } else {


            $passwd = $_POST['passwd'];
            $passwd = md5($passwd);
            $sql = "select * from user where username='" . $_POST['uname'] . "' and password='" . $passwd . "'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            if ($uname == $row['username'] && $passwd == $row['password'] && $row['approved'] == "true") {
                $_SESSION['User'] = $_POST['uname'];
                header("location:dashboard.php");
                ob_end_flush();
            } else if ($uname == "admin") {
                $_SESSION["admin"] = "admin";
            } else {
                header("location:login.php?invalid= Please enter correct username and password");
                ob_end_flush();
            }
        }
    }
    $conn->close();
    ?>
    <div class="container ">
        <div class="row align-items-center justify-content-center">
            <div class=" m-auto col-sm-12 col-lg-12" id="login">
                <div class="card col-lg-6" style="border: none;">
                    <img src="./assets/images/favicon.png" alt="logo" class="center" style="width: 60px;display: block;margin-left: auto;margin-right: auto;">
                    <div class="card-title mt-2" id="title">
                        <h4 class="text-center py-3">Sign in to <span style="color: blue">ANESP</span> documentation platform.<br> Learn to invest in yourself</h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if (isset($_GET['invalid'])) {


                        ?>
                            <div class="alert alert-danger text-center" role="alert">
                                <?php echo $_GET['invalid'] ?>
                            </div>
                        <?php


                        }
                        ?>
                        <form method="post">
                            <input type="text" name="uname" placeholder="Username" class="form-control mb-4 " required>
                            <input type="password" name="passwd" placeholder="Password" class="form-control mb-4 " required>
                            <button class="btn text-center btn-primary btn-block my-4 col-md-8 col-lg-12 " type="submit" name="submit">Login</button>
                        </form>
                        <div class=" mb-4">
                            <a href="#" class="card-link"><span style="color: blue">Forgot password?</span></a>
                        </div>
                        <div class=" mb-4">
                            <p><strong>You don't have an account? </strong><a href="register.php" class="card-link"><span style="color: blue">Sign up now</span></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer id="ember213" class="app-footer app-footer--body ember-view">
        <div id="ember214" class="ember-view">
            <div class="footer-container t-12 t-bold">
                <ul class="footer-links">
                    <li>
                        <a tabindex="0" rel="noopener noreferrer" target="_blank" href="https://anesp.net/about" id="ember566" class="ember-view">
                            About.
                        </a>
                    </li>

                    <li>
                        <a tabindex="0" rel="noopener noreferrer" target="_blank" href="https://anesp.net/register" id="ember567" class="ember-view">
                            Join us.
                        </a>
                    </li>
                    <li>
                        <a tabindex="0" rel="noopener noreferrer" target="_blank" href="https://anesp.net/internship" id="ember568" class="ember-view">
                            Internships.
                        </a>
                    </li>

                    <li>
                        <a tabindex="0" rel="noopener noreferrer" target="_blank" href="https://anesp.net/sponsorship" id="ember569" class="ember-view">
                            Sponsorship.
                        </a>
                    </li>

                    <li>
                        <a tabindex="0" rel="noopener noreferrer" target="_blank" href="https://anesp.net/partnership" id="ember570" class="ember-view">
                            Partnership.
                        </a>
                    </li>

                    <li>
                        <a tabindex="0" rel="noopener noreferrer" target="_blank" href="https://anesp.net/termsandprivacy/ANESP_terms.pdf" id="ember570" class="ember-view">
                            Terms and privacy.
                        </a>
                    </li>

                    <li>
                        <a tabindex="0" rel="noopener noreferrer" target="_blank" href="https://anesp.net/termsandprivacy/ANESP_Privacy_and_Cookies_Policy.pdf" id="ember570" class="ember-view">
                            Cookies policy.
                        </a>
                    </li>

                    <li>
                        <a tabindex="0" rel="noopener noreferrer" target="_blank" href="https://anesp.net/help" id="ember572" class="ember-view">
                            Help.
                        </a>
                    </li>


                    <li>
                        <a tabindex="0" rel="noopener noreferrer" target="_blank" href="ttps://www.linkedin.com/company/anespmorocco" id="ember573" class="ember-view">
                            Linked in.
                        </a>
                    </li>

                    <li>
                        <a tabindex="0" rel="noopener noreferrer" target="_blank" href="https://web.facebook.com/anespmorocco/" id="ember573" class="ember-view">
                            Facebook.
                        </a>
                    </li>

                </ul>

                <p class="copyright">
                    <a href="https://docs.anesp.net"><img src="./assets/images/favicon.png" width="30px" alt="logo"></a>
                    <span class="text">
                        ANESP © 2020
                    </span>
                </p>
            </div>

        </div>
    </footer>

    <script src="./assets/jquery/dist/jquery.min.js"></script>
    <script src="./assets/popper.js/dist/popper.min.js"></script>
    <script src="./assets/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./js/script.js"></script>
</body>

</html>