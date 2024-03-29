<div class="qode-info-card">
	<?php if($image != '') : ?>
		<div class="qode-info-card-image" <?php echo qode_get_inline_style($holder_style); ?>>
			<img src="<?php echo wp_get_attachment_url($image) ?>" alt="" />
		</div>
	<?php endif; ?>
	<div class="qode-info-card-text-holder" <?php echo qode_get_inline_style($holder_style); ?>>
		<?php if($title != '') : ?>
			<span class="qode-info-card-title" <?php echo qode_get_inline_style($text_style) ?>>
				<?php echo esc_attr($title); ?>
			</span>
		<?php endif; ?>
		<?php if($text != '') : ?>
			<p class="qode-info-card-text" <?php echo qode_get_inline_style($text_style) ?>>
				<?php echo esc_attr($text); ?>
			</p>
		<?php endif; ?>
	</div>
	<?php if($enable_button): ?>
		<div class="qode-info-card-link-holder">
			<a itemprop="url" class="qode-qbutton-main-color qode-qbutton-full-width qode-qbutton-square" href="<?php echo esc_url($button_link); ?>" target="<?php echo esc_attr($button_target); ?>" <?php echo qode_get_inline_style($button_style); ?>><span><?php echo esc_attr($button_text); ?></span></a>
		</div>
	<?php endif; ?>
</div>