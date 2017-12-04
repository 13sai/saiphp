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

> --config   配置文件（数据库，路由，配置参数）

> --lib      核心文件（基础控制器，基础模型等）

> --sai.php  运行文件

> data       数据库文件 

> dist       静态文件

> vendor     扩展类库

> index.php  入口文件 

> composer.json

> package.json


此版本结合前后端分离的思想，重写了核心模块，加入了自定义路由、基础控制器、基础模型，去掉了smarty，并加入时下流行的vue与webpack。

------2017/12/03