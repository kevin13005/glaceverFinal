<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'glaceverpro' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost:3308' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ',R}N(GZ,+r}L)6u9o^iN`2:HA7z_Rwaxs}.efX>G..(U!UMi73;cV)1V^wDCAT@q' );
define( 'SECURE_AUTH_KEY',  'LYLYBKNg@ohG-5?I+.4&<He|@#0.cNv+JNvQkMI/84Cq(cYy:}6LfY+k}3NK(.rt' );
define( 'LOGGED_IN_KEY',    'xo}T-W3*UK&,7mHq]u,qFk22+>C-`/spSz1x!0Q)pb/m4=]JL;v{~r>8?0Zp[cfd' );
define( 'NONCE_KEY',        '2uJsw~kh;wg)JP_+ll>9l,Z0tk_Ody!hH$b6E[Ak)ho4E!c_?,T;{n@_gQ~yf!HT' );
define( 'AUTH_SALT',        'PzL@tFPO5+{0I%vh1WyR`<=_iios[IA,`s.]}gWf26d dT]ao_lA8h.NGuPnN&[%' );
define( 'SECURE_AUTH_SALT', 'sUS%dY-!?-CHtSB,.EyLC,)/t /(;+7TBLr]W^SY/M2[]|Wr 6524nM,:k0aU6Us' );
define( 'LOGGED_IN_SALT',   '4#veygh0my,&gQvGYq}-KIbQ!eTt>1-@fX&lu#4M3c]w%r:lr408|qPq[>gbM Fb' );
define( 'NONCE_SALT',       'g xSe:#8gdL>;:T}.1)8buSg%I%a2wHXnyzj0b0APN-yncYjj$-]^#ocz&:lVu9K' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
