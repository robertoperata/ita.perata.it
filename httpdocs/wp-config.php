<?php
/**
 * Il file base di configurazione di WordPress.
 *
 * Questo file definisce le seguenti configurazioni: impostazioni MySQL,
 * Prefisso Tabella, Chiavi Segrete, Lingua di WordPress e ABSPATH.
 * E' possibile trovare ultetriori informazioni visitando la pagina: del
 * Codex {@link http://codex.wordpress.org/Editing_wp-config.php
 * Editing wp-config.php}. E' possibile ottenere le impostazioni per
 * MySQL dal proprio fornitore di hosting.
 *
 * Questo file viene utilizzato, durante l'installazione, dallo script
 * di creazione di wp-config.php. Non � necessario utilizzarlo solo via
 * web,� anche possibile copiare questo file in "wp-config.php" e
 * rimepire i valori corretti.
 *
 * @package WordPress
 */

// ** Impostazioni MySQL - E? possibile ottenere questoe informazioni
// ** dal proprio fornitore di hosting ** //
/** Il nome del database di WordPress */
define('DB_NAME', 'worddb');

/** Nome utente del database MySQL */
define('DB_USER', 'root');

/** Password del database MySQL */
define('DB_PASSWORD', 'root');

/** Hostname MySQL  */
define('DB_HOST', '127.0.0.1');

/** Charset del Database da utilizare nella creazione delle tabelle. */
define('DB_CHARSET', 'utf8mb4');

/** Il tipo di Collazione del Database. Da non modificare se non si ha
idea di cosa sia. */
define('DB_COLLATE', '');

/**#@+
 * Chiavi Univoche di Autenticazione e di Salatura.
 *
 * Modificarle con frasi univoche differenti!
 * E' possibile generare tali chiavi utilizzando {@link https://api.wordpress.org/secret-key/1.1/salt/ servizio di chiavi-segrete di WordPress.org}
 * E' possibile cambiare queste chiavi in qualsiasi momento, per invalidare tuttii cookie esistenti. Ci� forzer� tutti gli utenti ad effettuare nuovamente il login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '`Lqj-i%hY_prea)f2y!=Z*H:&CC}]*1r.TW>UUu{`7gLcnnlB4`0-5$(uVMo_Y|v');
define('SECURE_AUTH_KEY',  'ls3;bxkme+^?[+sB)~V~Y%hm&:h7dVO!5at3J|K<_&Z_aeU?P+]+5%]I}(y#v~v|');
define('LOGGED_IN_KEY',    'G_^k~Mq~ox4QgD({_4+-G+_b68><y6#hp<]}{UJ,&yh}ycnO`9c)|g|jd_#+jUZ6');
define('NONCE_KEY',        'xjn#iMs|8PaDEr%rZEq$@jM5OB%#Pg]ZV7Bc0>Kt9WVO? 5fl2&_vsXBy)B/g(<B');
define('AUTH_SALT',        '{N6FGy 7.TVfHw<s?@k_Bpm+R(O4wzbr%fpIR%5v[:&l%W-FMz`W_VIW{Y[HWdc@');
define('SECURE_AUTH_SALT', 'MHK7s3wUy;-VI1W2)UIo`|VHSB1FsfAcG6kzOTe7~0#iuy#z5c9#Ol^u)*ltsrDX');
define('LOGGED_IN_SALT',   'q/[Z>Y@}!b lM,%rYx>:X99)8yPP5?I[|lb-saUiOS=>J}Mc$A)`bS&T0eQN1|!8');
define('NONCE_SALT',       '!-`kwM.(%p=%RUA4L`s+JJZ[i:MEmXXbIq+xZ[dJt!aD?}]*A24XBcbz<|bIh[JH');

/**#@-*/

/**
 * Prefisso Tabella del Database WordPress .
 *
 * E' possibile avere installazioni multiple su di un unico database if you give each a unique
 * fornendo a ciascuna installazione un prefisso univoco.
 * Solo numeri, lettere e sottolineatura!
 */
$table_prefix  = 'wp_';

/**
 * Per gli sviluppatori: modalit� di debug di WordPress.
 *
 * Modificare questa voce a TRUE per abilitare la visualizzazione degli avvisi
 * durante lo sviluppo.
 * E' fortemente raccomandato agli svilupaptori di temi e plugin di utilizare
 * WP_DEBUG all'interno dei loro ambienti di sviluppo.
 */
define('WP_DEBUG', false);

/* Finito, interrompere le modifiche! Buon blogging. */

/** Path assoluto alla directory di WordPress. */
if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');

/** Imposta lle variabili di WordPress ed include i file. */
require_once(ABSPATH . 'wp-settings.php');

define('FS_METHOD', 'direct');
