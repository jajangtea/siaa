<?= $this->extend("layout/talumni") ?>

<?= $this->section("content") ?>

<!-- Main content -->
<div class="card">
  <div class="card-header">
    <div class="row">
      <div class="col-10 mt-2">
        <h3 class="card-title">Data Pendidikan</h3>
      </div>
      <div class="col-2">
        <button type="button" class="btn float-right btn-success" onclick="save()" title="<?= lang("App.new") ?>"> <i class="fa fa-plus"></i> <?= lang('App.new') ?></button>
      </div>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="data_table" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nama Kampus</th>
          <th>Fakultas</th>
          <th>Program studi</th>
          <th>Jenjang</th>
          <th>Alamat Kampus</th>
          <th>No telepon</th>
          <th>Id alumni</th>
          <th>Keterangan</th>
          <th>Tahun masuk</th>
          <th>Tahun lulus</th>

          <th></th>
        </tr>
      </thead>
    </table>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->

<!-- /Main content -->

<!-- ADD modal content -->
<div id="data-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md">
    <div class="modal-content">
      <div class="text-center bg-info p-3" id="model-header">
        <h4 class="modal-title text-white" id="info-header-modalLabel"></h4>
      </div>
      <div class="modal-body">
        <form id="data-form" class="pl-3 pr-3">
          <div class="row">
            <input type="hidden" id="id" name="id" class="form-control" placeholder="Id" maxlength="11" required>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group mb-3">
                <label for="nama_kampus" class="col-form-label"> Nama Kampus: <span class="text-danger">*</span> </label>
                <input type="text" id="nama_kampus" name="nama_kampus" class="form-control" placeholder="Nama Kampus" minlength="0" maxlength="200" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group mb-3">
                <label for="fakultas" class="col-form-label"> Fakultas: <span class="text-danger">*</span> </label>
                <input type="text" id="fakultas" name="fakultas" class="form-control" placeholder="Fakultas" minlength="0" maxlength="200" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group mb-3">
                <label for="program_studi" class="col-form-label"> Program studi: <span class="text-danger">*</span> </label>
                <input type="text" id="program_studi" name="program_studi" class="form-control" placeholder="Program studi" minlength="0" maxlength="100" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group mb-3">
                <label for="jenjang" class="col-form-label"> Jenjang: <span class="text-danger">*</span> </label>
                <input type="text" id="jenjang" name="jenjang" class="form-control" placeholder="Jenjang" minlength="0" maxlength="20" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group mb-3">
                <label for="alamat_kampus" class="col-form-label"> Alamat Kampus: <span class="text-danger">*</span> </label>
                <textarea cols="40" rows="5" id="alamat_kampus" name="alamat_kampus" class="form-control" placeholder="Alamat Kampus" minlength="0" required></textarea>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group mb-3">
                <label for="no_telepon" class="col-form-label"> No telepon: <span class="text-danger">*</span> </label>
                <input type="text" id="no_telepon" name="no_telepon" class="form-control" placeholder="No telepon" minlength="0" maxlength="20" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group mb-3">
                <label for="id_alumni" class="col-form-label"> Id alumni: <span class="text-danger">*</span> </label>
                <select id="id_alumni" name="id_alumni" class="form-select" required>
                  <option value="select1">select1</option>
                  <option value="select2">select2</option>
                  <option value="select3">select3</option>
                </select>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group mb-3">
                <label for="keterangan" class="col-form-label"> Keterangan: </label>
                <input type="text" id="keterangan" name="keterangan" class="form-control" placeholder="Keterangan" minlength="0" maxlength="100">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group mb-3">
                <label for="tahun_masuk" class="col-form-label"> Tahun masuk: <span class="text-danger">*</span> </label>
                <select id="tahun_masuk" name="tahun_masuk" class="form-select" required>
                  <option value="select1">select1</option>
                  <option value="select2">select2</option>
                  <option value="select3">select3</option>
                </select>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group mb-3">
                <label for="tahun_lulus" class="col-form-label"> Tahun lulus: <span class="text-danger">*</span> </label>
                <select id="tahun_lulus" name="tahun_lulus" class="form-select" required>
                  <option value="select1">select1</option>
                  <option value="select2">select2</option>
                  <option value="select3">select3</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
          </div>

          <div class="form-group text-center">
            <div class="btn-group">
              <button type="submit" class="btn btn-success mr-2" id="form-btn"><?= lang("App.save") ?></button>
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><?= lang("App.cancel") ?></button>
            </div>
          </div>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
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
          $('#model-header').removeClass('bg-success').addClass('bg-info');
          $("#info-header-modalLabel").text('<?= lang("App.edit") ?>');
          $("#form-btn").text(submitText);
          $('#data-modal').modal('show');
          //insert data to form
          $("#data-form #id").val(response.id);
          $("#data-form #nama_kampus").val(response.nama_kampus);
          $("#data-form #fakultas").val(response.fakultas);
          $("#data-form #program_studi").val(response.program_studi);
          $("#data-form #jenjang").val(response.jenjang);
          $("#data-form #alamat_kampus").val(response.alamat_kampus);
          $("#data-form #no_telepon").val(response.no_telepon);
          $("#data-form #id_alumni").val(response.id_alumni);
          $("#data-form #keterangan").val(response.keterangan);
          $("#data-form #tahun_masuk").val(response.tahun_masuk);
          $("#data-form #tahun_lulus").val(response.tahun_lulus);

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