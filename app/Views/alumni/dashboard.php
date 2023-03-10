<?= $this->extend("layout/talumni") ?>
<?= $this->section("content") ?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Biodata Selama Menjadi Siswa</h3>
                    </div>
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="<?= base_url('asset/img/user4-128x128.jpg') ?>" alt="Siswa profile picture">
                        </div>

                        <h3 class="profile-username text-center"><?= $biodata->nama_lengkap ?></h3>

                        <p class="text-muted text-center">NISN : <?= $biodata->nisn ?></p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Tahun Masuk</b> <a class="float-right"><?= $biodata->tahun_pelajaran ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Nama Ayah</b> <a class="float-right"><?= $biodata->nama_ayah ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Nama Ibu</b> <a class="float-right"><?= $biodata->nama_ibu ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Telepon/Whatsapp</b> <a class="float-right"><?= $biodata->telepon ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Alamat</b> <a class="float-right"><?= $biodata->alamat ?></a>
                            </li>
                        </ul>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- About Me Box -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Data Terbaru Alumni</h3>
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="<?= base_url() . '/' . 'uploads' . '/' . $biodata->foto_terbaru ?>" alt="Alumni profile picture">
                        </div>
                        <h3 class="profile-username text-center"><?= $biodata->nama_lengkap ?></h3>

                        <p class="text-muted text-center">NISN : <?= $biodata->nisn ?></p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Tahun Lulus</b> <a class="float-right"><?= $tp_lulus ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Kegiatan Saat ini</b> <a class="float-right"><?= $biodata->nama_kegiatan ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Telepon/Whatsapp</b> <a class="float-right"><?= $biodata->telepon_terbaru ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Alamat</b> <a class="float-right" id="d_alamat"><?= $biodata->alamat_terbaru ?></a>
                            </li>
                        </ul>

                        <button type="button" onclick="update()" class="btn btn-primary btn-block"><b>Update Data</b></button>
                        <button type="button" onclick="updateFoto()" class="btn btn-success btn-block"><b>Update Foto</b></button>
                        <button type="button" onclick="updatePass()" class="btn btn-warning btn-block"><b>Ganti Password</b></button>

                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="row">
                    <div class="col-12">
                        <div class="callout callout-info">
                            <h5><i class="fas fa-info"></i> Note:</h5>

                            Kegiatan <b><?= $biodata->nama_lengkap ?></b> saat ini adalah <b><?= $biodata->nama_kegiatan ?></b>. Berikut adalah informasi pendidikan dan pekerjaan setelah lulus di SMAN 5 Tanjungpinang
                        </div>


                        <!-- Main content -->
                        <div class="invoice p-3 mb-3">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="fas fa-user"></i> Informasi Pendidikan
                                    </h4>
                                </div>
                                <!-- /.col -->
                            </div>

                            <!-- Table row -->
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Kampus</th>
                                                <th>Fakultas</th>
                                                <th>Program studi</th>
                                                <th>Jenjang</th>
                                                <th>Alamat Kampus</th>
                                                <th>No telepon</th>
                                                <th>Tahun masuk</th>
                                                <th>Tahun lulus</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($pendidikan as $row) : ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $row->nama_kampus ?></td>
                                                    <td><?= $row->fakultas ?></td>
                                                    <td><?= $row->program_studi ?></td>
                                                    <td><?= $row->jenjang ?></td>
                                                    <td><?= $row->alamat_kampus ?></td>
                                                    <td><?= $row->no_telepon ?></td>
                                                    <td><?= $row->tahun_masuk  ?></td>
                                                    <td><?= $row->tahun_lulus  ?></td>
                                                    <td><?= $row->keterangan     ?></td>

                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                        </div>
                        <!-- /.invoice -->
                    </div><!-- /.col -->


                    <div class="col-12">
                        <!-- Main content -->
                        <div class="invoice p-3 mb-3">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="fas fa-user"></i> Informasi Pekerjaan
                                    </h4>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- info row -->

                            <!-- /.row -->

                            <!-- Table row -->
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Instansi</th>
                                                <th>Jabatan</th>
                                                <th>Nama Atasan</th>
                                                <th>No Telepon</th>
                                                <th>Tahun Masuk</th>
                                                <th>Alamat Instansi</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($pekerjaan as $row) : ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $row->nama_instansi ?></td>
                                                    <td><?= $row->jabatan ?></td>
                                                    <td><?= $row->nama_atasan ?></td>
                                                    <td><?= $row->no_telepon  ?></td>
                                                    <td><?= $row->tahun_masuk  ?></td>
                                                    <td><?= $row->alamat_instansi ?></td>
                                                    <td><?= $row->keterangan     ?></td>

                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                        </div>
                        <!-- /.invoice -->
                    </div><!-- /.col -->
                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

