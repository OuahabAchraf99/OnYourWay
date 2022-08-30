!function(e){"use strict";var t=function(e){var t=arguments,s=!0,i=1;return e=e.replace(/%s/g,function(){var e=t[i++];return"undefined"==typeof e?(s=!1,""):e}),s?e:""},s=function(t,s){this.options=s,this.$element=e(t),this.isShown=!1,this.init()};s.DEFAULTS={placement:"after",white:!1,message:"Click here to show/hide password",eyeClass:"glyphicon",eyeOpenClass:"glyphicon-eye-open",eyeCloseClass:"glyphicon-eye-close"},s.prototype.init=function(){var s,i;"before"===this.options.placement?(s="insertBefore",i="input-prepend"):(this.options.placement="after",s="insertAfter",i="input-append"),this.$element.wrap(t('<div class="%s input-group" />',i)),this.$text=e('<input type="text" />')[s](this.$element).attr("class",this.$element.attr("class")).attr("style",this.$element.attr("style")).attr("placeholder",this.$element.attr("placeholder")).css("display",this.$element.css("display")).val(this.$element.val()).hide(),this.$element.prop("readonly")&&this.$text.prop("readonly",!0),this.$icon=e(['<span tabindex="100" title="'+this.options.message+'" class="add-on input-group-addon">','<i class="icon-eye-open'+(this.options.white?" icon-white":"")+" "+this.options.eyeClass+" "+this.options.eyeOpenClass+'"></i>',"</span>"].join(""))[s](this.$text).css("cursor","pointer"),this.$text.off("keyup").on("keyup",e.proxy(function(){this.isShown&&this.$element.val(this.$text.val()).trigger("change")},this)),this.$icon.off("click").on("click",e.proxy(function(){this.$text.val(this.$element.val()).trigger("change"),this.toggle()},this))},s.prototype.toggle=function(e){this[this.isShown?"hide":"show"](e)},s.prototype.show=function(t){var s=e.Event("show.bs.password",{relatedTarget:t});this.$element.trigger(s),this.isShown=!0,this.$element.hide(),this.$text.show(),this.$icon.find("i").removeClass("icon-eye-open "+this.options.eyeOpenClass).addClass("icon-eye-close "+this.options.eyeCloseClass),this.$text[this.options.placement](this.$element)},s.prototype.hide=function(t){var s=e.Event("hide.bs.password",{relatedTarget:t});this.$element.trigger(s),this.isShown=!1,this.$element.show(),this.$text.hide(),this.$icon.find("i").removeClass("icon-eye-close "+this.options.eyeCloseClass).addClass("icon-eye-open "+this.options.eyeOpenClass),this.$element[this.options.placement](this.$text)},s.prototype.val=function(e){return"undefined"==typeof e?this.$element.val():(this.$element.val(e).trigger("change"),this.$text.val(e),void 0)};var i=e.fn.password;e.fn.password=function(){var t,i=arguments[0],n=arguments,o=["show","hide","toggle","val"];return this.each(function(){var a=e(this),h=a.data("bs.password"),r=e.extend({},s.DEFAULTS,a.data(),"object"==typeof i&&i);if("string"==typeof i){if(e.inArray(i,o)<0)throw"Unknown method: "+i;t=h[i](n[1])}else h?h.init(r):(h=new s(a,r),a.data("bs.password",h))}),t?t:this},e.fn.password.Constructor=s,e.fn.password.noConflict=function(){return e.fn.password=i,this},e(function(){e('[data-toggle="password"]').password()})}(window.jQuery);