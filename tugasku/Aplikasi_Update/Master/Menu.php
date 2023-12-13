<?php

namespace Master;

class Menu
{
    public function topMenu()
    {
        $base = "http://localhost/tugasku/Aplikasi_Update/index.php?target=";
        $data = [
            array('text' => 'Home', 'link' => $base . 'home'),
            array('text' => 'kadis', 'link' => $base . 'kadis'),
            array('text' => 'pegawai', 'link' => $base . 'pegawai'),
            array('text' => 'kabid', 'link' => $base . 'kabid')
        ];
        return $data;
    }
}
