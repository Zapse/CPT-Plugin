<div class="wrap">
<h1>Custom post type</h1>
<?php settings_errors(); ?>


    <ul class="nav nav-tabs">
    <li class="<?php echo !isset($_POST["edit_post"]) ? 'active' : '' ?>"><a href="#tab-1">Your Custom Post Types</a></li>

    <li class="<?php echo isset($_POST["edit_post"]) ? 'active' : '' ?>">
			<a href="#tab-2">
				<?php echo isset($_POST["edit_post"]) ? 'Edit' : 'Add' ?> Custom Post Type
			</a>
	</li>

		<li><a href="#tab-3">Tab3</a></li>
	</ul>

    <div class="tab-content">
            <!-- jos edit_post EI ole valittuna tämä on aktiivinen huom! !isset -->
		    <div id="tab-1" class="tab-pane <?php echo !isset($_POST["edit_post"]) ? 'active' : '' ?>">

            <h3>Manage your ctp types</h3>

            <?php

                $options = get_option('santeri_plugin_cpt') ?: array();

                echo '<table><tr><th>ID</th><th>Singular Name</th><th>Plural Name</th></tr>';

                foreach ($options as $option) {

                    echo "<tr><td>{$option['post_type']}</td><td>{$option['singular_name']}</td><td>{$option['plural_name']}</td><td>";

                    echo '<form method="post" action="">';

                    echo '<input type="hidden" name="edit_post" value="' .$option['post_type'] . '">';

                    submit_button( 'Edit', 'primary small', 'submit', false );

                    echo '</form>';


                    echo '<form method="post" action="options.php">';

                    settings_fields( 'santeri_plugin_cpt_settings' );

                    echo '<input type="hidden" name="remove" value="' .$option['post_type'] . '">';

                    submit_button( 'Delete', 'delete small', 'submit', false );

                    echo '</form></td></tr>';
                }

                echo '</table>';
            ?>

            
    </div>

    <div id="tab-2" class="tab-pane <?php echo isset($_POST["edit_post"]) ? 'active' : '' ?>">
        
        <form method="post" action="options.php">
                <?php

                    settings_fields( 'santeri_plugin_cpt_settings' );

                    do_settings_sections( 'testi_cpt' );

                    submit_button();
                ?>

            </form>

        </div>

        <div id="tab-3" class="tab-pane">
        <h3>Dunno</h3>
        </div>

    </div>

</div>
