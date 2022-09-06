!function(){"use strict";var e=tinymce.util.Tools.resolve("tinymce.PluginManager"),t=function(){},n=function(e){return function(){return e}};var r,o,a,u,c,i=n(!1),l=n(!0),s=tinymce.util.Tools.resolve("tinymce.util.Tools"),f=tinymce.util.Tools.resolve("tinymce.util.XHR"),p=function(e){return e.getParam("template_cdate_classes","cdate")},m=function(e){return e.getParam("template_mdate_classes","mdate")},d=function(e){return e.getParam("template_selected_content_classes","selcontent")},g=function(e){return e.getParam("template_preview_replace_values")},y=function(e){return e.getParam("template_replace_values")},v=function(e){return e.templates},h=function(e){return e.getParam("template_cdate_format",e.translate("%Y-%m-%d"))},b=function(e){return e.getParam("template_mdate_format",e.translate("%Y-%m-%d"))},O=function(e,t){if((e=""+e).length<t)for(var n=0;n<t-e.length;n++)e="0"+e;return e},T=function(e,t,n){var r="Sun Mon Tue Wed Thu Fri Sat Sun".split(" "),o="Sunday Monday Tuesday Wednesday Thursday Friday Saturday Sunday".split(" "),a="Jan Feb Mar Apr May Jun Jul Aug Sep Oct Nov Dec".split(" "),u="January February March April May June July August September October November December".split(" ");return n=n||new Date,t=(t=(t=(t=(t=(t=(t=(t=(t=(t=(t=(t=(t=(t=(t=(t=t.replace("%D","%m/%d/%Y")).replace("%r","%I:%M:%S %p")).replace("%Y",""+n.getFullYear())).replace("%y",""+n.getYear())).replace("%m",O(n.getMonth()+1,2))).replace("%d",O(n.getDate(),2))).replace("%H",""+O(n.getHours(),2))).replace("%M",""+O(n.getMinutes(),2))).replace("%S",""+O(n.getSeconds(),2))).replace("%I",""+((n.getHours()+11)%12+1))).replace("%p",n.getHours()<12?"AM":"PM")).replace("%B",""+e.translate(u[n.getMonth()]))).replace("%b",""+e.translate(a[n.getMonth()]))).replace("%A",""+e.translate(o[n.getDay()]))).replace("%a",""+e.translate(r[n.getDay()]))).replace("%%","%")},M=function(e,t){return s.each(t,function(t,n){"function"==typeof t&&(t=t(n)),e=e.replace(new RegExp("\\{\\$"+n+"\\}","g"),t)}),e},S=function(e,t){var n=e.dom,r=y(e);s.each(n.select("*",t),function(e){s.each(r,function(t,o){n.hasClass(e,o)&&"function"==typeof r[o]&&r[o](e)})})},_=function(e,t){return new RegExp("\\b"+t+"\\b","g").test(e.className)},x=function(e,t){return function(){var n=v(e);"function"!=typeof n?"string"==typeof n?f.send({url:n,success:function(e){t(JSON.parse(e))}}):t(n):n(t)}},P=M,A=S,w=function(e,t,n){var r,o,a=e.dom,u=e.selection.getContent();n=M(n,y(e)),r=a.create("div",null,n),(o=a.select(".mceTmpl",r))&&o.length>0&&(r=a.create("div",null)).appendChild(o[0].cloneNode(!0)),s.each(a.select("*",r),function(t){_(t,p(e).replace(/\s+/g,"|"))&&(t.innerHTML=T(e,h(e))),_(t,m(e).replace(/\s+/g,"|"))&&(t.innerHTML=T(e,b(e))),_(t,d(e).replace(/\s+/g,"|"))&&(t.innerHTML=u)}),S(e,r),e.execCommand("mceInsertContent",!1,r.innerHTML),e.addVisual()},D={register:function(e){e.addCommand("mceInsertTemplate",function(e){for(var t=[],n=1;n<arguments.length;n++)t[n-1]=arguments[n];return function(){for(var n=[],r=0;r<arguments.length;r++)n[r]=arguments[r];var o=t.concat(n);return e.apply(null,o)}}(w,e))}},C={setup:function(e){e.on("PreProcess",function(t){var n=e.dom,r=b(e);s.each(n.select("div",t.node),function(t){n.hasClass(t,"mceTmpl")&&(s.each(n.select("*",t),function(t){n.hasClass(t,e.getParam("template_mdate_classes","mdate").replace(/\s+/g,"|"))&&(t.innerHTML=T(e,r))}),A(e,t))})})}},N=function(){return H},H=(r=function(e){return e.isNone()},u={fold:function(e,t){return e()},is:i,isSome:i,isNone:l,getOr:a=function(e){return e},getOrThunk:o=function(e){return e()},getOrDie:function(e){throw new Error(e||"error: getOrDie called on none.")},getOrNull:n(null),getOrUndefined:n(void 0),or:a,orThunk:o,map:N,each:t,bind:N,exists:i,forall:l,filter:N,equals:r,equals_:r,toArray:function(){return[]},toString:n("none()")},Object.freeze&&Object.freeze(u),u),k=function(e){var t=n(e),r=function(){return a},o=function(t){return t(e)},a={fold:function(t,n){return n(e)},is:function(t){return e===t},isSome:l,isNone:i,getOr:t,getOrThunk:t,getOrDie:t,getOrNull:t,getOrUndefined:t,or:r,orThunk:r,map:function(t){return k(t(e))},each:function(t){t(e)},bind:o,exists:o,forall:o,filter:function(t){return t(e)?a:H},toArray:function(){return[e]},toString:function(){return"some("+e+")"},equals:function(t){return t.is(e)},equals_:function(t,n){return t.fold(i,function(t){return n(e,t)})}};return a},I={some:k,none:N,from:function(e){return null==e?H:k(e)}},J=(c="function",function(e){return function(e){if(null===e)return"null";var t=typeof e;return"object"===t&&(Array.prototype.isPrototypeOf(e)||e.constructor&&"Array"===e.constructor.name)?"array":"object"===t&&(String.prototype.isPrototypeOf(e)||e.constructor&&"String"===e.constructor.name)?"string":t}(e)===c}),L=Array.prototype.slice,Y=(J(Array.from)&&Array.from,tinymce.util.Tools.resolve("tinymce.util.Promise")),j=Object.hasOwnProperty,q=function(e,t){return j.call(e,t)},F={'"':"&quot;","<":"&lt;",">":"&gt;","&":"&amp;","'":"&#039;"},B=function(e){return e.replace(/["'<>&]/g,function(e){return(t=F,n=e,q(t,n)?I.from(t[n]):I.none()).getOr(e);var t,n})},E=function(e,t){var n=function(e){return function(e,t){for(var n=e.length,r=new Array(n),o=0;o<n;o++){var a=e[o];r[o]=t(a,o)}return r}(e,function(e){return{text:e.text,value:e.text}})},r=function(e,t){return function(e,t){for(var n=0,r=e.length;n<r;n++){var o=e[n];if(t(o,n))return I.some(o)}return I.none()}(e,function(e){return e.text===t})},o=function(e){return new Y(function(t,n){e.value.url.fold(function(){return t(e.value.content.getOr(""))},function(e){return f.send({url:e,success:function(e){t(e)},error:function(e){n(e)}})})})},a=function(e,t){return function(n,a){if("template"===a.name){var u=n.getData().template;r(e,u).each(function(e){n.block("Loading..."),o(e).then(function(r){t(n,e,r),n.unblock()})})}}},u=function(t){return function(n){var a=n.getData();r(t,a.template).each(function(t){o(t).then(function(t){w(e,!1,t),n.close()})})}};(function(){if(!t||0===t.length){var n=e.translate("No templates defined.");return e.notificationManager.open({text:n,type:"info"}),I.none()}return I.from(s.map(t,function(e,t){var n=function(e){return void 0!==e.url};return{selected:0===t,text:e.title,value:{url:n(e)?I.from(e.url):I.none(),content:n(e)?I.none():I.from(e.content),description:e.description}}}))})().each(function(t){var r=n(t),c=function(e,n){return{title:"Insert Template",size:"large",body:{type:"panel",items:e},initialData:n,buttons:[{type:"cancel",name:"cancel",text:"Cancel"},{type:"submit",name:"save",text:"Save",primary:!0}],onSubmit:u(t),onChange:a(t,i)}},i=function(t,n,o){var a=function(e,t){if(-1===t.indexOf("<html>")){var n="";s.each(e.contentCSS,function(t){n+='<link type="text/css" rel="stylesheet" href="'+e.documentBaseURI.toAbsolute(t)+'">'});var r=e.settings.body_class||"";-1!==r.indexOf("=")&&(r=(r=e.getParam("body_class","","hash"))[e.id]||"");var o=e.dom.encode,a=e.getBody().dir,u=a?' dir="'+o(a)+'"':"";t="<!DOCTYPE html><html><head>"+n+'</head><body class="'+o(r)+'"'+u+">"+t+"</body></html>"}return P(t,g(e))}(e,o),u=[{type:"selectbox",name:"template",label:"Templates",items:r},{type:"htmlpanel",html:'<p aria-live="polite">'+B(n.value.description)+"</p>"},{label:"Preview",type:"iframe",name:"preview",sandboxed:!1}],i={template:n.text,preview:a};t.unblock(),t.redial(c(u,i)),t.focus("template")},l=e.windowManager.open(c([],{template:"",preview:""}));l.block("Loading..."),o(t[0]).then(function(e){i(l,t[0],e)})})},R=function(e){return function(t){E(e,t)}},z={register:function(e){e.ui.registry.addButton("template",{icon:"template",tooltip:"Insert template",onAction:x(e.settings,R(e))}),e.ui.registry.addMenuItem("template",{icon:"template",text:"Insert template...",onAction:x(e.settings,R(e))})}};e.add("template",function(e){z.register(e),D.register(e),C.setup(e)})}();
//# sourceMappingURL=plugin.js.map
