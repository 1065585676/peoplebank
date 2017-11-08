<?php include('indexHeader.php');?>

<?php include('header.php');?>

<script type="text/javascript">
	$('.compliance-rule-link').addClass('active');

	$('.analyse-rule-link').removeClass('active');
	$('.file-select-link').removeClass('active');
	$('.conduct-rule-link').removeClass('active');
	$('.setting-link').removeClass('active');
</script>

<div style="width: 80%; margin: 0 auto" class="container">
	<div id="myAlertTop" class="alert alert-warning alert-dismissible hidden" role="alert">
		<button type="button" class="close" onclick="$('#myAlertTop').addClass('hidden');" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Warning!</strong> <span id="myAlertTopMsg">Better check yourself, you're not looking too good.</span>
	</div>

	<h3> 合规规则配置 </h3>
	<div id="myBootstrapTableToolbar">
		<button type="button" class="btn btn-success btn-toolbar-enable-rule">
			<i class="glyphicon glyphicon-ok"></i> 启用
		</button>
		<button type="button" class="btn btn-warning btn-toolbar-disable-rule">
			<i class="glyphicon glyphicon-ban-circle"></i> 关闭
		</button>
		<button type="button" class="btn btn-danger btn-toolbar-delete-rule" data-toggle="modal" data-target="#confirm-delete">
			<i class="glyphicon glyphicon-trash"></i> 删除
		</button>

		&nbsp;&nbsp;|&nbsp;&nbsp;

		<button type="button" class="btn btn-info btn-toolbar-add-rule" data-toggle="modal" data-target="#confirm-add">
			<i class="glyphicon glyphicon-plus"></i> 添加
		</button>
	</div>
	<div id="confirm-delete" class="modal fade" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">删除</h4>
				</div>
				<div class="modal-body">
				<p>确认删除选中的规则?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
					<button class="btn btn-danger btn-ok btn-confirm-delete-rule" data-dismiss="modal">删除</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<div id="confirm-add" class="modal fade" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">添加</h4>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group">
							<label for="add-rule-name" class="form-control-label">名称:</label>
							<input type="text" class="form-control" id="add-rule-name">
						</div>
						<div class="form-group">
							<label for="add-rule-content" class="form-control-label">前提:</label>
							<div class="btn-toolbar mb-4">
								<div class="btn-group mb-2">
									<select class="selectpicker show-tick select-premise" data-live-search="true" title="基本事件">
										<optgroup label="前提">
											<option value="Login">Login (登录)</option>
											<option value="Update">Update (更新)</option>
											<option value="Approve">Approve (批准)</option>
											<option value="Card">Card (刷卡)</option>
										</optgroup>
									</select>
								</div>
								<div class="btn-group mb-2">
									<button type="button" class="btn btn-secondary premise-op-yu" disabled onclick="$('#select-premise-content').val($('#select-premise-content').val() + ' && ');$('.select-premise').selectpicker('val', '');"> && </button>
									<button type="button" class="btn btn-secondary premise-op-huo" disabled onclick="$('#select-premise-content').val($('#select-premise-content').val() + ' || ');$('.select-premise').selectpicker('val', '');"> || </button>
									<button type="button" class="btn btn-secondary premise-op-fei" onclick="$('#select-premise-content').val($('#select-premise-content').val() + ' !');$('.select-premise').selectpicker('val', '');"> ! </button>
									<button type="button" class="btn btn-secondary premise-op-fenhao" disabled onclick="$('#select-premise-content').val($('#select-premise-content').val() + ' ; ');$('.select-premise').selectpicker('val', '');"> ; </button>
								</div>
							</div>
							<textarea class="form-control" id="select-premise-content"></textarea>
						</div>
						<div class="form-group">
							<label for="add-rule-content" class="form-control-label">结论:</label>
							<div class="btn-toolbar mb-4">
								<div class="btn-group mb-2">
									<select class="selectpicker show-tick select-conclusion" data-live-search="true" title="基本事件">
										<optgroup label="结论">
											<option value="Login">Login (登录)</option>
											<option value="Update">Update (更新)</option>
											<option value="Approve">Approve (批准)</option>
											<option value="Card">Card (刷卡)</option>
										</optgroup>
									</select>
								</div>
								<div class="btn-group mb-2">
									<button type="button" class="btn btn-secondary" onclick="$('#select-conclusion-content').val($('#select-conclusion-content').val() + ' && ');$('.select-conclusion').selectpicker('val', '');"> && </button>
									<button type="button" class="btn btn-secondary" onclick="$('#select-conclusion-content').val($('#select-conclusion-content').val() + ' || ');$('.select-conclusion').selectpicker('val', '');"> || </button>
									<button type="button" class="btn btn-secondary" onclick="$('#select-conclusion-content').val($('#select-conclusion-content').val() + ' !');$('.select-conclusion').selectpicker('val', '');"> ! </button>
									<button type="button" class="btn btn-secondary" onclick="$('#select-conclusion-content').val($('#select-conclusion-content').val() + ' ;');$('.select-conclusion').selectpicker('val', '');"> ; </button>
								</div>
							</div>
							<textarea class="form-control" id="select-conclusion-content"></textarea>
						</div>
						<div class="form-group">
							<label for="add-rule-content" class="form-control-label">约束:</label>
							<div class="btn-toolbar">
								<div class="btn-group">
									<select class="selectpicker show-tick select-constraint-premise" data-live-search="true" title="基本事件">
										<optgroup label="前提">
											<option value="Login">Login (登录)</option>
											<option value="Update">Update (更新)</option>
											<option value="Approve">Approve (批准)</option>
											<option value="Card">Card (刷卡)</option>
										</optgroup>
									</select>
								</div>
								<div class="btn-group">
									<select class="selectpicker show-tick select-constraint-property" data-live-search="true" title="事件属性" disabled>
										<optgroup label="前提属性" class="select-constraint-property-optgroup">

										</optgroup>
									</select>
								</div>
								<div class="btn-group">
									<button type="button" class="btn btn-secondary" onclick="$('#select-constraint-content').val($('#select-constraint-content').val() + ' && ');$('.select-constraint-premise').selectpicker('val', '');$('.select-constraint-property').selectpicker('val', '');"> && </button>
									<button type="button" class="btn btn-secondary" onclick="$('#select-constraint-content').val($('#select-constraint-content').val() + ' || ');$('.select-constraint-premise').selectpicker('val', '');$('.select-constraint-property').selectpicker('val', '');"> || </button>
									<button type="button" class="btn btn-secondary" onclick="$('#select-constraint-content').val($('#select-constraint-content').val() + ' !');$('.select-constraint-premise').selectpicker('val', '');$('.select-constraint-property').selectpicker('val', '');"> ! </button>
									<button type="button" class="btn btn-secondary" onclick="$('#select-constraint-content').val($('#select-constraint-content').val() + ' == ');$('.select-constraint-premise').selectpicker('val', '');$('.select-constraint-property').selectpicker('val', '');"> == </button>
									<button type="button" class="btn btn-secondary" onclick="$('#select-constraint-content').val($('#select-constraint-content').val() + ' != ');$('.select-constraint-premise').selectpicker('val', '');$('.select-constraint-property').selectpicker('val', '');"> != </button>
									<button type="button" class="btn btn-secondary" onclick="$('#select-constraint-content').val($('#select-constraint-content').val() + ' >= ');$('.select-constraint-premise').selectpicker('val', '');$('.select-constraint-property').selectpicker('val', '');"> >= </button>
									<button type="button" class="btn btn-secondary" onclick="$('#select-constraint-content').val($('#select-constraint-content').val() + ' > ');$('.select-constraint-premise').selectpicker('val', '');$('.select-constraint-property').selectpicker('val', '');"> > </button>
									<button type="button" class="btn btn-secondary" onclick="$('#select-constraint-content').val($('#select-constraint-content').val() + ' < ');$('.select-constraint-premise').selectpicker('val', '');$('.select-constraint-property').selectpicker('val', '');"> < </button>
									<button type="button" class="btn btn-secondary" onclick="$('#select-constraint-content').val($('#select-constraint-content').val() + ' <= ');$('.select-constraint-premise').selectpicker('val', '');$('.select-constraint-property').selectpicker('val', '');"> <= </button>
									<button type="button" class="btn btn-secondary" onclick="$('#select-constraint-content').val($('#select-constraint-content').val() + ' + ');$('.select-constraint-premise').selectpicker('val', '');$('.select-constraint-property').selectpicker('val', '');"> + </button>
									<button type="button" class="btn btn-secondary" onclick="$('#select-constraint-content').val($('#select-constraint-content').val() + ' - ');$('.select-constraint-premise').selectpicker('val', '');$('.select-constraint-property').selectpicker('val', '');"> - </button>
									<button type="button" class="btn btn-secondary" onclick="$('#select-constraint-content').val($('#select-constraint-content').val() + ' * ');$('.select-constraint-premise').selectpicker('val', '');$('.select-constraint-property').selectpicker('val', '');"> * </button>
									<button type="button" class="btn btn-secondary" onclick="$('#select-constraint-content').val($('#select-constraint-content').val() + ' / ');$('.select-constraint-premise').selectpicker('val', '');$('.select-constraint-property').selectpicker('val', '');"> / </button>
								</div>
							</div>
							<textarea class="form-control" id="select-constraint-content"></textarea>
						</div>
						<div class="form-group">
							<label for="add-rule-describe" class="form-control-label">描述:</label>
							<textarea class="form-control" id="add-rule-describe"></textarea>
						</div>
						<div class="form-group">
							<label for="add-rule-remark" class="form-control-label">备注:</label>
							<input type="text" class="form-control" id="add-rule-remark">
						</div>
					</form>

					<br>
					<p><strong>确认添加规则?</strong></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
					<button class="btn btn-danger btn-ok btn-confirm-add-rule" data-dismiss="modal">添加</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<table id="myBootstrapTable"></table>

