<h1>Post list: <?php echo $this->data['title'] ?></h1>

<ul>
<?php
foreach ($this->data['posts'] as $post) {
    echo '<li>'. $post->getTitle() .'</li>';
}
?>
</ul>
