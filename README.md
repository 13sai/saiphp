# saiphp
>a smart php framework

------

这是一个简单的php框架。
采用单一的入口文件，模板引擎使用了smarty，数据操作引入了medoo。
你可以使用composer为它扩展类库。
并在此基础上用amazeui做了一个简单的文章发布系统。


This is a smart php framework.
Using a single entry file, the template engine uses smarty, and data manipulation introduces medoo.
You can use the composer to extend the class library for it.
And on this basis to do a simple article publishing system what uses amazeUI.


目录说明：

> app        前台

> --control  控制器

> --model    模型

> --views    模板

> core       系统文件

> --common   公共文件

> --config   配置文件

> --lib      核心文件

> --sai.php  运行文件

> data       数据库文件 

> ui         css,js 

> upload     上传文件 

> vendor     扩展类库

> zeta       后台

> --control  控制器

> --model    模型

> --views    模板 

> index.php  入口文件 

> composer.json  应用composer导入的类库

------2016/10/20

开发使用说明：
本地新建数据库，运行data文件下sql文件，修改配置文件下database.php，填写正确的数据库信息，配置好后就可以访问了。

你可以自己再增加基础的类，建议放在核心文件夹core\lib下，也可以增加扩展类库，建议放在扩展类库vendor下。
调用两种库都有例子（database与medoo），就不细说了。

当然，你也可以增加模块，比如增加手机版模块：
复制zeta另命名为wap，
```php
if(strpos($_SERVER['REQUEST_URI'],'/index.php/zeta') !==false){
	define('MODULE','zeta');
	define('ZETA',1);
}else{
	define('MODULE','app');
	define('ZETA',0);
};

//修改为
if(strpos($_SERVER['REQUEST_URI'],'/index.php/zeta') !==false){
	define('MODULE','zeta');
	define('ZETA',1);
}elseif(strpos($_SERVER['REQUEST_URI'],'/index.php/wap') !==false){
	define('MODULE','wap');
	define('ZETA',1);
}else{
	define('MODULE','app');
	define('ZETA',0);
};
```

然后修改对应的控制器，模型，模板文件，就ok了。

------2016/11/15