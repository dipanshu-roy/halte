function isChrome61OrMore(){
    var ua = navigator.userAgent, tem, M = ua.match(/(chrome(?=\/))\/?\s*(\d+)/i) || []; 
    if(M[1] === 'Chrome' && ua.match(/\bOPR|Edge\/(\d+)/) != null) return false; // Opera
    M = M[2]? [M[1], M[2]]: [navigator.appName, navigator.appVersion, '-?'];
    if((tem = ua.match(/version\/(\d+)/i))!= null) M.splice(1,1,tem[1]);
    return (M[0] == "Chrome" && M[1] >= 61) ? true : false;
 }

;(function($){'use strict'
$.srSmoothscroll=function(options){var self=$.extend({step:55,speed:400,ease:'swing',target:$('body'),container:$(window)},options||{})
var container=self.container,top=0,step=self.step,viewport=container.height(),wheel=false
// var target=(self.target.selector=='body')?((navigator.userAgent.indexOf('AppleWebKit')!==-1)?self.target:$('html')):container
var target = (self.target.selector == 'body')
      ? ((navigator.userAgent.indexOf('AppleWebKit') !== -1 && !isChrome61OrMore()) ? self.target : $('html'))
      : container;
self.target.mousewheel(function(event,delta){wheel=true
if(delta<0)top=(top+viewport)>=self.target.outerHeight(true)?top:top+=step
else
top=top<=0?0:top-=step
target.stop().animate({scrollTop:top},self.speed,self.ease,function(){wheel=false})
return false})
container.on('resize',function(e){viewport=container.height()}).on('scroll',function(e){if(!wheel)top=container.scrollTop()})}})(jQuery);


// var target = (self.target.selector == 'body')
//       ? ((navigator.userAgent.indexOf('AppleWebKit') !== -1 && !isChrome61OrMore()) ? self.target : $('html'))
//       : container;