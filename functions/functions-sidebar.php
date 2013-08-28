<?php

function sidebar_meta_setup() {

	add_action('add_meta_boxes','sidebar_meta_add');
	add_action('save_post','sidebar_meta_save');
}
add_action('load-post.php','sidebar_meta_setup');
add_action('load-post-new.php','sidebar_meta_setup');

function sidebar_meta_add() {
 
	add_meta_box (
	'sidebar_meta',
	'Child Information',
	'sidebar_meta',
	'sidebar-items',
	'normal',
	'default');
}

function sidebar_meta() {

	global $post;
	wp_nonce_field(basename( __FILE__ ), 'sidebar-form-nonce' );

	$order = get_post_meta($post->ID, 'sidebar-form-order', true) ? get_post_meta($post->ID, 'sidebar-form-order', true) : '';

	?>
	<style type="text/css">#sidebar-form-order{width: 50px;}#sidebar-form div{display:inline-block; padding:0 5px;}</style>
	<div id="sidebar-form">
		<div>
			<label for="sidebar-form-order">Order on Page:</label>
			<input type="text" name="sidebar-form-order" id="sidebar-form-order" value="<?php echo $order; ?>" />
		</div>
	</div>
	<?php
}


function sidebar_meta_save() {

	global $post;
	$post_id = $post->ID;

	if (!isset($_POST['sidebar-form-nonce']) || !wp_verify_nonce($_POST['sidebar-form-nonce'], basename( __FILE__ ))) {
		return $post->ID;
	}

	$post_type = get_post_type_object($post->post_type);

	if (!current_user_can($post_type->cap->edit_post, $post_id)) {
		return $post->ID;
	}

	$input = array();

	$input['order'] = (isset($_POST['sidebar-form-order']) ? $_POST['sidebar-form-order'] : '');

	$input['order'] = str_pad($input['order'], 3, "0", STR_PAD_LEFT);

	foreach ($input as $field => $value) {

		$old = get_post_meta($post_id, 'sidebar-form-' . $field, true);

		if ($value && '' == $old)
			add_post_meta($post_id, 'sidebar-form-' . $field, $value, true );
		else if ($value && $value != $old)
			update_post_meta($post_id, 'sidebar-form-' . $field, $value);
		else if ('' == $value && $old)
			delete_post_meta($post_id, 'sidebar-form-' . $field, $old);
	}
}

?>