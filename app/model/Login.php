<?php
/**
 *
 */
class Login {

    function __construct() {
        # code...
    }

    public function isLogged() {
        if (isset($_SESSION['mbLogin']) && !empty($_SESSION['mbLogin'])) {
            return true;
        } else {
            return false;
        }
    }

}
