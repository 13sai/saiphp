<{include file="header.php"}>

<!-- content srart -->
<div class="am-g am-g-fixed blog-fixed">
    <div class="am-u-md-8 am-u-sm-12">
		<{foreach from=$data item=foo}>
        <article class="am-g blog-entry-article">
            <div class="am-u-lg-6 am-u-md-12 am-u-sm-12 blog-entry-img">
                <img src="/ui/assets/i/f<{$arr[$foo.id%5]}>.jpg" alt="" class="am-u-sm-12">
            </div>
            <div class="am-u-lg-6 am-u-md-12 am-u-sm-12 blog-entry-text">
                <span> 13sai </span>
                <span><{$foo.date}></span>
                <a href="/index.php/index/content/id/<{$foo.id}>"><h1><{$foo.title}></h1></a>
                <p><{$foo.abstract}></p>
                <p><a href="/index.php/index/content/id/<{$foo.id}>" class="am-btn am-btn-secondary">更多&raquo;</a></p>
            </div>
        </article>
		<{/foreach}>
        
        <{$pagelist}>
    </div>
<{include file="footer.php"}>