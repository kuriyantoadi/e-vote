<?php
if (!isset($_SESSION['id_admin'])) {
   header('location: ../');
}
?>

<div class="row">
   <div class="col-md-9">
      <h3>Daftar Kandidat</h3>
   </div>
   <div class="col-md-3" style="padding-top:10px;">
      <a class="btn btn-primary" href="?page=kandidat&action=tambah">Tambah Kandidat</a>
   </div>
</div>
<hr />
<div class="row">
    <div class="col-md-3">
    </div>
    <div style="clear:both"></div>
    <br />
    <div class="col-md-12">
        <div id="data">
        </div>
    </div>
</div>
