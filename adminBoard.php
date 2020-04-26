<?php
session_start();
if ($_SESSION["User"] != "admin") {
    header("location:index.php");
}
//Anesp!2020
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
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <a class="navbar-brand" href="#"><img src="./assets/images/favicon.png" width="45px" /></a>
        <span class="anesp-title">
            <h1>Documentation</h1>
        </span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#anespNav" aria-controls="anespNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="anespNav">
            <div class="col-md-6 mx-auto my-2">
                <div class="input-group">
                    <input class="form-control" id="searchBar" onkeyup="searchFunction()" type="text" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <span class="input-group-text bg-primary"><i class="fa fa-search text-white" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
            <div class="mr-2 my-2 text-center">
                <a href="./dashboard.php" class="btn btn-outline-primary">Acceuil</a>
                <a class="btn text-center btn-primary " href="upload.php">Upload</a>
                <a href="./logout.php?logout" class="btn btn-outline-danger">Logout</a>
                <a href="http://anesp.net/internship" class="btn btn-outline-primary">Internships</a>
                <a href="#" class="btn btn-outline-success">Help</a>


            </div>
        </div>
    </nav>

    <header class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-12 header-logo text-center">
                    <img src="./assets/images/logo1.png" width="100px" />
                </div>
            </div>
        </div>
    </header>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Preview</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <iframe id="preview" width="100%" height="720px"></iframe>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container ">
        <div class="row align-items-center justify-content-center">
            <div class=" m-auto col-sm-12 col-lg-12" id="login">
                <h4 class="text-center py-3">Requests:</h4>

                <?php
                if (isset($_SESSION['message'])) {
                ?>
                    <div class="alert alert-success text-center" role="alert">
                        <?php echo $_SESSION['message'] ?>
                    </div>
                <?php
                    unset($_SESSION['message']);
                }
                ?>
                <?php
                $sql = "select * from user where approved='false'";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                ?>
                    <div class=" m-auto card col-lg-6">
                        <div class="card-body">
                            <form method="post">
                                <input type="hidden" name="id" value=".<?php echo $row['id'] ?>.">
                                <p>Nom: <?php echo $row['nom']; ?></p>
                                <p>Prenom: <?php echo $row['prenom']; ?></p>
                                <p>E-mail: <?php echo $row['email']; ?></p>
                                <a class="btn text-center btn-info " href="adminBoard.php?accept=<?php echo $row['id'] ?>">Accept</a>
                                <a class="btn text-center btn-danger " href="adminBoard.php?decline=<?php echo $row['id'] ?>">Decline</a>
                            </form>
                        </div>
                    </div>
                <?php
                }
                if (isset($_GET['accept'])) {
                    $id = $_GET['accept'];
                    $conn->query("UPDATE user SET approved='true' WHERE id=" . $id . ";");
                    $_SESSION['message'] = "Accepted succefully";
                    header("location:adminBoard.php");
                    ob_end_flush();
                } else if (isset($_GET['decline'])) {
                    $id = $_GET['decline'];
                    $conn->query("DELETE FROM user WHERE id=$id") or die($conn->error);
                    $_SESSION['message'] = "Deleted successfully";
                    header("location:adminBoard.php");
                    ob_end_flush();
                }

                ?>
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