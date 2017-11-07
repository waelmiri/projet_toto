
	<div class="container">
		<div class="row">
			<div class="col-md-2 col-sm-2 col-xs-0"></div>
			<div class="col-md-8 col-sm-8 col-xs-12">
        <br><br><br><br>
				<div class="page-header">
		  			<h1>Upload d'un fichier <small>type csv de fichier</small></h1>
				</div>
			<!-- Si envoie de ficher => POST -->
				<form action="" method="post" name="post" enctype="multipart/form-data">
					<fieldset>
					<input type="hidden" name="submitFile" value="1" />
					<label for="fileForm">Fichier</label>
					<input type="file" name="fileForm" id="fileForm" />
					<p class="help-block">just le fichier de type CSV autorisées</p>
					<br />
					<input type="submit" name="upload" class="btn btn-success btn-block" value="Téléverser" />
					</fieldset>
				</form>
			</div>
			<div class="col-md-2 col-sm-2 col-xs-0"></div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-2 col-sm-2 col-xs-0"></div>
			<div class="col-md-8 col-sm-8 col-xs-12">
				<div class="page-header">
		  			<h1>Créer un fichier <small>de type CSV</small></h1>
				</div>
			<!-- Si envoie de ficher => POST -->
				<form action="" method="post" enctype="multipart/form-data">
					<fieldset>
					<input type="hidden" name="submitFile" value="1" />
					<p class="help-block">exporter juste CSV</p>
					<br />
					<input type="submit" name="export" class="btn btn-success btn-block" value="Téléverser" />
					</fieldset>
				</form>
			</div>
			<div class="col-md-2 col-sm-2 col-xs-0"></div>
		</div>
	</div>
