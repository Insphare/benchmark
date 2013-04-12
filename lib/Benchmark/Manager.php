<?php

class Benchmark_Manager {

	/**
	 * @var null | string
	 */
	private $testPath = null;

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->testPath = Registry::get(Registry::BASE_PATH) . 'tests' . DIRECTORY_SEPARATOR;
	}

	/**
	 * @return array
	 */
	public function getList() {
		$result = array();
		$directory = $this->testPath . '*.php';
		foreach(glob($directory) as $file) {
			$className = $this->convertPathToClassName($file);

			/**
			 * @var $testClass Benchmark_Abstract
			 */
			$testClass = new $className();
			$result[$file] = array(
				'short'	=> $testClass->getShortDescription(),
				'long'	=> $testClass->getLongDescription(),
			);
		}

		return $result;
	}

	/**
	 * @param $file
	 * @return mixed
	 */
	private function convertPathToClassName($file) {
		$file = str_replace(DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR, $file);
		$file = str_replace($this->testPath, '', $file);
		$file = str_replace('.php', '', $file);
		$file = str_replace(DIRECTORY_SEPARATOR, '_', $file);
		return $file;
	}

	/**
	 * @param $class
	 * @return array
	 */
	public function test($class) {
		$result = array();
		$className = $this->convertPathToClassName($class);

		/**
		 * @var $realClass Benchmark_Abstract
		 */
		$realClass = new $className();

		$reflectionClass = new ReflectionClass($className);
		$arrTestMethodNames = $reflectionClass->getMethods();

		$result['meta'] = array(
			'loops'		=> $realClass->getLoops(),
			'short'		=> $realClass->getShortDescription(),
			'long'		=> $realClass->getLongDescription(),
		);

		$measureTimes = array();
		$loopInteractionCounter = 0;
		foreach ($arrTestMethodNames as $testMethodName) {
			if (preg_match('~^benchmark_.*~i', $testMethodName->name, $match)) {
				$beforeLevel = error_reporting(0);
				$startMeasureTime = microtime(true);

				$loops = $realClass->getLoops();
				for ($i=0; $i < $loops; ++$i) {
					$realClass->{$testMethodName->name}();
				}

				$microTimeDuration = (microtime(true)-$startMeasureTime);
				error_reporting($beforeLevel);

				$result['tests'][$loopInteractionCounter] = array(
					'code'		=> $this->parseSource($class, $match[0], $className),
					'method'	=> $match[0],
					'duration'	=> ($microTimeDuration),
					'winner'	=> false,
					'loser'		=> false,
				);
				$measureTimes[$loopInteractionCounter] = $microTimeDuration;
				++$loopInteractionCounter;
			}
		}

		asort($measureTimes);
		$bestTime = reset($measureTimes);
		$index = array_keys($measureTimes);
		$result['tests'][$index[0]]['winner'] = true;
		$result['tests'][$index[count($index)-1]]['loser'] = true;

		foreach ($result['tests'] as &$value) {
			$value['slow'] = number_format(100 - ($bestTime / $value['duration'] * 100), 2, ',', '.');
		}

		return $result;
	}

	/**
	 * @param $file
	 * @param $function
	 * @param $className
	 * @return bool|mixed
	 */
	private function parseSource($file, $function, $className) {
		$source = file_get_contents($file);
		$lines = explode(PHP_EOL, $source);

		$reflectionClass = new ReflectionClass($className);
		$beginLine = $reflectionClass->getMethod($function)->getStartLine();
		$endLine = $reflectionClass->getMethod($function)->getEndLine();
		$sliced = array_slice($lines, $beginLine, $endLine - $beginLine-1, true);

		$code = implode(PHP_EOL, $sliced);
		return highlight_string('<?php' . PHP_EOL . $code, true);
	}

}