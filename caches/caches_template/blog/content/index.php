<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<hr class="low">
<div id="content"> 
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=b1abc250283a1cb75eca5bda7a7ad24b&sql=select+%2A+from+v9_news+a%2C+v9_hits+b+where+a.status%3D99+and+CONCAT%28%27c-1-%27%2Ca.id+%29+%3D+b.hitsid+order+by+a.id+DESC&num=10&page=%24_GET%5B%27page%27%5D\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$pagesize = 10;$page = intval($_GET['page']) ? intval($_GET['page']) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$r = $get_db->sql_query("SELECT COUNT(*) as count FROM  v9_news a, v9_hits b where a.status=99 and CONCAT('c-1-',a.id ) = b.hitsid order by a.id DESC");$s = $get_db->fetch_next();$pages=pages($s['count'], $page, $pagesize, $urlrule);$r = $get_db->sql_query("select * from v9_news a, v9_hits b where a.status=99 and CONCAT('c-1-',a.id ) = b.hitsid order by a.id DESC LIMIT $offset,$pagesize");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
  <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
  <div class="entry">
    <div style="clear:both">
      <div class="alignleft">
        <h2><a href="<?php echo $r['url'];?>" title="Permalink"><?php echo $r['title'];?></a></h2>
        <p class="info"><?php echo date('Y年m月d日 H:i:s',$r[inputtime]);?>
          , 浏览:<?php echo $r['views'];?> , 分类:<a href="<?php echo $CATEGORYS[$r['catid']]['url'];?>" title="<?php echo $CATEGORYS[$r['catid']]['catname'];?>" ><?php echo $CATEGORYS[$r['catid']]['catname'];?></a> <em class="author"><?php echo $r['username'];?></em> </p>
      </div>
      <div class="alignright">
        <div class="post-comments"> <a href="<?php echo $r['url'];?>" class="commentlink" title=""><?php if($comment_total) { ?><?php echo $comment_total;?><?php } else { ?>0<?php } ?></a></div>
      </div>
    </div>
    <div style="clear:both"></div>
    <?php if($r[thumb]) { ?><a href="<?php echo $r['url'];?>" title="<?php echo $r['title'];?>"><img src="<?php echo thumb($r[thumb],500,'');?>" alt="<?php echo $r['title'];?>"></a><br>
    <?php } ?>
    <?php echo $r['description'];?><br>
    <a href="<?php echo $r['url'];?>" title="<?php echo $r['title'];?>">(阅读全文)</a>
    <div class="single-tag">标签： <?php $keywords = explode(' ',$r[keywords]);?>
      <?php $n=1;if(is_array($keywords)) foreach($keywords AS $keyword) { ?><a href="<?php echo APP_PATH;?>index.php?m=content&c=tag&catid=<?php echo $r['catid'];?>&tag=<?php echo urlencode($keyword);?>" class="blue"><?php echo $keyword;?></a><?php $n++;}unset($n); ?><br>
    </div>
  </div>
  <?php $n++;}unset($n); ?>
  <div class="wp-pagenavi"><?php echo $pages;?></div>
  <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
  <p></p>
