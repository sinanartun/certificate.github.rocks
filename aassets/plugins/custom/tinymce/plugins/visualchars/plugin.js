!function(n){"use strict";var t,e,r,o,i,u=function(n){var t=n,e=function(){return t};return{get:e,set:function(n){t=n},clone:function(){return u(e())}}},c=tinymce.util.Tools.resolve("tinymce.PluginManager"),a={get:function(n){return{isEnabled:function(){return n.get()}}}},s=function(n,t){return n.fire("VisualChars",{state:t})},f=function(){},l=function(n){return function(){return n}},d=l(!1),m=l(!0),g=function(){return v},v=(t=function(n){return n.isNone()},o={fold:function(n,t){return n()},is:d,isSome:d,isNone:m,getOr:r=function(n){return n},getOrThunk:e=function(n){return n()},getOrDie:function(n){throw new Error(n||"error: getOrDie called on none.")},getOrNull:l(null),getOrUndefined:l(void 0),or:r,orThunk:e,map:g,each:f,bind:g,exists:d,forall:m,filter:g,equals:t,equals_:t,toArray:function(){return[]},toString:l("none()")},Object.freeze&&Object.freeze(o),o),N=function(n){var t=l(n),e=function(){return o},r=function(t){return t(n)},o={fold:function(t,e){return e(n)},is:function(t){return n===t},isSome:m,isNone:d,getOr:t,getOrThunk:t,getOrDie:t,getOrNull:t,getOrUndefined:t,or:e,orThunk:e,map:function(t){return N(t(n))},each:function(t){t(n)},bind:r,exists:r,forall:r,filter:function(t){return t(n)?o:v},toArray:function(){return[n]},toString:function(){return"some("+n+")"},equals:function(t){return t.is(n)},equals_:function(t,e){return t.fold(d,function(t){return e(n,t)})}};return o},p=function(n){return null==n?v:N(n)},h=function(n){return function(t){return function(n){if(null===n)return"null";var t=typeof n;return"object"===t&&(Array.prototype.isPrototypeOf(n)||n.constructor&&"Array"===n.constructor.name)?"array":"object"===t&&(String.prototype.isPrototypeOf(n)||n.constructor&&"String"===n.constructor.name)?"string":t}(t)===n}},E=h("string"),T=h("boolean"),O=h("function"),y=h("number"),b=Array.prototype.slice,D=function(n,t){for(var e=0,r=n.length;e<r;e++){t(n[e],e)}},C=(O(Array.from)&&Array.from,n.Node.ATTRIBUTE_NODE,n.Node.CDATA_SECTION_NODE,n.Node.COMMENT_NODE,n.Node.DOCUMENT_NODE,n.Node.DOCUMENT_TYPE_NODE,n.Node.DOCUMENT_FRAGMENT_NODE,n.Node.ELEMENT_NODE,n.Node.TEXT_NODE),A=(n.Node.PROCESSING_INSTRUCTION_NODE,n.Node.ENTITY_REFERENCE_NODE,n.Node.ENTITY_NODE,n.Node.NOTATION_NODE,void 0!==n.window?n.window:Function("return this;")(),function(n){return n.dom().nodeValue}),_=(i=C,function(n){return function(n){return n.dom().nodeType}(n)===i}),w=function(t,e,r){!function(t,e,r){if(!(E(r)||T(r)||y(r)))throw n.console.error("Invalid call to Attr.set. Key ",e,":: Value ",r,":: Element ",t),new Error("Attribute value was not simple");t.setAttribute(e,r+"")}(t.dom(),e,r)},M=function(n,t){n.dom().removeAttribute(t)},S=function(n,t){var e=function(n,t){var e=n.dom().getAttribute(t);return null===e?void 0:e}(n,t);return void 0===e||""===e?[]:e.split(" ")},k=function(n){return void 0!==n.dom().classList},x=function(n,t){return function(n,t,e){var r=S(n,t).concat([e]);return w(n,t,r.join(" ")),!0}(n,"class",t)},I=function(n,t){return function(n,t,e){var r=function(n,t){for(var e=[],r=0,o=n.length;r<o;r++){var i=n[r];t(i,r)&&e.push(i)}return e}(S(n,t),function(n){return n!==e});return r.length>0?w(n,t,r.join(" ")):M(n,t),!1}(n,"class",t)},L=function(n){0===(k(n)?n.dom().classList:function(n){return S(n,"class")}(n)).length&&M(n,"class")},P=function(n){if(null==n)throw new Error("Node cannot be null or undefined");return{dom:l(n)}},B={fromHtml:function(t,e){var r=(e||n.document).createElement("div");if(r.innerHTML=t,!r.hasChildNodes()||r.childNodes.length>1)throw n.console.error("HTML does not have a single root node",t),new Error("HTML must have a single root node");return P(r.childNodes[0])},fromTag:function(t,e){var r=(e||n.document).createElement(t);return P(r)},fromText:function(t,e){var r=(e||n.document).createTextNode(t);return P(r)},fromDom:P,fromPoint:function(n,t,e){var r=n.dom();return p(r.elementFromPoint(t,e)).map(P)}},R={" ":"nbsp","­":"shy"},V=function(n,t){var e,r="";for(e in n)r+=e;return new RegExp("["+r+"]",t?"g":"")},U=function(n){var t,e="";for(t in n)e&&(e+=","),e+="span.mce-"+n[t];return e},j={charMap:R,regExp:V(R),regExpGlobal:V(R,!0),selector:U(R),nbspClass:"mce-nbsp",charMapToRegExp:V,charMapToSelector:U},q=function(n){return'<span data-mce-bogus="1" class="mce-'+j.charMap[n]+'">'+n+"</span>"},F=function(n,t){var e=[],r=function(n,t){for(var e=n.length,r=new Array(e),o=0;o<e;o++){var i=n[o];r[o]=t(i,o)}return r}(n.dom().childNodes,B.fromDom);return D(r,function(n){t(n)&&(e=e.concat([n])),e=e.concat(F(n,t))}),e},G={isMatch:function(n){return _(n)&&void 0!==A(n)&&j.regExp.test(A(n))},filterDescendants:F,findParentElm:function(n,t){for(;n.parentNode;){if(n.parentNode===t)return n;n=n.parentNode}},replaceWithSpans:function(n){return n.replace(j.regExpGlobal,q)}},H=function(n){return"span"===n.nodeName.toLowerCase()&&n.classList.contains("mce-nbsp-wrap")},Y=function(n,t){var e=G.filterDescendants(B.fromDom(t),G.isMatch);D(e,function(t){var e,r,o=t.dom().parentNode;if(H(o))e=B.fromDom(o),r=j.nbspClass,k(e)?e.dom().classList.add(r):x(e,r);else{for(var i=G.replaceWithSpans(A(t)),u=n.dom.create("div",null,i),c=void 0;c=u.lastChild;)n.dom.insertAfter(c,t.dom());n.dom.remove(t.dom())}})},z=function(n,t){var e=n.dom.select(j.selector,t);D(e,function(t){H(t)?function(n,t){k(n)?n.dom().classList.remove(t):I(n,t);L(n)}(B.fromDom(t),j.nbspClass):n.dom.remove(t,!0)})},W=Y,K=z,X=function(n){var t=n.getBody(),e=n.selection.getBookmark(),r=G.findParentElm(n.selection.getNode(),t);z(n,r=void 0!==r?r:t),Y(n,r),n.selection.moveToBookmark(e)},J=function(n,t){var e,r=n.getBody(),o=n.selection;t.set(!t.get()),s(n,t.get()),e=o.getBookmark(),!0===t.get()?W(n,r):K(n,r),o.moveToBookmark(e)},Q={register:function(n,t){n.addCommand("mceVisualChars",function(){J(n,t)})}},Z=tinymce.util.Tools.resolve("tinymce.util.Delay"),$={setup:function(n,t){var e=Z.debounce(function(){X(n)},300);!1!==n.settings.forced_root_block&&n.on("keydown",function(r){!0===t.get()&&(13===r.keyCode?X(n):e())})}},nn=function(n){return n.getParam("visualchars_default_state",!1)},tn={setup:function(n,t){n.on("init",function(){var e=!nn(n);t.set(e),J(n,t)})}},en=function(n,t){return function(e){e.setActive(t.get());var r=function(n){return e.setActive(n.state)};return n.on("VisualChars",r),function(){return n.off("VisualChars",r)}}},rn=function(n,t){n.ui.registry.addToggleButton("visualchars",{tooltip:"Show invisible characters",icon:"visualchars",onAction:function(){return n.execCommand("mceVisualChars")},onSetup:en(n,t)}),n.ui.registry.addToggleMenuItem("visualchars",{text:"Show invisible characters",onAction:function(){return n.execCommand("mceVisualChars")},onSetup:en(n,t)})};c.add("visualchars",function(n){var t=u(!1);return Q.register(n,t),rn(n,t),$.setup(n,t),tn.setup(n,t),a.get(t)})}(window);
//# sourceMappingURL=plugin.js.map