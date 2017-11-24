
<!--
<div id="studentContent"></div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script type="text/javascript">
	$('#myForm').on('submit', function(e){
		// Annule le comportement par défaut
		e.preventDefault();
		alert('intercepted');
		// if($('#lname').val() == 0 || $('#fname').val() == 0) {

		//pour
		jQuery.ajax({
			url : 'http://localhost/18-Ajax01/exos/ajax/signup.php',
			method : 'POST',
			dataType: 'text',
			// data : 'lname=' + $('#lname').val() + '&fname=' + $('#fname').val()
			// 		 +'&email='+ $('#email').val() + '&password=' +$('#password').val()
			// 		 + '&passwordToto2=' + $('#password2').val(),
			data : 'id=<?php //echo $studentId ?>' // cette function utilise au lieu de les 3 lignes en hout
		}).done(function(response) {
        alert( "cool ça a marché" );
      }) -->


















<!-- <div class="container">
 	<div class="table-responsive">
	 	<table class="main-table text-center table table-bordered">
		 	<thead>
				<tr>
 	 				<ul class="list-group">
				 		<li class="list-group-item active">NOM : <?php echo $etudiant['stu_lastname'];?></li>
				 		<li class="list-group-item">Prénom : <?php  echo $etudiant['stu_firstname'];?></li>
				 		<li class="list-group-item">Email : <?php echo $etudiant['stu_email'];?></li>
				 		<li class="list-group-item">Date de naissance : <?php echo $etudiant['stu_birthdate'];?></li>
				 		<li class="list-group-item">Age : <?php echo $result or die();?></li>
				 		<li class="list-group-item ">Ville : <?php  echo $etudiant['cit_name'];?></li>
				 		<li class="list-group-item">Sympathie : <?php echo $etudiant['stu_friendliness'];?></li>
				 		<li class="list-group-item">nom de Session : <?php echo $etudiant['loc_name'];?></li>
				 		<li class="list-group-item">Numéro de session : <?php echo $etudiant['ses_number'];?></li>
				 		<li class="list-group-item"><a href="edit.php?id=<?php echo $studentId ?>" class="btn btn-success">Edit </a></li>
					</ul>
 				</tr>
 			</thead>
 		</table>
 	</div>
</div> -->
