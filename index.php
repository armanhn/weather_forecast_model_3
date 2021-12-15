<?php
$url = "https://api.openweathermap.org/data/2.5/forecast?q=Dhaka&appid=429bc1d0b2f34294dc0d3a0c95ff4035&units=metric";
$contents = file_get_contents($url);
$data = json_decode($contents);
$each = $data->list;
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="index.css">



    <title>Document</title>
</head>

<body>
    <div class="container">
        <h1>Five Days Forecast of Dhaka</h1>
        <div class="container">
            <div class="table-wrapper-scroll-y my-custom-scrollbar">
                <table id="mytable" class="table table-bordered table-striped mb-0">
                    <thead>
                        <tr>
                            <th scope="col">Serial</th>
                            <th scope="col">Date and Time</th>
                            <th scope="col">Temperature Maximum</th>
                            <th scope="col">Temperature Minimum</th>
                            <th scope="col">Weather Information</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for ($i = 0; $i < 40; $i++) {
                            echo "<tr>";
                            $b = $i;
                            $a = strval($b + 1);
                            echo "<th scope='row'>$a</th>";
                            echo "<td>";

                            $data = $each[$i]->dt;
                            $data_time = date('F j, Y, g:i a', $data);
                            echo $data_time;

                            echo "</td>";
                            echo "<td>";

                            $temp_max = $each[$i]->main->temp_max;

                            echo $temp_max . "&degC";

                            echo "</td>";
                            echo "<td>";

                            $temp_min = $each[$i]->main->temp_min;

                            echo $temp_min . "&degC";

                            echo "</td>";
                            echo "<td>";

                            $weather = $each[$i]->weather[0]->main;
                            $weather_description = $each[$i]->weather[0]->description;
                            $icon = $each[$i]->weather[0]->icon;

                            echo $weather . ", " . $weather_description . " " . "<img src='https://openweathermap.org/img/w/$icon.png' alt=''>";

                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>


</body>

</html>