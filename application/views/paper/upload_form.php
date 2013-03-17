<div class="container">
	<div class="hero-unit">
		<h2>Upload a new file</h2>
			<?php echo validation_errors(); ?>
			<?php echo $error;?>	
			<?php echo form_open_multipart('paper/create');?>

			<fieldset>
				<input type="file" name="userfile1" size="20" />
				<br /><br />
				<input type="file" name="userfile2" size="20" />

				<label for="name">Name</label> 
				<textarea rows="5" cols="40" name="name"></textarea>

				<label for="ans">Number of Questions</label> 
				<textarea rows="5" cols="40" name="num_question"></textarea>

				<label for="sol">Subject Id</label> 
				<textarea rows="15" cols="80" name="subject_id"></textarea>

				<p><button type="submit" class="btn">Create</button></p>
				
			</fieldset>

		</form>
	</div>
</div>