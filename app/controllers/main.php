<?php 
use JBZoo\Image\Image;

/**
 * Application controller class
 * 
 * */

class Main{

	/**
	 * Images data sources
	 * @var array
	 * */
	private $img_array;

	/**
	 * Class constructor
	 * */

	public function __construct(){
		$this->img_array = [
			'flowers' => './assets/images/flowers.jpeg',
			'dogs' => './assets/images/dogs.jpeg',
			'people' => './assets/images/people.jpeg',
			'beach' => './assets/images/beach.jpeg',
			'forrest' => './assets/images/forrest.jpeg',
			'sunflowers' => './assets/images/sunflowers.jpeg',

		]; // Dummy data only for testing purpouse 
	}

	
	/**
	 * Load the main page
	 * 
	 * */

	public function Home(){

		require './app/views/index.web.php';
	}



	/**
	 * Return data from Array source given the aliases as JSON data
	 * @return JSON Array $result. All images found
	 *	$result = [
	`*		"count": 1,
	 *		"data": [
	 *			{
	 *				"url": "http://website.com/assets/images/dogs.jpeg"
	 *				'height': 244,
	 *				'width' : 355
	 *			}
	 *		]
	 *	]
	 **/

	public function Process(){
		$result = array();
		if (isset($_POST['count']) && isset($_POST['alias'])){
			$count = $_POST['count'];
			$alias = $_POST['alias'];
			$result = $this->LoadImagesByAlias($count, $alias);
		}
		echo json_encode($result);

	}



	/**
	 * Get all images info given aliases
	 * @param integer $count Count of aliases
	 * @param string $alias Alias (coma-separated)
	 * @return array $result All images found.
	 * 
	 * */

	private function LoadImagesByAlias($count, $alias){
		$imgAlias = explode(',', $alias); 

		$result = array(
				'count' => 0,
				'data' => []
		);
		if ($count == 0) {
			return $result;
		} else {
			for ($i=0; $i < $count; $i++) { 
				$value = trim($imgAlias[$i]);
				if(array_key_exists($value, $this->img_array)){
					$img = new Image($this->img_array[$value]);
					$temp = [
						'height' => $img->getHeight(),  
						'width' => $img->getWidth(), 
						'url' => $img->getUrl(),
					];
					$result['data'][] = $temp;
					$result['count'] = $result['count'] + 1;
					
				}
			}
			
		}
		return $result;

	}
}
