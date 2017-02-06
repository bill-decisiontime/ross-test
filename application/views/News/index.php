//This is the View for displaying different articles in the news. It was written using a 
//CodeIgnitor tutorial found here:- https://codeigniter.com/userguide2/tutorial/static_pages.html.

<?php foreach ($news as $news_item): ?>

    <h2><?php echo $news_item['title'] ?></h2>
    <div class="main">
        <?php echo $news_item['text'] ?>
    </div>
    <p><a href="/news/<?php echo $news_item['slug'] ?>">View article</a></p>

<?php endforeach ?>
