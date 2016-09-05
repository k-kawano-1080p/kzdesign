<?php if(is_page( '2' ) ): ?>
<!-- 作品集ページ
======================================================================================================================================== -->
<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <?php //指定ページにnoindexタグを出力
    if (get_post_meta($post->ID, "noindex", true))
    {echo '<meta name="robots" content="noindex,nofollow" />';print("\n");};
    ?>
    <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo get_template_directory_uri(); ?>/css/style.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/portfolio.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/jquery.bxslider.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/masonry.css">
    <link href="<?php echo get_template_directory_uri(); ?>/css/lightbox.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/default.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/component.css" />
    <!-- IcoMoonウェブアイコンフォントの呼び出し -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/icomoon/style.css">
<?php print("\n"); ?>
<?php elseif( is_page( '12' ) ): ?>
<!-- お問い合わせページ
======================================================================================================================================== -->
<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <?php //指定ページにnoindexタグを出力
    if (get_post_meta($post->ID, "noindex", true))
    {echo '<meta name="robots" content="noindex,nofollow" />';print("\n");};
    ?>
    <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo get_template_directory_uri(); ?>/css/style.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/contact.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/default.css" rel="stylesheet" type="text/css">
    <link href="<?php echo get_template_directory_uri(); ?>/css/component.css" rel="stylesheet" type="text/css">
    <!-- IcoMoonウェブアイコンフォントの呼び出し -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/icomoon/style.css">
    <style type="text/css">
    body {
        background-color: #0F0915;
    }
    </style>
<?php print("\n"); ?>
<?php elseif( is_page( '9' ) || is_page() || is_category() || is_tag() || is_search() || is_single() ): ?>
<!-- ブログTOPページ,カテゴリー,タグ,検索ページ,シングルページ
======================================================================================================================================== -->
<!doctype html>
<?php if (is_single('rakutenapi')) : //投稿ページ切り替え?>
<html lang="ja" xmlns:ng="http://angularjs.org" id="ng-app" ng-app="app">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
<?php else: // それ以外 ?>
<html lang="ja">
<head>
<?php endif; ?>
    <meta charset="utf-8">
    <?php //指定ページにnoindexタグを出力
    if (get_post_meta($post->ID, "noindex", true))
    {echo '<meta name="robots" content="noindex,nofollow" />';print("\n");};
    ?>
    <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo get_template_directory_uri(); ?>/css/style.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/blog.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/default.css" rel="stylesheet" type="text/css">
    <link href="<?php echo get_template_directory_uri(); ?>/css/component.css" rel="stylesheet" type="text/css">
    <!-- IcoMoonウェブアイコンフォントの呼び出し -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/icomoon/style.css">
<?php print("\n"); ?>
<?php elseif(is_home()): ?>
<!-- ホーム
======================================================================================================================================== -->
<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <?php //指定ページにnoindexタグを出力
    if (get_post_meta($post->ID, "noindex", true))
    {echo '<meta name="robots" content="noindex,nofollow" />';print("\n");};
    ?>
    <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo get_template_directory_uri(); ?>/css/style.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/home.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/default.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/component.css" />
    <!-- IcoMoonウェブアイコンフォントの呼び出し -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/icomoon/style.css">
<?php print("\n"); ?>
<?php endif; ?>