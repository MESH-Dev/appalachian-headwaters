jQuery(document).ready(function($){

  //Are we loaded?
  console.log('New theme loaded!');
var arrow = '<span class="subnav-trigger"><img src="'+$dir+'/img/arrow-right-01_white.svg">'
  //Let's do something awesome!

   //Force divs in homepage grid to be square
//Setup variables to hold our sizes
var gi2, gi3, gi4, gi5, gi6, gi7, cp3, cp4, cp5, cp6, cp7, $wW;
var $mclk = 0;
//Grab the width of each element
function gi_resize(){
  gi2 = $('.grid-item-width2 ').width();
  gi3 = $('.grid-item-width3 ').width();
  //console.log(gi3);
  gi4 = $('.grid-item-width4 ').width();
  gi5 = $('.grid-item-width5 ').width();
  gi6 = $('.grid-item-width6 ').width();
  gi7 = $('.grid-item-width7 ').width();
  cp3 = $('.grid-item.columns-3').width();
  cp4 = $('.grid-item.columns-4').width();
  cp5 = $('.grid-item.columns-5').width();
  cp6 =  $('.grid-item.columns-6').width();
  //console.log(cp6);
  //cp6_alt = $('.columns-6')
  cp7 = $('.grid-item.columns-7').width();

  $wW = $(window).width();


  //return gi2, gi3, gi4;
}
//Run the function above at document ready and on a window resize event
 $(document).ready(gi_resize(gi2, gi3, gi4, gi5, gi6, gi7, cp3,cp4, cp5, cp6, cp7, $wW));
 $(window).resize(gi_resize(gi2, gi3, gi4, gi5, gi6, gi7, cp3, cp4, cp5, cp6, cp7, $wW));

//Apply our widths to the height of selected elements either on load, or on resize
function _resize(){
  gi_resize(gi2, gi3, gi4, gi5, gi6, gi7, cp3, cp4, cp5, cp6, cp7, $wW);
   $(window).resize(gi_resize(gi2, gi3, gi4, gi5, gi6, gi7, cp3, cp4, cp5, cp6, cp7,$wW));

 //  console.log("Width 2: "+gi2);
	// console.log("Width 3: "+gi3);
	//  console.log("Width 4: "+gi4);
  //$('.grid-item-width2').css({height: (gi2)});
 // $('.grid-item-width2.nest').css({height: (gi2*2)});
 // $('.grid-item-width2.nest .nested').css({height: gi2});
  //$('.grid-item-width3').css({height: gi3});
  //$('.grid-item-width4').css({height: gi4});
  //$('.grid-item-width5').css({height: gi5})
  //$('.grid-item-width6').css({height: (gi6*.66)});
 // $('.width6-diamond').css({height: (gi6*0.4)});
 // $('.columns-4.child-links').css({height:cp4});
  //$('.columns-6.promo').css({height: (cp6*.5)});
 // $('.columns-6.cpromo').css({height: (cp6*.66)});
  //console.log(cp6*.66);
  //$('.columns-6 .width6-diamond').css({height: (cp6*0.4)});
  //$('.columns-5.event-feed').css({height: (cp5)});
 // $('.columns-7.trip').css({height: cp5});
  //$('.grid-item-width6.nest').css({height: gi2});
 // $('.grid-item-width6.nest .nested').css({height: gi2});
  //$('.grid-item-width7').css({height: (gi5)});
  $('.grid-item.columns-3').css({height:cp3});
  $('.grid-item.columns-4').css({height:cp4});
  if($wW >= 1000){
    $('.grid-item.columns-6').css({height:cp6*0.66});
    $('.grid-item.columns-4.tweener').css({height:cp4});
  }else{
    $('.grid-item.columns-6').css({height:cp6});
    $('.grid-item.columns-4.tweener').css({height:cp6});
  }
  console.log($wW);


  if($wW <= 1100){
    $('.main-navigation').css({'display':'none'});

    //$('.main-navigation ul > li.menu-item-has-children .wrap .content').append(arrow);
    
  }else{
    $('.main-navigation').css({'display':'inline-block'});
    // if(arrow.length > 0){
    //   $('.main-navigation ul li.menu-item-has-children .wrap .content').remove(arrow);
    // }
    
  }


}

//Run the function on load & on resize
_resize();
$(window).resize(_resize);

//jquery.parallax
//if (windowW > 1070){
  //   $('#right').each(function(i){
  //       i = i++;
  //       $(this).parallax("right", -.5);
  //     });   

  //   $('#left').each(function(i){
  //       i = i++;
  //       $(this).parallax("left", -.5);
  //     });  

  //   $('.has-parallax').parallax("50%",.5);
  // //}

var wWidth = $(window).width();
//Scrollr
//if(wWidth > 1024){
	var s = skrollr.init({
		easing:'cubic',
		edgeStrategy:'ease',
    forceHeight:false,
    smoothScrolling: true
	});
//}

//Smooth page scroll + page scroll location control
$(function() {
	$('a[href*=#]:not([href=#])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
		  var target = $(this.hash);
		  target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
		  if (target.length) {
		    $('html,body').animate({
		      //'top-75' is custom.  limits the offset to top of window plus 75px
		      scrollTop: (target.offset().top-75)
		    }, 800);
		    return false;
		  }
		}
	});
});

