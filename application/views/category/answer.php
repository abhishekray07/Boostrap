<div class="container">
	<?php if ($answer == "TRUE") { ?>
		<div class="alert alert-success">
		  <button type="button" class="close" data-dismiss="alert">&times;</button>
		  <strong>Success!</strong> Your answer is correct.
		</div>
	<?php } else { ?>
		<div class="alert alert-error">
			 <button type="button" class="close" data-dismiss="alert">&times;</button>
			 <strong>Wrong!</strong> Your answer is incorrect.
		</div>
	<?php } ?>
		<a class="btn" href="<?php echo base_url('index.php/category/next') ?>">Next Question</a>
</div>