</div>

<script type="text/javascript">
var enabledRulesId = [];

$(document).ready(function() {
	$('.form_datetime').datetimepicker({
		language:  'zh-CN',
		weekStart: 1,
		todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
		showMeridian: 1
	});

	$('#myBootstrapTable').bootstrapTable({
		toolbar: "#myBootstrapTableToolbar",

		height: getHeight(),

		uniqueId: "id",

		cache: false,

		search: true,
		showRefresh: true,
		showColumns: true,
		showToggle: true,
		showPaginationSwitch:true,
		showFooter: false,

		url: 'server/getComplianceRuleTableDataHandler.php',
		method: 'get',

		pagination: true,
		pageSize: 10,
		pageList: [10, 20, 50, 100, 200],
		//height: 500,

		clickToSelect: true,
		maintainSelected: true,

		rowStyle: myRowStyleFunction,

		detailView: true,
		detailFormatter: myDetailFormatterFunction,

		sortName: 'id',
		sortOrder: 'desc',

		columns: [
			{
				checkbox: true,
				field: "state",
			},
			{
				field: "id",
				title: "ID",
				switchable: false,
				align: 'center',
				sortable: true,
			},
			{
				field: "name",
				title: "名称",
				switchable: false,
				align: 'center',
				sortable: true,
				editable: {
					type:'text',
					title: 'Title',
					validate: function(v) {
						if (!v) return '输入内容不能为空！';
					}
				},
			},
			{
				field: "premise",
				title: "前提",
				align: 'center',
				editable: {
					type:'textarea',
					title: 'Title',
					validate: function(v) {
						if (!v) return '输入内容不能为空！';
					}
				},
			},
			{
				field: "conclusion",
				title: "结论",
				align: 'center',
				editable: {
					type:'textarea',
					title: 'Title',
					validate: function(v) {
						if (!v) return '输入内容不能为空！';
					}
				},
			},
			{
				field: "constraint",
				title: "约束",
				align: 'center',
				editable: {
					type:'textarea',
					title: 'Title',
					validate: function(v) {
						if (!v) return '输入内容不能为空！';
					}
				},
			},
			{
				field: "describe",
				title: "描述",
				align: 'center',
				editable: {
					type:'textarea',
					title: 'Title',
					validate: function(v) {
						if (!v) return '输入内容不能为空！';
					}
				},
			},
			{
				field: "remark",
				title: "备注",
				visible: false,
				align: 'center',
				editable: {
					type:'text',
					mode: 'inline',
					title: 'Title',
					validate: function(v) {
						if (!v) return '输入内容不能为空！';
					}
				},
			},
		],
		onEditableSave: function(field, row, oldValue, $el) {
			$('#myBootstrapTable').bootstrapTable("resetView");
			/*
			$.ajax({
				type: "post",
				url: "/Editable/Edit",
				data: row,
				dataType: 'JSON',
				success: function (data, status) {
					if (status == "success") {
						alert('提交数据成功');
					}
				},
				error: function () {
					alert('编辑失败');
				},
				complete: function () {

				}
			});
			*/
			// alert('Edit Complete!');
		},
	});

	$('.btn-toolbar-enable-rule').on('click', function(){
		var allSelections = $('#myBootstrapTable').bootstrapTable('getAllSelections');
		for (index in allSelections) {
			if(enabledRulesId.indexOf(allSelections[index]["id"]) == -1) {
				enabledRulesId.push(allSelections[index]["id"]);
			}
		}
		$('#myBootstrapTable').bootstrapTable('refreshOptions', {});
	});

	$('.btn-toolbar-disable-rule').on('click', function(){
		var allSelections = $('#myBootstrapTable').bootstrapTable('getAllSelections');
		for (index in allSelections) {
			var i = enabledRulesId.indexOf(allSelections[index]["id"]);
			if(i != -1) {
				enabledRulesId.splice(i,1);
			}
		}
		$('#myBootstrapTable').bootstrapTable('refreshOptions', {});
	});

	$('.btn-confirm-delete-rule').on('click', function(){
		var allSelections = $('#myBootstrapTable').bootstrapTable('getAllSelections');
		var removedRowsID = [];
		for (index in allSelections) {
			removedRowsID.push(allSelections[index]["id"]);
		}
		$('#myBootstrapTable').bootstrapTable('remove', {
			field: "id",
			values: removedRowsID
		});
	});

	$('.btn-confirm-add-rule').on('click', function(){
		var row = [];
		row.push({
			id: parseInt($('#add-rule-id').val()),
			name: $('#add-rule-name').val(),
			content: $('#add-rule-content').val(),
			describe: $('#add-rule-describe').val(),
			remark: $('#add-rule-remark').val()
		});
		$('#myBootstrapTable').bootstrapTable('append', row);

	});
});

