<?php

function cuttingStock($inputPieces, $outputSizes, $margin=0, $showWorking=false) {
	$inputPieces = array_map('intval', $inputPieces);
	$outputSizes = array_map('intval', $outputSizes);
	rsort($outputSizes);
	
	if($showWorking == true) {
		echo "**Showing Working**";
		echo "<br><br>";
		print_r($inputPieces);
		echo "<br>";
		print_r($outputSizes);
		echo "<br><br>";
	}
	
	$num_of_input = count($inputPieces);
	$fInput = array();
	$fOutput = array();
	for($i=1; $i<=$num_of_input; $i++) {
		$fInput[$i] = $inputPieces[$i];
		
	}
	if($showWorking == true) {
		print_r($fInput);
		echo "<br><br>";
	}

	foreach ($outputSizes as $output) {
		for ($i=1; $i<=$num_of_input; $i++) {
			if ($showWorking == true) {
				echo "Evaluating output requirement ".$output." against input ".$i." whose value is ".$fInput[$i];
				echo "<br>";
			}
			
			if (($fInput[$i] - $output) >= 0) {
				if ($showWorking == true) {
					echo "Output was satisfied by piece ".$i;
				}
				$fInput[$i] = $fInput[$i] - $output;
				if ($showWorking == true) {
					echo ". New value of ".$i." is ".$fInput[$i]."<br>";
				}
				array_push($fOutput, Array('inputPiece' => $i, 'sizeToCut' => $output));
				break;
			}
		}
	}
	
	$outputArray = Array();
	$outputArray['piecesToCut'] = $fOutput;
	$outputArray['leftovers'] = $fInput;
	
	return $outputArray;
	
}
?>