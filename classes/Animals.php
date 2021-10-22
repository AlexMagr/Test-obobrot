<?php
    abstract class Animals {
        protected $id;
        protected $min_prod;
        protected $max_prod;
        protected $productivity;


        public function __construct() {
            $this->id = UId::uniqidReal();//регистрационный id при создании экземпляра
        }

        public function set_product() {//продуктивность животного
            $this->productivity = rand($this->min_prod, $this->max_prod);
        }

        public function get_product() {
            return $this->productivity;
        }
    }
?>