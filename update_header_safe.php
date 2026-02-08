<?php
$file = 'resources/views/partials/header-soal.blade.php';
$content = file_get_contents($file);
$search = '{{ Auth::user() ? Auth::user()->name : (session(\'kode_login\') ?? \'Peserta\') }}';
$replace = '{{ Auth::user() ? Auth::user()->name : \'User\' }}';
$newContent = str_replace($search, $replace, $content);
file_put_contents($file, $newContent);
echo "Updated header-soal successfully.";
