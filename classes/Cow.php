<?php
    class Cow extends Animals {
        protected $min_prod = 8;
        protected $max_prod = 12;
        static $quantity = 0;

        private function __construct() {
            parent::__construct();
            self::$quantity++;
            $this->set_product();
        }

        private function __clone() {}

        static function getObject() {
            return new self();
        }
    }
?>