/**
 * Plugins and 3rd Party Libraries
 */

/**
 * Author Christopher Blum
 * Based on the idea of Remy Sharp, http://remysharp.com/2009/01/26/element-in-view-event-plugin/
 * 
 * License: WTFPL
 */
(function(b){function t(){var e,a={height:k.innerHeight,width:k.innerWidth};a.height||!(e=l.compatMode)&&b.support.boxModel||(e="CSS1Compat"===e?f:l.body,a={height:e.clientHeight,width:e.clientWidth});return a}function u(){var e=b(),g,q=0;b.each(m,function(a,b){var c=b.data.selector,d=b.$element;e=e.add(c?d.find(c):d)});if(g=e.length)for(d=d||t(),a=a||{top:k.pageYOffset||f.scrollTop||l.body.scrollTop,left:k.pageXOffset||f.scrollLeft||l.body.scrollLeft};q<g;q++)if(b.contains(f,e[q])){var h=b(e[q]),n=h.height(),p=h.width(),c=h.offset(),r=h.data("inview");if(!a||!d)break;c.top+n>a.top&&c.top<a.top+d.height&&c.left+p>a.left&&c.left<a.left+d.width?(p=a.left>c.left?"right":a.left+d.width<c.left+p?"left":"both",n=a.top>c.top?"bottom":a.top+d.height<c.top+n?"top":"both",c=p+"-"+n,r&&r===c||h.data("inview",c).trigger("inview",[!0,p,n])):r&&h.data("inview",!1).trigger("inview",[!1])}}var m={},d,a,l=document,k=window,f=l.documentElement,s=b.expando,g;b.event.special.inview={add:function(a){m[a.guid+"-"+this[s]]={data:a,$element:b(this)};g||b.isEmptyObject(m)||(g=setInterval(u,250))},remove:function(a){try{delete m[a.guid+"-"+this[s]]}catch(d){}b.isEmptyObject(m)&&(clearInterval(g),g=null)}};b(k).bind("scroll resize",function(){d=a=null});!f.addEventListener&&f.attachEvent&&f.attachEvent("onfocusin",function(){a=null})})(jQuery);
