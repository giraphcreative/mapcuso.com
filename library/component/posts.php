<?php

// get post list specs
$mode = get_sub_field( 'mode' );
$filter_arg = '';
if ( $mode == 'filtered' ):
    $category = implode( ',', get_sub_field( 'category' ) );
    $filter_arg = ( $mode !='all' ? ' cats="' . $category . '"' : '' );
endif;

// posts per page
$posts_per_page = get_sub_field( 'posts_per_page' );
$color = get_sub_field( 'color' );
$padding = get_sub_field( 'padding' );

$more_news = get_sub_field( 'more_news' );
$more_news_link = get_sub_field( 'more_news_link' );

?>
<div class="post-list-container <?php print $color . ' ' . $padding ?>">
    <div class="post-list">
        <?php print do_shortcode( '[articles ' . $filter_arg . ' posts_per_page="' . $posts_per_page . '" /]' ); ?>
    </div>
    <?php if ( $more_news ) : ?><p class="text-center"><a href="<?php print $more_news_link['url'] ?>" class="btn red"><?php print $more_news_link['title'] ?></a></p><?php endif; ?>
</div>
<?php

