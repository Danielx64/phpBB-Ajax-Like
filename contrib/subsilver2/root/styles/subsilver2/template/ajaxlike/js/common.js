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
}

function ajaxlike_like(post_id, topic_id, forum_id, user_id, callback_url)
{
	
	var rv = new Date().getTime();
	
	$.get(callback_url, {
		ajaxlike_rnd : rv,
		//f: forum_id, // Senko say it is not useful :D
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
		//f: forum_id, // Senko say it is not useful :D
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
			position: 'center',
			show: "fade",
			hide: "fade",
			buttons: {
				OK: function() {
					$( this ).dialog( "close" );
				}
			},
 			beforeClose: function(event, ui) { 
  				$("body").css({ overflow: 'inherit' }); 
			}, 
			open: function(event, ui) {
  				$("body").css({ overflow: 'hidden' });
				
				jQuery('.ui-widget-overlay').bind('click',function(){ 
                	jQuery('#ajaxlike-dialog').dialog('close'); 
            	});
            	
				var rv = new Date().getTime();
				
				$.getJSON(callback_url, {
					ajaxlike_rnd : rv,
					//f: forum_id, // Jakub say it is not useful :D
					t: topic_id, 
					p: post_id, 
					ajaxlike_action: 'fulllist', 
					ajaxlike_data: ''
				},   function(data){
				
				document.getElementById('ajaxlike-dialog').innerHTML = "";
				
				for(i=0;i<data.length;i++){
					
					
					document.getElementById('ajaxlike-dialog').innerHTML += '<div class="ajaxlike_listing_item"><div class="ajaxlike_listing_avatar">'+data[i].avatar+'</div><div class="ajaxlike_listing_content">'+data[i].username_full+'<br /><span class="ajaxlike_listing_item_date">'+like_on_text+' <i>'+data[i].date+'</i></span></div><div style="clear: both;">&nbsp;</div></div>';
					
				}
				
				
				});
				
			}
		});
		
	});

}

/*
	ajaxlike notifications
*/
function ajaxlike_notificationsbox(callback_url)
{

				
		       var rv = new Date().getTime();
				
				$.getJSON(callback_url, {
					ajaxlike_rnd : rv,
					ajaxlike_action: 'notifications', 
					ajaxlike_data: ''
				},   function(data){
					
			if(data!=null)
			{
				var nlikes = (data[0].new_likes);
				var ninfo = (data[0].like_new);
				

				document.getElementById('ajaxlike_not-dialog').innerHTML = "";
				
				for(i=0;i<data.length;i++){
					document.getElementById('ajaxlike_not-dialog').innerHTML += '<div class="ajaxlike_not_listing_item" like_id="'+data[i].like_id+'" id="box'+data[i].like_id+'"><div class="ajaxlike_noti ajaxlike_noti_Top ajaxlike_noti_Bottom ajaxlike_noti_Selected" style="opacity: 1; "><span id="ajaxlike_not_x" class="close'+data[i].like_id+'">&nbsp;</span><div class="ajaxlike_not_listing_item_avatar">'+data[i].avatar+(data[i].avatar!=''?"</div>":"")+data[i].username_full+'<br />'+data[i].like_info+'<a href="'+data[i].post+'">'+data[i].like_text+'</a><br /><span class="ajaxlike_not_listing_item_date"><i>'+data[i].date+'</i></span></div></div>';
			 	 
					$("#ajaxlike_not_new").html(""+"<strong>" + nlikes + "</strong>" + ninfo +  "");
	  				$("#ajaxlike_not-dialog").fadeIn("slow");	
	   				$('div').on('hover',function() {  
         			hoveredId = $(this).attr('like_id');
         			var like_id =(hoveredId);
		 			$(".close" + like_id).click(function () {
        			//close notification when the close button is clicked
        			$("#box" + like_id).fadeOut();
          			});
		  			
		  			}); 
		  		  	
       				setTimeout(function(){
      				$("#ajaxlike_not-dialog" ).fadeOut(3000);
	  	 			},5000); 
				
			}
			
		}
			
			});


}

function ajaxlike_init_notify(interval, callback_url)
{

ajaxlike_notificationsbox(callback_url); // page load notify

setInterval(function(){ajaxlike_notificationsbox(callback_url)},interval);

}

//Read notifications

	
function ajaxlike_liked_listbox(callback_url)
{   

	$(function() {
		
			// show something until load complete in slow connection...
			document.getElementById('ajaxlike-not-dialog').innerHTML = "<p>loading...</p>";
				

		$( "#dialog:ui-dialog" ).dialog("destroy");

			$( "#ajaxlike-not-dialog" ).dialog({
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
 			beforeClose: function(event, ui) { 
  				$("body").css({ overflow: 'inherit' });
			}, 
			open: function(event, ui) {
  				$("body").css({ overflow: 'hidden' });
    				
				
				jQuery('.ui-widget-overlay').bind('click',function(){ 
                	jQuery('#ajaxlike-not-dialog').dialog('close'); 
            	});

			var rv = new Date().getTime();
				
				$.getJSON(callback_url, {
					ajaxlike_rnd : rv,
					ajaxlike_action: 'liked_list', 
					ajaxlike_data: ''
				},   function(data){
					
				var ninfo = (data[0].like_new);
				document.getElementById('ajaxlike-not-dialog').innerHTML = "";
				
				for(i=0;i<data.length;i++){
					
					document.getElementById('ajaxlike-not-dialog').innerHTML += '<div class="ajaxlike_listing_item ajaxlike_post_'+data[i].item_class+'"><div class="ajaxlike_not_listing_item_avatar">'+data[i].avatar+'</div><div class="ajaxlike_listing_content">'+data[i].username_full+'<br />'+data[i].like_info+'<a href="'+data[i].post+'" class="ajaxlike_link">'+data[i].like_text+'</a><br /><span class="ajaxlike_not_listing_item_date"><i>'+data[i].date+'</i></span><br /><span class="ajaxlike_listing_item_date"><i>'+data[i].post_text+'</i></span></div><div style="clear: both;">&nbsp;</div></div>';
					
				$("#ajaxlike_not_new").html(""+"<strong>0</strong>" + ninfo +  "");
				
				}
			});

            }
            
		});

	});
}