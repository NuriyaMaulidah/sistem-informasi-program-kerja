<?php

namespace Master;

use Config\Query_builder;

class kadis
{
    private $db;

    public function __construct($con)
    {
        $this->db = new Query_builder($con);
    }

    public function index()
    {
        $data = $this->db->table('kadis')->get()->resultArray();
        $res = ' <a href="?target=kadis&act=tambah_kadis" class="btn btn-info btn-sm">Tambah kadis</a>
    <br><br>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>id_kadis</th>
                    <th>nama</th>
                    <th>nim</th>
                    <th>alamat</th>
                    <th>jabatan</th>
                    <th>Act</th>
                </tr>
            </thead>
            <tbody>';
        $no = 1;
        foreach ($data as $r) {
            $res .= '<tr>
                    <td width="10">' . $no . '</td>
                    <td width="100">' . $r['id_kadis'] . '</td>
                    <td>' . $r['nama'] . '</td>
                    <td>' . $r['nim'] . '</td>
                    <td>' . $r['alamat'] . '</td>
                    <td>' . $r['jabatan'] . '</td>
                    <td width="150">
                        <a href="?target=kadis&act=edit_kadis&id=' . $r['id_kadis'] . '" class="btn btn-success btn-sm">
                            Edit
                        </a>
                        <a href="?target=kadis&act=delete_kadis&id=' . $r['id_kadis'] . '" class="btn btn-danger btn-sm">
                            Hapus
                        </a>
                    </td>
                </tr>';
            $no++;
        }
        $res .= '</tbody></table></div>';
        return $res;
    }

    public function tambah()
    {
        $res = '<a href="?target=kadis" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form action="?target=kadis&act=simpan_kadis" method="post">
                    <div class="mb-3">
                        <label for="id_kadis" class="form-label">id_kadis</label>
                        <input type="text" class="form-control" id="id_kadis" name="id_kadis">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="nim" class="form-label">nim</label>
                        <input type="text" class="form-control" id="nim" name="nim">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat">
                    </div>
                    <div class="mb-3">
                        <label for="jabatan" class="form-label">jabatan</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan">
                    </div>
                    
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>';
        return $res;
    }

    public function simpan()
    {
        $id_kadis = $_POST['id_kadis'];
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $alamat = $_POST['alamat'];
        $jabatan = $_POST['jabatan'];

        $data = array(
            'id_kadis' => $id_kadis,
            'nama' => $nama,
            'nim' => $nim,
            'alamat' => $alamat,
            'jabatan' => $jabatan,
            'Act' => $Act,
        );
        return $this->db->table('kadis')->insert($data);
    }

    public function edit($id)
    {
        $r = $this->db->table('kadis')->where("id_kadis='$id'")->get()->rowArray();

        $res = '<a href="?target=kadis" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form action="?target=kadis&act=update_kadis" method="post">
                <input type="hidden" class="form-control" id="param" name="param" value="' . $r['id_kadis'] . '">
                    <div class="mb-3">
                        <label for="id_kadis" class="form-label">id_kadis</label>
                        <input type="text" class="form-control" id="id_kadis" name="id_kadis" value="' . $r['id_kadis'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="' . $r['nama'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="nim" class="form-label">nim</label>
                        <input type="text" class="form-control" id="nim" name="nim">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat">
                    </div>
                    <div class="mb-3">
                        <label for="jabatan" class="form-label">jabatan</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan">
                    </div>
                    
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </form>';
        return $res;
    }

    public function cekRadio($val1, $val2)
    {
        if ($val1 == $val2) {
            return "checked";
        }
        return "";
    }

    public function update()
    {
        $param = $_POST['param'];
        $id_kadis = $_POST['id_kadis'];
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $alamat = $_POST['alamat'];
        $jabatan = $_POST['jabatan'];


        $data = array(
            'id_kadis' => $id_kadis,
            'nama' => $nama,
            'nim' => $nim,
            'alamat' => $alamat,
            'jabatan' => $jabatan,
        );

        return $this->db->table('kadis')->where("id_kadis='$param'")->update($data);
    }

    public function delete($id)
    {

        return $this->db->table('kadis')->where("id_kadis='$id'")->delete();
    }
}
