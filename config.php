<?php

date_default_timezone_set("Asia/Bangkok");

// Always provide a TRAILING SLASH (/) AFTER A PATH
define('URL', 'http://localhost/anres.admin/');

define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'anres_dbo');
define('DB_USER', 'root');
define('DB_PASS', '');

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));
define('WWW_LIBS', ROOT . DS . "libs" . DS);
define('WWW_APPS', ROOT . DS . "apps" . DS);
define('WWW_DOCS', ROOT . DS . "public". DS. 'docs' . DS);
define('WWW_VIEW', ROOT . DS . 'views' . DS);
define('WWW_IMAGES', ROOT . DS . 'public' . DS. 'images' . DS );
define('WWW_IMAGES_AVATAR', WWW_IMAGES . DS . 'avatar' . DS);
define('WWW_UPLOADS', ROOT . DS . "public". DS. 'uploads' . DS);
define('WWW_FORMS', WWW_VIEW . 'Forms' .DS);

define('LIBS', 'libs/');
define('DOCS', URL . 'public/docs/');
define('VIEW', URL . 'views/');
define('CSS', URL . 'public/css/');
define('JS', URL . 'public/js/');
define('FONTS', URL . 'public/fonts/');
define('IMAGES', URL . 'public/images/');
define('AVATAR', URL . 'public/images/avatar/');
define('UPLOADS', URL . "public/uploads/");

define('LANG', 'th');
define('COOKIE_KEY_MEMBER', 'mid');
define('COOKIE_KEY_ADMIN', 'a_id');

// Email
define('MAIL_HOST', "mail.customer-mail.net");
define('MAIL_NAME', 'anresconference2018.org');
define('MAIL_USER', "info@customer-mail.net");
define('MAIL_PASS', "YU1JNa0GdX4foPt");

// The sitewide hashkey, do not change this because its used for passwords!
// This is for other hash keys... Not sure yet
define('HASH_GENERAL_KEY', 'MixitUp200');

// This is for database passwords only
define('HASH_PASSWORD_KEY', 'catsFLYhigh2000miles');

define('RECAPTCHA_SITE_KEY', '6LfPBxMTAAAAALX9MpBvvR2sjCKZidyhU-YXYHCY');
define('RECAPTCHA_SECRET_KEY', '6LfPBxMTAAAAACav7aO-axpuFK6r_fDphq6gAs4i');

/* PATH CENTER */
define('WWW_UPLOADS_',  "..". DS . 'uploads' . DS);
define('WWW_UPLOADS_PAPER', "..". DS . "anres.users" . DS . "public". DS. 'uploads' . DS . "paper");
define('UPLOADS_PAPER', 'http://localhost/anres.users/public/uploads/paper/');
