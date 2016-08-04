<?php

/**
 * Registering an autoload method for RingRing namespace.
**/
spl_autoload_register(function ($class) {
	
	// Using prefix RingRing as root namespace for sources.
	$root_namespace = "RingRing\\";
	
	$len = strlen($root_namespace);
	
	// Base directory for the namespace
	$base_dir = __DIR__."/RingRing/";
		
	// Check if the class use the root namespace to be loaded here.
	if (strncmp($root_namespace, $class, $len) === 0) {
		 // Get the relative class name
		$relative_class = substr($class, $len);

		// replace the namespace prefix with the base directory, replace namespace
		// separators with directory separators in the relative class name, append
		// with .php
		$file = $base_dir.str_replace('\\', '/', $relative_class) . '.php';

		// require file if exists
		if (file_exists($file)) {
			require $file;
		}
	}
});
