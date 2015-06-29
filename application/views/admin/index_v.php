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
                    <div class="alert alert-info">
                      <h3>Selamat datang di admin panel !</h3>
                    </div>
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