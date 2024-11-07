<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Programmer dan Asisten Laboratorium Psikologi</title>
</head>

<body>
    <header>
        <h3>Pendaftaran Programmer dan Asisten Laboratorium Psikologi</h3>
        <h1>Universitas Gunadarma</h1>
    </header>

    <h4>Menu</h4>
    <nav>
        <?php if(isset($_GET['status'])): ?>
            <p>
                <?php
                    if($_GET['status'] == 'sukses'){
                        echo "Pendaftaran telah berhasil! ";
                    } else {
                        echo "Pendaftaran gagal! Silakan coba lagi.";
                    }
                ?>
            </p>
        <?php endif; ?>
        <ul>
            <li><a href="form-daftar.php">Daftar</a></li>
            <li><a href="login.php">Admin</a></li>
        </ul>
    </nav>

</body>
</html>
