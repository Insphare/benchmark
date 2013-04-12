<?php

class StaticCall extends Benchmark_Abstract {

	private $class1;

	public function __construct() {
		$this->class1 = new testClassBenchmark2();
	}

	public function getShortDescription() {
		return 'Static function call vs. objects';
	}

	public function getLongDescription() {
		return 'Tests whether a static call is faster then an initializes object.';
	}

	public function getLoops() {
		return 10000;
	}

	public function benchmark_static_call() {
		testClassBenchmark1::process('test');
	}

	public function benchmark_instanceExists_object() {
		$this->class1->process('test');
	}

	public function benchmark_newInstance_object() {
		$class = new testClassBenchmark3();
		$class->process('test');
	}
}


class testClassBenchmark1 {

	public static function process($variable) {
		$variable = null;
		$variable = $variable + 1;
	}

}

class testClassBenchmark2 {

	public function process($variable) {
		$variable = null;
		$variable = $variable + 1;
	}

}

class testClassBenchmark3 {

	public function process($variable) {
		$variable = null;
		$variable = $variable + 1;
	}

}