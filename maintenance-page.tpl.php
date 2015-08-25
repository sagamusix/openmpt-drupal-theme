<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
  <head>
    <title><?php print $head_title ?></title>
    <?php print $head ?>
    <?php print $styles ?>
    <?php print $scripts ?>
  </head>
  <body>

<!-- header -->

<div id="header-container">
  <div id="header">

<?php if ($logo): ?>
<a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
<img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
</a>
<?php endif; ?>

    <h1 id="site-name">
      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home">
        <?php print $site_slogan; ?> 
      </a>
    </h1>

    <div id="mission">

    <form action="http://wiki.openmpt.org/index.php">
      <div id="search">
		<input type="hidden" name="title" value="Special:Search"/>
		<input type="text" id="search-field" name="search" title="Search the OpenMPT manual" value="Search..." onfocus="if(this.value=='Search...')this.value='';" onblur="if(this.value=='')this.value='Search...'" />
        <input type="submit" id="search-submit" value="" />
      </div>
    </form>

    OpenMPT is a powerful audio application that makes writing music fun, easy and efficient.
    
    <?php if($is_front): ?>
    <a href="<?php print $base_path; ?>download" id="download-button">Download OpenMPT</a>
    <?php else: ?>
    <?php print render($page['header']); ?>
    <?php endif; ?>
    
    </div>
  </div>
</div>

<div id="main-container">
  <div id="main-content">
    <div id="highlighted">
      <?php if ($title): ?><h2><?php print $title ?></h2><?php endif; ?>
      <?php print $content ?>
    </div>
  </div>
</div>

<div id="footer">
<?php print render($page['footer']); ?>
</div>

  </body>
</html>
