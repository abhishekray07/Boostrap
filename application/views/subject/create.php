<div class="container">
	<div class="hero-unit">
		<h2>Create a new Subject</h2>

		<?php echo validation_errors(); ?>

		<?php echo form_open('subject/create') ?>

			<fieldset>
				<label for="name">Subject Name</label> 
				<input type="text" name="subjectName" />

				<label for="name">Class</label> 
				<select name="class_id">
					<?php foreach ($claass as $claass_item): ?>
					     <option value="<?php echo $claass_item['id'] ?>"><?php echo $claass_item['name'] ?></option>
					<?php endforeach ?>
				</select>
				<p><button type="submit" class="btn">Create</button></p>
		</fieldset>
		</form>
	</div>
</div>