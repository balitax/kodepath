
// ************************** VARIABLES ******************************
if (!pageName) var pageName = 'home';
var parameters = '';
var busy = false;
var work = 0;
var background = 0;
var background_delay = 10000;
var work_delay = 7000;
var pause = false;


    


// ************************** EVENT HANDLERS ******************************


// Add black bar toggler
$(document).ready(function(){
		
	$("#barButton").toggle(		
			function() { hideBar(); } 		
			,function() { showBar();}
	);
	
	// Add mousewheel functionality to content div
	$('#content').mousewheel(
		function(event, delta, deltaX, deltaY) {
	
			if (delta<0) sliderDown();
			if (delta>0) sliderUp();
			
		}
	);


	
	$("#btnNextSlide").mouseover( function() { $("#btnNextSlide").attr('src','resources/images/icon_previous2.png'); } );
	$("#btnNextSlide").mouseout( function() { $("#btnNextSlide").attr('src','resources/images/icon_previous.png'); } );
	$("#btnNextSlide").click( function() { slideSwitch(0); });
	
	$("#btnPrevSlide").mouseover( function() { $("#btnPrevSlide").attr('src','resources/images/icon_next2.png'); } );
	$("#btnPrevSlide").mouseout( function() { $("#btnPrevSlide").attr('src','resources/images/icon_next.png'); } );
	$("#btnPrevSlide").click( function() { slideSwitch(1); });
	
	
});	




function hideBar(callbackfunction) {
		
		busy = true;
		
		// Be sure that bar is in original state
		//$('#black_bar','#black_bar_content').animate({width:'100%',display:'block',opacity:1,height:'auto'},0);

		// Set fixed height black bar
		h = document.getElementById('black_bar_content').offsetHeight;
		document.getElementById('black_bar').style.height = h + 'px';

		// Fadeout content
		$('#black_bar_content').fadeOut('300', 
			
			
			
			
			function() {
				
				$('#black_bar').animate({width:0},500,"swing",
					
					function () {
						
						// Reset state of black bar no that it's hidden
						document.getElementById('black_bar').style.height = 'auto';
						document.getElementById('black_bar').style.width = '100%';
						
						$('#black_bar').animate({opacity:0},0, function() { busy=false; if (callbackfunction!=undefined) callbackfunction();});
					
					}
				);
			}
		);
		

	
}



function showBar(callbackfunction) {

	busy = true;
	
	$('#black_bar_content').fadeIn(0, 
		
		
		
		function() { 
			
			$('#black_bar_header').css('display','none');
			
			// Remove active classes from menu
			$('#menu a').each(function(i) {	$(this).removeClass('active'); });
				
			// Add active class to new menu item
			$('#menuitem_'+pageName).addClass('active');
			
			$('#content').load(root+'content_'+pageName+'/', {page:pageName,params:parameters}, 
			
				function () {

						
					// Set fixed height black bar
					h = document.getElementById('black_bar_content').offsetHeight;
					document.getElementById('black_bar').style.height = h + 'px';				
					document.getElementById('black_bar').style.width = '1px';
	
					$('#black_bar_content').fadeOut(0); 
	
	
					$('#black_bar').animate({opacity:1},0,"swing", 
												
						function() {
							
							$('#black_bar_header').css('display','block');
	
							$('#black_bar').css('filter',"progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo ROOT;?>images/background_black.png', sizingMethod='crop')");
							
							$('#black_bar').animate({width:'100%'},500,"swing", 
								
								function () {	
			
									$('#black_bar_content').fadeIn(1000, 
				
										function() { 
					
											document.getElementById('black_bar').style.height = 'auto';
											busy = false;
											if (callbackfunction!=undefined) callbackfunction();
					
										}
									); 
								}
							);
						}
					);
				}
			);
		
		}
	);
	
	
	
}



function changeContent(newPageName, params,title) {
	
	pageName = newPageName;
	parameters = params;

	hideBar( 
		
		
		
		function() {
			
			$("#work_loader").fadeIn(300);
			
			showBar( function () {
				
				$("#work_loader").fadeOut(300);
				
				if (params) {
					if (pageName=='series') openWork(params,'serie',title);
					else openWork(params,'work',title);
				}
			} );
			
			 
		}
	);
	
}


function slideSwitch(next_photo) {


	function changeBackground() {

		
		if ( $("#background1").css('display') == 'none') {

	
			$("#background1").attr('src',backgrounds[background]);
			$("#background2").fadeOut(1000);
			$("#background1").fadeIn(1000);
			
		} else {
	
			$("#background2").attr('src',backgrounds[background]);
			$("#background1").fadeOut(1000);
			$("#background2").fadeIn(1000);
			
		}
		
	}
	
	
	if (!busy){
		
		busy = true;
		
		clearTimeout(timer);
		timer = setInterval( "slideSwitch(1)", background_delay);
		
		
		if (!next_photo) {
			
			if (background==0) background = backgrounds.length-1;
			else background--;
			
		} else {
			
			if (background==(backgrounds.length-1)) background = 0;
			else background++;		
			
		}
		
		
		bckimg= new Image();
		bckimg.src= backgrounds[background];
	
		// For IE:
		if ($.browser.msie) {
			
			function testImg(){
		        if(bckimg.complete != null && bckimg.complete == true){ 
		                changeBackground();
		                return;
		        }
			
		        setTimeout(testImg, 300);
			}
			setTimeout(testImg, 300);
		
		}
		else bckimg.onload = changeBackground;
		
		// Preload next image!
		bckimgnew= new Image();
		bckimgnew.src= backgrounds[background+1];
		
		busy=false;
		
	}
	else { clearTimeout(timer); timer = setTimeout( "slideSwitch(1)", 1500);}
}






