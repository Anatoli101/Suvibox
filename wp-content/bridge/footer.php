<?php
	global $qode_options_proya;
	$page_id = qode_get_page_id();
?>
<?php 
$content_bottom_area = "yes";
if(get_post_meta($page_id, "qode_enable_content_bottom_area", true) != ""){
	$content_bottom_area = get_post_meta($page_id, "qode_enable_content_bottom_area", true);
} else{
	if (isset($qode_options_proya['enable_content_bottom_area'])) {
		$content_bottom_area = $qode_options_proya['enable_content_bottom_area'];
	}
}
$content_bottom_area_sidebar = "";
if(get_post_meta($page_id, 'qode_choose_content_bottom_sidebar', true) != ""){
	$content_bottom_area_sidebar = get_post_meta($page_id, 'qode_choose_content_bottom_sidebar', true);
} else {
	if(isset($qode_options_proya['content_bottom_sidebar_custom_display'])) {
		$content_bottom_area_sidebar = $qode_options_proya['content_bottom_sidebar_custom_display'];
	}
}
$content_bottom_area_in_grid = true;
if(get_post_meta($page_id, 'qode_content_bottom_sidebar_in_grid', true) != ""){
	if(get_post_meta($page_id, 'qode_content_bottom_sidebar_in_grid', true) == "yes") {
		$content_bottom_area_in_grid = true;
	} else {
		$content_bottom_area_in_grid = false;
	} 
}
else {
	if(isset($qode_options_proya['content_bottom_in_grid'])){if ($qode_options_proya['content_bottom_in_grid'] == "no") $content_bottom_area_in_grid = false;}
}
$content_bottom_background_color = '';
if(get_post_meta($page_id, "qode_content_bottom_background_color", true) != ""){
	$content_bottom_background_color = get_post_meta($page_id, "qode_content_bottom_background_color", true);
}
?>
	<?php if($content_bottom_area == "yes") { ?>
	<?php if($content_bottom_area_in_grid){ ?>
		<div class="container">
			<div class="container_inner clearfix">
	<?php } ?>
		<div class="content_bottom" <?php if($content_bottom_background_color != ''){ echo 'style="background-color:'.$content_bottom_background_color.';"'; } ?>>
			<?php dynamic_sidebar($content_bottom_area_sidebar); ?>
		</div>
		<?php if($content_bottom_area_in_grid){ ?>
					</div>
				</div>
			<?php } ?>
	<?php } ?>
	
	</div>
</div>

<?php
if(isset($qode_options_proya['paspartu']) && $qode_options_proya['paspartu'] == 'yes'){?>
        <?php if(isset($qode_options_proya['vertical_area']) && $qode_options_proya['vertical_area'] == "yes" && isset($qode_options_proya['vertical_menu_inside_paspartu']) && $qode_options_proya['vertical_menu_inside_paspartu'] == 'no') { ?>
        </div> <!-- paspartu_middle_inner close div -->
        <?php } ?>
    </div> <!-- paspartu_inner close div -->
    <?php if((isset($qode_options_proya['paspartu_on_bottom']) && $qode_options_proya['paspartu_on_bottom'] == 'yes') ||
        (isset($qode_options_proya['vertical_area']) && $qode_options_proya['vertical_area'] == "yes" && isset($qode_options_proya['vertical_menu_inside_paspartu']) && $qode_options_proya['vertical_menu_inside_paspartu'] == 'yes')){ ?>
        <div class="paspartu_bottom"></div>
    <?php }?>
    </div> <!-- paspartu_outer close div -->
<?php
}
?>

<?php

$footer_classes_array = array();
$footer_classes = '';

$paspartu = false;
if(isset($qode_options_proya['paspartu']) && $qode_options_proya['paspartu'] == 'yes'){
    $paspartu = true;
}

