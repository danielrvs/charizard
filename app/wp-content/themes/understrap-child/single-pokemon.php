<?php
/**
 * The template for displaying a single Pokémon post.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Your_Theme_Name
 */

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <?php
        while (have_posts()) :
            the_post();

            // Display Pokémon properties
            echo '<h1>' . esc_html(get_the_title()) . '</h1>';
            echo '<div class="pokemon-image">' . get_the_post_thumbnail() . '</div>';
            echo '<div class="pokemon-description">' . wpautop(esc_html(get_the_content())) . '</div>';

            // Display additional properties (modify as needed)
            echo '<p><strong>Primary Type:</strong> ' . esc_html(get_post_meta(get_the_ID(), 'primary_type', true)) . '</p>';
            echo '<p><strong>Secondary Type:</strong> ' . esc_html(get_post_meta(get_the_ID(), 'secondary_type', true)) . '</p>';
            echo '<p><strong>Weight:</strong> ' . esc_html(get_post_meta(get_the_ID(), 'pokemon_weight', true)) . '</p>';
            echo '<p><strong>Pokedex Number (Older Version):</strong> ' . esc_html(get_post_meta(get_the_ID(), 'pokedex_number_older_version', true)) . '</p>';
            echo '<p><strong>Pokedex Number (Recent Version):</strong> ' . esc_html(get_post_meta(get_the_ID(), 'pokedex_number_newer_version', true)) . '</p>';

            // Display attacks (optional)
            $pokemon_attacks = get_post_meta(get_the_ID(), 'pokemon_attacks', true);
            if ($pokemon_attacks) {
                echo '<h2>Attacks</h2>';
                echo '<ul>';
                foreach ($pokemon_attacks as $attack) {
                    echo '<li><strong>' . esc_html($attack['attack_name']) . ':</strong> ' . esc_html($attack['attack_description']) . '</li>';
                }
                echo '</ul>';
            }

        endwhile; // End of the loop.
        ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();