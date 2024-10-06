<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Circle</title>
</head>
<body>
    <form action="learningphp.php" method="post">
        <label>Radius</radius>
        <input type="text" name="radius">
        <button type="submit">Submit</button>
        <br>


</form>
</body>
</html>
<?php
    $radius= $_POST["radius"];
    $circumference=$radius * 2 * pi();
    $circumference=round($circumference , 2);
    $area=$radius * $radius * pi();
    $area=round($area , 2);
    $volume=4/3* pi() * $radius * $radius * $radius;
    $volume=round($volume , 2);

    echo "Circumference = {$circumference}cm <br>";
    echo "Area = {$area}cm^2 <br>";
    echo "Volume = {$volume}cm^3 <br>";



?>