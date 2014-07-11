<?php require_once "header.inc.php"; ?>

<div class="container">
	<form method="POST" action="example.php" class="form-horizontal">
	<fieldset>


	<!-- Textarea -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="inputs">Available pieces</label>
	  <div class="col-md-4">                     
		<textarea rows='6' class="form-control" id="inputs" name="inputs">one per line</textarea>
	  </div>
	</div>

	<!-- Textarea -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="outputs">Pieces to cut</label>
	  <div class="col-md-4">                     
		<textarea rows='6' class="form-control" id="outputs" name="outputs">one per line</textarea>
	  </div>
	</div>

	<!-- Button -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="submit">Then calculate!</label>
	  <div class="col-md-4">
		<button type="submit" id="submit" name="submit" class="btn btn-success">Calculate</button>
	  </div>
	</div>

	</fieldset>
	</form>
 
	
</div>
<?php require_once "footer.inc.php"; ?>