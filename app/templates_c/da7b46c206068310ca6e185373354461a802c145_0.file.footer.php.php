<?php
/* Smarty version 3.1.30, created on 2016-11-15 15:04:50
  from "F:\github\saiphp\app\views\footer.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_582b16029e0a95_44155826',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'da7b46c206068310ca6e185373354461a802c145' => 
    array (
      0 => 'F:\\github\\saiphp\\app\\views\\footer.php',
      1 => 1479130757,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_582b16029e0a95_44155826 (Smarty_Internal_Template $_smarty_tpl) {
?>
    <div class="am-u-md-4 am-u-sm-12 blog-sidebar">
        <div class="blog-sidebar-widget blog-bor">
            <h2 class="blog-title"><span>推荐文章</span></h2>
            <ul class="am-list">
	            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['recommand']->value, 'foo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['foo']->value) {
?>
	            <li><a href="/index.php/index/content/id/<?php echo $_smarty_tpl->tpl_vars['foo']->value['id'];?>
"><span class="am-icon am-icon-star"></span> <?php echo $_smarty_tpl->tpl_vars['foo']->value['title'];?>
</a></li>
	            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </ul>
        </div>
        <div class="blog-clear-margin blog-sidebar-widget blog-bor am-g ">
            <h2 class="blog-title"><span>推荐网站</span></h2>
            <div class="am-u-sm-12 blog-clear-padding">
            <a class="blog-tag" target="_blank" href="http://www.w3school.com.cn/">w3school</a>
            <a class="blog-tag" target="_blank" href="http://sentsin.com/daohang/">前端江湖录</a>
			<a class="blog-tag" target="_blank" href="http://www.thinkphp.cn/">ThinkPHP</a>
			<a class="blog-tag" target="_blank" href="http://www.web100.cc/">建站100</a>
			<a class="blog-tag" target="_blank" href="http://www.php100.com/">PHP100</a>
			<a class="blog-tag" target="_blank" href="http://www.superslide2.com/">superslide</a>
			<a class="blog-tag" target="_blank" href="https://cn.wordpress.org/">wordpress中文网</a>
			<a class="blog-tag" target="_blank" href="http://www.thinkcmf.com/font/search.html">Font Awesome</a>
			<a class="blog-tag" target="_blank" href="http://amazeui.org/">amaze ui</a>
            </div>
        </div>
        <div class="blog-sidebar-widget blog-bor">
            <h2 class="blog-title"><span>13sai</span></h2>
            <!--<h3>13sai</h3>-->
            <p>2015年7月，材料专业毕业，工作数月后转行，2016，专心做web开发。</p>
            <p>喜欢篮球、台球，喜欢花草，喜欢书，喜欢围棋，喜欢美食。</p>
            <p>有韧性，有弹性，有毅力，有气度，不消极，不气馁，不抱怨，不轻狂。</p>
            <p>对人唯心，对事唯物。 </p>
            <p class="am-show-sm-only">联系方式：957042781#qq.com(@->#)</p>
            <p class="am-show-sm-only">© 2015-2016 13sai版权所有 </p>
        </div>
    </div>
</div>
<footer class="blog-footer">	
	<div class="blog-text-center  am-hide-sm-only">© 2015-2016 13sai版权所有  联系方式：957042781#qq.com(@->#)</div>
</footer>

<div data-am-widget="navbar" class="am-navbar am-cf am-navbar-default am-show-sm-only"
     id="">
  <ul class="am-navbar-nav am-cf am-avg-sm-4">
    <li>
      <a href="/">
        <span class="am-icon-home"></span>
        <span class="am-navbar-label">首页</span>
      </a>
    </li>
    <li>
      <a href="/index.php/index/index/type/web">
        <span class="am-icon-html5"></span>
        <span class="am-navbar-label">Web</span>
      </a>
    </li>
    <li>
      <a href="/index.php/index/index/type/js">
        <span class="am-icon-star"></span>
        <span class="am-navbar-label">js</span>
      </a>
    </li>
    <li data-am-widget="gotop">
      <a href="#">
        <span class="am-icon-arrow-circle-up"></span>
        <span class="am-navbar-label">回顶部</span>
      </a>
    </li>
    <li>
      <a href="/index.php/index/index/type/php">
        <span class="am-icon-github"></span>
        <span class="am-navbar-label">PHP</span>
      </a>
    </li>
    <li>
      <a href="/index.php/index/index/type/css">
        <span class="am-icon-css3"></span>
        <span class="am-navbar-label">CSS</span>
      </a>
    </li>
    <li data-am-navbar-qrcode>
      <a href="###">
        <span class="am-icon-qrcode"></span>
        <span class="am-navbar-label">二维码</span>
      </a>
    </li>
    <li>
    <form class="" role="search" method="get" >
      <div class="am-form-group">
	    <span class="am-input-group-label" onclick="$('#form').submit();"><i class="am-icon-search"></i></span>
        <input type="text" name="title" class="am-form-field" placeholder="搜索">
      </div>
    </form>
    </li>
    <li data-am-navbar-share>
      <a href="###">
        <span class="am-icon-share"></span>
        <span class="am-navbar-label">分享</span>
      </a>
    </li>
  </ul>
</div>

<!--[if (gte IE 9)|!(IE)]><!-->
<?php echo '<script'; ?>
 src="/ui/assets/js/jquery.min.js"><?php echo '</script'; ?>
>
<!--<![endif]-->
<!--[if lte IE 8 ]>
<?php echo '<script'; ?>
 src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="assets/js/amazeui.ie8polyfill.min.js"><?php echo '</script'; ?>
>
<![endif]-->
<?php echo '<script'; ?>
 src="/ui/assets/js/amazeui.min.js"><?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
