<?php

abstract class Benchmark_Abstract {
	abstract public function getShortDescription();
	abstract public function getLongDescription();
	abstract public function getLoops();
}