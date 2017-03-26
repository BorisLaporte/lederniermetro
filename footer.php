<?php
 
/**
* The Footer
*
* @package WordPress
* @subpackage LeDernierMetro
* @since LeDernierMetro 1.0
*/
 
?>


<?php 
    // les réseaux sociaux sont dans SEO -> Réseaux sociaux
    $social = get_option('wpseo_social');
?>
<footer class="wrapper_footer">
    <div class="footer_container">
        <div class="bloc logo_footer">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/LDM_blanc.png" alt="Le Dernier Métro">
        </div>
        <div class='bloc apropos'>
            <h3 class="titre_footer">A propos</h3>
            <ul class="wrapper_links">
                <li><a class="links" href="<?= site_url('/') ?>about">Qui sommes nous ?</a></li>
                <li><a class="links" href="<?= site_url('/') ?>adresses">Bonnes adresses</a></li>
                <li><a class="links" href="<?= site_url('/') ?>portraits">Portraits</a></li>
                <li><a class="links" href="<?= site_url('/') ?>culture">Culture</a></li>
                <li><a class="links" href="<?= site_url('/') ?>carte">Map</a></li>
            </ul>
        </div>
        <div class='bloc suiveznous'>
            <h3 class="titre_footer">Suivez-nous</h3>
            <ul class="wrapper_links">
                <li><a class="links" href="<?= $social['facebook_site'] ?>" target="blank_" >Facebook</a></li>
                <li><a class="links" href="https://twitter.com/<?= $social['twitter_site'] ?>" target="blank_">Twitter</a></li>
                <li><a class="links" href="<?= $social['instagram_url'] ?>" target="blank_">Instagram</a></li>
            </ul>
        </div>
        <div class="bloc newsletter_footer">
            <h3 class="titre_footer">Newsletter</h3>
            <?= do_shortcode('[mc4wp_form id="5"]') ?>
            <!-- <input class="entree_mail" type="email" name="email" value="Entrez votre adresse email" id="email" onclick="email.value='';"/>
            <input class="enter" type="submit" value="OK" /> -->
        </div>
        <div class="mentions_footer">
            <p class="droits">Tous droits reservés ©</p>
            <div class="links_container">
                <a class="links" href="<?= site_url('/') ?>mentions-legales">Mentions légales</a>
            </div>
        </div>
    </div>
</footer>
 <?php wp_footer(); ?>
</body>
</html>
 