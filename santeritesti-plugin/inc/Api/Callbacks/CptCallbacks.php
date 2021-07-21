<?php
/**
 * @package SanteritestiPlugin
 * 
 * Täällä hoidetaan kaikki Custom Post Typen callbackit. Voimme myös subadmin panelille määritellä textfieldejä etc.
 */

namespace Inc\Api\Callbacks;

class CptCallbacks {

    public function cptSectionManager() {
        echo 'manage your CPT';
    }

    public function cptSanitize( $input ) {

        $output = get_option('santeri_plugin_cpt');

        if ( isset($_POST["remove"]) ) {

            unset($output[$_POST["remove"]]);

            return $output;

        }

    
        
		if ( count($output) == 0 ) {
			$output[$input['post_type']] = $input;

			return $output;
		}
        //Jos uuden posttypen luomisen input arvo on sama, kuin jo olemassa olevan emme poista sitä
		foreach ($output as $key => $value) {
			if ($input['post_type'] === $key) {
				$output[$key] = $input; //ainoastaan muokkaamme joka tapahtuu alla olevassa funktiossa.
			} else {
				$output[$input['post_type']] = $input;
			}
		}
		

		return $output;
    }

    public function textField ( $args ) {
        $name = $args['label_for'];
        $option_name = $args['option_name'];
        $value = '';

        if ( isset($_POST["edit_post"]) ) {
            //Pääsy inputtiin, joka hakee valuen edit_post etsii mikä cpt nimi kyseessä, jonka jälkeen otamme uniikin arvon name
            $input = get_option( $option_name );
            $value = $input[$_POST["edit_post"]][$name];

        }
       

       echo '<input type="text" class="regular-text" id="' . $name . '" name="' . $option_name . '[' . $name . ']" value="' . $value . '" placeholder="' . $args['placeholder'] . '">';
    }

    
}