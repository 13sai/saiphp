<{include file="left.php"}>
		<ol class="am-breadcrumb">
		  <li><a href="/zeta">首页</a></li>
		  <li class="am-active">列表</li>
		</ol>
		<div class="page-content">
			<div class="am-scrollable-horizontal">
			  <table class="am-table am-table-bordered am-table-striped am-text-nowrap">
			      <tr>
				    <th>标题</th>
				    <th>时间</th>
				    <th>操作</th>
				  </tr>
				  <{foreach from=$list item=art}>
				  <tr>
				    <td><{$art['title']}></td>
				    <td><{$art['date']}></td>
				    <td>
				    	<a class="am-text-secondary" href="/index.php/zeta/index/update/id/<{$art['id']}>"><span class="am-green am-icon-pencil"></span></a>&nbsp;&nbsp;
				    	<a class="am-text-danger" href="/index.php/zeta/index/delete/id/<{$art['id']}>"><span class="am-green am-icon-trash"></span></a>
				    </td>
				  </tr>
				  <{/foreach}>
			  </table>
			</div>
			<{$pagelist}>
		</div>
	</div>
</div>
<{include file="foot.php"}>
<script type="text/javascript" charset="utf-8" src="/ui/js/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/ui/js/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/ui/js/ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">
var ue = UE.getEditor('editor');
</script>
</body>
</html>
