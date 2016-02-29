<?php

class viewHelper extends View {

	public function __construct() {

	}

    public function getDetailByField($json = '', $field) {

        $data = json_decode($json, true);

        return (isset($data[$field])) ? $data[$field] : '';
    }

    public function getPhotoCount($id = '') {

        $count = sizeof(glob(PHY_PHOTO_URL . $id . '/*.json'));
        return ($count > 1) ? $count . ' Photographs' : $count . ' Photograph';
    }

    public function includeRandomThumbnail($id = '') {

        $photos = glob(PHY_PHOTO_URL . $id . '/thumbs/*.JPG');
        $randNum = rand(0, sizeof($photos) - 1);
        $photoSelected = $photos[$randNum];

        return str_replace(PHY_PHOTO_URL, PHOTO_URL, $photoSelected);
    }
}

?>
