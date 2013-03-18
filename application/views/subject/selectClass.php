<div class="container">
	<div class="hero-unit">
		<h2>Select a Class</h2>

		<?php echo validation_errors(); ?>
		<?php echo form_open('subject/selectClass') ?>

			<fieldset>
				<label for="name">Class</label> 
				<select name="claass">
					<?php foreach ($claass as $claass_item): ?>
					     <option value="<?php echo $claass_item['id'] ?>"><?php echo $claass_item['name'] ?></option>
					<?php endforeach ?>
				</select>
				<p><button type="submit" class="btn">Select</button></p>
			</fieldset>
		</form>
	</div>
</div>