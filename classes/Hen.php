<?php
    class Hen extends Animals {
        protected $min_prod = 0;
        protected $max_prod = 1;
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