if(isset($qode_options_proya['paspartu']) && $qode_options_proya['paspartu'] == 'yes' && isset($qode_options_proya['paspartu_footer_alignment']) && $qode_options_proya['paspartu_footer_alignment'] == 'yes'){
    $footer_classes_array[]= 'paspartu_footer_alignment';
}

if(isset($qode_options_proya['uncovering_footer']) && $qode_options_proya['uncovering_footer'] == "yes" && $paspartu == false){
    $footer_classes_array[] = 'uncover';
}

$display_footer_top = true;

/*$footer_top_per_page_option = get_post_meta($page_id, "footer_top_per_page", true);
if(!empty($footer_top_per_page_option)){
	$footer_top_per_page = $footer_top_per_page_option;
}


if (isset($qode_options_proya['show_footer_top'])) {
	if ($qode_options_proya['show_footer_top'] == "no" && $footer_top_per_page_option == 'no') $display_footer_top = false;
}*/

$display_footer_text = true;

/*if (isset($qode_options_proya['footer_text'])) {
	if ($qode_options_proya['footer_text'] == "yes") $display_footer_text = true;
}*/

//is some class added to footer classes array?
if(is_array($footer_classes_array) && count($footer_classes_array)) {
    //concat all classes and prefix it with class attribute
    $footer_classes = esc_attr(implode(' ', $footer_classes_array));
}

?>

