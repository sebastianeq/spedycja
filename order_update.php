<?php
    $title = "Edytuj zlecenie";
    require_once('header.php');
    require_once('db_connect.php');

    if(isset($_POST['order-id']) && isset($_POST['address']) && isset($_POST['description']) && isset($_POST['category-id']) && isset($_POST['driver-id'])){
      $today = date("Y-m-d");
      $query = $db -> prepare('UPDATE zlecenia SET adres = ?, kategoria_id = ?, opis = ?, kierowca_id = ? WHERE id_zlecenia = ?');
      $state = $query -> execute([$_POST['address'], $_POST['category-id'], $_POST['description'], $_POST['driver-id'], $_POST['order-id']]);
      if($state > 0){
        header("Location: index.php");
      }
    }

?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <div class="row">

    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-12">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h4 class="m-0 font-weight-bold text-primary"><?php if(isset($title)) echo $title; ?></h4>
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <div class="chart-area">
          <?php
            if(isset($_POST['order-id'])){
              $query = $db -> prepare('SELECT * FROM zlecenia LEFT JOIN kategorie ON zlecenia.kategoria_id = kategorie.id_kategorii LEFT JOIN kierowcy ON zlecenia.kierowca_id = kierowcy.id_kierowcy WHERE id_zlecenia = ?');
              $query -> execute([$_POST['order-id']]);
              $row = $query -> fetch();
          ?>
            <form action="order_update.php" method="POST">
              <input type="hidden" name="order-id" value="<?php echo $_POST['order-id'] ?>" required>
              <div class="form-group">
                <input type="text" class="form-control form-control-user" name="address" value="<?php echo $row['adres'] ?>" required>
              </div>
              <div class="form-group">
                <input type="text" class="form-control form-control-user" name="description" value="<?php echo $row['opis'] ?>" required>
              </div>
              <div class="form-group">
                <select class="form-control form-control-user" name="category-id" required>
                <option value="<?php echo $row['kategoria_id'] ?>"><?php echo $row['nazwa'] ?></option>
                <?php
                  $query1 = $db -> prepare('SELECT * FROM kategorie');
                  $query1 -> execute();
                  foreach($query1 as $row1){
                      echo "<option value=", $row1['id_kategorii'] ,">", $row1['nazwa'], "</option>";
                  }
                ?>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control form-control-user" name="driver-id" required>
                <option value="<?php echo $row['kierowca_id'] ?>"><?php echo $row['imie'], " ", $row['nazwisko'] ?></option>
                <?php
                  $query1 = $db -> prepare('SELECT * FROM kierowcy');
                  $query1 -> execute();
                  foreach($query1 as $row1){
                      echo "<option value=", $row1['id_kierowcy'] ,">", $row1['imie'], " ", $row1['nazwisko'], "</option>";
                  }
                ?>
                </select>
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-primary btn-user btn-block" value="Zatwierdź zmiany" >
              </div>
            </form>
            <?php
              }
              else{
                echo "<h5>Błędny identyfikator zlecenia!</h5>";
              }
            ?>
          </div>
        </div>
      </div>
    </div>
  
  </div>

</div>
<!-- /.container-fluid --> 
<?php
    require_once('footer.php');
?>