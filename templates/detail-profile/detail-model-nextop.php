<?php 
  $details_personal  = get_field('details_profile');
  $cover_image  = get_field('cover_profile_image');

  $number_follow_instagram  = get_field('number_follow_instagram');
  $number_follow_twitter  = get_field('number_follow_twitter');
  $number_follow_facebook  = get_field('number_follow_facebook');

  $detail_profile_images  = get_field('detail_profile_images');

  $instagram_user  = get_field('user_instagram');
  $twitter_user  = get_field('user_twitter');
  $facebook_user  = get_field('user_facebook');

  $galleryList  = get_field('image_profile', get_the_ID());
?>
<section class="cover-personer">
  <?php if ($cover_image != ''): ?>
    <div class="img-cover">
      <img src="<?php print($cover_image) ?>" alt="cover personner">
    </div>
  <?php endif; ?>
  <div class="container">
    <div class="breadcrumb">
      <div class="container">
        <?php if (function_exists('beau_the_breadcrumb')) beau_the_breadcrumb(); ?>
      </div>
    </div>
    <div class="content-cover-personer">
      <h3><?php the_title();?></h3>
      <ul class="item-social">
        <?php if ($number_follow_instagram != ''): ?>
        <li>
          <h4 class="number"><?php print($number_follow_instagram) ?></h4>
          <h4 class="social"><i><?php esc_html_e('instagram','nextop')?></i></h4>
        </li>
        <?php endif; ?>
        <?php if ($number_follow_twitter != ''): ?>
        <li>
          <h4 class="number"><?php print($number_follow_twitter) ?></h4>
          <h4 class="social"><i><?php esc_html_e('twitter','nextop')?></i></h4>
        </li>
        <?php endif; ?>
        <?php if ($number_follow_facebook != ''): ?>
        <li>
          <h4 class="number"><?php print($number_follow_facebook) ?></h4>
          <h4 class="social"><i><?php esc_html_e('facebook','nextop')?></i></h4>
        </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</section>
