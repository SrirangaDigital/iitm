<?php

define('BASE_URL', 'http://localhost/iitm/');
define('PUBLIC_URL', BASE_URL . 'public/');
define('XML_SRC_URL', BASE_URL . 'md-src/xml/');
define('PHOTO_URL', PUBLIC_URL . 'Photos/');
define('DOWNLOAD_URL', PUBLIC_URL . 'Downloads/');
define('STOCK_IMAGE_URL', PUBLIC_URL . 'images/stock/');
define('RESOURCES_URL', PUBLIC_URL . 'Resources/');
define('JSON_PRECAST_URL', BASE_URL . 'json-precast/');

// Physical location of resources
define('PHY_BASE_URL', '/var/www/html/iitm/');
define('PHY_PUBLIC_URL', PHY_BASE_URL . 'public/');
define('PHY_XML_SRC_URL', PHY_BASE_URL . 'md-src/xml/');
define('PHY_PHOTO_URL', PHY_PUBLIC_URL . 'Photos/');
define('PHY_TXT_URL', PHY_PUBLIC_URL . 'Text/');
define('PHY_DOWNLOAD_URL', PHY_PUBLIC_URL . 'Downloads/');
define('PHY_FLAT_URL', PHY_BASE_URL . 'application/views/flat/');
define('PHY_STOCK_IMAGE_URL', PHY_PUBLIC_URL . 'images/stock/');
define('PHY_RESOURCES_URL', PHY_PUBLIC_URL . 'Resources/');

define('DB_PREFIX', 'iitm');
define('DB_HOST', 'localhost');

// Git config
define('GIT_USER_NAME', 'shivasdst232');
define('GIT_PASSWORD', 'shiva565');
define('GIT_REPO', 'github.com/SrirangaDigital/iitm.git');
define('GIT_REMOTE', 'https://' . GIT_USER_NAME . ':' . GIT_PASSWORD . '@' . GIT_REPO);
define('GIT_EMAIL', 'shiva@srirangadigital.com');

// photo will become iitmPHOTO inside
define('DB_NAME', 'heritage');

define('heritage_USER', 'root');
define('heritage_PASSWORD', 'mysql');

?>
