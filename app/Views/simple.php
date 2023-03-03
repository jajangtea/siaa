<?= $this->extend("layout/master") ?>

<?= $this->section("content") ?>

<!-- Main content -->
<h2 class="text-center display-4">Pencarian Data Alumni & Siswa</h2>
<form>
    <input type="hidden" id="id_status" name="id_status">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label>Jenis Pencarian :</label>
                        <select class="form-control" name="jenis" id="jenis" onChange="getJenis(this.value);">
                            <option selected value="1">Siswa</option>
                            <option value="2">Alumni</option>
                        </select>
                    </div>
                </div>
                <div class="col-8">
                    <div class="form-group">
                        <label>Nama Siswa / Alumni :</label> <img id="loader" src="<?= base_url('asset/img/loader.gif') ?>" />
                        <select class="select2" style="width: 100%;" name="nama_lengkap" id="nama_lengkap" data-column-index='2'>
                        </select>




                    </div>
                </div>


            </div>
            <div class="form-group">

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button id="form-btn" onclick="getAllPerson()" class="btn btn-primary mt-2 mr-2" type="button"> <i class="fa fa-search"></i> Cari...</button>
                    <button id="form-btn-refresh" class="btn btn-danger  mt-2" type="button"> <i class="fa fa-pen"></i> Refresh</button>
                </div>

            </div>
        </div>
    </div>
</form>


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Siswa</h3>

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
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<!-- /.content -->


<?= $this->section("pageScript") ?>
<script>
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
                "url": '<?php echo base_url($controller . "/getAllPerson") ?>',
                "data": {
                    [csrfToken]: csrfHash,
                },
                "type": "POST",
                "dataType": "json",
                async: "true",
            },

        });
    });

    $(document).ready(function() {

        // DataTable
        var dtable = $('#data_table').DataTable();

        $('#form-btn').on('click', function() {
            //clear global search values
            dtable.search('');
            $('#nama_lengkap').each(function() {
                if (this.value.length) {
                    dtable.column($(this).data('columnIndex')).search(this.value);
                }
            });
            dtable.draw();
        });


        $('#form-btn-refresh').on('click', function() {
            $('#data_table').dataTable().fnDestroy();
            var table = $('#data_table').DataTable();

            setInterval(function() {
                table.ajax.reload();
            }, 30000);

        });
    });

    function getAllPerson() {
        $('#nama_lengkap').keyup(function() {
            var table = $('#data_table').DataTable();
            table.search($(this).val()).draw();
        });
    }

    let csrfToken = '<?= csrf_token() ?>';
    let csrfHash = '<?= csrf_hash() ?>';

    var $element = $('select2').select2();

    $("#loader").hide();
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

    })

    function getJenis(val) {
        $("#loader").show();
        $('#nama_lengkap').empty();
        $('nama_lengkap').select2({
            placeholder: "Select a state",
            allowClear: true
        });
        $.ajax({
            type: "POST",
            url: "<?php echo base_url($controller . "/getAll") ?>",
            data: {
                [csrfToken]: csrfHash,
                "id_status": val
            },
            success: function(response) {
                for (var d = 0; d < response.length; d++) {
                    var item = response[d];
                    var newOption = new Option(item.nama_lengkap, item.nisn, false, false);
                    $('#nama_lengkap').append(newOption).trigger('change');
                }
                $('#nama_lengkap').val(null).trigger('change');
                $("#nama_lengkap").select2({
                    placeholder: "Pilih atau inputkan nama",
                    allowClear: true
                });
                $("#loader").hide();
            }
        });
    }

    // function getRefresh() {
    //     $('#data_table').DataTable().ajax.reload(null, false).draw(false);
    // }
</script>

<?= $this->endSection() ?>