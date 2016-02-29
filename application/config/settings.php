<?php

define('DEFAULT_JOURNAL', 'sadh');
define('DEFAULT_VOLUME', '025');
define('DEFAULT_ISSUE', '01');
define('DEFAULT_PAGE', '0001-0010');

// db table names
define('METADATA_TABLE', 'photos');

// search settings
define('SEARCH_OPERAND', 'AND');

// user settings (login and registration)
define('SALT', 'iitm');
define('REQUIRE_EMAIL_VALIDATION', True);//Set these values to True only
define('REQUIRE_RESET_PASSWORD', True);//if outbound mails can be sent from the server

// mailer settings
define('SERVICE_EMAIL', 'webadmin@iitm.ac.in');
define('SERVICE_NAME', 'Indian Institute of Technology Madras');


?>
