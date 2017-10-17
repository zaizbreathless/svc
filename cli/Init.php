<?php
namespace cli;

class Init {

	public function run() {
		$content = file_get_contents('file.txt');
		var_dump($content);
	}
}
