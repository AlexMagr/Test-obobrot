<?php
    set_include_path(get_include_path().PATH_SEPARATOR.'classes');
    spl_autoload_register (function ($class) {
        include $class.'.php';
    });

    /*Добавляем животных, собираем продукцию и подсчитываем общее её количество*/
    $prod = new ProductCollector();
    echo $prod->getTotal();
?>