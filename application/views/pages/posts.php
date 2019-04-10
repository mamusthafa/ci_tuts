<br>
<?php foreach($get_posts as $gp):
    $body = word_limiter($gp['body'], 25);
    ?>
<div class="col-md-8 m-top-40">
    <small><?php echo $gp['created_at']; ?></small>
    <h2><a href="#"><?php echo $gp['title']; ?></a></h2>
    <p><?php echo $body; ?>
    <?php echo anchor('pages/view_post/'.$gp["id"],'Read more');?></p>

</div>
<?php endforeach; ?>