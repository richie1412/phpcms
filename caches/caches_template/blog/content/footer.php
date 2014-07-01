<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!-- footer ................................. -->
<div id="footer">
  <div class="alignleft"><strong>&copy; Copyright 2011 <?php echo $SE0['site_title'];?> . All rights reserved.</strong><br>
    . Powered by <a href="http://www.bbscms.net/">技术支持</a> . <a href="<?php echo APP_PATH;?>index.php?m=admin">登录</a></div>
  <div class="alignright">
  <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=a6d5adc1c1c55b6e43208f546b9a2736&sql=SELECT+%2A+from+v9_category+where+parentid%3D1+order+by+catid+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT * from v9_category where parentid=1 order by catid DESC LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
  <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
   <?php if($n>1) { ?>/<?php } ?> 	<a href="<?php echo $r['url'];?>"><?php echo $r['catname'];?></a>  
   <?php $n++;}unset($n); ?>
   <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
   </div>
</div>
<!-- /footer -->
<!-- /container -->
</div>
</body></html>