<?php if($display_footer_top || $display_footer_text) { ?>
	<footer <?php echo qode_get_inline_attr($footer_classes, 'class'); ?>>
		<div class="footer_inner clearfix">
		<?php
		$footer_in_grid = true;
		if(isset($qode_options_proya['footer_in_grid'])){
			if ($qode_options_proya['footer_in_grid'] != "yes") {
				$footer_in_grid = false;
			}
		}

		
		$footer_top_columns = 4;
		if (isset($qode_options_proya['footer_top_columns'])) {
			$footer_top_columns = $qode_options_proya['footer_top_columns'];
		}

        $footer_top_border_color = !empty($qode_options_proya['footer_top_border_color']) ? $qode_options_proya['footer_top_border_color'] : '';
        $footer_top_border_width = isset($qode_options_proya['footer_top_border_width']) && $qode_options_proya['footer_top_border_width'] !== '' ? $qode_options_proya['footer_top_border_width'].'px' : '1px';
        $footer_top_border_in_grid = 'no';
        $footer_top_border_in_grid_class = '';

        if(isset($qode_options_proya['footer_top_border_in_grid'])) {
            $footer_top_border_in_grid = $qode_options_proya['footer_top_border_in_grid'];
            $footer_top_border_in_grid_class = $footer_top_border_in_grid == 'yes' ? 'in_grid' : '';
        }

        $footer_top_border_style = array();
        if($footer_top_border_color !== '') {
            $footer_top_border_style[] = 'background-color: '.$footer_top_border_color;
        }

        if($footer_top_border_width !== '') {
            $footer_top_border_style[] = 'height: '.$footer_top_border_width;
        }

		if($display_footer_top) { ?>
		<div class="footer_top_holder">
            <?php if($footer_top_border_color !== '') { ?>
                <div <?php qode_inline_style($footer_top_border_style); ?> <?php qode_class_attribute('footer_top_border '.$footer_top_border_in_grid_class); ?>></div>
            <?php } ?>
			<div class="footer_top<?php if(!$footer_in_grid) {echo " footer_top_full";} ?>">
				<?php if($footer_in_grid){ ?>
				<div class="container">
					<div class="container_inner">
				<?php } ?>
						<?php switch ($footer_top_columns) { 
							case 6:
						?>
							<div class="two_columns_50_50 clearfix">
								<div class="column1 footer_col1">
										<div class="column_inner">
											<?php dynamic_sidebar( 'footer_column_1' ); ?>
										</div>
								</div>
								<div class="column2">
									<div class="column_inner">
										<div class="two_columns_50_50 clearfix">
											<div class="column1 footer_col2">
												<div class="column_inner">
													<?php dynamic_sidebar( 'footer_column_2' ); ?>
												</div>
											</div>
											<div class="column2 footer_col3">
												<div class="column_inner">
													<?php dynamic_sidebar( 'footer_column_3' ); ?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>							
						<?php 
							break;
							case 5:
						?>
							<div class="two_columns_50_50 clearfix">
								<div class="column1">
									<div class="column_inner">
										<div class="two_columns_50_50 clearfix">
											<div class="column1 footer_col1">
												<div class="column_inner">
													<?php dynamic_sidebar( 'footer_column_1' ); ?>
												</div>
											</div>
											<div class="column2 footer_col2">
												<div class="column_inner">
													<?php dynamic_sidebar( 'footer_column_2' ); ?>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="column2 footer_col3">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_3' ); ?>
									</div>
								</div>
							</div>							
						<?php 
							break;
							case 4:
						?>
							<div class="four_columns clearfix">
								<div class="column1 footer_col1">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_1' ); ?>
									</div>
								</div>
								<div class="column2 footer_col2">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_2' ); ?>
									</div>
								</div>
								<div class="column3 footer_col3">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_3' ); ?>
									</div>
								</div>
								<div class="column4 footer_col4">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_4' ); ?>
									</div>
								</div>
							</div>
						<?php
							break;
							case 3:
						?>
							<div class="three_columns clearfix">
								<div class="column1 footer_col1">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_1' ); ?>
									</div>
								</div>
								<div class="column2 footer_col2">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_2' ); ?>
									</div>
								</div>
								<div class="column3 footer_col3">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_3' ); ?>
									</div>
								</div>
							</div>
						<?php
							break;
							case 2:
						?>
							<div class="two_columns_50_50 clearfix">
								<div class="column1 footer_col1">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_1' ); ?>
									</div>
								</div>
								<div class="column2 footer_col2">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_2' ); ?>
									</div>
								</div>
							</div>
						<?php
							break;
							case 1:
								dynamic_sidebar( 'footer_column_1' );
							break;
						}
						?>
				<?php if($footer_in_grid){ ?>
					</div>
				</div>
				<?php } ?>
			</div>
			<?php if (isset($qode_options_proya['footer_angled_section'])  && $qode_options_proya['footer_angled_section'] == "yes"){ ?>
				<svg class="angled-section svg-footer-bottom" preserveAspectRatio="none" viewBox="0 0 86 86" width="100%" height="86">
					<?php if(isset($qode_options_proya['footer_angled_section_direction']) && $qode_options_proya['footer_angled_section_direction'] == 'from_left_to_right'){ ?>
						<polygon points="0,0 0,86 86,86" />
					<?php }
					if(isset($qode_options_proya['footer_angled_section_direction']) && $qode_options_proya['footer_angled_section_direction'] == 'from_right_to_left'){ ?>
						<polygon points="0,86 86,0 86,86" />
					<?php } ?>
				</svg>
			<?php } ?>
		</div>
		<?php } ?>
		<?php


		$footer_bottom_columns = 1;
		if (isset($qode_options_proya['footer_bottom_columns'])) {
			$footer_bottom_columns = $qode_options_proya['footer_bottom_columns'];
		}

		$footer_bottom_in_grid = false;
		if(isset($qode_options_proya['footer_bottom_in_grid'])){
			if ($qode_options_proya['footer_bottom_in_grid'] == "yes") {
				$footer_bottom_in_grid = true;
			}
		}

        $footer_bottom_border_color = !empty($qode_options_proya['footer_bottom_border_color']) ? $qode_options_proya['footer_bottom_border_color'] : '';
        $footer_bottom_border_width = isset($qode_options_proya['footer_bottom_border_width']) && $qode_options_proya['footer_bottom_border_width'] !== '' ? $qode_options_proya['footer_bottom_border_width'].'px' : '1px';
        $footer_bottom_border_in_grid = 'no';
        $footer_bottom_border_in_grid_class = '';

        if(isset($qode_options_proya['footer_bottom_border_in_grid'])) {
            $footer_bottom_border_in_grid = $qode_options_proya['footer_bottom_border_in_grid'];
            $footer_bottom_border_in_grid_class = $footer_bottom_border_in_grid == 'yes' ? 'in_grid' : '';
        }

        $footer_bottom_border_style = array();
        if($footer_bottom_border_color !== '') {
            $footer_bottom_border_style[] = 'background-color: '.$footer_bottom_border_color;
        }

        if($footer_bottom_border_width !== '') {
            $footer_bottom_border_style[] = 'height: '.$footer_bottom_border_width;
        }

		if($display_footer_text){ ?>
			<div class="footer_bottom_holder">
                <?php if($footer_bottom_border_color !== '') { ?>
                    <div <?php qode_inline_style($footer_bottom_border_style); ?> <?php qode_class_attribute('footer_bottom_border '.$footer_bottom_border_in_grid_class); ?>></div>
                <?php } ?>
				<?php if($footer_bottom_in_grid){ ?>
				<div class="container">
					<div class="container_inner">
				<?php } ?>
		<?php
			switch ($footer_bottom_columns) {
			case 1:
			?>
			<div class="footer_bottom">
				<?php dynamic_sidebar( 'footer_text' ); ?>
			</div>
		<?php
			break;
			case 2:
		?>
				<div class="two_columns_50_50 footer_bottom_columns clearfix">
					<div class="column1 footer_bottom_column">
						<div class="column_inner">
							<div class="footer_bottom">
								<?php dynamic_sidebar( 'footer_text_left' ); ?>
							</div>
						</div>
					</div>
					<div class="column2 footer_bottom_column">
						<div class="column_inner">
							<div class="footer_bottom">
								<?php dynamic_sidebar( 'footer_text_right' ); ?>
							</div>
						</div>
					</div>
				</div>
				<?php
			break;
			case 3:
		?>
				<div class="three_columns footer_bottom_columns clearfix">
					<div class="column1 footer_bottom_column">
						<div class="column_inner">
							<div class="footer_bottom">
								<?php dynamic_sidebar( 'footer_text_left' ); ?>
							</div>
						</div>
					</div>
					<div class="column2 footer_bottom_column">
						<div class="column_inner">
							<div class="footer_bottom">
								<?php dynamic_sidebar( 'footer_text' ); ?>
							</div>
						</div>
					</div>
					<div class="column3 footer_bottom_column">
						<div class="column_inner">
							<div class="footer_bottom">
								<?php dynamic_sidebar( 'footer_text_right' ); ?>
							</div>
						</div>
					</div>
				</div>
		<?php
			break;
			default:
		?>
				<div class="footer_bottom">
					<?php dynamic_sidebar( 'footer_text' ); ?>
				</div>
		<?php break; ?>
		<?php } ?>
			<?php if($footer_bottom_in_grid){ ?>
				</div>
			</div>
			<?php } ?>
			</div>
		<?php } ?>
		</div>
	</footer>
	<?php } ?>
	
