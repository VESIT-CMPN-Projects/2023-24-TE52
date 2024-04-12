<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <?php
    include 'header.php';
    if (!isset($_SESSION['user_id'])) {
    ?>
        <script>
            alert('You must be logged in to access this psize');
            window.location.href = "index.php";
        </script>
    <?php
        die();
    }
    $sql = "SELECT * FROM company WHERE c_id = '" . $_SESSION['user_id'] . "'";
    $result = $conn->query($sql);
    $company = $result->fetch_assoc();

    if (isset($_POST['updatecompany'])) {
        if ($_POST['password'] != $_POST['confirm']) {
            echo '<script>
            alert("Passwords do not match");
            window.location.href = "profile.php";
            </script>';
        }
        else {
            if (strlen($_POST['password']) != 0) {
                $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $sql = "UPDATE `company` SET `employee_count`='" . $_POST['employee_count'] . "',`city`='" . $_POST['city'] . "',`state`='" . $_POST['state'] . "',`country`='" . $_POST['country'] . "',`office_area`='" . $_POST['office_area'] . "',`password`='" . $password_hash . "' WHERE c_id = '" . $_SESSION['user_id'] . "'";
            }
            else {
                $sql = "UPDATE `company` SET `employee_count`='" . $_POST['employee_count'] . "',`city`='" . $_POST['city'] . "',`state`='" . $_POST['state'] . "',`country`='" . $_POST['country'] . "',`office_area`='" . $_POST['office_area'] . "' WHERE c_id = '" . $_SESSION['user_id'] . "'";
            }
            $result = $conn->query($sql);
            // echo $sql;
            if ($result) {
                echo '<script>
                    alert("Company information updated successfully");
                    window.location.href = "profile.php";
                </script>';
            }
            else {
                $pass = $_POST['password'];
                echo '<script>
                alert("Error updating company information $conn->error " + pass);
                window.location.href = "profile.php";
                </script>';
            }
        }
    }


    ?>

</head>
<body>
<div class="container">
        <section class="pt-1">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-2 text-center text-md-end">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="psize">
                                    <?php echo $company['c_name']; ?>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <div class="imsize-container">
                                    <img src="https://imgs.search.brave.com/fEPD4fT4QKnLvHsqWNRFlvtiZZzxqOSWOBRQqzbGNB8/rs:fit:1200:1200:1/g:ce/aHR0cDovL3BsdXNw/bmcuY29tL2ltZy1w/bmcvdXNlci1wbmct/aWNvbi1iaWctaW1h/Z2UtcG5nLTIyNDAu/cG5n" alt="User icon" class="rounded-circle img-fluid" style="width: 150px;">
                                    
                                </div>
                                
                                
                                <h5 class="my-3">
                                    <?php echo $company['c_name']?>
                                </h5>
                                <p class="text-muted mb-4">
                                    <?php echo $company['city'] . ", " . $company['state'] ?>
                                </p>
                                <p class="text-muted mb-1">
                                    <?php echo "Number of employees: " . $company['employee_count'] ?> 
                                </p>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <section id="tabs" class="tabs pt-0">
                            <div class="container">
                                
                                <div class="tab-content">
                                    <div class="tab-pane active show" id="tab-1">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <h5 class="py-3">
                                                    Company information
                                                </h5>
                                            </div>
                                            <div class="col-md-8 d-flex justify-content-end">
                                                <button type="button" class="btn text-danger d-block" data-bs-toggle="modal" data-bs-target="#editcompanyinfo">
                                                    <i class="fas fa-pencil-alt" style="color: #5cb874;"></i>
                                                </button>

                                                <div class="modal fade" id="editcompanyinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Update Compay Information</h5>
                                                                <button type="button" class="btn close" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="profile.php" method="POST">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group mb-4">
                                                                                <input type="text" required class="form-control" id="companyname" name="companyname" disabled placeholder="Company name" value="<?php echo $company['c_name'] ?>">
                                                                            </div>
                                                                            
                                                                            <div class="form-group mb-4">
                                                                                <input type="number" required class="form-control" id="size" name="employee_count" placeholder="Company Size" value="<?php echo $company['employee_count'] ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group mb-4">
                                                                                <input type="text" required class="form-control" id="email" name="email" disabled placeholder="Email" value="<?php echo $company['email'] ?>">
                                                                            </div>
                                                                            <div class="form-group mb-2">
                                                                                <input type="text" required class="form-control" id="city" name="city" placeholder="City" value="<?php echo $company['city'] ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group mb-4">
                                                                                <input type="text" required class="form-control" id="state" name="state" placeholder="State" value="<?php echo $company['state'] ?>">
                                                                            </div>
                                                                            <div class="form-group mb-4">
                                                                                <input type="number" required class="form-control" id="office_area" name="office_area" placeholder="Area" value="<?php echo $company['office_area'] ?>">
                                                                            </div> 
                                                                             
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group mb-4">
                                                                                <input type="text" required class="form-control" id="country" name="country" placeholder="Country" value="<?php echo $company['country'] ?>">
                                                                            </div> 
                                                                        </div>
                                                                        <hr>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group mb-4">
                                                                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                                                                
                                                                        </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group mb-4">
                                                                                <input type="password" class="form-control" id="confirm" name="confirm" placeholder="Confirm Password">
                                                                            </div>
                                                                        </div>
                                                                    </div>  
                                                                    <div class="text-center">
                                                                    <hr>
                                                                        <button type="submit" class="btn btn-primary m-auto" name="updatecompany">Update</button>     
                                                                    </div> 
                                                                </form> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="card mb-4">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <p class="mb-0">Company </p>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <p class="text-muted mb-0">
                                                                    <?php echo $company['c_name'] ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <p class="mb-0">Size</p>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <p class="text-muted mb-0">
                                                                    <?php echo $company['employee_count']; ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                            
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <p class="mb-0">Email</p>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <p class="text-muted mb-0">
                                                                    <?php echo $company['email']; ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card mb-4">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <p class="mb-0">Location</p>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <p class="text-muted mb-0">
                                                                    <?php echo $company['city'] . ", " . $company['state'] . ", " . $company['country']?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <p class="mb-0">Office Area</p>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <p class="text-muted mb-0">
                                                                    <?php echo $company['office_area'] ?> sq. m.
                                                                </p>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                    </div>
        </section>
        <!--//Tabs-Section -->
    </div>
    <?php
    include 'footer.php'
    ?>
</body>
</html>