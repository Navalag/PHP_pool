<?php

/**
*  Basic class for all objects on the game field
*/
abstract class BaseObject
{
	// coordinates
	protected $_x;
	protected $_y;
	// radius of an object
	protected $_radius;
	private $_isAlive;

	public function __construct($x, $y, $radius)
	{
		$this->_x = $x;
		$this->_y = $y;
		$this->_radius = $radius;
		$this->_isAlive = true;
	}

	/**
	 * Проверяем - не выходит ли (x,y) за границы.
	 */
	public function checkBorders($minx, $maxx, $miny, $maxy)
	{
		// echo "$this->_x\n$this->_y\n\n";
		if ($this->_x < $minx)
			$this->_x = $minx;

		if ($this->_x > $maxx)
			$this->_x = $maxx;

		if ($this->_y < $miny)
			$this->_y = $miny;

		if ($this->_y > $maxy)
			$this->_y = $maxy;
		// echo "$this->_x\n$this->_y\n\n";
	}


	/**
	 * Метод рисует свой объект на "канвасе".
	 */
	// abstract public function draw($canvas)
	// {
	// 	//do nothing
	// }

	/**
	 * Двигаем себя на один ход.
	 */
	// abstract public function move()
	// {
	// 	//do nothing
	// }

	/**
	 * Проверяем - пересекаются ли 
	 * переданный(object) и наш(this) объекты.
	 */
	// public function isIntersec($object)
	// {
	// 	$dx = $this->_x - $object->x;
	// 	$dy = $this->_y - $object->y;
	// 	// стандартні ф-ції
	// 	$destination = sqrt($dx * $dx + $dy * $dy);
	// 	$destination2 = max($this->radius, $object->radius);

	// 	return $destination <= $destination2;
	// }

	public function getX()
	{
		return $this->_x;
	}
	public function setX($x)
	{
		$this->_x = $x;
	}

	public function getY()
	{
		return $this->_y;
	}
	public function setY($x)
	{
		$this->_y = $y;
	}
	public function getRadius()
	{
		return $this->_radius;
	}
	public function setRadius($radius)
	{
		$this->_radius = $radius;
	}
	public function isAlive()
	{
		return $this->_isAlive;
	}
	public function setAlive($alive)
	{
		$this->_isAlive = $alive;
	}
	public function die()
	{
		$this->_isAlive = false;
	}
}

?>