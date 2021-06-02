!function(e){var t={};function n(o){if(t[o])return t[o].exports;var s=t[o]={i:o,l:!1,exports:{}};return e[o].call(s.exports,s,s.exports,n),s.l=!0,s.exports}n.m=e,n.c=t,n.d=function(e,t,o){n.o(e,t)||Object.defineProperty(e,t,{configurable:!1,enumerable:!0,get:o})},n.r=function(e){Object.defineProperty(e,"__esModule",{value:!0})},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=52)}({0:function(e,t,n){var o;
/*!
  Copyright (c) 2017 Jed Watson.
  Licensed under the MIT License (MIT), see
  http://jedwatson.github.io/classnames
*/
/*!
  Copyright (c) 2017 Jed Watson.
  Licensed under the MIT License (MIT), see
  http://jedwatson.github.io/classnames
*/
!function(){"use strict";var n={}.hasOwnProperty;function s(){for(var e=[],t=0;t<arguments.length;t++){var o=arguments[t];if(o){var r=typeof o;if("string"===r||"number"===r)e.push(o);else if(Array.isArray(o)&&o.length){var a=s.apply(null,o);a&&e.push(a)}else if("object"===r)for(var i in o)n.call(o,i)&&o[i]&&e.push(i)}}return e.join(" ")}void 0!==e&&e.exports?(s.default=s,e.exports=s):void 0===(o=function(){return s}.apply(t,[]))||(e.exports=o)}()},4:function(e,t,n){"use strict";function o(){return atomic_blocks_pro_globals.blockSettingsPermissions}function s(){var e=[];return wp.blocks.getBlockTypes().map(function(t){t.name.startsWith("atomic-blocks")&&e.push(t)}),e=e.filter(function(e){return e.hasOwnProperty("ab_settings_data")})}function r(){return atomic_blocks_pro_globals.allRoles}n.r(t),n.d(t,"getBlockSettingsPermissions",function(){return o}),n.d(t,"get_registered_ab_blocks",function(){return s}),n.d(t,"getAllRoles",function(){return r}),wp.hooks.addFilter("ab_should_render_block_setting","ab_pro",function(e,t,n,s){var r=o();return void 0===r[t]||void 0===r[t][n]?e:s.roles.some(function(e){return!0===r[t][n][e]})})},52:function(e,t,n){"use strict";n.r(t),n.d(t,"App",function(){return O});var o=n(4),s=n(0),r=n.n(s);function a(e){return(a="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}function i(e,t){for(var n=0;n<t.length;n++){var o=t[n];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(e,o.key,o)}}function l(e){return(l=Object.setPrototypeOf?Object.getPrototypeOf:function(e){return e.__proto__||Object.getPrototypeOf(e)})(e)}function c(e){if(void 0===e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return e}function u(e,t){return(u=Object.setPrototypeOf||function(e,t){return e.__proto__=t,e})(e,t)}function p(e,t){return function(e){if(Array.isArray(e))return e}(e)||function(e,t){if(!(Symbol.iterator in Object(e)||"[object Arguments]"===Object.prototype.toString.call(e)))return;var n=[],o=!0,s=!1,r=void 0;try{for(var a,i=e[Symbol.iterator]();!(o=(a=i.next()).done)&&(n.push(a.value),!t||n.length!==t);o=!0);}catch(e){s=!0,r=e}finally{try{o||null==i.return||i.return()}finally{if(s)throw r}}return n}(e,t)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance")}()}var d=window.React,m=d.Component,b=d.useState,f=d.useEffect,g=wp.i18n.__,k=function(e){return d.createElement(d.Fragment,null,d.createElement("label",null,d.createElement("input",{type:"checkbox",name:e.checkboxName,value:e.role.toLowerCase(),checked:e.checked,onChange:function(t){return e.onClick(t)},"data-setting":e.setting,"data-block":e.block}),e.role))},v=function(e){return d.createElement("fieldset",null,d.createElement("legend",{className:"screen-reader-text"},d.createElement("span",null,g("Roles","atomic-blocks-pro"))),Object.values(e.roles).map(function(t){var n=!0;if(void 0!==e.permissions[e.block]&&void 0!==e.permissions[e.block][e.setting.name]){var o=t.name.toLowerCase();n=e.permissions[e.block][e.setting.name][o]}return d.createElement(k,{key:"key_"+e.block+"_"+e.setting.name+"_"+t.name.toLowerCase(),block:e.block,role:t.name,setting:e.setting.name,checkboxName:"atomic-blocks-settings[block_settings_permissions][".concat(e.block,"][").concat(e.setting.name,"][]"),checked:n,onClick:e.onClick})}),d.createElement("input",{type:"hidden",name:"atomic-blocks-settings[block_settings_permissions][".concat(e.block,"][").concat(e.setting.name,"][]"),"data-setting":"".concat(e.setting.name),"data-block":"".concat(e.block),value:"placeholder"}))},y=function(e){var t=p(b(e.allExpanded||e.isOpen),2),n=t[0],o=t[1];return f(function(){var t=e.allExpanded||e.isOpen;o(t)},[e.isOpen]),d.createElement("div",{key:"key_"+e.setting,className:r()("ab-control-settings-control-settings-entry",n?"ab-control-settings-entry-open":null)},d.createElement("div",{className:"ab-control-settings-block-setting"},e.setting.title),d.createElement("div",{className:"ab-control-settings-block-permission"},d.createElement(v,{roles:e.roles,permissions:e.permissions,setting:e.setting,block:e.block.name,onClick:e.onClick})),d.createElement("div",{onClick:function(){o(!n)},className:"ab-control-settings-block-toggle"},d.createElement("span",{className:r()("dashicons",n?"dashicons-arrow-up-alt2":"dashicons dashicons-arrow-down-alt2")})))},E=function(e){var t=p(b(e.isOpen),2),n=t[0],o=t[1];return f(function(){o(e.isOpen)},[e.isOpen]),d.createElement(d.Fragment,null,d.createElement("div",{className:"ab-control-settings-block"},d.createElement("div",null,e.block.title),d.createElement("div",{className:"ab-control-settings-entry-header"},d.createElement("span",null,g("Block Settings Permissions","atomic-blocks-pro"))),d.createElement("div",{onClick:function(){o(!n)},className:"ab-control-settings-block-toggle"},d.createElement("span",{className:r()("dashicons",n?"dashicons-arrow-up-alt2":"dashicons dashicons-arrow-down-alt2")}))),d.createElement("div",{className:r()("ab-control-settings-control-settings",n?"ab-control-settings-control-settings-open":null)},Object.keys(e.settings).map(function(t){return d.createElement(y,{key:"key_"+e.block.name+"_"+t,roles:e.roles,permissions:e.permissions,setting:{name:t,title:e.settings[t].title},block:e.block,onClick:e.onClick,isOpen:e.allExpanded,allExpanded:e.allExpanded})})))},h=function(e){return d.createElement("div",{className:"ab-control-settings-entry"},d.createElement(E,{roles:e.roles,settings:e.settings[e.block.name],permissions:e.permissions,block:e.block,onClick:e.onClick,isOpen:e.isOpen,allExpanded:e.allExpanded}))},_=function(e){return d.createElement("div",{className:"ab-control-settings-entries"},e.blocks.map(function(t){return d.createElement(h,{key:"key_"+t.name,settings:e.settings,roles:e.roles,block:t,onClick:e.onClick,permissions:e.permissions,isOpen:e.allExpanded,allExpanded:e.allExpanded})}))},O=function(e){function t(e){var n;return function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,t),(n=function(e,t){return!t||"object"!==a(t)&&"function"!=typeof t?c(e):t}(this,l(t).call(this,e))).state={permissions:e.permissions||{},allExpanded:!1},n.updatePermissionsState=n.updatePermissionsState.bind(c(n)),n}return function(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function");e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,writable:!0,configurable:!0}}),t&&u(e,t)}(t,m),function(e,t,n){t&&i(e.prototype,t),n&&i(e,n)}(t,[{key:"updatePermissionsState",value:function(e){var t=this.state.permissions;void 0===t[e.target.dataset.block]&&(t[e.target.dataset.block]={}),void 0===t[e.target.dataset.block][e.target.dataset.setting]&&(t[e.target.dataset.block][e.target.dataset.setting]={}),void 0===t[e.target.dataset.block][e.target.dataset.setting][e.target.value]&&(t[e.target.dataset.block][e.target.dataset.setting][e.target.value]={}),t[e.target.dataset.block][e.target.dataset.setting][e.target.value]=e.target.checked,this.setState({permissions:t})}},{key:"render",value:function(){var e=this;return d.createElement("div",{className:"ab-control-settings"},d.createElement("div",{className:"ab-control-settings-head"},d.createElement("div",null,g("Block Name","atomic-blocks-pro")),d.createElement("div",null),d.createElement("div",null,d.createElement("span",{onClick:function(){e.setState({allExpanded:!0})},className:r()("ab-control-settings-expand-all",this.state.allExpanded?"ab-hidden":null)},g("Expand All","atomic-blocks-pro")),d.createElement("span",{onClick:function(){e.setState({allExpanded:!1})},className:r()("ab-control-settings-collapse-all",this.state.allExpanded?"ab-visible":null)},g("Collapse All","atomic-blocks-pro")))),d.createElement(_,{settings:this.props.settings,roles:this.props.roles,blocks:this.props.blocks,onClick:function(t){e.updatePermissionsState(t)},permissions:this.state.permissions,allExpanded:this.state.allExpanded}))}}]),t}(),x=Object(o.get_registered_ab_blocks)();window.addEventListener("DOMContentLoaded",function(){var e=document.querySelector("#atomic-blocks-settings-block-settings-permissions");e&&ReactDOM.render(d.createElement(O,{blocks:x,settings:w(x),roles:Object(o.getAllRoles)(),permissions:Object(o.getBlockSettingsPermissions)()}),e)});var w=function(e){var t={};return Object.values(e).map(function(e){void 0!==e.ab_settings_data&&(t[e.name]=e.ab_settings_data)}),t}}});