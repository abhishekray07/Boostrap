<div class="container">

	<a class="btn btn-primary" href="<?php echo base_url('index.php/category/create') ?>">Create a new subject</a>
	<a class="btn btn-primary" href="<?php echo base_url('index.php/question/create') ?>">Create a new question</a>
	<p>
		<div class="hero-unit">
			<div class="page-header">
				<h2>Select your subject</h2>
			</div>

			<?php echo validation_errors(); ?>
			<?php echo form_open('category/index') ?>

			<fieldset>
				<select name="category_name">
					<?php foreach ($category as $category_item): ?>
					     <option value="<?php echo $category_item['name'] ?>"><?php echo $category_item['name'] ?></option>
					<?php endforeach ?>
				</select>
				<p>
					<button type="submit" class="btn btn-primary">Submit</button>
				</p>
			</fieldset>
		</div>
	</p>
</div>
