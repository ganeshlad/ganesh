<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>
<div id="wrapper">
<header id="navbar" role="banner" class="<?php print $navbar_classes; ?>">
  <div class="container clearfix">
    <div class="row">
        <div class="toggle-container">
            <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <?php if ($logo || $site_name || $site_slogan): ?>
            <div class="header-logo">
                <?php if ($logo): ?>
                    <div id="logo" class="site-logo"> <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home">
                            <img class="img-thumbnail" src="<?php print $logo; ?>" alt="<?php print $site_name; ?>" role="presentation" /> </a></div>
                <?php endif; ?>
                <!-- /#logo -->
                <?php if ($site_name || $site_slogan): ?>
                    <div id="name-and-slogan">
                        <?php if ($site_name): ?>
                            <div id="site-name" class="site-name"><a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><?php print $site_name; ?></a></div>
                        <?php endif; ?>
                        <?php if ($site_slogan): ?>
                            <div id="site-slogan" class="site-slogan"><?php print $site_slogan; ?></div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <?php if (!($site_name || $site_slogan)): ?>
                    <div id="site" class="hide">
                        <div id="name"><a href="<?php print $front_page; ?>"><?php print $my_site_title; ?></a></div>
                    </div>
                <?php endif; ?>
                <!-- /#name-and-slogan -->
            </div>
        <?php endif; ?>
    </div>

    <div class="container clearfix">
        <div class="navbar-collapse collapse">
            <nav role="navigation">
                <?php if (!empty($primary_nav)): ?>
                    <?php print render($primary_nav); ?>
                <?php endif; ?>
                <?php if (!empty($secondary_nav)): ?>
                    <?php print render($secondary_nav); ?>
                <?php endif; ?>
                <?php if (!empty($page['navigation'])): ?>
                    <?php print render($page['navigation']); ?>
                <?php endif; ?>
            </nav>
        </div>
    </div>

  </div>
</header>

<?php if ($page['featured']): ?>
    <div class="featured">
        <?php print render($page['featured']); ?>
    </div><!--featured-->
<?php endif; ?>
<div class="main-container container">

  <header role="banner" id="page-header" class="center-block">

    <?php print render($page['header']); ?>
  </header> <!-- /#page-header -->

  <div class="row">

    <?php if (!empty($page['sidebar_first'])): ?>
      <aside class="col-sm-3" role="complementary">
        <?php print render($page['sidebar_first']); ?>
      </aside>  <!-- /#sidebar-first -->
    <?php endif; ?>



    <section class="col-6 col-sm-6 col-lg-6 offset-0 no-gutter" id="main-content">

      <?php if (!empty($page['highlighted'])): ?>

        <div class="highlighted jumbotron"><?php print render($page['highlighted']); ?></div>

      <?php endif; ?>
        <?php if (!empty($breadcrumb)): print $breadcrumb; endif;?>
      <a id="main-content"></a>
      <?php print render($title_prefix); ?>
      <?php if (!empty($title)): ?>
        <h1 class="page-header"><?php print $title; ?></h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php print $messages; ?>
      <?php if (!empty($tabs)): ?>
        <?php print render($tabs); ?>
      <?php endif; ?>
      <?php if (!empty($page['help'])): ?>
        <?php print render($page['help']); ?>
      <?php endif; ?>
      <?php if (!empty($action_links)): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>

    </section>



    <?php if (!empty($page['sidebar_second'])): ?>
      <aside class="col-sm-3" role="complementary">
        <?php print render($page['sidebar_second']); ?>
      </aside>  <!-- /#sidebar-second -->
    <?php endif; ?>

  </div>
</div>
<footer class="footer container">
    <div id="footer">
        <?php if ($page['footer']): ?>
            <div id="foot">
                <?php print render($page['footer']) ?>
            </div>
        <?php endif; ?>
        <?php if ($page['footer_first'] || $page['footer_second'] || $page['footer_third']): ?>
            <div id="footer-area" class="clearfix">
                <?php if ($page['footer_first']): ?>
                    <div class="col-md-2 col-sm-6 col-xs-6" id="footer-one"><?php print render($page['footer_first']); ?></div>
                <?php endif; ?>
                <?php if ($page['footer_second']): ?>
                    <div class="col-md-2 col-sm-6 col-xs-6" id="footer-two"><?php print render($page['footer_second']); ?></div>
                <?php endif; ?>
                <?php if ($page['footer_third']): ?>
                    <div class="col-md-2 col-sm-6 col-xs-6" id="footer-three"><?php print render($page['footer_third']); ?></div>
                <?php endif; ?>
                <?php if ($page['footer_four']): ?>
                <div class="col-md-2 col-sm-6 col-xs-6" id="footer-four"><?php print render($page['footer_four']); ?></div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <hr>
        <div id="copyright">
            <p class="copyright"><?php print t('copyright'); ?> &copy; <?php echo date("Y"); ?>,<?php print $site_name; ?></p><p class="credits"><?php print t('Theme by'); ?><a href="http://www.adobe.com">Drupal-math.com</a>.All rights reserved. | <a href="/toolbar/terms-of-use.html">Terms of Use</a> </p>
        </div>

    </div>
</footer>
</div>