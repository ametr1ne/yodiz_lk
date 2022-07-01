<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'database_wp' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'root' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', '' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '&`O8Hv!2tOpaEh-/6?>-oI-HL4B)EBHD0CV+Yru{Damg4>H-]Iel_P,W1zKNbVAx' );
define( 'SECURE_AUTH_KEY',  '+Lwh2X==xDOh?Lr-iS0KEA_z):^o]UhvfyX)m7^Y>c~ <>YI;sK%jlg4>^/`?|g(' );
define( 'LOGGED_IN_KEY',    '{ZJtx%q>w-egIs-Op%:N_[=U5r>n:>^D_(q<$t%f%#4Kqb~ *Ad3m:P&Q<Nn8/KC' );
define( 'NONCE_KEY',        'WN9 OuO{$vnC&~fw:@HGq&IuB|~zDmSYCMXa4e/Sc:1]!48w1+5!H;&B5>~h$j_q' );
define( 'AUTH_SALT',        'b^/P*m/[,+QEFl3sx?d7=IQ/!~84x9#vnqTku<9aPGkkmNWed1[-#s`2?3~!lI?/' );
define( 'SECURE_AUTH_SALT', 'R|zU*A+BVvp=PQd.!H=^!0ptcLhP1W9GEaS&{:O<Q.ekSSRh$<0S*#p2E-}F*&W-' );
define( 'LOGGED_IN_SALT',   ',8{^AdoL`88oQVc<T}CZ0g!I%fz1}[R|ep)5gn^XaB|V}v-Z}Dsc4?V,R#`iw]S}' );
define( 'NONCE_SALT',       '[pkZh*lzi?UOJU4$[}WgN@|e*3)%cXtdUwc)lc+?{owFamJ+Y(hr^hJCy=(?5W7#' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
