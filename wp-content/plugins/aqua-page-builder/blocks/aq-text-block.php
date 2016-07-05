<?php
/** A simple text block **/
class AQ_Text_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => __('Text', 'aqpb-l10n'),
			'size' => 'span6',
		);
		
		//create the block
		parent::__construct('aq_text_block', $block_options);
	}
	
	function form($instance) {
		
		$defaults = array(
			'text'   => '',
			'filter' => 0
		);
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
		
		?>
		<p class="description">
			<label for="<?php echo $this->get_field_id('title') ?>">
				Title (optional)
				<?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('text') ?>">
				Content
				<?php echo aq_field_textarea('text', $block_id, $text, $size = 'full') ?>
			</label>
			<label for="<?php echo $this->get_field_id('filter') ?>">
				<?php echo aq_field_checkbox('filter', $block_id, $filter) ?>
				<?php _e('Automatically add paragraphs', 'aqpb-l10n') ?>
			</label>
		</p>
		<?php
	}
	
	function block($instance) {
		extract($instance);

		$wp_autop = ( isset($wp_autop) ) ? $wp_autop : 0;
		
		if($title) echo '<h4 class="aq-block-title">'.strip_tags($title).'</h4>';
		if($wp_autop == 1) {
			echo do_shortcode(htmlspecialchars_decode($text));
		} else {
			echo wpautop(do_shortcode(htmlspecialchars_decode($text)));
		}
		
	}
	
}
