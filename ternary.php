<?php
$score = 50;

// if($score > 40){
//     echo "High score!";
// }else{
//     echo "low score :(";
// }
// echo  $score > 40 ? 'High Score' : 'Low Score :(';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ternary Operators</title>
</head>

<body>
    <p><?php echo $score > 40 ? 'High Score :)' : 'Low Score :(' ?></p>

</body>

</html>