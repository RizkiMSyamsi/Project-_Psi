<?php
include("config.php");

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=student_list.csv');

$output = fopen('php://output', 'w');

fputcsv($output, array('No', 'Nama', 'NPM', 'Kelas', 'Jurusan', 'Lokasi Kampus', 'Tempat Tanggal Lahir', 'Jenis Kelamin', 'Alamat', 'NoHP', 'Email', 'Posisi', 'IPK Terakhir', 'CV', 'KRS', 'Pas Foto', 'KTM', 'KTP', 'Rangkuman Nilai', 'Certificate'));

$sql = "SELECT * FROM daftar_cals";
$query = mysqli_query($db, $sql);

while($siswa = mysqli_fetch_assoc($query)){
    fputcsv($output, $siswa);
}

fclose($output);
?>