function myRowStyleFunction(row, index) {
	var myRowStyleClasses = ['active', 'success', 'info', 'warning', 'danger'];
	if (enabledRulesId.indexOf(row["id"]) != -1) {
		return {
            classes: myRowStyleClasses[1]
        };
	} else {
    	return {
            classes: myRowStyleClasses[0]
        };
	}
}

function myDetailFormatterFunction(index, row) {
	var html = [];
	$.each(row, function (key, value) {
		html.push('<p><b>' + key + ':</b> ' + value + '</p>');
	});
	return html.join('');
}

function getHeight() {
	return $(window).height() - $('h3').outerHeight(true) - $('.navbar').outerHeight(true);
	//return 600;
}

$(".select-premise").on('changed.bs.select', function (e) {
	$("#select-premise-content").val($("#select-premise-content").val() + $('.select-premise').selectpicker('val'));
	//$(".select-premise").selectpicker('val', '');

	$('.premise-op-yu').prop('disabled', false);
	$('.premise-op-huo').prop('disabled', false);
	$('.premise-op-fei').prop('disabled', true);
	$('.premise-op-fenhao').prop('disabled', false);

	$('.select-premise').prop('disabled', true);
	$('.select-premise').selectpicker('refresh');
});

$(".select-conclusion").on('changed.bs.select', function (e) {
	$("#select-conclusion-content").val($("#select-conclusion-content").val() + $('.select-conclusion').selectpicker('val'));
	//$(".select-conclusion").selectpicker('val', '');
});

