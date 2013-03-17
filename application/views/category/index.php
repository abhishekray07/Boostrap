<div class="container">

	<p>
		<div class="hero-unit">
			<div class="page-header">
				<h3>Select your Level</h3>
			</div>
				<?php foreach ($category as $category_item): ?>
					<p><a href="<?php echo base_url('index.php/category/view/'.$category_item['id']) ?>" class="btn btn-large btn-primary"><?php echo $category_item['name'] ?></a></p>
				<?php endforeach ?>
		</div>
	</p>
</div>
