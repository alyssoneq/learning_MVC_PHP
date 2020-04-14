<?php require APPROOT . '/views/inc/header.php';?>

	<a href='<?php echo URLROOT; ?>/posts' class='btn btn-light'><i class="fa fa-arrow-left"></i> </a>
	<div class='card card-body bg-light mt-3'>
		<h2> Add post </h2>
		<p> Use this form to create a post </p>
				
		<!-- The action attribute receives the url -->
		<form action="<?php echo URLROOT; ?>/posts/add" method="post">
				
			<div class="form-group">
				<label for="title"> Title: <sup>*</sup></label>
				<input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err']))? 'is-invalid' : ''; ?>" value="<?php echo $data['title'];?>">
				<span class="invalid-feedback"> <?php echo $data['title_err'];?> </span>
			</div>
			<div class="form-group">
				<label for="body"> Body: <sup>*</sup></label>
				<textarea name="body" class="form-control form-control-lg <?php echo (!empty($data['body_err']))? 'is-invalid' : ''; ?>"><?php echo $data['body'];?></textarea>
				<span class="invalid-feedback"> <?php echo $data['body_err'];?> </span>
			</div>
			<input type='submit' class='btn btn-success' value='submit'>
		</form>
	</div>


<?php require APPROOT . '/views/inc/footer.php';?>