<div class="container">
  <div class="table-responsive">
    <table class="main-table text-center table table-bordered">
      <thead>
        <tr>
          <td scope="col">id</td>
          <td scope="col">nom</td>
          <td scope="col">prénom</td>
          <td scope="col">email</td>
          <td scope="col">date de naissance</td>
          <td scope="col">Détails</td>
          <td scope="col">Delete</td>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($student as $key => $value) :?>
        <tr>
          <th scope="row"><?php echo $value['stu_id'] ?></th>
          <td><?php echo $value['stu_lastname']?></td>
          <td><?php echo $value['stu_firstname'];?></td>
          <td><?php echo $value['stu_email']?></td>
          <td><?php echo $value['stu_birthdate']?></td>

          <td><a href="student.php?id=<?php echo $value['stu_id']?>" class="btn btn-success">Détail</a></td>
          <td><a href="list.php?de=<?php echo $value['stu_id']?>" class="btn btn-danger">Delete</a></td>
        </tr>
          <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <div class="row">
    <div class="col-md-10">
      <a href="#" class="btn btn-primary btn-sm active" role="button">Précédent</a>
    </div>
    <div class="col-md-2">
      <a href="#" class="btn btn-primary btn-sm active" role="button" >Suivant</a>
    </div>
  </div>
</div>
