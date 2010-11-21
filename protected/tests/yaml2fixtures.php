<?php
require 'lib/sfYamlParser.php';
$yaml = new sfYamlParser;
//$fix = array('fakultas','jenjang','jurusan','kabupaten','kecamatan','kelompok','mahasiswa','program_kkn');
$fix = array(
    'berita',
    'fakultas',
    'jenjang',
    'jurusan',
    'kabupaten',
    'kecamatan',
    'kelompok',
    'mahasiswa',
    'prioritas',
    'program_kkn',
    'user'
);

foreach($fix as $f) {
    $content = preg_replace('#([0-9a-zA-Z]+): (.+)#','$1: \'$2\'',file_get_contents("yaml/{$f}.yml"));
    $value = $yaml->parse($content);
    $str = "<?php \nreturn " . var_export($value,true) . ";";
    file_put_contents("fixtures/{$f}.php",$str);
}
