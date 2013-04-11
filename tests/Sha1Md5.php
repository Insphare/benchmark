<?php

class Sha1Md5 extends Benchmark_Abstract {

	const TEST_STRING = 'testString';

	public function getShortDescription() {
		return 'Tests sha1 vs md5';
	}

	public function getLongDescription() {
		return 'Which operation needs more time? Consider sha1-string is longer than md5.';
	}

	public function getLoops() {
		return 10000;
	}

	public function test_sha1() {
		sha1(self::TEST_STRING);
	}

	public function test_md5() {
		md5(self::TEST_STRING);
	}
}
