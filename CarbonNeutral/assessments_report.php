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
    $sql = "SELECT * FROM company c, company_type t WHERE c.org_type = t.type_id AND c.c_id = '" . $_SESSION['user_id'] . "'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0 && $row = $result->fetch_assoc())
        $company = $row;
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        die();
    }
    $sql = "SELECT sum(response_value) as response, count(domain) as count, domain from response where company_id = '" . $_SESSION['user_id'] . "' group by domain";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $isAssessed = true;
        $domains = array();
        while ($row = $result->fetch_assoc())
            $domains[$row['domain']] = $row;
    } else {
        $isAssessed = false;
    }
    $improvements = array();
    $improvements['Packaging'] = array(
        'Reduce packaging material: The first step in making packaging more environmentally friendly is to reduce the amount of packaging material used. This can be achieved by using thinner, lighter-weight materials, and by eliminating unnecessary packaging.',
        'Use recyclable materials: Another important step is to use materials that can be recycled or composted, such as paper, cardboard, or bioplastics.',
        'Consider the entire lifecycle: When designing packaging, it is important to consider the entire lifecycle of the product, from raw materials extraction to disposal. This includes the environmental impact of the manufacturing process, transportation, and end-of-life disposal options.'
    );
    $improvements['Shipping'] = array(
        'Choose eco-friendly carriers: Choose carriers that prioritize sustainability and have green shipping options, such as carbon-neutral shipping, sustainable packaging options, and efficient routing systems.',
        'Optimize shipping routes: Optimize shipping routes to reduce transportation time and emissions, and to minimize the use of fossil fuels.',
        'Use electric or hybrid vehicles: Use electric or hybrid vehicles for local deliveries to reduce emissions and air pollution.'
    );
    $improvements['Resources'] = array(
        'Use sustainable materials: Use sustainable materials such as recycled paper, bamboo, or reclaimed wood for products, packaging, and office supplies.',
        'Partner with sustainable suppliers: Partner with suppliers who prioritize sustainability and have environmentally friendly practices such as sourcing materials locally, using renewable energy, or using eco-friendly packaging.'
    );
    $improvements['Water usage'] = array(
        'Fix leaks: Fix all leaks in faucets, toilets, and other plumbing fixtures. Leaks can waste a significant amount of water and can be costly over time.',
        'Implement water-saving practices: Implement water-saving practices such as turning off the tap while brushing teeth, using a broom instead of a hose to clean outdoor areas, and using high-efficiency washing machines and dishwashers.',
        'Recycle water: Recycle water by using greywater for landscaping or for flushing toilets. Greywater is wastewater from sinks, showers, and washing machines that can be reused for non-potable purposes.'
    );
    $improvements['Energy usage'] = array(
        'Implement energy-efficient practices: Implement energy-efficient practices such as using LED lighting, turning off lights and equipment when not in use, and using energy-efficient appliances.',
        'Use renewable energy: Use renewable energy sources such as solar panels, wind turbines, or hydropower to reduce reliance on fossil fuels and decrease carbon emissions.',
        'Upgrade HVAC systems: Upgrade heating, ventilation, and air conditioning (HVAC) systems to energy-efficient models. This can significantly reduce energy usage and improve indoor air quality.'
    );
    $improvements['Waste management'] = array(
        'Reduce paper waste: Implement paperless systems wherever possible, such as electronic invoicing, digital record keeping, and online communication. Use recycled paper for printing and limit the use of unnecessary printing.',
        'Implement recycling programs: Set up a recycling program for paper, cardboard, plastics, and other materials generated by the business. Make it easy for employees to recycle by providing recycling bins and education on proper disposal.',
        'Compost organic waste: Composting organic waste, such as food scraps, can reduce the amount of waste sent to landfills and create nutrient-rich soil for gardening or landscaping.'    
    );
    ?>
</head>


