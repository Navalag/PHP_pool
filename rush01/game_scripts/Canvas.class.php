<?php

/**
*  Draw all game elements (add them to the array)
*/
class Canvas
{
	private $_width;
	private $_height;
	private $_matrix;

	public function __construct($width, $height)
	{
		$this->_width = $width;
		$this->_height = $height;
	}

	public function drawMatrix($x, $y, $matrix, $c)
	{
		$height = count($matrix);
		$width = count($matrix[0]);
		
		for ($i = 0; $i < $height; $i++)
		{
			for ($j = 0; $j < $width; $j++)
			{
				if ($matrix[$i][$j] == 1)
					$this->setPoint($x + $j, $y + $i, $c);
			}
		}
	}

	public function setPoint($x, $y, $c)
	{
		// if ($y < 0 || $y >= $this->$_height) return;
		// if ($x < 0 || $x >= $this->$_width) return;

		$this->_matrix[$y][$x] = $c;
	}

	public function print_canvas()
	{
		echo "\n";

		for ($i = 0; $i < $this->_height + 2; $i++)
		{
			for ($j = 0; $j < $this->_width + 2; $j++)
			{
				echo " ";
				echo $this->_matrix[$i][$j];
				echo " ";
			}
			echo "\n";
		}

		echo "\n";
		echo "\n";
		echo "\n";
	}

	/*
	** Get / Set methods
	*/
	public function getWidth()
	{
		return $this->_width;
	}
	public function getHeight()
	{
		return $this->_height;
	}
	public function getMatrix()
	{
		return $this->_matrix;
	}
}

?>