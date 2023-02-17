<?= $this->extend("layout/master") ?>

<?= $this->section("content") ?>

<!-- Main content -->
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Data Siswa</h3>
        <div class="card-tools">
          <div class="input-group input-group-sm">
            <button type="button" class="btn btn-success float-right" onclick="save()" title="<?= lang("App.new") ?>"> <i class="fa fa-plus"></i> <?= lang('App.new') ?></button>
          </div>
        </div>
      </div>
      <div class="card-body">
        <table id="data_table" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>NIS</th>
              <th>NISN</th>
              <th>Nama Lengkap</th>
              <th>Nama Ayah</th>
              <th>Nama Ibu</th>
              <th>Nama Wali</th>
              <th>Alamat</th>
              <th>Telepon</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>

          </tbody>
          <tfoot>
            <tr>
              <th>No</th>
              <th>NIS</th>
              <th>NISN</th>
              <th>Nama Lengkap</th>
              <th>Nama Ayah</th>
              <th>Nama Ibu</th>
              <th>Nama Wali</th>
              <th>Alamat</th>
              <th>Telepon</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- ADD modal content -->

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
            <div class="col-md-6">
              <div class="form-group mb-2">
                <label for="nis" class="col-form-label"> Nis: <span class="text-danger">*</span> </label>
                <input type="number" id="nis" name="nis" class="form-control" placeholder="Nis" minlength="0" maxlength="11" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb-2">
                <label for="nisn" class="col-form-label"> Nisn: <span class="text-danger">*</span> </label>
                <input type="number" id="nisn" name="nisn" class="form-control" placeholder="Nisn" minlength="0" maxlength="11" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb-2">
                <label for="nama_lengkap" class="col-form-label"> Nama lengkap: </label>
                <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" placeholder="Nama lengkap" minlength="0" maxlength="250">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb-2">
                <label for="nama_ayah" class="col-form-label"> Nama ayah: </label>
                <input type="text" id="nama_ayah" name="nama_ayah" class="form-control" placeholder="Nama ayah" minlength="0" maxlength="250">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb-2">
                <label for="nama_ibu" class="col-form-label"> Nama ibu: </label>
                <input type="text" id="nama_ibu" name="nama_ibu" class="form-control" placeholder="Nama ibu" minlength="0" maxlength="250">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb-2">
                <label for="nama_wali" class="col-form-label"> Nama wali: </label>
                <input type="text" id="nama_wali" name="nama_wali" class="form-control" placeholder="Nama wali" minlength="0" maxlength="250">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group mb-2">
                <label for="telepon" class="col-form-label"> Telepon: </label>
                <input type="text" id="telepon" name="telepon" class="form-control" placeholder="Telepon" minlength="0" maxlength="20">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group mb-2">
                <label for="alamat" class="col-form-label"> Alamat: </label>
                <textarea cols="40" rows="4" id="alamat" name="alamat" class="form-control" placeholder="Alamat" minlength="0"></textarea>
              </div>
            </div>

          </div>

          <div class="form-group text-center">
            <div class="btn-group">
              <button type="submit" class="btn btn-success" id="form-btn"><?= lang("App.save") ?></button>
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
    $('#data_table tfoot th').each(function() {
      var title = $(this).text();
      $(this).html('<input type="text" placeholder="Search ' + title + '" />');
    });
    var table = $('#data_table').removeAttr('width').DataTable({
      "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
        $('td:eq(0)', nRow).html(iDisplayIndexFull + 1);
      },

      "paging": true,
      "lengthChange": false,
      // "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "scrollY": '45vh',
      "scrollX": true,
      "scrollCollapse": true,
      columnDefs: [{
        width: 80,
        targets: 0
      }],
      fixedColumns: true,
      "responsive": true,
      "ajax": {
        "url": '<?php echo base_url($controller . "/getAll") ?>',
        "type": "POST",
        "dataType": "json",
        async: "true",
      },
      initComplete: function() {
        this.api().columns([0, 1, 2, 3, 4, 5, 6, 7, 8, 9]).every(function() {
          var column = this;
          var select = $('<input type="text" class="form-control" />')
            .appendTo($(column.footer()).empty())
            .on('change', function() {
              var val = $.fn.dataTable.util.escapeRegex(
                $(this).val()
              );

              column
                .search(val ? '^' + val + '$' : '', true, false)
                .draw();
            });

          column.data().unique().sort().each(function(d, j) {
            select.append('<option value="' + d + '">' + d + '</option>')
          });
        }, );
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


      // $("#data-modal").data('bs.modal')._config.backdrop = 'static'; 

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
          $('#data-modal').modal({
            backdrop: 'static',
            keyboard: false
          });
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