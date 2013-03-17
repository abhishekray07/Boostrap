<div class="container">
	<div class="hero-unit">
		<h2>Upload a new file</h2>
			<?php echo validation_errors(); ?>
			<?php echo form_open_multipart('paper/create');?>

			<fieldset>
				<label for="name">Question</label> 
				<input type="file" name="userfile1" size="20" />

				<label for="name">Answer</label> 
				<input type="file" name="userfile2" size="20" />

				<label for="name">Name</label> 
				<input type="text" name="name" />

				<label for="ans">Number of Questions</label> 
				<input type="text" name="num_question" />

				<label for="sol">Subject Id</label> 
				<input type="text" name="subject_id" />

				<p><button type="submit" class="btn">Create</button></p>
				
			</fieldset>

		</form>
	</div>
</div>