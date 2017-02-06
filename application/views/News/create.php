//This is the View for creating the news. It was written using a CodeIgnitor
//tutorial found here:- https://codeigniter.com/userguide2/tutorial/static_pages.html.

<h2>Create a news item</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('news/create') ?>

	<label for="title">Title</label>
	<input type="input" name="title" /><br />

	<label for="text">Text</label>
	<textarea name="text"></textarea><br />

	<input type="submit" name="submit" value="Create news item" />

</form>
