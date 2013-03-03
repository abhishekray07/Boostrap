<div class="container">
	<div class="hero-unit">
		<h2>Delete a Question</h2>

		<?php echo validation_errors(); ?>
		<?php echo form_open('question/delete') ?>

			<fieldset>
				<label for="name">Question</label> 
				<select name="question">
					<?php foreach ($questions as $question_item): ?>
					     <option value="<?php echo $question_item['id'] ?>"><?php echo $question_item['question'] ?></option>
					<?php endforeach ?>
				</select>
				<p><button type="submit" class="btn">Delete</button></p>
			</fieldset>
		</form>
	</div>
</div>