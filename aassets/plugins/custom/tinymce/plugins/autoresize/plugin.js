!function(){"use strict";var e=function(t){var n=t,i=function(){return n};return{get:i,set:function(e){n=e},clone:function(){return e(i())}}},t=tinymce.util.Tools.resolve("tinymce.PluginManager"),n=tinymce.util.Tools.resolve("tinymce.Env"),i=tinymce.util.Tools.resolve("tinymce.util.Delay"),o=function(e){return e.fire("ResizeEditor")},r=function(e){return e.getParam("min_height",e.getElement().offsetHeight,"number")},u=function(e){return e.getParam("max_height",0,"number")},s=function(e){return e.getParam("autoresize_overflow_padding",1,"number")},a=function(e){return e.getParam("autoresize_bottom_margin",50,"number")},f=function(e){return e.getParam("autoresize_on_init",!0,"boolean")},c=function(e,t,n,o,r){i.setEditorTimeout(e,function(){m(e,t),n--?c(e,t,n,o,r):r&&r()},o)},g=function(e,t){var n=e.getBody();n&&(n.style.overflowY=t?"":"hidden",t||(n.scrollTop=0))},l=function(e,t,n,i){var o=parseInt(e.getStyle(t,n,i),10);return isNaN(o)?0:o},m=function(e,t){var i,s,f,c=e.dom,d=e.getDoc();if(d)if(function(e){return e.plugins.fullscreen&&e.plugins.fullscreen.isFullscreen()}(e))g(e,!0);else{var h=d.documentElement,v=a(e);s=r(e);var p=l(c,h,"margin-top",!0),y=l(c,h,"margin-bottom",!0);(f=h.offsetHeight+p+y+v)<0&&(f=0);var z=e.getContainer().offsetHeight-e.getContentAreaContainer().offsetHeight;f+z>r(e)&&(s=f+z);var b=u(e);if(b&&s>b?(s=b,g(e,!0)):g(e,!1),s!==t.get()){if(i=s-t.get(),c.setStyle(e.getContainer(),"height",s+"px"),t.set(s),o(e),n.browser.isSafari()&&n.mac){var C=e.getWin();C.scrollTo(C.pageXOffset,C.pageYOffset)}e.hasFocus()&&e.selection.scrollIntoView(e.selection.getNode()),n.webkit&&i<0&&m(e,t)}}},d={setup:function(e,t){e.on("init",function(){var t=s(e);e.dom.setStyles(e.getBody(),{paddingLeft:t,paddingRight:t,"min-height":0})}),e.on("NodeChange SetContent keyup FullscreenStateChanged ResizeContent",function(){m(e,t)}),f(e)&&e.on("init",function(){c(e,t,20,100,function(){c(e,t,5,1e3)})})},resize:m},h={register:function(e,t){e.addCommand("mceAutoResize",function(){d.resize(e,t)})}};t.add("autoresize",function(t){if(t.settings.hasOwnProperty("resize")||(t.settings.resize=!1),!t.inline){var n=e(0);h.register(t,n),d.setup(t,n)}})}();
//# sourceMappingURL=plugin.js.map