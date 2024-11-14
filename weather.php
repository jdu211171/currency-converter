<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <!-- css link -->
    <link rel="stylesheet" href="style.css">
    <!-- Box Icon plugin -->
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet">
</head>
<body>
    
    <div class="wrapper">
        <div class="wrapper">
            <header><i class="bx bx-left-arrow-alt"></i>Weather App</header>
            <!-- input and button -->
            <section class="input-part">
                <p class="info-text"></p>
                <input type="text" placeholder="Enter city here..." spellcheck="false" required>
                <div class="separator"></div>
                <button>Get Device Location</button>
            </section>
            <!-- weather display section -->
        <section class="weather-part">
            <img src="icons/cloud.svg" alt="weather icon">
            <div class="temp">
                <span class="numb">_</span> <span class="deg">°</span>C
            </div>

            <div class="weather">_ _</div>
            <div class="location">
                <i class="bx bx-map"></i>
                <span>_, _</span>
            </div>
            <div class="bottom-details">
                <div class="column feels">
                    <i class="bx bxs-thermometer"></i>
                    <div class="details">
                        <div class="temp">
                            <span class="numb-2">_</span>
                            <span class="deg">°</span>C
                        </div>
                        <P>Feels like</P>
                    </div>
                </div>

                <div class="column humidity">
                    <i class="bx bxs-droplet-half"></i>
                    <div class="details">
                            <span>_</span>
                            <p>Humidity</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="script.js"></script>
</body>
</html>


