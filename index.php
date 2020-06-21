<?php
    $title = "Aktywne zlecenia";
    require_once('header.php');
    require_once('db_connect.php');
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
                $query = $db -> prepare('SELECT * FROM zlecenia LEFT JOIN kategorie ON zlecenia.kategoria_id = kategorie.id_kategorii LEFT JOIN kierowcy ON zlecenia.kierowca_id = kierowcy.id_kierowcy WHERE realizacja = ?');
                $query -> execute(['0']);
                echo "<table><tr><th>L.p.</th><th>Adres</th><th>Kategoria</th><th>Opis</th><th>Kierowca</th><th>Data</th><th></th><th></th><th></th></tr>";
                $lp = 1;
                foreach($query as $row){
                    echo "<tr><td>", $lp++, '</td><td><a href="https://www.google.pl/maps/search/', $row['adres'], '" target="_blank">', $row['adres'], "</a></td><td>", $row['nazwa'], "</td><td>", $row['opis'], "</td><td>", $row['imie'], " ", $row['nazwisko'], "</td><td>", $row['data'],
                    '</td><td><form action="order_delete.php" method="POST"><input type="hidden" name="order-id" value="',$row['id_zlecenia'],'"><input type="submit" value="Usuń"></form></td>',
                    '<td><form action="order_update.php" method="POST"><input type="hidden" name="order-id" value="',$row['id_zlecenia'],'"><input type="submit" value="Edytuj"></form></td>',
                    '<td><form action="order_archive.php" method="POST"><input type="hidden" name="order-id" value="',$row['id_zlecenia'],'"><input type="submit" value="Archiwizuj"></form></td></tr>';
                }
                echo "</table>";
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