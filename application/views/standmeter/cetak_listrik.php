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
<body>
  <h3><center>Stand Meter Listrik</center></h3>
  <table border="1" cellspacing="0" cellpadding="5" width="100%">
    <thead>
      <tr>
        <th><center>No.</center></th>
        <th><center>Tanggal</center></th>
        <th><center>Penginput</center></th>
        <th><center>BP</center></th>
        <th><center>LBP</center></th>
        <th><center>KVARH</center></th>
        <th><center>OUTGOING I</center></th>
        <th><center>OUTGOING II</center></th>
        <th><center>OUTGOING III</center></th>
        <th><center>OUTGOING IV</center></th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no=0;
      foreach ($meter as $data) {
        $no++;
        echo "<tr>";
          echo "<td><center>".$no."</center></td>";
          echo "<td><center>".date('d M y', strtotime($data->date_stan_meter))."</center></td>";
          echo "<td><center>".$data->nama."</center></td>";
          echo "<td><center>".$data->bp."</center></td>";
          echo "<td><center>".$data->lbp."</center></td>";
          echo "<td><center>".$data->kvarh."</center></td>";
          echo "<td><center>".$data->outgoing_i."</center></td>";
          echo "<td><center>".$data->outgoing_ii."</center></td>";
          echo "<td><center>".$data->outgoing_iii."</center></td>";
          echo "<td><center>".$data->outgoing_iv."</center></td>";
        echo "</tr>";
      }
      ?>
    </tbody>
  </table>
</body>
</html>