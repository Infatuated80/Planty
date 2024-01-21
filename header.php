<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue sur le site de planty !</title>
    <?php wp_head(); ?> 
    <!-- WP reconnait notre entête et l'allouera automatiquement à nos pages en fonction du paramétrage
         de notre thème enfant. -->
</head>

<body <?php body_class(); ?>>
<!-- génère automatiquement plusieurs classes CSS spécifiques à la page actuellemet affichée :
    * Le template utilisé (single.php ici)
    * Le type de Post (single-post et pas single-page ou single-custom-post)
    * L'identifiant (si vous voulez être vraiment spécifique)
    * Le format du Post -->

<?php wp_body_open(); ?>
<!-- Permet d'inserer du code html juste après l'ouverture de la balise body -->

<!-- Notre header contient une nav-bar contenant un logo à gauche et un menu à droite. -->
    <header>
        <nav id="nav-bar">
            <div id="logo">
                <img src="/wp-content/themes/theme-planty/img/logo_planty.svg" alt="Planty boisson énergisante !">
            </div>

<!-- On affiche notre menu nommé Navigation avec wp_nav_menu. Il a été créé depuis l'administration WP 
Ce menu varie en fonction du hook wp_nav_menu_items créé dans function.php de notre thème enfant. Si l'internaute est connecté
à WP, on ajoute un lien vers l'administration. -->

            <div id="menu" role="navigation">

                <?php 
              
                wp_nav_menu("Navigation"); 

                ?>

            </div>
        </nav>     
    </header>   