<?php
$host = $_ENV['DB_HOST'] ?? getenv('DB_HOST') ?: ($_ENV['MYSQLHOST'] ?? getenv('MYSQLHOST') ?: '127.0.0.1');
$port = (int)($_ENV['DB_PORT'] ?? getenv('DB_PORT') ?: ($_ENV['MYSQLPORT'] ?? getenv('MYSQLPORT') ?: 3306));
$user = $_ENV['DB_USERNAME'] ?? getenv('DB_USERNAME') ?: ($_ENV['MYSQLUSER'] ?? getenv('MYSQLUSER') ?: 'root');
$password = $_ENV['DB_PASSWORD'] ?? getenv('DB_PASSWORD') ?: ($_ENV['MYSQLPASSWORD'] ?? getenv('MYSQLPASSWORD') ?: '');
$database = $_ENV['DB_DATABASE'] ?? getenv('DB_DATABASE') ?: ($_ENV['MYSQLDATABASE'] ?? getenv('MYSQLDATABASE') ?: 'storeadmin');

$koneksi = @mysqli_connect($host, $user, $password, $database, $port);
if(!$koneksi){
    die("Koneksi gagal: ".mysqli_connect_error());
}
?>