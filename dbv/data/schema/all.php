<?php
$location = dirname(__FILE__);
$files = scandir($location);

$file_content = array();
foreach ($files as $file) {
	$frags = explode('.', $file);
	if ($frags[1] == 'sql') {
		$file_content[] = file_get_contents($file);
	}
}

echo "<pre>";print_r($file_content);