<!DOCTYPE html>
<head>
	<title>Cutting Stock Solver Example</title>
</head>
<body>
<h3>Cutting Stock Solver Example</h3>
<?php require_once "src/cuttingStock.php"; ?>
<?php
$resp = cuttingStock(array(250, 250, 250, 250, 250), array(72, 72, 61, 58, 82, 103, 51, 42));

echo "<p>";
	echo "** Output **";
	echo "<br><br>";
	foreach ($resp['piecesToCut'] as $chop) {
		echo "Cut ".$chop['sizeToCut']." from piece number ".$chop['inputPiece'];
		echo "<br>";
	}
	
	echo "<br><br>";
	echo "** Leftovers **";
	echo "<br><br>";
	foreach ($resp['leftovers'] as $thePiece => $thePieceLeftover) {
		echo "Piece number ".$thePiece." has ".$thePieceLeftover." leftover";
		echo "<br>";
	}
echo "</p>";
?>
</body>
</html>