<!doctype html>
<html lang="en">

<head>
    <title>MIT - Check Your Results Here</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=7" />
    <link rel="shortcut icon" href="../assets/images/mit logo.jpg" type="image/x-icon" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />

    <link rel="stylesheet" href="../css/navbar.css">

    <link rel="stylesheet" href="../css/common-navbar-style.css">

    <link rel="stylesheet" href="../css/student-result.css">

    <link rel="stylesheet" href="../css/footer.css">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="../index.html">
            <img class="logo-one" src="../assets/images/mit logo.jpg" alt="Navbar logo" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../index.html">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="../service-pages/result-form.html">Result</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="../index.html#about">About Us</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact Us</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link btn btn-primary" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span>Login</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../service-pages/admin-login.html">As Admin</a>
                        <a class="dropdown-item" href="../php/logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <h2 class="head text-center">
        Here is Your Result
    </h2>

    <?php
    session_start();
    if (isset($_POST['submit'])) {
        $emailid = $_POST['emailid'];
        $regno = $_POST['regno'];

        $con = mysqli_connect('localhost', 'root', '', 'student_result_management_system', '3306');
        if ($con == false) {
            echo "Error in connection";
        } else {
            $select = "SELECT * FROM `student_info` WHERE `emailid`='$emailid'  AND `regno`='$regno'";
            $query = mysqli_query($con, $select);
            $row = mysqli_num_rows($query);
            if ($row == 1) {
                $data = mysqli_fetch_assoc($query);

                $_SESSION['name'] = $data['name'];
                if ($_SESSION['name']) {
                    echo '<script>alert("Hello ' . $_SESSION['name'] . '");</script>';
                } else {
                    echo "Error";
                }

                echo "<div class='container jumbotron' style='padding: 8%;'>";

                echo "<div class='row'>";
                echo "<div class='col-lg-2'>";
                echo "<img class='student-image' src='" . $data["image"] . "' alt='Student image' />";
                echo "</div>";
                echo " <div class='col-lg-6 content'>";
                echo "<h6><b>Name</b> - " . $data["name"] . "</h6>";
                echo "<h6><b>Section</b> - " . $data["section"] . "</h6>";
                echo "<h6><b>Email address</b> - " . $data["emailid"] . "</h6>";
                echo "<h6><b>RollNo</b> - " . $data["rollno"] . "</h6>";
                echo "<h6><b>RegNo</b> - " . $data["regno"] . "</h6>";
                echo "</div>";
                echo "</div>";

                echo "<br /><br />";

                echo "<table class='table'>";

                echo " <thead class='thead-dark'>";
                echo "<tr>";
                echo " <th scope='col'>#</th>";
                echo " <th scope='col'>Subject</th>";
                echo " <th scope='col'>Mark Obtained</th>";
                echo " <th scope='col'>Total Mark</th>";
                echo "</tr>";
                echo "</thead>";

                echo "<tbody>";

                echo "<tr>";
                echo "<th scope='row'>1</th>";
                echo "<td>Mathematics - II</td>";
                echo "<td>" . $data['math_2'] . "</td>";
                echo "<td>/ 50</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<th scope='row'>2</th>";
                echo "<td>Data Structure & Algorithm</td>";
                echo "<td>" . $data["dsa"] . "</td>";
                echo "<td>/ 50</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<th scope='row'>3</th>";
                echo "<td>Basic Electronics</td>";
                echo "<td>" . $data["be"] . "</td>";
                echo "<td>/ 50</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<th scope='row'>4</th>";
                echo "<td>Chemistry</td>";
                echo "<td>" . $data["chemistry"] . "</td>";
                echo "<td>/ 50</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<th scope='row'>5</th>";
                echo "<td>Communicative English & Technical Commuincation</td>";
                echo "<td>" . $data["cetc"] . "</td>";
                echo "<td>/ 50</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<th scope='row'></th>";
                echo "<td><b>Subtotal</b></td>";
                echo "<td>" . $data["total"] . "</td>";
                echo "<td><b>/ 250</b></td>";
                echo "</tr>";

                echo "</tbody>";
                echo "</table>";

                if ($data["status"] == 'Pass')
                    echo "<h3><b>Status</b> - <span style='color: #21bf73;'>Pass</span></h3>";
                else
                    echo "<h3><b>Status</b> - <span style='color: #ff0000;'>Fail</span></h3>";

                echo "</div>";
            } else {
    ?>
                <script>
                    alert('Wrong Emailid or Regno!!Please Try Again');
                    window.open('../service-pages/result-form.html', '_self');
                </script>
    <?php
            }
        }
    }

    ?>



    <footer id="contact">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <a href="../index.html">
                            <img class="logo2" src="../assets/images/mit logo.jpg" alt="logo2" />
                        </a>
                        <p class="content1">
                        Vision:
MIT aspires to be a leader in Techno-Managerial education at the national level by developing students as technologically superior and ethically strong multidimensional personalities with a global mindset.


                <br /><br />
                Mission:
We are committed to provide wholesome education in Technology and Management to enable aspiring students to utilize their fullest potential and become professionally competent and ethically strong by providing,

-Well qualified, experienced and Professionally trained faculty
-State-of-the-art infrastructural facilities and learning environment
-Conducive environment for research and development.
-Delight to all stakeholders.
                        </p>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <h6 class="content2">CONTACT US</h6>
                        <div class="social-icons">
                            <a class="icon-link" href="https://m.facebook.com/Aurangabad.mit/"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a class="icon-link" href="https://instagram.com/mit.aurangabad?igshid=MzRlODBiNWFlZA=="><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            <a class="icon-link" href="https://twitter.com/MIT_Update"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a class="icon-link" href="https://www.linkedin.com/company/mitaurangabad/"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            <a class="icon-link" href="https://youtube.com/@mitaurangabad334?si=-5-SHSDOM0-60u2u"><i class="fa fa-youtube" aria-hidden="true"></i></a>

                            <br /><br />
                            <p class="contact-details">
                                <i class="fa fa-envelope" aria-hidden="true"></i> &nbsp;
                                <a href="mailto:info@mit.asia" style="color: #fff; text-decoration: none;">info@mit.asia
                                    </a>
                                <br /><br />
                                <i class="fa fa-phone" aria-hidden="true"></i> &nbsp;+91-240-2375190 <br /><br />
                                <i class="fa fa-map-marker" aria-hidden="true"></i> &nbsp;
                                MIT,Beed Bypass,Aurangabad
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-3">
                        <h4>MIT,Aurangabad</h4>
                        <div>
                            <img src="../assets/images/clg.jpg" width="440" height="440" frameborder="0" style="border: 0;" allowfullscreen="" aria-hidden="false" tabindex="0">
                        </div>
                    </div>
                </div>
            </div>

            
        </div>
    </footer>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="../javascript/index.js"></script>
</body>

</html>