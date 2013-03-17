<div class="container">
	<div class="hero-unit">
		<h2>Upload a new file</h2>
			<?php echo $error;?>
			<?php echo form_open_multipart('upload/do_upload');?>
			<input type="file" name="userfile1" size="20" />
			<br /><br />
			<input type="file" name="userfile2" size="20" />
			<p>
			<input type="submit" value="upload" />
			</p>
			</form>
	</div>
</div>