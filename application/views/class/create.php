<div class="container">
	<div class="hero-unit">
		<h2>Create a new Class</h2>

		<?php echo validation_errors(); ?>

		<?php echo form_open('claass/create') ?>

			<fieldset>
				<label for="name">Class</label> 
				<input type="text" name="className" />

				<label for="name">Category</label> 
				<select name="category_id">
					<?php foreach ($category as $category_item): ?>
					     <option value="<?php echo $category_item['id'] ?>"><?php echo $category_item['name'] ?></option>
					<?php endforeach ?>
				</select>
				<p><button type="submit" class="btn">Create</button></p>
		</fieldset>
		</form>
	</div>
</div>