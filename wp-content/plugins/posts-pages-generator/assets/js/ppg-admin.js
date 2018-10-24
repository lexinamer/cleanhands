/*
  PPG : ADMIN SCRIPT
*/

jQuery(document).ready(function(){
	
	// Publish / Draf Page / Post
	jQuery('.ppg_button').click(function(){
		
		var ppgstring 	  = jQuery('#ppgstring').val();
		var ppg_pagetitle = jQuery('#ppg_pagetitle').val();
		var ppg_pagetype  = jQuery('#ppg_pagetype').val();
		var ppg_pkeyword  = jQuery('#ppg_pkeyword').val();
		var ppg_skeyword  = jQuery('#ppg_skeyword').val();
		
		if(jQuery.trim(ppg_pkeyword)=='' && jQuery.trim(ppg_skeyword)==''){
			alert('Enter either Primary Keywords or Secondary Keywords');
			return false;
		}
		
		var ppgbutton = jQuery(this).val();
		
		// Check Post / Page Status
		if(ppgbutton=='Publish'){
			var pstatus = 'publish';
		}else{
			var pstatus = 'draft';
		}

		tinyMCE.triggerSave();
		var ppg_editor    = jQuery('#ppg_editor').val();
		
		// Calculate Page / Post Count
		var plines = ppg_pkeyword.split("\n");
		var pcount = plines.length;
		
		var slines = ppg_skeyword.split("\n");
		var scount = slines.length;
		
		var totalpages = pcount*scount;
		
		// Check Page / Post Type & its count
		if(ppg_pagetype=='page'){
			if(totalpages>1){
				var pagetype = 'pages';
			}else{
				var pagetype = 'page';
			}
		}else if(ppg_pagetype=='post'){
			if(totalpages>1){
				var pagetype = 'posts';
			}else{
				var pagetype = 'post';
			}
		}else{
			if(totalpages>1){
				var pagetype = ppg_pagetype+' posts';
			}else{
				var pagetype = ppg_pagetype+' post';
			}
		}
		
		// Confirmation before publishing / Drafting Page / Post
		if(!confirm('Total '+totalpages+' '+pagetype+' will be created, Do you want to continue.?')){
			return false;
		}
		
		jQuery.ajax({
			url  : ajaxurl,
			type : "POST",
			data : {
				action   : 'ppg_call_pages',
				security : ppgstring,
				ppg_pagetitle: ppg_pagetitle,
				ppg_pagetype : ppg_pagetype,
				ppg_pkeyword : ppg_pkeyword,
				ppg_skeyword : ppg_skeyword,
				ppg_editor : ppg_editor,
				ppg_pstatus : pstatus
			},
			beforeSend: function(){
				jQuery('.ppg_loader').css('display','inline-block');
				jQuery('.ppg_button').css('display','inline-block');
				jQuery('.ppg_loader').fadeIn();
				jQuery('.ppg_button').attr('disabled','disabled');
			},
			success : function( response ) {
				if(response){
					var res = response.split("##");
					
					alert(res[0]);
					
					jQuery('#hidd_id').val(res[1]);
					jQuery('#hidd_ptype').val(res[2]);
					jQuery('.ppg_ubutton').fadeIn();
					jQuery('.ppg_loader').hide();
					jQuery('.ppg_button').removeAttr('disabled');
					
					jQuery('#data_form')[0].reset();
				}
			}
		});
	});
	
	// Undo Process
	jQuery('.ppg_ubutton').click(function(){
		
		var ppgstring 	  = jQuery('#ppgstring').val();
		var hidd_id 	  = jQuery('#hidd_id').val();
		var hidd_ptype 	  = jQuery('#hidd_ptype').val();
		
		// Confirmation before publishing / Drafting Page / Post
		if(!confirm('Are you sure want to revert the last process.?')){
			return false;
		}
		
		jQuery.ajax({
			url  : ajaxurl,
			type : "POST",
			data : {
				action   : 'ppg_undo_process',
				security : ppgstring,
				hidd_id: hidd_id,
				hidd_ptype : hidd_ptype,
			},
			beforeSend: function(){
				jQuery('.ppg_loader').css('display','inline-block');
				jQuery('.ppg_loader').fadeIn();
				jQuery('.ppg_button').attr('disabled','disabled');
			},
			success : function( response ) {
				if(response){
					alert(response);
					jQuery('.ppg_loader').fadeOut();
					jQuery('.ppg_ubutton').fadeOut();
					jQuery('.ppg_button').removeAttr('disabled');
				}
			}
		});
	});
	
	// Number of pages / posts to be created
	jQuery( ".ppg_keyword" ).blur(function() {
		var ppg_pkeyword  = jQuery('#ppg_pkeyword').val();
		var ppg_skeyword  = jQuery('#ppg_skeyword').val();
		
		if(jQuery.trim(ppg_pkeyword)=='' && jQuery.trim(ppg_skeyword)==''){
			jQuery('#ppg_count').html(0);
			return false;
		}
		
		var plines = ppg_pkeyword.split("\n");
		var pcount = plines.length;
		
		var slines = ppg_skeyword.split("\n");
		var scount = slines.length;
		
		var totalpages = pcount*scount
		jQuery('#ppg_count').html(totalpages);
	});	
});