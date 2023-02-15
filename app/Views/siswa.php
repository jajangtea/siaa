<?= $this->extend('layout/page_layout') ?>

<?= $this->section("content") ?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Users <small>Some examples to get you started</small></h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-secondary" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2>Default Example <small>Users</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">Settings 1</a>
                  <a class="dropdown-item" href="#">Settings 2</a>
                </div>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
              <div class="x_content">
                <div class="row">
                  <div class="col-sm-12">

                    <div class="card-box table-responsive">

                      <div class="col-12">
                        <button type="button" class="btn float-right btn-success" onclick="save()" title="<?= lang("App.new") ?>"> <i class="fa fa-plus"></i> <?= lang('App.new') ?></button>
                      </div>


                      <table id="data_table" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Id</th>
                            <th>Nis</th>
                            <th>Nisn</th>
                            <th>Nama lengkap</th>
                            <th>Nama ayah</th>
                            <th>Nama ibu</th>
                            <th>Nama wali</th>
                            <th>Alamat</th>
                            <th>Telepon</th>

                            <th></th>
                          </tr>
                        </thead>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- /Main content -->

    <!-- ADD modal content -->


    <div id="data-modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel">Tambah Siswa</h5>
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
          </div>

          <div class="modal-body">
            <form id="data-form" class="pl-3 pr-3">
              <div class="row">
                <input type="hidden" id="id" name="id" class="form-control" placeholder="Id" maxlength="11" required>
              </div>
              <div class="row">
                <div class="col-md-6 col-sm-6  form-group has-feedback">
                  <input id="nis" name="nis" type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="NIS">
                  <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                </div>

                <div class="col-md-6 col-sm-6  form-group has-feedback">
                  <input id="nisn" name="nisn" type="text" class="form-control has-feedback-left" id="inputSuccess3" placeholder="NISN">
                  <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                </div>

                <div class="col-md-6 col-sm-6  form-group has-feedback">
                  <input id="nama_lengkap" name="nama_lengkap" type="text" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Nama Lengkap">
                  <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                </div>

                <div class="col-md-6 col-sm-6  form-group has-feedback">
                  <input id="nama_ayah" name="nama_ayah" type="text" class="form-control has-feedback-left" id="inputSuccess5" placeholder="Nama Ayah">
                  <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                </div>

                <div class="col-md-6 col-sm-6  form-group has-feedback">
                  <input id="nama_ibu" name="nama_ibu" type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Nama Ibu">
                  <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                </div>

                <div class="col-md-6 col-sm-6  form-group has-feedback">
                  <input id="nama_wali" name="nama_wali" type="text" class="form-control has-feedback-left" id="inputSuccess3" placeholder="Nama Wali">
                  <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                </div>

                <div class="col-md-6 col-sm-6  form-group has-feedback">
                  <input id="telepon" name="telepon" type="text" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Telepon">
                  <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                </div>

                <div class="col-md-6 col-sm-6  form-group has-feedback">
                  <textarea cols="40" rows="5" id="alamat" name="alamat" class="form-control" placeholder="Alamat" minlength="0"></textarea>
                </div>
              </div>

              <div class="modal-footer">
                <div class="form-group">
                  <button class="btn btn-primary" type="reset"><?= lang("App.cancel") ?></button>
                  <button type="button" class="btn btn-success" id="form-btn"><?= lang("App.save") ?></button>
                </div>
              </div>
            </form>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div>
    </div>
    <!-- /ADD modal content -->



    <?= $this->endSection() ?>
    <!-- /.content -->


    <!-- page script -->
    <?= $this->section("pageScript") ?>
    <script>
      // dataTables
      $(function() {
        var table = $('#data_table').removeAttr('width').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "scrollY": '45vh',
          "scrollX": true,
          "scrollCollapse": false,
          "responsive": false,
          "ajax": {
            "url": '<?php echo base_url($controller . "/getAll") ?>',
            "type": "POST",
            "dataType": "json",
            async: "true"
          }
        });
      });

      var urlController = '';
      var submitText = '';

      function getUrl() {
        return urlController;
      }

      function getSubmitText() {
        return submitText;
      }

      function save(id) {
        // reset the form 
        $("#data-form")[0].reset();
        $(".form-control").removeClass('is-invalid').removeClass('is-valid');
        if (typeof id === 'undefined' || id < 1) { //add
          urlController = '<?= base_url($controller . "/add") ?>';
          submitText = '<?= lang("App.save") ?>';
          $('#model-header').removeClass('bg-info').addClass('bg-success');
          $("#info-header-modalLabel").text('<?= lang("App.add") ?>');
          $("#form-btn").text(submitText);
          $('#data-modal').modal('show');
        } else { //edit
          urlController = '<?= base_url($controller . "/edit") ?>';
          submitText = '<?= lang("App.update") ?>';
          $.ajax({
            url: '<?php echo base_url($controller . "/getOne") ?>',
            type: 'post',
            data: {
              id: id
            },
            dataType: 'json',
            success: function(response) {
              alert(response.nis);
              $('#model-header').removeClass('bg-success').addClass('bg-info');
              $("#info-header-modalLabel").text('<?= lang("App.edit") ?>');
              $("#form-btn").text(submitText);
              $('#data-modal').modal('show');
              //insert data to form
              $("#data-form #id").val(response.id);
              $("#data-form #nis").val(response.nis);
              $("#data-form #nisn").val(response.nisn);
              $("#data-form #nama_lengkap").val(response.nama_lengkap);
              $("#data-form #nama_ayah").val(response.nama_ayah);
              $("#data-form #nama_ibu").val(response.nama_ibu);
              $("#data-form #nama_wali").val(response.nama_wali);
              $("#data-form #alamat").val(response.alamat);
              $("#data-form #telepon").val(response.telepon);

            }
          });
        }
        $.validator.setDefaults({
          highlight: function(element) {
            $(element).addClass('is-invalid').removeClass('is-valid');
          },
          unhighlight: function(element) {
            $(element).removeClass('is-invalid').addClass('is-valid');
          },
          errorElement: 'div ',
          errorClass: 'invalid-feedback',
          errorPlacement: function(error, element) {
            if (element.parent('.input-group').length) {
              error.insertAfter(element.parent());
            } else if ($(element).is('.select')) {
              element.next().after(error);
            } else if (element.hasClass('select2')) {
              //error.insertAfter(element);
              error.insertAfter(element.next());
            } else if (element.hasClass('selectpicker')) {
              error.insertAfter(element.next());
            } else {
              error.insertAfter(element);
            }
          },
          submitHandler: function(form) {
            var form = $('#data-form');
            $(".text-danger").remove();
            $.ajax({
              // fixBug get url from global function only
              // get global variable is bug!
              url: getUrl(),
              type: 'post',
              data: form.serialize(),
              cache: false,
              dataType: 'json',
              beforeSend: function() {
                $('#form-btn').html('<i class="fa fa-spinner fa-spin"></i>');
              },
              success: function(response) {
                if (response.success === true) {
                  Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: response.messages,
                    showConfirmButton: false,
                    timer: 1500
                  }).then(function() {
                    $('#data_table').DataTable().ajax.reload(null, false).draw(false);
                    $('#data-modal').modal('hide');
                  })
                } else {
                  if (response.messages instanceof Object) {
                    $.each(response.messages, function(index, value) {
                      var ele = $("#" + index);
                      ele.closest('.form-control')
                        .removeClass('is-invalid')
                        .removeClass('is-valid')
                        .addClass(value.length > 0 ? 'is-invalid' : 'is-valid');
                      ele.after('<div class="invalid-feedback">' + response.messages[index] + '</div>');
                    });
                  } else {
                    Swal.fire({
                      toast: false,
                      position: 'bottom-end',
                      icon: 'error',
                      title: response.messages,
                      showConfirmButton: false,
                      timer: 3000
                    })

                  }
                }
                $('#form-btn').html(getSubmitText());
              }
            });
            return false;
          }
        });

        $('#data-form').validate({

          //insert data-form to database

        });
      }



      function remove(id) {
        Swal.fire({
          title: "<?= lang("App.remove-title") ?>",
          text: "<?= lang("App.remove-text") ?>",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: '<?= lang("App.confirm") ?>',
          cancelButtonText: '<?= lang("App.cancel") ?>'
        }).then((result) => {

          if (result.value) {
            $.ajax({
              url: '<?php echo base_url($controller . "/remove") ?>',
              type: 'post',
              data: {
                id: id
              },
              dataType: 'json',
              success: function(response) {

                if (response.success === true) {
                  Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: response.messages,
                    showConfirmButton: false,
                    timer: 1500
                  }).then(function() {
                    $('#data_table').DataTable().ajax.reload(null, false).draw(false);
                  })
                } else {
                  Swal.fire({
                    toast: false,
                    position: 'bottom-end',
                    icon: 'error',
                    title: response.messages,
                    showConfirmButton: false,
                    timer: 3000
                  })
                }
              }
            });
          }
        })
      }
    </script>


    <?= $this->endSection() ?>