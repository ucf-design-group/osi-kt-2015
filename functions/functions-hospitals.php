<?php

function hospital_meta_setup() {

	add_action('add_meta_boxes','hospital_meta_add');
	add_action('save_post','hospital_meta_save');
}
add_action('load-post.php','hospital_meta_setup');
add_action('load-post-new.php','hospital_meta_setup');

function hospital_meta_add() {
 
	add_meta_box (
	'hospital_meta',
	'hospital Information',
	'hospital_meta',
	'hospitals',
	'normal',
	'default');
}

function hospital_meta() {

	global $post;
	wp_nonce_field(basename( __FILE__ ), 'hospital-form-nonce' );

	$url = get_post_meta($post->ID, 'hospital-form-url', true) ? get_post_meta($post->ID, 'hospital-form-url', true) : '';
	$order = get_post_meta($post->ID, 'hospital-form-order', true) ? get_post_meta($post->ID, 'hospital-form-order', true) : '';

	?>
	<style type="text/css">#hospital-form-order{width: 50px;}#hospital-form div{display:inline-block; padding:0 5px;}</style>
	<div id="hospital-form">
		<div>
			<label for="hospital-form-url">Hospital URL:</label>
			<input type="text" name="hospital-form-url" id="hospital-form-url" value="<?php echo $url; ?>" />
		</div>
		<div>
			<label for="hospital-form-order">Order on Page:</label>
			<input type="text" name="hospital-form-order" id="hospital-form-order" value="<?php echo $order; ?>" />
		</div>
	</div>
	<?php
}


function hospital_meta_save() {

	global $post;
	$post_id = $post->ID;

	if (!isset($_POST['hospital-form-nonce']) || !wp_verify_nonce($_POST['hospital-form-nonce'], basename( __FILE__ ))) {
		return $post->ID;
	}

	$post_type = get_post_type_object($post->post_type);

	if (!current_user_can($post_type->cap->edit_post, $post_id)) {
		return $post->ID;
	}

	$input = array();

	$input['url'] = (isset($_POST['hospital-form-url']) ? $_POST['hospital-form-url'] : '');
	$input['order'] = (isset($_POST['hospital-form-order']) ? $_POST['hospital-form-order'] : '');

	$input['order'] = str_pad($input['order'], 3, "0", STR_PAD_LEFT);

	foreach ($input as $field => $value) {

		$old = get_post_meta($post_id, 'hospital-form-' . $field, true);

		if ($value && '' == $old)
			add_post_meta($post_id, 'hospital-form-' . $field, $value, true );
		else if ($value && $value != $old)
			update_post_meta($post_id, 'hospital-form-' . $field, $value);
		else if ('' == $value && $old)
			delete_post_meta($post_id, 'hospital-form-' . $field, $old);
	}
}

?>