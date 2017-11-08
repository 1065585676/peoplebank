<?php include('indexHeader.php');?>

<?php include('header.php');?>
<script type="text/javascript">
	$('.file-select-link').addClass('active');

	$('.analyse-rule-link').removeClass('active');
	$('.conduct-rule-link').removeClass('active');
	$('.compliance-rule-link').removeClass('active');
	$('.setting-link').removeClass('active');
</script>

<div style="width: 80%; margin: 0 auto">
	<div id="myAlert" class="alert alert-warning alert-dismissible hidden" role="alert">
		<button type="button" class="close" onclick="$('#myAlert').addClass('hidden');" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Warning!</strong> <span id="alertMsg">Better check yourself, you're not looking too good.</span>
	</div>

	<h3>文件上传</h3>
	<div>
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#localFiles" aria-controls="ftpFiles" role="tab" data-toggle="tab">本地上传</a></li>
			<li role="presentation"><a href="#ftpFiles" aria-controls="ftpFiles" role="tab" data-toggle="tab"> FTP 上传</a></li>
			<li role="presentation"><a href="#ftpFiles" aria-controls="ftpFiles" role="tab" data-toggle="tab"> Web Service</a></li>
		</ul>
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane fade in active" id="localFiles">
				<br>
				<div class="input-group">
					<input id="localUpload" type="file" class="file-loading" name="localFilesUpload[]"  multiple />
					<span class="input-group-btn"></span>
					<span class="input-group-btn" style="vertical-align: bottom;">
						<button class="btn btn-primary btn-switch-preview" type="button">关闭预览</button>
					</span>
				</div>
				<br>
				<div class="radio-group" id="uploadFileType">
					<label class="btn btn-primary">
						<input type="radio" name="types" value="T1" checked="checked"> 门禁
					</label>
					<label class="btn btn-primary">
						<input type="radio" name="types" value="T2"> 操作
					</label>
					<label class="btn btn-primary">
						<input type="radio" name="types" value="T3"> 系统
					</label>
					<label class="btn btn-primary">
						<input type="radio" name="types" value="T4"> 其他
					</label>
				</div><!-- /input-group -->
			</div>
			<div role="tabpanel" class="tab-pane fade" id="ftpFiles">
				<br>
				<div class="row">
					<div class="col-lg-6">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="FTP 文件地址">
							<span class="input-group-btn">
								<button class="btn btn-default" type="button"><i class="glyphicon glyphicon-circle-arrow-up"></i> 上传 </button>
							</span>
						</div><!-- /input-group -->
					</div><!-- /.col-lg-6 -->
				</div><!-- /.row -->
			</div>
		</div>
	</div>
	<hr>
</div>


<script type="text/javascript">
$(document).ready(function() {
	$('#localUpload').fileinput({
		uploadUrl: "server/localFilesUploadHandler.php",
		showPreview: true,
		language: "zh",
		//maxFileCount: 3,
		//msgFilesTooMany: "选择的文件个数太多 ({n})，最多选择 {m} 个!",
		//uploadExtraData: { filetype: $('#uploadFileType input:radio:checked').val() }
		uploadExtraData: function() {
			//return { filetype: Math.random()*10+1 }
			return { filetype: $('#uploadFileType input:radio:checked').val() }
		}
	});

	$('.btn-switch-preview').on('click', function(){
    	if($('#localUpload').data('fileinput')['showPreview']) {
    		$('#localUpload').fileinput('refresh', { showPreview: false });
    		$('.btn-switch-preview').html('开启预览');
    	} else {
    		$('#localUpload').fileinput('refresh', { showPreview: true });
    		$('.btn-switch-preview').html('关闭预览');
    	}
    });
});
</script>

<!-- <?php include('footer.php');?> -->

<?php include('indexFooter.php');?>

