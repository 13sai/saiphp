<?php
/* Smarty version 3.1.30, created on 2016-11-15 15:04:50
  from "F:\github\saiphp\app\views\index.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_582b1602796b18_79436433',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '11c4466b10b21ca486fd3b33e254ac73b7f31d7d' => 
    array (
      0 => 'F:\\github\\saiphp\\app\\views\\index.php',
      1 => 1479130757,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.php' => 1,
    'file:footer.php' => 1,
  ),
),false)) {
function content_582b1602796b18_79436433 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<!-- content srart -->
<div class="am-g am-g-fixed blog-fixed">
    <div class="am-u-md-8 am-u-sm-12">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'foo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['foo']->value) {
?>
        <article class="am-g blog-entry-article">
            <div class="am-u-lg-6 am-u-md-12 am-u-sm-12 blog-entry-img">
                <img src="/ui/assets/i/f<?php echo $_smarty_tpl->tpl_vars['arr']->value[$_smarty_tpl->tpl_vars['foo']->value['id']%5];?>
.jpg" alt="" class="am-u-sm-12">
            </div>
            <div class="am-u-lg-6 am-u-md-12 am-u-sm-12 blog-entry-text">
                <span> 13sai </span>
                <span><?php echo $_smarty_tpl->tpl_vars['foo']->value['date'];?>
</span>
                <a href="/index.php/index/content/id/<?php echo $_smarty_tpl->tpl_vars['foo']->value['id'];?>
"><h1><?php echo $_smarty_tpl->tpl_vars['foo']->value['title'];?>
</h1></a>
                <p><?php echo $_smarty_tpl->tpl_vars['foo']->value['abstract'];?>
</p>
                <p><a href="/index.php/index/content/id/<?php echo $_smarty_tpl->tpl_vars['foo']->value['id'];?>
" class="am-btn am-btn-secondary">更多&raquo;</a></p>
            </div>
        </article>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        
        <?php echo $_smarty_tpl->tpl_vars['pagelist']->value;?>

    </div>
<?php $_smarty_tpl->_subTemplateRender("file:footer.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
