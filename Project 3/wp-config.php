<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'wordpress' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '1%VK+Fw!St0*8edx4I_1Kh]gs2}`9Gp?9h7-+MMS3PN>Yv,( y+ii:k{Sq|_$Wn-' );
define( 'SECURE_AUTH_KEY',  'C6w@0GAxVPgg7p)g+8`_Fy*mVluyfjJ&9]WkS6|Mik:FjoksnhfoZHR|XNh>!k:i' );
define( 'LOGGED_IN_KEY',    'g|G@]x+2,jW;l76Z}GZF#v!Un1Zzf6Y#m;1SbYYwNf9>}y_Jj>~DYL@9f1q1f=lA' );
define( 'NONCE_KEY',        'GOSq0Q}VVCa+>7hKe<f)jlG7yrOO{.JGNX=shEf =ehu.#;leNDYgb[1S4mf,Zi<' );
define( 'AUTH_SALT',        '4[lkjThQXs/$- Z5(z}IE;~qJ%^*$wYL[el$eGJTV*#@9dxfbp]9y+Ia(FU]>@+`' );
define( 'SECURE_AUTH_SALT', 'zR!h>9Yg}LKcrWd1tOpa,=UcqG@rLXvmU@X9Sr<uPuK:$ieak~ 4&V2hK,Yr+L!I' );
define( 'LOGGED_IN_SALT',   '_h ;UJZ`*/T.RLn X0<wctOB#CO@H=4]+7x_sMy9 7XPDA4DN4c`1lA(z`C,qvD[' );
define( 'NONCE_SALT',       'q2Z,P)1YC)0#<$PX^_rF><1{OtLC9b,MBDXfvw/0;KWapkoYu]Iki_TG#O{kWk-S' );

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
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
