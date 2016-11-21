<{include file="header.php"}>
<div class="am-g am-g-fixed blog-fixed blog-content">
    <div class="am-u-md-8 am-u-sm-12">
      <article class="am-article blog-article-p">
        <div class="am-article-hd">
          <h1 class="am-article-title blog-text-center">
            <{$data.title}>
          </h1>
          <p class="am-article-meta blog-text-center">
              <!--<span><a href="#" class="blog-color">article &nbsp;</a></span>--->
              <span>13sai</span>
              <span> @
              <{$data.date}>
		      </span>
              
          </p>
        </div>        
        <div class="am-article-bd">   
	    
        <img src="/ui/assets/i/f19.jpg" alt="" class="blog-entry-img blog-article-margin">       
        <p class="class="am-article-lead"">
        <blockquote>
        <{$data.abstract}>
        </blockquote>
		
        <!--<hr>-->
        
        <div>
	        
        <{$data.content}>
	        
        </div>
        </p>
        </div>
      </article>
        
        <div class="am-g blog-article-widget blog-article-margin">
          <div class="am-u-lg-4 am-u-md-5 am-u-sm-7 am-u-sm-centered blog-text-center">
            <span class="am-icon-tags"> &nbsp;</span><{$data.type}>
          </div>
        </div>

        <hr>
        <ul class="am-pagination blog-article-margin">
	    
        </ul>
        
        <hr>

    </div>
<{include file="footer.php"}>