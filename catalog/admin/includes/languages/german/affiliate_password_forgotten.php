<?php
/*
$Id: affiliate_password_forgotten.php 1692 2012-02-26 01:26:50Z michael.oscmax@gmail.com $

  osCmax e-Commerce
  http://www.oscmax.com

  Copyright 2000 - 2011 osCmax

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE', 'Passwort zum Affiliateprogramm vergessen');
define('NAVBAR_TITLE_1', 'Anmelden');
define('NAVBAR_TITLE_2', 'Passwort zum Affiliateprogramm vergessen');
define('HEADING_TITLE', 'Ich habe mein Affiliatepasswort vergessen.');
define('TEXT_NO_EMAIL_ADDRESS_FOUND', '<font color="#ff0000"><b>ACHTUNG:</b></font> Die eingegebene E-Mail-Adresse ist nicht registriert. Bitte versuchen Sie es noch einmal.');
define('EMAIL_PASSWORD_REMINDER_SUBJECT', STORE_NAME . ' - Neues Passwort zum Affiliateprogramm');
define('EMAIL_PASSWORD_REMINDER_BODY', '�ber die Adresse ' . $REMOTE_ADDR . ' haben wir eine Anfrage zur Passworterneuerung f�r Ihren Zugang zum Affiliateprogramm erhalten.' . "\n\n" . 'Ihr neues Passwort f�r Ihren Zugang zum Affiliateprogramm von \'' . STORE_NAME . '\' lautet ab sofort:' . "\n\n" . '   %s' . "\n\n");
define('TEXT_PASSWORD_SENT', 'Ein neues Passwort wurde an Ihre E-Mail-Adresse verschickt.');
?>