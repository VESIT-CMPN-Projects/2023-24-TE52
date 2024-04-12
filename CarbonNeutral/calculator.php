<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        Carbon Footprint Calculator
    </title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <?php 
    include 'header.php'; 
    ?>
</head>
<style>
    
</style>
<body>

    <main id="main">

        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container">

                <div class="section-title">
                    <h2>Calculate your carbon footprint</h2>
                    <p>
                        Several factors affect your carbon footprint. We consider the following factors in our
                        calculations:
                    </p>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="icon-box iconbox-blue">
                            <div class="icon">
                                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke="none" stroke-width="0" fill="#f5f5f5"
                                        d="M300,521.0016835830174C376.1290562159157,517.8887921683347,466.0731472004068,529.7835943286574,510.70327084640275,468.03025145048787C554.3714126377745,407.6079735673963,508.03601936045806,328.9844924480964,491.2728898941984,256.3432110539036C474.5976632858925,184.082847569629,479.9380746630129,96.60480741107993,416.23090153303,58.64404602377083C348.86323505073057,18.502131276798302,261.93793281208167,40.57373210992963,193.5410806939664,78.93577620505333C130.42746243093433,114.334589627462,98.30271207620316,179.96522072025542,76.75703585869454,249.04625023123273C51.97151888228291,328.5150500222984,13.704378332031375,421.85034740162234,66.52175969318436,486.19268352777647C119.04800174914682,550.1803526380478,217.28368757567262,524.383925680826,300,521.0016835830174">
                                    </path>
                                </svg>
                                <i class="bx bx-car"></i>
                            </div>
                            <h4><a href="">Vehicle used</a></h4>
                            <p>
                                The type of vehicle you use to travel to work, and the vehicles used in your business
                                has a significant impact on your carbon footprint.
                                The more fuel-efficient your vehicle is, the lower your carbon footprint will be.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
                        <div class="icon-box iconbox-orange ">
                            <div class="icon">
                                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke="none" stroke-width="0" fill="#f5f5f5"
                                        d="M300,582.0697525312426C382.5290701553225,586.8405444964366,449.9789794690241,525.3245884688669,502.5850820975895,461.55621195738473C556.606425686781,396.0723002908107,615.8543463187945,314.28637112970534,586.6730223649479,234.56875336149918C558.9533121215079,158.8439757836574,454.9685369536778,164.00468322053177,381.49747125262974,130.76875717737553C312.15926192815925,99.40240125094834,248.97055460311594,18.661163978235184,179.8680185752513,50.54337015887873C110.5421016452524,82.52863877960104,119.82277516462835,180.83849132639028,109.12597500060166,256.43424936330496C100.08760227029461,320.3096726198365,92.17705696193138,384.0621239912766,124.79988738764834,439.7174275375508C164.83382741302287,508.01625554203684,220.96474134820875,577.5009287672846,300,582.0697525312426">
                                    </path>
                                </svg>
                                <i class="bx bx-file"></i>
                            </div>
                            <h4><a href="">Resouce usage</a></h4>
                            <p>
                                The amount of resources you use in your business has a significant impact on your carbon
                                footprint.
                                The more resources you use, the higher your carbon footprint will be.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
                        <div class="icon-box iconbox-pink">
                            <div class="icon">
                                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke="none" stroke-width="0" fill="#f5f5f5"
                                        d="M300,541.5067337569781C382.14930387511276,545.0595476570109,479.8736841581634,548.3450877840088,526.4010558755058,480.5488172755941C571.5218469581645,414.80211281144784,517.5187510058486,332.0715597781072,496.52539010469104,255.14436215662573C477.37192572678356,184.95920475031193,473.57363656557914,105.61284051026155,413.0603344069578,65.22779650032875C343.27470386102294,18.654635553484475,251.2091493199835,5.337323636656869,175.0934190732945,40.62881213300186C97.87086631185822,76.43348514350839,51.98124368387456,156.15599469081315,36.44837278890362,239.84606092416172C21.716077023791087,319.22268207091537,43.775223500013084,401.1760424656574,96.891909868211,461.97329694683043C147.22146801428983,519.5804099606455,223.5754009179313,538.201503339737,300,541.5067337569781">
                                    </path>
                                </svg>
                                <i class="bx bx-tachometer"></i>
                            </div>
                            <h4><a href="">Energy usage</a></h4>
                            <p>
                                The energy you use comes from fossil fuels, which are burned to produce electricity.
                                The more energy you use, the higher your carbon footprint will be.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" >
                        <div class="icon-box iconbox-yellow">
                            <div class="icon">
                                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke="none" stroke-width="0" fill="#f5f5f5"
                                        d="M300,503.46388370962813C374.79870501325706,506.71871716319447,464.8034551963731,527.1746412648533,510.4981551193396,467.86667711651364C555.9287308511215,408.9015244558933,512.6030010748507,327.5744911775523,490.211057578863,256.5855673507754C471.097692560561,195.9906835881958,447.69079081568157,138.11976852964426,395.19560036434837,102.3242989838813C329.3053358748298,57.3949838291264,248.02791733380457,8.279543830951368,175.87071277845988,42.242879143198664C103.41431057327972,76.34704239035025,93.79494320519305,170.9812938413882,81.28167332365135,250.07896920659033C70.17666984294237,320.27484674793965,64.84698225790005,396.69656628748305,111.28512138212992,450.4950937839243C156.20124167950087,502.5303643271138,231.32542653798444,500.4755392045468,300,503.46388370962813">
                                    </path>
                                </svg>
                                <i class="bx bx-layer"></i>
                            </div>
                            <h4><a href="">Water usage</a></h4>
                            <p>
                                The water you use comes from the environment.
                                The more water you use, the higher your carbon footprint will be.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" >
                        <div class="icon-box iconbox-red">
                            <div class="icon">
                                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke="none" stroke-width="0" fill="#f5f5f5"
                                        d="M300,532.3542879108572C369.38199826031484,532.3153073249985,429.10787420159085,491.63046689027357,474.5244479745417,439.17860296908856C522.8885846962883,383.3225815378663,569.1668002868075,314.3205725914397,550.7432151929288,242.7694973846089C532.6665558377875,172.5657663291529,456.2379748765914,142.6223662098291,390.3689995646985,112.34683881706744C326.66090330228417,83.06452184765237,258.84405631176094,53.51806209861945,193.32584062364296,78.48882559362697C121.61183558270385,105.82097193414197,62.805066853699245,167.19869350419734,48.57481801355237,242.6138429142374C34.843463184063346,315.3850353017275,76.69343916112496,383.4422959591041,125.22947124332185,439.3748458443577C170.7312796277747,491.8107796887764,230.57421082200815,532.3932930995766,300,532.3542879108572">
                                    </path>
                                </svg>
                                <i class="bx bx-slideshow"></i>
                            </div>
                            <h4><a href="">Size of organization</a></h4>
                            <p>
                                The size of your organization is a factor in your carbon footprint.
                                The more people you have, the higher your carbon footprint will be.
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Services Section -->
        <!-- Create form to accept user's input to calculate their business' carbon footprint -->
        <section id="form" class="calculator">
            <div class="container">
                <div class="section-title">
                    <h2>Calculator</h2>
                </div>
                <div id="calculator">
                    <div class="row my-3">
                        <div class="col-md-6 form-group">
                            <label for="name">Business Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
                                required />
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="email">Business Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email"
                                required />
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-6 form-group">
                            <label for="name">Business Size (number of employees)</label>
                            <input type="number" min=1 name="name" class="form-control" id="numberOfEmployees"
                                placeholder="Business size (number of employees)" required />
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="country">Business Location</label>
                            <!-- select for countries USA, Canada, India, China, Japan -->
                            <select class="form-control" name="country" id="Country">
                                <option value="USA">USA</option>
                                <option value="Canada">Canada</option>
                                <option value="India">India</option>
                                <option value="China">China</option>
                                <option value="Japan">Japan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-6 form-group">
                            <label for="name">Business Type</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Business Type"
                                required />
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="businessIndustry">Business Industry</label>
                            <input type="text" class="form-control" name="businessIndustry" id="businessIndustry" placeholder="Your Business Industry "
                                required />
                        </div>
                    </div>
                    <!-- ask for energy usage and put a tooltip -->
                    <div class="row my-3">
                        <div class="col-md-6 form-group">
                            <label for="name">Energy Usage</label>
                            <input type="number" name="name" class="form-control" id="energyUsage"
                                placeholder="Energy usage (kWh)" required />
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="email">Water Usage</label>
                            <input type="number" class="form-control" name="email" id="waterUsage"
                                placeholder="Water usage (gallons)" required />
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-6 form-group">
                            <label for="name">Waste Generated</label>
                            <input type="number" name="name" class="form-control" id="wasteGenerated"
                                placeholder="Waste generated (lbs)" required />
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="email">Transportation</label>
                            <input type="number" class="form-control" name="email" id="transportation"
                                placeholder="Transportation (miles)" required />
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-6 form-group">
                            <label for="fuel">Fuel used</label>
                            <input type="number" name="fuel" class="form-control" id="fuelUsage"
                                placeholder="Fuel usage (daily in gallons)" required />
                        </div>
                    </div>
                    <div class="text-center">
                        <button onclick="calculate()" class="btn btn-success">Calculate</button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Display user's carbon footprint -->
        <section id="displayFootprint" class="p-1">
            <div class="alert alert-success d-none p-2" id="footPrintCalculated">
                <h2 class="text-center">The carbon emitted by your organization is <span id="carbonFootprint"></span> lbs</h2>
            </div>
            <div class="alert alert-danger d-none p-2 p-top-2" id="footPrintFailed">
                <h2 class="text-center">
                    Calculation failed. Please make sure you have entered all the values correctly.
                </h2>
            </div>
        </section>

    </main>
    <script>
        function calculate() {
            // get the values from the form
            const energyUsage = document.getElementById('energyUsage').value;
            const waterUsage = document.getElementById('waterUsage').value;
            const wasteGenerated = document.getElementById('wasteGenerated').value;
            const transportation = document.getElementById('transportation').value;

            // calculate the carbon footprint
            const emissionFactors = {
                "USA": {
                    "energy": 1.37,
                    "water": 0.085,
                    "waste": 0.0005,
                    "transportation": 0.0005
                },
                "Canada": {
                    "energy": 1.37,
                    "water": 0.085,
                    "waste": 0.0005,
                    "transportation": 0.0005
                },
                "India": {
                    "energy": 1.37,
                    "water": 0.085,
                    "waste": 0.0005,
                    "transportation": 0.0005
                },
                "China": {
                    "energy": 1.37,
                    "water": 0.085,
                    "waste": 0.0005,
                    "transportation": 0.0005
                },
                "Japan": {
                    "energy": 1.37,
                    "water": 0.085,
                    "waste": 0.0005,
                    "transportation": 0.0005
                }
            }
            var numberOfEmployees = document.getElementById('numberOfEmployees').value;
            var fuelUsage = document.getElementById('fuelUsage').value;
            var country = document.getElementById('Country').value;
            var energyEmission = emissionFactors[country]["energy"] * energyUsage;
            var waterEmission = emissionFactors[country]["water"] * waterUsage;
            var wasteEmission = emissionFactors[country]["waste"] * wasteGenerated;
            var transportationEmission = emissionFactors[country]["transportation"] * transportation * fuelUsage * numberOfEmployees * 5 * 50;
            var totalEmission = energyEmission + waterEmission + wasteEmission + transportationEmission;
            document.getElementById('carbonFootprint').innerHTML = totalEmission;
            if (totalEmission > 0) {
                document.getElementById('footPrintCalculated').classList.remove('d-none');
                document.getElementById('footPrintFailed').classList.add('d-none');
                Toastify({
                    text: `Success! The carbon emitted by your organization is ${totalEmission} lbs.`,
                    duration: 3000, // Duration in milliseconds
                    close: true, // Whether to show a close button
                    gravity: "top", // Toast position: 'top', 'bottom', 'left', 'right'
                    backgroundColor: "linear-gradient(to center, #28a745, #218838)", // Background color
                    stopOnFocus: true, // Stop timeout when focused
                    onClick: function(){} // Callback onClick
                }).showToast();
            } else {
                document.getElementById('footPrintCalculated').classList.add('d-none');
                document.getElementById('footPrintFailed').classList.remove('d-none');
                console.log("Toasting now");
                Toastify({
                    text: `Please provide required Details!`,
                    duration: 3000, // Duration in milliseconds
                    close: true, // Whether to show a close button
                    gravity: "top", // Toast position: 'top', 'bottom', 'left', 'right'
                    position: "",
                    backgroundColor: "linear-gradient(to center, #28a745, #218838)", // Background color
                    // className: 'alertFootprint',
                    stopOnFocus: true, // Stop timeout when focused
                    onClick: function(){} // Callback onClick
                }).showToast();
            }
        }
    </script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <?php
		include 'footer.php';
	?>

</body>

</html>
