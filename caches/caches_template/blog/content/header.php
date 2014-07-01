<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title><?php if(isset($SEO['title']) && !empty($SEO['title'])) { ?><?php echo $SEO['title'];?><?php } ?><?php echo $SEO['site_title'];?></title>
<meta name="keywords" content="<?php echo $SEO['keyword'];?>">
<meta name="description" content="<?php echo $SEO['description'];?>">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="<?php echo APP_PATH;?>statics/blog/style.css" type="text/css" media="screen, projection">
<script type="text/javascript" src="<?php echo JS_PATH;?>jquery.min.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>jquery.sgallery.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>search_common.js"></script>
</head>
<body>
<div id="header">
  <div class="logoleft"></div>
  <div class="adright">
  <a href="http://www.e553.com" target="_blank"> <img src="<?php echo APP_PATH;?>statics/blog/728_90.jpg" alt="网站模板" width="728" height="90"  /></a></div>
</div>
<!-- /header -->
<!-- navigation ................................. -->
<div id="navigation">
   <form action="<?php echo APP_PATH;?>index.php" method="get" target="_blank">
				<input type="hidden" name="m" value="search"/>
				<input type="hidden" name="c" value="index"/>
				<input type="hidden" name="a" value="init"/>
				<input type="hidden" name="typeid" value="<?php echo $typeid;?>" id="typeid"/>
				<input type="hidden" name="siteid" value="<?php echo $siteid;?>" id="siteid"/>
    <fieldset>
    <input name="q" id="q">
    <input value="Go!" id="searchbutton" name="searchbutton" type="submit">
    </fieldset>
  </form>
  <ul>
  <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=b43f1459ac702900c8d44c91a5e796dd&action=category&catid=0&num=25&siteid=%24siteid&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>'0','siteid'=>$siteid,'order'=>'listorder ASC','limit'=>'25',));}?>
    <li><a href="<?php echo siteurl($siteid);?>">首页</a></li>
    <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
   <li><a href="<?php echo $r['url'];?>"><?php echo $r['catname'];?></a></li>
   <?php $n++;}unset($n); ?>
    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
  </ul>
</div>
<!-- /navigation -->
<div id="container">

