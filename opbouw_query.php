<?php 
if(is_singular('tips')):
    $currentID = get_the_ID();
    $exclude_current = array($currentID);
    $tips_args = array( 'post_type' => 'tips', 'post__not_in' => $exclude_current );
elseif(is_singular('page') && !is_front_page() || is_singular('portfolio')):
    $include_posts = array();
    foreach(get_the_category() as $category):
        array_push($include_posts, $category->term_id);
    endforeach;

    $currentID = get_the_ID();
    $exclude_current = array($currentID);


    $tips_args = array(
        'post_type' => 'portfolio',
        'category__in' => $include_posts,
        'post__not_in' => $exclude_current
    );
else:
    $tips_args = array( 'post_type' => 'tips' );
endif;


$tips_query = new WP_Query( $tips_args );
$post_count = 0;
?>