<?php

class UcfirstVsStrtoupper extends Benchmark_Abstract {

	public function getShortDescription() {
		return 'Ucfirst vs. strtoupper vs. mb_strtoupper';
	}

	public function getLongDescription() {
		return 'Which usage is faster?';
	}

	public function getLoops() {
		return 100000;
	}

	public function benchmark_ucfirst() {
		ucfirst('t');
	}

	public function benchmark_strtoupper() {
		strtoupper('t');
	}

	public function benchmark_multibytestrtoupper() {
		mb_strtoupper('t');
	}
}

