<?php
  if(!defined('DOKU_INC')) die();
  if(!defined('DOKU_PLUGIN')) define('DOKU_PLUGIN',DOKU_INC.'lib/plugins/');
  require_once(DOKU_PLUGIN.'action.php');

  class action_plugin_legalnoticelogin extends DokuWiki_Action_Plugin {

    function getInfo(){
      return array(
        'author' => 'Christian Marg',
        'email'  => 'marg@rz.tu-clausthal.de',
        'date'   => '2009-06-05',
        'name'   => 'legalnoticelogin',
        'desc'   => 'adds a legal (or other) notice below the login form',
        'url'    => 'http://www.dokuwiki.org/plugin:ondeniedlogin',
      );
    }

  function register(&$controller) {
      $controller->register_hook('TPL_ACT_RENDER', 'AFTER',  $this, 'legalnoticelogin');
    }

    function legalnoticelogin(&$event, $param) {
	global $conf,$ACT;

	if($ACT!='login') return;
	echo p_render('xhtml', p_get_instructions($this->getConf('text')), $info);
    }

  }
