<?php

// load Smarty library
require('lib/smarty-3.1.32/libs/Smarty.class.php');

// The setup.php file is a good place to load
// required application library files, and you
// can do that right here. An example:
// require('guestbook/guestbook.lib.php');

class SmartyEngine extends Smarty {

   function __construct()
   {

        // Class Constructor.
        // These automatically get set with each new instance.

        parent::__construct();

        $this->setTemplateDir('templates/');
        $this->setCompileDir('templates_c/');
        // $this->setConfigDir('/web/www.example.com/guestbook/configs/');
        $this->setCacheDir('cache/');

        // $this->caching = Smarty::CACHING_LIFETIME_CURRENT;
        $this->caching = 0;
   }
}
?>
