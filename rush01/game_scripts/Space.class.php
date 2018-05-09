<?php

/**
 * Main game class - Space
 */
class Space
{
	/*
	** Width and Height of game field
	*/
	private $_width;
	private $_height;

	public function __construct($width, $height)
	{
		$this->_width = $width;
		$this->_height = $height;
	}

	/*
	** Call docs page
	*/
	static public function doc()
	{
		return file_get_contents('Vertex.doc.txt') . PHP_EOL;
	}

	/**
	 * Draw all game elements:
	 * a) Fill canvas with dots ('.').
	 * b) Draw all objects on the canvas.
	 */
	public function draw(Canvas $canvas)
	{
		//draw game
		for ($i=0; $i < $this->_width; $i++) { 
			for ($j=0; $j < $this->_height; $j++) { 
				$canvas->setPoint($i, $j, ".");
			}
		}

		// for ($i=0; $i < $this->_width; $i++) { 
		// 	$canvas->setPoint($i, 0, '-');
		// 	$canvas->setPoint($i, $this->_height + 1, '-');
		// }

		// for ($i=0; $i < $this->_height; $i++) { 
		// 	$canvas->setPoint(0, $i, '|');
		// 	$canvas->setPoint($this->_width + 1, $i, '|');
		// }

		// //протестувати і налаштувати пізніше
		// foreach (getAllItems() as $value) {
		// 	$value->draw($canvas);
		// }
	}

	/*
	** Get / Set methods
	*/
	public function getShip()
	{
		return $this->_ship;
	}
	public function setShip($ship)
	{
		$this->_ship = $ship;
	}
	public function getWidth()
	{
		return $this->_width;
	}
	public function getHeight()
	{
		return $this->_height;
	}
}

?>