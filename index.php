<?php get_header(); ?>
<?php echo get_template_part( "parts/header_parts" ); ?>
            <!--▼コンテンツラップ開始▼-->
            <div id="content-wrap">
<?php echo get_template_part( "parts/logo_parts" ); ?>
<?php echo get_template_part( "parts/menu_parts" ); ?>
<?php echo get_template_part( "parts/nav_box_parts" ); ?>
<?php echo get_template_part( "parts/content_parts" ); ?>
            </div>
            <!--△コンテンツラップ終了△-->
<?php get_footer(); ?>