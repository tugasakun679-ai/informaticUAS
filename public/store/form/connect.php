<?php
$host = $_SERVER['DB_HOST'] ?? $_ENV['DB_HOST'] ?? getenv('DB_HOST') ?: ($_SERVER['MYSQLHOST'] ?? $_ENV['MYSQLHOST'] ?? getenv('MYSQLHOST') ?: '127.0.0.1');
$port = (int)($_SERVER['DB_PORT'] ?? $_ENV['DB_PORT'] ?? getenv('DB_PORT') ?: ($_SERVER['MYSQLPORT'] ?? $_ENV['MYSQLPORT'] ?? getenv('MYSQLPORT') ?: 3306));
$user = $_SERVER['DB_USERNAME'] ?? $_ENV['DB_USERNAME'] ?? getenv('DB_USERNAME') ?: ($_SERVER['MYSQLUSER'] ?? $_ENV['MYSQLUSER'] ?? getenv('MYSQLUSER') ?: 'root');
$pass = $_SERVER['DB_PASSWORD'] ?? $_ENV['DB_PASSWORD'] ?? getenv('DB_PASSWORD') ?: ($_SERVER['MYSQLPASSWORD'] ?? $_ENV['MYSQLPASSWORD'] ?? getenv('MYSQLPASSWORD') ?: '');
$db   = $_SERVER['DB_DATABASE'] ?? $_ENV['DB_DATABASE'] ?? getenv('DB_DATABASE') ?: ($_SERVER['MYSQLDATABASE'] ?? $_ENV['MYSQLDATABASE'] ?? getenv('MYSQLDATABASE') ?: 'storeadmin');

$db_url = $_SERVER['MYSQL_URL'] ?? $_ENV['MYSQL_URL'] ?? getenv('MYSQL_URL') ?: ($_SERVER['DATABASE_URL'] ?? $_ENV['DATABASE_URL'] ?? getenv('DATABASE_URL') ?: '');
if (!empty($db_url)) {
    $parsed = parse_url($db_url);
    if ($parsed) {
        if (!empty($parsed['host'])) $host = $parsed['host'];
        if (!empty($parsed['port'])) $port = (int)$parsed['port'];
        if (!empty($parsed['user'])) $user = $parsed['user'];
        if (isset($parsed['pass'])) $pass = $parsed['pass'];
        if (!empty($parsed['path'])) $db = ltrim($parsed['path'], '/');
    }
}

$conn = @mysqli_connect($host,$user,$pass,$db,$port);

if($conn && $conn instanceof mysqli){
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
} else {
    $conn = null;
}
?>