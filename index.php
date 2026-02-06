<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EX - PHP Hotel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
  <div class="container pt-5">

    <h1>EX - PHP Hotel</h1>

    <form action="" method="get" class="border rounded p-4 shadow-sm mb-5" style="width: 350px;">
      <h6 class="mb-3">Filter by:</h6>

      <div class="form-check form-switch mb-3">
        <input class="form-check-input" type="checkbox" role="switch" name="parking_available" id="parking_available" <?php if (!empty($_GET["parking_available"])) echo "checked" ?>>
        <label class="form-check-label" for="parking_available">
          Parking available ONLY
        </label>
      </div>

      <div class="mb-3">
        <label for="vote" class="form-label small fw-bold">Minimum vote:</label>
        <input class="form-control" type="number" name="vote" id="vote" placeholder="e.g. 1 to 5" min="1" max="5" value=<?php if (!empty($_GET["vote"])) echo $_GET["vote"] ?>>
      </div>

      <button type="submit" class="btn btn-primary w-100">Confirm</button>
    </form>

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
    # var_dump($hotels);
    /*
    foreach ($hotels as $hotel) {
      foreach ($hotel as $key => $value) {
        echo "$key: $value<br>";
      }
      echo "<br>";
    }
    */
    ?>


    <table class="table mt-4">
      <thead>
        <tr>
          <th>Nome</th>
          <th>Descrizione</th>
          <th>Parcheggio</th>
          <th>Voto</th>
          <th>Distanza</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($hotels as $hotel) {
          $filterParking = empty($_GET["parking_available"]) || $hotel['parking'];
          $filterVote = empty($_GET["vote"]) || $hotel['vote'] >= $_GET["vote"];

          if ($filterParking && $filterVote) {
            $parkingText = $hotel['parking'] ? "Disponibile" : "Non disponibile";
            echo "<tr>";
            echo "<td>{$hotel['name']}</td>";
            echo "<td>{$hotel['description']}</td>";
            echo "<td>{$parkingText}</td>";
            echo "<td>{$hotel['vote']} / 5</td>";
            echo "<td>{$hotel['distance_to_center']} km</td>";
            echo "</tr>";
          }
        }
        ?>
      </tbody>
    </table>
  </div>


</body>

</html>