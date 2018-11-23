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
define('DB_NAME', 'progress');

/** Имя пользователя MySQL */
define('DB_USER', 'sveta');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '15021973');

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
define('AUTH_KEY',         'xBnh^C:|O`$W@tPT|d{fu950Y3%{?G)5fY}*Ns!,C@E_|;0s}XxaJxwHisVrGz[e');
define('SECURE_AUTH_KEY',  '#_jY1`@$lUB12vdA,fH#u3J!mvq:oE3<]-K-O5(<(sq=H4lYS6p-3% O]58Gm`kb');
define('LOGGED_IN_KEY',    'W6VBYfYWLaA_XD>UUa&f2M{:ZwA)w0gmv*ivmBSbDv%w>AP,8LZ[CUVr3a>I5fl5');
define('NONCE_KEY',        'l^8NC-C1(!~w^5eb|gI.^~@dP~0N>giL{gEl7+<-*Lgy[]{VFuf*li[jf-ymm_w-');
define('AUTH_SALT',        'Qpw;}a+yKo4OhkK}mSdCPP&kK]JS{EN)@0M]X)_/7xn#WIXHd,@`q7Aj(g>uqI[o');
define('SECURE_AUTH_SALT', 'V?3R|cD^BzSU[WW!#qfWV5tV5=W:}Ul5B{jm%pKl~QPAA!]<hc-@QdYy&kTb52(Q');
define('LOGGED_IN_SALT',   'dC[r<Fd=pF|iL5`6-Jl}Zq01!=RuHk A{G8{n{V!ZB)~ z;fi%2jW;OH:1+!fQf6');
define('NONCE_SALT',       'n/Rh><6d%dOR[<KkE[sXG( W!n#af.N}.^i.p/3o?McVy(OZ?_EGj;-Q(|7ijFEm');

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
