<?php

class Modulo extends Benchmark_Abstract {

	protected $integer = 45645465406;

	public function getShortDescription() {
		return 'Determining even/odd integers with modulo';
	}

	public function getLongDescription() {
		return 'There are many ways to do it - some of them are very slow';
	}

	public function getLoops() {
		return 35000;
	}

	public function benchmark_is_int() {
		$modulo = is_int($this->integer / 2);
	}
	public function benchmark_modulo() {
		$modulo = $this->integer % 2;
	}
	public function benchmark_binary() {
		$modulo = $this->integer & 1;
	}
}

