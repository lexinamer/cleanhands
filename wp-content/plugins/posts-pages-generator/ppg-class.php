<?php
class Ppg_Class
{
	function __construct()
	{
		//ADD STYLE AND SCRIPT IN HEAD SECTION
		add_action('admin_init', array(&$this,'ppg_backend_script'));
		add_action('wp_ajax_ppg_call_pages', array( $this, 'ppg_generate_pages' ) );
		add_action('wp_ajax_ppg_undo_process', array( $this, 'ppg_undo_generate_process' ) );
		
		// Add Menu
		add_action('admin_menu', array(&$this, 'ppg_admin_menu'));
	}
	
	// BACKEND SCRIPT
	function ppg_backend_script(){
		if(is_admin()){
			wp_enqueue_script('ppg-admin-script', plugins_url('assets/js/ppg-admin.js', __FILE__ ), array( 'jquery' ), false, true);	
			wp_enqueue_style('ppg-admin-style',plugins_url('assets/css/ppg-admin.css',__FILE__));	
		}
	}
	
	/**
	 * Register the management page
	 * 
	 * @access public
	 * @since 1.0
	 */
	function ppg_admin_menu() {
		 add_menu_page( 
			__( 'Posts / Pages Generator', 'ppg' ),
			'PP Generator',
			'manage_options',
			'ppgenerator',
			array(&$this, 'ppg_generator'),
			'dashicons-format-aside',
			6
		); 
	}
	
	function ppg_generator(){
		include_once('inc/ppg-page.php');
	}
	
	// Generate Pages 
	function ppg_generate_pages()
	{
		$ppg_pagetitle  = isset($_REQUEST['ppg_pagetitle'])?$_REQUEST['ppg_pagetitle']:'';
		$ppg_pagetype   = isset($_REQUEST['ppg_pagetype'])?$_REQUEST['ppg_pagetype']:'';
		$ppg_pagestatus = isset($_REQUEST['ppg_pstatus'])?$_REQUEST['ppg_pstatus']:'';
		$ppg_pkeyword   = isset($_REQUEST['ppg_pkeyword'])?$_REQUEST['ppg_pkeyword']:'';
		$ppg_skeyword   = isset($_REQUEST['ppg_skeyword'])?$_REQUEST['ppg_skeyword']:'';
		$ppg_editor     = isset($_REQUEST['ppg_editor'])?$_REQUEST['ppg_editor']:'';
		
		// explode all the primary keywords
		$pkeywords = preg_split( '/\r\n|\r|\n/', $ppg_pkeyword );
		$skeywords = preg_split( '/\r\n|\r|\n/', $ppg_skeyword );
		
		$i=0;
		$idarray = array();
		foreach($pkeywords as $value){
			foreach($skeywords as $rows){
				
				// Generate Title
				$pagetitle 	 = str_replace('%PRIMARY%',$value,$ppg_pagetitle);
				$pagetitle 	 = str_replace('%SECONDARY%',$rows,$pagetitle);
				
				// Generate Content
				$pagecontent = str_replace('%PRIMARY%',$value,$ppg_editor);
				$pagecontent = str_replace('%SECONDARY%',$rows,$pagecontent);
				
				// Create post object
				$user_id = get_current_user_id();
				$arraypost = array(
				  'post_title'    => wp_strip_all_tags($pagetitle),
				  'post_content'  => $pagecontent,
				  'post_status'   => $ppg_pagestatus,
				  'post_author'   => $user_id,
				  'post_type'     => $ppg_pagetype
				);
				 
				// Insert the post into the database
				$insert_id = wp_insert_post( $arraypost );
				
				array_push($idarray,$insert_id);
				$i++;
			}
		}
		
		$successmsg = $this->getmessage($ppg_pagetype,$i);

		$finalarray = serialize($idarray);
		wp_die($i.' '.$successmsg.' created successfully as '.$ppg_pagestatus.'##'.$finalarray.'##'.$ppg_pagetype);
	}
	
	//Get success message to show
	function getmessage($ppg_pagetype,$count){
		if($ppg_pagetype=='page'){
			if($count>1){
				$pagetype = 'pages';
			}else{
				$pagetype = 'page';
			}
		}elseif($ppg_pagetype=='post'){
			if($count>1){
				$pagetype = 'posts';
			}else{
				$pagetype = 'post';
			}
		}else{
			if($count>1){
				$pagetype = $ppg_pagetype.' posts';
			}else{
				$pagetype = $ppg_pagetype.' post';
			}
		}
		
		return $pagetype;
	}
	
	// Undo 
	function ppg_undo_generate_process(){
		$hidd_id  	 = isset($_REQUEST['hidd_id'])?unserialize($_REQUEST['hidd_id']):'';
		$hidd_ptype  = isset($_REQUEST['hidd_ptype'])?$_REQUEST['hidd_ptype']:'';
		
		foreach($hidd_id as $rows){
			wp_delete_post($rows,true); 
		}
		
		$successmsg = $this->getmessage($hidd_ptype,count($hidd_id));

		wp_die('Total '.count($hidd_id).' '.$successmsg.' deleted successfully');
	}
}