<?php

class MiniTemplate {

	/**
	 * @var array
	 */
	private $variables = array();

	/**
	 * @param string $key
	 * @param mixed $value
	 */
	public function assign($key, $value) {
		$this->variables[(string)$key] = $value;
	}

	/**
	 * @param $source
	 */
	public function fetch($source) {
		$source = Registry::get(Registry::BASE_PATH) . 'view' . DIRECTORY_SEPARATOR . $source;
		if (!file_exists($source)) {
			throw new RuntimeException('Template-View not found. ('.$source.')');
		}

		$source = file_get_contents($source);
		preg_match_all('~\{\$(?<variable>[^}]+)\}~im', $source, $result, PREG_SET_ORDER);
		foreach ($result as $row) {
			$variableName = $row['variable'];
			if (!isset($this->variables[$variableName])) {
				throw new RuntimeException('Missing assigned variable: ' . $variableName);
			}

			$source = str_replace($row[0], $this->variables[$variableName], $source);
		}

		return $source;
	}

}