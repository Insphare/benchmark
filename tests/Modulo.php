<?php

class Modulo extends Benchmark_Abstract {

	protected $integer = 45645465406;

	public function getShortDescription() {
		return 'Determining even/odd integers';
	}

	public function getLongDescription() {
		return 'There are many ways to do it - some of them are very long';
	}

	public function getLoops() {
		return 35000;
	}

	public function test_integer() {
		$modulo = is_int($this->integer / 2);
	}
	public function test_operator() {
		$modulo = $this->integer % 2;
	}
	public function test_binary() {
		$modulo = $this->integer & 1;
	}
}
