!function(){"use strict";var e=tinymce.util.Tools.resolve("tinymce.PluginManager"),t=tinymce.util.Tools.resolve("tinymce.util.Tools"),n=function(e){return e.getParam("content_style","")},i=function(e){return e.getParam("content_css_cors",!1,"boolean")},o=tinymce.util.Tools.resolve("tinymce.Env"),r=function(e){var r="",a=e.dom.encode,c=n(e);r+='<base href="'+a(e.documentBaseURI.getURI())+'">',c&&(r+='<style type="text/css">'+c+"</style>");var s=i(e)?' crossorigin="anonymous"':"";t.each(e.contentCSS,function(t){r+='<link type="text/css" rel="stylesheet" href="'+a(e.documentBaseURI.toAbsolute(t))+'"'+s+">"});var d=e.settings.body_id||"tinymce";-1!==d.indexOf("=")&&(d=(d=e.getParam("body_id","","hash"))[e.id]||d);var l=e.settings.body_class||"";-1!==l.indexOf("=")&&(l=(l=e.getParam("body_class","","hash"))[e.id]||"");var m='<script>document.addEventListener && document.addEventListener("click", function(e) {for (var elm = e.target; elm; elm = elm.parentNode) {if (elm.nodeName === "A" && !('+(o.mac?"e.metaKey":"e.ctrlKey && !e.altKey")+")) {e.preventDefault();}}}, false);<\/script> ",u=e.getBody().dir,y=u?' dir="'+a(u)+'"':"";return"<!DOCTYPE html><html><head>"+r+'</head><body id="'+a(d)+'" class="mce-content-body '+a(l)+'"'+y+">"+e.getContent()+m+"</body></html>"},a={register:function(e){e.addCommand("mcePreview",function(){!function(e){var t=r(e);e.windowManager.open({title:"Preview",size:"large",body:{type:"panel",items:[{name:"preview",type:"iframe",sandboxed:!0}]},buttons:[{type:"cancel",name:"close",text:"Close",primary:!0}],initialData:{preview:t}}).focus("close")}(e)})}},c={register:function(e){e.ui.registry.addButton("preview",{icon:"preview",tooltip:"Preview",onAction:function(){return e.execCommand("mcePreview")}}),e.ui.registry.addMenuItem("preview",{icon:"preview",text:"Preview",onAction:function(){return e.execCommand("mcePreview")}})}};e.add("preview",function(e){a.register(e),c.register(e)})}();
//# sourceMappingURL=plugin.js.map
