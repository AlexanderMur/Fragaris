<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package On_Spring
 */
get_header(); ?>


    <section class="section banner">
        <div class="container">
            <div class="banner-top">
                <div class="row">
                    <div class="col-lg-3 col-sm-4 col-4 logo">
                        <a href="<?php echo home_url('/') ?>"><?php echo wp_get_attachment_image(option('logo'),'full') ?></a>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-8">
                        <div class="contacts">
                            <span class="phone">
                                 <i class="fas fa-phone-volume"></i><a href="tel:<?php echo option('phone_number') ?>"><?php echo option('phone_number') ?></a>
                            </span>
                            <a class="social" href="<?php echo option('telegram') ?>">
                                <span class="social-map social-tel-top">telegram</span>
                            </a>
                            <a class="social" href="<?php echo option('viber') ?>">
                                <span class="social-map social-vib-top">viber</span>
                            </a>
                            <a class="social" href="<?php echo option('whatsapp') ?>">
                                <span class="social-map social-wa-top">whatsapp</span>   
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner-front">
                <div class="boucket">
                    <div class="advantages-text"><?php echo option('banner_advantage1') ?></div>
                    <div class="advantages-text"><?php echo option('banner_advantage2') ?></div>
                    <div class="advantages-text"><?php echo option('banner_advantage3') ?></div>
                    <div class="advantages-text"><?php echo option('banner_advantage4') ?></div>
                    <div class="advantages-text"><?php echo option('banner_advantage5') ?></div>
                    <img src="<?php echo get_template_directory_uri() . '/img/boucket.png' ?>" alt="">
                </div>
                <div class="topper-wrapper">
                    <div class="topper pretty-border">                        
                        <p class="topper-title">
                            <strong>
                                <?php echo option('banner_delivery_title') ?>
                            </strong>
                        </p>
                        <p class="topper-lead">
                            <?php echo option('banner_delivery_lead') ?>
                        </p>
                        <button type="submit" class="btn-accent call-popup" data-mfp-src="#form-popup"><?php echo option('banner_delivery_button') ?></button>
                        <div class="bottom-delivery">
                            <p>жми!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section" id="our-works">
        <div class="container">
            <h2 class="h1">Наши работы</h2>
            <div class="slider">
                <div class="swiper-container">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <?php
                        $query = new WP_Query('post_type=portfolio');
                        $index = 0;
                        while($query->have_posts()) {
                            $query->the_post();
                            $index += 1;
                            get_template_part('content','archive-portfolio');
                        }
                        ?>
                    </div>
                    
                </div>
                <button class="button-prev"><i class="chevron"></i></button>
                <button class="button-next"><i class="chevron"></i></button>
            </div>
            <div class="controls">
                <button class="button-prev"><i class="chevron"></i></button>
                <button class="btn-accent order-button call-popup" data-mfp-src="#form-popup">Хочу заказать!</button>
                <button class="button-next"><i class="chevron"></i></button>
            </div>
        </div>
    </section>
    <section class="section section-order" id="scheme">
        <div class="container">
            <h2 class="h1">Схема заказа</h2>
            <div class="order step-1 lightgallery">
                <div class="row lightgallery">
                    <div class="col-xl-5 col-4 d-flex align-items-center">
                        <span class="h1 step-order">1</span>
                        <div class="order-body">
                            <div class="order-title"><?php echo option('scheme1_title') ?></div>
                            <p><?php echo option('scheme1_text') ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-7 col-8 step1-imgs">
                        <div class="img-container">
                            <a href="<?php echo image_src(option('scheme1_image1'),'full')[0] ?>"
                               class="lg-image img shadow"
                               style="background-image: url(<?php echo image_src(option('scheme1_image1'),'content-medium')[0] ?>)">
                                <span class="zoom"></span>
                                <?php
                                echo image(option('scheme1_image1'),
                                    'content-medium',
                                    ['class'=>'d-none'])
                                ?>

                
                            </a>
                            <p><?php echo option('scheme1_image1_text') ?></p>
                        </div>
                        <div class="img-container">
                            <a href="<?php echo image_src(option('scheme1_image2'),'full')[0] ?>"
                               class="lg-image img shadow"
                               style="background-image: url(<?php echo image_src(option('scheme1_image2'),'content-medium')[0] ?>)">
                                <span class="zoom"></span>
                                <?php
                                echo image(option('scheme1_image2'),
                                    'content-medium',
                                    ['class'=>'d-none'])
                                ?>
                            </a>
                            <p><?php echo option('scheme1_image2_text') ?></p>
                        </div>
                        <div class="img-container">
                            <a href="<?php echo image_src(option('scheme1_image3'),'full')[0] ?>"
                               class="lg-image img shadow"
                               style="background-image: url(<?php echo image_src(option('scheme1_image3'),'content-medium')[0] ?>)">
                                <span class="zoom"></span>
                                <?php
                                echo image(option('scheme1_image3'),
                                    'content-medium',
                                    ['class'=>'d-none'])
                                ?>
                            </a>
                            <p><?php echo option('scheme1_image3_text') ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="order step-2 lightgallery">
                <div class="row">
                    <div class="col-md-7 order-md-2 step-2 d-flex align-items-center justify-content-end step-2-col">
                        <div class="order-body">
                            <div class="order-title"><?php echo option('scheme2_title') ?></div>
                            <p><?php echo option('scheme2_text') ?></p>
                        </div>
                        <span class="h1 step-order">2</span>                    
                    </div>
                    <div class="col-md-4 offset-md-1 order-md-1">
                        <a href="<?php echo image_src(option('scheme2_image1'),'full')[0] ?>"
                         class="lg-image img-thumb"
                         style="background-image: url(<?php echo image_src(option('scheme2_image1'),'content-medium')[0] ?>)">
                            <span class="zoom"></span>
                            <?php echo image(option('scheme2_image1'),'content-medium',['class'=>'d-none']) ?>
                        </a>
                    </div>
                </div>
                <div class="step2-imgs">
                        <a href="<?php echo image_src(option('scheme2_image2'),'full')[0] ?>"
                         class="lg-image img-thumb"
                         style="background-image: url(<?php echo image_src(option('scheme2_image2'),'content-medium')[0] ?>)">
                            <span class="zoom"></span>
                            <?php echo image(option('scheme2_image2'),'content-medium',['class'=>'d-none']) ?>
                        </a>
                        <a href="<?php echo image_src(option('scheme2_image3'),'full')[0] ?>"
                         class="lg-image img-thumb"
                         style="background-image: url(<?php echo image_src(option('scheme2_image3'),'content-medium')[0] ?>)">
                            <span class="zoom"></span>
                            <?php echo image(option('scheme2_image3'),'content-medium',['class'=>'d-none']) ?>
                        </a>
                        <a href="<?php echo image_src(option('scheme2_image4'),'full')[0] ?>"
                         class="lg-image img-thumb"
                         style="background-image: url(<?php echo image_src(option('scheme2_image4'),'content-medium')[0] ?>)">
                            <span class="zoom"></span>
                            <?php echo image(option('scheme2_image4'),'content-medium',['class'=>'d-none']) ?>
                        </a>
                        <a href="<?php echo image_src(option('scheme2_image5'),'full')[0] ?>"
                         class="lg-image img-thumb"
                         style="background-image: url(<?php echo image_src(option('scheme2_image5'),'content-medium')[0] ?>)">
                            <span class="zoom"></span>
                            <?php echo image(option('scheme2_image5'),'content-medium',['class'=>'d-none']) ?>
                        </a>
                </div>
            </div>
            <div class="order step-3 lightgallery">
                    <div class="row">
                        <div class="col-md-5 d-flex align-items-center step-3-col">
                            <span class="h1 step-order">3</span>

                            <div class="order-body">
                                <div class="order-title"><?php echo option('scheme3_title') ?></div>
                                <p><?php echo option('scheme3_text') ?></p>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="wrap-topper">
                                <div class="topper pretty-border">
                                    <p>
                                        <?php echo option('scheme3_border_in_text') ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="step3-imgs">
                        <div class="img-container">                            
                            <a href="<?php echo image_src(option('scheme3_image1'),'full')[0] ?>"
                             class="lg-image img-thumb"
                             style="background-image: url(<?php echo image_src(option('scheme3_image1'),'content-medium')[0] ?>)">
                                <span class="zoom"></span>
                                <?php echo image(option('scheme3_image1'),'content-medium',['class'=>'d-none']) ?>
                            </a>
                            <p><?php echo option('scheme3_image1_rich') ?></p>
                        </div>
                        <div class="img-container">                            
                            <a href="<?php echo image_src(option('scheme3_image2'),'full')[0] ?>"
                             class="lg-image img-thumb"
                             style="background-image: url(<?php echo image_src(option('scheme3_image2'),'content-medium')[0] ?>)">
                                <span class="zoom"></span>
                                <?php echo image(option('scheme3_image2'),'content-medium',['class'=>'d-none']) ?>
                            </a>
                            <p><?php echo option('scheme3_image2_rich') ?></p>
                        </div>
                    </div>
            </div>

            <div class="btn-bot">
                <button class="btn-accent call-popup" data-mfp-src="#form-popup">Собрать букет</button>
            </div>
        </div>
    </section>
    <section class="section section-calculator" id="calculator">
        <div class="container">
            <h2 class="h1">Калькулятор</h2>
            <form action="" class="form-calcul">
                <div class="row">
                    <div class="col-md-7">
                        <div class="form-groups-wrapper">
                            <div class="form-group pretty-first-group">
                                <div class="pretty p-image p-smooth">
                                   <input type="radio" name="package"  value="1" checked />
                                   <div class="state">
                                        <img src="<?php echo get_template_directory_uri() . '/img/check.png' ?>" alt="">
                                       <label>Букет</label>
                                   </div>
                                </div>
                                <div class="pretty p-image p-smooth">
                                   <input type="radio" name="package" class="package" value="2"/>
                                   <div class="state">
                                        <img src="<?php echo get_template_directory_uri() . '/img/check.png' ?>" alt="">
                                       <label>Конфетная коробка</label>
                                   </div>
                                </div>
                                <div class="pretty p-image p-smooth">
                                   <input type="radio" name="package"  value="3"/>
                                   <div class="state">
                                        <img src="<?php echo get_template_directory_uri() . '/img/check.png' ?>" alt="">
                                       <label>Шляпная коробка</label>
                                   </div>
                               </div>
                            </div>
                            <div class="form-group pretty-second-group">
                               <div class="range">
                                   <input type="text" id="example_id" name="weight" value="3000" />
                                   <span class="range-min">500 гр</span>
                                   <span class="range-max">3000 гр</span>
                               </div>
                               <div class="to_selected">
                                   <input type="text" class="p_weight" value="3 000"><span class="text-seconday">гр</span>
                               </div>
                            </div>
                            <div class="form-group pretty-third-group">
                                <div class="pretty p-image p-smooth">
                                   <input type="checkbox" name="add_berries" value="Добавить ягоды"/>
                                   <div class="state">
                                       <img src="<?php echo get_template_directory_uri() . '/img/check.png' ?>" alt="">
                                       <label>Добавить Ягоды</label>
                                   </div>
                                </div>
                                <div class="pretty p-image p-smooth">
                                   <input type="checkbox" name="add_topper" />
                                   <div class="state">
                                       <img src="<?php echo get_template_directory_uri() . '/img/check.png' ?>" alt="">
                                       <label>Добавить топпер</label>
                                   </div>
                               </div>
                                <div class="pretty p-image p-smooth">
                                   <input type="checkbox" name="add_chocostrawberry" class="add_chocostrawberry"/>
                                   <div class="state">
                                       <img src="<?php echo get_template_directory_uri() . '/img/check.png' ?>" alt="">
                                       <label>Добавить клубнику в шоколаде</label>
                                   </div>
                               </div>

                               <div class="input-number disabled" min="1" max="99">
                                 <input type="number" value="1" class="chocostrawberry_num" name="chocostrawberry_num" disabled/>
                                 <button class="input-number-increment" data-increment></button>
                                 <button class="input-number-decrement" data-decrement></button>
                                 <span class="text-seconday position-right str_price">1 шт = 50 руб</span>
                               </div>
                            </div>
                            <div class="total">
                                <b class="text-accent">Стоимость заказа:</b>
                                <span class="amount">5 000</span>
                                <span class="currency">руб</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 d-flex">
                        <div class="topper-wrapper topper-wrapper-delevery">
                            <div class="topper pretty-border">
                                <p>
                                    <strong>Заказывай заранее</strong><br>
                                    что бы успеть!                                    
                                </p>
                                <hr
                                ><input name="name" type="text" placeholder="Ваше имя" required
                                ><br
                                ><input name="phone" type="text" placeholder="Ваш телефон" required
                                ><textarea name="comment" id="" cols="30" rows="10" placeholder="Комментарий к заказу"></textarea
                                ><button type="submit" class="btn-accent">Оформить заказ</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <section class="section section-popular" id="popular">
        <div class="container">
            <h2 class="h1">Популярное</h2>
            <div class="row popular-products">
                <?php 
                $query = new WP_Query('post_type=popular&posts_per_page=4');
                while($query->have_posts()){
                    $query->the_post();
                    get_template_part('content','archive-popular');
                }
                ?>
            </div>
            <div class="btn-bot">
                <button class="btn-accent call-popup" data-mfp-src="#form-popup">Хочу заказать</button>
            </div>
        </div>
    </section>
    <section class="section section-delivery" id="delivery">
        <div class="container">
            <h2 class="h1">Доставка и оплата</h2>
            <div class="delivery-text">
                <b><?php echo option('delivery_title') ?></b><br>
                <?php echo option('delivery_lead') ?>
            </div>
            <div class="delivery-steps">
                <div class="row">
                    <div class="col-md-3">
                        <div class="delivery-step">
                            <div class="step-index">
                                1
                            </div>
                            <p><?php echo option('delivery_step1_text') ?></p>
                        </div>
                    </div>
                    <div class="col-md-3">                        
                        <div class="delivery-step delivery-step-2">
                            <div class="step-index">
                                2
                            </div>
                            <p><?php echo option('delivery_step2_text') ?></p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        
                        <div class="delivery-step delivery-step-3">
                            <div class="step-index">
                                3
                            </div>
                            <p><?php echo option('delivery_step3_text') ?></p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        
                        <div class="delivery-step delivery-step-4">
                            <div class="step-index">
                                4
                            </div>
                            <p><?php echo option('delivery_step4_text') ?></p>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="order-delivery">
                <div class="delivery-text">
                    <b><?php echo option('delivery_title2') ?></b><br>
                    <?php echo option('delivery_lead2') ?>
                </div>
                <button class="btn-accent call-popup" data-mfp-src="#form-popup">Оформить заказ с доставкой</button>
            </div>
            <div class="order-descr">
                <p>
                    <b><?php echo option('delivery_title3') ?></b><br> 
                    <?php echo option('delivery_lead3') ?>
                </p>
            </div>
        </div>
    </section>
    <section class="section section-experts mb-10" id="experts">
        <div class="container">
            <h2 class="h1 mb-10">Экспертность</h2>
            <div class="row">
                <div class="col-md-7 order-md-1 order-sm-2">
                    <div class="experts-block">
                        <h3><?php echo option('experts_title1') ?></h3>
                        <p class="border-bottom"><?php echo option('experts_text1') ?></p>
                    </div>
                    <div class="experts-block">
                        <h3><?php echo option('experts_title2') ?></h3>
                        <p class="border-bottom"><?php echo option('experts_text2') ?></p>
                    </div>
                    <div class="experts-block">
                        <h3><?php echo option('experts_title3') ?></h3>
                        <p><?php echo option('experts_text3') ?></p>
                    </div>
                </div>
                <div class="col-md-5 order-md-2 order-sm-1">
                    <?php echo image(option('experts_logo'),'medium_large','class=img-responsive') ?>
                    <?php echo image(option('experts_img'),'medium_large','class=img-responsive') ?>
                </div>
            </div>
            <div class="btn-bot btn-bot-recal">
                <button class="call-popup btn-accent" data-mfp-src="#form-popup">Перезвонить</button>
            </div>
        </div>
    </section>
    <?php 
    if(option('shortcode_section')){
        ?>
        <section class="section">
            <div class="container">
                
                <div class="shortcode">
                    <?php echo apply_filters('the_content', option('shortcode_section') ) ?>
                </div>
                <div class="row">
                    <a class="arrow-up scrollTo" href="#"><img src="<?php echo get_template_directory_uri() . '/img/img-up.png' ?>" alt=""></a>
                    <div class="bg-bottom"></div>
                </div>
            </div>
        </section>
        <?php
    }
    ?>
    <div id="form-popup" class="popup mfp-hide">
        <div class="popup-inner">
            <div class="delivery-text">
                <b>ЗАКАЗЫВАЙ ЗАРАНЕЕ</b><br>
                чтобы успеть!
            </div>
            <form action="">
                <input name="name" type="text" placeholder="Ваше имя" required>
                <input name="phone" type="text" placeholder="Ваш телефон" required>
                <textarea name="comment" class="w-100" name="" id="" cols="30" rows="10" placeholder="Комментарий к заказу (не обязательно)"></textarea>
                <button type="submit" class="btn-accent">Оформить заказ</button>
            </form>
        </div>
    </div>

<?php get_footer();