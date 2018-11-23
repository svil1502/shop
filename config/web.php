<?php
use \himiklab\sitemap\behaviors\SitemapBehavior;

?>
<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'ru-RU',
    'defaultRoute'=>'category/index',

    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
            'layout'=> 'admin',
             'defaultRoute'=>'order/index',
        ],
        'yii2images' => [
            'class' => 'rico\yii2images\Module',
            //be sure, that permissions ok
            //if you cant avoid permission errors you have to create "images" folder in web root manually and set 777 permissions
            'imagesStorePath' => 'upload/store', //path to origin images
            'imagesCachePath' => 'upload/cache', //path to resized copies
            'graphicsLibrary' => 'GD', //but really its better to use 'Imagick'
            'placeHolderPath' => '@webroot/upload/store/no-image.png', // if you want to get placeholder when image not exists, string will be processed by Yii::getAlias
            'imageCompressionQuality' => 100, // Optional. Default value is 85.

        ],
        'sitemap' => [
            'class' => 'himiklab\sitemap\Sitemap',
            'models' => [
                // your models
//                'app\models\Category',
//                'app\models\Blog',
//                'app\models\Brand',
//                'app\models\Cart',
//                'app\models\Comment',
                //'app\modules\news\models\News',
                // or configuration for creating a behavior
                [
                   // 'class' => 'app\modules\news\models\News',
                    'behaviors' => [
                        'sitemap' => [
                            'class' => SitemapBehavior::className(),
                            'scope' => function ($model) {
                                /** @var \yii\db\ActiveQuery $model */
                                $model->select(['url', 'lastmod']);
                                $model->andWhere(['is_deleted' => 0]);
                            },
                            'dataClosure' => function ($model) {
                                /** @var self $model */
                                return [
                                    'loc' => Url::to($model->url, true),
                                    'lastmod' => strtotime($model->lastmod),
                                    'changefreq' => SitemapBehavior::CHANGEFREQ_DAILY,
                                    'priority' => 0.8
                                ];
                            }
                        ],
                    ],
                ],
            ],
            'urls'=> [
                // your additional urls
                [
                    'loc' => '/news/index',
                    'changefreq' => \himiklab\sitemap\behaviors\SitemapBehavior::CHANGEFREQ_DAILY,
                    'priority' => 0.8,
                    'news' => [
                        'publication'   => [
                            'name'          => 'Example Blog',
                            'language'      => 'en',
                        ],
                        'access'            => 'Subscription',
                        'genres'            => 'Blog, UserGenerated',
                        'publication_date'  => 'YYYY-MM-DDThh:mm:ssTZD',
                        'title'             => 'Example Title',
                        'keywords'          => 'example, keywords, comma-separated',
                        'stock_tickers'     => 'NASDAQ:A, NASDAQ:B',
                    ],
                    'images' => [
                        [
                            'loc'           => 'http://example.com/image.jpg',
                            'caption'       => 'This is an example of a caption of an image',
                            'geo_location'  => 'City, State',
                            'title'         => 'Example image',
                            'license'       => 'http://example.com/license',
                        ],
                    ],
                ],
            ],
            'enableGzip' => true, // default is false
            'cacheExpire' => 1, // 1 second. Default is 24 hours
        ],
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            // 'cookieValidationKey' => 'OFwTWd2ye4uytMHdXAmuLG3jtikD_3zw',
            'cookieValidationKey' => 'yYy4YYYX8lYyYyQOl8vOcO6ROo7i8twO',
           // 'baseUrl' => '',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false, //true когда почта реально не будет отправляться,
            //если надо отправлять - устанавливаем в false и устанавливаем конфигурацию
            //smtp сервера - пример есть в непереводной документации
            //https://www.yiiframework.com/extension/yiisoft/yii2-swiftmailer/doc/api/2.2/yii-swiftmailer-mailer
        //    'host' => 'smtp.gmail.com',
          //  'username' => 'username',
           // 'password' => 'password',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.mail.ru',
                'username' => 'developersvil1502',
                'password' => 'Tanka2905Iantra',
                'port' => '465',
                'encryption' => 'ssl',
            ],

        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,

        'urlManager' => [
            'enablePrettyUrl' => true, //
            'showScriptName' => false,

            //для gii
//            'enablePrettyUrl' => false,
//           'showScriptName' => true,
            'rules' => [
                'category/<id:\d+>/page/<page:\d+>' => 'category/view',
                'category/<id:\d+>' => 'category/view',
                'product/<id:\d+>' => 'product/view',
                'search' => 'category/search',
                'cart/<id:\d+>' => 'cart/pi',
                'brand/<id:\d+>' => 'brand/view',
                'test/<id:\d+>/page/<page:\d+>' => 'test/page',
                'test/<id:\d+>' => 'test/page',
                'footer/<id:\d+>' => 'footer/hits',
                '<_m:debug>/<_c:\w+>/<_a:\w+>' => '<_m>/<_c>/<_a>',
                'pattern' => 'sitemap', 'route' => 'sitemap/default/index', 'suffix' => '.xml',
              //  '<id:([0-9])+>/images/image-by-item-and-alias' => 'yii2images/images/image-by-item-and-alias',

               //    '' => 'site/index',
               // '<controller:\w+>/<action:\w+>/' => '<controller>/<action>',
            ],
        ],
        'yandexMapsApi' => [
            'class' => 'mirocow\yandexmaps\Api',
        ],


    ],
    'controllerMap' => [
        'elfinder' => [
            'class' => 'mihaildev\elfinder\PathController',
            'access' => ['@'],
            'root' => [
              //  'baseUrl'=>'/web',
                'path' => 'upload/global',
                'name' => 'Global'
            ],
            'watermark' => [
                'source'         => __DIR__.'/logo.png', // Path to Water mark image
                'marginRight'    => 5,          // Margin right pixel
                'marginBottom'   => 5,          // Margin bottom pixel
                'quality'        => 95,         // JPEG image save quality
                'transparency'   => 70,         // Water mark image transparency ( other than PNG )
                'targetType'     => IMG_GIF|IMG_JPG|IMG_PNG|IMG_WBMP, // Target image formats ( bit-field )
                'targetMinPixel' => 200         // Target image minimum pixel size
            ]
        ]
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
