<?php

namespace Master;

use Config\Query_builder;

class kabid
{
    private $db;

    public function __construct($con)
    {
        $this->db = new Query_builder($con);
    }

    public function index()
    {
        $data = $this->db->table('kabid')->get()->resultArray();
        $res = ' <a href="?target=kabid&act=tambah_kabid" class="btn btn-info btn-sm">Tambah kabid</a>
    <br><br>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>id_kabid</th>
                    <th>nama</th>
                    <th>nim</th>
                    <th>jabatan</th>
                    <th>no_tlp</th>
                    <th>Act</th>
                </tr>
            </thead>
            <tbody>';
        $no = 1;
        foreach ($data as $r) {
            $res .= '<tr>
                    <td width="10">' . $no . '</td>
                    <td width="100">' . $r['id_kabid'] . '</td>
                    <td>' . $r['nama'] . '</td>
                    <td>' . $r['nim'] . '</td>
                    <td>' . $r['jabatan'] . '</td>
                    <td>' . $r['no_tlp'] . '</td>
                    <td width="150">
                        <a href="?target=kabid&act=edit_kabid&id=' . $r['id_kabid'] . '" class="btn btn-success btn-sm">
                            Edit
                        </a>
                        <a href="?target=kabid&act=delete_kabid&id=' . $r['id_kabid'] . '" class="btn btn-danger btn-sm">
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
        $res = '<a href="?target=kabid" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form action="?target=kabid&act=simpan_kabid" method="post">
                    <div class="mb-3">
                        <label for="id_kabid" class="form-label">id_kabid</label>
                        <input type="text" class="form-control" id="id_kabid" name="id_kabid">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">nama </label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="nim" class="form-label">nim</label>
                        <input type="text" class="form-control" id="nim" name="nim">
                    </div>
                    <div class="mb-3">
                        <label for="jabatan" class="form-label">jabatan</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan">
                    </div>
                    <div class="mb-3">
                        <label for="no_tlpn" class="form-label">no_tlpn</label>
                        <input type="text" class="form-control" id="no_tlp" name="no_tlp">
                    </div>
                    
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>';
        return $res;
    }

    public function simpan()
    {
        $id_kabid = $_POST['id_kabid'];
        $nama= $_POST['nama'];
        $nim = $_POST['nim'];
        $jabatan = $_POST['jabatan'];
        $no_tlp = $_POST['no_tlp'];

        $data = array(
            'id_kabid' => $id_kabid,
            'nama' => $nama,
            'nim' => $nim,
            'jabatan' => $jabatan,
            'no_tlp' => $no_tlp,
            
        );
        return $this->db->table('kabid')->insert($data);
    }

    public function edit($id)
    {
        $r = $this->db->table('kabid')->where("id_kabid='$id'")->get()->rowArray();

        $res = '<a href="?target=kabid" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form action="?target=kabid&act=update_kabid" method="post">
                <input type="hidden" class="form-control" id="param" name="param" value="' . $r['id_kabid'] . '">
                    <div class="mb-3">
                        <label for="id_kabid" class="form-label">id_kabid</label>
                        <input type="text" class="form-control" id="id_kabid" name="id_kabid" value="' . $r['id_kabid'] . '">
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
                        <label for="jabatan" class="form-label">jabatan</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan">
                    </div>
                    <div class="mb-3">
                        <label for="no_tlp" class="form-label">no_tlp</label>
                        <input type="text" class="form-control" id="no_tlp" name="no_tlp">
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
        $id_kabid = $_POST['id_kabid'];
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $jabatan = $_POST['jabatan'];
        $no_tlp = $_POST['no_tlp'];
        $Act = $_POST['Act'];


        $data = array(
            'id_kabid' => $id_kabid,
            'nama' => $nama,
            'nim' => $nim,
            'jabatan' => $jabatan,
            'no_tlp' => $no_tlp,
        );

        return $this->db->table('kabid')->where("id_kabid='$param'")->update($data);
    }

    public function delete($id)
    {

        return $this->db->table('kabid')->where("id_kabid='$id'")->delete();
    }
}
