<div class="container">

  <?php foreach ($training as $key => $value) : ?>
  <div class="card mx-auto mt-5">
    <div class="card-bloc">
      <div class="card-header text-center bg-primary text-white">
        <h3><?php echo $value['tra_name']; ?></h3>
      </div>
      <?php $sql = " SELECT ses_id, ses_number, ses_start_date, ses_end_date, tra_name
              FROM session
              INNER JOIN training ON training.tra_id = session.training_tra_id
              WHERE tra_name LIKE '{$value['tra_name']}'";
      $pdoStatement = $pdo->prepare($sql);

      if ($pdoStatement->execute() === false) {
        print_r($pdoStatement->errorInfo());
        exit;
      }
      $menu =$pdoStatement->fetchAll(PDO::FETCH_ASSOC);
      ?>
      <table class="table text-center">
        <thead>
          <tr>
              <td scope="col">SESSION</td>
              <td scope="col">DEDUT</td>
              <td scope="col">FIN</td>
              <td scope="col">VOIR DETAILS</td>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($session as $key => $value): ?>
          <tr>
            <td>Session n<?php echo $value['ses_number']; ?></td>
            <td><?php echo $value['ses_start_date']; ?></td>
            <td><?php echo $value['ses_end_date']; ?></td>
            <td><a href="list.php?id=<?php echo $value['ses_id']?>" class="btn btn-success">détails</a></td>
          </tr>
        <?php endforeach ; ?>
        </tbody>
      </table>
    </div>
  </div>
<?php endforeach ; ?>
</div>
<div class="container">
  <div class="card mx-auto mt-5">
    <div class="card-bloc">
      <div class="card-header text-center bg-primary text-white">
        <table class="table text-center">
          <thead>
            <h3>THE NUMBER OF THE STUDENTS IN THE CITY</h3>
            <tr>
              <td scope="col">CITY</td>
              <td scope="col">NOMBER </td>
            </tr>
          </thead>
          <tbody>

            <?php foreach ($count as $key=>$value): ?>
            <tr>
              <td><?php echo $value['cit_name'] ?></td>
              <td><?php echo $value['nb'] ; ?></td>
            </tr>
          <?php endforeach ; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php
require_once __DIR__.'/header.php';
require_once __DIR__.'/../public/index.php';
require_once __DIR__.'/footer.php';

?>




<!-- CDN : jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- CDN : script bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <!-- CDN JQuery UI -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>

    <script src="js/script.js"></script>
