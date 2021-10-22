<?php
    class ProductCollector {/*собираем продукцию*/
        const COW_QUANTITY = 7;
        const HEN_QUANTITY = 15;
        protected function getProduct($animal) {//подсчет общего количества продукции
            if ($animal == 'Cow') {
                $quan =self::COW_QUANTITY;
            } elseif ($animal == 'Hen') {
                $quan = self::HEN_QUANTITY;
            } else {
                exit('Wrong animals');
            }
            $arr_animals = AnimalFactory::create($animal, $quan);
            $product = 0;
            if (is_array($arr_animals[$animal])) {
                foreach ($arr_animals[$animal] as $cow_object) {
                    $product += $cow_object->get_product();
                }
            }
            return $product;
        }
        public function getTotal() {/*общее количество продукции*/
            $product_hen = $this->getProduct('Hen');
            $product_cow = $this->getProduct('Cow');
            $total =  "В хлев добавлено коров: " . Cow::$quantity . " и кур: " . Hen::$quantity . "<br>" .
                "Кол-во собранных шт. яиц: " . $product_hen . "<br>" .
                "Кол-во собранных литров молока: " . $product_cow;
            return $total;
        }
    }
?>