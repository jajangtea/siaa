<?= $this->extend("layout/master") ?>

<?= $this->section("content") ?>

<!-- Main content -->

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center display-4">Pencarian Data Alumni & Siswa</h2>
            </div>
            <div class="card-body">
                <form>
                    <?= csrf_field() ?>
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
                                        <select class="select2" style="width: 100%;" name="nama_lengkap" id="nama_lengkap" data-column-index='0'>
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
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">

            <div class="card-body">
                <table id="data_table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>NISN</th>
                            <th>NIS</th>
                            <th>Nama Lengkap</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<!-- /.content -->


<?= $this->section("pageScript") ?>
<script>
    let csrfToken = '<?= csrf_token() ?>';
    let csrfHash = '<?= csrf_hash() ?>';
    $("#loader").hide();

    $(function() {
        var table = $('#data_table').removeAttr('width').DataTable({
            "dom": 'lrtip',
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "info": true,
            "autoWidth": false,
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
            var table = $('#data_table').DataTable({
                "order": [], //Initial no order.
            });
            setInterval(function() {
                table.ajax.reload();
            }, 0);

        });
    });

    function getAllPerson() {
        $('#nama_lengkap').keyup(function() {
            var table = $('#data_table').DataTable();
            table.search($(this).val()).draw();
        });
    }



    var $element = $('select2').select2();


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
</script>

<?= $this->endSection() ?>