<?php
namespace frontend\assets;

use yii\web\AssetBundle;

class BlogAsset extends AssetBundle
{
    public $basePath = "@webroot";
    public $baseUrl = "@web";
    public $css = [
        'css/blog.css',
        'css/reset.css',
        'css/modal.css',
        '//fonts.googleapis.com/css2?family=Dosis&display=swap',
        '//fonts.googleapis.com/css2?family=Ubuntu&display=swap',

    ];
	  public $js = [
		    'js/index.js',
		    'js/modal.js',
	  ];
	  public $img = [
		    'favicon' =>  'favicon.ico',
    ];
	  public $depends = [
	  ];
}
