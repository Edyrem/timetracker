<!DOCTYPE html>
<html>
	<head>
		<title>Welcome to TimeTracker</title>
		<?= $this->tag->stylesheetLink('css/main.css') ?>
		<?= $this->tag->stylesheetLink('css/bootstrap.min.css') ?>
	</head>
	<body>

		<?= $this->getContent() ?>

		<?= $this->tag->javascriptInclude('js/jquery-3.3.1.min.js') ?>
		<?= $this->tag->javascriptInclude('js/bootstrap.min.js') ?>
		<?= $this->tag->javascriptInclude('js/script.js') ?>
	</body>
</html>