!function(t){"use strict";var e,n,r,o,i,u=function(t){var e=t,n=function(){return e};return{get:n,set:function(t){e=t},clone:function(){return u(n())}}},a=tinymce.util.Tools.resolve("tinymce.PluginManager"),s={hasProPlugin:function(e){return!(!/(^|[ ,])powerpaste([, ]|$)/.test(e.settings.plugins)||!a.get("powerpaste")||(void 0!==t.window.console&&t.window.console.log&&t.window.console.log("PowerPaste is incompatible with Paste plugin! Remove 'paste' from the 'plugins' option."),0))}},c={get:function(t,e){return{clipboard:t,quirks:e}}},l=function(t,e,n,r){return t.fire("PastePreProcess",{content:e,internal:n,wordContent:r})},f=function(t,e,n,r){return t.fire("PastePostProcess",{node:e,internal:n,wordContent:r})},d=function(t,e){return t.fire("PastePlainTextToggle",{state:e})},m=function(t,e){return t.fire("paste",{ieFake:e})},p=function(t,e){"text"===e.pasteFormat.get()?(e.pasteFormat.set("html"),d(t,!1)):(e.pasteFormat.set("text"),d(t,!0)),t.focus()},g={register:function(t,e){t.addCommand("mceTogglePlainTextPaste",function(){p(t,e)}),t.addCommand("mceInsertClipboardContent",function(t,n){n.content&&e.pasteHtml(n.content,n.internal),n.text&&e.pasteText(n.text)})}},h=function(){},v=function(t){return function(){return t}},y=v(!1),b=v(!0),w=function(){return x},x=(e=function(t){return t.isNone()},o={fold:function(t,e){return t()},is:y,isSome:y,isNone:b,getOr:r=function(t){return t},getOrThunk:n=function(t){return t()},getOrDie:function(t){throw new Error(t||"error: getOrDie called on none.")},getOrNull:v(null),getOrUndefined:v(void 0),or:r,orThunk:n,map:w,each:h,bind:w,exists:y,forall:b,filter:w,equals:e,equals_:e,toArray:function(){return[]},toString:v("none()")},Object.freeze&&Object.freeze(o),o),_=function(t){var e=v(t),n=function(){return o},r=function(e){return e(t)},o={fold:function(e,n){return n(t)},is:function(e){return t===e},isSome:b,isNone:y,getOr:e,getOrThunk:e,getOrDie:e,getOrNull:e,getOrUndefined:e,or:n,orThunk:n,map:function(e){return _(e(t))},each:function(e){e(t)},bind:r,exists:r,forall:r,filter:function(e){return e(t)?o:x},toArray:function(){return[t]},toString:function(){return"some("+t+")"},equals:function(e){return e.is(t)},equals_:function(e,n){return e.fold(y,function(e){return n(t,e)})}};return o},P={some:_,none:w,from:function(t){return null==t?x:_(t)}},T=(i="function",function(t){return function(t){if(null===t)return"null";var e=typeof t;return"object"===e&&(Array.prototype.isPrototypeOf(t)||t.constructor&&"Array"===t.constructor.name)?"array":"object"===e&&(String.prototype.isPrototypeOf(t)||t.constructor&&"String"===t.constructor.name)?"string":e}(t)===i}),k=Array.prototype.slice,C=function(t,e){for(var n=t.length,r=new Array(n),o=0;o<n;o++){var i=t[o];r[o]=e(i,o)}return r},D=function(t,e){for(var n=0,r=t.length;n<r;n++){e(t[n],n)}},S=T(Array.from)?Array.from:function(t){return k.call(t)},E={},F={exports:E};!function(t,e,n,r){!function(r){if("object"==typeof e&&void 0!==n)n.exports=r();else if("function"==typeof t&&t.amd)t([],r);else{("undefined"!=typeof window?window:"undefined"!=typeof global?global:"undefined"!=typeof self?self:this).EphoxContactWrapper=r()}}(function(){return function(){return function t(e,n,o){function i(a,s){if(!n[a]){if(!e[a]){var c="function"==typeof r&&r;if(!s&&c)return c(a,!0);if(u)return u(a,!0);var l=new Error("Cannot find module '"+a+"'");throw l.code="MODULE_NOT_FOUND",l}var f=n[a]={exports:{}};e[a][0].call(f.exports,function(t){return i(e[a][1][t]||t)},f,f.exports,t,e,n,o)}return n[a].exports}for(var u="function"==typeof r&&r,a=0;a<o.length;a++)i(o[a]);return i}}()({1:[function(t,e,n){var r,o,i=e.exports={};function u(){throw new Error("setTimeout has not been defined")}function a(){throw new Error("clearTimeout has not been defined")}function s(t){if(r===setTimeout)return setTimeout(t,0);if((r===u||!r)&&setTimeout)return r=setTimeout,setTimeout(t,0);try{return r(t,0)}catch(e){try{return r.call(null,t,0)}catch(e){return r.call(this,t,0)}}}!function(){try{r="function"==typeof setTimeout?setTimeout:u}catch(t){r=u}try{o="function"==typeof clearTimeout?clearTimeout:a}catch(t){o=a}}();var c,l=[],f=!1,d=-1;function m(){f&&c&&(f=!1,c.length?l=c.concat(l):d=-1,l.length&&p())}function p(){if(!f){var t=s(m);f=!0;for(var e=l.length;e;){for(c=l,l=[];++d<e;)c&&c[d].run();d=-1,e=l.length}c=null,f=!1,function(t){if(o===clearTimeout)return clearTimeout(t);if((o===a||!o)&&clearTimeout)return o=clearTimeout,clearTimeout(t);try{o(t)}catch(e){try{return o.call(null,t)}catch(e){return o.call(this,t)}}}(t)}}function g(t,e){this.fun=t,this.array=e}function h(){}i.nextTick=function(t){var e=new Array(arguments.length-1);if(arguments.length>1)for(var n=1;n<arguments.length;n++)e[n-1]=arguments[n];l.push(new g(t,e)),1!==l.length||f||s(p)},g.prototype.run=function(){this.fun.apply(null,this.array)},i.title="browser",i.browser=!0,i.env={},i.argv=[],i.version="",i.versions={},i.on=h,i.addListener=h,i.once=h,i.off=h,i.removeListener=h,i.removeAllListeners=h,i.emit=h,i.prependListener=h,i.prependOnceListener=h,i.listeners=function(t){return[]},i.binding=function(t){throw new Error("process.binding is not supported")},i.cwd=function(){return"/"},i.chdir=function(t){throw new Error("process.chdir is not supported")},i.umask=function(){return 0}},{}],2:[function(t,e,n){(function(t){!function(n){var r=setTimeout;function o(){}function i(t){if("object"!=typeof this)throw new TypeError("Promises must be constructed via new");if("function"!=typeof t)throw new TypeError("not a function");this._state=0,this._handled=!1,this._value=void 0,this._deferreds=[],f(t,this)}function u(t,e){for(;3===t._state;)t=t._value;0!==t._state?(t._handled=!0,i._immediateFn(function(){var n=1===t._state?e.onFulfilled:e.onRejected;if(null!==n){var r;try{r=n(t._value)}catch(t){return void s(e.promise,t)}a(e.promise,r)}else(1===t._state?a:s)(e.promise,t._value)})):t._deferreds.push(e)}function a(t,e){try{if(e===t)throw new TypeError("A promise cannot be resolved with itself.");if(e&&("object"==typeof e||"function"==typeof e)){var n=e.then;if(e instanceof i)return t._state=3,t._value=e,void c(t);if("function"==typeof n)return void f((r=n,o=e,function(){r.apply(o,arguments)}),t)}t._state=1,t._value=e,c(t)}catch(e){s(t,e)}var r,o}function s(t,e){t._state=2,t._value=e,c(t)}function c(t){2===t._state&&0===t._deferreds.length&&i._immediateFn(function(){t._handled||i._unhandledRejectionFn(t._value)});for(var e=0,n=t._deferreds.length;e<n;e++)u(t,t._deferreds[e]);t._deferreds=null}function l(t,e,n){this.onFulfilled="function"==typeof t?t:null,this.onRejected="function"==typeof e?e:null,this.promise=n}function f(t,e){var n=!1;try{t(function(t){n||(n=!0,a(e,t))},function(t){n||(n=!0,s(e,t))})}catch(t){if(n)return;n=!0,s(e,t)}}i.prototype.catch=function(t){return this.then(null,t)},i.prototype.then=function(t,e){var n=new this.constructor(o);return u(this,new l(t,e,n)),n},i.all=function(t){var e=Array.prototype.slice.call(t);return new i(function(t,n){if(0===e.length)return t([]);var r=e.length;function o(i,u){try{if(u&&("object"==typeof u||"function"==typeof u)){var a=u.then;if("function"==typeof a)return void a.call(u,function(t){o(i,t)},n)}e[i]=u,0==--r&&t(e)}catch(t){n(t)}}for(var i=0;i<e.length;i++)o(i,e[i])})},i.resolve=function(t){return t&&"object"==typeof t&&t.constructor===i?t:new i(function(e){e(t)})},i.reject=function(t){return new i(function(e,n){n(t)})},i.race=function(t){return new i(function(e,n){for(var r=0,o=t.length;r<o;r++)t[r].then(e,n)})},i._immediateFn="function"==typeof t?function(e){t(e)}:function(t){r(t,0)},i._unhandledRejectionFn=function(t){"undefined"!=typeof console&&console&&console.warn("Possible Unhandled Promise Rejection:",t)},i._setImmediateFn=function(t){i._immediateFn=t},i._setUnhandledRejectionFn=function(t){i._unhandledRejectionFn=t},void 0!==e&&e.exports?e.exports=i:n.Promise||(n.Promise=i)}(this)}).call(this,t("timers").setImmediate)},{timers:3}],3:[function(t,e,n){(function(e,r){var o=t("process/browser.js").nextTick,i=Function.prototype.apply,u=Array.prototype.slice,a={},s=0;function c(t,e){this._id=t,this._clearFn=e}n.setTimeout=function(){return new c(i.call(setTimeout,window,arguments),clearTimeout)},n.setInterval=function(){return new c(i.call(setInterval,window,arguments),clearInterval)},n.clearTimeout=n.clearInterval=function(t){t.close()},c.prototype.unref=c.prototype.ref=function(){},c.prototype.close=function(){this._clearFn.call(window,this._id)},n.enroll=function(t,e){clearTimeout(t._idleTimeoutId),t._idleTimeout=e},n.unenroll=function(t){clearTimeout(t._idleTimeoutId),t._idleTimeout=-1},n._unrefActive=n.active=function(t){clearTimeout(t._idleTimeoutId);var e=t._idleTimeout;e>=0&&(t._idleTimeoutId=setTimeout(function(){t._onTimeout&&t._onTimeout()},e))},n.setImmediate="function"==typeof e?e:function(t){var e=s++,r=!(arguments.length<2)&&u.call(arguments,1);return a[e]=!0,o(function(){a[e]&&(r?t.apply(null,r):t.call(null),n.clearImmediate(e))}),e},n.clearImmediate="function"==typeof r?r:function(t){delete a[t]}}).call(this,t("timers").setImmediate,t("timers").clearImmediate)},{"process/browser.js":1,timers:3}],4:[function(t,e,n){var r=t("promise-polyfill"),o="undefined"!=typeof window?window:Function("return this;")();e.exports={boltExport:o.Promise||r}},{"promise-polyfill":2}]},{},[4])(4)})}(void 0,E,F,void 0);var I=F.exports.boltExport,O=function(e){var n=P.none(),r=[],o=function(t){i()?a(t):r.push(t)},i=function(){return n.isSome()},u=function(t){D(t,a)},a=function(e){n.each(function(n){t.setTimeout(function(){e(n)},0)})};return e(function(t){n=P.some(t),u(r),r=[]}),{get:o,map:function(t){return O(function(e){o(function(n){e(t(n))})})},isReady:i}},A={nu:O,pure:function(t){return O(function(e){e(t)})}},R=function(e){t.setTimeout(function(){throw e},0)},M=function(t){var e=function(e){t().then(e,R)};return{map:function(e){return M(function(){return t().then(e)})},bind:function(e){return M(function(){return t().then(function(t){return e(t).toPromise()})})},anonBind:function(e){return M(function(){return t().then(function(){return e.toPromise()})})},toLazy:function(){return A.nu(e)},toCached:function(){var e=null;return M(function(){return null===e&&(e=t()),e})},toPromise:t,get:e}},j=function(t){return M(function(){return new I(t)})},L=function(t,e){return e(function(e){var n=[],r=0;0===t.length?e([]):D(t,function(o,i){o.get(function(o){return function(i){n[o]=i,++r>=t.length&&e(n)}}(i))})})},B=function(t,e){return n=C(t,e),L(n,j);var n},H=tinymce.util.Tools.resolve("tinymce.Env"),N=tinymce.util.Tools.resolve("tinymce.util.Delay"),$=tinymce.util.Tools.resolve("tinymce.util.Tools"),W=tinymce.util.Tools.resolve("tinymce.util.VK"),U="\x3c!-- x-tinymce/html --\x3e",z={mark:function(t){return U+t},unmark:function(t){return t.replace(U,"")},isMarked:function(t){return-1!==t.indexOf(U)},internalHtmlMime:function(){return"x-tinymce/html"}},V=tinymce.util.Tools.resolve("tinymce.html.Entities"),q=function(t){return t.replace(/\r?\n/g,"<br>")},K=function(t,e,n){var r=t.split(/\n\n/),o=function(t,e){var n,r=[],o="<"+t;if("object"==typeof e){for(n in e)e.hasOwnProperty(n)&&r.push(n+'="'+V.encodeAllRaw(e[n])+'"');r.length&&(o+=" "+r.join(" "))}return o+">"}(e,n),i="</"+e+">",u=$.map(r,function(t){return t.split(/\n/).join("<br />")});return 1===u.length?u[0]:$.map(u,function(t){return o+t+i}).join("")},G={isPlainText:function(t){return!/<(?:\/?(?!(?:div|p|br|span)>)\w+|(?:(?!(?:span style="white-space:\s?pre;?">)|br\s?\/>))\w+\s[^>]+)>/i.test(t)},convert:function(t,e,n){return e?K(t,!0===e?"p":e,n):q(t)},toBRs:q,toBlockElements:K},X=tinymce.util.Tools.resolve("tinymce.html.DomParser"),Y=tinymce.util.Tools.resolve("tinymce.html.Node"),Z=tinymce.util.Tools.resolve("tinymce.html.Schema"),J=tinymce.util.Tools.resolve("tinymce.html.Serializer"),Q={shouldBlockDrop:function(t){return t.getParam("paste_block_drop",!1)},shouldPasteDataImages:function(t){return t.getParam("paste_data_images",!1)},shouldFilterDrop:function(t){return t.getParam("paste_filter_drop",!0)},getPreProcess:function(t){return t.getParam("paste_preprocess")},getPostProcess:function(t){return t.getParam("paste_postprocess")},getWebkitStyles:function(t){return t.getParam("paste_webkit_styles")},shouldRemoveWebKitStyles:function(t){return t.getParam("paste_remove_styles_if_webkit",!0)},shouldMergeFormats:function(t){return t.getParam("paste_merge_formats",!0)},isSmartPasteEnabled:function(t){return t.getParam("smart_paste",!0)},isPasteAsTextEnabled:function(t){return t.getParam("paste_as_text",!1)},getRetainStyleProps:function(t){return t.getParam("paste_retain_style_properties")},getWordValidElements:function(t){return t.getParam("paste_word_valid_elements","-strong/b,-em/i,-u,-span,-p,-ol,-ul,-li,-h1,-h2,-h3,-h4,-h5,-h6,-p/div,-a[href|name],sub,sup,strike,br,del,table[width],tr,td[colspan|rowspan|width],th[colspan|rowspan|width],thead,tfoot,tbody")},shouldConvertWordFakeLists:function(t){return t.getParam("paste_convert_word_fake_lists",!0)},shouldUseDefaultFilters:function(t){return t.getParam("paste_enable_default_filters",!0)}};function tt(t,e){return $.each(e,function(e){t=e.constructor===RegExp?t.replace(e,""):t.replace(e[0],e[1])}),t}var et={filter:tt,innerText:function(t){var e=Z(),n=X({},e),r="",o=e.getShortEndedElements(),i=$.makeMap("script noscript style textarea video audio iframe object"," "),u=e.getBlockElements();return t=tt(t,[/<!\[[^\]]+\]>/g]),function t(e){var n=e.name,a=e;if("br"!==n){if("wbr"!==n)if(o[n]&&(r+=" "),i[n])r+=" ";else{if(3===e.type&&(r+=e.value),!e.shortEnded&&(e=e.firstChild))do{t(e)}while(e=e.next);u[n]&&a.next&&(r+="\n","p"===n&&(r+="\n"))}}else r+="\n"}(n.parse(t)),r},trimHtml:function(t){return t=tt(t,[/^[\s\S]*<body[^>]*>\s*|\s*<\/body[^>]*>[\s\S]*$/gi,/<!--StartFragment-->|<!--EndFragment-->/g,[/( ?)<span class="Apple-converted-space">\u00a0<\/span>( ?)/g,function(t,e,n){return e||n?" ":" "}],/<br class="Apple-interchange-newline">/g,/<br>$/i])},createIdGenerator:function(t){var e=0;return function(){return t+e++}},isMsEdge:function(){return-1!==t.navigator.userAgent.indexOf(" Edge/")}};function nt(t){var e,n;return n=[/^[IVXLMCD]{1,2}\.[ \u00a0]/,/^[ivxlmcd]{1,2}\.[ \u00a0]/,/^[a-z]{1,2}[\.\)][ \u00a0]/,/^[A-Z]{1,2}[\.\)][ \u00a0]/,/^[0-9]+\.[ \u00a0]/,/^[\u3007\u4e00\u4e8c\u4e09\u56db\u4e94\u516d\u4e03\u516b\u4e5d]+\.[ \u00a0]/,/^[\u58f1\u5f10\u53c2\u56db\u4f0d\u516d\u4e03\u516b\u4e5d\u62fe]+\.[ \u00a0]/],t=t.replace(/^[\u00a0 ]+/,""),$.each(n,function(n){if(n.test(t))return e=!0,!1}),e}function rt(t){var e,n,r=1;function o(t){var e="";if(3===t.type)return t.value;if(t=t.firstChild)do{e+=o(t)}while(t=t.next);return e}function i(t,e){if(3===t.type&&e.test(t.value))return t.value=t.value.replace(e,""),!1;if(t=t.firstChild)do{if(!i(t,e))return!1}while(t=t.next);return!0}function u(t,o,u){var a=t._listLevel||r;a!==r&&(a<r?e&&(e=e.parent.parent):(n=e,e=null)),e&&e.name===o?e.append(t):(n=n||e,e=new Y(o,1),u>1&&e.attr("start",""+u),t.wrap(e)),t.name="li",a>r&&n&&n.lastChild.append(e),r=a,function t(e){if(e._listIgnore)e.remove();else if(e=e.firstChild)do{t(e)}while(e=e.next)}(t),i(t,/^\u00a0+/),i(t,/^\s*([\u2022\u00b7\u00a7\u25CF]|\w+\.)/),i(t,/^\u00a0+/)}for(var a=[],s=t.firstChild;null!=s;)if(a.push(s),null!==(s=s.walk()))for(;void 0!==s&&s.parent!==t;)s=s.walk();for(var c=0;c<a.length;c++)if("p"===(t=a[c]).name&&t.firstChild){var l=o(t);if(/^[\s\u00a0]*[\u2022\u00b7\u00a7\u25CF]\s*/.test(l)){u(t,"ul");continue}if(nt(l)){var f=/([0-9]+)\./.exec(l),d=1;f&&(d=parseInt(f[1],10)),u(t,"ol",d);continue}if(t._listLevel){u(t,"ul",1);continue}e=null}else n=e,e=null}function ot(t,e,n,r){var o,i={},u=t.dom.parseStyle(r);return $.each(u,function(u,a){switch(a){case"mso-list":(o=/\w+ \w+([0-9]+)/i.exec(r))&&(n._listLevel=parseInt(o[1],10)),/Ignore/i.test(u)&&n.firstChild&&(n._listIgnore=!0,n.firstChild._listIgnore=!0);break;case"horiz-align":a="text-align";break;case"vert-align":a="vertical-align";break;case"font-color":case"mso-foreground":a="color";break;case"mso-background":case"mso-highlight":a="background";break;case"font-weight":case"font-style":return void("normal"!==u&&(i[a]=u));case"mso-element":if(/^(comment|comment-list)$/i.test(u))return void n.remove()}0!==a.indexOf("mso-comment")?0!==a.indexOf("mso-")&&("all"===Q.getRetainStyleProps(t)||e&&e[a])&&(i[a]=u):n.remove()}),/(bold)/i.test(i["font-weight"])&&(delete i["font-weight"],n.wrap(new Y("b",1))),/(italic)/i.test(i["font-style"])&&(delete i["font-style"],n.wrap(new Y("i",1))),(i=t.dom.serializeStyle(i,n.name))||null}var it={preProcess:function(t,e){return Q.shouldUseDefaultFilters(t)?function(t,e){var n,r;(n=Q.getRetainStyleProps(t))&&(r=$.makeMap(n.split(/[, ]/))),e=et.filter(e,[/<br class="?Apple-interchange-newline"?>/gi,/<b[^>]+id="?docs-internal-[^>]*>/gi,/<!--[\s\S]+?-->/gi,/<(!|script[^>]*>.*?<\/script(?=[>\s])|\/?(\?xml(:\w+)?|img|meta|link|style|\w:\w+)(?=[\s\/>]))[^>]*>/gi,[/<(\/?)s>/gi,"<$1strike>"],[/&nbsp;/gi," "],[/<span\s+style\s*=\s*"\s*mso-spacerun\s*:\s*yes\s*;?\s*"\s*>([\s\u00a0]*)<\/span>/gi,function(t,e){return e.length>0?e.replace(/./," ").slice(Math.floor(e.length/2)).split("").join(" "):""}]]);var o=Q.getWordValidElements(t),i=Z({valid_elements:o,valid_children:"-li[p]"});$.each(i.elements,function(t){t.attributes.class||(t.attributes.class={},t.attributesOrder.push("class")),t.attributes.style||(t.attributes.style={},t.attributesOrder.push("style"))});var u=X({},i);u.addAttributeFilter("style",function(e){for(var n,o=e.length;o--;)(n=e[o]).attr("style",ot(t,r,n,n.attr("style"))),"span"===n.name&&n.parent&&!n.attributes.length&&n.unwrap()}),u.addAttributeFilter("class",function(t){for(var e,n,r=t.length;r--;)n=(e=t[r]).attr("class"),/^(MsoCommentReference|MsoCommentText|msoDel)$/i.test(n)&&e.remove(),e.attr("class",null)}),u.addNodeFilter("del",function(t){for(var e=t.length;e--;)t[e].remove()}),u.addNodeFilter("a",function(t){for(var e,n,r,o=t.length;o--;)if(n=(e=t[o]).attr("href"),r=e.attr("name"),n&&-1!==n.indexOf("#_msocom_"))e.remove();else if(n&&0===n.indexOf("file://")&&(n=n.split("#")[1])&&(n="#"+n),n||r){if(r&&!/^_?(?:toc|edn|ftn)/i.test(r)){e.unwrap();continue}e.attr({href:n,name:r})}else e.unwrap()});var a=u.parse(e);return Q.shouldConvertWordFakeLists(t)&&rt(a),e=J({validate:t.settings.validate},i).serialize(a)}(t,e):e},isWordContent:function(t){return/<font face="Times New Roman"|class="?Mso|style="[^"]*\bmso-|style='[^'']*\bmso-|w:WordDocument/i.test(t)||/class="OutlineElement/.test(t)||/id="?docs\-internal\-guid\-/.test(t)}},ut=function(t,e){return{content:t,cancelled:e}},at=function(t,e,n,r){var o=l(t,e,n,r);return t.hasEventListeners("PastePostProcess")&&!o.isDefaultPrevented()?function(t,e,n,r){var o=t.dom.create("div",{style:"display:none"},e),i=f(t,o,n,r);return ut(i.node.innerHTML,i.isDefaultPrevented())}(t,o.content,n,r):ut(o.content,o.isDefaultPrevented())},st=function(t,e,n){var r=it.isWordContent(e),o=r?it.preProcess(t,e):e;return at(t,o,n,r)},ct=function(t,e){return t.insertContent(function(t,e){var n=t.dom.create("body",{},e);return $.each(n.querySelectorAll("meta"),function(t){return t.parentNode.removeChild(t)}),n.innerHTML}(t,e),{merge:Q.shouldMergeFormats(t),paste:!0}),!0},lt=function(t){return/^https?:\/\/[\w\?\-\/+=.&%@~#]+$/i.test(t)},ft=function(t){return lt(t)&&/.(gif|jpe?g|png)$/.test(t)},dt=function(t,e,n){return!(!1!==t.selection.isCollapsed()||!lt(e))&&function(t,e,n){return t.undoManager.extra(function(){n(t,e)},function(){t.execCommand("mceInsertLink",!1,e)}),!0}(t,e,n)},mt=function(t,e,n){return!!ft(e)&&function(t,e,n){return t.undoManager.extra(function(){n(t,e)},function(){t.insertContent('<img src="'+e+'">')}),!0}(t,e,n)},pt=function(t,e){!1===Q.isSmartPasteEnabled(t)?ct(t,e):function(t,e){$.each([dt,mt,ct],function(n){return!0!==n(t,e,ct)})}(t,e)},gt=function(t){return"\n"===t||"\r"===t},ht=function(t){var e,n;return(e=function(e,n){return function(t){return-1!==" \f\t\v".indexOf(t)}(n)||" "===n?e.pcIsSpace||""===e.str||e.str.length===t.length-1||function(t,e){return e<t.length&&e>=0&&gt(t[e])}(t,e.str.length+1)?{pcIsSpace:!1,str:e.str+" "}:{pcIsSpace:!0,str:e.str+" "}:{pcIsSpace:gt(n),str:e.str+n}},n={pcIsSpace:!1,str:""},D(t,function(t){n=e(n,t)}),n).str},vt=function(t,e,n){var r=n||z.isMarked(e),o=st(t,z.unmark(e),r);!1===o.cancelled&&pt(t,o.content)},yt=function(t,e){var n=t.dom.encode(e).replace(/\r\n/g,"\n"),r=ht(n),o=G.convert(r,t.settings.forced_root_block,t.settings.forced_root_block_attrs);vt(t,o,!1)},bt=function(t){var e={};if(t){if(t.getData){var n=t.getData("Text");n&&n.length>0&&-1===n.indexOf("data:text/mce-internal,")&&(e["text/plain"]=n)}if(t.types)for(var r=0;r<t.types.length;r++){var o=t.types[r];try{e[o]=t.getData(o)}catch(t){e[o]=""}}}return e},wt=function(t,e){return e in t&&t[e].length>0},xt=function(t){return wt(t,"text/html")||wt(t,"text/plain")},_t=et.createIdGenerator("mceclip"),Pt=function(e,n,r){var o,i="paste"===n.type?n.clipboardData:n.dataTransfer;if(e.settings.paste_data_images&&i){var u=function(t){var e=t.items?C(S(t.items),function(t){return t.getAsFile()}):[],n=t.files?S(t.files):[];return function(t,e){for(var n=[],r=0,o=t.length;r<o;r++){var i=t[r];e(i,r)&&n.push(i)}return n}(e.length>0?e:n,function(t){return/^image\/(jpeg|png|gif|bmp)$/.test(t.type)})}(i);if(u.length>0)return n.preventDefault(),(o=u,B(o,function(t){return j(function(e){var n=t.getAsFile?t.getAsFile():t,r=new window.FileReader;r.onload=function(){e({blob:n,uri:r.result})},r.readAsDataURL(n)})})).get(function(n){r&&e.selection.setRng(r),D(n,function(n){!function(e,n){var r,o,i,u,a=(r=n.uri,-1!==(o=r.indexOf(","))?r.substr(o+1):null),s=_t(),c=e.settings.images_reuse_filename&&n.blob.name?function(t,e){var n=e.match(/([\s\S]+?)\.(?:jpeg|jpg|png|gif)$/i);return n?t.dom.encode(n[1]):null}(e,n.blob.name):s,l=new t.Image;if(l.src=n.uri,i=e.settings,u=l,!i.images_dataimg_filter||i.images_dataimg_filter(u)){var f,d=e.editorUpload.blobCache,m=void 0;(f=d.findFirst(function(t){return t.base64()===a}))?m=f:(m=d.create(s,n.blob,a,c),d.add(m)),vt(e,'<img src="'+m.blobUri()+'">',!1)}else vt(e,'<img src="'+n.uri+'">',!1)}(e,n)})}),!0}return!1},Tt=function(t){return W.metaKeyPressed(t)&&86===t.keyCode||t.shiftKey&&45===t.keyCode},kt=function(e,n,r){var o,i,a=(o=u(P.none()),{clear:function(){o.set(P.none())},set:function(t){o.set(P.some(t))},isSet:function(){return o.get().isSome()},on:function(t){o.get().each(t)}});function s(t,r,o,i){var u,a;wt(t,"text/html")?u=t["text/html"]:(u=n.getHtml(),i=i||z.isMarked(u),n.isDefaultContent(u)&&(o=!0)),u=et.trimHtml(u),n.remove(),a=!1===i&&G.isPlainText(u),u.length&&!a||(o=!0),o&&(u=wt(t,"text/plain")&&a?t["text/plain"]:et.innerText(u)),n.isDefaultContent(u)?r||e.windowManager.alert("Please use Ctrl+V/Cmd+V keyboard shortcuts to paste contents."):o?yt(e,u):vt(e,u,i)}e.on("keydown",function(r){function o(t){Tt(t)&&!t.isDefaultPrevented()&&n.remove()}if(Tt(r)&&!r.isDefaultPrevented()){if((i=r.shiftKey&&86===r.keyCode)&&H.webkit&&-1!==t.navigator.userAgent.indexOf("Version/"))return;if(r.stopImmediatePropagation(),a.set(r),window.setTimeout(function(){a.clear()},100),H.ie&&i)return r.preventDefault(),void m(e,!0);n.remove(),n.create(),e.once("keyup",o),e.once("paste",function(){e.off("keyup",o)})}});e.on("paste",function(o){var u=a.isSet(),c=function(t,e){var n=bt(e.clipboardData||t.getDoc().dataTransfer);return et.isMsEdge()?$.extend(n,{"text/html":""}):n}(e,o),l="text"===r.get()||i,f=wt(c,z.internalHtmlMime());i=!1,o.isDefaultPrevented()||function(e){var n=e.clipboardData;return-1!==t.navigator.userAgent.indexOf("Android")&&n&&n.items&&0===n.items.length}(o)?n.remove():xt(c)||!Pt(e,o,n.getLastRng()||e.selection.getRng())?(u||o.preventDefault(),!H.ie||u&&!o.ieFake||wt(c,"text/html")||(n.create(),e.dom.bind(n.getEl(),"paste",function(t){t.stopPropagation()}),e.getDoc().execCommand("Paste",!1,null),c["text/html"]=n.getHtml()),wt(c,"text/html")?(o.preventDefault(),f||(f=z.isMarked(c["text/html"])),s(c,u,l,f)):N.setEditorTimeout(e,function(){s(c,u,l,f)},0)):n.remove()})},Ct=function(e){return H.ie&&e.inline?t.document.body:e.getBody()},Dt=function(t,e,n){(function(t){return Ct(t)!==t.getBody()})(t)&&t.dom.bind(e,"paste keyup",function(e){Ft(t,n)||t.fire("paste")})},St=function(t){return t.dom.get("mcepastebin")},Et=function(t,e){return e===t},Ft=function(t,e){var n,r=St(t);return(n=r)&&"mcepastebin"===n.id&&Et(e,r.innerHTML)},It=function(t){var e=u(null);return{create:function(){return function(t,e,n){var r,o=t.dom,i=t.getBody();e.set(t.selection.getRng()),r=t.dom.add(Ct(t),"div",{id:"mcepastebin",class:"mce-pastebin",contentEditable:!0,"data-mce-bogus":"all",style:"position: fixed; top: 50%; width: 10px; height: 10px; overflow: hidden; opacity: 0"},n),(H.ie||H.gecko)&&o.setStyle(r,"left","rtl"===o.getStyle(i,"direction",!0)?65535:-65535),o.bind(r,"beforedeactivate focusin focusout",function(t){t.stopPropagation()}),Dt(t,r,n),r.focus(),t.selection.select(r,!0)}(t,e,"%MCEPASTEBIN%")},remove:function(){return function(t,e){if(St(t)){for(var n=void 0,r=e.get();n=t.dom.get("mcepastebin");)t.dom.remove(n),t.dom.unbind(n);r&&t.selection.setRng(r)}e.set(null)}(t,e)},getEl:function(){return St(t)},getHtml:function(){return function(t){var e,n,r,o,i,u=function(e,n){e.appendChild(n),t.dom.remove(n,!0)};for(n=$.grep(Ct(t).childNodes,function(t){return"mcepastebin"===t.id}),e=n.shift(),$.each(n,function(t){u(e,t)}),r=(o=t.dom.select("div[id=mcepastebin]",e)).length-1;r>=0;r--)i=t.dom.create("div"),e.insertBefore(i,o[r]),u(i,o[r]);return e?e.innerHTML:""}(t)},getLastRng:function(){return function(t){return t.get()}(e)},isDefault:function(){return Ft(t,"%MCEPASTEBIN%")},isDefaultContent:function(t){return Et("%MCEPASTEBIN%",t)}}},Ot=function(t,e){var n=It(t);return t.on("PreInit",function(){return function(t,e,n){var r;kt(t,e,n),t.parser.addNodeFilter("img",function(e,n,o){var i=function(t){t.attr("data-mce-object")||r===H.transparentSrc||t.remove()},u=function(t){return 0===t.indexOf("webkit-fake-url")},a=function(t){return 0===t.indexOf("data:")};if(!t.settings.paste_data_images&&function(t){return t.data&&!0===t.data.paste}(o))for(var s=e.length;s--;)(r=e[s].attr("src"))&&(u(r)?i(e[s]):!t.settings.allow_html_data_urls&&a(r)&&i(e[s]))})}(t,n,e)}),{pasteFormat:e,pasteHtml:function(e,n){return vt(t,e,n)},pasteText:function(e){return yt(t,e)},pasteImageData:function(e,n){return Pt(t,e,n)},getDataTransferItems:bt,hasHtmlOrText:xt,hasContentType:wt}},At=function(){},Rt=function(t,e,n){if(!function(t){return!1===H.iOS&&void 0!==t&&"function"==typeof t.setData&&!0!==et.isMsEdge()}(t))return!1;try{return t.clearData(),t.setData("text/html",e),t.setData("text/plain",n),t.setData(z.internalHtmlMime(),e),!0}catch(t){return!1}},Mt=function(t,e,n,r){Rt(t.clipboardData,e.html,e.text)?(t.preventDefault(),r()):n(e.html,r)},jt=function(t){return function(e,n){var r=z.mark(e),o=t.dom.create("div",{contenteditable:"false","data-mce-bogus":"all"}),i=t.dom.create("div",{contenteditable:"true"},r);t.dom.setStyles(o,{position:"fixed",top:"0",left:"-3000px",width:"1000px",overflow:"hidden"}),o.appendChild(i),t.dom.add(t.getBody(),o);var u=t.selection.getRng();i.focus();var a=t.dom.createRng();a.selectNodeContents(i),t.selection.setRng(a),N.setTimeout(function(){t.selection.setRng(u),o.parentNode.removeChild(o),n()},0)}},Lt=function(t){return{html:t.selection.getContent({contextual:!0}),text:t.selection.getContent({format:"text"})}},Bt=function(t){return!t.selection.isCollapsed()||function(t){return!!t.dom.getParent(t.selection.getStart(),"td[data-mce-selected],th[data-mce-selected]",t.getBody())}(t)},Ht={register:function(t){t.on("cut",function(t){return function(e){Bt(t)&&Mt(e,Lt(t),jt(t),function(){N.setTimeout(function(){t.execCommand("Delete")},0)})}}(t)),t.on("copy",function(t){return function(e){Bt(t)&&Mt(e,Lt(t),jt(t),At)}}(t))}},Nt=tinymce.util.Tools.resolve("tinymce.dom.RangeUtils"),$t=function(t,e){return Nt.getCaretRangeFromPoint(e.clientX,e.clientY,t.getDoc())},Wt=function(t,e){t.focus(),t.selection.setRng(e)},Ut={setup:function(t,e,n){Q.shouldBlockDrop(t)&&t.on("dragend dragover draggesture dragdrop drop drag",function(t){t.preventDefault(),t.stopPropagation()}),Q.shouldPasteDataImages(t)||t.on("drop",function(t){var e=t.dataTransfer;e&&e.files&&e.files.length>0&&t.preventDefault()}),t.on("drop",function(r){var o,i;if(i=$t(t,r),!r.isDefaultPrevented()&&!n.get()){o=e.getDataTransferItems(r.dataTransfer);var u,a=e.hasContentType(o,z.internalHtmlMime());if((e.hasHtmlOrText(o)&&(!(u=o["text/plain"])||0!==u.indexOf("file://"))||!e.pasteImageData(r,i))&&i&&Q.shouldFilterDrop(t)){var s=o["mce-internal"]||o["text/html"]||o["text/plain"];s&&(r.preventDefault(),N.setEditorTimeout(t,function(){t.undoManager.transact(function(){o["mce-internal"]&&t.execCommand("Delete"),Wt(t,i),s=et.trimHtml(s),o["text/html"]?e.pasteHtml(s,a):e.pasteText(s)})}))}}}),t.on("dragstart",function(t){n.set(!0)}),t.on("dragover dragend",function(e){Q.shouldPasteDataImages(t)&&!1===n.get()&&(e.preventDefault(),Wt(t,$t(t,e))),"dragend"===e.type&&n.set(!1)})}},zt={setup:function(t){var e=t.plugins.paste,n=Q.getPreProcess(t);n&&t.on("PastePreProcess",function(t){n.call(e,e,t)});var r=Q.getPostProcess(t);r&&t.on("PastePostProcess",function(t){r.call(e,e,t)})}};function Vt(t,e){t.on("PastePreProcess",function(n){n.content=e(t,n.content,n.internal,n.wordContent)})}function qt(t,e){if(!it.isWordContent(e))return e;var n=[];$.each(t.schema.getBlockElements(),function(t,e){n.push(e)});var r=new RegExp("(?:<br>&nbsp;[\\s\\r\\n]+|<br>)*(<\\/?("+n.join("|")+")[^>]*>)(?:<br>&nbsp;[\\s\\r\\n]+|<br>)*","g");return e=et.filter(e,[[r,"$1"]]),e=et.filter(e,[[/<br><br>/g,"<BR><BR>"],[/<br>/g," "],[/<BR><BR>/g,"<br>"]])}function Kt(t,e,n,r){if(r||n)return e;var o,i=Q.getWebkitStyles(t);if(!1===Q.shouldRemoveWebKitStyles(t)||"all"===i)return e;if(i&&(o=i.split(/[, ]/)),o){var u=t.dom,a=t.selection.getNode();e=e.replace(/(<[^>]+) style="([^"]*)"([^>]*>)/gi,function(t,e,n,r){var i=u.parseStyle(u.decode(n)),s={};if("none"===o)return e+r;for(var c=0;c<o.length;c++){var l=i[o[c]],f=u.getStyle(a,o[c],!0);/color/.test(o[c])&&(l=u.toHex(l),f=u.toHex(f)),f!==l&&(s[o[c]]=l)}return(s=u.serializeStyle(s,"span"))?e+' style="'+s+'"'+r:e+r})}else e=e.replace(/(<[^>]+) style="([^"]*)"([^>]*>)/gi,"$1$3");return e=e.replace(/(<[^>]+) data-mce-style="([^"]+)"([^>]*>)/gi,function(t,e,n,r){return e+' style="'+n+'"'+r})}function Gt(t,e){t.$("a",e).find("font,u").each(function(e,n){t.dom.remove(n,!0)})}var Xt={setup:function(t){H.webkit&&Vt(t,Kt),H.ie&&(Vt(t,qt),function(t,e){t.on("PastePostProcess",function(n){e(t,n.node)})}(t,Gt))}},Yt=function(t,e){return function(n){n.setActive("text"===e.pasteFormat.get());var r=function(t){return n.setActive(t.state)};return t.on("PastePlainTextToggle",r),function(){return t.off("PastePlainTextToggle",r)}}},Zt={register:function(t,e){t.ui.registry.addToggleButton("pastetext",{active:!1,icon:"paste-text",tooltip:"Paste as text",onAction:function(){return t.execCommand("mceTogglePlainTextPaste")},onSetup:Yt(t,e)}),t.ui.registry.addToggleMenuItem("pastetext",{text:"Paste as text",onAction:function(){return t.execCommand("mceTogglePlainTextPaste")},onSetup:Yt(t,e)})}};a.add("paste",function(t){if(!1===s.hasProPlugin(t)){var e=u(!1),n=u(Q.isPasteAsTextEnabled(t)?"text":"html"),r=Ot(t,n),o=Xt.setup(t);return Zt.register(t,r),g.register(t,r),zt.setup(t),Ht.register(t),Ut.setup(t,r,e),c.get(r,o)}})}(window);
//# sourceMappingURL=plugin.js.map