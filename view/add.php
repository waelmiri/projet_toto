<form action="" method="post">
  <h4 class="bg-primary text-white">AJOUTER UN ETUDIANT</h4>
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputEmail4">NOM</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="lastname" name="lastname" value="<?php $lastname; ?>">
    </div>
    <div class="form-group col-md-3">
      <label for="inputPassword4">Sympathie</label>
      <input type="password" class="form-control" id="inputPassword4" name="friendliness" placeholder="friendliness" value="<?php $friendliness; ?>">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputEmail4">Prénome</label>
      <input type="text" class="form-control" id="inputAddress" name="firstname" placeholder="firstname" value="<?php $firstname; ?>">
    </div>
    <div class="form-group col-md-3">
      <label for="inputPassword4">Session</label>
      <select class="form-control" placeholder="Choisissez" name="session" value="<?php $session; ?>">
        <?php foreach ($sessions as $key => $value): ?>
          <option><?php echo $value['ses_id'].' - session du'.$value['ses_start_date'].
          ' au '.$value['ses_end_date']; ?></option>
        <?php endforeach ?>
      </select>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputEmail4">Email</label>
      <input type="text" class="form-control" id="inputAddress" name="eamil" placeholder="eamil" value="<?php $email; ?>">
    </div>
    <div class="form-group col-md-3">
      <label for="inputPassword4">Ville</label>
      <select class="form-control" id="inputAddress" placeholder="city" name="city" value="<?php $city; ?>">
      <?php foreach ($cities as $key => $value): ?>
        <option><?php echo $value['cit_id'].' - '.$value['cit_name']; ?></option>
      <?php endforeach ?>
    </select>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputEmail4">Date de naissance</label>
      <input type="text" class="form-control" id="inputAddress" name="birthday" placeholder="birthday" value="<?php $birthday; ?>">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Sign in</button>
</form>
