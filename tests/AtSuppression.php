<?php

class AtSuppression extends Benchmark_Abstract {

	public function getShortDescription() {
		return 'At suppression';
	}

	public function getLongDescription() {
		return 'Testing which is faster.';
	}

	public function getLoops() {
		return 10000;
	}

	public function benchmark_atSuppression() {
		for ($i = 0; $i < 50; ++$i) {
			@parse_url('a');
		}
	}

	public function benchmark_withoutSuppression() {
		for ($i = 0; $i < 50; ++$i) {
			parse_url('a');
		}
	}
}

