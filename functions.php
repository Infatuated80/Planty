<?php

/* on précise l'url enfant du CSS qui prendra le dessus sur le thème parent sans écraser le fichier parent. 
   Ainsi, en cas de mise à jour du thème parent, les modifications faites sur le thème enfant ne seront pas altérées.
*/

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

/* si l'internaute est connecté à wordpress, on affiche admin dans le menu. Pour ce faire, on utilise un hook filter. Puisque la fonction 'wp_nav_menu_items' est native à WP, on filtre son comportement. 10 correspond à la valeur par défaut de $priority et 2
correspond au nombre d'arguments acceptés. Cf. ($items, $args) */

if (is_user_logged_in()) 
{
add_filter('wp_nav_menu_items', 'ajout_element_menu', 10, 2);
}


/* Fonction permettant de situer le CSS du thème actif et le CSS du thème enfant. */
function theme_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/css/theme.css'));
}

/* Cette fonction permet d'ajouter un nouvel élément à notre menu existant. Le lien renvoi à l'administration WP du site. */
function ajout_element_menu($items, $args) {
    $element = $items;
    if ($args->theme_location == 'topbar_menu')
    {
    $admin = get_admin_url();
    $element= $items."<li><a href='{$admin}'>Admin</a></li>";
    }
    return $element;
}

?>
