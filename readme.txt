=== Plugin Name ===
Contributors: TN-WPAdmin
Donate link: 
Tags: classroom, education, educational, K-12, lessons, notebook, resources, shop, teachers, tn, widget, teachers notebook, teachers notebook shop widget
Requires at least: 3.5
Tested up to: 3.6
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Plugin for Teachers Notebook shopkeepers to add shop promotion widgets to the sidebar or footer, or embedded into a page or post using shortcodes.

== Description ==

Plugin for [Teachers Notebook](http://teachersnotebook.com) shopkeepers to add shop promotion widgets to the sidebar or footer, or embedded into a page or post using shortcodes. Once properly installed, the following Teachers Notebook shop promotion widget types are available:

* Follow My Shop
* Visit My Shop
* Shop Items (single item scroll)
* Shop Items (1 row x 3 item scroll)
* Shop Items (2 rows x 3 item scroll)
* Shop Items (3 rows x 3 item scroll)
* Featured Items (single item scroll)
* Free Items (single item scroll)
* Free Items (1 row x 3 item scroll)
* Free Items (2 rows x 3 item scroll)
* Free Items (3 rows x 3 item scroll)
* Sale Items (single item scroll)
* Sale Items (1 row x 3 item scroll)
* Sale Items (2 rows x 3 item scroll)
* Sale Items (3 rows x 3 item scroll)
* Giveaway Items (single item scroll)

Multiple widgets and/or shortcode combinations are supported.

Note: An active Teachers Notebook Shop account membership is required and a valid shop username must be specified before valid shop data can be retrieved.  Information to be displayed for the widget type selected will retrieved from the specified Teachers Notebook Shop account.  For more information on establishing a Teachers Notebook Shop account, please visit: http://www.TeachersNotebook.com.

== Installation ==

Install the plugin:

1. Upload the plugin directory to the '/wp-content/plugins/' directory
1. Activate the plugin through the 'Plugins' menu in WordPress

To add a widget to the sidebar or footer:

1. From the Dashboard -> Widgets page, drag and drop the TN Shop Widget to the desired sidebar or footer location.
1. Specify the username for your shop and select the type of widget to display from the selection list.
1. Click the Save button to save the configuration.

For shortcode usage:

1. Insert the shortcode [teachers_notebook_shop_widget username type] into the page or post content replacing *username* with your Teachers Notebook shop user name and *type* with one of the following link types:

* Follow My Shop      => follow
* Visit My Shop       => shop
* Shop Items          => shopitems
* Shop Items (1 row)  => shopitems1
* Shop Items (2 rows) => shopitems2
* Shop Items (3 rows) => shopitems3
* Featured Items      => featured
* Free Items          => free
* Free Items (1 row)  => freeitems1
* Free Items (2 rows) => freeitems2
* Free Items (3 rows) => freeitems3
* Sale Items          => sale
* Sale Items (1 row)  => saleitems1
* Sale Items (2 rows) => saleitems2
* Sale Items (3 rows) => saleitems3
* Giveaway Items      => giveaway

Example: [teachers_notebook_shop_widget username type]

* 'username' is the Teachers Notebook shopkeeper's username
* 'type' is one of the promotional box types listed above (i.e., follow, shop, shopitems, etc.).

Multiple widgets and/or shortcode combinations are supported.

Note: An active Teachers Notebook Shop account membership is required and a valid shop username must be specified before valid shop data can be retrieved.  Information to be displayed for the widget type selected will retrieved from the specified Teachers Notebook Shop account.  For more information on establishing a Teachers Notebook Shop account, please visit: http://www.TeachersNotebook.com.

== Frequently Asked Questions ==

= Is Teachers Notebook membership required? =

As the description *Plugin for Teachers Notebook shopkeepers* implies, you must have an active Shop account on the Teachers Notebook website.

= Where does the widget get its data? =

The appropriate data for the specified shop and selected widget type is retrieved from the Teachers Notebook website.

== Screenshots ==

1. Widget sample for *Follow My Shop*.
1. Widget sample for *Visit My Shop*.

== Changelog ==

= 1.0 =
* [New] First release (09/01/2013)

== Upgrade Notice ==

= 1.0 =
*  [New] First release (09/01/2013)
