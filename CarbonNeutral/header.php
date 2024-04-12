<head>
    <title>CarboNeutral</title>
    <!-- Favicons -->
    <link href="assets/img/favicon.svg" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> 
    <script type="module">
        import Swal from 'https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/+esm';
    </script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>


    <title>CarboNeutral</title>

    <!-- Favicons -->
    <link href="assets/img/" rel="icon">
    <!-- Vendor CSS Files -->
	<link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
	<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
	<link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
        
</head>
<?php
session_start();
include 'functions/connection.php';
include 'functions/main.php';
$isLoggedIn = false;
if (isset($_SESSION['user_id'])) {
    $isLoggedIn = true;
    $sql = "SELECT * FROM company WHERE c_id = '$_SESSION[user_id]'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
function generate()
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 10; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
if (isset($_POST['register'])) {
    extract($_POST);
    $sql = "SELECT count(*) as total FROM company";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $company_id = 'C' . ($row['total'] + 1);
    $username = str_replace(' ', '_', $company_name);
    $username = strtolower($username);
    $password = generate();
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO `company`(`c_id`, `c_name`, `employee_count`, `city`, `state`, `country`, `office_area`, `email`, `org_type`, `username`, `password`) VALUES ('$company_id','$company_name','$employeeCount','$city','$state','$country','$company_area','$company_email','$company_type','$username','$password_hash')";
    $result = $conn->query($sql);
    if ($result)
     {
        if (send_credentials($company_email, $username, $password)) {
        ?>
        <script>
            // Swal.fire({
            //     title: "Success",
            //     text: "Your registration was successful. Please check your email for login credentials.",
            //     icon: "success",
            //     confirmButtonColor: "#3085d6",
            //     confirmButtonText: "Login now"
            // }).then((result) => {
            //     if (result.value) {
            //         window.location.href = "index.php";
            //     }
            // });
            alert ("Your registration was successful. Please check your email for login credentials.");
            window.location.href = "index.php";
        </script>
        <?php
        } else {
        ?>
        <script>
            // Swal.fire({
            //     title: "Error",
            //     text: "Something went wrong. Please try again.",
            //     icon: "error",
            //     confirmButtonColor: "#3085d6",
            //     confirmButtonText: "Try again"
            // }).then((result) => {
            //     if (result.value) {
            //         window.location.href = "index.php";
            //     }
            // });
            alert ("Something went wrong. Please try again.");
            // window.location.href = "index.php";
        </script>
        <?php
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

if (isset($_POST['login'])) {
    extract($_POST);
    $sql = "SELECT * FROM company where username = '$username'";
    $result = $conn->query($sql);
    if (!$result) {
        echo "Error: " . mysqli_error($conn);
    }
    else if ($result->num_rows > 0) {
        echo 'Error: ' . mysqli_error($conn);
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['c_id'];
            $_SESSION['user_type'] = $row['org_type'];
            header("Location: index.php");
        } else {
        ?>
        <script>
            // Swal.fire({
            //     title: "Error",
            //     text: "Invalid username or password",
            //     icon: "error",
            //     confirmButtonColor: "#3085d6",
            //     confirmButtonText: "Try again"
            // }).then((result) => {
            //     if (result.value) {
            //         alert("hello");
            //         window.location.href = "index.php";
            //     }
            // });
            alert ("Invalid username or password");
            window.location.href = "index.php";
        </script>
        <?php
        }
    } else {
    ?>
        <script>
            // Swal.fire({
            //     title: "Error",
            //     text: "Invalid username or password",
            //     icon: "error",
            //     confirmButtonColor: "#3085d6",
            //     confirmButtonText: "Try again"
            // }).then((result) => {
            //     if (result.value) {
            //         window.location.href = "index.php";
            //     }
            // });
            alert ("Invalid username or password");
            window.location.href = "index.php";
        </script>
    <?php
    }
}

if (isset($_POST['forgot'])) {
    $username = $_POST['username'];
    $sql = "SELECT * FROM `company` WHERE `username` = '$username'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
        $password = generate();
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE `company` SET `password` = '$password_hash' WHERE `username` = '$username'";
        $result1 = mysqli_query($conn, $sql);
        if ($result1) {
            $row = mysqli_fetch_assoc($result);
            $email = $row['email'];
            if (send_credentials($email, $username, $password)) {
                echo "Password sent";
            ?>
                <script>
                    // Swal.fire({
                    //     title: "Success",
                    //     text: "Your password has been sent to your email",
                    //     icon: "success",
                    //     confirmButtonColor: "#3085d6",
                    //     confirmButtonText: "Go to login"
                    // }).then((result) => {
                    //     if (result.value) {
                    //         window.location.href = "index.php";
                    //     }
                    // });
                    alert ("Your password has been sent to your email");
                    window.location.href = "index.php";
                </script>
            <?php
            } else {
                echo "Error sending password";
            ?>
                <script>
                    // Swal.fire({
                    //     title: "Error",
                    //     text: "There was an error sending your password. Please try again later",
                    //     icon: "error",
                    //     confirmButtonColor: "#3085d6",
                    //     confirmButtonText: "Try again"
                    // }).then((result) => {
                    //     if (result.value) {
                    //         window.location.href = "index.php";
                    //     }
                    // });
                    alert ("There was an error sending your password. Please try again later");
                    window.location.href = "index.php";
                </script>
            <?php
            }
        } else {
            echo "Error: " . mysqli_error($conn);
            ?>
            <script>
                // Swal.fire({
                //     title: "Error",
                //     text: "There was an error sending your password. Please try again later",
                //     icon: "error",
                //     confirmButtonColor: "#3085d6",
                //     confirmButtonText: "Try again"
                // }).then((result) => {
                //     if (result.value) {
                //         window.location.href = "index.php";
                //     }
                // });
                alert ("There was an error sending your password. Please try again later");
                window.location.href = "index.php";
            </script>
        <?php
        }
    } else {
        echo "Error: " . mysqli_error($conn);
        ?>
        <script>
            // Swal.fire({
            //     title: "Error",
            //     text: "The email you entered is incorrect",
            //     icon: "error",
            //     confirmButtonColor: "#3085d6",
            //     confirmButtonText: "Try again",
            //     allowOutsideClick: false,
            //     backdrop: "rgba(0, 0, 0)"
            // }).then((result) => {
            //     if (result.value) {
            //         window.location.href = "index.php";
            //     }
            // });
            alert ("The email you entered is incorrect");
            window.location.href = "index.php";
        </script>
<?php
    }
}
?>

<header id="site-header" class="">
    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">

            </div>
            <div class="social-links d-none d-md-block">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="container d-flex align-items-center">
            <h1 class="logo me-auto"><a href="index.php">CarboNeutral</a></h1>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link" href="index.php">Home</a></li>
                    <li><a class="nav-link" href="public_calculator.php">Calculate</a></li>
                    <li><a class="nav-link" href="index.php#services">Factors</a></li>
                    <li><a class="nav-link" href="index.php#contact">Contact</a></li>
                    <?php
                    if ($isLoggedIn) {
                        echo '
                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-user"></i>
                            </a>
                            <ul class="dropdown-menu w-auto" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item pt-2" href="profile.php">My business</a></li>
                                <li><a class="dropdown-item pt-2" href="calculator.php">Calculate</a></li>
                                <li><a class="dropdown-item pt-2" href="assessments.php">Take assessment</a></li>
                                <li><a class="dropdown-item pt-2" href="assessments_report.php">View report</a></li>
                                <li><a class="dropdown-item pt-2 w-50" href="functions/logout.php"> <i class="fa fa-sign-out-alt"></i> Logout</a></li>
                            </ul>
                        </li>
                        ';
                    } else {
                        echo '
                        <li class="nav-item">
                            <a class="getstarted scrollto" data-bs-toggle="modal" href="#" data-bs-target="#loginModal">Login</a>
                        </li>
                        ';
                    }
                    ?>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
        </div>

    </div>
</header>
<?php
if (!$isLoggedIn) {
    echo '
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <section id="tabs" class="tabs py-0">
                        <ul class="nav nav-tabs row d-flex">
                            <li class="nav-item col-6">
                                <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tab-login" style="cursor: pointer;">
                                    Login
                                </a>
                            </li>
                            <li class="nav-item col-6">
                                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-register" style="cursor: pointer;">
                                    Register
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active show my-2" id="tab-login">
                                <form action="header.php" method="POST">
                                    <div class="form-outline my-3">
                                        <input required type="text" placeholder="Enter your username" id="email" name="username" class="form-control" />
                                    </div>
                                
                                    <div class="form-outline my-3">
                                        <input required type="password" placeholder="Enter your password" id="password" autocomplete="current-password" name="password" class="form-control" />
                                    </div>

                                    <div class="row my-3">
                                        <div class="col">
                                            <a href="#" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#forgotPassword">Forgot password?</a>
                                        </div>
                                    </div>                              
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success btn-block mb-2" name="login">Sign in</button>
                                        <button type="button" class="btn btn-block mb-2" data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane my-2" id="tab-register">
                                <form action="header.php" method="POST" name="signup">
                                    <div class="row">
                                        <div class="col-md-12 m-2">
                                            <div class="form-outline">
                                                <input required type="text" placeholder="Company name" required name="company_name" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 m-2 mt-0">
                                            <div class="form-outline">
                                                <input required type="email" placeholder="Company email address" required name="company_email" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <div class="form-outline d-inline-block px-2">
                                                <input required class="form-control" type="text" id="city" name="city" placeholder="City"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <div class="form-outline d-inline-block px-2">
                                                <input required class="form-control" type="text" id="state" name="state" placeholder="State"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <div class="form-outline d-inline-block px-2">
                                                <input required class="form-control" type="text" id="country" name="country" placeholder="Country"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <div class="form-outline d-inline-block px-2">
                                                <input required class="form-control" type="number" id="employeeCount" name="employeeCount" placeholder="No. of employees"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 m-2 mt-0">
                                            <select class="form-select" name="company_type" id="company_type" required>
                                                <option value="" disabled selected>Select company type</option>';
                                                    $sql = "SELECT * FROM company_type";
                                                    $result = $conn->query($sql);
                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {
                                                            echo '<option value="' . $row['type_id'] . '">' . $row['type_name'] . '</option>';
                                                        }
                                                    }
                                                    echo '
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 m-2 mt-0">
                                            <div class="form-outline">
                                                <input required type="number" placeholder="Office area (sq. m.)" required name="company_area" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3 mb-2">
                                        <div class="col">
                                        <p> <strong>Note:</strong> Username and password will be automatically generated and sent to your email. </p>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success btn-block mb-2" name="register">Register</button>
                                        <button type="reset" class="btn btn-block mb-2" data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    ';
    echo '
    <div class="modal fade" id="forgotPassword" tabindex="-1" role="dialog" aria-labelledby="forgot" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="forgot">Forgot Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <section class="login-form py-2">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="header.php" method="post">
                                        <div class="form-outline mb-4">
                                            <input required type="text" name="username" id="username" class="form-control" placeholder="Enter your username" />
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-success btn-block mb-2" name="forgot">Submit</button>
                                            <button type="reset" class="btn btn-block mb-2" data-bs-dismiss="modal">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    ';
}
?>