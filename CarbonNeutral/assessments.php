<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assessments - Carboneutral</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <?php
    include 'header.php';
    if (!isset($_SESSION['user_id'])) {
    ?>
        <script>
            alert('You must be logged in to access this page');
            window.location.href = "index.php";
        </script>
    <?php
        die();
    }
    $sql = "SELECT * FROM questions WHERE org_type = '" . $_SESSION['user_type'] . "'";
    $result = $conn->query($sql);
    $questions = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($questions, $row);
        }
    }
    $sql = "SELECT * FROM company WHERE c_id = '" . $_SESSION['user_id'] . "'";
    $result = $conn->query($sql);
    $company = $result->fetch_assoc();

    $sql = "SELECT * FROM response WHERE company_id = '" . $_SESSION['user_id'] . "'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $responses = array();
        while ($row = $result->fetch_assoc())
            $responses[$row['question_id']] = $row['response_value'];
    }
    if (isset($_POST['main_assessment'])) {
        $sql = "DELETE FROM response WHERE company_id = '" . $_SESSION['user_id'] . "'";
        if ($conn->query($sql)) {
            foreach ($questions as $question) {
                $sql = "INSERT INTO response VALUES ('" . $_SESSION['user_id'] . "', '" . $question['q_id'] . "', '" . $_POST[$question['q_id']] . "', '" . $_POST['domain_' . $question['q_id']] . "')";
                $conn->query($sql);
            }
            echo "
            <script>
                alert('Assessment submitted successfully');
                window.location.href = 'assessments_report.php';
            </script>
            ";
        }
    }
    ?>
</head>

<body>
    <main id="main">

        <!-- ======= Services Section ======= -->
        <section id="services" class="services" style="margin-bottom:-30px">
            <div class="container">

                <div class="section-title">
                    <h2>
                        Assessment for <?php echo $company['c_name']; ?>
                    </h2>
                    <p>
                        Choose the answer that best describes your organization.
                    </p>
                </div>
                <div class="pb-4 text-center">
                    <form action="#" method="POST" name="main_assessment">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Questions</th>
                                <th scope="col" style="width: 50%;">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <p class="text-center">Option 1</p>
                                        </div>
                                        <div class="col-lg-3">
                                            <p class="text-center">Option 2</p>
                                        </div>
                                        <div class="col-lg-3">
                                            <p class="text-center">Option 3</p>
                                        </div>
                                        <div class="col-lg-3">
                                            <p class="text-center">Option 4</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php
                            foreach ($questions as $question) {
                                echo "
                                <tr>
                                    <td>
                                        <p>$question[question]</p>
                                    </td>
                                    <td>
                                        <div class='row'>
                                            <div class='col-3'>
                                                <input type='radio' name='$question[q_id]' value='$question[value1]' id='$question[option1]_$question[q_id]' required>
                                                <label for='$question[option1]_$question[q_id]'>$question[option1]</label>
                                            </div>
                                            <div class='col-3'>
                                                <input type='radio' name='$question[q_id]' value='$question[value2]' id='$question[option2]_$question[q_id]' required>
                                                <label for='$question[option2]_$question[q_id]'>$question[option2]</label>
                                            </div>
                                            <div class='col-3'>
                                                <input type='radio' name='$question[q_id]' value='$question[value3]' id='$question[option3]_$question[q_id]' required>
                                                <label for='$question[option3]_$question[q_id]'>$question[option3]</label>
                                            </div>
                                            <div class='col-3'>
                                                <input type='radio' name='$question[q_id]' value='$question[value4]' id='$question[option4]_$question[q_id]' required>
                                                <label for='$question[option4]_$question[q_id]'>$question[option4]</label>
                                            </div>
                                        </div>
                                    </td>
                                    <input type='hidden' name='domain_$question[q_id]' value='$question[domain]'>
                                </tr>
                            ";
                            }
                            ?>
                        </tbody>

                    </table>
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <button type="submit" class="btn btn-outline-success" name="main_assessment">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section><!-- End Services Section -->
    </main><!-- End #main -->
    <?php
    include 'footer.php';
    ?>
</body>

</html>