//__--:::: Mobile Navigation ::::--__\\

//This is how we add/work with SVGs inside of a js file

//__-- Start a new request
var client = new XMLHttpRequest();
//__-- Open our svg file
client.open('GET', $dir+'/img/arrow-right-01_white.svg');
//__-- Let's do something with our file.
//__--:: Specifically, we want to add it to any of our nav items that contain children
client.onreadystatechange = function() {
  //__-- Check to see if we have data, the readyState will be 4
  if(this.readyState == 4){

    //__-- Create a variable to build an element, and add our responseText
    var file = '<span class="subnav-trigger">';
    file += client.responseText;
    file += '</span>';

    //__-- Add our variable to our dom element
    $('.main-navigation ul > li.menu-item-has-children:first > .wrap > .content').append(file);
    //$('.main-navigation ul li ul > li.menu-item-has-children:first > .wrap > .content').append(file);

    //__-- Since we're technically creating our 'subnav-trigger' element after the DOM has loaded
    //__-- we have to call our function AFTER the element is loaded into the DOM, so we add it here.
    $smclk = 0;
    $('.subnav-trigger').click(function(){
      $smclk++;
      if($smclk == 1){
        $(this).parent().parent().parent().find('.sub-menu:first').slideDown('fast');
        $(this).css({
            '-moz-transform':'rotate(-90deg)',
            '-webkit-transform':'rotate(-90deg)',
            '-o-transform':'rotate(-90deg)',
            '-ms-transform':'rotate(-90deg)',
            'transform':'rotate(-90deg)'
          })
        console.log($smclk);
      }else{
        $(this).parent().parent().parent().find('.sub-menu:first').slideUp('fast');
        $(this).css({
            '-moz-transform':'rotate(0deg)',
            '-webkit-transform':'rotate(0deg)',
            '-o-transform':'rotate(0deg)',
            '-ms-transform':'rotate(0deg)',
            'transform':'rotate(0deg)'
          });
        $smclk=0;
      }
    
    });
  } 
};

//Send our information to the browser
client.send();


//$('.main-navigation ul > li.menu-item-has-children:first > .wrap > .content').append(arrow);
//$('.main-navigation ul li ul > li.menu-item-has-children:first > .wrap > .content').append(arrow);

$('.mobile-menu-trigger').click(function(){
      $mclk++;
      console.log($mclk);
      if($mclk == 1){
        $('.main-navigation').slideDown('fast');
      }else{
        $('.main-navigation').slideUp('fast');
        $('.main-navigation').find('.sub-menu').slideUp('fast');
        $('.subnav-trigger').css({
          '-moz-transform':'rotate(0deg)',
          '-webkit-transform':'rotate(0deg)',
          '-o-transform':'rotate(0deg)',
          '-ms-transform':'rotate(0deg)',
          'transform':'rotate(0deg)'
        });
        $smclk=0;
        $mclk=0;
      }
    });



});
