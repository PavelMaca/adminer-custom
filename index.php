<?php

function adminer_object() {
    // required to run any plugin
    include_once "./plugins/plugin.php";
    
    // autoloader
    foreach (glob("plugins/*.php") as $filename) {
        include_once "./$filename";
    }
    
    $plugins = [
        // specify enabled plugins here
        new AdminerDumpJson(),
        new AdminerLinksDirect(),
        new AdminerColors([
            'localhost' => '#009245',
            'db.loc' => '#009245',
        ], '#ED1C24'),
    ];

    /* It is possible to combine customization and plugins:
    class AdminerCustomization extends AdminerPlugin {
    }
    return new AdminerCustomization($plugins);
    */

    return new AdminerPlugin($plugins);
}

// include original Adminer or Adminer Editor
include "./adminer.php";