<?php if(is_page( '34' ) || is_page( '321' ) || is_category() || is_tag() || is_search() || is_single() ): ?>
<!-- index:ブログTOP,シングル投稿ページ | noindex:カテゴリー,タグ,検索ページ
======================================================================================================================================== -->
<div id="side">
<?php echo get_template_part( "parts/adsense_sidebar_pc" ); ?>
<!-- sidebar -->
<div id="sidebar">
      <?php
      if (is_active_sidebar('sidebar-1')):
        dynamic_sidebar('sidebar-1');
        else:
      ?>
    <div class="widget">
        <h2>No Widget</h2>
        <p>ウィジットは設定されていません。</p>
    </div>
    <?php endif;?>
</div>
<!-- /sidebar -->
<?php echo get_template_part( "parts/sidebar_related_article_parts" ); ?>
<div style="margin-bottom: 1em;" class="single-widget go2top cf">
<a style="color: #FFFFFF;" href="<?php echo get_permalink(321); ?>" class="go2top-button-2"><div class="button">ブログサイトマップ</div></a>
</div>
<!-- 広告 -->
<!-- /広告 -->
</div>
<!--end side-->
<?php elseif(is_archive( 'column' ) ): ?>
<!-- コラムアーカイブ(コラムシングルはテンプレートに直書き)
======================================================================================================================================== -->
<div id="side">
    <div id="page_side">
        <div class="sidebox">
            <img src="<?php echo get_template_directory_uri(); ?>/img/catlogo_column.png" alt="NEWS COLUMN" />
        </div>
            <?php echo get_template_part( "parts/sidebar_menu_parts" ); ?>
        <div class="sidebox">
            <a href="<?php echo get_page_link(34); ?>"><img src="<?php echo get_template_directory_uri();?>/img/blog_icon170_rollout.png" alt="ニコニコブログ" /></a>
        </div>
        <div class="banner1">
            <a href="<?php echo get_page_link(170); ?>"><img src="<?php echo get_template_directory_uri();?>/img/superdiscount_banner_rollout.png" alt="オールインワンパッケージ" /></a>
        </div>
    </div>
    <!--end page_side-->
</div>
<!--end side-->
<?php elseif(is_page() ): ?>
<!-- ◆noindex:プライバシーポリシー195,サイトマップ188　◆index:パッケージ170、固定ページ
======================================================================================================================================== -->
<div id="side">
  <div id="page_side">
    <div class="sidebox">
      <img src="<?php echo get_template_directory_uri(); ?>/img/catlogo_web.png" alt="Web Design" />
    </div>
      <?php echo get_template_part( "parts/sidebar_menu_parts" ); ?>
    <div class="sidebox">
      <a href="<?php echo get_page_link(34); ?>"><img src="<?php echo get_template_directory_uri();?>/img/blog_icon170_rollout.png" alt="ニコニコブログ" /></a>
    </div>
    <div class="banner1">
      <a href="<?php echo get_page_link(170); ?>"><img src="<?php echo get_template_directory_uri();?>/img/superdiscount_banner_rollout.png" alt="オールインワンパッケージ" /></a>
    </div>
    <div class="banner">
      <a href="<?php echo $url = get_post_type_archive_link( 'column' ); ?>"><img src="<?php echo get_template_directory_uri();?>/img/column_banner_rollout.png" alt="コラム" /></a>
    </div>
  </div>
  <!--end page_side-->
</div>
<!--end side-->
<?php endif; ?>