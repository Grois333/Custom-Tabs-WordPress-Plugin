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

// Enqueue styles and scripts
function custom_tabs_plugin_enqueue_assets() {
    wp_enqueue_style('custom-tabs-style', plugin_dir_url(__FILE__) . 'custom-tabs-style.css');
}
add_action('wp_enqueue_scripts', 'custom_tabs_plugin_enqueue_assets');

// Shortcode for tabbed content
function custom_tabs_shortcode() {
    ob_start();
    ?>
    <section class="container">
        <div class="content">
          <div class="main-content">
            <nav class="nav">
              <a href="#" class="nav-item highlight">Retail</a>
              <a href="#" class="nav-item">Luxury fashion</a>
              <a href="#" class="nav-item">Digital goods</a>
              <a href="#" class="nav-item">Travel</a>
              <a href="#" class="nav-item">Athletic & Outdoors</a>
            </nav>
            <section class="testimonial-section">
              <div class="testimonial-content">
                <article class="testimonial">
                  <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/2633ecc8187779d7d2f7e0501c024d52e72267560f300db5a0a55b640f2f11e7?apiKey=52e00693ef0347efa6daf6ffe0b9e649&" alt="Background Image" />
                  <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/e8b0e27808e22b8569af2f370a81b27657b5fb0b9fd7b6affe734647935acf99?apiKey=52e00693ef0347efa6daf6ffe0b9e649&" class="testimonial-logo" alt="Company Logo" />
                  <p class="quote">
                    <span class="author-name">Riskified has enabled</span>
                    <span class="author-name"> safe, fast, and seamless payments </span>
                    throughout our collaboration. We’re excited to see what opportunities we can unlock in the future.
                  </p>
                  <div class="quote-author">
                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/471822f81967678cc25ba5ec544e009b0785cd1720d0189bee67ce307dc78739?apiKey=52e00693ef0347efa6daf6ffe0b9e649&" class="author-img" alt="Author Image"/>
                    <div class="author-details">
                      <span class="author-name">Michael Fleisher</span>
                      <span class="author-title">Chief Financial Officer</span>
                    </div>
                  </div>
                  <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/524b42ad5bea456b896d82890b2442057f4150862bd6f18eeac687f3ac37e218?apiKey=52e00693ef0347efa6daf6ffe0b9e649&" class="testimonial-logo" alt="Company Logo 2"/>
                </article>
                <aside class="cta-section">
                  <div class="cta-content">
                    <span class="percentage">50%</span>
                    <p class="cta-text">Reduction in the cost of fraud</p>
                  </div>
                  <div class="cta-button" tabindex="0">Read Wayfair case study</div>
                </aside>
              </div>
            </section>
            <section class="trusted-by">
              <p class="trusted-title">TRUSTED BY</p>
              <div class="trusted-logos">
                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/15550cfc3ac6a4835db54e3712d589476ac774f8fa9594c3fbe63562ef76ab27?apiKey=52e00693ef0347efa6daf6ffe0b9e649&" alt="Trusted Company 1" class="trusted-logo" />
                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/828b7bc8a1201ceffff746e2582af39c414ca47331ea9dfa0cf87270ca7eb677?apiKey=52e00693ef0347efa6daf6ffe0b9e649&" alt="Trusted Company 2" class="trusted-logo" />
                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/ba9eb94e9f63b7a19146d1b1daf2e2d42d93e375dd3fb7f1191285dfe4d5f506?apiKey=52e00693ef0347efa6daf6ffe0b9e649&" alt="Trusted Company 3" class="trusted-logo" />
                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/498124efdb353b487329f42078c1559f0382e8a75582f6ba91cb0fd54357707e?apiKey=52e00693ef0347efa6daf6ffe0b9e649&" alt="Trusted Company 4" class="trusted-logo" />
              </div>
            </section>
          </div>
        </div>
      </section>
    <?php
    return ob_get_clean();
}
add_shortcode('custom_tabs', 'custom_tabs_shortcode');
?>
