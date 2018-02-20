<?php
	require_once('Meal.class.php');
	require_once('FoodItem.class.php');
	class MealRegistration {
		
		private $databaseConnection;
		
		function __constructor() {
			if(!extension_loaded('sqlite3'))
				die('sqlite3 not loaded!');

			$this->databaseConnection  = new SQLite3();
			$createMealsStatement = "
				CREATE TABLE IF NOT EXISTS meals(
					id INTEGER AUTO_INCREMENT PRIMARY KEY,
					timestamp TEXT
				);
			";
			$createFooditemsStatement = "
				CREATE TABLE IF NOT EXISTS fooditems(
					id INTEGER AUTO_INCREMENT PRIMARY KEY,
					name TEXT,
					unit TEXT,
					unit_amount INTEGER,
					CHECK (unit IN ('Grams','Kcal'))
				);
			";
			$createMealFooditemsStatement = "
				CREATE TABLE IF NOT EXISTS meal_fooditems(
					meal_id INTEGER,
					fooditem_id INTEGER,
					PRIMARY KEY (meal_id, fooditem_id),
					FOREIGN KEY (meal_id) REFERENCES meals(id),
					FOREIGN KEY (fooditem_id) REFERENCES fooditems(id)
				);
			";
			
			$this->databaseConnection->open('mealRegistration.db');
			$this->databaseConnection->exec($createMealsStatement);
			$this->databaseConnection->exec($createFooditemsStatement);
			$this->databaseConnection->exec($createMealFooditemsStatement);
		}
		
		function addMeal($meal) {
			
		}

		function updateMeal($meal) {

		}

		function addFoodItem($foodItem) {

		}

		function updateFoodItem($foodItem) {

		}
		
		function __destruct() { 
			$this->databaseConnection->close();
		}
	}
?>