<div class="container">
	<ul class="breadcrumb">
	  <li><a href="<?php echo base_url('index.php/category/') ?>">Home</a> <span class="divider">/</span></li>
	  <li><a href="#"><?php echo $class_item['name']; ?></a></li>
	</ul>
	
	<div class="hero-unit">
		<div class="page-header">
			<h3>Select your Subject</h3>
		</div>
			<?php foreach ($subject_items as $subject_item): ?>
				<p><a href="<?php echo base_url('index.php/subject/view/'.$subject_item['id']) ?>" class="btn btn-large btn-primary">
					<?php echo $subject_item['name'] ?></a></p>
			<?php endforeach ?>
	</div>
</div>