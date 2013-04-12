<?php

class Sha1Md5 extends Benchmark_Abstract {

	const TEST_STRING = 'testString';

	public function getShortDescription() {
		return 'Sha1 vs md5';
	}

	public function getLongDescription() {
		return 'Which operation needs more time? Be aware sha1-string contains more chars than md5.';
	}

	public function getLoops() {
		return 10000;
	}

	public function benchmark_sha1() {
		sha1(self::TEST_STRING);
	}

	public function benchmark_md5() {
		md5(self::TEST_STRING);
	}
}

