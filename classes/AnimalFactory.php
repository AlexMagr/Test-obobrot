<?php
    class AnimalFactory {/*Добавляем животных в хлев*/
        static $arr_animals = [];//стадо,стая(массив объектов)

        static function create($animal, $quan = 0) {
            switch($animal) {
                case 'Cow':
                case 'Hen':
                    if (is_array(self::$arr_animals[$animal]) && count(self::$arr_animals[$animal]) > 0) {
                        $object_counter = $quan;//добавляем животных к уже существующим(если понадобится)
                    } else {
                        $object_counter = $animal::$quantity + $quan;//добавляем животных с 0
                    }
                    for ($i = 0; $i <= $object_counter - 1; $i++) {
                        self::$arr_animals[$animal][] = $animal::getObject();
                    }
                return self::$arr_animals;
                default:
                exit('Wrong animals');
            }
        }
    }
?>