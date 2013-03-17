<div class="container">
	<div class="hero-unit">
		<div class="page-header">
			<h3>Question Paper</h3>
		</div>
		<a href="<?php echo base_url($paper_item['question_path']) ?>" class="btn btn-large btn-primary" target="_blank">
				View the Questions </a>

		<div class="page-header">
			<h3>Answer The Questions</h3>
		</div>

		<?php $numQuestion = $paper_item['num_question']; ?>

		<?php $attributes = array('id' => 'form'); ?>
		<?php echo form_open('paper/answer', $attributes) ?>

		<fieldset>

			<?php for ($i=1; $i<=$paper_item['num_question']; $i++) { $textId = "answer".$i; ?>
				<label for="name"><?php echo "Question ".$i ?> </label> 
				<p><textarea rows="5" cols="35" name="answer" id="<?php echo $i ?>"></textarea></p>
			<?php } ?>
			<input id="hidden_field" name="hidden_field" type="hidden" value="<?php echo $paper_item['num_question']; ?>" />
			<p><button type="submit" class="btn" name='submit' id="submit">Submit</button></p>
		</fieldset>

	</div>
</div>