<?php
  $this->load->view('admin/header')
?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Admin Panel
            <small>area</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box">
                  <div class="box-body">
                  <h2>Selamat Datang di Admin Panel</h2>
                  <h3>Peta Provinsi Jawa Timur :</h3>
                        <img src="<?=base_url('assets')?>/petajatim.jpg" alt="wisata jatim" height="75%" width="75%"/>

                        <p><h4>Ada banyak keunikan dari tempat wisata di Jawa Timur, di antaranya adalah pesona wisata alam yang memikat serta panorama laut yang menawan hati. Provinsi dengan jumlah penduduk terbanyak di Indonesia ini memiliki ibukota yang juga merupakan salah satu destinasi wisata di Jawa Timur, Surabaya. Keunikan wisata Jawa Timur dapat dijumpai dalamwisata kerajinan serta sajian wisata kuliner Jatim dengan berbagai olahan makanan laut, kreativitas makanan daging, dan sejumlah makanan kuliner khas Jatim lainnya.
                        Pada halaman ini digunakan untuk admin mengolah data yang akan di tampilkan di aplikasi android seperti data kota, data wisata, data kuliner, dan data kerajinan. </h4></p>
                  </div>
                </div>
              </div>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<?php
  $this->load->view('admin/footer')
?>