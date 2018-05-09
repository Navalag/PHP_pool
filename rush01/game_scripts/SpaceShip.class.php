<?php

/**
 * Класс для космического корабля
 */
class SpaceShip extends BaseObject
{
	//картинка корабля для отрисовки
	private $matrix = [
		[0, 0, 1, 0, 0],
		[0, 1, 1, 1, 0],
		[1, 1, 1, 1, 1],
		[0, 1, 1, 1, 0],
		[0, 0, 1, 0, 0]
	];

	//вектор движения (-1 влево,+1 вправо)
	private $_rx = 0;
	private $_lx = 0;
	private $_uy = 0;
	private $_dy = 0;

	public function __construct($x, $y)
	{
		parent::__construct($x, $y, 3);
	}

	/**
	 * Устанавливаем вектор движения влево
	 */
	public function moveLeft()
	{
		$this->_lx = -1;
	}

	/**
	 * Устанавливаем вектор движения вправо
	 */
	public function moveRight()
	{
		$this->_rx = 1;
	}

	/**
	 * Устанавливаем вектор движения влево
	 */
	public function moveUp()
	{
		$this->_uy = -1;
	}

	/**
	 * Устанавливаем вектор движения вправо
	 */
	public function moveDown()
	{
		$this->_dy = 1;
	}

	/**
	 * Метод рисует свой объект на "канвасе".
	 */
	public function draw(Canvas $canvas)
	{
		$canvas->drawMatrix($this->_x - $this->_radius, $this->_y, $this->matrix, "M");
	}

	/**
	 * Двигаем себя на один ход.
	 * Проверяем столкновение с границами.
	 */
	public function move()
	{
		$this->_x = $this->_x + $this->_lx + $this->_rx;
		$this->_y = $this->_y + $this->_uy + $this->_dy;
		
		parent::checkBorders($this->_radius, 15 - $this->_radius, 0, 10);
	}
}

?>
