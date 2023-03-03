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
                        <label>Nama Siswa / Alumni :</label>  <img id="loader" src="<?= base_url('asset/img/loader.gif') ?>" />
                        <select class="select2" style="width: 100%;" name="nama_lengkap" id="nama_lengkap">
                        </select>




                    </div>
                </div>

             
            </div>
            <div class="form-group">

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-primary mt-2" type="button" id="form-btn"> <i class="fa fa-search"></i> Cari...</button>
                </div>

            </div>
        </div>
    </div>
</form>

<?= $this->endSection() ?>
<!-- /.content -->


<?= $this->section("pageScript") ?>
<script>
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
</script>

<?= $this->endSection() ?>