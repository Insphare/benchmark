<?php

class Quotes extends Benchmark_Abstract {

	private $storage1 = '';
	private $storage2 = '';
	private $storage3 = '';

	public function getShortDescription() {
		return 'Single quotes vs. double quotes';
	}

	public function getLongDescription() {
		return 'Which usage is the best?';
	}

	public function getLoops() {
		return 100000;
	}

	public function benchmark_single() {
		for ($i=0; $i < 100; $i++) {
			$this->storage1 .= 'a' . 'b' . 'c' . 'd';
		}
	}

	public function benchmark_double() {
		for ($i=0; $i < 100; $i++) {
			$this->storage2 .= "a" . "b" . "c" . "d";
		}
	}

	public function benchmark_mixed() {
		for ($i=0; $i < 100; $i++) {
			$this->storage3 .= 'a' . "b" . 'c' . "d";
		}
	}
}

