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

          <td><a href="student.php?id=<?php $value['stu_id']?>" class="btn btn-success btnStudentDetails" data-id="<?= $value['stu_id']?> ">Détail</a></td>
          <td><a href="list.php?de=<?php echo $value['stu_id']?>" class="btn btn-danger">Delete</a></td>
        </tr>
          <?php endforeach; ?>
      </tbody>
    </table>
    <script type="text/javascript">
      $('.btnStudentDetails').on('click' , function(e){
        e.preventDefault();
        console.log('click');
        var studentId = $(this).data('id'); // => attr data-id
        console.log(studentId);
        // TODO faire l'appel ajax
        jQuery.ajax({
          url : 'http://localhost/projet_toto/public/ajax/student.php',
          method : 'POST',
          dataType: 'text',
          data : {
            'id' : studentId
          }
          }).done(function(response) {
              alert( "cool ça a marché" );
              console.log(response);
              $('#popupStudent').html(response);
              $('#popupStudent').show();
              $('#close').on('click', function(){ // on doit envoyer close avec response pour transfere les information par response
                $('#popupStudent').hide();
              })
            })

        // puis remplir la div (#popupStudent)
        // puis afficher la div
      })

    </script>
  </div>

  <div id="popupStudent" style="display:none ;position:absolute;z-index:1000;left:50%;top:10%;
  margin-left:-200px;width:400px;border:1px solid black;padding:10px;background: white;">
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