<body>
    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Assessment report</h2>
                    <ol>
                        <li><a href="index.php">Home</a></li>
                        <li>Assessment report</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Portfolio Details Section ======= -->
        <section id="report-section" class="portfolio-details">
            <div class="container">
                <div class="row gy-4">
                    <?php
                    if ($isAssessed) {
                    ?>
                    <div id="Info" class="col-lg-8 portfolio-info">
                        <div id="score_section">
                            <h3>Ratings</h3>
                            <p>
                                Here are the ratings based on your responses categorised by areas in your business.
                            </p>
                            <div class="" id="Progress">
                            <?php
                            foreach ($domains as $domain) {
                            ?>
                            <div class="row px-4 m-3 mt-4 mb-4">
                                <div class="col-4">
                                    <h4>
                                        <?php 
                                        echo $domain['domain'].":";
                                        
                                        ?>
                                    </h4>
                                </div>
                                <div class="col-8 mb-1">
                                    <?php echo $domain['response'] / ($domain['count']*5) * 100; ?>%    
                                    <div class="progress">
                                    <div
                                            class="progress-bar progress-bar-striped bg-success"
                                            role="progressbar"
                                            style="width: <?php echo $domain['response'] / ($domain['count']*5) * 100; ?>%"
                                            aria-valuenow="<?php echo $domain['response'] / ($domain['count']*5) * 100; ?>"
                                            aria-valuemin="0"
                                            aria-valuemax="100"
                                        ></div>
                                        
                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                            </div>
                        </div>
                        <!-- Get areas which need improvement -->
                        <?php 
                        $needed = array();
                        foreach ($domains as $domain) {
                            if ($domain['response'] / ($domain['count']*5) * 100 < 50)
                                array_push($needed, $domain);
                        }
                        if (count($needed) > 0) {
                        ?>
                        <div class="alert alert-danger mx-5" role="alert">
                            <h4 class="alert-heading">
                                Areas which need improvement
                            </h4>
                            <ul class="mb-0">
                                <?php
                                foreach ($needed as $domain) {
                                ?>
                                <li class="py-1"><?php echo $domain['domain']; ?></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                        <div id="suggestions" class="alert alert-success mx-5" role="alert">
                            <h4 class="alert-heading">
                                Suggestions for improvement
                            </h4>
                            <?php
                            foreach ($needed as $domain) {
                            ?>
                            <div class="row">
                                <div class="col-12">
                                    <strong>
                                        <?php 
                                        echo $domain['domain'];
                                        ?>
                                    </strong>
                                </div>
                                <div class="col-12 text-justify">
                                    <ul>
                                        <?php
                                        foreach ($improvements[$domain['domain']] as $improvement) {
                                        ?>
                                        <li><?php echo $improvement; ?></li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                        <?php
                        }
                        else {
                        ?>
                        <div class="alert alert-success mx-5" role="alert">
                            <h4 class="alert-heading">
                                Congratulations!
                            </h4>
                            <p class="mb-0">
                                You have done a great job in all areas. Keep up the good work!
                            </p>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                    <?php
                    } else {
                    ?>
                    <div class="col-lg-8">
                        <div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading">
                                You have not taken the assessment yet!
                            </h4>
                            <p class="mb-0">
                                Please <a href="assessments.php">take the assessment</a> to view your report.
                            </p>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                    <div class="col-lg-4">
                        <div class="portfolio-info">
                            <h3>Company information</h3>
                            <ul>
                                <li><strong>Company</strong>: <?php echo $company['c_name']; ?></li>
                                <li><strong>Number of employees</strong>: <?php echo $company['employee_count']; ?></li>
                                <li><strong>Organization type</strong>: <?php echo $company['type_name']; ?></li>
                                <li><strong>Date</strong>: <?php echo date('d-m-Y'); ?></li>
                                <li><strong><a href="javascript:void()" onclick="printReport()">Print report</a></strong></li>
                            </ul>
                        </div>
                        <div class="portfolio-info mt-4">
                            <h2>How is it calculated?</h2>
                            <p>
                                The ratings are calculated based on the responses you have given while taking the assessment. Every answer has a particular value.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Portfolio Details Section -->

    </main><!-- End #main -->
    <?php include 'footer.php'; ?>
</body>
<script>
    function printReport() {
        var printWindow = window.open('', '', 'height=800,width=800');
        printWindow.document.write(document.head.innerHTML);
        printWindow.document.write(document.getElementById('main').innerHTML);
        printWindow.print();
        printWindow.close();
    }
</script>
</html>