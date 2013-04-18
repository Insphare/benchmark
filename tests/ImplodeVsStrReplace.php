<?php

class ImplodeVsStrReplace extends Benchmark_Abstract {

	public function getShortDescription() {
		return 'Implode vs Replace directory separation';
	}

	public function getLongDescription() {
		return 'Generate DS implode-array or replace';
	}

	public function getLoops() {
		return 10000;
	}

	public function benchmark_implode() {
		implode(
			DIRECTORY_SEPARATOR,
			array( __DIR__, '..', '..', '..', 'cli', 'bootstrap.php' )
		);
	}

	public function benchmark_replace() {
		str_replace('/', DIRECTORY_SEPARATOR, __DIR__.'/../../../cli/bootstrap.php');
	}
}

