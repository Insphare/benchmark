<?php

define('DS', DIRECTORY_SEPARATOR);

class OwnConstantVsGlobalConstant extends Benchmark_Abstract {

	public function getShortDescription() {
		return 'Global constants vs user constant';
	}

	public function getLongDescription() {
		return 'How different is the performance between system vs user constants?';
	}

	public function getLoops() {
		return 10000;
	}

	public function benchmark_directory_separator() {
		$string = '';
		$loops = range(0, 100);
		foreach ($loops as $loop) {
			$string = $string . 'abcdef' . DIRECTORY_SEPARATOR . 'text';
		}
	}

	public function benchmark_own_constant() {
		$string = '';
		$loops = range(0, 100);
		foreach ($loops as $loop) {
			$string = $string . 'abcdef' . DS . 'text';
		}
	}
}

