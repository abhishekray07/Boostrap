<div class="container">
	<div class="hero-unit">
		<h2>Delete a Subject</h2>

		<?php echo validation_errors(); ?>
		<?php echo form_open('category/delete') ?>

			<fieldset>
				<label for="name">Subject</label> 
				<select name="category">
					<?php foreach ($category as $category_item): ?>
					     <option value="<?php echo $category_item['id'] ?>"><?php echo $category_item['name'] ?></option>
					<?php endforeach ?>
				</select>
				<p><button type="submit" class="btn">Delete</button></p>
			</fieldset>
		</form>
	</div>
</div>