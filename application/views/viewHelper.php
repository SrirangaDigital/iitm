<?php

class viewHelper extends View {

    public function __construct() {

    }

    public function getDetailByField($json = '', $firstField = '', $secondField = '') {

        $data = json_decode($json, true);

        if (isset($data[$firstField])) {
      
            return $data[$firstField];
        }
        elseif (isset($data[$secondField])) {
      
            return $data[$secondField];
        }

        return '';
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

    public function displayFieldData($json, $auxJson='') {

        $data = json_decode($json, true);
        
        if ($auxJson) $data = array_merge($data, json_decode($auxJson, true));
        
        if(isset($data['id'])) {

            $data['id'] = $data['albumID'] . '/' . $data['id'];
            unset($data['albumID']);
        }

        $html = '';
        $html .= '<ul class="list-unstyled">';

        foreach ($data as $key => $value) {

            if(preg_match('/keyword/i', $key)) {

                $html .= '<li class="keywords"><strong>' . $key . ':</strong><span class="image-desc-meta">';
                
                $keywords = explode(',', $value);
                foreach ($keywords as $keyword) {
   
                    $html .= '<a href="' . BASE_URL . 'search/field/?description=' . $keyword . '">' . str_replace(' ', '&nbsp;', $keyword) . '</a> ';
                }
                
                $html .= '</span></li>' . "\n";
            }
            else{

                $html .= '<li><strong>' . $key . ':</strong><span class="image-desc-meta">' . $value . '</span></li>' . "\n";
            }
        }

        $html .= '<li>Do you know details about this picture? Mail us at heritage@iitm.ac.in quoting the image ID. Thank you.</li>';

        $html .= '</ul>';

        return $html;
        // <li class="keywords"><strong>Keywords:</strong><span class="image-desc-meta"><a href="#">Zail Singh</a> <a href="#">Convocation</a> <a href="#">Indaresan</a> <a href="#">Raja Ramanna</a> <a href="#">Sheila Kaul</a> <a href="#">Students\'&nbsp;Activities&nbsp;Centre</a></span></li>
    }
}

?>
