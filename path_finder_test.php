<html>
<head>
    <style type="text/css">

        body{
            background-color: black;
        }

        .colorZero{
            color : white;
        }

        .color1{
            color: #e23b17;
        }

        .color2{
            color: #178fe2;
        }

        .colorWarning{
            color: red;
        }

        .colorPath{
            color: red;
        }

    </style>
</head>
<body>

<?php

// function for path finding
function Pathfinder_function($ann, $array) {

    // run input through the neural network
    $out_arr = fann_run($ann, $array);
    echo "<h1 class='color1'>Testing Pathfinder:</h1>";
    
    // Print 5x5 input matrix
    for ($i = 0; $i <= 24; $i++){

        if(abs(round($array[$i]) == 1)) echo "<span class='colorPath'>" . abs(round($array[$i])) . "</span>"; 

        else echo "<span class='colorZero'>" .abs(round($array[$i])). "</span>";

        // Note that PHP_EOL represents the endline character for the current system. 
        if($i > 0 && ($i % 5) - 4 == 0) echo "<br>" . PHP_EOL;
    }
   
   // solution
    echo "<h1 class='color2'>Solution:</h1>";
  
    // Print 5x5 output matrix
    for ($i = 0; $i <= 24; $i++){

        if(abs(round($out_arr[$i]) == 1)) echo "<span class='colorPath'>" . abs(round($out_arr[$i])) . "</span>"; 
       
        else echo "<span class='colorZero'>" .abs(round($out_arr[$i])). "</span>";
    
        // Note that PHP_EOL represents the endline character for the current system.
        if($i > 0 && ($i % 5) - 4 == 0) echo "<br>" . PHP_EOL;
    }
}

// returns the full directory path of a file.
$train_f = (dirname(__FILE__) . "/path_finder_float.net");

// if the model is not trained properly or "path_finder_float.net" file is not created.
if (!is_file($train_f)) {
    die('<span class="colorWarning">path_finder_float.net has not been created! Please again properly train the model.<a href="path_finder_train.php">path_finder_train.php</a> to generate it</span>'. PHP_EOL);
}

   
// constructs a backpropagation neural network from file
$pathfinder_ann = fann_create_from_file($train_f);

// testing our model
if ($pathfinder_ann) {

    // input
    Pathfinder_function($pathfinder_ann, array(0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0));
    Pathfinder_function($pathfinder_ann, array(0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0));
    Pathfinder_function($pathfinder_ann, array(0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1));
    Pathfinder_function($pathfinder_ann, array(0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1));
    Pathfinder_function($pathfinder_ann, array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1));
    Pathfinder_function($pathfinder_ann, array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0));
    Pathfinder_function($pathfinder_ann, array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0));
    Pathfinder_function($pathfinder_ann, array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0));
    Pathfinder_function($pathfinder_ann, array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0));

} 

else {
    die('<span class="colorWarning">Unable to open Pathfinder.</span>' . PHP_EOL);
}

?>

</body>
</html>
