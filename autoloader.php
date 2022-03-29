<?php

	function auto_load($class)
	{
		include 'classes/' . $class . '.class.php';
	}

	spl_autoload_register('auto_load');