<?php

class SubStrVsCompounding extends Benchmark_Abstract {

	const TEST_STRING = 'testStringAllerStringsUndStringStringString';

	public function getShortDescription() {
		return 'Tests SubStr vs. compouding';
	}

	public function getLongDescription() {
		return 'SubStr vs compounding for one char';
	}

	public function getLoops() {
		return 10000;
	}

	public function benchmark_compounding() {
		$string = self::TEST_STRING;
		$string{5};
	}

	public function benchmark_substring() {
		$string = self::TEST_STRING;
		substr($string, 4, 5);
	}
}

