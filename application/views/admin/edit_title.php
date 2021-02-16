    <!DOCTYPE html>

    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Custom fonts for this template-->
        <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">


        <link href="<?= base_url('assets/'); ?>dist/sweetalert.css" rel="stylesheet">
        <script src="<?= base_url('assets/'); ?>dist/sweetalert.min.js"></script>
        <script src="<?= base_url('assets/'); ?>dist/sweetalert-dev.js"></script>
    </head>

    <body>
        <div class="container" style="margin-top: 50px">
            <div class="col-7">
                <?php echo form_open('buku/update') ?>
                <form class="">
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="e_kdtitle">Kode Title</label>
                            <input type="text" class="form-control" id="e_kdtitle" name="e_kdtitle" value="<?= $gelar->KdTitle; ?>" disabled>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="e_kdtitle">Nama Title</label>
                            <input type="text" class="form-control" id="e_kdtitle" name="e_kdtitle" value="<?= $gelar->NamaTitle; ?>">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="e_kdtitle">Kode External</label>
                            <input type="text" class="form-control" id="e_kdtitle" name="e_kdtitle" value="<?= $gelar->KodeExternal; ?>">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-check-label" for="statusaktif">Status Aktif</label>
                            <input class="form-check-input col-9" type="checkbox" value="1" id="statusaktif" name="statusaktif" checked <?= set_checkbox('statusaktif', '1'); ?>>

                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="e_kdtitle">Nama External</label>
                            <input type="text" class="form-control" id="e_kdtitle" name="e_kdtitle" value="<?= $gelar->NamaExternal; ?>">
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-md btn-success">Update</button>
                        <button type="reset" class="btn btn-md btn-warning">reset</button>
                    </div>
                </form>
                <?php echo form_close() ?>
            </div>

            <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>

    </body>

    </html>