$(function() {
    timer = setInterval( "slideSwitch(1)", background_delay);
	
});



function intro() {


	document.getElementById('image_loading').style.visibility = 'hidden';
	

	//$('#content').load(root+'content_'+pageName+'/', {page:pageName}, function() {
		
		// Animate
	
		h = document.getElementById('black_bar_content').offsetHeight;
		document.getElementById('black_bar').style.height = h + 'px';
	
		// Fadeout content
		document.getElementById('black_bar_content').style.display = 'none';
		document.getElementById('black_bar').style.width='1px';
	
		$('#black_bar').animate({opacity:1},0);
		
		// IE black bar transparency problem
		$('#black_bar').css('filter',"progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo ROOT;?>images/background_black.png', sizingMethod='crop')");
		
		document.getElementById('loading_content').style.display='none';
		
				//$('#loading').fadeOut(200, function () {
		$('#loading').animate({height: 1},500, function () {
		
			$('#bg_grid').animate({height: '100%'}, 500, function () {
				
				$('#black_bar').animate({width:'100%'},500,"swing", 
			
					function () {	
								
						$('#black_bar_content').fadeIn(1000);
						document.getElementById('black_bar').style.height = 'auto';
				
					}
				);
			});
		
		
		
		});

	//});

}


function openWork(parameters,type,title) {
	
	work = -1;
	busy = true;
	$('#work').css('display','inline');
	$('#backgrounds_buttons').css('display','none');
	
	$('#work').animate({height: '100%'},500, 'swing',function () {
	
		$('#bg_grid').css('display','none');
		$('#backgrounds').css('display','none');
		$('#black_bar').css('display','none');

		$("#work_loader").css('display','inline');
		
	
		$('#work').load(root+'content_'+'work_details/id='+parameters+'/'+title+'/', {page:'work_details',params:parameters,type:type}, function() {
				
			busy = false;
			setTimeout("nextWork();",1);
			
		});

		
		// Add mousewheel functionality to content div
		$('#work').mousewheel(
			function(event, delta, deltaX, deltaY) {
				if (delta<0) nextWork();
				if (delta>0) previousWork();

			}
		);
		
		
	});
		
}

function closeWork() {
	
	$('#work_container').fadeOut(500, function() {
		
		pause = false;
		clearTimeout(timer2);
		$('#backgrounds').css('display','inline');
		$('#black_bar').css('display','inline');
		$('#backgrounds_buttons').css('display','inline');
		$('#bg_grid').css('display','inline');

		$('#work').animate({height: '1px'},500, function () {

					
				$('#black_bar').fadeIn(500);
				$('#work').css('display','none');
				$("#work_loader").css('display','none');
				busy = false;
	
		});
	
	});
	

}
function previousWork(force) {

	if (!busy){
		
		if (typeof(timer2)!="undefined") { clearTimeout(timer2);}
		timer2 = setInterval( "nextWork()", work_delay);
		
		busy = true;
		
		$("#work_loader").css('display','inline');
		
		if (work==0) work = works.length-1;
		else work--;
	
		pic= new Image();
		pic.src = works[work];
	
		// For IE:
		if ($.browser.msie) {
			
			function testImg(){
		        if(pic.complete != null && pic.complete == true){ 
		                changeWork();
		                return;
		        }
			
		        setTimeout(testImg, 300);
			}
			setTimeout(testImg, 300);
		
		}
		else pic.onload = changeWork;
		
		
	}


}

function nextWork(force) {
	
	
	if ((!busy)&&( (!pause) ||(force))){
		
		if (typeof(timer2)!="undefined") { clearTimeout(timer2);}
		
		timer2 = setInterval( "nextWork()", work_delay);
		
		busy = true;
		
		$("#work_loader").css('display','inline');
		
		if (work==(works.length-1)) work = 0;
		else work++;
	
		pic= new Image();
		pic.src=works[work];
	

		
		// For IE:
		if ($.browser.msie) {
			
			function testImg(){
		        if(pic.complete != null && pic.complete == true){ 
		                changeWork();
		                return;
		        }
			
		        setTimeout(testImg, 300);
			}
			setTimeout(testImg, 300);
		
		}
		else pic.onload = changeWork;
	
		
	}

}


