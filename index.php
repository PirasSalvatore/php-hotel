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
    // Filter hotels based on user input

    $filteredHotels = [];
    $filterParking = $_GET['parking'] ?? null;
    $filterVote = $_GET['vote'] ?? null;

    foreach ($hotels as $hotel) {
        $includeHotel = true;

        // Check for parking filter
        $filterParking ? ($hotel['parking'] === true ? $includeHotel = true : $includeHotel = false) : null;

        // Check for vote filter
       $filterVote ? ($hotel['vote'] >= (int)$filterVote ? $includeHotel = true : $includeHotel = false) : null;


        $includeHotel ? $filteredHotels[] = $hotel : null;
    }
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

<body class='bg-secondary-subtle'>

<div class="container">
    <form method="get">
        <div class="form-container row g-3 mb-5 mt-3 justify-content-center align-items-center ">

        <div class="col-2 mb-3 text-center">
            <label for="parking" class="form-label me-1">Parcheggio </label>
            <input class="form-check-input" id="parking" name="parking" type="checkbox" value="true" <?php echo $filterParking ? 'checked' : ''; ?>/>
        </div>

        <div class="col-2 mb-3 d-flex align-items-center">
            <span class="input-group-text bg-transparent" id="vote-label">Voto minimo</span>
            <input type="text" class="form-control" id="vote" name="vote" min="1" max="5" aria-describedby="vote-label" value ="<?php echo $filterVote; ?>" />
        </div>

        <div class="col-2 mb-3 text-center">
            <button type="submit" class="btn btn-primary">Filtra</button>
        </div>
        </div>
    </form>
</div>

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
                    foreach ($filteredHotels as $hotel){
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