<section class="details-personer">
  <div class="row">
    <div class="details-model-info">
        <div class="container">
          <div class="item-info">
            <div class="content-details-personer">
                <div class="row">
                  <h3><?php the_title();?><?php esc_html_e(' info','nextop')?></h3>
                  <ul>
                    <?php
                      $count_details = count($details_personal);
                      for ($i=0; $i < $count_details; $i++) { 
                      $item = $details_personal[$i];
                      $title_details = $item['title'];
                      $details_details = $item['details'];
                      ?>
                      <li class="details-item">
                        <?php 
                          if ($title_details != '') {
                          ?>
                          <strong><?php printf($title_details) ?></strong>
                          <?php
                          }
                        ?>
                        <?php 
                          if ($details_details != '') {
                          ?>
                          <h4><?php printf($details_details) ?></h4>
                          <?php
                          }
                        ?>
                      </li>
                      <?php 
                      }
                    ?>
                  </ul>
              </div>
              <?php if (nextop_GetOption('enable-booking-details') != 'No'): ?>
                <div class="row">
                  <div class="link"><i><?php esc_html_e("You are booked",'nextop')?></i></div>
                  <div class="button">
                    <a href="<?php the_permalink();?>?data-modal=true"><?php esc_html_e('You are booked','nextop')?></a>
                  </div>
                </div>
              <?php endif ?>
            </div>
          </div>
        </div>
    </div>
    <div class="details-thumb">
      <div class="container">
        <ul>
          <?php 
            $count = count($galleryList);
             for ($i=0; $i < $count; $i++) { 
             $item = $galleryList[$i];
             $image_gallery = $item['image_one'];
             $style_images = $item['style_images'];
            ?>
            <li class="<?php print($style_images) ?>"><img src="<?php print($image_gallery); ?>" alt="personer" /></li>
            <?php 
            }
          ?>
        </ul>
      </div>
    </div>
    <div class="details-full">
      <div class="swiper-container details-personer-slide">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="item">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="img-item-details-content">
                    <?php if ($detail_profile_images != ''): ?>
                      <a href="<?php echo esc_url(the_permalink());?>"><img src="<?php print($detail_profile_images) ?>" alt="details-profile"></a>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 hidden-xs">
                  <div class="content-details-personer">
                    <div class="row">
                      <h3><?php the_title();?><?php esc_html_e(' info','nextop')?></h3>
                        <ul>
                          <?php
                            $count = count($details_personal);
                            for ($i=0; $i < $count; $i++) { 
                            $item = $details_personal[$i];
                            $title_details = $item['title'];
                            $details_details = $item['details'];
                            ?>
                            <li class="details-item">
                              <?php 
                                if ($title_details != '') {
                                ?>
                                <strong><?php printf($title_details) ?></strong>
                                <?php
                                }
                              ?>
                              <?php 
                                if ($details_details != '') {
                                ?>
                                <h4><?php printf($details_details) ?></h4>
                                <?php
                                }
                              ?>
                            </li>
                            <?php 
                            }
                          ?>
                          <li class="details-item">
                            <strong><?php esc_html_e('Follow','nextop')?></strong>
                            <ul class="social-small">
                              <?php if ($instagram_user != ''): ?>
                              <li><a href="https://www.instagram.com/<?php print($instagram_user) ?>"><i class="fa fa-instagram"></i></a></li>
                              <?php endif; ?>
                              <?php if ($twitter_user != ''): ?>
                              <li><a href="https://twitter.com/<?php print($twitter_user) ?>"><i class="fa fa-twitter-square"></i></a></li>
                              <?php endif; ?>
                              <?php if ($facebook_user != ''): ?>
                              <li><a href="https://www.facebook.com/<?php print($facebook_user) ?>"><i class="fa fa-facebook-square"></i></a></li>
                              <?php endif; ?>
                            </ul>
                          </li>
                        </ul>
                    </div>
                    <div class="row">
                      <div class="link"><i><?php esc_html_e('You are booked','nextop')?></i></div>
                      <div class="button">
                        <a href="<?php the_permalink();?>?data-modal=true"><?php esc_html_e('You are booked','nextop')?></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php 
               $count = count($galleryList);
               if ($count > 1) {
                 for ($i=0; $i < $count; $i++) { 
                 $item = $galleryList[$i];
                 $image_gallery = $item['image_one'];
                 $image_two = $item['image_two'];
                 $style_images = $item['style_images'];

                 $image_gallery = $image_gallery;
                 $image_two = $image_two;

                ?>
                  <div class="swiper-slide">
                    <?php 
                    if ($style_images == 'one') {
                    ?>
                    <div class="item-gallery <?php print($style_images) ?>">
                      <div class="container">
                        <div class="img-gallery-details">
                        <?php if(""!==$image_gallery){?>
                          <img src="<?php print($image_gallery); ?>" alt="gallery-images" />
                        <?php } ?>
                        </div>
                      </div>
                    </div>
                    <?php
                    }
                    elseif ($style_images == 'two') {
                    ?>
                    <div class="item-gallery <?php print($style_images) ?>">
                      <div class="container">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <div class="img-item-details left">
                              <?php if(""!==$image_gallery){?>
                                <img src="<?php print($image_gallery); ?>" alt="gallery-images" />
                                <?php } ?>
                              </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <div class="img-item-details right">
                              <?php if(""!==$image_two){?>
                                <img src="<?php print($image_two); ?>" alt="gallery-images" />
                                <?php } ?>
                              </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                  </div>
              <?php 
                }
              }
            ?>
        </div>
      </div>
      <!-- Initialize Swiper -->
      <!-- Add Arrows -->
    
      <div class="swiper-navigate swiper-button-next"></div>
      <div class="swiper-navigate swiper-button-prev"></div>
      <script type="text/javascript">
        (function($){
            "use strict"; 
            var myswiper = new Swiper('.details-personer-slide', {
              slidesPerView: 1,
              nextButton: '.swiper-button-next',
              prevButton: '.swiper-button-prev',
          });
        })(jQuery);
      </script>
    </div>
    
    <div class="icon-list-grid">
      <ul>
        <li class="grid"><a href="#"><?php esc_html_e('Grid','nextop')?></a></li>
        <li class="list"><a href="#"><?php esc_html_e('List','nextop')?></a></li>
      </ul>
    </div>
  </div>
</section>
<script type="text/javascript">
  (function($){
    "use strict"; 
    $('.icon-list-grid .grid a').click(function(event) {
      if ($(this).hasClass('active')) {
        $('.details-full').show('fast');
        $(this).toggleClass('active');
        $('.details-thumb').hide('fast');

      }
      else{
        $(this).toggleClass('active');
        $('.details-full').hide('fast');
        $('.details-thumb').show('fast');
        $('.item-info').removeClass('active');
      }
      return false;
    });
    $('.icon-list-grid .list a').click(function(event) {
      $('.details-model-info .item-info').toggleClass('active');
      return false;
    });
  })(jQuery);
</script>