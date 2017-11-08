<?php include('indexHeader.php');?>

<?php include('header.php');?>

<script type="text/javascript">
	$('.analyse-rule-link').addClass('active');

	$('.compliance-rule-link').removeClass('active');
	$('.file-select-link').removeClass('active');
	$('.conduct-rule-link').removeClass('active');
	$('.setting-link').removeClass('active');
</script>

<div style="width: 80%; margin: 0 auto" class="container">
	<div id="myAlertTop" class="alert alert-warning alert-dismissible hidden" role="alert">
		<button type="button" class="close" onclick="$('#myAlertTop').addClass('hidden');" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Warning!</strong> <span id="myAlertTopMsg">Better check yourself, you're not looking too good.</span>
	</div>

	<h3> 违规检测 </h3>
	<table>
		<tr style="height: 70px; width: 100%">
			<td>
				<label for="analysis-compliance-rule-filetype" class="form-control-label">文件类型</label><br>
				<select class="selectpicker show-tick" id="analysis-compliance-rule-filetype">
				<option>所有</option>
				<option>门禁</option>
				<option>操作日志</option>
				<option>系统</option>
				<option>其他</option>
				</select>
			</td>
			<td>
				<label for="analysis-compliance-rule-ruletype" class="form-control-label">规则类型</label><br>
				<select class="selectpicker show-tick" id="analysis-compliance-rule-ruletype">
				<option>所有</option>
				<option>操作频繁集合</option>
				<option>操作频繁序列模式</option>
				<option>操作关联关系</option>
				<option>操作稀有集合</option>
				<option>操作稀有序列模式</option>
				</select>
			</td>
		</tr>
		<tr style="height: 70px;">
			<td>
				<label for="dtp_analysis_startdatetime" class="form-control-label">开始时间</label>
				<div style="width: 220px"  class="input-group date form_datetime" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_analysis_startdatetime">
				<input id="dtp_analysis_startdatetime" class="form-control" size="136" type="text" value="" readonly>
				<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
				<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
				</div>
			</td>
			<td>
				<label for="dtp_analysis_enddatetime" class="form-control-label">结束时间</label>
				<div style="width: 220px" class="input-group date form_datetime" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_analysis_enddatetime">
				<input id="dtp_analysis_enddatetime" class="form-control" size="16" type="text" value="" readonly>
				<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
				<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
				</div>
			</td>
		</tr>
		<tr style="height: 70px;">
			<td style="width: 30%">
				<label for="mini_user_level" class="form-control-label">人员范围：部门</label><br>
				<select class="selectpicker show-tick" data-live-search="true" multiple data-selected-text-format="count > 2" data-actions-box="true" title="选择部门" data-header="选择部门">
				<option>运维一部</option>
				<option>运维二部</option>
				<option>开发一部</option>
				<option>数据中心</option>
				</select>
			</td>
			<td style="width: 30%">
				<label for="mini_user_level" class="form-control-label">人员范围：组</label><br>
				<select class="selectpicker show-tick" data-live-search="true" multiple data-selected-text-format="count > 2" data-actions-box="true" title="选择用户组" data-header="选择用户组">

				</select>
			</td>
			<td style="width: 30%">
				<label for="mini_user_level" class="form-control-label">人员范围：人员</label><br>
				<select class="selectpicker show-tick" data-live-search="true" multiple data-selected-text-format="count > 2" data-actions-box="true" title="选择用户" data-header="选择用户">
				<option>李克林</option>
				<option>李丽多</option>
				<option>马凯</option>
				<option>秦丽</option>
				<option>张澜</option>
				<option>张云龙</option>
				</select>
			</td>
		</tr>
	</table>
	<hr>
	<div id="myBootstrapTableToolbar">
		<button type="button" class="btn btn-default btn-cancel-analysis-compliance-rule" data-dismiss="modal">取消检测</button>
		<button class="btn btn-danger btn-ok btn-confirm-analysis-compliance-rule" data-dismiss="modal">违规检测</button>
	</div>
	<div class="progress myAnalysProgress hidden">
		<div class="progress-bar progress-bar-primary progress-bar-striped active" style="width: 60%; min-width: 2em;">
			<span>违规检测：60%</span>
		</div>
	</div>
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
		showMeridian: 1,
		pickerPosition: "bottom-left"
	});

	$('#myBootstrapTable').bootstrapTable({
		toolbar: "#myBootstrapTableToolbar",

		//height: getHeight(),

		uniqueId: "id",

		cache: false,

		search: true,
		showRefresh: true,
		showColumns: true,
		showToggle: true,
		showPaginationSwitch:true,
		showFooter: false,

		url: 'server/getAnalyseRuleTableDataHandler.php',
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

		//sortName: 'id',
		//sortOrder: 'desc',

		columns: [
			{
				field: "timestamp",
				title: "时间",
				switchable: false,
				align: 'center',
				sortable: true,
			},
			{
				field: "operator",
				title: "操作者",
				switchable: false,
				align: 'center',
				sortable: true,
			},
			{
				field: "id",
				title: "ID",
				switchable: false,
				align: 'center',
				sortable: true,
			},
			{
				field: "partGroup",
				title: "部门 / 组",
				align: 'center',
			},
			{
				field: "content",
				title: "违规类型",
				align: 'center',
			},
			{
				field: "rule",
				title: "违反规则",
				align: 'center',
				formatter: ruleDetailFormatter
			},
			{
				field: "level",
				title: "报警级别",
				visible: false,
				align: 'center',
				sortable: true,
			},
			{
				field: "remark",
				title: "违规详情",
				//visible: false,
				align: 'center',
				editable: {
					type:'text',
					mode: 'inline',
					title: 'Title',
					validate: function(v) {
						if (!v) return '输入内容不能为空！';
					}
				}
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

	$('.btn-confirm-analysis-compliance-rule').on('click', function(){
		var analysisInfo = '<br>文件类型：' + $('#analysis-compliance-rule-filetype').val();
		analysisInfo += '<br>规则类型：' + $('#analysis-compliance-rule-ruletype').val();
		analysisInfo += '<br>开始时间：' + $('#dtp_analysis_startdatetime').val();
		analysisInfo += '<br>结束时间：' + $('#dtp_analysis_enddatetime').val();

		$("#myAlertBottomMsg").html(analysisInfo);
		$("#myAlertBottom").removeClass('hidden');

		$('.myAnalysProgress').removeClass('hidden');
	});
	$('.btn-cancel-analysis-compliance-rule').on('click', function(){
		//$("#myAlertBottomMsg").html("You Click Analyse Button!");
		//$("#myAlertBottom").removeClass('hidden');

		$('.myAnalysProgress').addClass('hidden');
	});

	$('.btn-confirm-mini-compliance-rule').on('click', function(){
		var miniInfo = '<br>文件类型：' + $('#mini-compliance-rule-filetype').val();
		miniInfo += '<br>开始时间：' + $('#dtp_mini_startdatetime').val();
		miniInfo += '<br>结束时间：' + $('#dtp_mini_enddatetime').val();

		$("#myAlertBottomMsg").html(miniInfo);
		$("#myAlertBottom").removeClass('hidden');

		$('.myMiniProgress').removeClass('hidden');
	});
	$('.btn-cancel-mini-compliance-rule').on('click', function(){
		//$("#myAlertBottomMsg").html("You Click Mini Button!");
		//$("#myAlertBottom").removeClass('hidden');

		$('.myMiniProgress').addClass('hidden');
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

function ruleDetailFormatter(value, row, index) {
	return '<a href="#">' + value + '</a>';
}

function getHeight() {
	//return $(window).height() - $('h3').outerHeight(true) - $('.navbar').outerHeight(true);
	return 1600;
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
	if ( premise == 'A') {
		$(".select-constraint-property-optgroup").append("<option value='AP-1'>AP-1 (A's property 1)</option>");
		$(".select-constraint-property-optgroup").append("<option value='AP-2'>AP-2 (A's property 2)</option>");
		$(".select-constraint-property-optgroup").append("<option value='AP-3'>AP-3 (A's property 3)</option>");
	} else if (premise == 'B') {
		$(".select-constraint-property-optgroup").append("<option value='BP-1'>BP-1 (B's property 1)</option>");
		$(".select-constraint-property-optgroup").append("<option value='BP-2'>BP-2 (B's property 2)</option>");
	} else {
		$(".select-constraint-property-optgroup").append("<option value='CP-1'>CP-1 (Common's property 1)</option>");
		$(".select-constraint-property-optgroup").append("<option value='CP-2'>CP-2 (Common's property 2)</option>");
		$(".select-constraint-property-optgroup").append("<option value='CP-3'>CP-3 (Common's property 3)</option>");
		$(".select-constraint-property-optgroup").append("<option value='CP-4'>CP-4 (Common's property 4)</option>");
		$(".select-constraint-property-optgroup").append("<option value='CP-5'>CP-5 (Common's property 5)</option>");
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