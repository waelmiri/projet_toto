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
      <td scope="col">controls</td>
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
        <td><a href="student.php".<?php $student[$value]['stu_id']?>.class="btn btn-success">edit</a></td>
        </tr>
        <?php endforeach; ?>
  </tbody>
</table>