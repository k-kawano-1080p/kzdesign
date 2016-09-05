<?php if(is_page( '2' ) || is_page( '12' ) || is_single() ): ?>
<!-- 作品集、お問い合わせ、シングル
======================================================================================================================================== -->
                <!--▼作品集・お問い合わせラップ開始▼-->
<?php print("\n"); ?>
            <?php if (have_posts()): // WordPress ループ ?>
                <article id="pr-box01" class="clearfix">
                <div class="yohaku">
                <?php if(is_single()): ?>
                <h2 class="blogh2"><?php echo get_the_title(); ?></h2>
                <?php endif; ?>
            <?php while (have_posts()): the_post(); // 繰り返し処理開始 ?>
                    <?php the_content(); ?>
            <?php endwhile; // 繰り返し処理終了 ?>
            <?php endif; // WordPress ループ 終了?>
            <?php if(is_single()): ?>
                <?php get_template_part('parts/widget'); ?>
            <?php else: ?>
            <?php endif; ?>
                </div>
                </article>
            <?php wp_reset_query() ?>
<?php print("\n"); ?>
                <!--△作品集ラップ終了△-->
<?php elseif( is_page( '9' ) ): ?>
<!-- ブログTOPページ
======================================================================================================================================== -->
                <?php
                $args = array(
                    'post_type' => array('post'),
                    'paged' => $paged,
                    'posts_per_page' => 10,
                    'orderby' => 'date',
                    'order' => 'DESC'
                    );
                $the_query = new WP_Query( $args );
                            // ループ
                if ( $the_query->have_posts() ) : ?>
                <article id="pr-box01" class="clearfix">
                <div class="yohaku02">
                <h2>新着記事</h2>
                <ul class="article-list clearfix">
                    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <?php
                    $category = get_the_category();
                    $cat_id   = $category[0]->cat_ID;
                    $cat_name = $category[0]->cat_name;
                    $cat_slug = $category[0]->category_nicename;
                    $link = get_category_link($cat_id);
                    ?>
                        <?php if (is_mobile()) : //スマートフォン用コンテンツ?>
                    <li class="postlist">
                          <div class="post">
                            <div class="post-info">
                              <div class="blog_info2">
                                <ul>
                                  <li class="cal"><?php the_time('Y年m月d日') ?></li>
                                  <li class="cat"><?php the_category(', ') ?></li>
                                  <li class="tag"><?php the_tags('',', '); ?></li>
                                </ul>
                                <br class="fix" />
                              </div>
                            </div>
                            <div class="post-link">
                              <a href="<?php the_permalink(); ?>" class="index-posts-1">
                                <span class="eyecatch main-eyecatch"><?php $title= get_the_title(); the_post_thumbnail( '80' , array( 'alt' =>$title, 'title' => $title)); ?></span>
                                <span class="title"><?php the_title(); ?></span>
                              </a>
                            </div>
                          </div>
                    </li>
                        <?php else: // PC・タブレット用コンテンツ ?>
                    <li class="pclist">
                         <a href="<?php the_permalink(); ?>"><?php $title= get_the_title(); the_post_thumbnail( '260' , array( 'alt' =>$title, 'title' => $title)); ?></a>
                          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                          <div class="article-info">
                              <span class="pcone"><?php the_time('Y年m月d日') ?></span>
                              <span class="pcone">カテゴリ：<?php the_category(', ') ?></span>
                              <span class="pcone">タグ：<?php the_tags('',', '); ?></span>
                          </div>
                    </li>
                        <?php endif; ?>
                    <?php endwhile; ?>
                    <br class="fix">
                </ul>
                <?php wp_pagenavi(array('query' => $the_query)); ?>
                </div>
                </article>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
