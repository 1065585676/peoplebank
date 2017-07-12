<?php include('indexHeader.php');?>

<?php include('header.php');?>

<script type="text/javascript">
	$('.conduct-rule-link').addClass('active');

	$('.file-select-link').removeClass('active');
	$('.compliance-rule-link').removeClass('active');
	$('.setting-link').removeClass('active');
</script>

<div style="width: 80%; margin: 0 auto">
	<div id="myAlertTop" class="alert alert-warning alert-dismissible hidden" role="alert">
		<button type="button" class="close" onclick="$('#myAlertTop').addClass('hidden');" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Warning!</strong> <span id="myAlertTopMsg">Better check yourself, you're not looking too good.</span>
	</div>

	<h3>Rules</h3>
	<div id="myBootstrapTableToolbar" class="btn-group">
		<button type="button" class="btn btn-default btn-toolbar-enable-rule">
			<i class="glyphicon glyphicon-ok"></i>
		</button>
		<button type="button" class="btn btn-default btn-toolbar-disable-rule">
			<i class="glyphicon glyphicon-ban-circle"></i>
		</button>
		<button type="button" class="btn btn-default btn-toolbar-delete-rule">
			<i class="glyphicon glyphicon-trash"></i>
		</button>
	</div>
	<table id="myBootstrapTable"></table>
	<br>
	<button class="btn btn-primary btn-analyse-rules-wyy" type="button">Analyse</button>
	<button class="btn btn-success btn-enable-rules-wyy" type="button">Enable</button>
	<button class="btn btn-danger btn-disenable-rules-wyy" type="button">Disable</button>
	<button class="btn btn-info btn-refresh-rules-wyy" type="button">Refresh</button>
	<br>
	<br>
	<div id="myAlertBottom" class="alert alert-warning alert-dismissible hidden" role="alert">
		<button type="button" class="close" onclick="$('#myAlertBottom').addClass('hidden');" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Warning!</strong> <span id="myAlertBottomMsg">Better check yourself, you're not looking too good.</span>
	</div>
	<hr>
	
</div>

<script type="text/javascript">
$(document).ready(function() {
	$('#myBootstrapTable').bootstrapTable({
		toolbar: "#myBootstrapTableToolbar",

		cache: false,

		search: true,
		showRefresh: true,
		showColumns: true,
		showToggle: true,
		showPaginationSwitch:true,
		//showFooter: true,

		url: 'server/getConductRuleTableDataHandler.php',
		method: 'get',

		pagination: true,
		pageSize: 5,
		pageList: [5, 10, 20, 50, 100, 200],
		//height: 500,

		clickToSelect: true,
		maintainSelected: true,

		columns: [
			{
				checkbox: true,
				field: "state",
			},
			{
				field: "id",
				title: "Rule ID",
				switchable: false,
				align: 'center',
			},
			{
				field: "name",
				title: "Rule Name",
				switchable: false,
				align: 'center',
			},
			{
				field: "content",
				title: "Rule Content",
				align: 'center',
			},
			{
				field: "describe",
				title: "Rule Describe",
				align: 'center',
			},
			{
				field: "remark",
				title: "Rule Remark",
				visible: false,
				align: 'center',
			},
		],
	});


	$('.btn-toolbar-enable-rule').on('click', function(){
		var selections = $('#myBootstrapTable').bootstrapTable('getSelections');
		var allSelections = $('#myBootstrapTable').bootstrapTable('getAllSelections');
		alert('getSelections: ' + JSON.stringify(selections));

		$("#myAlertTopMsg").html("You Click Toolbar Enable Button!");
		$("#myAlertTop").removeClass('hidden');
	});

	$('.btn-toolbar-disable-rule').on('click', function(){
		$("#myAlertTopMsg").html("You Click Toolbar Disable Button!");
		$("#myAlertTop").removeClass('hidden');
	});

	$('.btn-toolbar-delete-rule').on('click', function(){
		$("#myAlertTopMsg").html("You Click Toolbar Delete Button!");
		$("#myAlertTop").removeClass('hidden');
	});



	$('.btn-analyse-rules-wyy').on('click', function(){
		$("#myAlertBottomMsg").html("You Click Analyse Button!");
		$("#myAlertBottom").removeClass('hidden');
	});

	$('.btn-enable-rules-wyy').on('click', function(){
		$("#myAlertBottomMsg").html("You Click Enable Button!");
		$("#myAlertBottom").removeClass('hidden');
	});

	$('.btn-disenable-rules-wyy').on('click', function(){
		$("#myAlertBottomMsg").html("You Click Disable Button!");
		$("#myAlertBottom").removeClass('hidden');
	});

	$('.btn-refresh-rules-wyy').on('click', function(){
		$("#myAlertBottomMsg").html("You Click Refresh Button!");
		$("#myAlertBottom").removeClass('hidden');
	});
});
</script>

<?php include('indexFooter.php');?>