<div id="data-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="text-center bg-info p-3" id="model-header">
                <h4 class="modal-title text-white" id="info-header-modalLabel"></h4>
            </div>
            <div class="modal-body">
                <form id="data-form" class="pl-3 pr-3">
                    <?= csrf_field() ?>
                    <div class="row">
                        <input type="hidden" id="id" name="id" class="form-control" placeholder="Id" maxlength="11" required>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-2">
                                <label for="id_kegiatan" class="col-form-label"> Kegiatan: <span class="text-danger">*</span> </label>
                                <select id="id_kegiatan" name="id_kegiatan" class="form-control" required>
                                    <option value="">Pilih Kegiatan</option>
                                    <?php foreach ($kegiatan as $k) { ?>
                                        <option value="<?php echo $k->id; ?>"><?php echo $k->nama_kegiatan; ?></option>"
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group mb-2">
                                <label for="id_tp_lulus" class="col-form-label"> Tahun Lulus: </label>
                                <select id="id_tp_lulus" name="id_tp_lulus" class="form-control" required>
                                    <option value="">Pilih Tahun Lulus</option>
                                    <?php foreach ($tp as $k) { ?>
                                        <option value="<?php echo $k->id; ?>"><?php echo $k->tahun_pelajaran; ?></option>"
                                    <?php } ?>
                                </select>
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


<div id="data-modal-upload" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="text-center bg-info p-3" id="model-header">
                <h4 class="modal-title text-white" id="info-header-modalLabel">Ganti Foto</h4>
            </div>

            <div class="modal-body">
                <form method="post" id="upload_image_form" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div id="alertMessage" class="alert alert-warning mb-3" style="display: none">
                        <span id="alertMsg"></span>
                    </div>
                    <div class="d-grid text-center">
                        <img class="mb-3" id="ajaxImgUpload" alt="Preview Image" src="<?= base_url('uploads/' . $biodata->foto_terbaru) ?>" />
                    </div>
                    <div class="mb-3">
                        <input type="file" name="file" multiple="true" id="finput" onchange="onFileUpload(this);" class="form-control" accept="image/*">
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success uploadBtn">Upload</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><?= lang("App.cancel") ?></button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>


<div id="data-modal-pass" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="text-center bg-info p-3" id="model-header">
                <h4 class="modal-title text-white" id="info-header-modalLabel">Ganti Password</h4>
            </div>
            <div class="modal-body">
         
                <form id="data-form-pass" class="pl-3 pr-3">
                    <?= csrf_field() ?>
                    <div class="row">
                        <input type="hidden" id="id" name="id" class="form-control" placeholder="Id" maxlength="11" required>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-2">
                                <label for="telepon" class="col-form-label"> Password Lama: </label>
                                <input type="password" id="password_lama" name="password_lama" class="form-control" placeholder="Password Lama" minlength="0" maxlength="20">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-2">
                                <label for="telepon" class="col-form-label"> Password Baru: </label>
                                <input type="password" id="password1" name="password1" class="form-control" placeholder="Password Baru" minlength="0" maxlength="20">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-2">
                                <label for="telepon" class="col-form-label"> Konfirmasi Password: </label>
                                <input type="password" id="password2" name="password2" class="form-control" placeholder="Konfirmasi Password" minlength="0" maxlength="20">
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <div class="btn-group">
                            <button type="submit" class="btn btn-success" id="form-btn-ganti-passs"><?= lang("App.save") ?></button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><?= lang("App.cancel") ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>


<!-- /.content -->
<?= $this->endSection() ?>
<!-- page script -->
<?= $this->section("pageScript") ?>
<script>
    let csrfToken = '<?= csrf_token() ?>';
    let csrfHash = '<?= csrf_hash() ?>';

    function onFileUpload(input, id) {
        id = id || '#ajaxImgUpload';
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(id).attr('src', e.target.result).width(300)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    $('#upload_image_form').on('submit', function(e) {
        $('.uploadBtn').html('Uploading ...');
        $('.uploadBtn').prop('Disabled');
        e.preventDefault();
        if ($('#file').val() == '') {
            alert("Choose File");
            $('.uploadBtn').html('Upload');
            $('.uploadBtn').prop('enabled');
            document.getElementById("upload_image_form").reset();
        } else {
            $.ajax({
                url: "<?php echo base_url(); ?>/alumni/upload",
                method: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                dataType: "json",
                success: function(res) {
                    // console.log(res.success);
                    if (res.success == true) {
                        // $('#ajaxImgUpload').attr('src', 'https://via.placeholder.com/300');
                        $('#alertMsg').html(res.msg);
                        $('#alertMessage').show();
                        location.replace('<?= base_url($controller . "/dashboard") ?>');
                        $('#data-modal-upload').modal('hide');
                    } else {
                        $('#alertMsg').html(res.msg);
                        $('#alertMessage').show();
                    }
                    setTimeout(function() {
                        $('#alertMsg').html('');
                        $('#alertMessage').hide();
                    }, 4000);
                    $('.uploadBtn').html('Upload');
                    $('.uploadBtn').prop('Enabled');
                    document.getElementById("upload_image_form").reset();
                }

            });
        }
    });

    nisn = <?= $biodata->id_siswa; ?>;
    id = parseInt(nisn);
    var urlController = '';
    var submitText = '';

    function getUrl() {
        return urlController;
    }

    function getSubmitText() {
        return submitText;
    }

    function update() {
        // reset the form 
        $("#data-form")[0].reset();
        $(".form-control").removeClass('is-invalid').removeClass('is-valid');
        if (id > 0) { //edit

            urlController = '<?= base_url($controller . "/edit_alumni") ?>';
            submitText = '<?= lang("App.update") ?>';

            $.ajax({
                url: '<?php echo base_url($controller . "/getOne_alumni") ?>',
                type: 'post',
                data: {
                    [csrfToken]: csrfHash,
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
                    $("#data-form #id_kegiatan").val(response.id_kegiatan);
                    $("#data-form #id_siswa").val(response.id_siswa);
                    $("#data-form #id_tp_lulus").val(response.id_tp_lulus);
                    $("#data-form #alamat").val(response.alamat);
                    $("#data-form #telepon").val(response.telepon);
                    $("#data-form #d_alamat").val(response.alamat);

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
                                location.replace('<?= base_url($controller . "/dashboard") ?>');
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


    function updateFoto() {
        // reset the form 
        $("#data-form")[0].reset();
        $(".form-control").removeClass('is-invalid').removeClass('is-valid');
        if (id > 0) { //edit
            urlController = '<?= base_url($controller . "/edit_alumni") ?>';
            submitText = '<?= lang("App.update") ?>';
            $.ajax({
                url: '<?php echo base_url($controller . "/getOne_alumni") ?>',
                type: 'post',
                data: {
                    [csrfToken]: csrfHash,
                    id: id
                },
                dataType: 'json',
                success: function(response) {
                    console.log('berhasil');
                    $('#model-header').removeClass('bg-success').addClass('bg-info');
                    $("#form-btn").text(submitText);
                    $('#data-modal-upload').modal('show');

                    $('#data-form #ajaxImgUpload').attr('src', '<?= base_url("uploads/") ?>' + response.al_img);

                    // $("#data-form #ajaxImgUpload").val(response.al_img);

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



    function updatePass() {
        // reset the form 
        $("#data-form-pass")[0].reset();
        $(".form-control").removeClass('is-invalid').removeClass('is-valid');

        if (id > 0) { //edit
            urlController = '<?= base_url($controller . "/edit_password") ?>';
            submitText = '<?= lang("App.update") ?>';
            $.ajax({
                url: '<?php echo base_url($controller . "/getOne_alumni") ?>',
                type: 'post',
                data: {
                    [csrfToken]: csrfHash,
                    id: id
                },
                dataType: 'json',
                success: function(response) {
                    $("#form-btn-ganti-passs").text(submitText);
                    $('#data-modal-pass').modal('show');
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
                var form = $('#data-form-pass');
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
                                $('#data-modal-pass').modal('hide');
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
                        $('#form-btn-ganti-passs').html(getSubmitText());
                    }
                });
                return false;
            }
        });

        $('#data-form-pass').validate({

            //insert data-form-pass to database

        });
    }
</script>

<?= $this->endSection() ?>