<?php

class TernaryVsIf extends Benchmark_Abstract {

	public function getShortDescription() {
		return 'Ternary vs. if';
	}

	public function getLongDescription() {
		return 'Lazy ternary vs. if statement.';
	}

	public function getLoops() {
		return 100000;
	}

	public function test_ternary() {
		$x = true;
		$y = $x ? 'yes' : 'no';
	}

	public function test_withoutSuppression() {
		$x = true;
		if (true === $x) {
			$y = 'yes';
		}
		else {
			$y = 'no';
		}
	}
}
