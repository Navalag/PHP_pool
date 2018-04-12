<?php

class Jaime extends Lannister {
	function sleepWith($character)
	{
		if ($character instanceof Cersei)
		{
			echo "With pleasure, but only in a tower in Winterfell, then." . PHP_EOL;
		}
		else
			parent::sleepWith($character);
	}
}

?>
