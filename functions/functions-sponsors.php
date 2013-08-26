<?php

function sponsor_meta_setup() {

	add_action('add_meta_boxes','sponsor_meta_add');
	add_action('save_post','sponsor_meta_save');
}
add_action('load-post.php','sponsor_meta_setup');
add_action('load-post-new.php','sponsor_meta_setup');

function sponsor_meta_add() {
 
	add_meta_box (
	'sponsor_meta',
	'Sponsor Information',
	'sponsor_meta',
	'sponsors',
	'normal',
	'default');
}

function sponsor_meta() {

	global $post;
	wp_nonce_field(basename( __FILE__ ), 'sponsor-form-nonce' );

	$order = get_post_meta($post->ID, 'sponsor-form-order', true) ? get_post_meta($post->ID, 'sponsor-form-order', true) : '';

	?>
	<style type="text/css">#sponsor-form-order{width: 50px;}#sponsor-form div{display:inline-block; padding:0 5px;}</style>
	<div id="sponsor-form">
		<div>
			<label for="sponsor-form-order">Order on Page:</label>
			<input type="text" name="sponsor-form-order" id="sponsor-form-order" value="<?php echo $order; ?>" />
		</div>
	</div>
	<?php
}


function sponsor_meta_save() {

	global $post;
	$post_id = $post->ID;

	if (!isset($_POST['sponsor-form-nonce']) || !wp_verify_nonce($_POST['sponsor-form-nonce'], basename( __FILE__ ))) {
		return $post->ID;
	}

	$post_type = get_post_type_object($post->post_type);

	if (!current_user_can($post_type->cap->edit_post, $post_id)) {
		return $post->ID;
	}

	$input = array();

	$input['order'] = (isset($_POST['sponsor-form-order']) ? $_POST['sponsor-form-order'] : '');

	$input['order'] = str_pad($input['order'], 3, "0", STR_PAD_LEFT);

	foreach ($input as $field => $value) {

		$old = get_post_meta($post_id, 'sponsor-form-' . $field, true);

		if ($value && '' == $old)
			add_post_meta($post_id, 'sponsor-form-' . $field, $value, true );
		else if ($value && $value != $old)
			update_post_meta($post_id, 'sponsor-form-' . $field, $value);
		else if ('' == $value && $old)
			delete_post_meta($post_id, 'sponsor-form-' . $field, $old);
	}
}

?>