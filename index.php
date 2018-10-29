<?php 
	/*error_reporting(-1);
	ini_set('display_errors', 'On');*/
	include_once 'class/YoutubeSearch.php';
	if(!empty($_POST)){
		$object = new YoutubeSearch;
		$search_records = $object->search();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Youtube Search Lister</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/app.css">
</head>
<body>
	<div class="container">
		<div class="row">
	        <div class="col-md-6">
	    		<h1>Youtube Search Lister</h1>
	    		<form method="POST">
	    			<div id="custom-search-input">
		                <div class="input-group col-md-12">
		                    <input type="text" name="q" id="q" class="form-control input-lg" placeholder="Enter search text" />

		                    <span class="input-group-btn">
		                        <button class="btn btn-info btn-lg" type="submit">
		                            <i class="glyphicon glyphicon-search"></i>
		                        </button>
		                    </span>
		                </div>
		            </div>
		            <ul class="results" id="results">
						 <!-- <li><a>Search Result #1</a></li> -->
					 </ul>
	    		</form>	
	    		<?php if($_POST['q'] != ''){ ?>

	    		<p><h2>Search result for '<?php echo $_POST['q'] ?>'</h2></p>
	        	
	        	<?php } ?>
	        </div>
		</div>

		<br/></br>


		<div class="row">
			<table id="youtube_search_result" class="table table-striped table-bordered dt-responsive nowrap no-footer" style="width:100%">
		        <thead>
		            <tr>
		            	<th>ID</th>
		                <th>Title</th>
		                <th>Thumbnail</th>
		                <th>Uploader</th>
		                <th>date</th>
		            </tr>
		        </thead>
		        <tbody>
		         	<?php
		         		if(is_array($search_records)){
		         			foreach ($search_records as $value) {
		         				echo "<tr>";
		         				echo "<td>".$value['id']."</td>";
		         				echo "<td>".$value['title']."</td>";
		         				echo "<td>".$value['thumbnail']."</td>";
		         				echo "<td>".$value['uploader']."</td>";
		         				echo "<td>".$value['date']."</td>";
		         				echo "</tr>";
		         			}
		         		}
		         	?>
		        </tbody>
		    </table>			
		</div>

	</div>
    <footer>
    	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    	<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    	<script type="text/javascript" src="js/app.js"></script>
    </footer>
</body>
</html>