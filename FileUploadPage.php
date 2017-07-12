<?php include('indexHeader.php');?>

<?php include('header.php');?>
<script type="text/javascript">
	$('.file-select-link').addClass('active');

	$('.conduct-rule-link').removeClass('active');
	$('.compliance-rule-link').removeClass('active');
	$('.setting-link').removeClass('active');
</script>

<div style="width: 80%; margin: 0 auto">
	<div id="myAlert" class="alert alert-warning alert-dismissible" role="alert">
		<button type="button" class="close" onclick="$('#myAlert').addClass('hidden');" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Warning!</strong> <span id="alertMsg">Better check yourself, you're not looking too good.</span>
	</div>

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
</div>


<script type="text/javascript">
$(document).ready(function() {
	$('#localUpload').fileinput({
		uploadUrl: "server/localFilesUploadHandler.php",
		showPreview: false,
		//maxFileCount: 3,
		//msgFilesTooMany: "选择的文件个数太多 ({n})，最多选择 {m} 个!",
	});

	$('.btn-switch-preview').on('click', function(){
    	if($('#localUpload').data('fileinput')['showPreview']) {
    		$('#localUpload').fileinput('refresh', { showPreview: false });
    		$('.btn-switch-preview').html('Enable Preview').removeClass('btn-primary').addClass('btn-default');
    	} else {
    		$('#localUpload').fileinput('refresh', { showPreview: true });
    		$('.btn-switch-preview').html('Disable Preview').removeClass('btn-default').addClass('btn-primary');
    	}
    });
});
</script>

<!-- <?php include('footer.php');?> -->

<?php include('indexFooter.php');?>

