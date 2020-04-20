<?php
session_start();
if (!isset($_SESSION['User'])) {
    header("location:index.php");
}
?>
<?php
include 'inc/connect.php'
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

    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="text-center"><strong>This website contains all informations that you need so as to manage and deliver the best quality of professional internships in ANESP.</strong></p>
            </div>
            <div class="col-12">
                <table id="docsTable">
                    <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Upload date</th>
                            <th scope="col">View</th>
                            <th scope="col">Download</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        function moment($date)
                        {
                            $currentDate = date("y-m-d");
                            $str1 = explode("-", $currentDate);
                            $str2 = explode("-", $date);
                            $year = ("20" . $str1[0]) - $str2[0];
                            $month = $str1[1] - $str2[1];
                            $day = $str1[2] - $str2[2];
                            if ($year > 0) {
                                if ($year == 1) return "1 year ago";
                                return $year . " years ago";
                            } else if ($month > 0) {
                                if ($month == 1) return "1 month ago";
                                return $month . " years ago";
                            } else if ($day > 0) {
                                if ($day == 1) return "1 day ago";
                                return $day . " days ago";
                            } else {
                                return "today";
                            }
                        }

                        $sql = "SELECT * from files ORDER BY id DESC";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            //fetch data from server
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                                <td scope='row'>" . $row["title"] . "</td>
                                                <td scope='row'>" . moment($row["date"]) . "</td>
                                                <td><button onclick='changePreviewUrl(" . $row["id"] . ")' type='button' class='btn btn-primary' data-toggle='modal' data-target='#myModal'><span class='fa fa-eye'></span> Preview</button></td>                                                <td><a class='btn btn-primary' target='_blank' href=" . $row["url"] . "><span class='fa fa-download'></span> Download</a></td>
                                            </tr>";
                            }
                        } else {
                            echo "0 results";
                        }
                        $result->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-11 mx-auto my-4">
                <h1 class="anesp-slider-title">Documents Preview : </h1>
                <div id="carouselAnesp" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <iframe src="https://drive.google.com/file/d/10qVaPRbdJ3RrSdg-JZ_EmO_-z1OSYser/preview" height="480px" width="100%"></iframe>
                        </div>
                        <?php
                        $sql = "SELECT * from files";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            //fetch data from server
                            while ($row = $result->fetch_assoc()) {
                                if ($row["id"] > 1) {
                                    echo " <div class='carousel-item'>
                                                                <iframe src='" . $row["preview_url"] . "' height='480px' width='100%'></iframe>
                                                            </div>";
                                }
                            }
                        } else {
                            echo "0 results";
                        }
                        $result->close();
                        $conn->close();
                        ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselAnesp" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselAnesp" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
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