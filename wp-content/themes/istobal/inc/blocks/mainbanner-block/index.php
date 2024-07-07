<?php
class MainBannerBlock
{

	public function __construct()
	{
		add_action('acf/init', array($this, '_register'));
		add_action('acf/init', array($this,'_init_fields'));
	}

	public function _register()
	{
		acf_register_block_type(
			array(
				'name'              => 'mainbanner-block',
				'title'             => 'Блок "Главный баннер"',
				'description'       => '',
				'render_callback'   => array($this, '_render'),
				'category'          => 'theme-blocks',
				'icon'              => 'format-aside',
				'mode'              => 'edit',
				'align'             => 'wide',
				'supports'          => array(
					'align' => array('wide','full'),
					'mode'  => true,
				),
				'enqueue_assets'    => array($this, '_enqueue_assets'),
			)
		);
	}

	public function _enqueue_assets()
	{
		$cpath = basename(__DIR__);
		wp_enqueue_style('theme/'.$cpath, get_stylesheet_directory_uri().'/inc/blocks/'.$cpath.'/block.css',array());
        wp_enqueue_script('theme/'.$cpath, get_stylesheet_directory_uri().'/inc/blocks/'.$cpath.'/block.js',array());
		// return;
	}

	public function _render($block, $content = '', $is_preview = false)
	{
		$id = $block['id'];
		include 'render.php';
	}

	public function _init_fields()
	{
		
	}
}

return new MainBannerBlock();
?>