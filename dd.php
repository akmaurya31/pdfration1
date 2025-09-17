<?php
// $host = "database-1.cz4wamu0uos0.eu-north-1.rds.amazonaws.com";
// $user = "admin";
// $pass = "SecurePass123";
// $db   = "cardration";

include('dbconn.php');

// $mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

$conn = new mysqli($databaseHost, $databaseUsername, $databasePassword, $databaseName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create temporary folder
$tmpDir = sys_get_temp_dir() . "/csv_export_" . uniqid();
mkdir($tmpDir);

// Get all tables
$tables = [];
$result = $conn->query("SHOW TABLES");
while ($row = $result->fetch_row()) {
    $tables[] = $row[0];
}

// Export each table to CSV
foreach ($tables as $table) {
    $filePath = "$tmpDir/{$table}.csv";
    $fp = fopen($filePath, 'w');

    $res = $conn->query("SELECT * FROM `$table`");

    // Write column headers
    $fields = $res->fetch_fields();
    $headers = [];
    foreach ($fields as $field) {
        $headers[] = $field->name;
    }
    fputcsv($fp, $headers);

    // Write rows
    while ($row = $res->fetch_assoc()) {
        fputcsv($fp, $row);
    }

    fclose($fp);
}

// Create ZIP file
$zipFile = sys_get_temp_dir() . "/{$db}_backup_" . date("Ymd_His") . ".zip";
$zip = new ZipArchive();
$zip->open($zipFile, ZipArchive::CREATE);

foreach ($tables as $table) {
    $zip->addFile("$tmpDir/{$table}.csv", "{$table}.csv");
}
$zip->close();

// Send ZIP for download
header('Content-Type: application/zip');
header('Content-Disposition: attachment; filename="' . basename($zipFile) . '"');
readfile($zipFile);

// Cleanup
foreach ($tables as $table) {
    unlink("$tmpDir/{$table}.csv");
}
rmdir($tmpDir);
unlink($zipFile);
exit;
?>