</div>
<!-- /content -->
<hr class="low">
<!-- subcontent ................................. -->
<div id="subcontent">
  <div class="socialicons">
    <div class="socialeffect fix"> <span>关注网站模板网: </span> <a href="<?php echo APP_PATH;?>index.php?m=content&c=rss&siteid=<?php echo get_siteid();?>" class="rsslink" target="_blank"> <img original="<?php echo APP_PATH;?>statics/blog/icon-rss.png" src="<?php echo APP_PATH;?>statics/blog/icon-rss.png" title="文章订阅"> </a> <a href="h#" target="_blank"> <img original="<?php echo APP_PATH;?>statics/blog/icon-douban.png" src="<?php echo APP_PATH;?>statics/blog/icon-douban.png" title="豆瓣九点"> </a> <a href="#" target="_blank"> <img original="<?php echo APP_PATH;?>statics/blog/icon-sinaweibo.png" src="<?php echo APP_PATH;?>statics/blog/icon-sinaweibo.png" title="新浪微博"> </a> <a href="#" target="_blank"> <img original="<?php echo APP_PATH;?>statics/blog/icon-qqweibo.png" src="<?php echo APP_PATH;?>statics/blog/icon-qqweibo.png" title="腾讯微博"> </a> </div>
  </div>
  <div style="clear:both>"></div>
  <center>
     <img src="<?php echo APP_PATH;?>statics/blog/300_250.jpg" alt="网站模板" width="300" height="250"  />
  </center>
  <dl>
    <h2>推荐文章</h2>
    <ul>
      <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=4c63cf22eefcaf3c0a127ca24cb2151b&action=position&posid=9&order=listorder++DESC&num=8\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'position')) {$data = $content_tag->position(array('posid'=>'9','order'=>'listorder  DESC','limit'=>'8',));}?>
      <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
      <li><a href="<?php echo $r['url'];?>"><?php echo str_cut($r[title],40,'');?></a></li>
      <?php $n++;}unset($n); ?>
      <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
    </ul>
  </dl>
  <dl>
    <h2>热门</h2>
    <ul>
      <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=9937fadf5f2f690453cb48a8076906fb&action=hits&catid=6&order=weekviews++DESC&num=8\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'hits')) {$data = $content_tag->hits(array('catid'=>'6','order'=>'weekviews  DESC','limit'=>'8',));}?>
      <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
      <li><a href="<?php echo $r['url'];?>"><?php echo str_cut($r[title],40,'');?></a></li>
      <?php $n++;}unset($n); ?>
      <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
    </ul>
  </dl>
  <dl>
    <h2>最新评论</h2>
    <ul class="comment_ul">
      <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"comment\" data=\"op=comment&tag_md5=9eeaba0a57bcf88c1b4779f4dc232d7a&action=bang&siteid=%24siteid&cache=3600\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$tag_cache_name = md5(implode('&',array('siteid'=>$siteid,)).'9eeaba0a57bcf88c1b4779f4dc232d7a');if(!$data = tpl_cache($tag_cache_name,3600)){$comment_tag = pc_base::load_app_class("comment_tag", "comment");if (method_exists($comment_tag, 'bang')) {$data = $comment_tag->bang(array('siteid'=>$siteid,'limit'=>'20',));}if(!empty($data)){setcache($tag_cache_name, $data, 'tpl_data');}}?>
      <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
     <li><span>(<?php echo $r['total'];?>)</span><a href="<?php echo $r['url'];?>" target="_blank"><?php echo str_cut($r[title], 40);?></a></li>
     <?php $n++;}unset($n); ?>
      <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
    </ul>
  </dl>
  <dl>
    <h2>友情链接</h2>
    <ul>
      <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"link\" data=\"op=link&tag_md5=99c32cd273c57223c20074bf5196e97a&action=type_list&siteid=%24siteid&order=listorder+DESC&num=10&return=dat\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$link_tag = pc_base::load_app_class("link_tag", "link");if (method_exists($link_tag, 'type_list')) {$dat = $link_tag->type_list(array('siteid'=>$siteid,'order'=>'listorder DESC','limit'=>'10',));}?>
      <?php $n=1;if(is_array($dat)) foreach($dat AS $v) { ?>
      <?php if($type==0) { ?>
      <li><a href="<?php echo $v['url'];?>" target="_blank"><?php echo $v['name'];?></a></li>
      <?php } else { ?>
      <li> <a href="<?php echo $v['url'];?>" target="_blank"><img src="<?php echo $v['logo'];?>" width="88" height="31" style="border: 1px solid #FFBE7A;"></a> </li>
      <?php } ?>
      <?php $n++;}unset($n); ?>
      <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
    </ul>
  </dl>
</div>
<!-- /subcontent -->
<hr class="low">
<?php include template("content","footer"); ?> 
