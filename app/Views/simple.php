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
                        <label>Nama Siswa / Alumni :</label>
                        <select class="select2" style="width: 100%;" name="nama_lengkap" id="nama_lengkap">

                        </select>



                        <img id="loader" src="<?= base_url('asset/img/loader.gif') ?>" />
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
        $.ajax({
            type: "POST",
            url: "<?php echo base_url($controller . "/getAll") ?>",
            data: {
                [csrfToken]: csrfHash,
                "id_status": val
            },
            // beforeSend: function() {
            //     $('#form-btn').html('<i class="fa fa-spinner fa-spin"></i> Loading...');
            // },
            success: function(response) {

                // var data = {
                //     id: 1,
                //     text: 'Barn owl'
                // };

                // var newOption = new Option(data.text, data.id, false, false);
                // $('#nama_lengkap').append(newOption).trigger('change');

                // for (var d = 0; d < response.length; d++) {
                //     var item = response[d];

                //     // Create the DOM option that is pre-selected by default
                //     var newOption = new Option(item.nama_lengkap, item.nisn, false, false);
                //     $('#nama_lengkap').append(newOption).trigger('change');
                // }

                // // // Update the selected options that are displayed
                // // // $element.trigger('change');
                // // $('#nama_lengkap').val(null).trigger('change');
                // $("#nama_lengkap").off('change');

                if ($('#nama_lengkap').find("option[value='" + response.nisn + "']").length) {
                    for (var d = 0; d < response.length; d++) {
                    var item = response[d];

                    // Create the DOM option that is pre-selected by default
                    var newOption = new Option(item.nama_lengkap, item.nisn, false, false);
                    $('#nama_lengkap').append(newOption).trigger('change');
                }
                } else {
                    // Create a DOM Option and pre-select by default
                    var newOption = new Option(item.nama_lengkap, item.nisn, true, true);
                    // Append it to the select
                    $('#nama_lengkap').append(newOption).trigger('change');
                }


                $("#loader").hide();
            }
        });
    }
</script>

<?= $this->endSection() ?>