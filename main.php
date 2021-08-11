<?php

/*класс группа животных*/

class GroupAnimals {
	
	/*численность живности(7/15) на старте*/
	private $all_animals = [
		'cow' => 7,
		'hen' => 15
	];
	/*подгруппы животных*/
	private $cow = [];
	private $hen =[];
	/*количество добавляемой живности*/
	private $cow_add = 0;
	private $hen_add = 0;
	/*количество собранной продукции*/
	private $cow_product = 0;
	private $hen_product = 0;
	
	
	function __construct() {
		$this->registrationAnimals();
	}
	
	/*регистрация животных*/
	function registrationAnimals() {
		foreach ($this->all_animals as $animal_class => $amount) {
			for ($i = 0; $i <= $amount - 1;  $i++) {
				switch ($animal_class) { 
					case 'cow':
						$animal = new Cow();
						$this->cow[UId::uniqidReal()] = $animal->getProduct();
						break;
					case 'hen':
						$animal = new Hen();
						$this->hen[UId::uniqidReal()] = $animal->getProduct();
						break;
				}
				unset($animal);
			}
		}
		echo "В хлеву зарегистрировано коров: " . $this->all_animals['cow'] . " и кур: " . $this->all_animals['hen'] . "\n";
	}

	/*общий удой стада/общее число яиц стаи*/
	function getProduction() {
		$total = 0;
		$total = "Кол-во собранных шт. яиц: " . array_sum($this->hen) . "\n" . "Кол-во собранных литров молока: " . array_sum($this->cow);
		echo $total;
	}

	/*добавить животное в группу зарегистрировать его*/
	function addAnimal($cow_add = 0, $hen_add = 0) {
		$this->cow_add = (is_int($cow_add) && $cow_add >= 0) ? $cow_add : 0;
		$this->hen_add = (is_int($hen_add) && $hen_add >= 0) ? $hen_add : 0;
		if ($this->cow_add > 0) {
			$this->all_animals['cow'] = $this->all_animals['cow'] + $this->cow_add;
			for ($i = 0; $i <= $this->cow_add - 1; $i++) {
				$animal = new Cow();
				$this->cow[UId::uniqidReal()] = $animal->getProduct();
				unset($animal);
			}
		}
		if ($this->hen_add > 0) {
			$this->all_animals['hen'] = $this->all_animals['hen'] + $this->hen_add;
			for ($i = 0; $i <= $this->hen_add - 1; $i++) {
				$animal = new Hen();
				$this->hen[UId::uniqidReal()] = $animal->getProduct();
				unset($animal);
			}
		}
		
		echo "В хлев добавлено коров: " . $this->cow_add . " и кур: " . $this->hen_add  . "\n";
		echo "Теперь в хлеву зарегистрировано коров: " . $this->all_animals['cow'] . " и кур: " . $this->all_animals['hen'] . "\n";
	}
}

class Cow {
	/*продуктивность одной коровы*/
	function getProduct() {
		return rand(8, 12);
	}
}

class Hen {
	/*продуктивность одной курицы*/
	function getProduct() {
		return rand(0, 1);
	}
}

class UId {
	static function uniqidReal($lenght = 13) {
		// uniqid gives 13 chars, but you could adjust it to your needs.
		if (function_exists("random_bytes")) {
			$bytes = random_bytes(ceil($lenght / 2));
		} elseif (function_exists("openssl_random_pseudo_bytes")) {
			$bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
		} else {
			throw new Exception("no cryptographically secure random function available");
		}
		return substr(bin2hex($bytes), 0, $lenght);
	}
}

/*выполнение: можно задавать параметры количества добавляемых коров и кур*/

//создаем визит в хлев
$visit = new GroupAnimals();
//добавляем новых животных $cow, $hen
//$visit->addAnimal(0, 0);
//подсчитываем общее количество собранной продукции
//$visit->getProduction();
?>