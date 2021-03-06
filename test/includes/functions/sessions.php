<?php
/*
  $Id: sessions.php 1752 2007-12-21 05:59:30Z hpdl $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2007 osCommerce

  Released under the GNU General Public License
*/

  function tep_session_start() {
    global $HTTP_GET_VARS, $HTTP_POST_VARS, $HTTP_COOKIE_VARS;

    $sane_session_id = true;

    if (isset($HTTP_GET_VARS[tep_session_name()])) {
      if (preg_match('/^[a-zA-Z0-9]+$/', $HTTP_GET_VARS[tep_session_name()]) == false) {
        unset($HTTP_GET_VARS[tep_session_name()]);

        $sane_session_id = false;
      }
    } elseif (isset($HTTP_POST_VARS[tep_session_name()])) {
      if (preg_match('/^[a-zA-Z0-9]+$/', $HTTP_POST_VARS[tep_session_name()]) == false) {
        unset($HTTP_POST_VARS[tep_session_name()]);

        $sane_session_id = false;
      }
    } elseif (isset($HTTP_COOKIE_VARS[tep_session_name()])) {
      if (preg_match('/^[a-zA-Z0-9]+$/', $HTTP_COOKIE_VARS[tep_session_name()]) == false) {
        $session_data = session_get_cookie_params();

        setcookie(tep_session_name(), '', time()-42000, $session_data['path'], $session_data['domain']);

        $sane_session_id = false;
      }
    }

    if ($sane_session_id == false) {
      tep_redirect(tep_href_link(FILENAME_DEFAULT, '', 'NONSSL', false));
    }

    //return session_start();
  }

  function tep_session_register($variable) {
    global $session_started;

    if ($session_started == true) {
      if (PHP_VERSION < 4.3) {
        return session_register($variable);
      } else {
        if (isset($GLOBALS[$variable])) {
          $_SESSION[$variable] =& $GLOBALS[$variable];
        } else {
          $_SESSION[$variable] = null;
        }
      }
    }

    return false;
  }

  function tep_session_is_registered($variable) {
    if (PHP_VERSION < 4.3) {
      return session_is_registered($variable);
    } else {
      return array_key_exists($variable, $_SESSION);
    }
  }

  function tep_session_unregister($variable) {
    if (PHP_VERSION < 4.3) {
      return session_unregister($variable);
    } else {
      unset($_SESSION[$variable]);
    }
  }

  function tep_session_id($sessid = '') {
    if (!empty($sessid)) {
      return session_id($sessid);
    } else {
      return session_id();
    }
  }

  function tep_session_name($name = '') {
    if (!empty($name)) {
      return session_name($name);
    } else {
      return session_name();
    }
  }

  function tep_session_close() {
    if (PHP_VERSION >= '4.0.4') {
      return session_write_close();
    } elseif (function_exists('session_close')) {
      return session_close();
    }
  }

  function tep_session_destroy() {
    return session_destroy();
  }

  function tep_session_save_path($path = '') {
    if (!empty($path)) {
      return session_save_path($path);
    } else {
      return session_save_path();
    }
  }

  function tep_session_recreate() {
    if (PHP_VERSION >= 4.1) {
      $session_backup = $_SESSION;

      unset($_COOKIE[tep_session_name()]);

      tep_session_destroy();

      if (STORE_SESSIONS == 'mysql') {
        session_set_save_handler('_sess_open', '_sess_close', '_sess_read', '_sess_write', '_sess_destroy', '_sess_gc');
      }

      tep_session_start();

      $_SESSION = $session_backup;
      unset($session_backup);
    }
  }
?>
