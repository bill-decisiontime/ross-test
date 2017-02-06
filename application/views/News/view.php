//This is the View for displaying individual news article which are displayed on the index view.
//It was written using a CodeIgnitor tutorial found here:- https://codeigniter.com/userguide2/tutorial/static_pages.html.

<?php
echo '<h2>'.$news_item['title'].'</h2>';
echo $news_item['text'];
