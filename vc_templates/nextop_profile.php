<?php
$select_album = $id_profile = $img_profile_left = $profile_description = $profile_title = $profile_content = $profile_description_book = $profile_text_link = $profile_link_booking = $profile_text_work = $css ='';
extract(shortcode_atts(array(
    'option'                    => '',
    'select_album'              => '',
    'id_profile'                => '',
    'img_profile_left'          => '',
    'profile_description'       => '',
    'profile_title'             => '',
    'profile_content '          => '',
    'profile_description_book'  => '',
    'profile_text_link'         => '',
    'profile_link_booking'      => '',
    'profile_text_work'         => '',
    'css'                       => '',
), $atts));
$img = shortcode_atts(array(
    'img_profile_left' => 'img_profile_left',
), $atts);
$img1 = wp_get_attachment_image_src($img["img_profile_left"], "full");
$profile_img = $img1[0];

$id_ran = rand(1, 99999);
?>
<?php
if ($id_profile != '') {
$args = array( 'post_type' => 'profile', 'p' => $id_profile);
$loop = new WP_Query( $args );
wp_reset_postdata();
while ( $loop->have_posts() ) : $loop->the_post();
$hot  = get_field('hot_or_not');
$style_profile = get_field('select_type_profile');

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
?>
<section class="model-detail-element model-detail-element-<?php echo esc_html($id_ran) ?> <?php echo esc_attr( $css_class ); ?>">
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="img-show-model">
        <a href="<?php echo esc_url(the_permalink());?>">
          <img id="img-big-view-single-<?php echo esc_html($id_ran) ?>" class="lazy" data-original="<?php echo esc_url($profile_img) ?>"  alt="model-img">
        </a>
        <?php
        if ($hot == true) {
        ?>
          <span class="hot"><?php esc_html_e(' hot','nextop')?></span>
        <?php
        }
        ?>

      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="content-details">
        <div class="details-text <?php echo esc_html($style_profile) ?>">
          <?php
            if ($profile_description != '') {
            ?>
            <span class="hot"><?php printf($profile_description) ?></span>
            <?php
            }
          ?>

          <?php
            if ($profile_title != '') {
            ?>
            <h3 class="title"><a href="<?php echo esc_url(the_permalink());?>"><?php printf($profile_title) ?></a></h3>
            <?php
            }
          ?>

          <?php
            if ($content != '') {
          ?>
            <div class="content">
              <?php echo '<p>'.$content.'</p>'; ?>
            </div>
          <?php
            }
          ?>
          <?php if ($style_profile == 'model'): ?>
            <ul>
              <?php
                $details_personal  = get_field('details_profile');
                for ($i=0; $i <= count($details_personal) && $i < 3; $i++) {
                $item = $details_personal[$i];
                $title_details = $item['title'];
                $details_details = $item['details'];
                ?>
                <li>
                  <?php
                    if ($title_details != '') {
                    ?>
                    <span class="title-bold"><?php printf($title_details) ?></span>
                    <?php
                    }
                  ?>
                  <?php
                    if ($details_details != '') {
                    ?>
                    <span class="light"><?php printf($details_details) ?></span>
                    <?php
                    }
                  ?>
                </li>
                <?php
                }
              ?>
            </ul>
          <?php endif; ?>

          <?php if ($style_profile == 'artis'): ?>
            <?php
              $select_album_id = ltrim($select_album, 'id');
              $realease_date  = get_field(('realease_date'),$select_album_id);
              $description_album  = get_field(('description_album'),$select_album_id);
              $get_thumb = get_post_thumbnail_id( $select_album_id );
              $name = strtolower(get_the_title($select_album_id));
              $name_album = str_replace(' ','',$name);
            ?>
            <div class="citysoul-list-play">
              <?php
                $musicList  = get_field('album_media', $select_album_id);
                $count = count($musicList);
                if ($count > 3) {
                  $count = 3;
                }
                for ($e=0; $e < $count; $e++) {
                  $item = $musicList[$e];
                  $author_name = $item['author_name'];
                  $audio_item = $item['audio_item'];
                  $media_name = $audio_item['title'];
                  $time_track = $item['time_track'];
                  $id_track = $select_album_id.'_'.$e;

                  $author_name_sub = substr($author_name,  0, 15);
                  $media_name_sub = substr($media_name,  0, 12);
                  ?>
                  <div id="citysoul_player_<?php print($id_track) ?>" class="jp-jplayer"></div>
                  <div id="citysoul_container_<?php print($id_track) ?>" class="jp-audio" role="application" aria-label="media player">
                      <div class="jp-type-playlist">
                          <div class="jp-gui jp-interface">
                              <div class="jp-controls">
                                  <button class="jp-play" role="button" tabindex="0"></button>
                              </div>
                              <div class="citysoul-play-container">
                                  <div class="jp-current-song">
                                    <?php if ($author_name != ''): ?>
                                      <span class="citysoul-article-name text-active text-more text-16x"><?php print($author_name_sub) ?></span>
                                    <?php endif; ?>
                                    <?php if ($media_name != ''): ?>
                                      <span class="citysoul-song-name text-title"><?php print($media_name_sub) ?></span>
                                    <?php endif; ?>
                                  </div>
                                  <div class="jp-volume-controls">
                                      <button class="jp-mute" role="button" tabindex="0"></button>
                                      <button class="jp-volume-max" role="button" tabindex="0"></button>
                                      <div class="jp-volume-bar">
                                          <div class="jp-volume-bar-value"></div>
                                      </div>
                                  </div>
                                  <?php if ($time_track != ''): ?>
                                  <div class="kilobite-text text-title"><?php print($time_track) ?></div>
                                  <?php endif; ?>
                                  <div style="clear: both"></div>
                                  <div class="jp-progress">
                                      <div class="jp-seek-bar">
                                          <div class="jp-play-bar"></div>
                                      </div>
                                  </div>
                              </div>

                          </div>
                          <div class="clearfix"></div>
                          <div class="jp-playlist">
                              <div class="contain-playlist">
                                  <ul>
                                      <li>&nbsp;</li>
                                  </ul>
                              </div>
                          </div>
                          <div class="jp-no-solution">
                          <?php
                            $flash = 'http://get.adobe.com/flashplayer/';
                          ?>
                              <span><?php esc_html_e('Update Required','nextop')?></span>
                              <?php esc_html_e('To play the media you will need to either update your browser to a recent version or update your ','nextop')?>
                              <a href="<?php print($flash) ?>" target="_blank"><?php esc_html_e('Flash plugin','nextop')?></a>.
                          </div>
                      </div>
                  </div>
                  <script type="text/javascript">
                  //<![CDATA[
                  (function($){
                      'use strict'
                      //Setup and defined a playlist
                      var citysoul_Play_<?php print($id_track) ?> = new jPlayerPlaylist({
                          jPlayer: "#citysoul_player_<?php print($id_track) ?>",
                          cssSelectorAncestor: "#citysoul_container_<?php print($id_track) ?>",

                      }, [
                          {
                              title:"<?php print($media_name) ?>",
                              artist: "<?php print($author_name) ?>",
                              mp3:"<?php print($audio_item['url']) ?>",
                          },
                      ], {
                          // swfPath: "../../dist/jplayer",
                          supplied: "oga, mp3",
                          wmode: "window",
                          useStateClassSkin: true,
                          autoBlur: false,
                          smoothPlayBar: true,
                          keyEnabled: true
                      });
                  })(jQuery)
                  //]]>
                  </script>
                  <div class="clearfix"></div>
                <?php } ?>
            </div><!--End .citysoul-list-play-->

            <!-- Script for total -->
            <script>
                (function($){
                    'use strict'
                    // Js for play list
                    $('.button-click-play').click(function(event) {
                        var dataPlayer = $(this).attr('data-playlist');
                        var dataPlayerNext = $(this).attr('data-play-next');
                        var dataPlayerBack = $(this).attr('data-play-prev');
                        $('.citysoul-play-container').removeClass('no-border');
                        $('#'+dataPlayer).jPlayer("play");
                        if (dataPlayerBack !='') {
                            $('#citysoul_container'+dataPlayerBack+' .citysoul-play-container').addClass('no-border');
                        }
                    });
                    // Js for next back
                    $('.jp-controls').click(function(e) {
                        console.log(e)
                        var clickClass = e.target.className;
                        var playNext = $('.'+clickClass).attr('data-next');
                        if (clickClass === 'jp-next' || clickClass ==='jp-previous') {
                            $('#citysoul_player'+playNext).jPlayer("play");
                            // if (prevPlay !='') {
                            //      $('#citysoul_container'+prevPlay+' .citysoul-play-container').addClass('no-border');
                            // }
                        }
                    });

                })(jQuery)
            </script>
          <?php endif; ?>
          <span class="link">
            <i><?php printf($profile_description_book) ?></i>
          </span>
          <div class="button">
            <a href="<?php printf($profile_link_booking) ?>"><?php printf($profile_text_link) ?></a>
          </div>
        </div>
        <div class="details-img">
          <ul>
            <?php
              $galleryList  = get_field('image_profile', get_the_ID());
              $count = count($galleryList);
              if ($count > 4) {
                $count = 4;
              }
                for ($i=0; $i < $count; $i++) {
                $item = $galleryList[$i];
                $image_gallery = $item['image_one'];
                $style_images = $item['style_images'];
                $img_profile = $image_gallery;
                $img_profile_large =  $image_gallery;
               if(""!=$img_profile){
              ?>
              <li class="<?php print($style_images) ?>">
                <a href="<?php print($img_profile_large); ?>">
                  <img src="<?php echo $img_profile; ?>"/>
                </a>
                </li>
              <?php
                }
              }
            ?>
          </ul>
          <?php
            if ($profile_text_work != '') {
            ?>
            <span class="work"><?php printf($profile_text_work) ?></span>
            <?php
            }
          ?>
        </div>
      </div>
    </div>
  </div>
  <script>
    (function($){
        "use strict";
        $('.details-img li a ').click(function(event) {
            var bigImg = $(this).attr('href');
            $('.details-img li a ').removeClass('active');
            $(this).addClass('active');
            $('#img-big-view-single-<?php echo esc_html($id_ran) ?>').attr('src', bigImg);
            return false;
        });
    })(jQuery)
  </script>
</section>
<?php
endwhile;
} ?>