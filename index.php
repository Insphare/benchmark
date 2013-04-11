<?php

$includePath = get_include_path();
$basePath = dirname(__FILE__) . DIRECTORY_SEPARATOR;

$includePathDirectories = array(
	$basePath . 'lib',
	$basePath . 'tests',
);

set_include_path(get_include_path() . ':' . implode(':', $includePathDirectories));
include_once $basePath . 'lib' . DIRECTORY_SEPARATOR . 'Autoloader.php';

$autoLoader = new Autoloader($basePath);
spl_autoload_register(array($autoLoader, 'loadFileByClassName'));

Registry::set(Registry::BASE_PATH, $basePath);

$benchmark = new Benchmark_Manager();
$tests = $benchmark->getList();

$isPostMode = isset($_POST);
$result = array();

if (true === $isPostMode) {
	if (!empty($_POST['tests']) && count($_POST['tests'])) {
		foreach (array_keys($_POST['tests']) as $testFile) {
			$result[] = $benchmark->test($testFile);
		}
	}
}


$testsHtml = '
	<table>
		<tr class="headTr">
			<td>&nbsp;</td>
			<td>Short-Description</td>
			<td>Long-Description</td>
		</tr>
';
$i = 0;
foreach ($tests as $file => $data) {
	$i++;

	$checked = false;

	if ($isPostMode && !empty($_POST['tests'][$file])) {
		$checked = ' checked="checked" ';
	}

	$testsHtml .= '
		<tr>
			<td><input id="ck_'.$i.'" type="checkbox" name="tests['.$file.']" '.$checked.'/></td>
			<td><label for="ck_'.$i.'">'.$data['short'].'</label></td>
			<td><label for="ck_'.$i.'">'.$data['long'].'</label></td>
		</tr>
		';
}

$htmlResult = '';

if (count($result)) {
	$htmlResult = '<h2>Measurement results</h2>';
	$htmlResult .= '<table>';

	$firstLoopPassed = false;
	foreach ($result as $key => $testWhile) {
		if (true === $firstLoopPassed) {
			$htmlResult .= '<tr class="space"><td colspan="4">&nbsp;</td></tr>';
		}

		if (false === $firstLoopPassed) {
			$firstLoopPassed = true;
		}

		$htmlResult .= '
			<tr>
				<th colspan="4" class="textLeft">
					'.$testWhile['meta']['short'].'&nbsp;-&nbsp;'.$testWhile['meta']['long'].'
				</th>
			</tr>
			<tr class="headTr">
				<td>
					Code
				</td>
				<td>
					Method
				</td>
				<td>
					Execution time with '.number_format($testWhile['meta']['loops'], 0, ',', '.').' loops
				</td>
				<td>
					Slower
				</td>
			</tr>
		';

		foreach ($testWhile['tests'] as $item) {
			$htmlResult .= '
				<tr '.($item['winner'] ? 'class="win"' : '').'>
					<td>
						'.($item['code']).'
					</td>
					<td>
						'.($item['method']).'
					</td>
					<td>
						'.($item['duration']).' ms
					</td>
					<td>
						'.($item['slow']).'%
					</td>
				</tr>
			';
		}
	}
	$htmlResult .= '</table>';
}

$testsHtml .= '</table>';
$template = new MiniTemplate();
$template->assign('tests', $testsHtml);
$template->assign('testsMeasure', $htmlResult);
echo $template->fetch('xhtml.tpl');

