<?php

    namespace core;

    class Session
    {

        public function __construct()
        {
            session_start();
        }

        public function set(string $key, $value) {
            $_SESSION[$key] = $value;
        }

        public function get($key) {
            return $_SESSION[$key];
        }

        public function remove($key) {
            unset($_SESSION[$key]);
        }

        public function flashSession(string $stype, string $message) {
            setcookie($stype, $message, time() + 4, '/');
        } 
    }


?>