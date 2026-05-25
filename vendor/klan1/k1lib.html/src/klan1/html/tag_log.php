<?php

/**
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */

namespace k1lib\html;

/**
 * Static Class to log all the Class tag actions
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */
class tag_log {

    /**
     * @var string A simple log, each line is an action.
     */
    static protected $log;

    /**
     * Return the Log as string
     * @return string
     */
    static function get_log() {
        return htmlspecialchars(self::$log);
    }

    /**
     * Receive 1 action, do not need New Line at end.
     * @param string $log 
     */
    static function log($log) {
        self::$log .= $log . "\n";
    }
}
