<?php 
global $index
?>
<div class="swiper-slide">
    <div class="slide-body">
        <div class="slide-text">
            <div class="index"><span class="num"><?php echo sprintf('%02d', $index) ?></span></div>
            <h2 class="product-title"><b><?php the_title() ?></b>
                <?php echo carbon_get_post_meta($post->ID,'subtitle') ?></h2>
            <div class="product-price">
                <span class="price-amount"><?php echo num_format(carbon_get_post_meta($post->ID,'price')) ?></span>
                руб
            </div>
            <p class="product-description">
                <?php echo $post->post_content ?>
            </p>
        </div>
        <div class="product-gallery lightgallery">
            <a href="<?php echo get_the_post_thumbnail_url($post->ID,'full') ?>"
              class="product-image shadow lg-image"
              style="background-image: url(<?php echo get_the_post_thumbnail_url($post->ID,'content-medium') ?>);"
              >
                <div class="zoom"></div>
                <?php the_post_thumbnail('content-medium','class=d-none') ?>
            </a>
            <div class="gallery-thumbs">
                <?php
                $thumb_index = 0;
                foreach (carbon_get_post_meta($post->ID, 'gallery') as $id) {
                    $thumb_index++;
                    ?>
                    <div class="thumb-container <?php echo $thumb_index > 2 ? 'd-none' : '' ?>">
                        <a class="lg-image thumb"
                           href="<?php echo wp_get_attachment_image_src($id['image'],'full')[0] ?>"
                           style="background-image: url(<?php echo wp_get_attachment_image_src($id['image'],'content-small')[0] ?>);"
                        >
                            <div class="zoom"></div>
                            <?php echo wp_get_attachment_image($id['image'],'content-small',false,['class'=>'d-none']) ?>
                        </a>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
