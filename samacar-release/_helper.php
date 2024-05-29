<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('Asia/Dhaka');
define('JSON_FILENAME', 'laraupdater.json');

class Helper
{
    const LOGIN_TIME = 900;
    const REMOVE_OLD_FILE_AFTER = 20; // 20 days
    const PASSWORD_HASH = "$2y$10$0BSwZBkf6d7Y9wqpE6rhl.c06L00bmk1z1Ahw.vOibfuYEhDElzVC"; //jayapatakaswami108

    public static $data = [];
    protected static $onlyInstance;

    protected static function getself()
    {
        if (static::$onlyInstance === null) {
            static::$onlyInstance = new Helper;
        }
        return static::$onlyInstance;
    }

    static function checkLoginStatus(){
        if (isset($_SESSION['login']) && (time() - $_SESSION['login'] > Helper::LOGIN_TIME)) {
            session_unset();
            session_destroy();
        }
    }
    static public function removeOldFiles()
    {
        $files = glob(__DIR__ . "/*.zip");
        $now   = time();
        foreach ($files as $file) {
            if (is_file($file)) {
                if ($now - filemtime($file) >= 60 * 60 * 24 * static::REMOVE_OLD_FILE_AFTER) { // 20 days
                    unlink($file);
                }
            }
        }
        return static::getself();
    }

    static function updateReleaseInfo($data = null)
    {
        $data = $data ?? self::$data;
        $release_info = json_decode(file_get_contents('release.json'), true);
        $release_info[] = ['id' => count($release_info) + 1] + $data;
        file_put_contents('release.json', json_encode($release_info));
        return static::getself();
    }

    static function updateUpdaterInfo($version, $filename, $description)
    {
        $data = [
            "version" => $version,
            "date" => date('D d-M-Y h:i A'),
            "archive" => $filename,
            "description" => $description
        ];
        file_put_contents(JSON_FILENAME, json_encode($data));
        self::$data = $data;
        return static::getself();
    }

    static function checkFileType($file): bool
    {
        $zipTypes = array(
            'application/zip', 'application/x-zip-compressed',
            'multipart/x-zip', 'application/x-compressed'
        );
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $isZipExtension = ($extension == "zip" ? true : false);
        $isZipFile = in_array($file["type"], $zipTypes);

        if ($isZipExtension && $isZipFile) {
            return true;
        };
        return false;
    }

    static function upload($file, $version, $description): string
    {
        $response_info = "Something Went wrong...";
        if (self::checkFileType($file)) {
            $filename = static::getFileName($file, $version);
            $dir = __DIR__ . '/' . $filename;
            if (is_writable(dirname($dir))) {
                self::updateUpdaterInfo($version, $filename, $description)
                    ->updateReleaseInfo();
                $uploaded = move_uploaded_file($file['tmp_name'], $dir);
                $response_info = $uploaded ? "New Updated Uploaded Successfully." : "Uploading Failed ...";
            } else {
                $response_info = "Directory is not writable";
            }
        } else {
            $response_info = "Only <b class='text-danger'>.ZIP</b> file is allowed";
        }
        return $response_info;
    }

    static function getFileName($file, $version): string
    {
        return basename($file['name'], '.zip') . '-' . $version . '.zip';
    }
}
