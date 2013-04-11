<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Benchmark - PHP</title>
		<style type="text/css" media="all">
			@import url("/stylesheets/site.css");
 		</style>
	</head>
	<body>
		<div class="headline">
			Benchmark - Tester
		</div>
		<div class="content">
			<form action="/index.php" method="POST">
				<div class="tests">
					{$tests}
				</div>
				<div class="input">
					<input type="submit" value="Ausgewählte Tests durchführen" />
				</div>
			</form>

			<div class="measures">
				{$testsMeasure}
			</div>
		</div>
	</body>
</html>