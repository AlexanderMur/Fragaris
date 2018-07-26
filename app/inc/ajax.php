<?php

add_action( 'wp_ajax_send_mail', 'ajax_send_mail'  );
add_action( 'wp_ajax_nopriv_send_mail', 'ajax_send_mail'  );

function ajax_send_mail(){

        $package_id = isset($_POST['package']) ? $_POST['package'] : '' ;
        $package = '';
        if($package_id == '1'){
        	$package = 'Букет';
        }
        if($package_id == '2'){
        	$package = 'Конфетная коробка';
        }
        if($package_id == '3'){
        	$package = 'Шляпная коробка';
        }
		$weight = isset($_POST['weight']) ? $_POST['weight'] : '' ;
		$add_berries = isset($_POST['add_berries']) ? $_POST['add_berries'] : '' ;
		$add_topper = isset($_POST['add_topper']) ? $_POST['add_topper'] : '' ;
		$add_chocostrawberry = isset($_POST['add_chocostrawberry']) ? $_POST['add_chocostrawberry'] : '' ;
		$chocostrawberry_num = isset($_POST['chocostrawberry_num']) ? $_POST['chocostrawberry_num'] : '' ;
		if($package != ''){
			$total = calc(array(
				'weight' => $weight, 
				'add_berries' => $add_berries, 
				'add_topper' => $add_topper, 
				'add_chocostrawberry' => $add_chocostrawberry, 
				'chocostrawberry_num' => $chocostrawberry_num,
				'package' => $package_id,
			));
		} else {
			$total = '';
		}
		$name = isset($_POST['name']) ? $_POST['name'] : '' ;
		$phone = isset($_POST['phone']) ? $_POST['phone'] : '' ;
		$comment = isset($_POST['comment']) ? $_POST['comment'] : '' ;

        $title='Новая заявка с сайта parkioriginal.ru ';
		$text = ' <!DOCTYPE html> 
					<html> 
						<head> 
							<title>Новая заявка с сайта fragaris.ru </title> 
						</head> 
						<body> 
							<p>ПОСТУПИЛА ЗАЯВКА С САЙТА </p>';
							if($package != '') $text .= "<p><b>Упаковка: </b>".$package."</p>";
							if($weight != '') $text .= "<p><b>Вес: </b>".$weight."</p>";
							if($add_berries != '') $text .= "<p><b>Добавить ягоды: </b>".$add_berries."</p>";
							if($add_topper != '') $text .= "<p><b>Добавить топпер: </b>".$add_topper."</p>";
							if($add_chocostrawberry != '') $text .= "<p><b>Добавить клубнику в шоколаде: </b>".$add_chocostrawberry."</p>";
							if($chocostrawberry_num != '' && $add_chocostrawberry != '') $text .= "<p><b>Количество клубник в шоколаде: </b>".$chocostrawberry_num."</p>";
							if($total != '') $text .= "<p><b>Стоимость: </b>".$total."</p>";
							if($name != '') $text .= "<p><b>Имя: </b>".$name."</p>";
							if($phone != '') $text .= "<p><b>Телефон: </b>".$phone."</p>";
							if($comment != '') $text .= "<p><b>Комментарий: </b>".$comment."</p>
							<p><b>IP клиента: </b> ".$_SERVER["REMOTE_ADDR"]."</p> 
						</body> 
					</html>";

		$to = carbon_get_theme_option('mail_to');

        $header = 'MIME-Version: 1.0' . "\r\n";
        $header .= "Content-type: text/html; charset=utf-8" . "\r\n";
        $header .= "From: info@parkioriginal.ru" . "\r\n";
        $header .= "Subject: $title" . "\r\n";
        // функция, которая отправляет наше письмо.
        wp_mail($to, $title, $text, $header);


		die('Succes');
}
?>