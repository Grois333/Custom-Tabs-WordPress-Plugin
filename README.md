# Custom Tabs Plugin

## Installation Guide

### Prerequisites
- WordPress 5.0 or higher
- PHP 7.4 or higher
- Advanced Custom Fields (ACF) Plugin

### Installation Steps

1. **Download the Plugin**
    - Clone or download the plugin files from the repository.

2. **Upload the Plugin**
    - Extract the plugin files.
    - Upload the `custom-tabs-plugin` directory to the `/wp-content/plugins/` directory on your WordPress site.

3. **Activate the Plugin**
    - Go to the WordPress Admin Dashboard.
    - Navigate to `Plugins > Installed Plugins`.
    - Locate `Custom Tabs Plugin` and click `Activate`.

4. **Install Dependencies**
    - Ensure you have Node.js and npm installed on your development machine.
    - Navigate to the plugin directory in your terminal:
      ```sh
      cd /path/to/wordpress/wp-content/plugins/custom-tabs-plugin
      ```
    - Install npm dependencies:
      ```sh
      npm install
      ```

5. **Compile SCSS (Optional)**
    - If you want to compile SCSS to CSS, run the following Gulp task:
      ```sh
      gulp
      ```

6. **Configure Custom Fields**
    - Ensure the Advanced Custom Fields (ACF) plugin is installed and activated.
    - Use ACF to create and configure the necessary custom fields for your tabs.

7. **Usage**
    - Navigate to the plugin settings page under `Settings > Custom Tabs` to manage your tabs content.
    - Use the provided shortcode `[custom_tabs]` to display tabs on any page or post.

### Support
For any issues or support, please create an issue on the plugin's GitHub repository.

Enjoy your new custom tabs!
