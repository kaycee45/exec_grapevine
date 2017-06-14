<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>
<div class="container">
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Search</h3>
  </div>
  <div class="panel-body">
	<form method="post" action="<?php $_SERVER['PHP_SELF']?>">
	  <div class="form-group">
		<label>Consultant</label>
		<input name="consultant" type="text" class="form-control" placeholder="Consultant name">
	  </div>
	  <div class="form-group">
		<label>Office</label>
		<select name="office" class="form-control">
			<option>office1</option>
			<option>office2</option>
			<option>office3</option>
			<option>office4</option>
		</select>
	  </div>
	  <div class="form-group">
		<label>Recruiting area</label>
		<select name="area" class="form-control">
			<option>midlands</option>
			<option>east-midlands</option>
			<option>south</option>
		</select>
	  </div>
	  <div class="form-group">
		<label>Location</label>
		<select name="location" class="form-control">
			<option>London</option>
			<option>Manchester</option>
			<option>Birmingham</option>
		</select>
	  </div>
	  <div class="form-group">
		<label>Salary</label>
		<select name="salary" class="form-control">
			<option value="0-50000">Below 50,000</option>
			<option value="50000-100000">50,000 to 100,000</option>
			<option value="100000-1000000">Above 100,000</option>
		</select>
	  </div>
	  <button type="submit" name="search" class="btn btn-default">Submit</button>
	</form>
  </div>
</div>


<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Result</h3>
  </div>
  <div class="panel-body">
    <?php 
	if($consultants){
		echo "<pre>";
		print_r($consultants);
		echo "</pre>";
	}
	?>
  </div>
</div>

</div>
</body>
</html>