function jumptoWork(workId) {
	
	
	if (!busy){
		
		if (typeof(timer2)!="undefined") { clearTimeout(timer2);}
		
		timer2 = setInterval( "nextWork()", work_delay);
		
		busy = true;
		
		$("#work_loader").css('display','inline');
		
		work = workId;
	
		pic= new Image();
		pic.src=works[work];
	

		
		// For IE:
		if ($.browser.msie) {
			
			function testImg(){
		        if(pic.complete != null && pic.complete == true){ 
		                changeWork();
		                return;
		        }
			
		        setTimeout(testImg, 300);
			}
			setTimeout(testImg, 300);
		
		}
		else pic.onload = changeWork;
	
		
	}

}

function pauseWork() {

	
	if (pause) {
		pause = false;
		$("#work_pause").css('background','url(resources/images/icon_pause.png) no-repeat center right');
	}
	else {
		pause = true;
		$("#work_pause").css('background','url(resources/images/icon_play.png) no-repeat center right');
	}
}


function changeWork() {
	
	$("#work_loader").css('display','none');
	
	$("#work_footer").animate({bottom:'-220px'},200, function() {
	
		$("#work_image").fadeOut(500, function() {
		
		
			$("#work_image").attr('src',works[work]);
		
			$("#work_footer").html(works_content[work]);
		
			
		
		
			var image_ratio = $("#work_image").width() / $("#work_image").height();
			var screen_ratio = $(window).width() / $(window).height();

		
			if (image_ratio > screen_ratio) { 
			
				$("#work_image").width($(window).width()-30);
				$("#work_image").height('auto');
		
			}
			else {
			
				$("#work_image").height($(window).height()-20);
				$("#work_image").width('auto');
			
			}
		
		
			$("#work_image").fadeIn(500, function() { 
				
				$("#work_footer").animate({bottom:'-0px'},200);
				
			});
			
		
		
			// Preload next image!
			picnew= new Image();
			picnew.src= works[work+1];
		
			busy=false;
			
			
			// Jump to right thumbnail
			
			thumbCount = Math.round( ( ((document.getElementById('work_thumbs').offsetWidth-320) / 62.4) - 1) / 2)-1;
				
			jumpTo = work - thumbCount;
			
			if (work<thumbCount) jumpTo = 0;
		
			eval("workPos = $('#thumb" + jumpTo+"').position().left -4;");
			$('#work_thumbs').animate({scrollLeft: workPos},500);
		
		
			
		
			
		});
	});
	
	

}

function showThumbs() {

	$('#work_thumbs_content').css('visibility','visible');
}

function hideThumbs() {

	$('#work_thumbs_content').css('visibility','hidden');

}

function sliderUp() {
	
	if ($('#work_slider').length>0) {
		
		total = document.getElementById('work_slider').scrollHeight;
		pos = document.getElementById('work_slider').scrollTop;

		if ((pos > 0) &&(!busy)){
			busy = true;
			$('#work_slider').animate({scrollTop: '-=270px'}, 500,'swing', function() { busy=false;});
		}
	}
		
}

function sliderDown() {
	
	if ($('#work_slider').length>0) {
		
		total = document.getElementById('work_slider').scrollHeight;
		pos = document.getElementById('work_slider').scrollTop;

	
		if (((pos+270) < (total-270)) && (!busy)) {
		
			busy = true;
			$('#work_slider').animate({scrollTop: '+=270px'}, 500,'swing', function() { busy=false;});
		}
	}
}



function sendForm() {
	
	
	f = document.getElementById("contact_form");
	errors = "";
					
	
	if (f.bericht.value=="") { $('#form_bericht').addClass('error');$('#form_bericht').focus();errors = errors + "The message is empty\n"}
	if (checkEmail(f.email.value)==false) { $('#form_email').addClass('error');$('#form_email').focus();errors = errors + "Your e-mail address is not valid\n"}
	if (f.naam.value=="") { $('#form_naam').addClass('error'); $('#form_naam').focus(); errors = errors + "You forgot to fill in your name\n"}
	
	if (errors!="") {
		alert("Oops, you forgot to fill some fields...\n\n" + errors);
		return false; 
	}
	
	$("#work_loader").fadeIn(300);

	h = document.getElementById("td_contact").offsetHeight;
	document.getElementById("td_contact").style.height = h + "px";

	w = document.getElementById("td_contact").offsetWidth;
	document.getElementById("td_contact").style.width = w + "px";

	// Send form data to PHP
	$("#div_contact_form").animate({opacity:0},300, function() {
	$.ajax({
	   type: "POST",
	   url: root+"send_mail/",
	   data: "naam=" + f.naam.value + "&telefoon=" + f.telefoon.value + "&email=" + f.email.value + "&bericht=" + f.bericht.value,
	   success: function(msg){
	     			
				$("#work_loader").fadeOut(300);

				
					
					if (msg=='1')
						$("#div_contact_form").html($("#div_contact_bedankt").html());
					else $("#div_contact_form").html($("#div_contact_form").html() + "<br /><p>The message is not sent: <br />"+msg+"<br />Try again</p>");

					$("#div_contact_form").animate({opacity:1},300);
				

			
	   }
	 });
	});
	
	


	
	
	
		

}
	

