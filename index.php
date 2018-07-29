<?php get_header();?>
<div class="center">
<table>
    <tbody>
        

   

<?php 
$count = 0;
if (have_posts()):
    while (have_posts()): the_post();
   
    if ($count % 2 == 0){ ?>

   

		          <tr>  <td ><ul><li><a href="<?php the_permalink();?>">
		<?php
        the_title_attribute();?>
		    </a>

		  <?php the_content();?>

		</li></ul>
        </td>
        
        <?php 
        }else{
    ?>
      <td ><ul><li><a  href="<?php the_permalink();?>">
		<?php
        the_title_attribute();?>
		    </a>
            <font size="1">
		  <?php the_content();?></font>

		</li></ul>
        </td></tr>

     

    <?php } ?>
        <?php
        $count++;
     
    endwhile;
endif;
?>   
</tbody>
</table>
</div>







<?php get_footer();?>