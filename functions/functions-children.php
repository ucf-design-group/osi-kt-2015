<?php

function child_meta_setup() {

	add_action('add_meta_boxes','child_meta_add');
	add_action('save_post','child_meta_save');
}
add_action('load-post.php','child_meta_setup');
add_action('load-post-new.php','child_meta_setup');

function child_meta_add() {
 
	add_meta_box (
	'child_meta',
	'Child Information',
	'child_meta',
	'children',
	'normal',
	'default');
}

function child_meta() {

	global $post;
	wp_nonce_field(basename( __FILE__ ), 'child-form-nonce' );

	$order = get_post_meta($post->ID, 'child-form-order', true) ? get_post_meta($post->ID, 'child-form-order', true) : '';

	?>
	<style type="text/css">#child-form-order{width: 50px;}#child-form div{display:inline-block; padding:0 5px;}</style>
	<div id="child-form">
		<div>
			<label for="child-form-order">Order on Page:</label>
			<input type="text" name="child-form-order" id="child-form-order" value="<?php echo $order; ?>" />
		</div>
	</div>
	<?php
}


function child_meta_save() {

	global $post;
	$post_id = $post->ID;

	if (!isset($_POST['child-form-nonce']) || !wp_verify_nonce($_POST['child-form-nonce'], basename( __FILE__ ))) {
		return $post->ID;
	}

	$post_type = get_post_type_object($post->post_type);

	if (!current_user_can($post_type->cap->edit_post, $post_id)) {
		return $post->ID;
	}

	$input = array();

	$input['order'] = (isset($_POST['child-form-order']) ? $_POST['child-form-order'] : '');

	$input['order'] = str_pad($input['order'], 3, "0", STR_PAD_LEFT);

	foreach ($input as $field => $value) {

		$old = get_post_meta($post_id, 'child-form-' . $field, true);

		if ($value && '' == $old)
			add_post_meta($post_id, 'child-form-' . $field, $value, true );
		else if ($value && $value != $old)
			update_post_meta($post_id, 'child-form-' . $field, $value);
		else if ('' == $value && $old)
			delete_post_meta($post_id, 'child-form-' . $field, $old);
	}
}

?>