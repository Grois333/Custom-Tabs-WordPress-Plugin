<?php
/*
Plugin Name: Custom Tabs Plugin
Plugin URI: https://example.com/
Description: A plugin to add custom tabbed content to posts and pages.
Version: 1.0
Author: Isaac Groisman
Author URI: https://isaacgroisman.surge.sh/
License: GPL2
*/

// Prevent direct access to the file
if (!defined('ABSPATH')) {
    exit;
}

// Add options page
function custom_tabs_add_options_page() {
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page(array(
            'page_title'    => 'Options Page',
            'menu_title'    => 'Options Page',
            'menu_slug'     => 'options-page',
            'capability'    => 'edit_posts',
            'redirect'      => false
        ));
    }
}
add_action('acf/init', 'custom_tabs_add_options_page');

// Enqueue styles and scripts
function custom_tabs_plugin_enqueue_assets() {
    // Enqueue compiled CSS file
    wp_enqueue_style('custom-tabs-style', plugin_dir_url(__FILE__) . 'assets/css/style.css');
    // Enqueue JavaScript file
    wp_enqueue_script('custom-tabs-script', plugin_dir_url(__FILE__) . 'assets/js/index.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'custom_tabs_plugin_enqueue_assets');

// Shortcode for tabbed content
function custom_tabs_shortcode() {
    if (!function_exists('get_field')) {
        return 'ACF plugin is not active.';
    }

    $global_option_tabs = get_field('global_option_tabs', 'option');
    
    if (empty($global_option_tabs)) {
        return 'No tab data found.';
    }

    ob_start();
    ?>
    <section class="container custom-tabs">
        <div class="content">
          <div class="main-content">
            <nav class="nav">
              <?php foreach($global_option_tabs as $key => $tab): ?>
                <?php if(!empty($tab['tab_title'])){ ?>
                  <a href="javascript:void(0)" class="nav-item <?php echo $key == 0 ? 'active' : '' ?>" data-tab="tab-<?php echo $key; ?>"><?php echo $tab['tab_title']; ?></a>
                <?php } ?>
              <?php endforeach; ?>
            </nav>
            <?php foreach($global_option_tabs as $key => $tab): ?>
            <div id="tab-<?php echo $key; ?>" class="tab-wrapper <?php echo $key == 0 ? 'active' : '' ?>">
              <section class="testimonial-section">
                <div class="testimonial-content">
                  <div class="testimonial">
                    <?php if(!empty($tab['main_banner'])){ ?>
                      <div class="testimonial-wrap">
                        <?php if(!empty($tab['main_banner']['banner_image'])){ ?>
                          <img class="banner-img" src="<?php echo $tab['main_banner']['banner_image']['url']; ?>" alt="Background Image" loading="lazy" />
                        <?php } ?>
                        <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . 'assets/img/quotes.svg'); ?>" class="quote-img" alt="Quote Image" loading="lazy" />
                        <?php if(!empty($tab['main_banner']['quote_text'])){ ?>
                          <div class="quote">
                            <?php echo $tab['main_banner']['quote_text']; ?>
                          </div>
                        <?php } ?>
                        <div class="quote-author">
                          <?php if(!empty($tab['main_banner']['author_image'])){ ?>
                            <img class="quote-img" src="<?php echo $tab['main_banner']['author_image']['url']; ?>" class="author-img" alt="Author Image" loading="lazy"/>
                          <?php } ?>
                          <div class="author-details">
                            <?php if(!empty($tab['main_banner']['author_name'])){ ?>
                              <span class="author-name"><?php echo $tab['main_banner']['author_name']; ?></span>
                            <?php } ?>
                            <?php if(!empty($tab['main_banner']['author_position'])){ ?>
                              <span class="author-title"><?php echo $tab['main_banner']['author_position']; ?></span>
                            <?php } ?>
                          </div>
                        </div>
                        <?php if(!empty($tab['main_banner']['author_brand_logo'])){ ?>
                          <img src="<?php echo $tab['main_banner']['author_brand_logo']['url']; ?>" class="testimonial-logo" alt="<?php echo $tab['main_banner']['author_brand_logo']['alt']; ?>" loading="lazy"/>
                        <?php } ?>
                      </div>
                    <?php } ?>
                    <div class="cta-section">
                      <?php if(!empty($tab['top_banner'])){ ?>
                        <div class="cta-content">
                          <?php if(!empty($tab['top_banner']['title'])){ ?>
                            <span class="percentage"><?php echo $tab['top_banner']['title']; ?></span>
                          <?php } ?>
                          <?php if(!empty($tab['top_banner']['subtitle'])){ ?>
                            <div class="cta-text"><?php echo $tab['top_banner']['subtitle']; ?></div>
                          <?php } ?>
                        </div>
                      <?php } ?>
                      <?php if(!empty($tab['bottom_right_banner']['link'])){ ?>
                        <a class="cta-button" tabindex="0" href="<?php echo $tab['bottom_right_banner']['link']['url']; ?>" target="<?php echo $tab['bottom_right_banner']['link']['target']; ?>">
                          <?php if(!empty($tab['bottom_right_banner']['text'])){ ?>
                            <div class="text">
                              <?php echo $tab['bottom_right_banner']['text']; ?>
                            </div>
                          <?php } ?>
                          <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . 'assets/img/arrow.svg'); ?>" class="cta-icon" alt="Cta Icon" loading="lazy"/>
                        </a>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </section>
              <?php if(!empty($tab['logos_gallery'])){ ?>
                <section class="trusted-by">
                  <div class="trusted-title">TRUSTED BY</div>
                  <div class="trusted-logos">
                    <?php foreach($tab['logos_gallery'] as $logo): ?>
                      <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" class="trusted-logo" loading="lazy" />
                    <?php endforeach; ?>
                  </div>
                </section>
              <?php } ?>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </section>
    <?php
    return ob_get_clean();
}
add_shortcode('custom_tabs', 'custom_tabs_shortcode');
?>
