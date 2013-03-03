<div class="container">
	<div class="hero-unit">
		<h2>Create a new Question</h2>

		<?php echo validation_errors(); ?>

		<?php echo form_open('question/create') ?>

			<fieldset>
				<label for="name">Question</label> 
				<textarea rows="5" cols="40" name="question"></textarea>

				<label for="ans">Answer</label> 
				<textarea rows="5" cols="40" name="answer"></textarea>

				<label for="sol">Solution</label> 
				<textarea rows="15" cols="80" name="solution"></textarea>

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