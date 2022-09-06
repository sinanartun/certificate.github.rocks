!function(t){"use strict";var n,e,r,o,i,u,a=tinymce.util.Tools.resolve("tinymce.PluginManager"),c=function(){},l=function(t){return function(){return t}},s=l(!1),f=l(!0),m=function(){return g},g=(n=function(t){return t.isNone()},o={fold:function(t,n){return t()},is:s,isSome:s,isNone:f,getOr:r=function(t){return t},getOrThunk:e=function(t){return t()},getOrDie:function(t){throw new Error(t||"error: getOrDie called on none.")},getOrNull:l(null),getOrUndefined:l(void 0),or:r,orThunk:e,map:m,each:c,bind:m,exists:s,forall:f,filter:m,equals:n,equals_:n,toArray:function(){return[]},toString:l("none()")},Object.freeze&&Object.freeze(o),o),d=function(t){var n=l(t),e=function(){return o},r=function(n){return n(t)},o={fold:function(n,e){return e(t)},is:function(n){return t===n},isSome:f,isNone:s,getOr:n,getOrThunk:n,getOrDie:n,getOrNull:n,getOrUndefined:n,or:e,orThunk:e,map:function(n){return d(n(t))},each:function(n){n(t)},bind:r,exists:r,forall:r,filter:function(n){return n(t)?o:g},toArray:function(){return[t]},toString:function(){return"some("+t+")"},equals:function(n){return n.is(t)},equals_:function(n,e){return n.fold(s,function(n){return e(t,n)})}};return o},y={some:d,none:m,from:function(t){return null==t?g:d(t)}},p=(i="function",function(t){return function(t){if(null===t)return"null";var n=typeof t;return"object"===n&&(Array.prototype.isPrototypeOf(t)||t.constructor&&"Array"===t.constructor.name)?"array":"object"===n&&(String.prototype.isPrototypeOf(t)||t.constructor&&"String"===t.constructor.name)?"string":n}(t)===i}),v=Array.prototype.slice,h=function(t,n){for(var e=t.length,r=new Array(e),o=0;o<e;o++){var i=t[o];r[o]=n(i,o)}return r},b=(p(Array.from)&&Array.from,function(t,n){return-1!==t.indexOf(n)}),w=function(t,n){return b(t.title.toLowerCase(),n)||function(t,n){for(var e=0,r=t.length;e<r;e++)if(n(t[e],e))return!0;return!1}(t.keywords,function(t){return b(t.toLowerCase(),n)})},O=function(t,n,e){for(var r=[],o=n.toLowerCase(),i=e.fold(function(){return s},function(t){return function(n){return n>=t}}),u=0;u<t.length&&(0!==n.length&&!w(t[u],o)||(r.push({value:t[u].char,text:t[u].title,icon:t[u].char}),!i(r.length)));u++);return r},A=function(t,n){t.ui.registry.addAutocompleter("emoticons",{ch:":",columns:"auto",minChars:2,fetch:function(t,e){return n.waitForLoad().then(function(){var r=n.listAll();return O(r,t,y.some(e))})},onAction:function(n,e,r){t.selection.setRng(e),t.insertContent(r),n.hide()}})},j=function(t){var n=t,e=function(){return n};return{get:e,set:function(t){n=t},clone:function(){return j(e())}}},C=Object.prototype.hasOwnProperty,k=(u=function(t,n){return n},function(){for(var t=new Array(arguments.length),n=0;n<t.length;n++)t[n]=arguments[n];if(0===t.length)throw new Error("Can't merge zero objects");for(var e={},r=0;r<t.length;r++){var o=t[r];for(var i in o)C.call(o,i)&&(e[i]=u(e[i],o[i]))}return e}),D=Object.keys,T=Object.hasOwnProperty,_=function(t,n){for(var e=D(t),r=0,o=e.length;r<o;r++){var i=e[r];n(t[i],i)}},E=function(t,n){var e={};return _(t,function(t,r){var o=n(t,r);e[o.k]=o.v}),e},P=tinymce.util.Tools.resolve("tinymce.Resource"),S=tinymce.util.Tools.resolve("tinymce.util.Delay"),x=tinymce.util.Tools.resolve("tinymce.util.Promise"),L={getEmoticonDatabaseUrl:function(t,n){return t.getParam("emoticons_database_url",n+"/js/emojis"+t.suffix+".js")},getEmoticonDatabaseId:function(t){return t.getParam("emoticons_database_id","tinymce.plugins.emoticons","string")},getAppendedEmoticons:function(t){return t.getParam("emoticons_append",{},"object")}},N="All",F={symbols:"Symbols",people:"People",animals_and_nature:"Animals and Nature",food_and_drink:"Food and Drink",activity:"Activity",travel_and_places:"Travel and Places",objects:"Objects",flags:"Flags",user:"User Defined"},I=function(t,n){return e=t,r=n,T.call(e,r)?t[n]:n;var e,r},U=function(t){var n,e=L.getAppendedEmoticons(t);return n=function(t){return k({keywords:[],category:"user"},t)},E(e,function(t,e){return{k:e,v:n(t,e)}})},q=function(n,e,r){var o=j(y.none()),i=j(y.none());n.on("init",function(){P.load(r,e).then(function(t){var e=U(n);!function(t){var n={},e=[];_(t,function(t,r){var o={title:r,keywords:t.keywords,char:t.char,category:I(F,t.category)},i=void 0!==n[o.category]?n[o.category]:[];n[o.category]=i.concat([o]),e.push(o)}),o.set(y.some(n)),i.set(y.some(e))}(k(t,e))},function(n){t.console.log("Failed to load emoticons: "+n),o.set(y.some({})),i.set(y.some([]))})});var u=function(){return i.get().getOr([])},a=function(){return o.get().isSome()&&i.get().isSome()};return{listCategories:function(){return[N].concat(D(o.get().getOr({})))},hasLoaded:a,waitForLoad:function(){return a()?x.resolve(!0):new x(function(n,r){var o=15,i=S.setInterval(function(){a()?(S.clearInterval(i),n(!0)):--o<0&&(t.console.log("Could not load emojis from url: "+e),S.clearInterval(i),r(!1))},100)})},listAll:u,listCategory:function(t){return t===N?u():o.get().bind(function(n){return y.from(n[t])}).getOr([])}}},z=function(n,e){var r,o,i,u={pattern:"",results:O(e.listAll(),"",y.some(300))},a=j(N),c=(r=function(t){!function(t){var n=t.getData(),r=a.get(),o=e.listCategory(r),i=O(o,n.pattern,r===N?y.some(300):y.none());t.setData({results:i})}(t)},o=200,i=null,{cancel:function(){null!==i&&(t.clearTimeout(i),i=null)},throttle:function(){for(var n=[],e=0;e<arguments.length;e++)n[e]=arguments[e];null!==i&&t.clearTimeout(i),i=t.setTimeout(function(){r.apply(null,n),i=null},o)}}),l={label:"Search",type:"input",name:"pattern"},s={type:"collection",name:"results"},f=function(){return{title:"Emoticons",size:"normal",body:{type:"tabpanel",tabs:h(e.listCategories(),function(t){return{title:t,name:t,items:[l,s]}})},initialData:u,onTabChange:function(t,n){a.set(n.newTabName),c.throttle(t)},onChange:c.throttle,onAction:function(t,e){"results"===e.name&&(function(t,n){t.insertContent(n)}(n,e.value),t.close())},buttons:[{type:"cancel",text:"Close",primary:!0}]}},m=n.windowManager.open(f());m.focus("pattern"),e.hasLoaded()||(m.block("Loading emoticons..."),e.waitForLoad().then(function(){m.redial(f()),c.throttle(m),m.focus("pattern"),m.unblock()}).catch(function(t){m.redial({title:"Emoticons",body:{type:"panel",items:[{type:"alertbanner",level:"error",icon:"warning",text:"<p>Could not load emoticons</p>"}]},buttons:[{type:"cancel",text:"Close",primary:!0}],initialData:{pattern:"",results:[]}}),m.focus("pattern"),m.unblock()}))},M={register:function(t,n){var e=function(){return z(t,n)};t.ui.registry.addButton("emoticons",{tooltip:"Emoticons",icon:"emoji",onAction:e}),t.ui.registry.addMenuItem("emoticons",{text:"Emoticons...",icon:"emoji",onAction:e})}};a.add("emoticons",function(t,n){var e=L.getEmoticonDatabaseUrl(t,n),r=L.getEmoticonDatabaseId(t),o=q(t,e,r);M.register(t,o),A(t,o)})}(window);
//# sourceMappingURL=plugin.js.map
