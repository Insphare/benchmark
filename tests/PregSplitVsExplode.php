<?php

class PregSplitVsExplode extends Benchmark_Abstract {

	public function getShortDescription() {
		return 'str_split vs. explode';
	}

	public function getLongDescription() {
		return 'Which usage is faster?';
	}

	public function getLoops() {
		return 10000;
	}

	public function benchmark_preg_split() {
		$string = str_pad('', 1200, 'a:a');
		$x = preg_split('~:~', $string);
	}

	public function benchmark_explode() {
		$string = str_pad('', 1200, 'a:a');
		$x = explode(':', $string);
	}
}

