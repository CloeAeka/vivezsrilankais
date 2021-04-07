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
define( 'DB_NAME', 'cloevs' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         'P[k*^-;SzS+eyQ~8.ZbL6<rTx?Q5*`Q(GT~{a6>nu*Q(L1%{]L~9a/,OF8OfWH+^' );
define( 'SECURE_AUTH_KEY',  '_%^R#{G81okKa;UEfH1dBXWzRHgL0Y]g2bCVZrkp3}VNb;m0_ego]jfq*P(QvRBs' );
define( 'LOGGED_IN_KEY',    'y{F.<zVnG3} (7w>$g$R0DCX~JXr%# U[7z/#TN7]kX0&`e(!G}K,lw(s@8!=e7%' );
define( 'NONCE_KEY',        '3WbzjTMbZ)SV=~t@b.TL-#H#)eILM%:kXo#jlx*YC7RG|){YvpR9+M:/&$hnK`;:' );
define( 'AUTH_SALT',        'XX&g3p0(9C*Jo^M&@r,ng>6|320y=0cjS0`#+by(@Aj;t12.%Z:uS(5>C30kuu}Y' );
define( 'SECURE_AUTH_SALT', 'pli3|+_d+XIc&%db>%/f7}MUe$}JyBC$+:zgFoj=^hH)L_h3F&t7e`.os,.90#W0' );
define( 'LOGGED_IN_SALT',   'f5(6{,`{g@<XVd}}MukeN*AUtQ8Ym,}LYNjDF?.tAlO^&AR]a-sp.am2J1bq<Dyy' );
define( 'NONCE_SALT',       '83YiT-uI_@z`%G9? r<0t<0iOMKL |?X8lx}eu< s`_9vln|?ARa)gmSngOD/Q;<' );
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
