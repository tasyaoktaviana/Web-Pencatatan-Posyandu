<?php
require_once("koneksi.php");

$no = 1;
$searching = $_GET["search"];
$besar = "besar";
$kecil = "kecil";

if($searching == $kecil){
    $sql = "SELECT * FROM bayi ORDER BY nama_bayi ASC"; 
}
if($searching == $besar){
    $sql = "SELECT * FROM bayi ORDER BY nama_bayi DESC"; 
}
if(empty($searching)){
    $sql = "SELECT * FROM univ";
}
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    if($no == 1){
        echo "
                <tr>
                    <th>ID Fakultas</th>
                    <th>Fakultas</th>
                    <th>Animo</th>
                </tr>    
                <tr>
                    <td>$no</td>
                    <td>{$row["fakultas"]}</td>
                    <td>{$row["animo"]}</td>
                    <td>
                    <a href='edit_univ.php?idfakultas={$data['idfakultas']}' class='btn btn-sm btn-warning'>Edit</a>
                    <a href='delete.php?idfakultas={$data['idfakultas']}' class='btn btn-sm btn-danger'>Hapus</a>
                    </td>
                </tr>
           
       
          
            ";
        }else{
        echo "   
        <tr>
        <td>$no</td>
        <td>{$row["fakultas"]}</td>
        <td>{$row["animo"]}</td>
        <td>
        <a href='edit_univ.php?idfakultas={$data['idfakultas']}' class='btn btn-sm btn-warning'>Edit</a>
        <a href='delete.php?idfakultas={$data['idfakultas']}' class='btn btn-sm btn-danger'>Hapus</a>
        </td>
        </tr>
       
          
            ";
    }
    $no++;
}
    
