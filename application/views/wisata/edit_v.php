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
             <li><a href="<?=base_url('wisata')?>"><i class="fa fa-dashboard"></i> wisata</a></li>
            <li class="active"><?=$title?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><?=$title?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="danger">
                      <?=$error;?>
                    </div>
                    <form action="<?=base_url('wisata/edit')?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?=$data->id_wisata?>">
                      <div class="form-group">
                      <label for="">Nama wisata</label>
                      <input type="text" class="form-control" name="nama_wisata" id="" placeholder="Nama kabupaten / kota" value="<?=$data->nama_wisata?>">
                    </div>
                    <div class="form-group">
                      <label for="">Kabupaten / Kota</label>
                      <select name="idkabkot" class="form-control" id="">
                        <?php foreach ($kabkot as $k) {
                          if($idkk == $k->id_kabkot ){?>
                            <option value="<?=$k->id_kabkot?>" selected><?=$k->nama_kabkot?></option>
                          <?php }else ?>
                            <option value="<?=$k->id_kabkot?>"><?=$k->nama_kabkot?></option>
                        <?php }?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="">Keterangan</label>
                      <textarea name="keterangan" id="" cols="30" rows="8" class="form-control"><?=$data->keterangan?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">Gambar</label>
                      <input type="file" name="image">
                      <p class="help-block">Gambar wisata</p>
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Ubah</button>
                  </div>
                </form>
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<?php
$this->load->view('admin/footer');
?>