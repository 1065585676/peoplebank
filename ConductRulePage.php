<?php include('indexHeader.php');?>

<?php include('header.php');?>

<script type="text/javascript">
	$('.conduct-rule-link').addClass('active');

	$('.analyse-rule-link').removeClass('active');
	$('.file-select-link').removeClass('active');
	$('.compliance-rule-link').removeClass('active');
	$('.setting-link').removeClass('active');
</script>

<div style="width: 80%; margin: 0 auto" class="container">
	<div id="myAlertTop" class="alert alert-warning alert-dismissible hidden" role="alert">
		<button type="button" class="close" onclick="$('#myAlertTop').addClass('hidden');" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Warning!</strong> <span id="myAlertTopMsg">Better check yourself, you're not looking too good.</span>
	</div>

	<h3> 行为规则挖掘 </h3>
	<div class="progress myMiniProgress hidden">
		<div class="progress-bar progress-bar-success progress-bar-striped active myMiniProgressValue" style="width: 0%; min-width: 10em;">
			<span>规则挖掘：<label id="conductMiniProgressLabelValue">0</label>%</span>
		</div>
	</div>

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
		<button type="button" class="btn btn-info btn-mini-rules-wyy" data-toggle="modal" data-target="#confirm-mini-conduct-rule">
			<i class="glyphicon glyphicon-plus"></i> 规则挖掘
		</button>
		<div id="confirm-mini-conduct-rule" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">规则挖掘</h4>
					</div>
					<div class="modal-body">
						<form>
							<div class="form-group">
								<label for="mini-conduct-rule-filetype" class="form-control-label">文件类型</label>
								<div class="input-group">
									<select class="selectpicker show-tick" id="mini-conduct-rule-filetype" multiple>
										<option>门禁</option>
										<option>操作日志</option>
										<option>系统</option>
										<option>其他</option>
									</select>
								</div>

							</div>
							<div class="form-group">
								<label for="mini-conduct-rule-ruletype" class="form-control-label">挖掘规则类型</label>
								<div class="input-group">
									<select class="selectpicker show-tick" id="mini-conduct-rule-ruletype" multiple>
										<option>操作频繁集合</option>
										<option>操作频繁序列模式</option>
										<option>操作关联关系</option>
										<option>操作稀有集合</option>
										<option>操作稀有序列模式</option>
									</select>
								</div>

							</div>
							<div class="form-group">
								<label for="dtp_mini_startdatetime" class="form-control-label">开始时间</label>
								<div class="input-group date form_datetime" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_mini_startdatetime">
									<input class="form-control" size="16" type="text" value="" readonly>
									<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
									<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
								</div>
								<input type="hidden" id="dtp_mini_startdatetime" value="" />
							</div>
							<div class="form-group">
								<label for="dtp_mini_enddatetime" class="form-control-label">结束时间</label>
								<div class="input-group date form_datetime" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_mini_enddatetime">
									<input class="form-control" size="16" type="text" value="" readonly>
									<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
									<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
								</div>
								<input type="hidden" id="dtp_mini_enddatetime" value="" />
							</div>
							<div class="form-group">
								<label for="mini_user_level" class="form-control-label">人员范围</label>
								<div class="input-group" id="mini_user_level">
									<select class="selectpicker show-tick" data-live-search="true" multiple data-selected-text-format="count > 2" data-actions-box="true" title="选择部门" data-header="选择部门">
										<option>运维一部</option>
										<option>运维二部</option>
										<option>开发一部</option>
										<option>数据中心</option>
									</select>
									<select class="selectpicker show-tick" data-live-search="true" multiple data-selected-text-format="count > 2" data-actions-box="true" title="选择用户组" data-header="选择用户组">

									</select>
									<select class="selectpicker show-tick" data-live-search="true" multiple data-selected-text-format="count > 2" data-actions-box="true" title="选择用户" data-header="选择用户">
										<option>李克林</option>
										<option>李丽多</option>
										<option>马凯</option>
										<option>秦丽</option>
										<option>张澜</option>
										<option>张云龙</option>
									</select>
								</div>
							</div>
						</form>
						<br>
						<p><strong>确认进行规则挖掘?</strong></p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default btn-cancel-mini-conduct-rule" data-dismiss="modal">取消</button>
						<button class="btn btn-danger btn-ok btn-confirm-mini-conduct-rule" data-dismiss="modal">挖掘</button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

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

		url: 'server/getConductRuleTableDataHandler.php',
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
		//sortOrder: 'desc',

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
				field: "range",
				title: "人员范围",
				switchable: false,
				align: 'center',
				sortable: true
			},
			{
				field: "premise",
				title: "前提",
				align: 'center'
			},
			{
				field: "conclusion",
				title: "结论",
				align: 'center'
			},
			{
				field: "constraint",
				title: "约束",
				align: 'center'
			},
			{
				field: "describe",
				title: "描述",
				align: 'center',
				editable: {
					type:'textarea',
					title: 'Title'
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
						///if (!v) return '输入内容不能为空！';
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

	$('.btn-confirm-mini-conduct-rule').on('click', function(){
		var miniInfo = '<br>文件类型：' + $('#mini-conduct-rule-filetype').val();
		miniInfo += '<br>开始时间：' + $('#dtp_mini_startdatetime').val();
		miniInfo += '<br>结束时间：' + $('#dtp_mini_enddatetime').val();

		$("#myAlertBottomMsg").html(miniInfo);
		$("#myAlertBottom").removeClass('hidden');

		$('.myMiniProgress').removeClass('hidden');

		var num = 0;
		var num_max_count = parseInt(Math.random() * 5 + 5);
		var i = setInterval(function() {
            num++;
            var progressInt = parseInt(num / num_max_count * 100);
            if (progressInt > 100)
            	progressInt = 100;
            $('#conductMiniProgressLabelValue').html(progressInt) ;
            $('.myMiniProgressValue').css("width", progressInt.toString() + "%");
            if (num > num_max_count) {
            	clearInterval(i);
            	$('#conductMiniProgressLabelValue').html(100);
            	$('.myMiniProgressValue').css("width", "100%");
            	$('.myMiniProgress').addClass('hidden');
            	// change data
            	$('#myBootstrapTable').bootstrapTable('refresh', {
            		url: 'server/getConductRuleTableDataHandler.php?after=true'
            	});
            }

        }, 1000);

	});
	$('.btn-cancel-mini-conduct-rule').on('click', function(){
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

function getHeight() {
	return $(window).height() - $('h3').outerHeight(true) - $('.navbar').outerHeight(true);
	//return 600;
}

</script>

<?php include('indexFooter.php');?>