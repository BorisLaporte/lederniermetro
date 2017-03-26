<?php 

/**
 * The header(string)
 *
 * @package WordPress
 * @subpackage LeDernierMetro
 * @since LeDernierMetro 1.0
 */

?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;" charset="<?php bloginfo('charset'); ?>" />
    <title><?php echo get_bloginfo('name') ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/master.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.png">

</head>

<?php 
    // les réseaux sociaux sont dans SEO -> Réseaux sociaux
    $social = get_option('wpseo_social');
?>

<body wrapper-selector='body'>
    <header class="header_wrapper">
        <div class="header_container">
            <div class="socials_wrapper">
                <a href="https://twitter.com/<?= $social['twitter_site'] ?>" target="blank_" class="socials_items" >
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="32" height="32" viewBox="0 0 32 32">
                        <path d="M32 7.075c-1.175 0.525-2.444 0.875-3.769 1.031 1.356-0.813 2.394-2.1 2.887-3.631-1.269 0.75-2.675 1.3-4.169 1.594-1.2-1.275-2.906-2.069-4.794-2.069-3.625 0-6.563 2.938-6.563 6.563 0 0.512 0.056 1.012 0.169 1.494-5.456-0.275-10.294-2.888-13.531-6.862-0.563 0.969-0.887 2.1-0.887 3.3 0 2.275 1.156 4.287 2.919 5.463-1.075-0.031-2.087-0.331-2.975-0.819 0 0.025 0 0.056 0 0.081 0 3.181 2.263 5.838 5.269 6.437-0.55 0.15-1.131 0.231-1.731 0.231-0.425 0-0.831-0.044-1.237-0.119 0.838 2.606 3.263 4.506 6.131 4.563-2.25 1.762-5.075 2.813-8.156 2.813-0.531 0-1.050-0.031-1.569-0.094 2.913 1.869 6.362 2.95 10.069 2.95 12.075 0 18.681-10.006 18.681-18.681 0-0.287-0.006-0.569-0.019-0.85 1.281-0.919 2.394-2.075 3.275-3.394z"></path>
                    </svg>
                </a>
                <a href="<?= $social['facebook_site'] ?>" target="blank_" class="socials_items">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="32" height="32" viewBox="0 0 32 32">
                        <path d="M19 6h5v-6h-5c-3.86 0-7 3.14-7 7v3h-4v6h4v16h6v-16h5l1-6h-6v-3c0-0.542 0.458-1 1-1z"></path>
                    </svg>
                </a>
                <a href="<?= $social['instagram_url'] ?>" target="blank_" class="socials_items">
                    <svg version="1.1" id="Calque_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
     viewBox="0 0 90 90.4" style="enable-background:new 0 0 90 90.4;" xml:space="preserve">
                        <g>
                        <path d="M22.5,32.7c4.2-8,12.6-13.5,22.3-13.5s18.1,5.5,22.3,13.5h17.3V19.2c0-7.5-6.1-13.5-13.5-13.5H26.6v17.2h-1.8V5.7h-0.6
                            v17.2h-1.8V5.7h-0.6v17.2h-1.8V5.7h-0.6v17.2h-1.8V5.8C10.7,6.7,5.7,12.3,5.7,19.2v13.5H22.5z M64.1,14.1c0-1.6,1.3-2.9,2.9-2.9
                            h6.5c1.6,0,2.9,1.3,2.9,2.9v6.5c0,1.6-1.3,2.9-2.9,2.9H67c-1.6,0-2.9-1.3-2.9-2.9V14.1z"/>
                        <path d="M68.6,36.4c0.8,2.5,1.3,5.2,1.3,8c0,13.9-11.3,25.2-25.2,25.2S19.6,58.3,19.6,44.4c0-2.8,0.5-5.5,1.3-8H5.7v34.4
                            c0,7.5,6.1,13.5,13.5,13.5h51.6c7.5,0,13.5-6.1,13.5-13.5V36.4H68.6z"/>
                        <circle cx="44.8" cy="44.4" r="16.8"/>
                        </g>
                    </svg>
                </a>
            </div>
            <div class="logo_wrapper">
                <a href="/">
                    <h1 class="main_logo">Le Dernier Métro</h1>
                    <div class="main_subtitle">
                        <span class="leftStroke"></span>
                        <h2 class="subtitle">Les meilleurs bons plans de Paris</h4>
                        <span class="rightStroke"></span>
                    </div>
                </a>
            </div>
            <div class="languages">
                <!-- <a href="" class="fr">FR</a> -->
            </div>
            <div class="menu_wrapper">
                <ul class="menu">
                    <li class="menu_item" menu-selector="0">
                        <a class="links" href="<?= site_url('/') ?>adresses">Bonnes adresses</a>
                        <ul class="sub-categories-header" id="sub-categories-header-adress" sub-selector="0">
                            <?php $terms = get_terms( array(
                                'taxonomy' => 'type_bon_plan',
                                'hide_empty' => true,
                            ) );


                            foreach ($terms as $key => $value) : ?>
                                
                                <li><a href="<?= site_url('/') ?>adresses/?type[]=<?= $value->slug ?>"><?= $value->name ?></a></li>

                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <li class="menu_item">
                        <a class="links" href="<?= site_url('/') ?>portraits">Portraits</a>
                    </li>
                    <li class="menu_item" menu-selector="1">
                        <a class="links" href="<?= site_url('/') ?>culture">Culture</a>
                        <ul class="sub-categories-header" id="sub-categories-header-culture" sub-selector="1">
                            <?php $terms = get_terms( array(
                                'taxonomy' => 'rubrique',
                                'hide_empty' => true,
                            ) );


                            foreach ($terms as $key => $value) : ?>
                                
                                <li><a href="<?= site_url('/') ?>culture/?type[]=<?= $value->slug ?>"><?= $value->name ?></a></li>

                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <li class="menu_item">
                        <a class="links" href="<?= site_url('/') ?>carte">Carte</a>
                    </li>
                    <li class="menu_item">
                        <a class="links" href="<?= site_url('/') ?>about">À propos de nous</a>
                    </li>
                </ul>
            </div>
            <!--<div class="underline_header"></div>-->
        </div>
    </header>
    <div class="header_scroll_wrapper">
        <div class="logo_wrapper">
            <a href="/"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_LDM.png" alt="Le Dernier Métro" class="logo_scroll"></a>
        </div>
        <div class="menu_wrapper">
            <ul class="menu">
                <li class="menu_item" menu-selector="2">
                    <a class="links" href="<?= site_url('/') ?>adresses">Bonnes adresses</a>
                    <ul class="sub-categories-header" sub-selector="2" id="sub-categories-header-adress-bis">
                        <?php $terms = get_terms( array(
                            'taxonomy' => 'type_bon_plan',
                            'hide_empty' => true,
                        ) );


                        foreach ($terms as $key => $value) : ?>
                            
                            <li><a href="<?= site_url('/') ?>adresses/?type[]=<?= $value->slug ?>"><?= $value->name ?></a></li>

                        <?php endforeach; ?>
                    </ul>
                </li>
                <li class="menu_item">
                    <a class="links" href="<?= site_url('/') ?>portraits">Portraits</a>
                </li>
                <li class="menu_item" menu-selector="3">
                    <a class="links" href="<?= site_url('/') ?>culture">Culture</a>
                    <ul class="sub-categories-header" sub-selector="3" id="sub-categories-header-culture-bis">
                        <?php $terms = get_terms( array(
                            'taxonomy' => 'rubrique',
                            'hide_empty' => true,
                        ) );


                        foreach ($terms as $key => $value) : ?>
                            
                            <li><a href="<?= site_url('/') ?>culture/?type[]=<?= $value->slug ?>"><?= $value->name ?></a></li>

                        <?php endforeach; ?>
                    </ul>
                </li>
                <li class="menu_item">
                    <a class="links" href="<?= site_url('/') ?>carte">Carte</a>
                </li>
                <li class="menu_item">
                    <a class="links" href="<?= site_url('/') ?>about">À propos de nous</a>
                </li>
            </ul>
        </div>
        <div class="socials_wrapper">
            <a href="https://twitter.com/<?= $social['twitter_site'] ?>" target="blank_" class="socials_items" >
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="32" height="32" viewBox="0 0 32 32">
                    <path d="M32 7.075c-1.175 0.525-2.444 0.875-3.769 1.031 1.356-0.813 2.394-2.1 2.887-3.631-1.269 0.75-2.675 1.3-4.169 1.594-1.2-1.275-2.906-2.069-4.794-2.069-3.625 0-6.563 2.938-6.563 6.563 0 0.512 0.056 1.012 0.169 1.494-5.456-0.275-10.294-2.888-13.531-6.862-0.563 0.969-0.887 2.1-0.887 3.3 0 2.275 1.156 4.287 2.919 5.463-1.075-0.031-2.087-0.331-2.975-0.819 0 0.025 0 0.056 0 0.081 0 3.181 2.263 5.838 5.269 6.437-0.55 0.15-1.131 0.231-1.731 0.231-0.425 0-0.831-0.044-1.237-0.119 0.838 2.606 3.263 4.506 6.131 4.563-2.25 1.762-5.075 2.813-8.156 2.813-0.531 0-1.050-0.031-1.569-0.094 2.913 1.869 6.362 2.95 10.069 2.95 12.075 0 18.681-10.006 18.681-18.681 0-0.287-0.006-0.569-0.019-0.85 1.281-0.919 2.394-2.075 3.275-3.394z"></path>
                </svg>
            </a>
            <a href="<?= $social['facebook_site'] ?>" target="blank_" class="socials_items">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="32" height="32" viewBox="0 0 32 32">
                    <path d="M19 6h5v-6h-5c-3.86 0-7 3.14-7 7v3h-4v6h4v16h6v-16h5l1-6h-6v-3c0-0.542 0.458-1 1-1z"></path>
                </svg>
            </a>
            <a href="<?= $social['instagram_url'] ?>" target="blank_" class="socials_items">
                <svg version="1.1" id="Calque_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
     viewBox="0 0 90 90.4" style="enable-background:new 0 0 90 90.4;" xml:space="preserve">
                    <g>
                    <path d="M22.5,32.7c4.2-8,12.6-13.5,22.3-13.5s18.1,5.5,22.3,13.5h17.3V19.2c0-7.5-6.1-13.5-13.5-13.5H26.6v17.2h-1.8V5.7h-0.6
                            v17.2h-1.8V5.7h-0.6v17.2h-1.8V5.7h-0.6v17.2h-1.8V5.8C10.7,6.7,5.7,12.3,5.7,19.2v13.5H22.5z M64.1,14.1c0-1.6,1.3-2.9,2.9-2.9
                            h6.5c1.6,0,2.9,1.3,2.9,2.9v6.5c0,1.6-1.3,2.9-2.9,2.9H67c-1.6,0-2.9-1.3-2.9-2.9V14.1z"/>
                    <path d="M68.6,36.4c0.8,2.5,1.3,5.2,1.3,8c0,13.9-11.3,25.2-25.2,25.2S19.6,58.3,19.6,44.4c0-2.8,0.5-5.5,1.3-8H5.7v34.4
                            c0,7.5,6.1,13.5,13.5,13.5h51.6c7.5,0,13.5-6.1,13.5-13.5V36.4H68.6z"/>
                    <circle cx="44.8" cy="44.4" r="16.8"/>
                    </g>
                </svg>
            </a>
        </div>
    </div>
    <div class="header_mobile_wrapper">
        <div class="header_mobile_container">
            <div class="logo_wrapper">
                <a href="/"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_LDM.png" alt="Le Dernier Métro" class="logo_scroll"></a>
            </div>
            <div class="burger_wrapper">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/menu-mobile.svg" alt="Le Dernier Métro" class="logo_scroll">
            </div>
        </div>
        <div class="menu_wrapper">
            <ul class="menu">
                <li class="menu_item" menu-selector="2">
                    <a class="links" href="<?= site_url('/') ?>adresses">Bonnes adresses</a>
                </li>
                <li class="menu_item">
                    <a class="links" href="<?= site_url('/') ?>portraits">Portraits</a>
                </li>
                <li class="menu_item" menu-selector="3">
                    <a class="links" href="<?= site_url('/') ?>culture">Culture</a>
                </li>
                <li class="menu_item">
                    <a class="links" href="<?= site_url('/') ?>carte">Carte</a>
                </li>
                <li class="menu_item">
                    <a class="links" href="<?= site_url('/') ?>about">À propos de nous</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- End Header -->