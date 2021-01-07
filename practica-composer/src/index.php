<?php

    require_once 'vendor/autoload.php';

    $faker = Faker\Factory::create();
    

    $conn = mysqli_connect("localhost", "root", "", "icb0006_uf4_pr01");
    set_time_limit(1000); //para que no salga el error de "exceed time limit."

    

    for ($i = 0; $i<5000; $i++) {
    $clientID = $faker->unique()->randomNumber(4, false);
    $clientEmail = $faker->freeEmail();
    $date = $faker->dateTimeBetween();
    $dateFormat = $date->format('Y-m-d'); //formateo la variable
    $orderQty = $faker->numberBetween(1, 10000);

    $sql = "INSERT INTO clients (clientID, clientEmail, date, orderQty) VALUES ('".$clientID."',
    '".$clientEmail."', '".$dateFormat."', '".$orderQty."')";

    $result = mysqli_query($conn, $sql);
    }

    echo "Data added succesfully";
    
    // echo "<strong>ClientID: </strong>" . $faker->unique()->randomNumber(4, false) . "<br/>";
    // echo "ClientEmail: " . $faker->freeEmail() . "<br/>";
    // echo "Date: " . $faker->dateTimeBetween()->format("Y-M-D") . "<br/>";
    // echo "OrderQty: " . $faker->numberBetween(0, 10000) . "<br/>" . "<br/>";
    
?>