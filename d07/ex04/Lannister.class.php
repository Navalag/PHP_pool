<?php

class Lannister {
	public function sleepWith($character)
	{
		if (get_parent_class($character) === Lannister::class)
			echo 'Not even if I\'m drunk !' . PHP_EOL;
		else
			echo 'Let\'s do this.' . PHP_EOL;
	}
}

?>
