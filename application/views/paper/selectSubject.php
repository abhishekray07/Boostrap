<div class="container">
	<div class="hero-unit">
		<h2>Select a Subject</h2>

		<?php echo validation_errors(); ?>
		<?php echo form_open('paper/selectSubject') ?>

			<fieldset>
				<label for="name">Subject</label> 
				<select name="subject">
					<?php foreach ($subjects as $subject_item): ?>
					     <option value="<?php echo $subject_item['id'] ?>"><?php echo $subject_item['name'] ?></option>
					<?php endforeach ?>
				</select>
				<p><button type="submit" class="btn">Select</button></p>
			</fieldset>
		</form>
	</div>
</div>