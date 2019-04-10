<br>
<div class="col-md-8">
<small><?php echo $get_posts['created_at']; ?></small>
    <h2><a href="#"><?php echo $get_posts['title']; ?></a></h2>
    <p><?php echo $get_posts['body']; ?></p>
    <?php echo anchor('pages/edit_post/'.$get_posts["id"],'Edit Post');?> |
     <?php echo anchor('pages/delete_post/'.$get_posts["id"],'Delete Post');?></p>

</p>
</div>