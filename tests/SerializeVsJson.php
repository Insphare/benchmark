<?php

class SerializeVsJson extends Benchmark_Abstract {

	/**
	 * @var
	 */
	private $array;

	public function __construct() {
		$this->array = $array = array_fill(5, 150, 'Banana');
	}

	public function getShortDescription() {
		return 'Transmute non scalar to strings like json_encode/serialize';
	}

	public function getLongDescription() {
		return 'We will check the performance variants for caching methods.';
	}

	public function getLoops() {
		return 10000;
	}

	public function benchmark_json_encode() {
		$assignToVariable = json_encode($this->array);
	}

	public function benchmark_serialize() {
		$assignToVariable = serialize($this->array);
	}
}

