<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

?>

<!doctype html>
<html lang='en'>
<head>
<!-- Required meta tags -->
<meta charset='utf-8'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<!-- Bootstrap CSS -->
<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'>
<title>PHP Hotel</title>
</head>

<body>

<section>
    <div class="container">
        <h1 class="text-center mb-5 mt-3">Elenco Hotel</h1>

        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th scope='col'>Nome</th>
                    <th scope='col'>Descrizione</th>
                    <th scope='col'>Parcheggio</th>
                    <th scope='col'>Voto</th>
                    <th scope='col'>Distanza dal centro (km)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($hotels as $hotel){
                        echo "<tr>";
                            foreach ($hotel as $key => $value) {
                                if ($key === 'parking') {
                                    $value = $value ? 'Si' : 'No';
                                }
                                echo "<td>{$value}</td>";
                            }
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>

</section>


</body>
</html>