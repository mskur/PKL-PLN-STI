

<h1>SIDEBAR</h1>

<li><a href="<?= base_url('/adminSTI/dashboard'); ?>"><i class="fas fa-music"></i>Dashboard</a></li> <br>
<li><a href="<?= base_url('/topologiSTI/viewTopologi'); ?>"><i class="fas fa-music"></i>Topologi</a></li> <br>
<li><a href="<?= base_url('/kegiatanSTI/viewKegiatan'); ?>"><i class="fas fa-music"></i>Kegiatan</a></li> <br>
<li><a href="<?= base_url('/inventarisSTI/viewInventaris'); ?>"><i class="fas fa-music"></i>Inventaris</a></li> <br>
<li><a href="<?= base_url('/monitoringSTI/viewMonitoring'); ?>"><i class="fas fa-music"></i>Monitoring</a></li> <br>
<li><a href="<?= base_url('/unitLV1/viewUnitLV1'); ?>"><i class="fas fa-music"></i>Unit LV1</a></li> <br>
<li><a href="<?= base_url('/unitLV2/viewUnitLV2'); ?>"><i class="fas fa-music"></i>Unit LV2</a></li> <br>
<li><a href="<?= base_url('/unitLV3/viewUnitLV3'); ?>"><i class="fas fa-music"></i>Unit LV3</a></li> <br>
<li><a href="<?= base_url('/unitLV4/viewUnitLV4'); ?>"><i class="fas fa-music"></i>Unit LV4</a></li> <br>
<li><a href="<?= base_url('/kategoriAlat/viewKategori'); ?>"><i class="fas fa-music"></i>Kategori Alat</a></li> <br>
<li><a href="<?= base_url('/merkAlat/viewMerk'); ?>"><i class="fas fa-music"></i>Merk Alat</a></li> <br>
<li><a href="<?= base_url('/typeAlat/viewType'); ?>"><i class="fas fa-music"></i>Type Alat</a></li> <br>
<li><a href="<?= base_url('/TransaksiAset/viewTransaksiAset'); ?>"><i class="fas fa-music"></i>Transaksi Aset</a></li> <br>
<li><a href="<?= base_url('/link/viewLink'); ?>"><i class="fas fa-music"></i>Link</a></li> <br>
<li><a href="<?= base_url('/TransaksiLink/viewTransaksiLink'); ?>"><i class="fas fa-music"></i>Transaksi Link</a></li> <br>

<?php if ($level == 'superadmin') { ?>
    <li><a href="<?= base_url('/adminSTI/controlAdmin'); ?>"><i class="fas fa-music"></i>Control Admin</a></li> <br>
<?php } ?>

<li><a href="<?= base_url('/LoginSTI/logout'); ?>"><i class="fas fa-sign-out-alt"></i>Logout</a></li>