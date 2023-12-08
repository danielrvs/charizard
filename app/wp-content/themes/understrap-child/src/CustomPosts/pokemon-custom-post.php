<?php
function add_custom_post_type_pokemon(): void
{
	$labels = [
		'name'               => __('Pokémon', 'understrap-child'),
		'singular_name'      => __('Pokémon', 'understrap-child'),
		'add_new'            => __('Add New', 'understrap-child'),
		'add_new_item'       => __('Add New', 'understrap-child'),
		'edit_item'          => __('Edit Pokémon', 'understrap-child'),
		'new_item'           => __('New Pokémon', 'understrap-child'),
		'view_item'          => __('View Pokémon', 'understrap-child'),
		'search_items'       => __('Search Pokémon Post', 'understrap-child'),
		'not_found'          => __('No Pokémon found', 'understrap-child'),
		'not_found_in_trash' => __('No Pokémon found in trash', 'understrap-child'),
	];
	register_post_type('pokemon', [
		'labels'              => $labels,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'             => array('slug' => 'pokemon'),
		'supports'            => array('title', 'editor', 'thumbnail'),
	]);
}
add_action('init', 'add_custom_post_type_pokemon');

$fields_pokemon = [
	'primary_type' => 'Primary Type',
	'secondary_type' => 'Secondary Type',
	'pokemon_weight' => 'Pokémon Weight',
	'pokedex_number_older_version' => 'Pokedex Number Older Version',
	'pokedex_number_newer_version' => 'Pokedex Number Newer Version',
];

function add_custom_fields_pokemon()
{
	add_meta_box(
		'custom_fields_meta_box',
		'Stats',
		'display_custom_fields_pokemon',
		'pokemon',
		'normal',
		'high',
		['fields' => $GLOBALS['fields_pokemon']]
	);
}
add_action('add_meta_boxes', 'add_custom_fields_pokemon');

function display_custom_fields_pokemon($post, $args)
{
    $fields = $args['args']['fields'];
    $column_counter = 0;

    foreach ($fields as $field_key => $field_label) {
        $field_value = get_post_meta($post->ID, $field_key, true);
        if ($column_counter % 2 === 0) {
            echo '<div style="display: flex;">';
        }
?>
        <div style="flex: 1; padding-right: 10px;">
            <label for="<?php echo esc_attr($field_key); ?>"><?php echo esc_html($field_label); ?>:</label>
            <input style="width: 100%;" type="text" name="<?php echo esc_attr($field_key); ?>" id="<?php echo esc_attr($field_key); ?>" value="<?php echo esc_attr($field_value); ?>" />
        </div>
<?php
        if ($column_counter % 2 !== 0) {
            echo '</div>';
        }
        $column_counter++;
    }
    if ($column_counter % 2 !== 0) {
        echo '</div>';
    }
}

function save_custom_fields_pokemon($post_id)
{
	global $fields_pokemon;

	foreach ($fields_pokemon as $field_key => $field_label) {
		if (array_key_exists($field_key, $_POST)) {
			update_post_meta(
				$post_id,
				$field_key,
				sanitize_text_field($_POST[$field_key])
			);
		}
	}
}
add_action('save_post', 'save_custom_fields_pokemon');
