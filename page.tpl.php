<!-- primary navigation -->
<?php if ($main_menu): ?>
<div id="primary-nav">
<?php print theme('links__system_main_menu', array('links' => $main_menu, )); ?>
</div>
<?php endif; ?>

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

    <abbr title="Open ModPlug Tracker">OpenMPT</abbr> is a powerful audio application that makes writing music fun, easy and efficient.
    
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

  <?php if ($page['featured']): ?><div id="featured"><?php print render($page['featured']); ?></div><?php endif; ?>

  <div id="content">

    <?php print $messages; ?>
    
    <?php if ($breadcrumb): ?><div id="breadcrumb"><?php print $breadcrumb; ?></div><?php endif; ?>
    
    <?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>

    <?php print render($title_prefix); ?>
    <?php if ($title): ?><h2><?php print $title; ?></h2><?php endif; ?>
    <?php print render($title_suffix); ?>
    
    <?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
    
    <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
    
    <?php print render($page['content']); ?>

    <?php print render($page['help']); ?>

  </div>
  
  <div id="sidebar">
  
    <?php
    if ($page['sidebar_first']):
      print render($page['sidebar_first']);
    endif;

    if ($page['sidebar_second']):
      print render($page['sidebar_second']);
    endif;
    ?>

  </div>

</div>

</div>

<div id="footer">
<?php print render($page['footer']); ?>
</div>
