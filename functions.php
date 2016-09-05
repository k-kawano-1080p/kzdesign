<?php
// サイドバーウィジェット
register_sidebar(array(
'name' => 'サイドバーウィジット-1',
'id' => 'sidebar-1',
'description' => 'サイドバーのウィジットエリアです。',
'before_widget' => '<div id="%1$s" class="widget %2$s">',
'after_widget' => '</div>',
));
// 標準で吐き出すソースを削除
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');
remove_action('template_redirect', 'rest_output_link_header', 11);
remove_action('wp_head', 'wp_shortlink_wp_head');
// generatorを非表示にする
remove_action('wp_head', 'wp_generator');
// EditURIを非表示にする
remove_action('wp_head', 'rsd_link');
// wlwmanifestを非表示にする
remove_action('wp_head', 'wlwmanifest_link');
// コンタクトフォームセブン必要な時だけ読み込み
function my_contact_enqueue_scripts(){
wp_deregister_script('contact-form-7');
wp_deregister_style('contact-form-7');
if (is_page('contact')) {
	if (function_exists( 'wpcf7_enqueue_scripts')) {
        wpcf7_enqueue_scripts();
	}
	if ( function_exists( 'wpcf7_enqueue_styles' ) ) {
	wpcf7_enqueue_styles();
	}
}
}
add_action( 'wp_enqueue_scripts', 'my_contact_enqueue_scripts');
//WP-PageNavieが読み込むCSSを削除
add_action( 'wp_enqueue_scripts', 'my_delete_plugin_styles' );
	function my_delete_plugin_styles() {
	wp_deregister_style( 'wp-pagenavi' );
}
// WordPress 4.6 DNS プリフェッチを非表示
function remove_dns_prefetch( $hints, $relation_type ) {
    if ( 'dns-prefetch' === $relation_type ) {
        return array_diff( wp_dependencies_unique_hosts(), $hints );
    }
    return $hints;
}
add_filter( 'wp_resource_hints', 'remove_dns_prefetch', 10, 2 );
// カスタムナビゲーションメニュー
add_theme_support('menus');
// アイキャッチ画像
add_theme_support( 'post-thumbnails' );
//アイキャッチ画像の定義と切り抜き
add_action( 'after_setup_theme', 'baw_theme_setup' );
function baw_theme_setup() {
 add_image_size('small_thumbnail', 90, 90 ,true );
 add_image_size('kiji', 610, 200, true );
 add_image_size('650', 650, 230, true );
 add_image_size('350', 350, 250, true );
 add_image_size('slidepc', 722, 340, true );
 add_image_size( '120', 120, 120, true );
 add_image_size( '150', 100, 150, true );
 add_image_size( '260', 260, 200, true );
 add_image_size( 's_thumbnail', 80, 80, true );
 add_image_size('280_thumbnail', 280, 125, true );
}
// コメントフォーム
add_filter('comments_open', 'custom_comment_tags');
add_filter('pre_comment_approved', 'custom_comment_tags');
function custom_comment_tags($data) {
    global $allowedtags;
    unset($allowedtags['a']);
    unset($allowedtags['abbr']);
    unset($allowedtags['acronym']);
    unset($allowedtags['b']);
    unset($allowedtags['div']);
    unset($allowedtags['cite']);
    unset($allowedtags['code']);
    unset($allowedtags['del']);
    unset($allowedtags['em']);
    unset($allowedtags['i']);
    unset($allowedtags['q']);
    unset($allowedtags['strike']);
    unset($allowedtags['strong']);
    return $data;
}
// ページ送り
function pagination() {
  global $wp_rewrite;
  global $wp_query;
  global $paged;
    $paginate_base = get_pagenum_link(1);
    if(strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks()){
        $paginate_format = '';
        $paginate_base = add_query_arg('paged','%#%');
    }
    else{
        $paginate_format = (substr($paginate_base,-1,1) == '/' ? '' : '/') .
        user_trailingslashit('page/%#%/','paged');;
        $paginate_base .= '%_%';
    }
   //paginationの出力
   echo '<ul class="pagination">';
   echo paginate_links(array(
        'base' => $paginate_base,
        'format' => $paginate_format,
        'total' => $wp_query->max_num_pages,
        'mid_size' => 2,
        'current' => ($paged ? $paged : 1),
        'prev_text' => '« 前へ',
        'next_text' => '次へ »',
        'type'      => 'list',
    ));
   echo '</ul>';
}
// アイキャッチ画像出力
function catch_that_image() {
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches [1] [0];
if(empty($first_img)){ //Defines a default image
        $first_img = "<?php echo get_template_directory_uri(); ?>/img/no_image325.gif";
    }
    return $first_img;
}
// 文字抜粋
function new_excerpt_mblength($length) {
     return 300;
}
add_filter('excerpt_mblength', 'new_excerpt_mblength');
function new_excerpt_more($more) {
  return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');
// Custom Post Type UIの日本語化ファイルをすでにあるものより優先して読み込ませるようにします。
function override_load_cptui_ja( $override, $domain, $mofile ) {
  if ( 'cpt-plugin' == $domain
    && strrpos( $mofile, WP_PLUGIN_DIR . '/custom-post-type-ui/languages/cpt-plugin-ja.mo' ) === 0 ) {
    load_textdomain( 'cpt-plugin', WP_LANG_DIR . '/plugins/cpt-plugin-ja.mo' );
    return true;
  }
  return $override;
}
add_filter( 'override_load_textdomain', 'override_load_cptui_ja', 10, 3 );
// 新着記事URL獲得
function get_latest_post_url() {
    global $wpdb;
    $query = "SELECT ID FROM {$wpdb->prefix}posts WHERE post_type='post' AND post_status='publish' ORDER BY post_date DESC LIMIT 1;";
    $result = $wpdb->get_results($query);
    if(is_object($result[0])) {
        return get_permalink($result[0]->ID);
    } else {
        return '';
    };
}
// サイトのURLを出力 ショートコード
add_shortcode('url', 'shortcode_url');
function shortcode_url() {
return get_bloginfo('url');
}
// アップロード・ディレクトリへのパス ショートコード
add_shortcode('uploads', 'shortcode_up');
function shortcode_up() {
$upload_dir = wp_upload_dir();
return $upload_dir['baseurl'];
}
// サイドウィジェットでもショートコードを使えるように
add_filter('widget_text', 'do_shortcode');
// 検索ワードが0や未入力のときにもindex.phpを使うように追記
function search_template_redirect() {
  global $wp_query;
  $wp_query->is_search = true;
  $wp_query->is_home = false;
  if (file_exists(TEMPLATEPATH . '/index.php')) {
    include(TEMPLATEPATH . '/index.php');
  }
  exit;
}
if (isset($_GET['s']) && $_GET['s'] == false) {
  add_action('template_redirect', 'search_template_redirect');
}
// 検索結果を投稿ページのみに
function my_posy_search($search) {
  if(is_search()) {
    $search .= " AND post_type = 'post'";
  }
  return $search;
}
add_filter('posts_search', 'my_posy_search');
// 自動挿入されるPタグを削除
add_action('init', function() {
    remove_filter('the_excerpt', 'wpautop');
    remove_filter('the_content', 'wpautop');
});
add_filter('tiny_mce_before_init', function($init) {
    $init['wpautop'] = false;
    $init['apply_source_formatting'] = true;
    return $init;
});
// スマホ条件分岐
function is_mobile() {
$useragents = array(
'iPhone',          // iPhone
'iPod',            // iPod touch
'Android',         // 1.5+ Android
'dream',           // Pre 1.5 Android
'CUPCAKE',         // 1.5+ Android
'blackberry9500',  // Storm
'blackberry9530',  // Storm
'blackberry9520',  // Storm v2
'blackberry9550',  // Storm v2
'blackberry9800',  // Torch
'webOS',           // Palm Pre Experimental
'incognito',       // Other iPhone browser
'webmate'          // Other iPhone browser
);
$pattern = '/'.implode('|', $useragents).'/i';
return preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
}
?>
<?php
// シェアボタン
function SNS_btn_horizontal_bottom()
{ ?>
<?php
$canonical_url=get_permalink();
$title=wp_title( '', false, 'right' ).'| '.get_bloginfo('name');
$canonical_url_encode=urlencode($canonical_url);
$title_encode=urlencode($title);
?>
			<div id="sns-btn-bottom" class="sns-buttons-pc">
			  <ul class="snsbv">
			    <li class="balloon-btn-horizontal feedly-balloon-btn-horizontal">
			      <span class="balloon-btn-set">
			        <span class="arrow-box-horizontal">
			          <a href="http://cloud.feedly.com/#subscription%2Ffeed%2Fhttp%3A%2F%2Fkzdesign.net%2Ffeed%2F" target="blank" class="arrow-box-horizontal-link feedly-arrow-box-horizontal-link" title="Feedlyで最新記事をフォロー！">
			            <?php if(function_exists('scc_get_follow_feedly')) echo (scc_get_follow_feedly()==0)?'0':scc_get_follow_feedly(); ?>
			          </a>
			          <a href="http://cloud.feedly.com/#subscription%2Ffeed%2Fhttp%3A%2F%2Fkzdesign.net%2Ffeed%2F" target="blank" class="balloon-btn-horizontal-link feedly-balloon-btn-horizontal-link" title="Feedlyで最新記事をフォロー！">
			            <i class="icon-feedly"></i>
			          </a>
			        </span>
			      </span>
			    </li>
			    <li class="balloon-btn-horizontal pocket-balloon-btn-horizontal">
			      <span class="balloon-btn-set">
			        <span class="arrow-box-horizontal">
			          <a href="http://getpocket.com/edit?url=<?php echo $canonical_url_encode;?>&title=<?php echo $title_encode;?>" target="blank" class="arrow-box-horizontal-link pocket-arrow-box-horizontal-link" title="Pocketしてあとで読む">
			            <?php if(function_exists('scc_get_share_pocket')) echo (scc_get_share_pocket()==0)?'0':scc_get_share_pocket(); ?>
			          </a>
			          <a href="http://getpocket.com/edit?url=<?php echo $canonical_url_encode;?>&title=<?php echo $title_encode;?>" target="blank" class="balloon-btn-horizontal-link pocket-balloon-btn-horizontal-link" title="Pocketしてあとで読む">
			            <i class="icon-pocket"></i>
			          </a>
			        </span>
			      </span>
			    </li>
			    <li class="balloon-btn-horizontal googleplus-balloon-btn-horizontal">
			      <span class="balloon-btn-set">
			        <span class="arrow-box-horizontal">
			          <a href="https://plus.google.com/share?url=<?php echo $canonical_url_encode;?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=500');return false;" target="blank" class="arrow-box-horizontal-link googleplus-arrow-box-horizontal-link" title="+1する！">
			            <?php if(function_exists('scc_get_share_gplus')) echo (scc_get_share_gplus()==0)?'0':scc_get_share_gplus(); ?>
			          </a>
			          <a href="https://plus.google.com/share?url=<?php echo $canonical_url_encode;?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=500');return false;" target="blank" class="balloon-btn-horizontal-link googleplus-balloon-btn-horizontal-link" title="+1する！">
			            <i class="icon-googleplus"></i>
			          </a>
			        </span>
			      </span>
			    </li>
			    <li class="balloon-btn-horizontal hatena-balloon-btn-horizontal">
			      <span class="balloon-btn-set">
			        <span class="arrow-box-horizontal">
			          <a href="http://b.hatena.ne.jp/add?mode=confirm&url=<?php echo $canonical_url_encode ?>&title=<?php echo $title_encode;?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=510');return false;" target="blank" class="arrow-box-horizontal-link hatena-arrow-box-horizontal-link" title="はてブする！">
			            <?php if(function_exists('scc_get_share_hatebu')) echo (scc_get_share_hatebu()==0)?'0':scc_get_share_hatebu(); ?>
			          </a>
			          <a href="http://b.hatena.ne.jp/add?mode=confirm&url=<?php echo $canonical_url_encode ?>&title=<?php echo $title_encode;?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=510');return false;" target="blank" class="balloon-btn-horizontal-link hatena-balloon-btn-horizontal-link" title="はてブする！">
			            <i class="icon-hatena"></i>
			          </a>
			        </span>
			      </span>
			    </li>
			    <li class="balloon-btn-horizontal twitter-balloon-btn-horizontal">
			      <span class="balloon-btn-set">
			        <span class="arrow-box-horizontal">
			          <a href="http://twitter.com/intent/tweet?url=<?php echo $canonical_url_encode ?>&text=<?php echo $title_encode ?>&tw_p=tweetbutton" target="blank" class="arrow-box-horizontal-link twitter-arrow-box-horizontal-link" title="ツイートする！">
			            <?php if(function_exists('scc_get_share_twitter')) echo (scc_get_share_twitter()==0)?'0':scc_get_share_twitter(); ?>
			          </a>
			          <a href="http://twitter.com/intent/tweet?url=<?php echo $canonical_url_encode ?>&text=<?php echo $title_encode ?>&tw_p=tweetbutton" target="blank" class="balloon-btn-horizontal-link twitter-balloon-btn-horizontal-link" title="ツイートする！">
			            <i class="icon-twitter"></i>
			          </a>
			        </span>
			      </span>
			    </li>
			    <li class="balloon-btn-horizontal facebook-balloon-btn-horizontal">
			      <span class="balloon-btn-set">
			        <span class="arrow-box-horizontal">
			          <a href="http://www.facebook.com/sharer.php?src=bm&u=<?php echo $canonical_url_encode;?>&t=<?php echo $title_encode;?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="blank" class="arrow-box-horizontal-link facebook-arrow-box-horizontal-link" title="Facebookでシェア！">
			            <?php if(function_exists('scc_get_share_facebook')) echo (scc_get_share_facebook()==0)?'0':scc_get_share_facebook(); ?>
			          </a>
			          <a href="http://www.facebook.com/sharer.php?src=bm&u=<?php echo $canonical_url_encode;?>&t=<?php echo $title_encode;?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="blank" class="balloon-btn-horizontal-link facebook-balloon-btn-horizontal-link" title="Facebookでシェア！">
			            <i class="icon-facebook"></i>
			          </a>
			        </span>
			      </span>
			    </li>
			  </ul>
			  <div class="clearfloat"></div>
			</div>
<?php }
?>
<?php
add_action('wp_footer', 'ga');
function ga() { ?>
	<script type='text/javascript'>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
	  ga('create', 'UA-58709942-5', 'auto');
	  ga('send', 'pageview');
	</script>
<?php } ?>
<?php
/////////////////////////////////////////////
//コピペ一発でWordpressの投稿時にアイキャッチを自動設定するカスタマイズ方法（YouTube対応版）
/////////////////////////////////////////////

//WP_Filesystemの利用
require_once(ABSPATH . '/wp-admin/includes/image.php');

//イメージファイルがサーバー内にない場合は取得する
function fetch_thumbnail_image($matches, $key, $post_content, $post_id){
  //サーバーのphp.iniのallow_url_fopenがOnでないとき外部サーバーから取得しない
  if ( !ini_get('allow_url_fopen') )
    return null;
  //正しいタイトルをイメージに割り当てる。IMGタグから抽出
  $imageTitle = '';
  preg_match_all('/<\s*img [^\>]*title\s*=\s*[\""\']?([^\""\'>]*)/i', $post_content, $matchesTitle);

  if (count($matchesTitle) && isset($matchesTitle[1])) {
    if ( isset($matchesTitle[1][$key]) )
      $imageTitle = $matchesTitle[1][$key];
  }

  //処理のためのURL取得
  $imageUrl = $matches[1][$key];

  //ファイル名の取得
  $filename = substr($imageUrl, (strrpos($imageUrl, '/'))+1);

  if (!(($uploads = wp_upload_dir(current_time('mysql')) ) && false === $uploads['error'])){
    return null;
  }

  //ユニック（一意）ファイル名を生成
  $filename = wp_unique_filename( $uploads['path'], $filename );

  //ファイルをアップロードディレクトリに移動
  $new_file = $uploads['path'] . "/$filename";

  if (!ini_get('allow_url_fopen')) {
    return null;
    //$file_data = curl_get_file_contents($imageUrl);
  } else {
    if ( WP_Filesystem() ) {//WP_Filesystemの初期化
      global $wp_filesystem;//$wp_filesystemオブジェクトの呼び出し
      //$wp_filesystemオブジェクトのメソッドとしてファイルを取得する
      $file_data = @$wp_filesystem->get_contents($imageUrl);
    }
  }

  if (!$file_data) {
    return null;
  }

  if ( WP_Filesystem() ) {//WP_Filesystemの初期化
    global $wp_filesystem;//$wp_filesystemオブジェクトの呼び出し
    //$wp_filesystemオブジェクトのメソッドとしてファイルに書き込む
    $wp_filesystem->put_contents($new_file, $file_data);
  }

  //ファイルのパーミッションを正しく設定
  $stat = stat( dirname( $new_file ));
  $perms = $stat['mode'] & 0000666;
  @ chmod( $new_file, $perms );

  //ファイルタイプの取得。サムネイルにそれを利用
  $mimes = null;
  $wp_filetype = wp_check_filetype( $filename, $mimes );

  extract( $wp_filetype );

  //ファイルタイプがない場合、これ以上進めない
  if ( ( !$type || !$ext ) && !current_user_can( 'unfiltered_upload' ) ) {
      return null;
  }

  //URLを作成
  $url = $uploads['url'] . "/$filename";

  //添付（attachment）配列を構成
  $attachment = array(
    'post_mime_type' => $type,
    'guid' => $url,
    'post_parent' => null,
    'post_title' => $imageTitle,
    'post_content' => '',
  );

  $file = false;
  $thumb_id = wp_insert_attachment($attachment, $file, $post_id);
  if ( !is_wp_error($thumb_id) ) {
    //attachmentのアップデート
    wp_update_attachment_metadata( $thumb_id, wp_generate_attachment_metadata( $thumb_id, $new_file ) );
    update_attached_file( $thumb_id, $new_file );

    return $thumb_id;
  }

  return null;
}

//投稿内の最初の画像をアイキャッチに設定する（Auto Post Thumnailプラグイン的な機能）
function auto_post_thumbnail_image() {
  global $wpdb;
  global $post;
  //$postが空の場合は終了
  if ( isset($post) && isset($post->ID) ) {
    $post_id = $post->ID;

    //アイキャッチが既に設定されているかチェック
    if (get_post_meta($post_id, '_thumbnail_id', true) || get_post_meta($post_id, 'skip_post_thumb', true)) {
        return;
    }

    $post = $wpdb->get_results("SELECT * FROM {$wpdb->posts} WHERE id = $post_id");

    //正規表現にマッチしたイメージのリストを格納する変数の初期化
    $matches = array();

    //投稿本文からすべての画像を取得
    preg_match_all('/<\s*img [^\>]*src\s*=\s*[\""\']?([^\""\'>]*).+?\/?>/i', $post[0]->post_content, $matches);
    //var_dump($matches);
    //YouTubeのサムネイルを取得（画像がなかった場合）
    if (empty($matches[0])) {
      preg_match('%(?:youtube\.com/(?:user/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $post[0]->post_content, $match);
      if (!empty($match[1])) {
        $matches=array(); $matches[0]=$matches[1]=array('http://img.youtube.com/vi/'.$match[1].'/mqdefault.jpg');
      }
    }

    if (count($matches)) {
      foreach ($matches[0] as $key => $image) {
        $thumb_id = null;
        //画像がイメージギャラリーにあったなら、サムネイルIDをCSSクラスに追加（イメージタグからIDを探す）
        preg_match('/wp-image-([\d]*)/i', $image, $thumb_id);
        if ( isset($thumb_id[1]) )
          $thumb_id = $thumb_id[1];

        //サムネイルが見つからなかったら、データベースから探す
        if (!$thumb_id &&
           //画像のパスにサイト名が含まれているとき
           ( strpos($image, site_url()) !== false ) ) {
          //$image = substr($image, strpos($image, '"')+1);
          preg_match('/src *= *"([^"]+)/i', $image, $m);
          $image = $m[1];
          if ( isset($m[1]) ) {
            //wp_postsテーブルからguidがファイルパスのものを検索してIDを取得
            $result = $wpdb->get_results("SELECT ID FROM {$wpdb->posts} WHERE guid = '".$image."'");
            //IDをサムネイルをIDにセットする
            if ( isset($result[0]) )
              $thumb_id = $result[0]->ID;
          }

          //サムネイルなどで存在しないときはフルサイズのものをセットする
          if ( !$thumb_id ) {
            //ファイルパスの分割
            $path_parts = pathinfo($image);
            //サムネイルの追加文字列(-680x400など)を取得
            preg_match('/-\d+x\d+$/i', $path_parts["filename"], $m);
            //画像のアドレスにサイト名が入っていてサムネイル文字列が入っているとき
            if ( isset($m[0]) ) {
              //サムネイルの追加文字列(-680x400など)をファイル名から削除
              $new_filename = str_replace($m[0], '', $path_parts["filename"]);
              //新しいファイル名を利用してファイルパスを結語
              $new_filepath = $path_parts["dirname"].'/'.$new_filename.'.'.$path_parts["extension"];
              //wp_postsテーブルからguidがファイルパスのものを検索してIDを取得
              $result = $wpdb->get_results("SELECT ID FROM {$wpdb->posts} WHERE guid = '".$new_filepath."'");
              //IDをサムネイルをIDにセットする
              if ( isset($result[0]) )
                $thumb_id = $result[0]->ID;
            }
          }
        }


        //それでもサムネイルIDが見つからなかったら、画像をURLから取得する
        if (!$thumb_id) {
          $thumb_id = fetch_thumbnail_image($matches, $key, $post[0]->post_content, $post_id);
        }

        //サムネイルの取得に成功したらPost Metaをアップデート
        if ($thumb_id) {
          update_post_meta( $post_id, '_thumbnail_id', $thumb_id );
          break;
        }
      }
    }
  }
}
//新しい投稿で自動設定する場合
add_action('save_post', 'auto_post_thumbnail_image');
add_action('draft_to_publish', 'auto_post_thumbnail_image');
add_action('new_to_publish', 'auto_post_thumbnail_image');
add_action('pending_to_publish', 'auto_post_thumbnail_image');
add_action('future_to_publish', 'auto_post_thumbnail_image');
add_action('xmlrpc_publish_post', 'auto_post_thumbnail_image');
?>