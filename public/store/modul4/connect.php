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
?>