</div>
</div>

<?php $popUp = false; 
	if($popUp == true){
?> 
	<div class="sgpb-popup-builder-content-293 sgpb-popup-builder-content-html">
		<div class="close"></div>
		<div class="sgpb-main-html-content-wrapper">
			<p>Wybierz swoją Strefę Dostaw*</p>
			<ul>
				<li>
					<a href="javascript:void(0)">Łódź</a>
				</li>
				<li>
					<a href="javascript:void(0)">Poznań</a>
				</li>
				<li>
					<a href="javascript:void(0)">Trójmiasto</a>
				</li>
				<li>
					<a href="javascript:void(0)">Warszawa</a>
				</li>
				<li>
					<a href="javascript:void(0)">Wrocław</a>
				</li>
				<li>
					<a href="javascript:void(0)">Rzeszów</a>
				</li>
				<li>
					<a href="javascript:void(0)">Kraków</a>
				</li>
				<li>
					<a href="javascript:void(0)">Aglomeracja Śląsk</a>
				</li>
			</ul>
			<p>* Obejmuje miasto i okolice</p>
		</div>
	</div>
<?php } ?>


<?php wp_footer(); ?>
<script type="text/javascript">
	function getCookie(cname) {
	    var name = cname + "=";
	    var decodedCookie = decodeURIComponent(document.cookie);
	    var ca = decodedCookie.split(';');
	    for(var i = 0; i <ca.length; i++) {
	        var c = ca[i];
	        while (c.charAt(0) == ' ') {
	            c = c.substring(1);
	        }
	        if (c.indexOf(name) == 0) {
	            return c.substring(name.length, c.length);
	        }
	    }
	    return "";
	}

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

