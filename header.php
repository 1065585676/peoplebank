<nav class="navbar navbar-default">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<strong>
				<a class="navbar-brand" href="http://www.pbc.gov.cn/" target="_blank"> 违规行为检查管理平台 </a>
			</strong>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li class="file-select-link"><a href="FileUploadPage.php">文件上传</a></li>
				<li class="compliance-rule-link"><a href="ComplianceRulePage.php" onclick="switchHeaderClickContent('compliance-rule-link')">合规规则配置</a></li>
				<li class="conduct-rule-link"><a href="ConductRulePage.php" onclick="switchHeaderClickContent('conduct-rule-link')">行为规则挖掘</a></li>
				<li class="analyse-rule-link"><a href="AnalyseRulePage.php" onclick="switchHeaderClickContent('analyse-rule-link')">违规检测</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">其他 <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="#">Action</a></li>
						<li><a href="#">Another action</a></li>
						<li><a href="#">Something else here</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="#">Separated link</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="#">One more separated link</a></li>
					</ul>
				</li>
			</ul>
			<form class="navbar-form navbar-left">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="输入内容">
				</div>
				<button type="submit" class="btn btn-default">搜索</button>
			</form>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#">退出</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">管理员<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="#">用户组：管理员</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="#">帮助</a></li>
						<li><a href="#">账户协助</a></li>
					</ul>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>
