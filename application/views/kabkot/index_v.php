<?php
$this->load->view('admin/header');
?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           <?=$title?>
            <small>data</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><?=$title?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data <?=$title?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <a href="<?=base_url('kabkot/add')?>" class="btn btn-primary">Tambah Data</a>
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kabupaten / Kota</th>
                        <th>Keterangan</th>
                        <th>Gambar</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 0;foreach ($data as $row) {$i++?>
                        <tr>
                          <td><?=$i?></td>
                          <td><?=$row->nama_kabkot?></td>
                          <td><?=$row->keterangan?></td>
                          <td><img src="<?=base_url('uploads/gambar')?>/<?=$row->gambar?>" alt="<?=$row->nama_kabkot?>" height="32px" width="32px"></td>
                          <td>
                          <a href="<?=base_url('kabkot/edit/' . $row->id_kabkot)?>" class="btn btn-primary btn-xs">Ubah</a>
                          <a href="" class="btn btn-danger btn-xs">Hapus</a>
                          </td>

                        </tr>
                      <?php }
?>

                    </tbody>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Kabupaten / Kota</th>
                        <th>Keterangan</th>
                        <th>Gambar</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<?php
$this->load->view('admin/footer');
?>