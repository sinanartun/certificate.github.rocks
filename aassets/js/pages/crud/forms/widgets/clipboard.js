"use strict";var KTClipboardDemo={init:function(){new ClipboardJS("[data-clipboard=true]").on("success",function(e){e.clearSelection(),alert("Copied!")})}};jQuery(document).ready(function(){KTClipboardDemo.init()});
//# sourceMappingURL=clipboard.js.map
