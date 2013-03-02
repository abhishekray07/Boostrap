<div class="container">
	<ul class="breadcrumb">
	  <li><a href="#">Home</a> <span class="divider">/</span></li>
	  <li><a href="#"><?php echo $category_item['name']; ?></a></li>
	</ul>
	
	<?php echo validation_errors(); ?>
	<?php $attributes = array('id' => 'form'); ?>
	<?php echo form_open('category/answer', $attributes) ?>
	<fieldset>
			<div class="hero-unit">
				<h3><?php echo $question['question']; ?></h3> <br />
				<textarea rows="15" cols="80" name="answer" oninput="this.form['submit'].disabled=false"></textarea>
				<p>
					<button type="submit" class="btn" name='submit' disabled>Submit</button>
				</p>
			</div>
		</fieldset>
</div>