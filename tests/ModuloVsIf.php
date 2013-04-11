<?php

class ModuloVsIf extends Benchmark_Abstract {

	public function getShortDescription() {
		return 'Modulo vs. if';
	}

	public function getLongDescription() {
		return 'Lazy modulo vs. if statement.';
	}

	public function getLoops() {
		return 100000;
	}

	public function test_modulo() {
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