$(".select-constraint-premise").on('changed.bs.select', function (e) {
	$('.select-constraint-property').prop('disabled', false);
	//$('.select-constraint-property').find('[value=Mustard]').remove();
	$(".select-constraint-property-optgroup").empty();

	var premise = $('.select-constraint-premise').selectpicker('val');

	if ( premise == 'Update') {
		$(".select-constraint-property-optgroup").append("<option value='userID'>user ID (用户ID)</option>");
		$(".select-constraint-property-optgroup").append("<option value='time'>time (时间)</option>");
	} else if (premise == 'Approve') {
		$(".select-constraint-property-optgroup").append("<option value='userID'>user ID (用户ID)</option>");
		$(".select-constraint-property-optgroup").append("<option value='timerange'>time range (时间范围)</option>");
	} else if (premise == 'Card') {
		$(".select-constraint-property-optgroup").append("<option value='userID'>user ID (用户ID)</option>");
		$(".select-constraint-property-optgroup").append("<option value='equID'>equipment ID (设备ID)</option>");
		$(".select-constraint-property-optgroup").append("<option value='time'>time (时间)</option>");
		$(".select-constraint-property-optgroup").append("<option value='isValid'>valid (验证)</option>");
	} else if (premise == 'Login') {
		$(".select-constraint-property-optgroup").append("<option value='time'>time (时间)</option>");
		$(".select-constraint-property-optgroup").append("<option value='accIDSet'>accessed ID set (已认证ID集合)</option>");
	}

	$('.select-constraint-property').selectpicker('refresh');
});
$(".select-constraint-property").on('changed.bs.select', function (e) {
	$("#select-constraint-content").val($("#select-constraint-content").val() + $('.select-constraint-premise').selectpicker('val') + "." + $('.select-constraint-property').selectpicker('val'));
	//$('.select-constraint-premise').selectpicker('val', '');
	//$('.select-constraint-property').selectpicker('val', '');
});

