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
    //$tab_contents = get_field('tab_contents', 'option');

    // if (empty($global_option_tabs)) {
    //     return 'No tab data found.';
    // }

    ob_start();
    ?>
    <section class="container custom-tabs">
        <div class="content">
          <div class="main-content">
            <nav class="nav">
              <a href="javascript:void(0)" class="nav-item active" data-tab="tab-1">Retail</a>
              <a href="javascript:void(0)" class="nav-item" data-tab="tab-2">Luxury fashion</a>
              <a href="javascript:void(0)" class="nav-item" data-tab="tab-3">Digital goods</a>
              <a href="javascript:void(0)" class="nav-item" data-tab="tab-4">Travel</a>
              <a href="javascript:void(0)" class="nav-item" data-tab="tab-5">Athletic & Outdoors</a>
            </nav>

            <div id="tab-1" class="tab-wrapper active">
              <section class="testimonial-section">
                <div class="testimonial-content">
                  <div class="testimonial">
                    <div class="testimonial-wrap">
                      <img class="banner-img" src="https://cdn.builder.io/api/v1/image/assets/TEMP/2633ecc8187779d7d2f7e0501c024d52e72267560f300db5a0a55b640f2f11e7?apiKey=52e00693ef0347efa6daf6ffe0b9e649&" alt="Background Image" loading="lazy" />
                      <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . 'assets/img/quotes.svg'); ?>" class="quote-img" alt="Quote Image" loading="lazy" />
                      <div class="quote">
                        <span class="author-name">Riskified has enabled</span>
                        <span class="author-name"> safe, fast, and seamless payments </span>
                        throughout our collaboration. We’re excited to see what opportunities we can unlock in the future.
                      </div>
                      <div class="quote-author">
                        <img class="quote-img" src="https://cdn.builder.io/api/v1/image/assets/TEMP/471822f81967678cc25ba5ec544e009b0785cd1720d0189bee67ce307dc78739?apiKey=52e00693ef0347efa6daf6ffe0b9e649&" class="author-img" alt="Author Image" loading="lazy"/>
                        <div class="author-details">
                          <span class="author-name">Michael Fleisher</span>
                          <span class="author-title">Chief Financial Officer</span>
                        </div>
                      </div>
                      <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/524b42ad5bea456b896d82890b2442057f4150862bd6f18eeac687f3ac37e218?apiKey=52e00693ef0347efa6daf6ffe0b9e649&" class="testimonial-logo" alt="Company Logo 2" loading="lazy"/>
                    </div>
                    <div class="cta-section">
                      <div class="cta-content">
                        <span class="percentage">50%</span>
                        <div class="cta-text">Reduction in the cost of fraud</div>
                      </div>
                      <a class="cta-button" tabindex="0" href="">
                        <div class="text">
                          Read Wayfair case study
                        </div>
                        <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . 'assets/img/arrow.svg'); ?>" class="cta-icon" alt="Cta Icon" loading="lazy"/>
                      </a>
                    </div>
                  </div>
                </div>
              </section>
              <section class="trusted-by">
                <div class="trusted-title">TRUSTED BY</div>
                <div class="trusted-logos">
                  <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/15550cfc3ac6a4835db54e3712d589476ac774f8fa9594c3fbe63562ef76ab27?apiKey=52e00693ef0347efa6daf6ffe0b9e649&" alt="Trusted Company 1" class="trusted-logo" loading="lazy" />
                  <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/828b7bc8a1201ceffff746e2582af39c414ca47331ea9dfa0cf87270ca7eb677?apiKey=52e00693ef0347efa6daf6ffe0b9e649&" alt="Trusted Company 2" class="trusted-logo" loading="lazy" />
                  <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/ba9eb94e9f63b7a19146d1b1daf2e2d42d93e375dd3fb7f1191285dfe4d5f506?apiKey=52e00693ef0347efa6daf6ffe0b9e649&" alt="Trusted Company 3" class="trusted-logo" loading="lazy" />
                  <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/498124efdb353b487329f42078c1559f0382e8a75582f6ba91cb0fd54357707e?apiKey=52e00693ef0347efa6daf6ffe0b9e649&" alt="Trusted Company 4" class="trusted-logo" loading="lazy" />
                </div>
              </section>
            </div>

            <div id="tab-2" class="tab-wrapper">
              <section class="testimonial-section">
                <div class="testimonial-content">
                  <div class="testimonial">
                    <div class="testimonial-wrap">
                      <img class="banner-img" src="https://cdn.builder.io/api/v1/image/assets/TEMP/2633ecc8187779d7d2f7e0501c024d52e72267560f300db5a0a55b640f2f11e7?apiKey=52e00693ef0347efa6daf6ffe0b9e649&" alt="Background Image" loading="lazy" />
                      <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . 'assets/img/quotes.svg'); ?>" class="quote-img" alt="Quote Image" loading="lazy" />
                      <div class="quote">
                        <span class="author-name">Riskified has enabled</span>
                        <span class="author-name"> safe, fast, and seamless payments </span>
                        throughout our collaboration. We’re excited to see what opportunities we can unlock in the future.
                      </div>
                      <div class="quote-author">
                        <img class="quote-img" src="https://cdn.builder.io/api/v1/image/assets/TEMP/471822f81967678cc25ba5ec544e009b0785cd1720d0189bee67ce307dc78739?apiKey=52e00693ef0347efa6daf6ffe0b9e649&" class="author-img" alt="Author Image" loading="lazy"/>
                        <div class="author-details">
                          <span class="author-name">Michael Fleisher</span>
                          <span class="author-title">Chief Financial Officer</span>
                        </div>
                      </div>
                      <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/524b42ad5bea456b896d82890b2442057f4150862bd6f18eeac687f3ac37e218?apiKey=52e00693ef0347efa6daf6ffe0b9e649&" class="testimonial-logo" alt="Company Logo 2" loading="lazy"/>
                    </div>
                    <div class="cta-section">
                      <div class="cta-content">
                        <span class="percentage">60%</span>
                        <div class="cta-text">Reduction in the cost of fraud</div>
                      </div>
                      <a class="cta-button" tabindex="0" href="">
                        <div class="text">
                          Read Wayfair case study
                        </div>
                        <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . 'assets/img/arrow.svg'); ?>" class="cta-icon" alt="Cta Icon" loading="lazy"/>
                      </a>
                    </div>
                  </div>
                </div>
              </section>
              <section class="trusted-by">
                <div class="trusted-title">TRUSTED BY</div>
                <div class="trusted-logos">
                  <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/15550cfc3ac6a4835db54e3712d589476ac774f8fa9594c3fbe63562ef76ab27?apiKey=52e00693ef0347efa6daf6ffe0b9e649&" alt="Trusted Company 1" class="trusted-logo" loading="lazy" />
                  <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/828b7bc8a1201ceffff746e2582af39c414ca47331ea9dfa0cf87270ca7eb677?apiKey=52e00693ef0347efa6daf6ffe0b9e649&" alt="Trusted Company 2" class="trusted-logo" loading="lazy" />
                  <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/ba9eb94e9f63b7a19146d1b1daf2e2d42d93e375dd3fb7f1191285dfe4d5f506?apiKey=52e00693ef0347efa6daf6ffe0b9e649&" alt="Trusted Company 3" class="trusted-logo" loading="lazy" />
                  <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/498124efdb353b487329f42078c1559f0382e8a75582f6ba91cb0fd54357707e?apiKey=52e00693ef0347efa6daf6ffe0b9e649&" alt="Trusted Company 4" class="trusted-logo" loading="lazy" />
                </div>
              </section>
            </div>

            <div id="tab-3" class="tab-wrapper">
              <section class="testimonial-section">
                <div class="testimonial-content">
                  <div class="testimonial">
                    <div class="testimonial-wrap">
                      <img class="banner-img" src="https://cdn.builder.io/api/v1/image/assets/TEMP/2633ecc8187779d7d2f7e0501c024d52e72267560f300db5a0a55b640f2f11e7?apiKey=52e00693ef0347efa6daf6ffe0b9e649&" alt="Background Image" loading="lazy" />
                      <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . 'assets/img/quotes.svg'); ?>" class="quote-img" alt="Quote Image" loading="lazy" />
                      <div class="quote">
                        <span class="author-name">Riskified has enabled</span>
                        <span class="author-name"> safe, fast, and seamless payments </span>
                        throughout our collaboration. We’re excited to see what opportunities we can unlock in the future.
                      </div>
                      <div class="quote-author">
                        <img class="quote-img" src="https://cdn.builder.io/api/v1/image/assets/TEMP/471822f81967678cc25ba5ec544e009b0785cd1720d0189bee67ce307dc78739?apiKey=52e00693ef0347efa6daf6ffe0b9e649&" class="author-img" alt="Author Image" loading="lazy"/>
                        <div class="author-details">
                          <span class="author-name">Michael Fleisher</span>
                          <span class="author-title">Chief Financial Officer</span>
                        </div>
                      </div>
                      <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/524b42ad5bea456b896d82890b2442057f4150862bd6f18eeac687f3ac37e218?apiKey=52e00693ef0347efa6daf6ffe0b9e649&" class="testimonial-logo" alt="Company Logo 2" loading="lazy"/>
                    </div>
                    <div class="cta-section">
                      <div class="cta-content">
                        <span class="percentage">70%</span>
                        <div class="cta-text">Reduction in the cost of fraud</div>
                      </div>
                      <a class="cta-button" tabindex="0" href="">
                        <div class="text">
                          Read Wayfair case study
                        </div>
                        <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . 'assets/img/arrow.svg'); ?>" class="cta-icon" alt="Cta Icon" loading="lazy"/>
                      </a>
                    </div>
                  </div>
                </div>
              </section>
              <section class="trusted-by">
                <div class="trusted-title">TRUSTED BY</div>
                <div class="trusted-logos">
                  <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/15550cfc3ac6a4835db54e3712d589476ac774f8fa9594c3fbe63562ef76ab27?apiKey=52e00693ef0347efa6daf6ffe0b9e649&" alt="Trusted Company 1" class="trusted-logo" loading="lazy" />
                  <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/828b7bc8a1201ceffff746e2582af39c414ca47331ea9dfa0cf87270ca7eb677?apiKey=52e00693ef0347efa6daf6ffe0b9e649&" alt="Trusted Company 2" class="trusted-logo" loading="lazy" />
                  <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/ba9eb94e9f63b7a19146d1b1daf2e2d42d93e375dd3fb7f1191285dfe4d5f506?apiKey=52e00693ef0347efa6daf6ffe0b9e649&" alt="Trusted Company 3" class="trusted-logo" loading="lazy" />
                  <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/498124efdb353b487329f42078c1559f0382e8a75582f6ba91cb0fd54357707e?apiKey=52e00693ef0347efa6daf6ffe0b9e649&" alt="Trusted Company 4" class="trusted-logo" loading="lazy" />
                </div>
              </section>
            </div>

          </div>
        </div>
      </section>
    <?php
    return ob_get_clean();
}
add_shortcode('custom_tabs', 'custom_tabs_shortcode');
?>
