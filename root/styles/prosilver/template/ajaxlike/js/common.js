/*
	ajaxlike MOD
	javascript functions
*/

function load_tips(id)
{
		$(id).tipsy({
    			delayIn: 0,
    			delayOut: 0,
    			fade: false,
    			gravity: 's',    // gravity
    			html: true,
    			offset: 0,
    			opacity: 0.8,
    			trigger: 'hover'
		});
//alert(id);
}

function ajaxlike_like(post_id, topic_id, forum_id, user_id, callback_url)
{
	
	var rv = new Date().getTime();
	
	$.get(callback_url, {
		ajaxlike_rnd : rv,
		f: forum_id, 
		t: topic_id, 
		p: post_id, 
		like_from : user_id,
		ajaxlike_action: 'like', 
		ajaxlike_data: ''
		},   function(data){
		
	 		document.getElementById('ajaxlike_content'+post_id).innerHTML = data;
	 		load_tips('#ajaxlike_tooltip'+post_id);
		}
	);

}

function ajaxlike_unlike(post_id, topic_id, forum_id, user_id, callback_url)
{

	var rv = new Date().getTime();
	
	$.get(callback_url, {
		ajaxlike_rnd : rv,
		f: forum_id, 
		t: topic_id, 
		p: post_id, 
		like_from : user_id,
		ajaxlike_action: 'unlike', 
		ajaxlike_data: ''
		},   function(data){
		
	 		document.getElementById('ajaxlike_content'+post_id).innerHTML = data;
	 		load_tips('#ajaxlike_tooltip'+post_id);
		}
	);
}

function ajaxlike_fulllistbox(post_id, topic_id, forum_id, callback_url, like_on_text)
{

	$(function() {
		
		document.getElementById('ajaxlike-dialog').innerHTML = "<p>loading...</p>";
		
		$( "#dialog:ui-dialog" ).dialog("destroy");
		
		$( "#ajaxlike-dialog" ).dialog({
			width: '500',
			height: '400',
			modal: true,
			show: "fade",
			hide: "fade",
			buttons: {
				OK: function() {
					$( this ).dialog( "close" );
				}
			},
			open: function(event, ui) {
				
				jQuery('.ui-widget-overlay').bind('click',function(){ 
                	jQuery('#ajaxlike-dialog').dialog('close'); 
            	});
            	
				var rv = new Date().getTime();
				
				$.getJSON(callback_url, {
					ajaxlike_rnd : rv,
					f: forum_id, 
					t: topic_id, 
					p: post_id, 
					ajaxlike_action: 'fulllist', 
					ajaxlike_data: ''
				},   function(data){
				
				document.getElementById('ajaxlike-dialog').innerHTML = "";
				
				for(i=0;i<data.length;i++){
					
					document.getElementById('ajaxlike-dialog').innerHTML += '<div class="ajaxlike_listing_item">'+$('<div />').html(data[i].avatar).text()+(data[i].avatar!=''?"<br />":"")+$('<div />').html(data[i].username_full).text()+'<br /><span class="ajaxlike_listing_item_date">'+like_on_text+' <i>'+data[i].date+'</i></span></div>';
					
				}
				
				
				});
				
			}
		});
		
	});

}