<?php print("\n"); ?>
<?php elseif( is_category() ): ?>
<!-- カテゴリ
======================================================================================================================================== -->
                <?php if (have_posts()) : ?>
                <article id="pr-box01" class="clearfix">
                <div class="yohaku02">
                    <?php
                    $category = get_the_category();
                    $cat_id   = $category[0]->cat_ID;
                    $cat_name = $category[0]->cat_name;
                    $cat_slug = $category[0]->category_nicename;
                    $link = get_category_link($cat_id);
                    ?>
                <h2><?php echo $cat_name; ?>&nbsp;カテゴリーの新着記事</h2>
                <ul class="article-list clearfix">
                    <?php while (have_posts()): the_post(); // 繰り返し処理開始 ?>
                        <?php if (is_mobile()) : //スマートフォン用コンテンツ?>
                    <li class="postlist">
                          <div class="post">
                            <div class="post-info">
                              <div class="blog_info2">
                                <ul>
                                  <li class="cal"><?php the_time('Y年m月d日') ?></li>
                                  <li class="cat"><?php the_category(', ') ?></li>
                                  <li class="tag"><?php the_tags('',', '); ?></li>
                                </ul>
                                <br class="fix" />
                              </div>
                            </div>
                            <div class="post-link">
                              <a href="<?php the_permalink(); ?>" class="index-posts-1">
                                <span class="eyecatch main-eyecatch"><?php $title= get_the_title(); the_post_thumbnail( '80' , array( 'alt' =>$title, 'title' => $title)); ?></span>
                                <span class="title"><?php the_title(); ?></span>
                              </a>
                            </div>
                          </div>
                    </li>
                        <?php else: // PC・タブレット用コンテンツ ?>
                    <li class="pclist">
                         <a href="<?php the_permalink(); ?>"><?php $title= get_the_title(); the_post_thumbnail( '260' , array( 'alt' =>$title, 'title' => $title)); ?></a>
                          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                          <div class="article-info">
                              <span class="pcone"><?php the_time('Y年m月d日') ?></span>
                              <span class="pcone">カテゴリ：<?php the_category(', ') ?></span>
                              <span class="pcone">タグ：<?php the_tags('',', '); ?></span>
                          </div>
                    </li>
                        <?php endif; ?>
                    <?php endwhile; ?>
                    <br class="fix">
                </ul>
                <?php pagination(); ?>
                </div>
                </article>
                <?php endif; ?>
                <?php wp_reset_query() ?>
<?php print("\n"); ?>
<?php elseif( is_tag() ): ?>
<!-- タグ
======================================================================================================================================== -->
                <?php if (have_posts()) : ?>
                <article id="pr-box01" class="clearfix">
                <div class="yohaku02">
                <h2>
                <?php single_tag_title(''); ?>
                タグの新着記事</h2>
                <ul class="article-list clearfix">
                    <?php while (have_posts()): the_post(); // 繰り返し処理開始 ?>
                    <?php
                    $category = get_the_category();
                    $cat_id   = $category[0]->cat_ID;
                    $cat_name = $category[0]->cat_name;
                    $cat_slug = $category[0]->category_nicename;
                    $link = get_category_link($cat_id);
                    ?>
                        <?php if (is_mobile()) : //スマートフォン用コンテンツ?>
                    <li class="postlist">
                          <div class="post">
                            <div class="post-info">
                              <div class="blog_info2">
                                <ul>
                                  <li class="cal"><?php the_time('Y年m月d日') ?></li>
                                  <li class="cat"><?php the_category(', ') ?></li>
                                  <li class="tag"><?php the_tags('',', '); ?></li>
                                </ul>
                                <br class="fix" />
                              </div>
                            </div>
                            <div class="post-link">
                              <a href="<?php the_permalink(); ?>" class="index-posts-1">
                                <span class="eyecatch main-eyecatch"><?php $title= get_the_title(); the_post_thumbnail( '80' , array( 'alt' =>$title, 'title' => $title)); ?></span>
                                <span class="title"><?php the_title(); ?></span>
                              </a>
                            </div>
                          </div>
                    </li>
                        <?php else: // PC・タブレット用コンテンツ ?>
                    <li class="pclist">
                         <a href="<?php the_permalink(); ?>"><?php $title= get_the_title(); the_post_thumbnail( '260' , array( 'alt' =>$title, 'title' => $title)); ?></a>
                          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                          <div class="article-info">
                              <span class="pcone"><?php the_time('Y年m月d日') ?></span>
                              <span class="pcone">カテゴリ：<?php the_category(', ') ?></span>
                              <span class="pcone">タグ：<?php the_tags('', ', '); ?></span>
                          </div>
                    </li>
                        <?php endif; ?>
                    <?php endwhile; ?>
                    <br class="fix">
                </ul>
                <?php pagination(); ?>
                </div>
                </article>
                <?php endif; ?>
                <?php wp_reset_query() ?>
