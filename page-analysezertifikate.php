<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

<?php get_sidebar(); ?>

<?php endif ?>

<div id="primary" <?php astra_primary_class(); ?>>

    <?php
	$blueten_ids = get_posts( array(
		'post_type' => 'product',
		'numberposts' => -1,
		'post_status' => 'publish',
		'fields' => 'ids',
		'tax_query' => array(
		   array(
			  'taxonomy' => 'product_cat',
			  'field' => 'slug',
			  'terms' => 'cbd-blueten',
			  'operator' => 'IN',
		   )
		),
	 ) );

	 $oele_ids = get_posts( array(
		'post_type' => 'product',
		'numberposts' => -1,
		'post_status' => 'publish',
		'fields' => 'ids',
		'tax_query' => array(
		   array(
			  'taxonomy' => 'product_cat',
			  'field' => 'slug',
			  'terms' => 'cbd-oele',
			  'operator' => 'IN',
		   )
		),
	 ) );

	 $vape_ids = get_posts( array(
		'post_type' => 'product',
		'numberposts' => -1,
		'post_status' => 'publish',
		'fields' => 'ids',
		'tax_query' => array(
		   array(
			  'taxonomy' => 'product_cat',
			  'field' => 'slug',
			  'terms' => 'cbd-vape',
			  'operator' => 'IN',
		   )
		),
	 ) );

	?>

    <style>
    .az-button {
        text-decoration: none;
        text-align: center;
        width: 200px;
        display: block;
        background: transparent;
        border-radius: 15px;
        border: none;
        padding: 10px;
    }

    @media (hover: hover) {
        .az-button:hover {
            text-decoration: none !important;
            color: white;
            background: black;
        }
    }

    .az-wrapper {

        display: flex;
        flex-direction: column;
        align-items: center;
        border-radius: 30px;
        width: 100%;
        padding: 5%;
        margin: 50px 0;
        text-align: center;

    }

    .table-wrapper {
        width: 100%;
        transition: 0.7s;
        max-height: 0;
        overflow: hidden;
    }

    .openTable {
        transition: 0.7s;
        max-height: 900px;
    }

    .az-wrapper a:hover {
        text-decoration: underline;
    }

    #az-oele {
        background-color: #fdebe0;
    }

    #az-blueten {
        background-color: #ebfbe5;
    }

    #az-vape {
        background-color: #e1f0ec;
    }

    #az-infos {
        padding: 0 5%;
        max-width: 1100px;
        margin: auto;
    }

    table {
        background: white;
        border-radius: 10px;
        margin-top: 20px;
    }

    tr:nth-child(1) {
        font-weight: bold;
    }

    #az-oele table,
    #az-oele table td,
    #az-oele table tr {
        border: 3px solid #fdebe0;
    }

    #az-blueten table,
    #az-blueten td,
    #az-blueten tr {
        border: 3px solid #ebfbe5;
    }

    #az-vape table,
    #az-vape td,
    #az-vape tr {
        border: 3px solid #E1F0EC;
    }
    </style>

    <script>
    jQuery(document).ready(function() {
        document.querySelectorAll(".az-button").forEach(element => element.addEventListener("click", () => {

            if (element.innerHTML === "Schließen") {
                element.innerHTML = "Zertifikate zeigen";
            } else {
                element.innerHTML = "Schließen";
            }
            document.getElementById(element.parentNode.id).querySelectorAll(".table-wrapper")[0].classList.toggle("openTable");
        }));
    });
    </script>

    <div style="max-width:1100px; margin: auto">
        <h1 style="text-align: center;">Aktuelle Analysezertifikate unserer CBD Produkte</h1>

        <p style="max-width: 1100px; margin: 20px auto; padding: 0 5%; text-align: justify; text-align-last: center;">
            SANALEO bietet ausgewählte Premium <b><a href="https://sanaleo.com/cbd-blueten">CBD Blüten</a></b>
            verschiedener Premium-Hersteller aus Mitteleuropa und
            hochwertige <b><a href="https://sanaleo.com/cbd-oele">CBD-Öle</a></b> an. Wir garantieren <b><a
                    href="https://sanaleo.com/cbd-blueten">CBD Aromablüten</a></b> und <b><a
                    href="https://sanaleo.com/cbd-oele">CBD-Öle</a></b> hervorragender Qualität. Unsere Sorten
            und Öle stammen, wie jedes andere unserer CBD Produkte, aus nachhaltiger und ökologischer Landwirtschaft.
            Damit sind sie garantiert frei von Herbiziden, Pestiziden oder chemischen Düngern.
            All unsere Produkte werden vor dem Verkauf von einem unabhängigen Labor auf ihre Inhaltsstoffe und die
            Einhaltung der rechtlichen Rahmenbedingungen untersucht und zertifiziert. Da SANALEO Transparenz wichtig
            ist, kannst Du jedes Zertifikat auf der jeweiligen Produktseite einsehen. Doch der Blick auf das Zertifikat
            kann das ungeschulte Auge überfordern: Deswegen haben wir <b><a style="text-decoration: underline;"
                    href="#az-infos">unten</a></b> für dich zusammengefasst, wie unsere
            Zertifikate zu lesen sind.</p>


        <div class="az-wrapper" id="az-oele">

            <img id="oel-logo" src="https://sanaleo.com/wp-content/uploads/2022/01/Icon_O%CC%88le.svg" alt=""
                width="50">
            <h3 style="font-weight: 200;">CBD-Öle</h3>

            <a class="az-button">Zertifikate zeigen</a>


            <div class="table-wrapper">
                <table>
                    <tr>
                        <td>Produkt</td>
                        <td>CBD-Anteil</td>
                        <td>Zertifikat</td>
                        <?php
	foreach ( $oele_ids as $id ) {

	  $zertifikat_url = get_field("analysezertifikat_1", $id);
	  
	  if(!empty($zertifikat_url)) {
		echo '<tr><td><a class="product-link" href="' . get_permalink( $id ) . '">'. get_the_title( $id ) . '</a></td><td>' . get_field("variante_1", $id) . '</td><td><a href="' . $zertifikat_url . '">Download</a></td></tr>';
		unset($zertifikat_url);
	  }

	  $zertifikat_url = get_field("analysezertifikat_2", $id);

	  if(!empty($zertifikat_url)) {
		echo '<tr><td><a class="product-link" href="' . get_permalink( $id ) . '">'. get_the_title( $id ) . '</a></td><td>' . get_field("variante_2", $id) . '</td><td><a href="' . $zertifikat_url . '">Download</a></td></tr>';
		unset($zertifikat_url);
	  }

	  $zertifikat_url = get_field("analysezertifikat_3", $id);

	  if(!empty($zertifikat_url)) {
		echo '<tr><td><a class="product-link" href="' . get_permalink( $id ) . '">'. get_the_title( $id ) . '</a></td><td>' . get_field("variante_3", $id) . '</td><td><a href="' . $zertifikat_url . '">Download</a></td></tr>';
		unset($zertifikat_url);
	  }

      $zertifikat_url = get_field("analysezertifikat_4", $id);

	  if(!empty($zertifikat_url)) {
		echo '<tr><td><a class="product-link" href="' . get_permalink( $id ) . '">'. get_the_title( $id ) . '</a></td><td>' . get_field("variante_4", $id) . '</td><td><a href="' . $zertifikat_url . '">Download</a></td></tr>';
		unset($zertifikat_url);
	  }

      $zertifikat_url = get_field("analysezertifikat_5", $id);

	  if(!empty($zertifikat_url)) {
		echo '<tr><td><a class="product-link" href="' . get_permalink( $id ) . '">'. get_the_title( $id ) . '</a></td><td>' . get_field("variante_5", $id) . '</td><td><a href="' . $zertifikat_url . '">Download</a></td></tr>';
		unset($zertifikat_url);
	  }

	}

	?>
                </table>
            </div>

        </div>

        <div class="az-wrapper" id="az-blueten">

            <img id="blueten-logo" src="https://sanaleo.com/wp-content/uploads/2022/01/Icon_Blu%CC%88ten.svg" alt=""
                width="50">
            <h3 style="font-weight: 200;">CBD-Blüten</h3>
            <a class="az-button">Zertifikate zeigen</a>
            <div class="table-wrapper">
                <table>
                    <tr>
                        <td>Produkt</td>
                        <td>Zertifikat</td>
                    </tr>
                    <?php
	foreach ( $blueten_ids as $id ) {
		$zertifikat_url = get_field("analysezertifikat_1", $id);
		if(!empty($zertifikat_url)) {
			echo '<tr><td><a class="product-link" href="' . get_permalink( $id ) . '">' . get_the_title( $id ) . '</a></td><td><a href="' . $zertifikat_url . '">Download</a></td></tr>';
			unset($zertifikat_url);
		}
	}
	?>
                </table>
            </div>
        </div>

        <div class="az-wrapper" id="az-vape">

            <img id="vape-logo" src="https://sanaleo.com/wp-content/uploads/2022/01/Icon_Vape.svg" alt="" width="50">
            <h3 style="font-weight: 200;">CBD-Vape</h3>
            <a class="az-button">Zertifikate zeigen</a>

            <div class="table-wrapper">
                <table>
                    <tr>
                        <td>Produkt</td>
                        <td>CBD-Anteil</td>
                        <td>Zertifikat</td>
                        <?php
	foreach ( $vape_ids as $id ) {

	  $zertifikat_url = get_field("analysezertifikat_1", $id);
	  
	  if(!empty($zertifikat_url)) {
		echo '<tr><td><a class="product-link" href="' . get_permalink( $id ) . '">'. get_the_title( $id ) . '</a></td><td>' . get_field("variante_1", $id) . '</td><td><a href="' . $zertifikat_url . '">Download</a></td></tr>';
		unset($zertifikat_url);
	  }

	  $zertifikat_url = get_field("analysezertifikat_2", $id);

	  if(!empty($zertifikat_url)) {
		echo '<tr><td><a class="product-link" href="' . get_permalink( $id ) . '">'. get_the_title( $id ) . '</a></td><td>' . get_field("variante_2", $id) . '</td><td><a href="' . $zertifikat_url . '">Download</a></td></tr>';
		unset($zertifikat_url);
	  }

	  $zertifikat_url = get_field("analysezertifikat_3", $id);

	  if(!empty($zertifikat_url)) {
		echo '<tr><td><a class="product-link" href="' . get_permalink( $id ) . '">'. get_the_title( $id ) . '</a></td><td>' . get_field("variante_3", $id) . '</td><td><a href="' . $zertifikat_url . '">Download</a></td></tr>';
		unset($zertifikat_url);
	  }

      $zertifikat_url = get_field("analysezertifikat_4", $id);

	  if(!empty($zertifikat_url)) {
		echo '<tr><td><a class="product-link" href="' . get_permalink( $id ) . '">'. get_the_title( $id ) . '</a></td><td>' . get_field("variante_4", $id) . '</td><td><a href="' . $zertifikat_url . '">Download</a></td></tr>';
		unset($zertifikat_url);
	  }

      $zertifikat_url = get_field("analysezertifikat_5", $id);

	  if(!empty($zertifikat_url)) {
		echo '<tr><td><a class="product-link" href="' . get_permalink( $id ) . '">'. get_the_title( $id ) . '</a></td><td>' . get_field("variante_5", $id) . '</td><td><a href="' . $zertifikat_url . '">Download</a></td></tr>';
		unset($zertifikat_url);
	  }
	}

	?>
                </table>
            </div>

        </div>

    </div>


    <div id="az-infos">


        <h2>Wie sind unsere Zertifikate aufgebaut?</h2>
        <h3>Blüten</h3>
        <p>Der erste Blick auf unser Blüten-Analysezertifikat lässt eine Einteilung in vier Teile zu.
            Im Kopf des Dokuments stehen die Anschrift des Labors und unter der Überschrift Details zu der
            analysierten
            Blüten-Probe. Dort siehst du Informationen wie u. a. die Bezeichnung der Blütensorte; die Lot- bzw.
            Batchnummer, aus der die Probe stammt; sowie den Auftraggeber SANALEO und die Proben-ID zur genauen
            Identifikation der Blütenprobe.
        </p>
        <p>Der Hauptteil des Zertifikats ist eine Tabelle mit allen Cannabinoiden, die in unseren Blüten vorkommen
            können. In der ersten Zeile unter den Benennungen ist zuerst das Gesamtgewicht der eingereichten Probe
            aufgeführt. Ab der zweiten Zeile werden die Cannabinoide aufgezählt. Diese sind sowohl als Kürzel als
            auch
            ausgeschrieben aufgeführt. In der Spalte “Ergebnis” steht, wie viel Milligramm (mg) der Substanz auf das
            Kilogramm (kg) in der Probe vorliegen. Steht in der Zelle “ND”, so bedeutet das “nicht detektierbar”:
            Der
            Messwert lag unter der Bestimmungsgrenze von 0,01 % bzw. 100 mg/kg. Dahinter, unter “Einheit”, ist diese
            Menge nochmals in Prozent aufgeführt. Besonders relevant sind die Werte des Cannabidiols (CBD + CBDA),
            des
            Cannabigerols (CBG + CBGA) und des Tetrahydrocannabidiols (THC + THCA). Cannabidiol ist der Wirkstoff,
            um
            den es uns bei SANALEO CBD geht, denn CBD kann zahlreiche positive Wirkungen auf den menschlichen
            Organismus
            haben. Daher ist der Summenwert von Cannabidiol und Cannabidiolsäure fett gedruckt. Analog verhält es
            sich
            mit Cannabigerol. Auch fett gedruckt ist der Summenwert von Tetrahydrocannabidiol. Doch der Aussagewert
            liegt hier nicht vordergründig in der therapeutischen Potenz des Wirkstoffes, sondern in seiner
            Zulässigkeit. Der Summenwert für Tetrahydrocannabidiol darf den Wert von 0,2 % nicht überschreiten. Da
            Tetrahydrocannabidiol berauschend wirkt und somit unter das Betäubungsmittelgesetz fällt, wäre der
            Verkauf
            von Blüten mit einem höheren THC-Gehalt als 0,2 % rechtswidrig. Abgesehen von diesen drei Cannabinoiden
            sind
            noch Cannabinol, Cannabichromen, Tetrahydrocannabivarin, Cannabidivarin und Cannabidivarin-Carboxylsäure
            im
            Zertifikat aufgeführt. Diese wirken vorallem im Rahmen des Entourage-Effekts. Mehr dazu kann Du hier
            (https://sanaleo.com/der-entourage-effekt/) nachlesen.
        </p>
        <p>Das Zertifikat zeigt unter der Tabelle ein Bild der analysierten Probe, des Datum des Probeneingangs und
            die
            Unterschrift des/der verantwortlichen Analytikers/Analytikerin.
        </p>
        <p>Abschließend stehen im Zertifikat noch eine Fußnote mit Lesehinweisen der Tabelle und der durchgeführten
            Analysemethode und Gütesiegel des Labors.
        </p>

        <h3>Öle</h3>

        <p>Das Öle-Analysezertifikat besteht aus drei Seiten.
            Auf der ersten Seite stehen Referenzen des TÜV-Labors zu dem jeweiligen Untersuchungsbericht. Dazu
            gehört u. a. die Probenbezeichnung, die Menge, das Datum des Untersuchungsbeginns und die Chargennummer.
        </p>
        <p>Der Hauptteil des Zertifikats auf Seite 2 ist eine Tabelle mit allen Cannabinoiden, die in unseren Ölen
            vorkommen können. In der ersten Spalte werden die Cannabinoide aufgezählt. Diese sind sowohl als Kürzel
            als auch ausgeschrieben aufgeführt. In der Spalte “Messwert” steht, wie viel Milligramm (mg) der
            Substanz auf das Kilogramm (kg) in der Probe vorliegen. Die Deutung der Werte funktioniert wie unter (1)
            beschrieben. 
        </p>
        <p>Die dritte Seite des Zertifikats beinhaltet nur die Unterschrift der zuständigen Sachbearbeitung sowie
            nochmals den Auftraggeber und die Probenbezeichnung.
        </p>

        <p>Je nachdem, welche Cannabinoide für Dich besonders relevant sind, kannst du mithilfe des Zertifikats die
            perfekte Blüte oder das perfekte Öl für Dich auswählen.
        </p>
    </div>

</div>


</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>