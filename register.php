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
    session_start();
    include './inc/connect.php';
    $msg = "vide";
    if (isset($_POST['submit'])) {
        if ($_POST['passwd2'] != $_POST['passwd']) {
            header("location:register.php?msg= Passwords doesn't much");
        } else {

            $uname = $_POST['uname'];
            $passwd1 = $_POST['passwd'];
            $passwd = md5($passwd1);
            echo $passwd;
            $email = $_POST['email'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $sql = "INSERT INTO user (nom,prenom,username,password,email) VALUES('$nom','$prenom', '$uname', '$passwd','$email');";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header("location:register.php");
            } else {
                header("location:register.php?invalid= Please enter correct informations");
                $msg = "Please enter correct informations";
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
                        <h3 class="text-center py-3">Sign up to <span style="color: blue">ANESP</span>'s Docs</h3>
                    </div>
                    <div class="card-body">

                        <?php
                        if ($msg != "vide") {


                        ?>
                            <div class="alert-light text-danger text-center py-3">
                                <?php echo $msg ?>
                            </div>
                        <?php


                        }
                        ?>
                        <form method="post">
                            <input type="text" name="nom" placeholder="First Name" class="form-control mb-4 " required>
                            <input type="text" name="prenom" placeholder="Last Name" class="form-control mb-4 " required>
                            <input type="text" name="email" placeholder="Email" class="form-control mb-4 " required>
                            <input type="text" name="uname" placeholder="Username" class="form-control mb-4 " required>
                            <input type="password" name="passwd" placeholder="Password" class="form-control mb-4 " required>
                            <input type="password" name="passwd2" placeholder="Retype Password" class="form-control mb-4 " required>
                            <button class="btn text-center btn-primary btn-block my-4 col-md-8 col-lg-12 " type="submit" name="submit">Register</button>
                        </form>

                        <div class=" mb-4">
                            <p><strong>You have already an account? </strong><a href="login.php" class="card-link"><span style="color: blue">Sign in now</span></a></p>
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