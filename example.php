<!DOCTYPE html>
<head>
	<title>Cutting Stock Solver Example</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	
	<style>
	body {
	  padding-top: 70px;
	}
	</style>
	
</head>
<body>

  <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Cutting Stock Solver</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="example.php">Home</a></li>
            <li><a href="http://github.com/lovattj/php-CuttingStockProblem" target="_blank">GitHub</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">
    
<?php require_once "src/cuttingStock.php"; ?>
<?php

// Make the request to the function. Make sure your input array index starts with 1.
// The output array index can start at 0 as is the default.

$inputs = Array(1 => 250, 250, 250, 250, 250);
$outputs = Array(30, 30, 36, 18, 18, 44, 44, 49, 20, 20, 20, 20, 66, 66, 71, 78, 78, 84, 19, 19, 20, 20, 93, 93, 99, 29, 30);
$resp = cuttingStock($inputs, $outputs);

echo "<p>";
	echo "** Output **";
	echo "<br><br>";
	
	// First, we identify the number of input pieces - this could be done in a variety of ways.
	
	$num_of_pieces = count($inputs); 
	
	// Then, we evaluate each input piece, and for each input piece we
	// iterate through the list of output cuts to make to see if the cut should be made from the input piece.
	// This effectively gives us a sorted list of cuts to make for each input piece.
	
	for ($i=1; $i<=$num_of_pieces; $i++) { 
		echo "** Cuts from Piece ".$i."**";
		echo "<br>";
		
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
		echo "<br><br>";
	}

	// Finally, we iterate through the array of leftover pieces and print
	// how much is left over on each input piece.
	
	echo "<br><br>";
	echo "** Leftovers **";
	echo "<br><br>";
	foreach ($resp['leftovers'] as $thePiece => $thePieceLeftover) {
		echo "Piece number ".$thePiece." has ".$thePieceLeftover." leftover";
		echo "<br>";
	}
echo "</p>";
?>
</div>
</body>
</html>