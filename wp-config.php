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
define('DB_NAME', 'chat');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Xyxg uT9>!Eeky3B}J3<.(FQ:x<q&MFX*S2?%,!tfVNY3@Nx5ms-VG=5lL*cc(5?');
define('SECURE_AUTH_KEY',  '<!c#m%+%Gv34c1oS0(6}Hf5g/(-Wl~xgsTpup#g=ya518BDLseb]l{Aj~0&)wvC#');
define('LOGGED_IN_KEY',    ')[5wup}->6+:=Tx9x*rvHB+U3AGDnSVvbm^b6P9trdK!B[%9MaEnXKuIWI.65Ugf');
define('NONCE_KEY',        ':d1~K-}[s=VsWX!N-x|pAWs`tPngqT{+o@+!}&]OqLcFhy[d_nyv1y)6*6P<R.hx');
define('AUTH_SALT',        'Pc;i*uEP(Z=uA_Hq7!~jV$0=wZ`#8,eLG^}//Un.EiS<WBXv<:MzG)6X;THLx$+^');
define('SECURE_AUTH_SALT', '&sy5^6MwGTjIP_{L4sF-?R/d^zq_DQ`z}[s=Y]3P7>I_gn)o!DY`{#PExP8|=6M[');
define('LOGGED_IN_SALT',   'CZ/Z{(|X7DS/so80DIWR*U*m(d|=,b~e7C)xpo(,EPPg-Re+gj[:[?%8feR]E/XX');
define('NONCE_SALT',       ' >xu[fbBj<;;BtG&]Z`xm,6+}+K(E+|O6@sNv1v7+LUG0MeN*DP~,t4%D{Z*0xFH');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
