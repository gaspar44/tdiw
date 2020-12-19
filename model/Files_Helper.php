<?php
require_once __DIR__ . '/../model/Connection.php';
class FilesHelper {
    private $absoluteRoute;
    private $userID;
    private $newRoute;
    private $conn;
    private $userImagesHome;

    public function __construct($userID)
    {
        $this->userImagesHome = 'view/resources/userImages/';
        $this->absoluteRoute = $this->getHome() . $this->userImagesHome;
        $this->userID = $userID;
        $this->conn = new Connection();
        $this->newRoute = null;
    }

    private function getHome() {
        $defaultRoute = '/home/TDIW/tdiw-b8/public_html/';
        return getenv("PICTURES_HOME") == FALSE ? $defaultRoute : getenv("PICTURES_HOME");
    }

    public function saveFileToDiskAndDatabase($fileOriginalName, $fileDestination)
    {
        $this->newRoute = $this->userID . "_" . $fileDestination;
        $ok = $this->saveFileToDisk($fileOriginalName,$this->absoluteRoute . $this->newRoute);

        if (!$ok)
            return false;

        $ok = $this->saveFileToDatabase();

        if (!$ok)
            return false;

        return true;
    }

    private function saveFileToDisk($fileOriginalName, $fileDestination) {
        $ok = move_uploaded_file($fileOriginalName,$fileDestination);

        if (!$ok)
            return false;

        return true;
    }

    private function saveFileToDatabase() {
        $sqlQuery = 'UPDATE usuario SET Picture =:newPicture WHERE id=:userID';
        $parameters = [
            'newPicture' => $this->userImagesHome .  $this->newRoute,
            'userID' => $this->userID
        ];

        $this->conn->doQuery($sqlQuery,$parameters);

        return true;
    }
}

?>