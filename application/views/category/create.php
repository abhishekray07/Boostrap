<div class="container">
	<div class="hero-unit">
		<h2>Create a new subject</h2>

		<?php echo validation_errors(); ?>

		<?php echo form_open('category/create') ?>

			<label for="name">Name</label> 
			<input type="text" placeholder="Type something…" name="name"> 
			
			<p><button type="submit" class="btn" name='submit'>Create</button></p>
		</form>
	</div>
</div>