<?php print("\n"); ?>
<?php elseif( is_search() ): ?>
<!-- サーチ
======================================================================================================================================== -->
                <?php if (have_posts() && get_search_query()) : // WordPress ループ ?>
                <article id="pr-box01" class="clearfix">
                <div class="yohaku">
                <h2>検索結果一覧</h2>
                <ul class="article-list clearfix">
                    <?php while (have_posts()): the_post(); // 繰り返し処理開始 ?>
                    <?php
                    $category = get_the_category();
                    $cat_id   = $category[0]->cat_ID;
                    $cat_name = $category[0]->cat_name;
                    $cat_slug = $category[0]->category_nicename;
                    $link = get_category_link($cat_id);
                    ?>
                        <?php if (is_mobile()) : //スマートフォン用コンテンツ?>
                    <li class="postlist">
                          <div class="post">
                            <div class="post-info">
                              <div class="blog_info2">
                                <ul>
                                  <li class="cal"><?php the_time('Y年m月d日') ?></li>
                                  <li class="cat"><?php the_category(', ') ?></li>
                                  <li class="tag"><?php the_tags('',', '); ?></li>
                                </ul>
                                <br class="fix" />
                              </div>
                            </div>
                            <div class="post-link">
                              <a href="<?php the_permalink(); ?>" class="index-posts-1">
                                <span class="eyecatch main-eyecatch"><?php $title= get_the_title(); the_post_thumbnail( '80' , array( 'alt' =>$title, 'title' => $title)); ?></span>
                                <span class="title"><?php the_title(); ?></span>
                              </a>
                            </div>
                          </div>
                    </li>
                        <?php else: // PC・タブレット用コンテンツ ?>
                    <li class="pclist">
                         <a href="<?php the_permalink(); ?>"><?php $title= get_the_title(); the_post_thumbnail( '260' , array( 'alt' =>$title, 'title' => $title)); ?></a>
                          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                          <div class="article-info">
                              <span class="pcone"><?php the_time('Y年m月d日') ?></span>
                              <span class="pcone">カテゴリ：<?php the_category(', ') ?></span>
                              <span class="pcone">タグ：<?php the_tags('',', '); ?></span>
                          </div>
                    </li>
                        <?php endif; ?>
                    <?php endwhile; ?>
                    <br class="fix">
                </ul>
                <?php pagination(); ?>
                </div>
                </article>
                <?php else: // ここから記事が見つからなかった場合の処理 ?>
                <article id="pr-box01" class="clearfix">
                <div class="yohaku">
                <h2>検索結果一覧</h2>
                  <p style="text-align: center;font-size: 23px;padding: 20px;">検索キーワードに該当する記事がございませんでした。<br>カテゴリーやタグから探してみてください。</p>
                    <br class="fix">
                </div>
                </article>
                <?php endif; ?>
                <?php wp_reset_query() ?>
<?php print("\n"); ?>
<?php elseif(is_page() ): ?>
<!-- 固定ページ
======================================================================================================================================== -->
                <!--▼作品集・お問い合わせラップ開始▼-->
<?php print("\n"); ?>
            <?php if (have_posts()): // WordPress ループ ?>
                <article id="pr-box01" class="clearfix">
                <div class="yohaku">
                <?php if(is_single()): ?>
                <h2 class="blogh2"><?php echo get_the_title(); ?></h2>
                <?php endif; ?>
            <?php while (have_posts()): the_post(); // 繰り返し処理開始 ?>
                    <?php the_content(); ?>
            <?php endwhile; // 繰り返し処理終了 ?>
            <?php endif; // WordPress ループ 終了?>
            <?php if(is_single()): ?>
                <?php get_template_part('parts/widget'); ?>
            <?php else: ?>
            <?php endif; ?>
                </div>
                </article>
            <?php wp_reset_query() ?>
<?php print("\n"); ?>
                <!--△作品集ラップ終了△-->
