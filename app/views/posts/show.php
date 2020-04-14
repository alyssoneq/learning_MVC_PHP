<!--
This is a show view
This view shows details of the post selected
This view is loaded from the controller posts.php
This view is loaded inside the method show()
-->
<?php require APPROOT . '/views/inc/header.php';?>
<!-- This a arrow back icon to link the user back -->
<a href='<?php echo URLROOT; ?>/posts' class='btn btn-light'><i class="fa fa-arrow-left"></i></a>
<br>
<!-- The fetch OBJ mode allows to call data like an object -->
<!-- $data['post']->title gets the field title in posts table -->
<h1><?php echo $data['post']->title; ?></h1>
<!-- $data['user']->name gets the field name in the users table -->	
<!-- $data['post']->created_at gets the field created_at in the posts table -->	
<div class = 'bg-secondary text-white p-2 mb-3'>
	Written by <?php echo $data['user']->name; ?> on <?php echo $data['post']->created_at; ?>
</div>
<!-- $data['post']->title gets the field title in the posts table -->
<p><?php echo $data['post']->body; ?></p>

<!-- This code allows the delete / edit function -->
<!-- The delete / edit feature should only be available to the owner of the post -->
<?php if($data['post']->user_id == $_SESSION['user_id']):?>
	<hr>
	<!-- Edit feature -->
	<a href='<?php echo URLROOT; ?>/posts/edit/<?php echo $data['post']->id; ?>' class='btn btn-dark'><i class="fa fa-pencil"></i> Edit<a>
	
	<!-- Delete feature -->
	<form class= 'pull-right' action='<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']->id; ?>' method='post'>
		<input type='submit' value='delete' class='btn btn-danger'>
	</form>
<?php endif;?>

<?php require APPROOT . '/views/inc/footer.php';?>