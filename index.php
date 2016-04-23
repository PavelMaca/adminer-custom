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

        // source: dg/adminer-custom
        new AdminerDisableJush(),
        new AdminerAutocomplete(),
        new AdminerSaveMenuPos(),
        new AdminerRemoteColor('#ED1C24'), // modified


        // AdminerTheme has to be the last one!
        new AdminerTheme('default-orange')
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