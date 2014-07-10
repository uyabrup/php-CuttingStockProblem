php-CuttingStockProblem
=======================

A PHP function for solving the Cutting Stock Problem. GPL.<br>
For more information, see <a href="http://en.wikipedia.org/wiki/Cutting_stock_problem">Wikipedia</a>

How to use:

* Require library: `require_once "src/cuttingStock.php";`
* Call the function `cuttingStock();` - see below for parameters.

Parameters to pass:

* 1) $inputPieces - an array of sizes of pieces available to cut from.
* 2) $outputSizes - an array of sizes of pieces to cut.
* 3) $margin - a buffer to add to each cut, default 0.
* 4) $showWorking - true/false - whether script will show working out, default false.

Output:

A multidimentional array where `$array['piecesToCut']` is an associative array containing a list of cuts to make and from which element `sizeToCut` is the amount to cut from element `inputPiece`; and where `$array['leftovers']` is an indexed array (starting at 1) containing the amount left over on each `$inputPiece`.

Example:

Run `example.php`.

Algorithm:

It uses a greedy brute-force type algorithm to make decisions; I'm sure there are more efficient ways!

Questions/Comments:

Send me an e-mail at <a href="mailto:j@jlls.info">j@jlls.info</a>
