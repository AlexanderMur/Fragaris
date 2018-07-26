    <footer id="contacts">
	    <div class="container">
	        <div class="row">
	        	<div class="col-6 col-md-2 col-xl-3 pt-10">
	        		<a href="#"><img src="<?php echo get_template_directory_uri() . '/img/logo.png' ?>" alt=""></a>
	        	</div>
	        	<div class="col-xl-4 col-6 col-lg-5 col-md-3">
	        		<ul class="nav-footer mr-65">
	        			<li><a class="scrollTo" href="#">Главная</a></li>
	        			<li><a class="scrollTo" href="#our-works">Наши работы</a></li>
	        			<li><a class="scrollTo" href="#scheme">Схема заказа</a></li>
	        			<li><a class="scrollTo" href="#calculator">Калькулятор</a></li>
	        		</ul>
	        		<ul class="nav-footer">
	        			<li><a class="scrollTo" href="#popular">Популярное</a></li>
	        			<li><a class="scrollTo" href="#delivery">Доставка и оплата</a></li>
	        			<li><a class="scrollTo" href="#experts">Экспертность</a></li>
	        		</ul>
	        	</div>
	        	<div class="col-xl-5 col-12 col-lg-5 col-md-7">
	        		<div class="row">
	        			<div class="col-12">
	        				<div class="social-footer border-bottom">
	        					<span>Мы в соц.сетях:</span>
	        					<a class="social" target="_blank" href="<?php echo carbon_get_theme_option('vk') ?>">
	        					    <span class="social-map social-vk-bottom">vk</span>
	        					</a>
	        					<a class="social" target="_blank" href="<?php echo carbon_get_theme_option('facebook') ?>">
	        					    <span class="social-map social-fb-bottom">facebook</span>
	        					</a>
	        					<a class="social" target="_blank" href="<?php echo carbon_get_theme_option('insta') ?>">
	        					    <span class="social-map social-ins-bottom">instagram</span>
	        					</a>
	        				</div>	
	        			</div>
	        			<div class="col-12">
	        				<div class="social-footer pt-17">
	        					<span>
	        					    <i class="fas fa-phone-volume"></i><a href="tel:<?php echo carbon_get_theme_option('phone_number') ?>"><?php echo carbon_get_theme_option('phone_number') ?></a>
	        					</span>
	        					<a class="social" target="_blank" href="<?php echo carbon_get_theme_option('telegram') ?>">
	        					    <span class="social-map social-tel-bottom">telegram</span>
	        					</a>
	        					<a class="social" target="_blank" href="<?php echo carbon_get_theme_option('viber') ?>">
	        					    <span class="social-map social-vib-bottom">viber</span>
	        					</a>
	        					<a class="social" target="_blank" href="<?php echo carbon_get_theme_option('whatsapp') ?>">
	        					    <span class="social-map social-wa-bottom">whatsapp</span>
	        					</a>
	        				</div>		
	        			</div>
	        			<div class="col-12">
	        				<div class="social-footer pt-10">
	        					<span>
	        					    <i class="fas fa-map-marker-alt"></i> Г. Москва
	        					</span>
	        					<span>
	        					    <i class="fas fa-envelope"></i><a target="_blank" href="mailto:<?php echo option('email') ?>"><?php echo option('email') ?></a>
	        					</span>
	        				</div>		
	        			</div>
	        		</div>
	        	</div>
	        </div>
	    </div>
    </footer>
    </div>
</div>
	<script type="text/javascript" >
	 (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter47857040 = new Ya.Metrika2({ id:47857040, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true, ut:"noindex" }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/tag.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks2"); </script>
	 <noscript>
	 	<div>
	 		<img src="https://mc.yandex.ru/watch/47857040?ut=noindex" style="position:absolute; left:-9999px;" alt="" />
	 	</div>
	 </noscript> <!-- /Yandex.Metrika counter -->
<?php wp_footer()?>
</body>
</html>