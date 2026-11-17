<?php

namespace App\Lib;

/**
 * Trait Helper
 * @package App\Lib
 */
trait Helper {

    /**
     * Gets a property value or false if not exists
     * @param string $var
     * @return bool|mixed
     */
    public function get(string $var) {
        if (property_exists(get_called_class(), $var)) {
            return $this->$var;
        } else {
            return false;
        }
    }

    /**
     * Sets a property value or false if not exists
     * @param string $var
     * @param        $value
     * @return bool|$this
     */
    public function set(string $var, $value) {
        if (property_exists(get_called_class(), $var)) {
            $this->$var = $value;
            return $this;
        } else {
            return false;
        }
    }
}