$('.premise-op-fei').click(function(){
	$('.premise-op-yu').prop('disabled', true);
	$('.premise-op-huo').prop('disabled', true);
	$('.premise-op-fei').prop('disabled', true);
	$('.premise-op-fenhao').prop('disabled', true);

	$('.select-premise').prop('disabled', false);
	$('.select-premise').selectpicker('refresh');
});
$('.premise-op-yu').click(function(){
	$('.premise-op-yu').prop('disabled', true);
	$('.premise-op-huo').prop('disabled', true);
	$('.premise-op-fenhao').prop('disabled', true);
	$('.premise-op-fei').prop('disabled', false);


	$('.select-premise').prop('disabled', false);
	$('.select-premise').selectpicker('refresh');
});
$('.premise-op-huo').click(function(){
	$('.premise-op-yu').prop('disabled', true);
	$('.premise-op-huo').prop('disabled', true);
	$('.premise-op-fenhao').prop('disabled', true);
	$('.premise-op-fei').prop('disabled', false);


	$('.select-premise').prop('disabled', false);
	$('.select-premise').selectpicker('refresh');
});
$('.premise-op-fenhao').click(function(){
	$('.premise-op-yu').prop('disabled', true);
	$('.premise-op-huo').prop('disabled', true);
	$('.premise-op-fenhao').prop('disabled', true);
	$('.premise-op-fei').prop('disabled', false);


	$('.select-premise').prop('disabled', false);
	$('.select-premise').selectpicker('refresh');
});


</script>

<?php include('indexFooter.php');?>