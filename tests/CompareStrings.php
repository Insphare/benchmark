<?php

class CompareStrings extends Benchmark_Abstract {

	/**
	 * @var string
	 */
	private $string = 'SELECT * FROM asdf asdf asd sadf sadf safsadf sadf asdf sadf asdf sadf asdf as fsda fsdf asdf as fasdf ';

	public function getShortDescription() {
		return 'Comparing string performance';
	}

	public function getLongDescription() {
		return 'Comparing string by different variants.';
	}

	public function getLoops() {
		return 10000;
	}

	public function benchmark_substr() {
		return substr($this->string, 0, 6) === 'SELECT';
	}

	public function benchmark_strpos() {
		return 0 === strpos($this->string, 'SELECT');
	}

	public function benchmark_strrpos() {
		return 0 === strrpos($this->string, 'SELECT');
	}

	public function benchmark_preg_match() {
		return preg_match('~^SELECT~i', $this->string);
	}
}
