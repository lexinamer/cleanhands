<form action="" method="post" name="data_form" id="data_form">
	<table class="ppg_table" width="100%" cellspacing="0" cellpadding="0">
		<tr>
		  <th width="20%"> <strong><?php _e('Posts / Pages Generator Settings','ppg');?></strong> </th>
		  <th width="80%">&nbsp;  </th>
		</tr>
		
		<tr class="notemsg heading">
		  <td colspan="2">
			<br><strong><?php _e('Instruction:','ppg');?></strong> 
		  </td>
		</tr>  
		<tr class="notemsg">
		  <td colspan="2">
			<ul>
				<li><?php _e('<span class="dashicons dashicons-yes"></span> Select a Post type, for which you want to create a post / page.','ppg');?></li>
				<li><?php _e('<span class="dashicons dashicons-yes"></span> Enter a post title dynamically using a short tags <strong>%PRIMARY%</strong> and <strong>%SECONDARY%</strong> keywords.','ppg');?></li>
				<li><?php _e('<span class="dashicons dashicons-yes"></span> Enter a primary & secondary keywords one per line, like product names as primary, which you want to sell in multiple cities as secondary and want to create pages / posts for that with a single click.','ppg');?></li>
				<li><?php _e('<span class="dashicons dashicons-yes"></span> Enter a page / post content dynamically using a short tags <strong>%PRIMARY%</strong> and <strong>%SECONDARY%</strong> keywords (like %PRIMARY% in %SECONDARY%).','ppg');?></li>
			</ul>
		  </td>
		</tr>  
		<tr>
		  <td colspan="2">
		  	<table width="100%" cellspacing="0" cellpadding="0">
				<tbody>
					<tr>
						<td width="20%">
						  <strong><?php _e('Post Type:','ppg');?></strong><br>
						</td>
						<td>
							<?php
								$args = array(
								   'public'   => true,
								   '_builtin' => false,
								);

								$output = 'names'; // names or objects, note names is the default
								$operator = 'and'; // 'and' or 'or'

								$post_types = get_post_types( $args, $output, $operator ); 
							?>
							<select name="ppg_pagetype" id="ppg_pagetype">
								<option value="page"><?php _e('Page','ppg');?></option>
								<option value="post"><?php _e('Post','ppg');?></option>
								<?php
									foreach ( $post_types as $key=>$type ) { 
										echo '<option value="' . $key . '" >' . ucwords($type) . '</option>'; 
									} 
								?>
							</select>
						</td>
						<tr>
							<td width="20%">
							  <strong><?php _e('Page / Post Title:','ppg');?></strong><br>
							</td>
							<td>
								<input type="text" name="ppg_pagetitle" id="ppg_pagetitle" placeholder="Enter Page / Post Title"/>
							</td>
						</tr>
					</tr>
					<tr>
						<td colspan="2">
							<table class="ppg_keyword">
								<tr>
									<td width="50%">
										<strong><?php _e('Primary Keyword : <span>(One Per Line)</span>','ppg');?></strong><br>
										<textarea placeholder="Enter Primary Keywords" rows="8" class="ppg_keyword" name="ppg_pkeyword" id="ppg_pkeyword"></textarea>
									</td>
									<td width="50%">
										<strong><?php _e('Secondary Keyword : <span>(One Per Line)</span>','ppg');?></strong><br>
										<textarea placeholder="Enter Secondary Keywords" rows="8" name="ppg_skeyword" class="ppg_keyword" id="ppg_skeyword"></textarea>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					
					<tr>
						<td colspan="2">
							<strong><?php _e('No of Pages to be created: ','ppg');?></strong> <span id="ppg_count">0</span><br><br>
						</td>
					</tr>
					
					<tr>
						<td colspan="2">
							<strong><?php _e('Posts / Page Content:','ppg');?></strong><br><br>
							<?php
								$content = '';
								$editor_id = 'ppg_editor';
								wp_editor( $content, $editor_id );
							?>
						</td>
					</tr>	
					
					<tr>
						<td colspan="2" align="center">
							<input type="button" name="ppg_pbutton" class="ppg_button" value="Publish" />
							<input type="button" name="ppg_dbutton" class="ppg_button" value="Save as Draft" />
							<input type="button" name="ppg_ubutton" class="ppg_ubutton" value="Undo Last Process" />
							<span class="ppg_loader"></span>
						</td>
					</tr>	
				</tbody>
			</table>
		 </td>
		</tr>
	</table>
	<input type="hidden" id="ppgstring" value="<?php echo wp_create_nonce( 'rfp-security-data' ); ?>" />
</form>

<input type="hidden" id="hidd_id" />
<input type="hidden" id="hidd_ptype" />