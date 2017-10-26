<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">nom</th>
      <th scope="col">prénom</th>
      <th scope="col">email</th>
      <th scope="col">date de naissance</th>
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
        </tr>
        <?php endforeach; ?>
  </tbody>
</table>
