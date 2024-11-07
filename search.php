<?php
include("config.php");

if(isset($_GET['search'])){
    $search = mysqli_real_escape_string($db, $_GET['search']);
    
    $sql = "SELECT * FROM daftar_cals WHERE nama LIKE '%$search%'";
    $query = mysqli_query($db, $sql);

    echo "<table border='1'>";
    echo "<thead>
            <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NPM</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Lokasi Kampus</th>
            <th>Tempat Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>NoHP</th>
            <th>Email</th>
            <th>Posisi</th>
            <th>IPK Terakhir</th>
            <th>CV</th>
            <th>KRS</th>
            <th>Pas Foto</th>
            <th>KTM</th>
            <th>KTP</th>
            <th>Rangkuman Nilai</th>
            <th>Certificate</th>
            <th>Tindakan</th>
            </tr>
          </thead>";
    echo "<tbody>";

    while($mahasiswa = mysqli_fetch_array($query)){
        echo "<tr>";
        echo "<td>".$mahasiswa['id']."</td>";
        echo "<td>".$mahasiswa['nama']."</td>";
        echo "<td>".$mahasiswa['npm']."</td>";
        echo "<td>".$mahasiswa['kelas']."</td>";
        echo "<td>".$mahasiswa['jurusan']."</td>";
        echo "<td>".$mahasiswa['lokasi_kampus']."</td>";
        echo "<td>".$mahasiswa['ttl']."</td>";
        echo "<td>".$mahasiswa['jenis_kelamin']."</td>";
        echo "<td>".$mahasiswa['alamat']."</td>";
        echo "<td>".$mahasiswa['no_hp']."</td>";
        echo "<td>".$mahasiswa['email']."</td>";
        echo "<td>".$mahasiswa['posisi']."</td>";
        echo "<td>".$mahasiswa['ipk_terakhir']."</td>";
        echo "<td><a href='uploads/".$mahasiswa['cv']."'>Download</a></td>";
        echo "<td><a href='uploads/".$mahasiswa['krs']."'>Download</a></td>";
        echo "<td><a href='uploads/".$mahasiswa['pas_foto']."'>View</a></td>";
        echo "<td><a href='uploads/".$mahasiswa['ktm']."'>Download</a></td>";
        echo "<td><a href='uploads/".$mahasiswa['ktp']."'>Download</a></td>";
        echo "<td><a href='uploads/".$mahasiswa['rangkuman_nilai']."'>Download</a></td>";
        echo "<td><a href='uploads/".$mahasiswa['certificate']."'>Download</a></td>";
        echo "<td>";
        echo "<a href='form-edit.php?id=".$mahasiswa['id']."'>Edit</a> | ";
        echo "<a href='hapus.php?id=".$mahasiswa['id']."'>Hapus</a>";
        echo "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";

    echo "<p>Total: ".mysqli_num_rows($query)."</p>";
}
?>