var city = '';
var aCity = document.querySelectorAll('.sgpb-popup-builder-content-293 a');
var popUp = document.querySelector('.sgpb-popup-builder-content-293');
var body = document.body;
var close = document.querySelector('.sgpb-popup-builder-content-293 .close')

aCity.forEach(function(aCity){
	aCity.addEventListener('click', function(e){
		city = this.innerHTML;
		setCookie('City',city,700);

		// popUp.classList.remove('active');
		// body.classList.remove("maskbody");
	})
});

if(!getCookie('City')){

	// popUp.classList.add('active');
	// body.classList.add("maskbody");
	
}

close.addEventListener('click', function(e){

	// popUp.classList.remove('active');
	// body.classList.remove("maskbody");

})

</script>
<script>
	var iconHolder = document.querySelectorAll('.my-tooltip .q_icon_with_title .icon_holder');

	iconHolder.forEach(function(iconHolder){
		iconHolder.addEventListener('mouseover', function(e) {
		    this.parentElement.querySelector('.icon_text_holder').classList.add('active');
		});
		iconHolder.addEventListener('mouseout', function(e) {
		    this.parentElement.querySelector('.icon_text_holder').classList.remove('active');
		});
	});
</script>

<script>
// 	$('.mobile_menu_button').on('click', function(){

// 	if($(this).parent('li').hasClass('open_menu')){
// 		$(this).parent('li').removeClass('open_menu');
		
// 		$(this).parent('li').addClass('open_sub');
// 		$(this).parent('li').find('.sub_menu').css({"overflow": "unset","display":"none"});
// // 		alert();
// // 		open_sub
// 	}else{
// 		$(this).parent('li').addClass('open_menu');
// 				$(this).parent('li').removeClass('open_sub');
// 		$(this).parent('li').find('.sub_menu').css({"overflow": "hidden","display":"block"})
// 	}
// });

// jQuery(function($) {
// function removeSingleCharLineBreak(){
//     var words = ['a', 'i', 's', 'z', 'v', 'k', 'o', 'u', 'w', 
//         'A', 'I', 'S', 'Z', 'V', 'K', 'O', 'U', '€',
//         'na', 'za', 'do', 'Na', 'Za', 'sous',
//         ];

//     var elements = ['p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'li', 'td', 'td','span'];


//     $.each(words, function(index, word){
//         var regex = new RegExp(" " + word + " ", "g");

//         $.each(elements, function(index, element){

//             $(element + ':contains( ' + word + ' )').each(function(){

//                 if (word == '€') 
//                 {
//                     $(this).html(
//                         $(this).html().replace(regex, '&nbsp;' + word + '&nbsp;')
//                     );       
//                 }
//                 else
//                 {
//                     $(this).html(
//                         $(this).html().replace(regex, ' ' + word + '&nbsp;')
//                     );                    
//                 }

//             });

//         });

// 	});
//     }
//     removeSingleCharLineBreak();
// });

</script>
</body>
</html>