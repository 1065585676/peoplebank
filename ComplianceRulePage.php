<?php include('indexHeader.php');?>

<?php include('header.php');?>

<script type="text/javascript">
	$('.compliance-rule-link').addClass('active');

	$('.file-select-link').removeClass('active');
	$('.conduct-rule-link').removeClass('active');
	$('.setting-link').removeClass('active');
</script>

<div style="width: 80%; margin: 0 auto" class="container">
	<div id="myAlertTop" class="alert alert-warning alert-dismissible hidden" role="alert">
		<button type="button" class="close" onclick="$('#myAlertTop').addClass('hidden');" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Warning!</strong> <span id="myAlertTopMsg">Better check yourself, you're not looking too good.</span>
	</div>

	<h3> 合规规则 </h3>
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
									<select class="selectpicker show-tick select-premise" data-live-search="true" title="输入前提">
										<optgroup label="前提">
											<option value="A">A (基本事件A)</option>
											<option value="B">B (可忽略事件B，以A为主)</option>
											<option value="C">C (特殊事件C)</option>
											<option value="D">D (紧急事件D)</option>
										</optgroup>
									</select>
								</div>
								<div class="btn-group mb-2">
									<button type="button" class="btn btn-secondary" onclick="$('#select-premise-content').val($('#select-premise-content').val() + ' && ');$('.select-premise').selectpicker('val', '');"> && </button>
									<button type="button" class="btn btn-secondary" onclick="$('#select-premise-content').val($('#select-premise-content').val() + ' || ');$('.select-premise').selectpicker('val', '');"> || </button>
									<button type="button" class="btn btn-secondary" onclick="$('#select-premise-content').val($('#select-premise-content').val() + ' !');$('.select-premise').selectpicker('val', '');"> ! </button>
									<button type="button" class="btn btn-secondary" onclick="$('#select-premise-content').val($('#select-premise-content').val() + ' ; ');$('.select-premise').selectpicker('val', '');"> ; </button>
								</div>
							</div>
							<textarea class="form-control" id="select-premise-content"></textarea>
						</div>
						<div class="form-group">
							<label for="add-rule-content" class="form-control-label">结论:</label>
							<div class="btn-toolbar mb-4">
								<div class="btn-group mb-2">
									<select class="selectpicker show-tick select-conclusion" data-live-search="true" title="输入结论">
										<optgroup label="结论">
											<option value="X">X (可靠结论X)</option>
											<option value="Y">Y (附属结论Y，以Y为主)</option>
											<option value="Z">Z (必须结论Z)</option>
										</optgroup>
									</select>
								</div>
								<div class="btn-group mb-2">
									<button type="button" class="btn btn-secondary" onclick="$('#select-conclusion-content').val($('#select-conclusion-content').val() + ' && ');$('.select-conclusion').selectpicker('val', '');"> && </button>
									<button type="button" class="btn btn-secondary" onclick="$('#select-conclusion-content').val($('#select-conclusion-content').val() + ' || ');$('.select-conclusion').selectpicker('val', '');"> || </button>
									<button type="button" class="btn btn-secondary" onclick="$('#select-conclusion-content').val($('#select-conclusion-content').val() + ' !');$('.select-conclusion').selectpicker('val', '');"> ! </button>
								</div>
							</div>
							<textarea class="form-control" id="select-conclusion-content"></textarea>
						</div>
						<div class="form-group">
							<label for="add-rule-content" class="form-control-label">约束:</label>
							<div class="btn-toolbar">
								<div class="btn-group">
									<select class="selectpicker show-tick select-constraint-premise" data-live-search="true" title="输入前提">
										<optgroup label="前提">
											<option value="A">A (基本事件A)</option>
											<option value="B">B (可忽略事件B，以A为主)</option>
											<option value="C">C (特殊事件C)</option>
											<option value="D">D (紧急事件D)</option>
										</optgroup>
									</select>
								</div>
								<div class="btn-group">
									<select class="selectpicker show-tick select-constraint-property" data-live-search="true" title="输入前提属性" disabled>
										<optgroup label="前提属性" class="select-constraint-property-optgroup">
											<option value="id">id (ID)</option>
											<option value="time">time (发生时间)</option>
											<option value="room">room (房间)</option>
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
							<label for="add-rule-describe" class="form-control-label">说明:</label>
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
	<hr>

	<h3> 操作 </h3><br>
	<div>
		<button class="btn btn-primary btn-analyse-rules-wyy" type="button" data-toggle="modal" data-target="#confirm-analysis-compliance-rule">规则分析</button>
		<button class="btn btn-success btn-mini-rules-wyy" type="button" data-toggle="modal" data-target="#confirm-mini-compliance-rule">规则挖掘</button>
	</div><br>

	<div id="confirm-analysis-compliance-rule" class="modal fade" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">规则分析</h4>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group">
							<label for="analysis-compliance-rule-filetype" class="form-control-label">文件类型</label>
							<div class="input-group">
								<select class="selectpicker show-tick" id="analysis-compliance-rule-filetype">
									<option>门禁</option>
									<option>操作</option>
									<option>系统</option>
									<option>其他</option>
								</select>
							</div>

						</div>
						<div class="form-group">
							<label for="dtp_analysis_startdatetime" class="form-control-label">开始时间</label>
							<div class="input-group date form_datetime" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_analysis_startdatetime">
								<input class="form-control" size="16" type="text" value="" readonly>
								<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
								<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
							</div>
							<input type="hidden" id="dtp_analysis_startdatetime" value="" />
						</div>
						<div class="form-group">
							<label for="dtp_analysis_enddatetime" class="form-control-label">结束时间</label>
							<div class="input-group date form_datetime" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_analysis_enddatetime">
								<input class="form-control" size="16" type="text" value="" readonly>
								<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
								<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
							</div>
							<input type="hidden" id="dtp_analysis_enddatetime" value="" />
						</div>
						<div class="form-group">
							<label for="mini_user_level" class="form-control-label">挖掘层级</label>
							<div class="input-group" id="mini_user_level">
								<select class="selectpicker show-tick" data-live-search="true" multiple data-selected-text-format="count > 2" data-actions-box="true" title="选择部门" data-header="选择部门">
									<option>部门-1</option>
									<option>部门-2</option>
									<option>部门-3</option>
								</select>
								<select class="selectpicker show-tick" data-live-search="true" multiple data-selected-text-format="count > 2" data-actions-box="true" title="选择用户组" data-header="选择用户组">
									<option>用户组-1</option>
									<option>用户组-2</option>
									<option>用户组-3</option>
									<option>用户组-4</option>
								</select>
								<select class="selectpicker show-tick" data-live-search="true" multiple data-selected-text-format="count > 2" data-actions-box="true" title="选择用户" data-header="选择用户">
									<option>张三</option>
									<option>李四</option>
									<option>王五</option>
									<option>田七</option>
								</select>
							</div>
						</div>
					</form>
					<br>
					<p><strong>确认进行规则分析?</strong></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default btn-cancel-analysis-compliance-rule" data-dismiss="modal">取消</button>
					<button class="btn btn-danger btn-ok btn-confirm-analysis-compliance-rule" data-dismiss="modal">分析</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<div id="confirm-mini-compliance-rule" class="modal fade" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">规则挖掘</h4>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group">
							<label for="mini-compliance-rule-filetype" class="form-control-label">文件类型</label>
							<div class="input-group">
								<select class="selectpicker show-tick" id="mini-compliance-rule-filetype">
									<option>门禁</option>
									<option>操作</option>
									<option>系统</option>
									<option>其他</option>
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
							<label for="mini_user_level" class="form-control-label">挖掘层级</label>
							<div class="input-group" id="mini_user_level">
								<select class="selectpicker show-tick" data-live-search="true" multiple data-selected-text-format="count > 2" data-actions-box="true" title="选择部门" data-header="选择部门">
									<option>部门-1</option>
									<option>部门-2</option>
									<option>部门-3</option>
								</select>
								<select class="selectpicker show-tick" data-live-search="true" multiple data-selected-text-format="count > 2" data-actions-box="true" title="选择用户组" data-header="选择用户组">
									<option>用户组-1</option>
									<option>用户组-2</option>
									<option>用户组-3</option>
									<option>用户组-4</option>
								</select>
								<select class="selectpicker show-tick" data-live-search="true" multiple data-selected-text-format="count > 2" data-actions-box="true" title="选择用户" data-header="选择用户">
									<option>张三</option>
									<option>李四</option>
									<option>王五</option>
									<option>田七</option>
									<option>张三</option>
									<option>李四</option>
									<option>王五</option>
									<option>田七</option>
									<option>张三</option>
									<option>李四</option>
									<option>王五</option>
									<option>田七</option>
									<option>张三</option>
									<option>李四</option>
									<option>王五</option>
									<option>田七</option>
									<option>张三</option>
									<option>李四</option>
									<option>王五</option>
									<option>田七</option>
									<option>张三</option>
									<option>李四</option>
									<option>王五</option>
									<option>田七</option>
									<option>张三</option>
									<option>李四</option>
									<option>王五</option>
									<option>田七</option>
								</select>
							</div>
						</div>
					</form>
					<br>
					<p><strong>确认进行规则挖掘?</strong></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default btn-cancel-mini-compliance-rule" data-dismiss="modal">取消</button>
					<button class="btn btn-danger btn-ok btn-confirm-mini-compliance-rule" data-dismiss="modal">挖掘</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<div class="progress myAnalysProgress hidden">
		<div class="progress-bar progress-bar-primary progress-bar-striped active" style="width: 60%; min-width: 2em;">
			<span>60%</span>
		</div>
	</div>
	<div class="progress myMiniProgress hidden">
		<div class="progress-bar progress-bar-success progress-bar-striped active" style="width: 90%; min-width: 2em;">
			<span>90%</span>
		</div>
	</div>
	<br>
	<div id="myAlertBottom" class="alert alert-warning alert-dismissible hidden" role="alert">
		<button type="button" class="close" onclick="$('#myAlertBottom').addClass('hidden');" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Warning!</strong> <span id="myAlertBottomMsg">Better check yourself, you're not looking too good.</span>
	</div>
	<hr>

	<div style="height: 700px"></div>
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
				field: "content",
				title: "内容",
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


	$('.btn-confirm-analysis-compliance-rule').on('click', function(){
		var analysisInfo = '<br>文件类型：' + $('#analysis-compliance-rule-filetype').val();
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

function getHeight() {
	return $(window).height() - $('h3').outerHeight(true) - $('.navbar').outerHeight(true);
	//return 600;
}

$(".select-premise").on('changed.bs.select', function (e) {
	$("#select-premise-content").val($("#select-premise-content").val() + $('.select-premise').selectpicker('val'));
	//$(".select-premise").selectpicker('val', '');
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

</script>

<?php include('indexFooter.php');?>