<?php print("\n"); ?>
<?php elseif(is_home()): ?>
<!-- ホーム
======================================================================================================================================== -->
                <!--▼自己PR開始▼-->
                <article id="pr-box01">
                    <section class="text-box01">
                        <h2>キャリア</h2>
                        <p>2014年4月から現在在職中の会社にて楽天、AmazonなどのECサイト運営業務を経験。
                            <br> Amazonの出品者パフォーマンスの改善、キーワードプランナーや見出しタグを使ったSEO対策済み楽天商品ページの作成などから、売上げ最大化に貢献。
                        </p>
                    </section>
                    <section class="text-box02">
                        <h2>目標</h2>
                        <p>ECサイト運営業務からWEB制作を経験し、さらに最先端の技術に挑戦してみたいと思っております。</p>
                    </section>
                    <section class="skill-box01">
                        <h2>技能</h2>
                        <dl>
                            <dt><img src="<?php echo get_template_directory_uri(); ?>/img/skill-img/icon_ai.png" alt="Illustrator"></dt>
                            <dd>
                                <p>Illustrator</p>
                                <p>★★★★☆</p>
                            </dd>
                            <dt><img src="<?php echo get_template_directory_uri(); ?>/img/skill-img/icon_ps.png" alt="Photoshop"></dt>
                            <dd>
                                <p>Photoshop</p>
                                <p>★★★☆☆</p>
                            </dd>
                            <dt><img src="<?php echo get_template_directory_uri(); ?>/img/skill-img/icon_dw.png" alt="Dreamweaver"></dt>
                            <dd>
                                <p>Dreamweaver</p>
                                <p>★★★★☆</p>
                            </dd>
                            <dt><img src="<?php echo get_template_directory_uri(); ?>/img/skill-img/icon_sublimetext.png" alt="SublimeText"></dt>
                            <dd>
                                <p>SublimeText</p>
                                <p>★★★★★</p>
                            </dd>
                            <dt><img src="<?php echo get_template_directory_uri(); ?>/img/skill-img/icon_brackets.png" alt="Brackets"></dt>
                            <dd>
                                <p>Brackets</p>
                                <p>★★★★☆</p>
                            </dd>
                            <dt><img src="<?php echo get_template_directory_uri(); ?>/img/skill-img/icon_excel.png" alt="Excel"></dt>
                            <dd>
                                <p>Excel</p>
                                <p>★★★☆☆</p>
                            </dd>
                            <dt><img src="<?php echo get_template_directory_uri(); ?>/img/skill-img/icon_word.png" alt="Word"></dt>
                            <dd>
                                <p>Word</p>
                                <p>★★☆☆☆</p>
                            </dd>
                            <dt><img src="<?php echo get_template_directory_uri(); ?>/img/skill-img/icon_powerpoint.png" alt="PowerPoint"></dt>
                            <dd>
                                <p>PowerPoint</p>
                                <p>★★☆☆☆</p>
                            </dd>
                        </dl>
                    </section>
                    <section class="chart-box01">
                        <iframe scrolling="no" frameborder="0" src="<?php echo get_template_directory_uri(); ?>/Chart/skill-box01-chart.html"></iframe>
                    </section>
                    <section class="skillbox02">
                        <h2>知識</h2>
                        <dl>
                            <dt><img src="<?php echo get_template_directory_uri(); ?>/img/skill-img/icon_html.png" alt="HTML"></dt>
                            <dd>
                                <p>HTML</p>
                                <p>★★★★★</p>
                            </dd>
                            <dt><img src="<?php echo get_template_directory_uri(); ?>/img/skill-img/icon_css.png" alt="CSS"></dt>
                            <dd>
                                <p>CSS</p>
                                <p>★★★★★</p>
                            </dd>
                            <dt><img src="<?php echo get_template_directory_uri(); ?>/img/skill-img/icon_sass.png" alt="SASS"></dt>
                            <dd>
                                <p>SASS</p>
                                <p>★★★☆☆</p>
                            </dd>
                            <dt><img src="<?php echo get_template_directory_uri(); ?>/img/skill-img/icon_jq.png" alt="jQuery"></dt>
                            <dd>
                                <p>jQuery</p>
                                <p>★★★★☆</p>
                            </dd>
                            <dt><img src="<?php echo get_template_directory_uri(); ?>/img/skill-img/icon_js.png" alt="Javascript"></dt>
                            <dd>
                                <p>Javascript</p>
                                <p>★★☆☆☆</p>
                            </dd>
                            <dt><img src="<?php echo get_template_directory_uri(); ?>/img/skill-img/icon_json.gif" alt="JSON"></dt>
                            <dd>
                                <p>JSON</p>
                                <p>★☆☆☆☆</p>
                            </dd>
                            <dt><img src="<?php echo get_template_directory_uri(); ?>/img/skill-img/icon_php.png" alt="PHP"></dt>
                            <dd>
                                <p>PHP</p>
                                <p>★☆☆☆☆</p>
                            </dd>
                            <dt><img src="<?php echo get_template_directory_uri(); ?>/img/skill-img/icon_wp.png" alt="Wordpress"></dt>
                            <dd>
                                <p>Wordpress</p>
                                <p>★★★☆☆</p>
                            </dd>
                            <dt><img src="<?php echo get_template_directory_uri(); ?>/img/skill-img/icon_seo.png" alt="SEO"></dt>
                            <dd>
                                <p>SEO</p>
                                <p>★★★☆☆</p>
                            </dd>
                        </dl>
                    </section>
                    <section class="chart-box02">
                        <iframe scrolling="no" frameborder="0" src="<?php echo get_template_directory_uri(); ?>/Chart/skill-box02-chart.html"></iframe>
                    </section>
                </article>
                <!--△自己PR終了△-->
<?php print("\n"); ?>
<?php endif; ?>