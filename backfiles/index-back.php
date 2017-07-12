<!DOCTYPE html>
<html>
<head>
	<title>People Bank</title>

	<link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="bootstrap-fileinput-master/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
	
	<link href="bootstrap-table-master/dist/bootstrap-table.css" rel="stylesheet">

	<script src="jQuery/jquery-3.2.1.min.js"></script>
	<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

	<script src="bootstrap-fileinput-master/js/plugins/piexif.min.js"></script>
	<script src="bootstrap-fileinput-master/js/plugins/sortable.min.js"></script>
	<script src="bootstrap-fileinput-master/js/plugins/purify.min.js"></script>
	<script src="bootstrap-fileinput-master/js/fileinput.min.js"></script>
	<script src="bootstrap-fileinput-master/themes/fa/theme.js"></script>
	<script src="bootstrap-fileinput-master/js/locales/<lang>.js"></script>

	<script src="bootstrap-table-master/dist/bootstrap-table.js"></script>

</head>
<body>
	<div style="width: 80%; margin: 0 auto">
		<h3>Select Files</h3>
		<div>
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#localFiles" aria-controls="ftpFiles" role="tab" data-toggle="tab">Local Load</a></li>
				<li role="presentation"><a href="#ftpFiles" aria-controls="ftpFiles" role="tab" data-toggle="tab">FTP Upload</a></li>
			</ul>
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane fade in active" id="localFiles">
					<br>
					<div class="input-group">
						<input id="localUpload" type="file" class="file-loading" name="localFilesUpload[]"  multiple />
						<span class="input-group-btn"></span>
						<span class="input-group-btn" style="vertical-align: bottom;">
							<button class="btn btn-default btn-switch-preview" type="button">Enable Preview</button>
						</span>
					</div>
				</div>
				<div role="tabpanel" class="tab-pane fade" id="ftpFiles">
					<br>
					...
				</div>
			</div>
		</div>

		<hr>
		<h3>Rules</h3>
		<div id="myTableToolbar" class="btn-group">
			<button type="button" class="btn btn-default">
				<i class="glyphicon glyphicon-plus"></i>
			</button>
			<button type="button" class="btn btn-default">
				<i class="glyphicon glyphicon-heart"></i>
			</button>
			<button type="button" class="btn btn-default">
				<i class="glyphicon glyphicon-trash"></i>
			</button>
		</div>
		<table id="myTable" data-toggle="table" 
		data-url="getTableDataHandler.php"
		data-striped="true"
		data-sort-name="id"
		data-sort-order="desc"
		data-search="true"
		data-show-refresh="true"
		data-show-toggle="true"
		data-show-columns="true"
		data-toolbar="#myTableToolbar"
		data-click-to-select="true"
		data-query-params="queryParams"
		data-pagination="true"
		data-page-list="[5, 10, 20, 50, 100, 200]" >
		<thead>
			<tr>
				<th data-field="state" data-checkbox="true"></th>
				<th data-field="id" data-halign="center" data-align="center" data-sortable="true"  data-switchable="false">Item ID</th>
				<th data-field="name" data-halign="center" data-align="center" data-sortable="true"  data-switchable="false">Item Name</th>
				<th data-field="content" data-halign="center" data-align="center">Item Content</th>
				<th data-field="describe" data-halign="center" data-align="center">Item Describe</th>
				<th data-field="remark" data-halign="center" data-align="center" data-visible="false">Item Remark</th>
			</tr>
		</thead>
	</table>
	<br>
	<button class="btn btn-primary btn-analyse-rules-wyy" type="button">Analyse</button>
	<button class="btn btn-success btn-enable-rules-wyy" type="button">Enable</button>
	<button class="btn btn-danger btn-disenable-rules-wyy" type="button">Disable</button>
	<button class="btn btn-info btn-refresh-rules-wyy" type="button">Refresh</button>
	<br>
	<br>
	<div id="myAlert" class="alert alert-warning alert-dismissible hidden" role="alert">
		<button type="button" class="close" onclick="$('#myAlert').addClass('hidden');" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Warning!</strong> <span id="alertMsg">Better check yourself, you're not looking too good.</span>
	</div>
	<hr>
	
</div>


<script src="index.js" ></script>

</body>
</html>