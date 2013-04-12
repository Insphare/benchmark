<?php

class CaseSensitive extends Benchmark_Abstract {

	public function getShortDescription() {
		return 'Uppercase vs lowercase';
	}

	public function getLongDescription() {
		return 'Case sensitive usage by reserved keys usage.';
	}

	public function getLoops() {
		return 100000;
	}

	public function benchmark_upper() {
		$a = TRUE;
		$b = FALSE;
		$c = NULL;
	}

	public function benchmark_lower() {
		$a = true;
		$b = false;
		$c = null;
	}
}

