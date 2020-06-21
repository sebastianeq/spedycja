<?php
    $title = "Dodaj kategorię";
    require_once('header.php');
    require_once('db_connect.php');

    if(isset($_POST['category-name'])){
      $query = $db -> prepare('INSERT INTO kategorie VALUES (?,?)');
      $state = $query -> execute(['', $_POST['category-name']]);
      if($state > 0){
        echo "<h6>Dodano kategorię.</h6>";
      }
      else{
        echo "<h6>Dodanie kategorii nie powiodło się.</h6>";
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
            <form action="category_add.php" method="POST">
              <div class="form-group">
                <input type="text" class="form-control form-control-user" name="category-name" placeholder="Nazwa kategorii" required>
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-primary btn-user btn-block" value="Dodaj nową kategorię" >
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