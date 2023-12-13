<?php

namespace Master;

use Config\Query_builder;

class pegawai
{
    private $db;

    public function __construct($con)
    {
        $this->db = new Query_builder($con);
    }

    public function index()
    {
        $data = $this->db->table('pegawai')->get()->resultArray();
        $res = ' <a href="?target=pegawai&act=tambah_pegawai" class="btn btn-info btn-sm">Tambah pegawai</a>
    <br><br>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>id_pegawai</th>
                    <th>nama</th>
                    <th>nim</th>
                    <th>NO_TELP</th>
                    <th>Act</th>
                </tr>
            </thead>
            <tbody>';
        $no = 1;
        foreach ($data as $r) {
            $res .= '<tr>
                    <td width="10">' . $no . '</td>
                    <td width="100">' . $r['id_pegawai'] . '</td>
                    <td>' . $r['nama'] . '</td>
                    <td>' . $r['nim'] . '</td>
                    <td>' . $r['NO_TELP'] . '</td>
                    <td width="150">
                        <a href="?target=pegawai&act=edit_pegawai&id=' . $r['id_pegawai'] . '" class="btn btn-success btn-sm">
                            Edit
                        </a>
                        <a href="?target=pegawai&act=delete_pegawai&id=' . $r['id_pegawai'] . '" class="btn btn-danger btn-sm">
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
        $res = '<a href="?target=pegawai" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form action="?target=pegawai&act=simpan_pegawai" method="post">
                    <div class="mb-3">
                        <label for="id_pegawai" class="form-label">id_pegawai</label>
                        <input type="text" class="form-control" id="id_pegawai" name="id_pegawai">
                    </div>
                    <div class="mb-3">
                        <label for="pegawai" class="form-label">pegawai</label>
                        <input type="text" class="form-control" id="pegawai" name="pegawai">
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
                        <label for="NO_TELP" class="form-label">NO_TELP</label>
                        <input type="text" class="form-control" id="NO_TELP" name="NO_TELP">
                    </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>';
        return $res;
    }

    public function simpan()
    {
        $id_pegawai = $_POST['id_pegawai'];
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $NO_TELP = $_POST['NO_TELP'];
        
        $data = array(
            'id_pegawai' => $id_pegawai,
            'nama' => $nama,
            'nim' => $nim,
            'NO_TELP' => $NO_TELP,
            
        );
        return $this->db->table('pegawai')->insert($data);
    }

    public function edit($id)
    {
        $r = $this->db->table('pegawai')->where("id_pegawai='$id'")->get()->rowArray();

        $res = '<a href="?target=pegawai" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form action="?target=pegawai&act=update_pegawai" method="post">
                <input type="hidden" class="form-control" id="param" name="param" value="' . $r['id_pegawai'] . '">
                    <div class="mb-3">
                        <label for="id_pegawai" class="form-label">id_pegawai</label>
                        <input type="text" class="form-control" id="id_pegawai" name="id_pegawai" value="' . $r['id_pegawai'] . '">
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
                        <label for="NO_TELP" class="form-label">NO_TELP</label>
                        <input type="text" class="form-control" id="NO_TELP" name="NO_TELP">
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
        $id_pegawai = $_POST['id_pegawai'];
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $NO_TELP = $_POST['NO_TELP'];
        

        $data = array(
            'id_pegawai' => $id_pegawai,
            'nama' => $nama,
            'nim' => $nim,
            'NO_TELP' => $NO_TELP,
        );

        return $this->db->table('pegawai')->where("id_pegawai='$param'")->update($data);
    }

    public function delete($id)
    {

        return $this->db->table('pegawai')->where("id_pegawai='$id'")->delete();
    }
}
