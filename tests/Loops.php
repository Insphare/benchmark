<?php

class Loops extends Benchmark_Abstract {

	private $data = array();

	public function __construct() {
		$this->data = range(0, 200);
	}

	public function getShortDescription() {
		return 'Loop variants';
	}

	public function getLongDescription() {
		return 'They are many loop variants given. But which is the fastest?';
	}

	public function getLoops() {
		return 10000;
	}

	public function benchmark_foreach() {
		$tmp = array();
		foreach ($this->data as $key => $value) {
			$tmp[$key] = $value;
		}
	}

	public function benchmark_for() {
		$tmp = array();
		$count = count($this->data);
		for ($i=0; $i < $count; $i++) {
			$key = $i;
			$value = $this->data[$i];
			$tmp[$key] = $value;
		}
	}

	public function benchmark_while() {
		$tmp = array();
		$count = count($this->data);
		$i = 0;
		while($i < $count) {
			$key = $i;
			$value = $this->data[$i];
			$tmp[$key] = $value;
			$i++;
		}
	}

	public function benchmark_do_while() {
		$tmp = array();
		$count = count($this->data);
		$i = 0;
		do {
			$key = $i;
			$value = $this->data[$i];
			$tmp[$key] = $value;
			$i++;

		} while ($i < $count);
	}
}

