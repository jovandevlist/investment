<?php

$error = "";

if ( isset($_POST["submit"]) ) {

	if ( isset($_FILES["file"])) {

		//if there was an error uploading the file
		if ($_FILES["file"]["error"] > 0) {
			$error = "Return Code: " . $_FILES["file"]["error"];
		} else {
			//Print file details
			/*
			echo "Upload: " . $_FILES["file"]["name"] . "<br />";
			echo "Type: " . $_FILES["file"]["type"] . "<br />";
			echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
			echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
			*/

			$mimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
			if(in_array($_FILES['file']['type'], $mimes)){
				$contents= file_get_contents($_FILES['file']['tmp_name']);
				$Data = str_getcsv($contents, "\n"); //parse the rows
				foreach($Data as &$Row) {
					$Row = str_getcsv($Row, ";"); //parse the items in rows
					print_r($Row);
				}
			} else {
				$error = "Sorry, mime type not allowed";
			}
		}
	} else {
		$error = "No file selected";
	}

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Invest</title>
	
	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="icon" href="favicon.ico" type="image/x-icon">

	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="public/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="public/dist/css/toastr.css">
	<script type="text/javascript" src="public/dist/js/jquery.min.js"></script>
	<script type="text/javascript" src="public/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="public/dist/js/toastr.js"></script>

	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="public/css/style.css">

</head>

<body>
	<div class="header">
		<div class="nav-header">
			<div class="logo-wrap">
				<a href="">
					<img class="brand-img" src="public/img/logo.png" alt="brand">
					<span class="brand-text">Invest</span>
				</a>
			</div>
		</div>
	</div>
	
	<div class="container mt-5">
		<div class="row">
			<div class="col-md-6 col-sm-12">
				<form method="POST" action="" enctype="multipart/form-data">
					<p>Upload csv file</p>
					<div class="input-group">
						<input type="file" name="file" class="form-control border" style="padding-top: 3px;">
						<div class="input-group-append">
							<button type="submit" name="submit" class="btn btn-primary">submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>

		<div class="row mt-5">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Client</th>
								<th>Initial</th>
								<th>Current</th>
								<th>Uninvested</th>
								<th>Possible Value</th>
								<th>Change</th>
								<th>Ownership</th>
								<th>Current Investment</th>
								<th>%</th>
								<th>Current Investment</th>
								<th>%</th>
								<th>Current Investment</th>
								<th>%</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>0x024268b2F2E30B77888080D120875405bC922dfa</td>
								<td>$10,000.00</td>
								<td>$22,879.18</td>
								<td>$1,531.98</td>
								<td>$38,100.94</td>
								<td>281%</td>
								<td>20%</td>
								<td>RUNE</td>
								<td>59%</td>
								<td>SNX</td>
								<td>36%</td>
								<td>uninvested</td>
								<td>5%</td>
							</tr>
							<tr>
								<td>2</td>
								<td>0x024268b2F2E30B77888080D120875405bC922dfa</td>
								<td>$10,000.00</td>
								<td>$22,879.18</td>
								<td>$1,531.98</td>
								<td>$38,100.94</td>
								<td>281%</td>
								<td>20%</td>
								<td>RUNE</td>
								<td>59%</td>
								<td>SNX</td>
								<td>36%</td>
								<td>uninvested</td>
								<td>5%</td>
							</tr>
							<tr>
								<td>3</td>
								<td>0x024268b2F2E30B77888080D120875405bC922dfa</td>
								<td>$10,000.00</td>
								<td>$22,879.18</td>
								<td>$1,531.98</td>
								<td>$38,100.94</td>
								<td>281%</td>
								<td>20%</td>
								<td>RUNE</td>
								<td>59%</td>
								<td>SNX</td>
								<td>36%</td>
								<td>uninvested</td>
								<td>5%</td>
							</tr>
							<tr>
								<td>4</td>
								<td>0x024268b2F2E30B77888080D120875405bC922dfa</td>
								<td>$10,000.00</td>
								<td>$22,879.18</td>
								<td>$1,531.98</td>
								<td>$38,100.94</td>
								<td>281%</td>
								<td>20%</td>
								<td>RUNE</td>
								<td>59%</td>
								<td>SNX</td>
								<td>36%</td>
								<td>uninvested</td>
								<td>5%</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

	</div>
</body>


<script type="text/javascript">
	
<?php

if ($error != '') {
	echo "toastr.error('".$error."')";
}


?>
</script>

</html>
