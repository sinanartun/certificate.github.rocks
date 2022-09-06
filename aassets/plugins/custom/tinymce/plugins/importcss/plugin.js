!function(){"use strict";var t,e,n,r,o=tinymce.util.Tools.resolve("tinymce.PluginManager"),i=tinymce.util.Tools.resolve("tinymce.dom.DOMUtils"),u=tinymce.util.Tools.resolve("tinymce.EditorManager"),c=tinymce.util.Tools.resolve("tinymce.Env"),s=tinymce.util.Tools.resolve("tinymce.util.Tools"),a=function(t){return t.getParam("importcss_merge_classes")},l=function(t){return t.getParam("importcss_exclusive")},f=function(t){return t.getParam("importcss_selector_converter")},m=function(t){return t.getParam("importcss_selector_filter")},p=function(t){return t.getParam("importcss_groups")},g=function(t){return t.getParam("importcss_append")},y=function(t){return t.getParam("importcss_file_filter")},v=function(){},d=function(t){return function(){return t}},h=d(!1),_=d(!0),T=function(){return x},x=(t=function(t){return t.isNone()},r={fold:function(t,e){return t()},is:h,isSome:h,isNone:_,getOr:n=function(t){return t},getOrThunk:e=function(t){return t()},getOrDie:function(t){throw new Error(t||"error: getOrDie called on none.")},getOrNull:d(null),getOrUndefined:d(void 0),or:n,orThunk:e,map:T,each:v,bind:T,exists:h,forall:_,filter:T,equals:t,equals_:t,toArray:function(){return[]},toString:d("none()")},Object.freeze&&Object.freeze(r),r),O=function(t){return function(e){return function(t){if(null===t)return"null";var e=typeof t;return"object"===e&&(Array.prototype.isPrototypeOf(t)||t.constructor&&"Array"===t.constructor.name)?"array":"object"===e&&(String.prototype.isPrototypeOf(t)||t.constructor&&"String"===t.constructor.name)?"string":e}(e)===t}},S=O("array"),b=O("function"),k=Array.prototype.slice,A=Array.prototype.push,P=function(t,e){return function(t){for(var e=[],n=0,r=t.length;n<r;++n){if(!S(t[n]))throw new Error("Arr.flatten item "+n+" was not an array, input: "+t);A.apply(e,t[n])}return e}(function(t,e){for(var n=t.length,r=new Array(n),o=0;o<n;o++){var i=t[o];r[o]=e(i,o)}return r}(t,e))},w=(b(Array.from)&&Array.from,function(t){var e=c.cacheSuffix;return"string"==typeof t&&(t=t.replace("?"+e,"").replace("&"+e,"")),t}),E=function(t,e){var n=t.settings,r=!1!==n.skin&&(n.skin||"oxide");if(r){var o=n.skin_url?t.documentBaseURI.toAbsolute(n.skin_url):u.baseURL+"/skins/ui/"+r,i=u.baseURL+"/skins/content/";return e===o+"/content"+(t.inline?".inline":"")+".min.css"||-1!==e.indexOf(i)}return!1},I=function(t){return"string"==typeof t?function(e){return-1!==e.indexOf(t)}:t instanceof RegExp?function(e){return t.test(e)}:t},M=function(t,e,n){var r=[],o={};s.each(t.contentCSS,function(t){o[t]=!0}),n||(n=function(t,e){return e||o[t]});try{s.each(e.styleSheets,function(e){!function e(o,i){var u,c=o.href;if((c=w(c))&&n(c,i)&&!E(t,c)){s.each(o.imports,function(t){e(t,!0)});try{u=o.cssRules||o.rules}catch(t){}s.each(u,function(t){t.styleSheet?e(t.styleSheet,!0):t.selectorText&&s.each(t.selectorText.split(","),function(t){r.push(s.trim(t))})})}}(e)})}catch(t){}return r},j=function(t,e){var n,r=/^(?:([a-z0-9\-_]+))?(\.[a-z0-9_\-\.]+)$/i.exec(e);if(r){var o=r[1],i=r[2].substr(1).split(".").join(" "),u=s.makeMap("a,img");return r[1]?(n={title:e},t.schema.getTextBlockElements()[o]?n.block=o:t.schema.getBlockElements()[o]||u[o.toLowerCase()]?n.selector=o:n.inline=o):r[2]&&(n={inline:"span",title:e.substr(1),classes:i}),!1!==a(t)?n.classes=i:n.attributes={class:i},n}},D=function(t,e){return null===e||!1!==l(t)},F={defaultConvertSelectorToFormat:j,setup:function(t){t.on("init",function(e){var n=function(){var t=[],e=[],n={};return{addItemToGroup:function(t,r){n[t]?n[t].push(r):(e.push(t),n[t]=[r])},addItem:function(e){t.push(e)},toFormats:function(){return P(e,function(t){var e=n[t];return 0===e.length?[]:[{title:t,items:e}]}).concat(t)}}}(),r={},o=I(m(t)),u=function(t){return s.map(t,function(t){return s.extend({},t,{original:t,selectors:{},filter:I(t.filter),item:{text:t.title,menu:[]}})})}(p(t)),c=function(e,n){if(function(t,e,n,r){return!(D(t,n)?e in r:e in n.selectors)}(t,e,n,r)){!function(t,e,n,r){D(t,n)?r[e]=!0:n.selectors[e]=!0}(t,e,n,r);var o=function(t,e,n,r){return(r&&r.selector_converter?r.selector_converter:f(t)?f(t):function(){return j(t,n)}).call(e,n,r)}(t,t.plugins.importcss,e,n);if(o){var u=o.name||i.DOM.uniqueId();return t.formatter.register(u,o),s.extend({},{title:o.title,format:u})}}return null};s.each(M(t,t.getDoc(),I(y(t))),function(t){if(-1===t.indexOf(".mce-")&&(!o||o(t))){var e=function(t,e){return s.grep(t,function(t){return!t.filter||t.filter(e)})}(u,t);if(e.length>0)s.each(e,function(e){var r=c(t,e);r&&n.addItemToGroup(e.title,r)});else{var r=c(t,null);r&&n.addItem(r)}}});var a=n.toFormats();t.fire("addStyleModifications",{items:a,replace:!g(t)})})}},R={get:function(t){return{convertSelectorToFormat:function(e){return F.defaultConvertSelectorToFormat(t,e)}}}};o.add("importcss",function(t){return F.setup(t),R.get(t)})}();
//# sourceMappingURL=plugin.js.map