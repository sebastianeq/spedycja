<?php
    $title = "Dodaj zlecenie";
    require_once('header.php');
    require_once('db_connect.php');

    if(isset($_POST['adr']) && isset($_POST['des']) && isset($_POST['cat']) && isset($_POST['dri'])){
      $today = date("Y-m-d");
      $query = $db -> prepare('INSERT INTO zlecenia VALUES (?,?,?,?,?,?,?)');
      $state = $query -> execute(['', $_POST['adr'], $_POST['cat'], $_POST['des'], $_POST['dri'], $today, '0']);
      if($state > 0){
        echo "<h6>Dodano zlecenie.</h6>";
      }
      else{
        echo "<h6>Dodanie zlecenia nie powiodło się.</h6>";
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
            <form action="order_add.php" method="POST">
              <div class="form-group">
                <input type="text" class="form-control form-control-user" name="adr" placeholder="Adres" required>
              </div>
              <div class="form-group">
                <input type="text" class="form-control form-control-user" name="des" placeholder="Opis zlecenia" required>
              </div>
              <div class="form-group">
                <select class="form-control form-control-user" name="cat" required>
                <?php
                  $query = $db -> prepare('SELECT * FROM kategorie');
                  $query -> execute();
                  foreach($query as $row){
                      echo "<option value=", $row['id_kategorii'] ,">", $row['nazwa'], "</option>";
                  }
                ?>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control form-control-user" name="dri" required>
                <?php
                  $query = $db -> prepare('SELECT * FROM kierowcy');
                  $query -> execute();
                  foreach($query as $row){
                      echo "<option value=", $row['id_kierowcy'] ,">", $row['imie'], " ", $row['nazwisko'], "</option>";
                  }
                ?>
                </select>
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-primary btn-user btn-block" value="Dodaj zlecenie do bazy" >
              </div>
            </form>
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