<?php

class IssetVsArrayKeyExists extends Benchmark_Abstract {

	protected $array = array(
		'foo'		=> true,
		'bar'		=> true,
		'foobar'	=> true
	);

	public function getShortDescription() {
		return 'Check array-key exists';
	}

	public function getLongDescription() {
		return 'Comparing the existence check speed between a numbered array vs. an array using the values as keys with isset';
	}

	public function getLoops() {
		return 10000;
	}

	public function benchmark_array_kex_exists() {
		array_key_exists('bar', $this->array);
	}

	public function benchmark_isset() {
		isset($this->array['bar']);
	}
}

