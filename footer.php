<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
<?php astra_content_bottom(); ?>
</div> <!-- ast-container -->
</div><!-- #content -->
<footer>
    <div id="ft-about" class="bd-top-1">
        <?php the_custom_logo() ?>
        <p>SANALEO ist eine Premium CBD
            Marke, dessen Kerngeschäft
            der Handel mit CBD Produkten ist. Die Qualität unserer Produkte steht im Zeichen der Nachhaltigkeit und der
            Zufriedenheit unserer Kunden. Als CBD-Experten setzen wir uns zudem für Aufklärung und die Interessen der
            CBD Community ein.</p>
    </div>


    <?php wp_nav_menu( array( 'theme_location' => 'footer-menu-2' ) ); ?>


    <div id="ft-newsletter" class="bd-top-1">
        <div data-mooform-id="0da411d3-8146-4f17-bf18-8d432b943254" ></div>
    </div>

    <div id="ft-services" class="bd-top-1">
        <img src="https://sanaleo.com/wp-content/uploads/2021/10/visa.svg" alt="Visa">
        <img src="https://sanaleo.com/wp-content/uploads/2021/10/giropay.svg" alt="Giropay">
        <img src="https://sanaleo.com/wp-content/uploads/2021/10/mastercard-2.svg" alt="Mastercard">
        <img src="https://sanaleo.com/wp-content/uploads/2021/10/american-express-1.svg" alt="American Express">
        <img src="https://sanaleo.com/wp-content/uploads/2021/10/Paydirekt_logo.svg" alt="Pay Direkt">
        <img src="https://sanaleo.com/wp-content/uploads/2021/10/vorkasse.svg" alt="Vorkasse" style="max-height: 45px">
        <img src="https://sanaleo.com/wp-content/uploads/2021/10/paypal-2.svg" alt="Paypal">
        <img src="https://sanaleo.com/wp-content/uploads/2021/10/klarna.svg" alt="Klarna">
        <img src="https://sanaleo.com/wp-content/uploads/2021/10/dhl-logo.svg" alt="DHL">
    </div>

    <div id="ft-partners">
        <a href="https://hanfverband.de/firmensponsoren-des-deutschen-hanf-verbandes">
            <img class="partner-logo"
                src="https://sanaleo.com/wp-content/uploads/2021/05/Hanfverband-Banner-Premium-Sponsor.png"
                alt="Hanverband Premium Banner" height="50">
        </a>

        <a href="https://www.climatepartner.com/de">
            <img class="partner-logo" src="https://sanaleo.com/wp-content/uploads/2021/05/climatepartner.png"
                alt="Climate Partner Logo" height="50">
        </a>

        <a href="https://cannatrust.eu/hersteller/sanaleo/">
            <img class="partner-logo" src="https://sanaleo.com/wp-content/uploads/2021/05/Cannatrust-Logo-Sanaleo.jpg"
                alt="Cannatrust Logo" height="50">
        </a>

        <a href="https://www.trustedshops.de/bewertung/info_X6D1A629F4093FD235B626136D23695B9.html">
            <img class="partner-logo" src="https://sanaleo.com/wp-content/uploads/2021/07/TS_Guetesiegel.png"
                alt="Trusted Shops Siegel" height="50">
        </a>

    </div>

    <div id="ft-legal" class="bd-top-1">
        <p>Sanaleo und unsere Autoren übernehmen keine Haftung für mögliche Unannehmlichkeiten oder Schäden, die sich
            aus
            der Anwendung der hier dargestellten Information ergeben. Unsere Texte ersetzen keinesfalls eine fachliche
            Beratung durch einen Arzt oder Apotheker und sie dürfen nicht als Grundlage zur eigenständigen Diagnose und
            Beginn, Änderung oder Beendigung einer Behandlung von Krankheiten verwendet werden. Bei gesundheitlichen
            Fragen
            oder Beschwerden konsultieren Sie immer einen Arzt Ihres Vertrauens! Die frei zugänglichen Inhalte dieser
            Website wurden mit größtmöglicher Sorgfalt erstellt und dienen ausschließlich zur Information und
            Weiterbildung
            über das Thema. Der Anbieter dieser Website übernimmt jedoch keine Gewähr für die Richtigkeit, Aktualität
            und
            Vollständigkeit der bereitgestellten Texte und Inhalte. Sie stellen keine Empfehlung der beschriebenen oder
            erwähnten diagnostischen Methoden, Behandlungen oder Arzneimittel dar und sollen auch nicht als Werbung
            dienen.
        <p>
        <p>Copyright © 2022 SANALEO CBD Shop<br>Dein CBD-Onlineshop aus Leipzig.</p><p>Oeserstraße 37<br>04229 Leipzig<br>Deutschland</p>

    </div>

</footer>


</div><!-- #page -->
<?php 
	astra_body_bottom();    
	wp_footer(); 
?>

</body>

</html>