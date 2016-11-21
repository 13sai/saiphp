<{include file="head.php"}>
<header class="am-topbar admin-header">
  <h1 class="am-topbar-brand">
    <i class="am-header-icon am-icon-bars"></i>  后台管理
  </h1>
  <div class="am-collapse am-topbar-collapse" id="doc-topbar-collapse">
    <div class="am-topbar-right">
      <button class="am-btn am-btn-primary am-topbar-btn am-btn-sm" onclick="window.location.href='/index.php/zeta/index/logout'">退出</button>
    </div>

    <form class="am-topbar-form am-topbar-right am-form-inline" role="search">
      <div class="am-form-group">
        <input type="text" class="am-form-field am-input-sm" placeholder="搜索">
	    <span class="am-form-icon am-icon-search"></span>
      </div>
    </form>
  </div>
</header>
<div class="admin-main">
	<div class="admin-sidebar am-hide-sm-only">
		<ul class="am-list admin-sidebar-list">
			<li>
				<a href="/" target="_blank">
				<i class="am-icon-home"></i> 前台
				</a>
			</li>
			<li>
				<a href="/index.php/zeta/index/lists">
				<i class="am-icon-list"></i> 列表
				</a>
			</li>
			<li>
				<a href="/index.php/zeta/index/create">
				<i class="am-icon-plus"></i> 发布
				</a>
			</li>
		</ul>
	</div>
	<div class="admin-content">