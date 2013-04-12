<?php

class TypeHintConditionVsLazyCondition extends Benchmark_Abstract {

	public function getShortDescription() {
		return 'Type hinting vs. lazy conditions';
	}

	public function getLongDescription() {
		return 'Checks the performance between === and ==';
	}

	public function getLoops() {
		return 100000;
	}

	public function benchmark_typesafe() {
		$y = 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
		$b = 3333333333333333333333;

		if ($y === $b) {
			// do
		}
	}

	public function benchmark_lazy() {
		$y = 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
		$b = 3333333333333333333333;

		if ($y == $b) {
			// do
		}
	}
}

