<?php
get_header();
?>
<div class="wrapper">
<div id="container" class="page-group">
        <div id="blog" class="left-col">
            <div id="post">
                <?php if (have_posts()): while(have_posts()): the_post();?>   
                    <h2 style="display:none;"><?php the_title();?></h2>           

                    <?php the_content();?>
                   
                    </div>
                    <?php endwhile; else:?>
                        <p><?php _e('Sorry, No posts were found!');?></p>
                    <?php endif;?>                    
            </div><!--End section post-->
        </div><!--End section blog-->
</div><!--End section container-->
    
</div>
<!--End Wrapper-->

<?php
get_footer();
?>