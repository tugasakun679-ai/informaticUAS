<?php
$host = $_ENV['DB_HOST'] ?? getenv('DB_HOST') ?: ($_ENV['MYSQLHOST'] ?? getenv('MYSQLHOST') ?: '127.0.0.1');
$port = (int)($_ENV['DB_PORT'] ?? getenv('DB_PORT') ?: ($_ENV['MYSQLPORT'] ?? getenv('MYSQLPORT') ?: 3306));
$user = $_ENV['DB_USERNAME'] ?? getenv('DB_USERNAME') ?: ($_ENV['MYSQLUSER'] ?? getenv('MYSQLUSER') ?: 'root');
$pass = $_ENV['DB_PASSWORD'] ?? getenv('DB_PASSWORD') ?: ($_ENV['MYSQLPASSWORD'] ?? getenv('MYSQLPASSWORD') ?: '');
$db   = $_ENV['DB_DATABASE'] ?? getenv('DB_DATABASE') ?: ($_ENV['MYSQLDATABASE'] ?? getenv('MYSQLDATABASE') ?: 'storeadmin');

$conn = @mysqli_connect($host,$user,$pass,$db,$port);

if(!$conn){
    die("Koneksi gagal: ".mysqli_connect_error());
}

@mysqli_query($conn, "CREATE TABLE IF NOT EXISTS pendaftarans (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(255) NOT NULL,
    tempat_lahir VARCHAR(255) NOT NULL,
    tanggal_lahir VARCHAR(255) NOT NULL,
    jk VARCHAR(50) NOT NULL,
    alamat TEXT NOT NULL,
    sekolah_asal VARCHAR(255) NOT NULL,
    nama_sekolah VARCHAR(255) NOT NULL,
    matematika DOUBLE DEFAULT 0,
    inggris DOUBLE DEFAULT 0,
    indonesia DOUBLE DEFAULT 0,
    pilihan1 VARCHAR(255) NOT NULL,
    pilihan2 VARCHAR(255) NOT NULL,
    alasan TEXT NULL,
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
?>