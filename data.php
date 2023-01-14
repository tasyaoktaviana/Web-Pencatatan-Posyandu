<?php
require_once("config.php");
// echo "HALLO";
$searching = $_GET["search"];

$searchingrgx = "/($searching)/i";

$sql = "SELECT * FROM bayi";
$result = $conn->query($sql);
$a=[];
while($row = $result->fetch_assoc()) {
    if (strlen($searching) > 0) {    
        if (preg_match($searchingrgx, $row["nama_bayi"])) {
          echo "
          <div class='card-body'>
          <a href='Forminputdata.html' class='btn' style='background-color:#55e0ff ;'>
              <img src=' https://cdn-icons-png.flaticon.com/128/6822/6822288.png' 
                  alt='' width='36' height='30' class='d-inline-block align-text-top'>
              Tambah Data</a>
          <a href='forminputpos.html' class='btn' style='background-color:#55e0ff ;'>
              <img src=' https://cdn-icons-png.flaticon.com/128/6822/6822288.png' 
                  alt='' width='36' height='30' class='d-inline-block align-text-top'>
              Tambah POS</a>
          <table class='table table-bordered border-dark text-black text-center' style='background-color:#b9efff ;' id = 'main-content'>
              <tr> 
                  <th>ID Bayi</th>
                  <th>Nama Ayah</th>
                  <th>Nama Ibu</th>
                  <th>Nama Bayi</th>
                  <th>Tempat Lahir</th>
                  <th>Tanggal Lahir</th>
                  <th>Alamat</th>
              </tr>
              <tr>
              <td> <?php echo $data['id_bayi']; ?> </td>
              <td> <?php echo $data['nama_ayah']; ?> </td>
              <td> <?php echo $data['nama_ibu']; ?> </td>
              <td> <?php echo $data['nama_bayi']; ?> </td>
              <td> <?php echo $data['tempat_lahir']; ?> </td>
              <td> <?php echo $data['tanggal_lahir']; ?> </td>
              <td> <?php echo $data['alamat']; ?> </td>
              <td>
                  <a href="edit_univ.php?idfakultas=<?php echo $data['idfakultas']; ?>" class="btn btn-sm btn-warning">Edit</a>
                  <a href="delete.php?idfakultas=<?php echo $data['idfakultas']; ?>" class="btn btn-sm btn-danger">Hapus</a>
              </td>
          </tr>
          </table>
      </div>
      ";
    }
    array_push($a,preg_match($searchingrgx, $row["title"]));
}        
  else {
    echo "
    <div class='card-body'>
    <a href='Forminputdata.html' class='btn' style='background-color:#55e0ff ;'>
        <img src=' https://cdn-icons-png.flaticon.com/128/6822/6822288.png' 
            alt='' width='36' height='30' class='d-inline-block align-text-top'>
        Tambah Data</a>
    <a href='forminputpos.html' class='btn' style='background-color:#55e0ff ;'>
        <img src=' https://cdn-icons-png.flaticon.com/128/6822/6822288.png' 
            alt='' width='36' height='30' class='d-inline-block align-text-top'>
        Tambah POS</a>
    <table class='table table-bordered border-dark text-black text-center' style='background-color:#b9efff ;' id = 'main-content'>
        <tr> 
            <th>ID Bayi</th>
            <th>Nama Ayah</th>
            <th>Nama Ibu</th>
            <th>Nama Bayi</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
        </tr>
        <tr>
        <td> <?php echo $data['id_bayi']; ?> </td>
        <td> <?php echo $data['nama_ayah']; ?> </td>
        <td> <?php echo $data['nama_ibu']; ?> </td>
        <td> <?php echo $data['nama_bayi']; ?> </td>
        <td> <?php echo $data['tempat_lahir']; ?> </td>
        <td> <?php echo $data['tanggal_lahir']; ?> </td>
        <td> <?php echo $data['alamat']; ?> </td>
        <td>
            <a href="edit_univ.php?idfakultas=<?php echo $data['idfakultas']; ?>" class="btn btn-sm btn-warning">Edit</a>
            <a href="delete.php?idfakultas=<?php echo $data['idfakultas']; ?>" class="btn btn-sm btn-danger">Hapus</a>
        </td>
    </tr>
    </table>
</div>       
    ";
  }
};
if (count(array_unique($a)) === 1) {
  echo "
      <div id='Label'>
          <h3 style='color: aliceblue; '>Tidak ada data untuk pencarian anda, silahkan mencari keyword lain</h3>
      </div>
  "; 
}
  
