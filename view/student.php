
<div class="container">
  <div class="table-responsive">
    <table class="main-table text-center table table-bordered">
      <thead>
        <tr>
          <ul class="list-group">
            <li class="list-group-item active">NOM : <?php echo $etudiant['stu_lastname'];?></li>
            <li class="list-group-item">Prénom : <?php echo $etudiant['stu_firstname'];?></li>
            <li class="list-group-item">Email : <?php echo $etudiant['stu_email'];?></li>
            <li class="list-group-item">Date de naissance : <?php echo $etudiant['stu_birthdate'];?></li>
            <li class="list-group-item">Age : <?php echo $result;?></li>
            <li class="list-group-item ">Ville : <?php echo $etudiant['cit_name'];?></li>
            <li class="list-group-item">Sympathie : <?php echo $etudiant['stu_friendliness'];?></li>
            <li class="list-group-item">nom de Session : <?php echo $etudiant['loc_name'];?></li>
            <li class="list-group-item">Numéro de session : <?php echo $etudiant['ses_number'];?></li>
            <li class="list-group-item"><a href="edit.php?id=<?php echo $studentId ?>" class="btn btn-success">Edit </a></li>
          </ul>

        </tr>
      </thead>
    </table>
  </div>
</div>
