!function(){"use strict";var n=tinymce.util.Tools.resolve("tinymce.PluginManager"),t={register:function(n){n.addCommand("InsertHorizontalRule",function(){n.execCommand("mceInsertContent",!1,"<hr />")})}},e={register:function(n){n.ui.registry.addButton("hr",{icon:"horizontal-rule",tooltip:"Horizontal line",onAction:function(){return n.execCommand("InsertHorizontalRule")}}),n.ui.registry.addMenuItem("hr",{icon:"horizontal-rule",text:"Horizontal line",onAction:function(){return n.execCommand("InsertHorizontalRule")}})}};n.add("hr",function(n){t.register(n),e.register(n)})}();
//# sourceMappingURL=plugin.js.map
