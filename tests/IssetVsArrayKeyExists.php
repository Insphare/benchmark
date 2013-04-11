<?php

class IssetVsArrayKeyExists extends Benchmark_Abstract {

	protected $array = array(
		'foo'		=> true,
		'bar'		=> true,
		'foobar'	=> true
	);

	public function getShortDescription() {
		return 'checking the existence of an array key with in_array and isset';
	}

	public function getLongDescription() {
		return 'comparing the existence check speed between a numbered array vs. an array using the values as keys with isset';
	}

	public function getLoops() {
		return 10000;
	}

	public function test_array_kex_exists() {
		array_key_exists('bar', $this->array);
	}

	public function test_isset() {
		isset($this->array['bar']);
	}
}
