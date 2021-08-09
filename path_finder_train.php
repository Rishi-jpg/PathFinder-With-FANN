<?php

// parameters for ANN model
$num_input = 25;
$num_output = 25;
$num_layers = 3;
$num_neurons_hidden = 70;
$desired_error = 0.001;
$max_epochs = 5000000;
$epochs_btw_reports = 1000;

// creating fully connected standard backpropagation neural network
$pf_ann = fann_create_standard($num_layers, $num_input, $num_neurons_hidden, $num_output);


if ($pf_ann) {

	// set activation function for all hidden layers.
	fann_set_activation_function_hidden($pf_ann, FANN_SIGMOID_SYMMETRIC);

	// set activation function for output layer.
	fann_set_activation_function_output($pf_ann, FANN_SIGMOID_SYMMETRIC);
	
	// store the file path in a variable 
	$filename = dirname(__FILE__) . "/path_finder.data";

	// The whole dataset is read from file and trained.
	if (fann_train_on_file($pf_ann, $filename, $max_epochs, $epochs_btw_reports, $desired_error)){
		// saves the entire network
		fann_save($pf_ann, dirname(__FILE__) . "/path_finder_float.net");
	}
	
	// destroy the entire network	
	fann_destroy($pf_ann);
	echo "<h1'>Training Complete!</h1> <br> <a href='path_finder_test.php'>Test Pathfinder</a>";
}

?>