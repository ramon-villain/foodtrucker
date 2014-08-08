!function(e,t){"function"==typeof define&&define.amd?define("sifter",t):"object"==typeof exports?module.exports=t():e.Sifter=t()}(this,function(){var e=function(e,t){this.items=e,this.settings=t||{diacritics:!0}};e.prototype.tokenize=function(e){if(e=i(String(e||"").toLowerCase()),!e||!e.length)return[];var t,n,r,a,l=[],u=e.split(/ +/);for(t=0,n=u.length;n>t;t++){if(r=o(u[t]),this.settings.diacritics)for(a in s)s.hasOwnProperty(a)&&(r=r.replace(new RegExp(a,"g"),s[a]));l.push({string:u[t],regex:new RegExp(r,"i")})}return l},e.prototype.iterator=function(e,t){var n;n=r(e)?Array.prototype.forEach||function(e){for(var t=0,n=this.length;n>t;t++)e(this[t],t,this)}:function(e){for(var t in this)this.hasOwnProperty(t)&&e(this[t],t,this)},n.apply(e,[t])},e.prototype.getScoreFunction=function(e,t){var n,i,o,r;n=this,e=n.prepareSearch(e,t),o=e.tokens,i=e.options.fields,r=o.length;var s=function(e,t){var n,i;return e?(e=String(e||""),i=e.search(t.regex),-1===i?0:(n=t.string.length/e.length,0===i&&(n+=.5),n)):0},a=function(){var e=i.length;return e?1===e?function(e,t){return s(t[i[0]],e)}:function(t,n){for(var o=0,r=0;e>o;o++)r+=s(n[i[o]],t);return r/e}:function(){return 0}}();return r?1===r?function(e){return a(o[0],e)}:"and"===e.options.conjunction?function(e){for(var t,n=0,i=0;r>n;n++){if(t=a(o[n],e),0>=t)return 0;i+=t}return i/r}:function(e){for(var t=0,n=0;r>t;t++)n+=a(o[t],e);return n/r}:function(){return 0}},e.prototype.getSortFunction=function(e,n){var i,o,r,s,a,l,u,p,c,d,h;if(r=this,e=r.prepareSearch(e,n),h=!e.query&&n.sort_empty||n.sort,c=function(e,t){return"$score"===e?t.score:r.items[t.id][e]},a=[],h)for(i=0,o=h.length;o>i;i++)(e.query||"$score"!==h[i].field)&&a.push(h[i]);if(e.query){for(d=!0,i=0,o=a.length;o>i;i++)if("$score"===a[i].field){d=!1;break}d&&a.unshift({field:"$score",direction:"desc"})}else for(i=0,o=a.length;o>i;i++)if("$score"===a[i].field){a.splice(i,1);break}for(p=[],i=0,o=a.length;o>i;i++)p.push("desc"===a[i].direction?-1:1);return l=a.length,l?1===l?(s=a[0].field,u=p[0],function(e,n){return u*t(c(s,e),c(s,n))}):function(e,n){var i,o,r,s,u;for(i=0;l>i;i++)if(u=a[i].field,o=p[i]*t(c(u,e),c(u,n)))return o;return 0}:null},e.prototype.prepareSearch=function(e,t){if("object"==typeof e)return e;t=n({},t);var i=t.fields,o=t.sort,s=t.sort_empty;return i&&!r(i)&&(t.fields=[i]),o&&!r(o)&&(t.sort=[o]),s&&!r(s)&&(t.sort_empty=[s]),{options:t,query:String(e||"").toLowerCase(),tokens:this.tokenize(e),total:0,items:[]}},e.prototype.search=function(e,t){var n=this,i,o,r,s,a,l;return r=this.prepareSearch(e,t),t=r.options,e=r.query,l=t.score||n.getScoreFunction(r),e.length?n.iterator(n.items,function(e,n){o=l(e),(t.filter===!1||o>0)&&r.items.push({score:o,id:n})}):n.iterator(n.items,function(e,t){r.items.push({score:1,id:t})}),a=n.getSortFunction(r,t),a&&r.items.sort(a),r.total=r.items.length,"number"==typeof t.limit&&(r.items=r.items.slice(0,t.limit)),r};var t=function(e,t){return"number"==typeof e&&"number"==typeof t?e>t?1:t>e?-1:0:(e=String(e||"").toLowerCase(),t=String(t||"").toLowerCase(),e>t?1:t>e?-1:0)},n=function(e,t){var n,i,o,r;for(n=1,i=arguments.length;i>n;n++)if(r=arguments[n])for(o in r)r.hasOwnProperty(o)&&(e[o]=r[o]);return e},i=function(e){return(e+"").replace(/^\s+|\s+$|/g,"")},o=function(e){return(e+"").replace(/([.?*+^$[\]\\(){}|-])/g,"\\$1")},r=Array.isArray||$&&$.isArray||function(e){return"[object Array]"===Object.prototype.toString.call(e)},s={a:"[aÀÁÂÃÄÅàáâãäåĀā]",c:"[cÇçćĆčČ]",d:"[dđĐďĎ]",e:"[eÈÉÊËèéêëěĚĒē]",i:"[iÌÍÎÏìíîïĪī]",n:"[nÑñňŇ]",o:"[oÒÓÔÕÕÖØòóôõöøŌō]",r:"[rřŘ]",s:"[sŠš]",t:"[tťŤ]",u:"[uÙÚÛÜùúûüůŮŪū]",y:"[yŸÿýÝ]",z:"[zŽž]"};return e}),function(e,t){"function"==typeof define&&define.amd?define("microplugin",t):"object"==typeof exports?module.exports=t():e.MicroPlugin=t()}(this,function(){var e={};e.mixin=function(e){e.plugins={},e.prototype.initializePlugins=function(e){var n,i,o,r=this,s=[];if(r.plugins={names:[],settings:{},requested:{},loaded:{}},t.isArray(e))for(n=0,i=e.length;i>n;n++)"string"==typeof e[n]?s.push(e[n]):(r.plugins.settings[e[n].name]=e[n].options,s.push(e[n].name));else if(e)for(o in e)e.hasOwnProperty(o)&&(r.plugins.settings[o]=e[o],s.push(o));for(;s.length;)r.require(s.shift())},e.prototype.loadPlugin=function(t){var n=this,i=n.plugins,o=e.plugins[t];if(!e.plugins.hasOwnProperty(t))throw new Error('Unable to find "'+t+'" plugin');i.requested[t]=!0,i.loaded[t]=o.fn.apply(n,[n.plugins.settings[t]||{}]),i.names.push(t)},e.prototype.require=function(e){var t=this,n=t.plugins;if(!t.plugins.loaded.hasOwnProperty(e)){if(n.requested[e])throw new Error('Plugin has circular dependency ("'+e+'")');t.loadPlugin(e)}return n.loaded[e]},e.define=function(t,n){e.plugins[t]={name:t,fn:n}}};var t={isArray:Array.isArray||function(e){return"[object Array]"===Object.prototype.toString.call(e)}};return e}),function(e,t){"function"==typeof define&&define.amd?define("selectize",["jquery","sifter","microplugin"],t):"object"==typeof exports?module.exports=t(require("jquery"),require("sifter"),require("microplugin")):e.Selectize=t(e.jQuery,e.Sifter,e.MicroPlugin)}(this,function($,e,t){"use strict";var n=function(e,t){if("string"!=typeof t||t.length){var n="string"==typeof t?new RegExp(t,"i"):t,i=function(e){var t=0;if(3===e.nodeType){var o=e.data.search(n);if(o>=0&&e.data.length>0){var r=e.data.match(n),s=document.createElement("span");s.className="highlight";var a=e.splitText(o),l=a.splitText(r[0].length),u=a.cloneNode(!0);s.appendChild(u),a.parentNode.replaceChild(s,a),t=1}}else if(1===e.nodeType&&e.childNodes&&!/(script|style)/i.test(e.tagName))for(var p=0;p<e.childNodes.length;++p)p+=i(e.childNodes[p]);return t};return e.each(function(){i(this)})}},i=function(){};i.prototype={on:function(e,t){this._events=this._events||{},this._events[e]=this._events[e]||[],this._events[e].push(t)},off:function(e,t){var n=arguments.length;return 0===n?delete this._events:1===n?delete this._events[e]:(this._events=this._events||{},void(e in this._events!=!1&&this._events[e].splice(this._events[e].indexOf(t),1)))},trigger:function(e){if(this._events=this._events||{},e in this._events!=!1)for(var t=0;t<this._events[e].length;t++)this._events[e][t].apply(this,Array.prototype.slice.call(arguments,1))}},i.mixin=function(e){for(var t=["on","off","trigger"],n=0;n<t.length;n++)e.prototype[t[n]]=i.prototype[t[n]]};var o=/Mac/.test(navigator.userAgent),r=65,s=188,a=13,l=27,u=37,p=38,c=80,d=39,h=40,f=78,g=8,v=46,m=16,y=o?91:17,w=o?18:17,O=9,C=1,b=2,x=function(e){return"undefined"!=typeof e},S=function(e){return"undefined"==typeof e||null===e?null:"boolean"==typeof e?e?"1":"0":e+""},I=function(e){return(e+"").replace(/&/g,"&amp;").replace(/</g,"&lt;").replace(/>/g,"&gt;").replace(/"/g,"&quot;")},_=function(e){return(e+"").replace(/\$/g,"$$$$")},F={};F.before=function(e,t,n){var i=e[t];e[t]=function(){return n.apply(e,arguments),i.apply(e,arguments)}},F.after=function(e,t,n){var i=e[t];e[t]=function(){var t=i.apply(e,arguments);return n.apply(e,arguments),t}};var D=function(e,t){if(!$.isArray(t))return t;var n,i,o={};for(n=0,i=t.length;i>n;n++)t[n].hasOwnProperty(e)&&(o[t[n][e]]=t[n]);return o},k=function(e){var t=!1;return function(){t||(t=!0,e.apply(this,arguments))}},A=function(e,t){var n;return function(){var i=this,o=arguments;window.clearTimeout(n),n=window.setTimeout(function(){e.apply(i,o)},t)}},P=function(e,t,n){var i,o=e.trigger,r={};e.trigger=function(){var n=arguments[0];return-1===t.indexOf(n)?o.apply(e,arguments):void(r[n]=arguments)},n.apply(e,[]),e.trigger=o;for(i in r)r.hasOwnProperty(i)&&o.apply(e,r[i])},z=function(e,t,n,i){e.on(t,n,function(t){for(var n=t.target;n&&n.parentNode!==e[0];)n=n.parentNode;return t.currentTarget=n,i.apply(this,[t])})},T=function(e){var t={};if("selectionStart"in e)t.start=e.selectionStart,t.length=e.selectionEnd-t.start;else if(document.selection){e.focus();var n=document.selection.createRange(),i=document.selection.createRange().text.length;n.moveStart("character",-e.value.length),t.start=n.text.length-i,t.length=i}return t},q=function(e,t,n){var i,o,r={};if(n)for(i=0,o=n.length;o>i;i++)r[n[i]]=e.css(n[i]);else r=e.css();t.css(r)},j=function(e,t){if(!e)return 0;var n=$("<test>").css({position:"absolute",top:-99999,left:-99999,width:"auto",padding:0,whiteSpace:"pre"}).text(e).appendTo("body");q(t,n,["letterSpacing","fontSize","fontFamily","fontWeight","textTransform"]);var i=n.width();return n.remove(),i},L=function(e){var t=null,n=function(n,i){var o,r,s,a,l,u,p,c;n=n||window.event||{},i=i||{},n.metaKey||n.altKey||(i.force||e.data("grow")!==!1)&&(o=e.val(),n.type&&"keydown"===n.type.toLowerCase()&&(r=n.keyCode,s=r>=97&&122>=r||r>=65&&90>=r||r>=48&&57>=r||32===r,r===v||r===g?(c=T(e[0]),c.length?o=o.substring(0,c.start)+o.substring(c.start+c.length):r===g&&c.start?o=o.substring(0,c.start-1)+o.substring(c.start+1):r===v&&"undefined"!=typeof c.start&&(o=o.substring(0,c.start)+o.substring(c.start+1))):s&&(u=n.shiftKey,p=String.fromCharCode(n.keyCode),p=u?p.toUpperCase():p.toLowerCase(),o+=p)),a=e.attr("placeholder"),!o&&a&&(o=a),l=j(o,e)+4,l!==t&&(t=l,e.width(l),e.triggerHandler("resize")))};e.on("keydown keyup update blur",n),n()},H=function(t,n){var i,o,r,s,a,l=this;a=t[0],a.selectize=l,s=window.getComputedStyle?window.getComputedStyle(a,null).getPropertyValue("direction"):a.currentStyle&&a.currentStyle.direction,s=s||t.parents("[dir]:first").attr("dir")||"",$.extend(l,{settings:n,$input:t,tagType:"select"===a.tagName.toLowerCase()?C:b,rtl:/rtl/i.test(s),eventNS:".selectize"+ ++H.count,highlightedValue:null,isOpen:!1,isDisabled:!1,isRequired:t.is("[required]"),isInvalid:!1,isLocked:!1,isFocused:!1,isInputHidden:!1,isSetup:!1,isShiftDown:!1,isCmdDown:!1,isCtrlDown:!1,ignoreFocus:!1,ignoreBlur:!1,ignoreHover:!1,hasOptions:!1,currentResults:null,lastValue:"",caretPos:0,loading:0,loadedSearches:{},$activeOption:null,$activeItems:[],optgroups:{},options:{},userOptions:{},items:[],renderCache:{},onSearchChange:null===n.loadThrottle?l.onSearchChange:A(l.onSearchChange,n.loadThrottle)}),l.sifter=new e(this.options,{diacritics:n.diacritics}),$.extend(l.options,D(n.valueField,n.options)),delete l.settings.options,$.extend(l.optgroups,D(n.optgroupValueField,n.optgroups)),delete l.settings.optgroups,l.settings.mode=l.settings.mode||(1===l.settings.maxItems?"single":"multi"),"boolean"!=typeof l.settings.hideSelected&&(l.settings.hideSelected="multi"===l.settings.mode),l.settings.create&&(l.canCreate=function(e){var t=l.settings.createFilter;return!(!e.length||"function"==typeof t&&!t.apply(l,[e])||"string"==typeof t&&!new RegExp(t).test(e)||t instanceof RegExp&&!t.test(e))}),l.initializePlugins(l.settings.plugins),l.setupCallbacks(),l.setupTemplates(),l.setup()};return i.mixin(H),t.mixin(H),$.extend(H.prototype,{setup:function(){var e=this,t=e.settings,n=e.eventNS,i=$(window),r=$(document),s=e.$input,a,l,u,p,c,d,h,f,g,v,O,b;h=e.settings.mode,v=s.attr("tabindex")||"",O=s.attr("class")||"",a=$("<div>").addClass(t.wrapperClass).addClass(O).addClass(h),l=$("<div>").addClass(t.inputClass).addClass("items").appendTo(a),u=$('<input type="text" autocomplete="off" />').appendTo(l).attr("tabindex",v),d=$(t.dropdownParent||a),p=$("<div>").addClass(t.dropdownClass).addClass(O).addClass(h).hide().appendTo(d),c=$("<div>").addClass(t.dropdownContentClass).appendTo(p),a.css({width:s[0].style.width}),e.plugins.names.length&&(b="plugin-"+e.plugins.names.join(" plugin-"),a.addClass(b),p.addClass(b)),(null===t.maxItems||t.maxItems>1)&&e.tagType===C&&s.attr("multiple","multiple"),e.settings.placeholder&&u.attr("placeholder",t.placeholder),s.attr("autocorrect")&&u.attr("autocorrect",s.attr("autocorrect")),s.attr("autocapitalize")&&u.attr("autocapitalize",s.attr("autocapitalize")),e.$wrapper=a,e.$control=l,e.$control_input=u,e.$dropdown=p,e.$dropdown_content=c,p.on("mouseenter","[data-selectable]",function(){return e.onOptionHover.apply(e,arguments)}),p.on("mousedown","[data-selectable]",function(){return e.onOptionSelect.apply(e,arguments)}),z(l,"mousedown","*:not(input)",function(){return e.onItemSelect.apply(e,arguments)}),L(u),l.on({mousedown:function(){return e.onMouseDown.apply(e,arguments)},click:function(){return e.onClick.apply(e,arguments)}}),u.on({mousedown:function(e){e.stopPropagation()},keydown:function(){return e.onKeyDown.apply(e,arguments)},keyup:function(){return e.onKeyUp.apply(e,arguments)},keypress:function(){return e.onKeyPress.apply(e,arguments)},resize:function(){e.positionDropdown.apply(e,[])},blur:function(){return e.onBlur.apply(e,arguments)},focus:function(){return e.ignoreBlur=!1,e.onFocus.apply(e,arguments)},paste:function(){return e.onPaste.apply(e,arguments)}}),r.on("keydown"+n,function(t){e.isCmdDown=t[o?"metaKey":"ctrlKey"],e.isCtrlDown=t[o?"altKey":"ctrlKey"],e.isShiftDown=t.shiftKey}),r.on("keyup"+n,function(t){t.keyCode===w&&(e.isCtrlDown=!1),t.keyCode===m&&(e.isShiftDown=!1),t.keyCode===y&&(e.isCmdDown=!1)}),r.on("mousedown"+n,function(t){if(e.isFocused){if(t.target===e.$dropdown[0]||t.target.parentNode===e.$dropdown[0])return!1;e.$control.has(t.target).length||t.target===e.$control[0]||e.blur()}}),i.on(["scroll"+n,"resize"+n].join(" "),function(){e.isOpen&&e.positionDropdown.apply(e,arguments)}),i.on("mousemove"+n,function(){e.ignoreHover=!1}),this.revertSettings={$children:s.children().detach(),tabindex:s.attr("tabindex")},s.attr("tabindex",-1).hide().after(e.$wrapper),$.isArray(t.items)&&(e.setValue(t.items),delete t.items),s[0].validity&&s.on("invalid"+n,function(t){t.preventDefault(),e.isInvalid=!0,e.refreshState()}),e.updateOriginalInput(),e.refreshItems(),e.refreshState(),e.updatePlaceholder(),e.isSetup=!0,s.is(":disabled")&&e.disable(),e.on("change",this.onChange),s.data("selectize",e),s.addClass("selectized"),e.trigger("initialize"),t.preload===!0&&e.onSearchChange("")},setupTemplates:function(){var e=this,t=e.settings.labelField,n=e.settings.optgroupLabelField,i={optgroup:function(e){return'<div class="optgroup">'+e.html+"</div>"},optgroup_header:function(e,t){return'<div class="optgroup-header">'+t(e[n])+"</div>"},option:function(e,n){return'<div class="option">'+n(e[t])+"</div>"},item:function(e,n){return'<div class="item">'+n(e[t])+"</div>"},option_create:function(e,t){return'<div class="create">Add <strong>'+t(e.input)+"</strong>&hellip;</div>"}};e.settings.render=$.extend({},i,e.settings.render)},setupCallbacks:function(){var e,t,n={initialize:"onInitialize",change:"onChange",item_add:"onItemAdd",item_remove:"onItemRemove",clear:"onClear",option_add:"onOptionAdd",option_remove:"onOptionRemove",option_clear:"onOptionClear",dropdown_open:"onDropdownOpen",dropdown_close:"onDropdownClose",type:"onType"};for(e in n)n.hasOwnProperty(e)&&(t=this.settings[n[e]],t&&this.on(e,t))},onClick:function(e){var t=this;t.isFocused||(t.focus(),e.preventDefault())},onMouseDown:function(e){var t=this,n=e.isDefaultPrevented(),i=$(e.target);if(t.isFocused){if(e.target!==t.$control_input[0])return"single"===t.settings.mode?t.isOpen?t.close():t.open():n||t.setActiveItem(null),!1}else n||window.setTimeout(function(){t.focus()},0)},onChange:function(){this.$input.trigger("change")},onPaste:function(e){var t=this;(t.isFull()||t.isInputHidden||t.isLocked)&&e.preventDefault()},onKeyPress:function(e){if(this.isLocked)return e&&e.preventDefault();var t=String.fromCharCode(e.keyCode||e.which);return this.settings.create&&t===this.settings.delimiter?(this.createItem(),e.preventDefault(),!1):void 0},onKeyDown:function(e){var t=e.target===this.$control_input[0],n=this;if(n.isLocked)return void(e.keyCode!==O&&e.preventDefault());switch(e.keyCode){case r:if(n.isCmdDown)return void n.selectAll();break;case l:return void n.close();case f:if(!e.ctrlKey||e.altKey)break;case h:if(!n.isOpen&&n.hasOptions)n.open();else if(n.$activeOption){n.ignoreHover=!0;var i=n.getAdjacentOption(n.$activeOption,1);i.length&&n.setActiveOption(i,!0,!0)}return void e.preventDefault();case c:if(!e.ctrlKey||e.altKey)break;case p:if(n.$activeOption){n.ignoreHover=!0;var s=n.getAdjacentOption(n.$activeOption,-1);s.length&&n.setActiveOption(s,!0,!0)}return void e.preventDefault();case a:return n.isOpen&&n.$activeOption&&n.onOptionSelect({currentTarget:n.$activeOption}),void e.preventDefault();case u:return void n.advanceSelection(-1,e);case d:return void n.advanceSelection(1,e);case O:return n.settings.selectOnTab&&n.isOpen&&n.$activeOption&&(n.onOptionSelect({currentTarget:n.$activeOption}),e.preventDefault()),void(n.settings.create&&n.createItem()&&e.preventDefault());case g:case v:return void n.deleteSelection(e)}return!n.isFull()&&!n.isInputHidden||(o?e.metaKey:e.ctrlKey)?void 0:void e.preventDefault()},onKeyUp:function(e){var t=this;if(t.isLocked)return e&&e.preventDefault();var n=t.$control_input.val()||"";t.lastValue!==n&&(t.lastValue=n,t.onSearchChange(n),t.refreshOptions(),t.trigger("type",n))},onSearchChange:function(e){var t=this,n=t.settings.load;n&&(t.loadedSearches.hasOwnProperty(e)||(t.loadedSearches[e]=!0,t.load(function(i){n.apply(t,[e,i])})))},onFocus:function(e){var t=this;return t.isFocused=!0,t.isDisabled?(t.blur(),e&&e.preventDefault(),!1):void(t.ignoreFocus||("focus"===t.settings.preload&&t.onSearchChange(""),t.$activeItems.length||(t.showInput(),t.setActiveItem(null),t.refreshOptions(!!t.settings.openOnFocus)),t.refreshState()))},onBlur:function(e){var t=this;if(t.isFocused=!1,!t.ignoreFocus){if(!t.ignoreBlur&&document.activeElement===t.$dropdown_content[0])return t.ignoreBlur=!0,void t.onFocus(e);t.settings.create&&t.settings.createOnBlur&&t.createItem(!1),t.close(),t.setTextboxValue(""),t.setActiveItem(null),t.setActiveOption(null),t.setCaret(t.items.length),t.refreshState()}},onOptionHover:function(e){this.ignoreHover||this.setActiveOption(e.currentTarget,!1)},onOptionSelect:function(e){var t,n,i,o=this;e.preventDefault&&(e.preventDefault(),e.stopPropagation()),n=$(e.currentTarget),n.hasClass("create")?o.createItem():(t=n.attr("data-value"),"undefined"!=typeof t&&(o.lastQuery=null,o.setTextboxValue(""),o.addItem(t),!o.settings.hideSelected&&e.type&&/mouse/.test(e.type)&&o.setActiveOption(o.getOption(t))))},onItemSelect:function(e){var t=this;t.isLocked||"multi"===t.settings.mode&&(e.preventDefault(),t.setActiveItem(e.currentTarget,e))},load:function(e){var t=this,n=t.$wrapper.addClass("loading");t.loading++,e.apply(t,[function(e){t.loading=Math.max(t.loading-1,0),e&&e.length&&(t.addOption(e),t.refreshOptions(t.isFocused&&!t.isInputHidden)),t.loading||n.removeClass("loading"),t.trigger("load",e)}])},setTextboxValue:function(e){var t=this.$control_input,n=t.val()!==e;n&&(t.val(e).triggerHandler("update"),this.lastValue=e)},getValue:function(){return this.tagType===C&&this.$input.attr("multiple")?this.items:this.items.join(this.settings.delimiter)},setValue:function(e){P(this,["change"],function(){this.clear(),this.addItems(e)})},setActiveItem:function(e,t){var n=this,i,o,r,s,a,l,u,p;if("single"!==n.settings.mode){if(e=$(e),!e.length)return $(n.$activeItems).removeClass("active"),n.$activeItems=[],void(n.isFocused&&n.showInput());if(i=t&&t.type.toLowerCase(),"mousedown"===i&&n.isShiftDown&&n.$activeItems.length){for(p=n.$control.children(".active:last"),s=Array.prototype.indexOf.apply(n.$control[0].childNodes,[p[0]]),a=Array.prototype.indexOf.apply(n.$control[0].childNodes,[e[0]]),s>a&&(u=s,s=a,a=u),o=s;a>=o;o++)l=n.$control[0].childNodes[o],-1===n.$activeItems.indexOf(l)&&($(l).addClass("active"),n.$activeItems.push(l));t.preventDefault()}else"mousedown"===i&&n.isCtrlDown||"keydown"===i&&this.isShiftDown?e.hasClass("active")?(r=n.$activeItems.indexOf(e[0]),n.$activeItems.splice(r,1),e.removeClass("active")):n.$activeItems.push(e.addClass("active")[0]):($(n.$activeItems).removeClass("active"),n.$activeItems=[e.addClass("active")[0]]);n.hideInput(),this.isFocused||n.focus()}},setActiveOption:function(e,t,n){var i,o,r,s,a,l=this;l.$activeOption&&l.$activeOption.removeClass("active"),l.$activeOption=null,e=$(e),e.length&&(l.$activeOption=e.addClass("active"),(t||!x(t))&&(i=l.$dropdown_content.height(),o=l.$activeOption.outerHeight(!0),t=l.$dropdown_content.scrollTop()||0,r=l.$activeOption.offset().top-l.$dropdown_content.offset().top+t,s=r,a=r-i+o,r+o>i+t?l.$dropdown_content.stop().animate({scrollTop:a},n?l.settings.scrollDuration:0):t>r&&l.$dropdown_content.stop().animate({scrollTop:s},n?l.settings.scrollDuration:0)))},selectAll:function(){var e=this;"single"!==e.settings.mode&&(e.$activeItems=Array.prototype.slice.apply(e.$control.children(":not(input)").addClass("active")),e.$activeItems.length&&(e.hideInput(),e.close()),e.focus())},hideInput:function(){var e=this;e.setTextboxValue(""),e.$control_input.css({opacity:0,position:"absolute",left:e.rtl?1e4:-1e4}),e.isInputHidden=!0},showInput:function(){this.$control_input.css({opacity:1,position:"relative",left:0}),this.isInputHidden=!1},focus:function(){var e=this;e.isDisabled||(e.ignoreFocus=!0,e.$control_input[0].focus(),window.setTimeout(function(){e.ignoreFocus=!1,e.onFocus()},0))},blur:function(){this.$control_input.trigger("blur")},getScoreFunction:function(e){return this.sifter.getScoreFunction(e,this.getSearchOptions())},getSearchOptions:function(){var e=this.settings,t=e.sortField;return"string"==typeof t&&(t={field:t}),{fields:e.searchField,conjunction:e.searchConjunction,sort:t}},search:function(e){var t,n,i,o,r,s=this,a=s.settings,l=this.getSearchOptions();if(a.score&&(r=s.settings.score.apply(this,[e]),"function"!=typeof r))throw new Error('Selectize "score" setting must be a function that returns a function');if(e!==s.lastQuery?(s.lastQuery=e,o=s.sifter.search(e,$.extend(l,{score:r})),s.currentResults=o):o=$.extend(!0,{},s.currentResults),a.hideSelected)for(t=o.items.length-1;t>=0;t--)-1!==s.items.indexOf(S(o.items[t].id))&&o.items.splice(t,1);return o},refreshOptions:function(e){var t,i,o,r,s,a,l,u,p,c,d,h,f,g,v,m;"undefined"==typeof e&&(e=!0);var y=this,w=y.$control_input.val(),O=y.search(w),C=y.$dropdown_content,b=y.$activeOption&&S(y.$activeOption.attr("data-value"));if(r=O.items.length,"number"==typeof y.settings.maxOptions&&(r=Math.min(r,y.settings.maxOptions)),s={},y.settings.optgroupOrder)for(a=y.settings.optgroupOrder,t=0;t<a.length;t++)s[a[t]]=[];else a=[];for(t=0;r>t;t++)for(l=y.options[O.items[t].id],u=y.render("option",l),p=l[y.settings.optgroupField]||"",c=$.isArray(p)?p:[p],i=0,o=c&&c.length;o>i;i++)p=c[i],y.optgroups.hasOwnProperty(p)||(p=""),s.hasOwnProperty(p)||(s[p]=[],a.push(p)),s[p].push(u);for(d=[],t=0,r=a.length;r>t;t++)p=a[t],y.optgroups.hasOwnProperty(p)&&s[p].length?(h=y.render("optgroup_header",y.optgroups[p])||"",h+=s[p].join(""),d.push(y.render("optgroup",$.extend({},y.optgroups[p],{html:h})))):d.push(s[p].join(""));if(C.html(d.join("")),y.settings.highlight&&O.query.length&&O.tokens.length)for(t=0,r=O.tokens.length;r>t;t++)n(C,O.tokens[t].regex);if(!y.settings.hideSelected)for(t=0,r=y.items.length;r>t;t++)y.getOption(y.items[t]).addClass("selected");f=y.settings.create&&y.canCreate(O.query),f&&(C.prepend(y.render("option_create",{input:w})),m=$(C[0].childNodes[0])),y.hasOptions=O.items.length>0||f,y.hasOptions?(O.items.length>0?(v=b&&y.getOption(b),v&&v.length?g=v:"single"===y.settings.mode&&y.items.length&&(g=y.getOption(y.items[0])),g&&g.length||(g=m&&!y.settings.addPrecedence?y.getAdjacentOption(m,1):C.find("[data-selectable]:first"))):g=m,y.setActiveOption(g),e&&!y.isOpen&&y.open()):(y.setActiveOption(null),e&&y.isOpen&&y.close())},addOption:function(e){var t,n,i,o,r=this;if($.isArray(e))for(t=0,n=e.length;n>t;t++)r.addOption(e[t]);else o=S(e[r.settings.valueField]),"string"!=typeof o||r.options.hasOwnProperty(o)||(r.userOptions[o]=!0,r.options[o]=e,r.lastQuery=null,r.trigger("option_add",o,e))},addOptionGroup:function(e,t){this.optgroups[e]=t,this.trigger("optgroup_add",e,t)},updateOption:function(e,t){var n=this,i,o,r,s,a,l;if(e=S(e),r=S(t[n.settings.valueField]),null!==e&&n.options.hasOwnProperty(e)){if("string"!=typeof r)throw new Error("Value must be set in option data");r!==e&&(delete n.options[e],s=n.items.indexOf(e),-1!==s&&n.items.splice(s,1,r)),n.options[r]=t,a=n.renderCache.item,l=n.renderCache.option,a&&(delete a[e],delete a[r]),l&&(delete l[e],delete l[r]),-1!==n.items.indexOf(r)&&(i=n.getItem(e),o=$(n.render("item",t)),i.hasClass("active")&&o.addClass("active"),i.replaceWith(o)),n.isOpen&&n.refreshOptions(!1)}},removeOption:function(e){var t=this;e=S(e);var n=t.renderCache.item,i=t.renderCache.option;n&&delete n[e],i&&delete i[e],delete t.userOptions[e],delete t.options[e],t.lastQuery=null,t.trigger("option_remove",e),t.removeItem(e)},clearOptions:function(){var e=this;e.loadedSearches={},e.userOptions={},e.renderCache={},e.options=e.sifter.items={},e.lastQuery=null,e.trigger("option_clear"),e.clear()},getOption:function(e){return this.getElementWithValue(e,this.$dropdown_content.find("[data-selectable]"))},getAdjacentOption:function(e,t){var n=this.$dropdown.find("[data-selectable]"),i=n.index(e)+t;return i>=0&&i<n.length?n.eq(i):$()},getElementWithValue:function(e,t){if(e=S(e),"undefined"!=typeof e&&null!==e)for(var n=0,i=t.length;i>n;n++)if(t[n].getAttribute("data-value")===e)return $(t[n]);return $()},getItem:function(e){return this.getElementWithValue(e,this.$control.children())},addItems:function(e){for(var t=$.isArray(e)?e:[e],n=0,i=t.length;i>n;n++)this.isPending=i-1>n,this.addItem(t[n])},addItem:function(e){P(this,["change"],function(){var t,n,i,o=this,r=o.settings.mode,s,a,l,u;return e=S(e),-1!==o.items.indexOf(e)?void("single"===r&&o.close()):void(o.options.hasOwnProperty(e)&&("single"===r&&o.clear(),"multi"===r&&o.isFull()||(t=$(o.render("item",o.options[e])),u=o.isFull(),o.items.splice(o.caretPos,0,e),o.insertAtCaret(t),(!o.isPending||!u&&o.isFull())&&o.refreshState(),o.isSetup&&(i=o.$dropdown_content.find("[data-selectable]"),o.isPending||(n=o.getOption(e),l=o.getAdjacentOption(n,1).attr("data-value"),o.refreshOptions(o.isFocused&&"single"!==r),l&&o.setActiveOption(o.getOption(l))),!i.length||o.isFull()?o.close():o.positionDropdown(),o.updatePlaceholder(),o.trigger("item_add",e,t),o.updateOriginalInput()))))})},removeItem:function(e){var t=this,n,i,o;n="object"==typeof e?e:t.getItem(e),e=S(n.attr("data-value")),i=t.items.indexOf(e),-1!==i&&(n.remove(),n.hasClass("active")&&(o=t.$activeItems.indexOf(n[0]),t.$activeItems.splice(o,1)),t.items.splice(i,1),t.lastQuery=null,!t.settings.persist&&t.userOptions.hasOwnProperty(e)&&t.removeOption(e),i<t.caretPos&&t.setCaret(t.caretPos-1),t.refreshState(),t.updatePlaceholder(),t.updateOriginalInput(),t.positionDropdown(),t.trigger("item_remove",e))},createItem:function(e){var t=this,n=$.trim(t.$control_input.val()||""),i=t.caretPos;if(!t.canCreate(n))return!1;t.lock(),"undefined"==typeof e&&(e=!0);var o="function"==typeof t.settings.create?this.settings.create:function(e){var n={};return n[t.settings.labelField]=e,n[t.settings.valueField]=e,n},r=k(function(n){if(t.unlock(),n&&"object"==typeof n){var o=S(n[t.settings.valueField]);"string"==typeof o&&(t.setTextboxValue(""),t.addOption(n),t.setCaret(i),t.addItem(o),t.refreshOptions(e&&"single"!==t.settings.mode))}}),s=o.apply(this,[n,r]);return"undefined"!=typeof s&&r(s),!0},refreshItems:function(){if(this.lastQuery=null,this.isSetup)for(var e=0;e<this.items.length;e++)this.addItem(this.items);this.refreshState(),this.updateOriginalInput()},refreshState:function(){var e,t=this;t.isRequired&&(t.items.length&&(t.isInvalid=!1),t.$control_input.prop("required",e)),t.refreshClasses()},refreshClasses:function(){var e=this,t=e.isFull(),n=e.isLocked;e.$wrapper.toggleClass("rtl",e.rtl),e.$control.toggleClass("focus",e.isFocused).toggleClass("disabled",e.isDisabled).toggleClass("required",e.isRequired).toggleClass("invalid",e.isInvalid).toggleClass("locked",n).toggleClass("full",t).toggleClass("not-full",!t).toggleClass("input-active",e.isFocused&&!e.isInputHidden).toggleClass("dropdown-active",e.isOpen).toggleClass("has-options",!$.isEmptyObject(e.options)).toggleClass("has-items",e.items.length>0),e.$control_input.data("grow",!t&&!n)},isFull:function(){return null!==this.settings.maxItems&&this.items.length>=this.settings.maxItems},updateOriginalInput:function(){var e,t,n,i=this;if(i.tagType===C){for(n=[],e=0,t=i.items.length;t>e;e++)n.push('<option value="'+I(i.items[e])+'" selected="selected"></option>');n.length||this.$input.attr("multiple")||n.push('<option value="" selected="selected"></option>'),i.$input.html(n.join(""))}else i.$input.val(i.getValue()),i.$input.attr("value",i.$input.val());i.isSetup&&i.trigger("change",i.$input.val())},updatePlaceholder:function(){if(this.settings.placeholder){var e=this.$control_input;this.items.length?e.removeAttr("placeholder"):e.attr("placeholder",this.settings.placeholder),e.triggerHandler("update",{force:!0})}},open:function(){var e=this;e.isLocked||e.isOpen||"multi"===e.settings.mode&&e.isFull()||(e.focus(),e.isOpen=!0,e.refreshState(),e.$dropdown.css({visibility:"hidden",display:"block"}),e.positionDropdown(),e.$dropdown.css({visibility:"visible"}),e.trigger("dropdown_open",e.$dropdown))},close:function(){var e=this,t=e.isOpen;"single"===e.settings.mode&&e.items.length&&e.hideInput(),e.isOpen=!1,e.$dropdown.hide(),e.setActiveOption(null),e.refreshState(),t&&e.trigger("dropdown_close",e.$dropdown)},positionDropdown:function(){var e=this.$control,t="body"===this.settings.dropdownParent?e.offset():e.position();t.top+=e.outerHeight(!0),this.$dropdown.css({width:e.outerWidth(),top:t.top,left:t.left})},clear:function(){var e=this;e.items.length&&(e.$control.children(":not(input)").remove(),e.items=[],e.lastQuery=null,e.setCaret(0),e.setActiveItem(null),e.updatePlaceholder(),e.updateOriginalInput(),e.refreshState(),e.showInput(),e.trigger("clear"))},insertAtCaret:function(e){var t=Math.min(this.caretPos,this.items.length);0===t?this.$control.prepend(e):$(this.$control[0].childNodes[t]).before(e),this.setCaret(t+1)},deleteSelection:function(e){var t,n,i,o,r,s,a,l,u,p=this;if(i=e&&e.keyCode===g?-1:1,o=T(p.$control_input[0]),p.$activeOption&&!p.settings.hideSelected&&(a=p.getAdjacentOption(p.$activeOption,-1).attr("data-value")),r=[],p.$activeItems.length){for(u=p.$control.children(".active:"+(i>0?"last":"first")),s=p.$control.children(":not(input)").index(u),i>0&&s++,t=0,n=p.$activeItems.length;n>t;t++)r.push($(p.$activeItems[t]).attr("data-value"));e&&(e.preventDefault(),e.stopPropagation())}else(p.isFocused||"single"===p.settings.mode)&&p.items.length&&(0>i&&0===o.start&&0===o.length?r.push(p.items[p.caretPos-1]):i>0&&o.start===p.$control_input.val().length&&r.push(p.items[p.caretPos]));if(!r.length||"function"==typeof p.settings.onDelete&&p.settings.onDelete.apply(p,[r])===!1)return!1;for("undefined"!=typeof s&&p.setCaret(s);r.length;)p.removeItem(r.pop());return p.showInput(),p.positionDropdown(),p.refreshOptions(!0),a&&(l=p.getOption(a),l.length&&p.setActiveOption(l)),!0},advanceSelection:function(e,t){var n,i,o,r,s,a,l=this;0!==e&&(l.rtl&&(e*=-1),n=e>0?"last":"first",i=T(l.$control_input[0]),l.isFocused&&!l.isInputHidden?(r=l.$control_input.val().length,s=0>e?0===i.start&&0===i.length:i.start===r,s&&!r&&l.advanceCaret(e,t)):(a=l.$control.children(".active:"+n),a.length&&(o=l.$control.children(":not(input)").index(a),l.setActiveItem(null),l.setCaret(e>0?o+1:o))))},advanceCaret:function(e,t){var n=this,i,o;0!==e&&(i=e>0?"next":"prev",n.isShiftDown?(o=n.$control_input[i](),o.length&&(n.hideInput(),n.setActiveItem(o),t&&t.preventDefault())):n.setCaret(n.caretPos+e))},setCaret:function(e){var t=this;if(e="single"===t.settings.mode?t.items.length:Math.max(0,Math.min(t.items.length,e)),!t.isPending){var n,i,o,r,s;for(r=t.$control.children(":not(input)"),n=0,i=r.length;i>n;n++)s=$(r[n]).detach(),e>n?t.$control_input.before(s):t.$control.append(s)}t.caretPos=e},lock:function(){this.close(),this.isLocked=!0,this.refreshState()},unlock:function(){this.isLocked=!1,this.refreshState()},disable:function(){var e=this;e.$input.prop("disabled",!0),e.isDisabled=!0,e.lock()},enable:function(){var e=this;e.$input.prop("disabled",!1),e.isDisabled=!1,e.unlock()
},destroy:function(){var e=this,t=e.eventNS,n=e.revertSettings;e.trigger("destroy"),e.off(),e.$wrapper.remove(),e.$dropdown.remove(),e.$input.html("").append(n.$children).removeAttr("tabindex").removeClass("selectized").attr({tabindex:n.tabindex}).show(),e.$control_input.removeData("grow"),e.$input.removeData("selectize"),$(window).off(t),$(document).off(t),$(document.body).off(t),delete e.$input[0].selectize},render:function(e,t){var n,i,o,r="",s=!1,a=this,l=/^[\t ]*<([a-z][a-z0-9\-_]*(?:\:[a-z][a-z0-9\-_]*)?)/i;return("option"===e||"item"===e)&&(n=S(t[a.settings.valueField]),s=!!n),s&&(x(a.renderCache[e])||(a.renderCache[e]={}),a.renderCache[e].hasOwnProperty(n))?a.renderCache[e][n]:(r=a.settings.render[e].apply(this,[t,I]),("option"===e||"option_create"===e)&&(r=r.replace(l,"<$1 data-selectable")),"optgroup"===e&&(i=t[a.settings.optgroupValueField]||"",r=r.replace(l,'<$1 data-group="'+_(I(i))+'"')),("option"===e||"item"===e)&&(r=r.replace(l,'<$1 data-value="'+_(I(n||""))+'"')),s&&(a.renderCache[e][n]=r),r)},clearCache:function(e){var t=this;"undefined"==typeof e?t.renderCache={}:delete t.renderCache[e]}}),H.count=0,H.defaults={plugins:[],delimiter:",",persist:!0,diacritics:!0,create:!1,createOnBlur:!1,createFilter:null,highlight:!0,openOnFocus:!0,maxOptions:1e3,maxItems:null,hideSelected:null,addPrecedence:!1,selectOnTab:!1,preload:!1,allowEmptyOption:!1,scrollDuration:60,loadThrottle:300,dataAttr:"data-data",optgroupField:"optgroup",valueField:"value",labelField:"text",optgroupLabelField:"label",optgroupValueField:"value",optgroupOrder:null,sortField:"$order",searchField:["text"],searchConjunction:"and",mode:null,wrapperClass:"selectize-control",inputClass:"selectize-input",dropdownClass:"selectize-dropdown",dropdownContentClass:"selectize-dropdown-content",dropdownParent:null,render:{}},$.fn.selectize=function(e){var t=$.fn.selectize.defaults,n=$.extend({},t,e),i=n.dataAttr,o=n.labelField,r=n.valueField,s=n.optgroupField,a=n.optgroupLabelField,l=n.optgroupValueField,u=function(e,t){var i,s,a,l,u=$.trim(e.val()||"");if(n.allowEmptyOption||u.length){for(a=u.split(n.delimiter),i=0,s=a.length;s>i;i++)l={},l[o]=a[i],l[r]=a[i],t.options[a[i]]=l;t.items=a}},p=function(e,t){var u,p,c,d,h=0,f=t.options,g=function(e){var t=i&&e.attr(i);return"string"==typeof t&&t.length?JSON.parse(t):null},v=function(e,i){var a,l;if(e=$(e),a=e.attr("value")||"",a.length||n.allowEmptyOption){if(f.hasOwnProperty(a))return void(i&&(f[a].optgroup?$.isArray(f[a].optgroup)?f[a].optgroup.push(i):f[a].optgroup=[f[a].optgroup,i]:f[a].optgroup=i));l=g(e)||{},l[o]=l[o]||e.text(),l[r]=l[r]||a,l[s]=l[s]||i,l.$order=++h,f[a]=l,e.is(":selected")&&t.items.push(a)}},m=function(e){var n,i,o,r,s;for(e=$(e),o=e.attr("label"),o&&(r=g(e)||{},r[a]=o,r[l]=o,t.optgroups[o]=r),s=$("option",e),n=0,i=s.length;i>n;n++)v(s[n],o)};for(t.maxItems=e.attr("multiple")?null:1,d=e.children(),u=0,p=d.length;p>u;u++)c=d[u].tagName.toLowerCase(),"optgroup"===c?m(d[u]):"option"===c&&v(d[u])};return this.each(function(){if(!this.selectize){var i,o=$(this),r=this.tagName.toLowerCase(),s=o.attr("placeholder")||o.attr("data-placeholder");s||n.allowEmptyOption||(s=o.children('option[value=""]').text());var a={placeholder:s,options:{},optgroups:{},items:[]};"select"===r?p(o,a):u(o,a),i=new H(o,$.extend(!0,{},t,a,e))}})},$.fn.selectize.defaults=H.defaults,H.define("drag_drop",function(e){if(!$.fn.sortable)throw new Error('The "drag_drop" plugin requires jQuery UI "sortable".');if("multi"===this.settings.mode){var t=this;t.lock=function(){var e=t.lock;return function(){var n=t.$control.data("sortable");return n&&n.disable(),e.apply(t,arguments)}}(),t.unlock=function(){var e=t.unlock;return function(){var n=t.$control.data("sortable");return n&&n.enable(),e.apply(t,arguments)}}(),t.setup=function(){var e=t.setup;return function(){e.apply(this,arguments);var n=t.$control.sortable({items:"[data-value]",forcePlaceholderSize:!0,disabled:t.isLocked,start:function(e,t){t.placeholder.css("width",t.helper.css("width")),n.css({overflow:"visible"})},stop:function(){n.css({overflow:"hidden"});var e=t.$activeItems?t.$activeItems.slice():null,i=[];n.children("[data-value]").each(function(){i.push($(this).attr("data-value"))}),t.setValue(i),t.setActiveItem(e)}})}}()}}),H.define("dropdown_header",function(e){var t=this;e=$.extend({title:"Untitled",headerClass:"selectize-dropdown-header",titleRowClass:"selectize-dropdown-header-title",labelClass:"selectize-dropdown-header-label",closeClass:"selectize-dropdown-header-close",html:function(e){return'<div class="'+e.headerClass+'"><div class="'+e.titleRowClass+'"><span class="'+e.labelClass+'">'+e.title+'</span><a href="javascript:void(0)" class="'+e.closeClass+'">&times;</a></div></div>'}},e),t.setup=function(){var n=t.setup;return function(){n.apply(t,arguments),t.$dropdown_header=$(e.html(e)),t.$dropdown.prepend(t.$dropdown_header)}}()}),H.define("optgroup_columns",function(e){var t=this;e=$.extend({equalizeWidth:!0,equalizeHeight:!0},e),this.getAdjacentOption=function(e,t){var n=e.closest("[data-group]").find("[data-selectable]"),i=n.index(e)+t;return i>=0&&i<n.length?n.eq(i):$()},this.onKeyDown=function(){var e=t.onKeyDown;return function(n){var i,o,r,s;return!this.isOpen||n.keyCode!==u&&n.keyCode!==d?e.apply(this,arguments):(t.ignoreHover=!0,s=this.$activeOption.closest("[data-group]"),i=s.find("[data-selectable]").index(this.$activeOption),s=n.keyCode===u?s.prev("[data-group]"):s.next("[data-group]"),r=s.find("[data-selectable]"),o=r.eq(Math.min(r.length-1,i)),void(o.length&&this.setActiveOption(o)))}}();var n=function(){var e,t=n.width,i=document;return"undefined"==typeof t&&(e=i.createElement("div"),e.innerHTML='<div style="width:50px;height:50px;position:absolute;left:-50px;top:-50px;overflow:auto;"><div style="width:1px;height:100px;"></div></div>',e=e.firstChild,i.body.appendChild(e),t=n.width=e.offsetWidth-e.clientWidth,i.body.removeChild(e)),t},i=function(){var i,o,r,s,a,l,u;if(u=$("[data-group]",t.$dropdown_content),o=u.length,o&&t.$dropdown_content.width()){if(e.equalizeHeight){for(r=0,i=0;o>i;i++)r=Math.max(r,u.eq(i).height());u.css({height:r})}e.equalizeWidth&&(l=t.$dropdown_content.innerWidth()-n(),s=Math.round(l/o),u.css({width:s}),o>1&&(a=l-s*(o-1),u.eq(o-1).css({width:a})))}};(e.equalizeHeight||e.equalizeWidth)&&(F.after(this,"positionDropdown",i),F.after(this,"refreshOptions",i))}),H.define("remove_button",function(e){if("single"!==this.settings.mode){e=$.extend({label:"&times;",title:"Remove",className:"remove",append:!0},e);var t=this,n='<a href="javascript:void(0)" class="'+e.className+'" tabindex="-1" title="'+I(e.title)+'">'+e.label+"</a>",i=function(e,t){var n=e.search(/(<\/[^>]+>\s*)$/);return e.substring(0,n)+t+e.substring(n)};this.setup=function(){var o=t.setup;return function(){if(e.append){var r=t.settings.render.item;t.settings.render.item=function(e){return i(r.apply(this,arguments),n)}}o.apply(this,arguments),this.$control.on("click","."+e.className,function(e){if(e.preventDefault(),!t.isLocked){var n=$(e.currentTarget).parent();t.setActiveItem(n),t.deleteSelection()&&t.setCaret(t.items.length)}})}}()}}),H.define("restore_on_backspace",function(e){var t=this;e.text=e.text||function(e){return e[this.settings.labelField]},this.onKeyDown=function(n){var i=t.onKeyDown;return function(t){var n,o;return t.keyCode===g&&""===this.$control_input.val()&&!this.$activeItems.length&&(n=this.caretPos-1,n>=0&&n<this.items.length)?(o=this.options[this.items[n]],this.deleteSelection(t)&&(this.setTextboxValue(e.text.apply(this,[o])),this.refreshOptions(!0)),void t.preventDefault()):i.apply(this,arguments)}}()}),H});