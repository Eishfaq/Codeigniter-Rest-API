<!DOCTYPE html>
<html ng-app="myapp">
<head>
	<title>Angular</title>
	<link rel="stylesheet" type="text/css" href="">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>scripts/vendor/bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="<?php echo base_url();?>scripts/vendor/angular/angular.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>scripts/app/app.js"></script>
</head>
<body>
	<div class="container">
		<header class="site-header">
			<h1>Angular Practice</h1>
		</header>
		<section>
			<input type="number" ng-model="first">
			<input type="number" ng-model="last">
			<label>{{first + last}}</label>
		</section>

		<section ng-controller="MyController as myinfo">
			<h3>Name:</h3>{{myinfo.info.name}}
			<h3>Designiation:</h3>{{myinfo.info.designation}}
		</section>
	</div>

	
</body>
</html>