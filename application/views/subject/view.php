<div class="container">
	<ul class="breadcrumb">
	  <li><a href="<?php echo base_url('index.php/category/') ?>">Home</a> <span class="divider">/</span></li>
	  <li><a href="#"><?php echo $subject_item['name']; ?></a></li>
	</ul>
	
	<div class="hero-unit">
		<div class="page-header">
			<h3>Select your Paper</h3>
		</div>
			<?php foreach ($paper_items as $paper_item): ?>
				<p><a href="<?php echo base_url('index.php/paper/view/'.$paper_item['id']) ?>" class="btn btn-large btn-primary">
					<?php echo $paper_item['name'] ?></a></p>
			<?php endforeach ?>
	</div>
</div>