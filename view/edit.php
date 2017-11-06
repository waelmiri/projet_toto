<div class="form align-items-center">
<form action="" method="post">
    <h4 class="bg-primary text-white">MODIFIER UN ETUDIANT</h4>
    <div class="form-row">
      <div class="form-group col-md-3">
        <label for="lastname">NOM</label>
        <input type="text" class="form-control" id="lastname" placeholder="lastname" name="lastname" value="<?php echo $etudiant1['stu_lastname']; ?>">
      </div>
      <div class="form-group col-md-3">
        <label for="friendliness">Sympathie</label>
        <input type="text" class="form-control" id="friendliness" name="friendliness" placeholder="friendliness" value="<?php echo $etudiant1['stu_friendliness']; ?>">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-3">
        <label for="inputEmail4">Prénome</label>
        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="firstname" value="<?php echo $etudiant1['stu_firstname']; ?>">
      </div>
      <div class="form-group col-md-3">
        <label for="session">Session</label>
        <select class="form-control" placeholder="Choisissez" name="session" value="<?php echo $etudiant1['ses_name']; ?>">
          <?php foreach ($sessions as $key => $value ): ?>
            <option><?php echo $value['ses_id'];
             if($value['ses_id'] == $etudiant1['ses_id']){
                echo 'selected';
              }
              echo ' - session du '.$value['ses_start_date'].
            ' au '.$value['ses_end_date']; ?></option>
          <?php endforeach ?>
        </select>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-3">
        <label for="inputEmail4">Email</label>
        <input type="email" class="form-control" id="inputAddress" name="email" placeholder="Email" value="<?php  echo $etudiant1['stu_email']; ?>">
      </div>
      <div class="form-group col-md-3">
        <label for="city">Ville</label>
        <select class="form-control" id="city" placeholder="city" name="city">
        <?php foreach ($cities as $key => $value): ?>
          <option><?php echo $value['cit_id'];
          if($value['cit_id'] == $etudiant1['cit_id']){
             echo 'selected';
           }
            echo ' - '.$value['cit_name']; ?></option>
        <?php endforeach ?>
      </select>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-3">
        <label for="birthday">Date de naissance</label>
        <input type="date" class="form-control" id="birthday" name="birthday" placeholder="birthday" value="<?php echo $etudiant1['stu_birthdate']; ?>">
      </div>
    </div>
    <button type="submit" class="btn btn-outline-success btn-lg btn-block">Enregistrer</button>

</form>
</div>
