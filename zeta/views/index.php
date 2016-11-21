<{include file="head.php"}>
<div class="log"> 
  <div class="am-g">
  <div class="am-u-lg-3 am-u-md-6 am-u-sm-8 am-u-sm-centered log-content">
    <h1 class="log-title am-animation-slide-top"><{$title}></h1>
    <br>
    <form class="am-form" id="log-form" method="post" action="/index.php/zeta/index/login">
      <div class="am-input-group am-radius am-animation-slide-left">       
        <input type="text" id="doc-vld-email-2-1" class="am-radius" placeholder="用户名" name="user" required/>
        <span class="am-input-group-label log-icon am-radius"><i class="am-icon-user am-icon-sm am-icon-fw"></i></span>
      </div>      
      <br>
      <div class="am-input-group am-animation-slide-left log-animation-delay">       
        <input type="password" class="am-form-field am-radius log-input" placeholder="密码" name="pw"  required>
        <span class="am-input-group-label log-icon am-radius"><i class="am-icon-lock am-icon-sm am-icon-fw"></i></span>
      </div>     
      <br>    
      <div class="am-input-group am-animation-slide-left log-animation-delay">       
        <input type="text" class="am-form-field am-radius log-input" placeholder="验证码" name="code" required>
        <span class="am-input-group-label log-icon am-radius"><img id="yanz" border='1' onclick="document.getElementById('yanz').src='/index.php/index/code/r='+Math.random()" src='/index.php/index/code'/></span>
        
      </div>      
      <br>
      <button type="submit" class="am-btn am-btn-primary am-btn-block am-btn-lg am-radius am-animation-slide-bottom log-animation-delay">登 录</button>
    </form>
  </div>
  </div>
</div>
<{include file="head.php"}>
</body>
</html>