<?php
/*
	Plugin Name:	Teachers Notebook Shopkeepers Widget
	Plugin URI:		http://www.teachersnotebook.com
	Description:	Plugin for Teachers Notebook shopkeepers to add shop promotion widgets to the sidebar or footer, or embedded into a page or post using shortcodes.
	Version:		1.0
	Author:			Teachers Notebook LLC
	Author URI:		http://www.teachersnotebook.com
	License:		GPLv2 (or later)
	License URI:	http://www.gnu.org/licenses/gpl-2.0.html
*/


	$tn_shop_widget_types =	array(
							array( "Follow My Shop", "follow" ),
							array( "Visit My Shop", "shop" ),
							array( "Shop Items", "shopitems" ),
							array( "Shop Items (1 row)", "shopitems1" ),
							array( "Shop Items (2 rows)", "shopitems2" ),
							array( "Shop Items (3 rows)", "shopitems3" ),
							array( "Featured Items", "featured" ),
							array( "Free Items", "free" ),
							array( "Free Items (1 row)", "freeitems1" ),
							array( "Free Items (2 rows)", "freeitems2" ),
							array( "Free Items (3 rows)", "freeitems3" ),
							array( "Sale Items", "sale" ),
							array( "Sale Items (1 row)", "saleitems1" ),
							array( "Sale Items (2 rows)", "saleitems2" ),
							array( "Sale Items (3 rows)", "saleitems3" ),
							array( "Giveaway Items", "giveaway" )
							);


	// Define extension to WordPress' WP_Widget class
	class Teachers_Notebook_Shop_Widget extends WP_Widget
	{
		// function to import the Widget
		function Teachers_Notebook_Shop_Widget()
		{
			$widget_ops = array( 'classname' => 'Teachers_Notebook_Shop_Widget', 'description' => 'Teachers Notebook Shopkeeper&apos;s Widget' );
			$this->WP_Widget( 'Teachers_Notebook_Shop_Widget', 'TN Shop Widget', $widget_ops );
		}
	 

		// function to edit the Widget settings once added to sidebar or footer
		function form( $instance )
		{
			global	$tn_shop_widget_types;

			// set shop_name field to defined value or default 'ShopUserName' if not defined (i.e., new addition - first config)
			$shop_name = isset( $instance['shop_name'] ) ? esc_attr( $instance['shop_name'] ) : "ShopUserName";

			// HTML prompt for shop_name
?>
			<p><label for="<?php echo $this->get_field_id('shop_name'); ?>">Enter Shop User Name: <input class="widefat" id="<?php echo $this->get_field_id('shop_name'); ?>" name="<?php echo $this->get_field_name('shop_name'); ?>" type="text" value="<?php echo attribute_escape($shop_name); ?>" /></label></p>
<?php
			// set shop_type to defined array index value or default 0 if not defined (i.e., new addition - first config)
			$shop_type = intval( esc_attr( $instance['shop_type'] ), 10 );

			// HTML prompt for shop_type selection
?>
			<p>
			<label for="<?php echo $this->get_field_id('shop_type'); ?>"><?php echo 'Select Widget Type'; ?></label>
			<select name="<?php echo $this->get_field_name('shop_type'); ?>" id="<?php echo $this->get_field_id('shop_type'); ?>" class="widefat">
<?php
			// set option values for selection and defined/default shop_type option to selected
			for( $idx = 0; $idx < count( $tn_shop_widget_types ); ++$idx )
			{
				echo '<option value="' . $idx . '" id=tn_shop_type-"' . sprintf( "%02d", $idx ) . '"';
				if( $shop_type == $idx )
					echo ' selected="selected"';
				echo '>' . $tn_shop_widget_types[$idx][0] . '</option>';
			}
?>
			</select>
			</p>
<?php
		}
	 
		// update the Widget variables (set all old to new then overwrite changes)
		function update($new_instance, $old_instance)
		{
			$instance = $old_instance;
			$instance['shop_name'] = $new_instance['shop_name'];
			$instance['shop_type'] = $new_instance['shop_type'];
			$instance['title'] = $new_instance['title'];

			return $instance;
		}

		// execute the Widget
		function widget($args, $instance)
		{
			$errmsg	= "";
			$html	= "";

			global	$tn_shop_widget_types;


			extract( $args, EXTR_SKIP );

			echo $before_widget;

			if( ($handle = curl_init( "http://www.teachersnotebook.com/widget/" . $instance['shop_name'] . "/" . $tn_shop_widget_types[$instance['shop_type']][1] )) !== false )
			{
				curl_setopt( $handle, CURLOPT_CONNECTTIMEOUT, 15 );
				curl_setopt( $handle, CURLOPT_HEADER, 0 );
				curl_setopt( $handle, CURLOPT_RETURNTRANSFER, 1 );

				if( ($html = curl_exec( $handle )) === false )
					$errmsg = "No Response";

				curl_close( $handle );
			}
			else
				$errmsg = "Internal (URL)";

			if( $errmsg != "" )
				$html = "[teachers_notebook_shop_widget]<br />ERROR: " . $errmsg;

			echo $html;

			echo $after_widget;
		}
	}

	function teachers_notebook_shop_widget_shortcode_handler( $argv )
	{
		$errmsg	= "";
		$html	= "";
		$type	= "";
		$user	= "";

		global	$tn_shop_widget_types;


		for( $x = 0; $x < count( $argv ); ++$x )
		{
			for( $y = 0; $y < count( $tn_shop_widget_types ); ++$y )
			{
				if( strcasecmp( $argv[$x], $tn_shop_widget_types[$y][1] ) === 0 )
				{
					$type = $tn_shop_widget_types[$y][1];
					break;
				}
			}

			if( $y == count( $tn_shop_widget_types ) )
				$user = $argv[$x];
		}

		if( $type == "" && $user == "" )
			$errmsg = 'Username and Type Required';
		else if( $user == "" )
			$errmsg = 'Username Required';
		else if( $type == "" )
			$errmsg = 'Type Required';
		else
		{
			if( ($handle = curl_init( "http://www.teachersnotebook.com/widget/" . $user . "/" . $type )) !== false )
			{
				curl_setopt( $handle, CURLOPT_CONNECTTIMEOUT, 15 );
				curl_setopt( $handle, CURLOPT_HEADER, 0 );
				curl_setopt( $handle, CURLOPT_RETURNTRANSFER, 1 );

				if( ($html = curl_exec( $handle )) === false )
					$errmsg = "No Response";

				curl_close( $handle );
			}
			else
				$errmsg = "Internal (URL)";
		}

		if( $errmsg != "" )
			$html = "[teachers_notebook_shop_widget]<br />ERROR: " . $errmsg;

		return $html;
	}


	// register the Widget
	add_action( 'widgets_init', create_function('', 'return register_widget("Teachers_Notebook_Shop_Widget");') );

	// register the shortcode
	add_shortcode( 'teachers_notebook_shop_widget', 'teachers_notebook_shop_widget_shortcode_handler' );
?>
