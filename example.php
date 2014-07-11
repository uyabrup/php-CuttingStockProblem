<?php require_once "header.inc.php"; ?>
<?php require_once "src/cuttingStock.php"; ?>

<div class="container">

<?php

// Make the request to the function. Make sure your input array index starts with 1.
// The output array index can start at 0 as is the default.

$inputs = explode("\n", $_POST['inputs']);
$inputs = array_filter(array_merge(array(0), $inputs));
$outputs = explode("\n", $_POST['outputs']);

$resp = cuttingStock($inputs, $outputs);

echo "<p>";
	echo "<h3>Results</h3>";
	echo "<br>";
	// First, we identify the number of input pieces - this could be done in a variety of ways.
	
	$num_of_pieces = count($inputs); 
	
	// Then, we evaluate each input piece, and for each input piece we
	// iterate through the list of output cuts to make to see if the cut should be made from the input piece.
	// This effectively gives us a sorted list of cuts to make for each input piece.
	
	for ($i=1; $i<=$num_of_pieces; $i++) { 
		echo "<div class='lead'>&bull; Cuts to make from Piece ".$i.":</div>";
		
		echo "<div class='progress'>";
		$i2 = 0;
		foreach($resp['piecesToCut'] as $chop) {
			
			if ($chop['inputPiece'] == $i) {
				$perc = (($chop['sizeToCut']/$inputs[$i])*100);
				if ($i2 % 2 == 0) {
					echo "<div class='progress-bar' role='progressbar' ";
				} else {
					echo "<div class='progress-bar progress-bar-info' role='progressbar' ";
				}				
				echo "style='width: ".$perc."%;' aria-valuenow='".$chop['sizeToCut']."' aria-valuemin='0' aria-valuemax='".$inputs[$i]."'>";
				echo $chop['sizeToCut'];
				echo "</div>";
				$i2++;
			}
		}
		echo "</div>";
		echo "<br>";
	}

	// Finally, we iterate through the array of leftover pieces and print
	// how much is left over on each input piece.
	echo "<h3>Leftovers</h3>";
	echo "<br>";
	foreach ($resp['leftovers'] as $thePiece => $thePieceLeftover) {
		echo "&bull; Piece number ".$thePiece." has ".$thePieceLeftover." leftover";
		echo "<br>";
	}
echo "</p>";
?>
</div>
<?php require_once "footer.inc.php"; ?>