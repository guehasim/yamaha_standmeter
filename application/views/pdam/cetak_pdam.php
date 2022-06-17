<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<style type="text/css">
h3{
    font-family: 'arial';
    font-size: 18px;
  }

  table{
    font-family: 'arial';
    font-size: 11px;
  }
</style>
<head>
  <meta charset="utf-8">
  <title>Stand Meter</title>
</head>
<body><center>
  <h3>Stand Meter PDAM</h3>
  <table border="1" cellspacing="0" cellpadding="5" width="100%">
    <thead>
      <tr>
        <th><center>No.</center></th>
        <th><center>Tanggal</center></th>
        <th><center>Penginput</center></th>
        <th><center>USAGE (M3)</center></th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no=0;
      foreach ($pdam as $data) {
        $no++;
        echo "<tr>";
          echo "<td><center>".$no."</center></td>";
          echo "<td><center>".date('d M y', strtotime($data->tgl_pdam))."</center></td>";
          echo "<td><center>".$data->nama."</center></td>";
          echo "<td><center>".$data->penggunaan."</center></td>";
        echo "</tr>";
      }
      ?>
    </tbody>
  </table>
</body>
</html>