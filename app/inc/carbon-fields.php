<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;


add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );

function option($name){
    return carbon_get_theme_option($name);
}

function image_src($id,$size){
    return wp_get_attachment_image_src($id,$size,false);
}
function image($id,$size,$attr){
    return wp_get_attachment_image($id,$size,false,$attr);
}
function get_price_table(){
    $boucket_breakpoints = array();
    foreach (option('boucket_breakpoints') as $key => $value) {
        $boucket_breakpoints[$value['breakpoint']] = +$value['price'];
    }
    $hat_box_breakpoints = array();
    foreach (option('hat_box_breakpoints') as $key => $value) {
        $hat_box_breakpoints[$value['breakpoint']] = +$value['price'];
    }
    return array(
        'packages' => array(
            1 => $boucket_breakpoints,
            2 => array(0=>+option('candy_box_price')),
            3 => $hat_box_breakpoints,
        ),
        'chocostrawberry' => option('chocostrawberry_price'),
        'chocostrawberry2' => option('candy_box_chocostrawberry_price'),
        'add_berries' => option('berries_price'),
        'add_topper' => option('topper_price'),
    );
}
function calc($arr){
    $price_table = get_price_table();

    $add_chocostrawberry = $arr['add_chocostrawberry'] ? 1 : 0;
    if($arr['package'] != 2){
        $weight  = +explode(';',$arr['weight'])[1];
    } else {
        $weight = 0;
    }
    if($add_chocostrawberry){
        $chocostrawberry_num =  +$arr['chocostrawberry_num'];
    } else {
        $chocostrawberry_num = 0;
    }
    $add_berries         = $arr['add_berries'] ? 1 : 0;
    $add_topper          = $arr['add_topper'] ? 1 : 0;
    $package             = $arr['package'];

    $total = 0;
    $total += $price_table['packages'][$package][$weight];
    if($package == 2){
        $total += $price_table['chocostrawberry2']* $chocostrawberry_num;
    } else {
        $total += $price_table['chocostrawberry']* $chocostrawberry_num;
    }
    $total += $add_berries * $price_table['add_berries'];
    $total += $add_topper * $price_table['add_topper'];
    return $total;
}
function crb_attach_theme_options() {

    Container::make( 'theme_options', __( 'Настройки Fragaris', 'crb' ) )
        ->add_tab('Social Links',array(
            Field::make('text','vk','Ссылка vkontakte'),
            Field::make('text','facebook','Номер facebook'),
            Field::make('text','insta','Ссылка instagram'),
            Field::make('text','telegram','Ссылка telegram'),
            Field::make('text','viber','Ссылка viber'),
            Field::make('text','whatsapp','Ссылка WhatsApp'),
            Field::make('text','phone_number','Номер телефона'),
            Field::make('text','email','Email'),
            Field::make('text','city','Город'),
        ))
        ->add_tab('Logo',array(
            Field::make('image','logo','Ссылка vkontakte'),
        ))
        ->add_tab('Banner',array(
            Field::make('text','banner_delivery_title','Заголовок к доставке'),
            Field::make('text','banner_delivery_lead','Подзаголовок к доставке'),
            Field::make('text','banner_delivery_button','Текст кнопки'),
            Field::make( 'separator', 'crb_style_options3', 'Надписи к букету' ),

            Field::make('text','banner_advantage1','текст1'),
            Field::make('text','banner_advantage2','текст2'),
            Field::make('text','banner_advantage3','текст3'),
            Field::make('text','banner_advantage4','текст4'),
            Field::make('text','banner_advantage5','текст5'),
        ))
        ->add_tab('Схема заказа',array(

            Field::make( 'separator', 'crb_style_options4', 'Шаг 1' ),
            Field::make('text','scheme1_title','Заголовок'),
            Field::make('rich_text','scheme1_text','текст'),
            Field::make('image','scheme1_image1','Image'),
            Field::make('text','scheme1_image1_text','Image'),
            Field::make('image','scheme1_image2','Image'),
            Field::make('text','scheme1_image2_text','Image'),
            Field::make('image','scheme1_image3','Image'),
            Field::make('text','scheme1_image3_text','Image'),

            Field::make( 'separator', 'crb_style_options5', 'Шаг 2' ),
            Field::make('text','scheme2_title','Заголовк'),
            Field::make('rich_text','scheme2_text','текст'),
            Field::make('image','scheme2_image1','Image'),
            Field::make('image','scheme2_image2','Image'),
            Field::make('image','scheme2_image3','Image'),
            Field::make('image','scheme2_image4','Image'),
            Field::make('image','scheme2_image5','Image'),

            Field::make( 'separator', 'crb_style_options6', 'Шаг 3' ),
            Field::make('text','scheme3_title','Заголовок'),
            Field::make('rich_text','scheme3_text','текст'),
            Field::make('image','scheme3_image1','Image'),
            Field::make( 'rich_text', 'scheme3_image1_rich', 'Sidenote Content' ),
            Field::make('image','scheme3_image2','Image'),
            Field::make( 'rich_text', 'scheme3_image2_rich', 'Sidenote Content' ),
            Field::make( 'rich_text', 'scheme3_border_in_text', 'Текст в рамке' ),
        ))
        ->add_tab('Доставка и оплата',array(
            Field::make('text','delivery_title','Заголовок 1'),
            Field::make('text','delivery_lead','подзаголовок 1'),
            Field::make('text','delivery_title2','Заголовок 2'),
            Field::make('text','delivery_lead2','text'),
            Field::make('text','delivery_title3','Заголовок 3'),
            Field::make('text','delivery_lead3','text'),

            Field::make('rich_text','delivery_step1_text','Шаг 1 текст'),
            Field::make('rich_text','delivery_step2_text','Шаг 2 текст'),
            Field::make('rich_text','delivery_step3_text','Шаг 3 текст'),
            Field::make('rich_text','delivery_step4_text','Шаг 4 текст'),
        ))
        ->add_tab('Экспертность',array(
            Field::make('rich_text','experts_title1','Заголовок 1'),
            Field::make('rich_text','experts_title2','Заголовок 2'),
            Field::make('rich_text','experts_title3','Заголовок 3'),

            Field::make('rich_text','experts_text1','Текст 1'),
            Field::make('rich_text','experts_text2','Текст 2'),
            Field::make('rich_text','experts_text3','Текст 3'),

            Field::make('image','experts_logo','Лого'),
            Field::make('image','experts_img','Картинка'),

        ))
        ->add_tab('Секция Шорткод',array(
            Field::make('text','shortcode_section_title','Заголовок'),

            Field::make('rich_text','shortcode_section','шорткод'),
        ))
        ->add_tab('Email',array(
            Field::make('text','mail_to','Отправлять кому'),
        ))
        ;
    Container::make( 'post_meta', __( 'Post Options', 'crb' ) )
        ->where( 'post_type', '=', 'portfolio' )
        ->add_fields( array(
            Field::make( 'text', 'price', 'Цена' ),
            Field::make( 'text', 'subtitle', 'Подзагаловок' ),
            Field::make( 'complex', 'gallery', 'Галлерея' )
                ->add_fields( array(
                    Field::make( 'image', 'image', 'Изображение' )
                ) )
    ));

//    $arr1 = array();
//    $arr2 = array();
//    foreach (breakpoints() as $breakpoint) {
//        $arr1[] = Field::make('text','boucket_price'.$breakpoint,$breakpoint);
//        $arr2[] = Field::make('text','hat_box_price'.$breakpoint,$breakpoint);
//    }
    Container::make( 'theme_options', __( 'Настройки Цен', 'crb' ) )
        ->add_tab('Букет',array(
            Field::make( 'complex', 'boucket_breakpoints', 'Галлерея' )
                ->add_fields( array(
                    Field::make( 'text', 'breakpoint', 'Изображение' )->set_width( 50 ),
                    Field::make( 'text', 'price', 'Цена' )->set_width( 50 )
                ) ),
        ))
        ->add_tab('Конфетная коробка',array(
            Field::make( 'text', 'candy_box_price', 'Цена' ),

        ))
        ->add_tab('Шляпная коробка',array(
            Field::make( 'complex', 'hat_box_breakpoints', 'Галлерея' )
                ->add_fields( array(
                    Field::make( 'text', 'breakpoint', 'Вес' )->set_width( 50 ),
                    Field::make( 'text', 'price', 'Цена' )->set_width( 50 )
                ) ),
        ))
        ->add_tab('Ягоды, топпер',array(
            Field::make( 'text', 'chocostrawberry_price', 'Цена за клубнику в шоколаде' ),
            Field::make( 'text', 'candy_box_chocostrawberry_price', 'Цена за клубнику в шоколаде(если конфетная коробка)' ),
            Field::make( 'text', 'topper_price', 'Цена за топпер' ),
            Field::make( 'text', 'berries_price', 'Цена за ягоды' ),
        ))

        ;
    Container::make( 'post_meta', __( 'Post Options', 'crb' ) )
        ->where( 'post_type', '=', 'popular' )
        ->add_fields( array(
            Field::make( 'text', 'price', 'Цена' ),
            Field::make( 'complex', 'gallery', 'Галлерея' )
                ->add_fields( array(
                    Field::make( 'image', 'image', 'Изображение' )
                ) )
    ));
}

add_filter( 'carbon_fields_map_field_api_key', 'crb_get_gmaps_api_key' );
function crb_get_gmaps_api_key( $current_key ) {
    return 'AIzaSyBMp8oZmBVFSlE8g_W4gcjaj0-2OykcbH0';
}

?>