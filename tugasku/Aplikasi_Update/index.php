<?php

use master\pegawai;
use master\kabid;
use master\kadis;
use master\menu;

include('autoload.php');
include('config/Database.php');

$menu = new menu();
$kadis = new kadis($dataKoneksi);
$kabid = new kabid($dataKoneksi);
$pegawai = new pegawai($dataKoneksi);
// $kadis->tambah();
$target = @$_GET['target'];
$act = @$_GET['act'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>yeni nurhasanah</title>
    <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">program kerja</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#Mymenu" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggle-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="MyMenu">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php
                        foreach ($menu->topMenu() as $r) {
                        ?>
                            <li class="nav-item">
                                <a href="<?php echo $r['link']; ?>" class="nav-link">
                                    <?php echo $r['text']; ?>
                            </a>
                        </li>
                    <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <br>
        <div class="content">
            <h5>Content <?php echo strtoupper($target); ?></h5>
            <?php
            if (!isset($target)or $target == "home") {
                echo "Hai, Selamat datang di beranda";
                // ============ start kontent kadis ======================
            } elseif ($target == "kadis") {
                if ($act == "tambah_kadis") {
                    echo $kadis->tambah();
                } elseif ($act == "simpan_kadis") {
                    if ($kadis->simpan()) {
                        echo "<script>
                            alert('data sukses disimpan');
                            window.location.href='?target=kadis';
                        </script>";
                    } else {
                        echo "<script>
                            alert('data gagal disimpan');
                            window.location.href='?target=kadis';
                        </script>";
                    } 
                } elseif ($act == "edit_kadis") {
                    $id = $_GET['id'];
                    echo $kadis->edit($id);
                } elseif ($act == "update_kadis") {
                    if ($kadis->update()) {
                        echo "<script>
                            alert('data sukses diubah');
                            window.location.href='?target=kadis';
                        </script>";
                    } else {
                        echo "<script>
                            alert('data gagal diubah');
                            window.location.href='?target=kadis';
                        </script>";
                    }
                } elseif ($act == "delete_kadis") {
                    $id = $_GET['id'];
                    if ($kadis->delete($id)) {
                        echo "<script>
                            alert('data sukses dihapus');
                            window.location.href='?target=kadis';
                        </script>";
                    } else {
                        echo "<script>
                            alert('data gagal dihapus');
                            window.location.href='?target=kadis';
                        </script>";
                    }
                } else {
                    echo $kadis->index();
                }
                // ====================== end konten pegawai =========================
                // pegawai

            } elseif ($target == "pegawai") {
                if ($act == "tambah_pegawai") {
                    echo $pegawai->tambah();
                } elseif ($act == "simpan_pegawai") {
                    if ($pegawai->simpan()) {
                        echo "<script>
                            alert('data sukses disimpan');
                            window.location.href='?target=pegawai';
                        </script>";
                    } else {
                        echo "<script>
                            alert('data gagal disimpan');
                            window.location.href='?target=pegawai';
                        </script>";
                    } 
                } elseif ($act == "edit_pegawai") {
                    $id = $_GET['id'];
                    echo $pegawai->edit($id);
                } elseif ($act == "update_pegawai") {
                    if ($pegawai->update()) {
                        echo "<script>
                            alert('data sukses diubah');
                            window.location.href='?target=pegawai';
                        </script>";
                    } else {
                        echo "<script>
                            alert('data gagal diubah');
                            window.location.href='?target=pegawai';
                        </script>";
                    }
                } elseif ($act == "delete_pegawai") {
                    $id = $_GET['id'];
                    if ($pegawai->delete($id)) {
                        echo "<script>
                            alert('data sukses dihapus');
                            window.location.href='?target=pegawai';
                        </script>";
                    } else {
                        echo "<script>
                            alert('data gagal dihapus');
                            window.location.href='?target=pegawai';
                        </script>";
                    }
                } else {
                    echo $pegawai->index();
                }
                // ====================== end konten kabid =========================
            } elseif ($target == "kabid") {
                if ($act == "tambah_kabid") {
                    echo $kabid->tambah();
                } elseif ($act == "simpan_kabid") {
                    if ($kabid->simpan()) {
                        echo "<script>
                            alert('data sukses disimpan');
                            window.location.href='?target=kabid';
                        </script>";
                    } else {
                        echo "<script>
                            alert('data gagal disimpan');
                            window.location.href='?target=kabid';
                        </script>";
                    } 
                } elseif ($act == "edit_kabid") {
                    $id = $_GET['id'];
                    echo $kabid->edit($id);
                } elseif ($act == "update_kabid") {
                    if ($kabid->update()) {
                        echo "<script>
                            alert('data sukses diubah');
                            window.location.href='?target=kabid';
                        </script>";
                    } else {
                        echo "<script>
                            alert('data gagal diubah');
                            window.location.href='?target=kabid';
                        </script>";
                    }
                } elseif ($act == "delete_kabid") {
                    $id = $_GET['id'];
                    if ($kabid->delete($id)) {
                        echo "<script>
                            alert('data sukses dihapus');
                            window.location.href='?target=kabid';
                        </script>";
                    } else {
                        echo "<script>
                            alert('data gagal dihapus');
                            window.location.href='?target=kabid';
                        </script>";
                    }
                } else {
                    echo $kabid->index();
                }

                // no page
            } else {
                echo "Page 404 Not found";
            }
            ?>

        </div>
    </div>

</body>

</html>