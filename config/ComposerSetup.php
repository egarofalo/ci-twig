<?php

namespace CoDevelopers\Twigniter\Config;

use Composer\Script\Event;
use Composer\Installer\PackageEvent;

class ComposerSetup {

    private static $output = 'Configuring Twigniter...';

    public static function postUpdate(Event $event) {
        self::setupProject();
    }

    public static function postInstall(Event $event) {
        self::setupProject();
    }

    private static function setupProject() {
        // output the message
        echo self::$output;
        $src = rtrim(dirname(__FILE__), '/') . "/../Twigniter.php";
        $dest = rtrim(dirname(__FILE__), '/') . "/../../application/libraries/Twigniter.php";
        copy($src, $dest);
    }

}
