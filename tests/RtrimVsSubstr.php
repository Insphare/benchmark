<?php

class RtrimVsSubstr extends Benchmark_Abstract {

	public function getShortDescription() {
		return 'rtrim vs. substr -1';
	}

	public function getLongDescription() {
		return 'Which usage is faster?';
	}

	public function getLoops() {
		return 10000;
	}

	public function benchmark_rtrim() {
		$var = 'Bil'.str_pad('', 10000, 'l').'ing_';
		$var = rtrim($var, '_');
	}

	public function benchmark_substr() {
		$var = 'Bil'.str_pad('', 10000, 'l').'ing_';
		$var = substr($var, 0, -1);
	}
}

