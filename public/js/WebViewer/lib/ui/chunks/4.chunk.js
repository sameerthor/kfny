(window.webpackJsonp=window.webpackJsonp||[]).push([[4],{1435:function(e,t,n){"use strict";n.d(t,"b",(function(){return y}));n(16),n(41),n(46),n(51),n(35),n(27),n(28),n(11),n(13),n(8),n(25),n(22),n(34),n(32),n(54),n(23),n(24),n(57),n(55),n(59),n(14),n(10),n(9),n(12),n(64),n(65),n(66),n(67),n(37),n(39),n(15),n(40),n(63);var r=n(0),o=n(6),i=n(2),a=n(4),l=n.n(a);function c(e){return(c="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}function u(){/*! regenerator-runtime -- Copyright (c) 2014-present, Facebook, Inc. -- license (MIT): https://github.com/facebook/regenerator/blob/main/LICENSE */u=function(){return e};var e={},t=Object.prototype,n=t.hasOwnProperty,r=Object.defineProperty||function(e,t,n){e[t]=n.value},o="function"==typeof Symbol?Symbol:{},i=o.iterator||"@@iterator",a=o.asyncIterator||"@@asyncIterator",l=o.toStringTag||"@@toStringTag";function s(e,t,n){return Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}),e[t]}try{s({},"")}catch(e){s=function(e,t,n){return e[t]=n}}function p(e,t,n,o){var i=t&&t.prototype instanceof h?t:h,a=Object.create(i.prototype),l=new S(o||[]);return r(a,"_invoke",{value:O(e,n,l)}),a}function d(e,t,n){try{return{type:"normal",arg:e.call(t,n)}}catch(e){return{type:"throw",arg:e}}}e.wrap=p;var f={};function h(){}function m(){}function y(){}var v={};s(v,i,(function(){return this}));var g=Object.getPrototypeOf,b=g&&g(g(N([])));b&&b!==t&&n.call(b,i)&&(v=b);var w=y.prototype=h.prototype=Object.create(v);function E(e){["next","throw","return"].forEach((function(t){s(e,t,(function(e){return this._invoke(t,e)}))}))}function x(e,t){var o;r(this,"_invoke",{value:function(r,i){function a(){return new t((function(o,a){!function r(o,i,a,l){var u=d(e[o],e,i);if("throw"!==u.type){var s=u.arg,p=s.value;return p&&"object"==c(p)&&n.call(p,"__await")?t.resolve(p.__await).then((function(e){r("next",e,a,l)}),(function(e){r("throw",e,a,l)})):t.resolve(p).then((function(e){s.value=e,a(s)}),(function(e){return r("throw",e,a,l)}))}l(u.arg)}(r,i,o,a)}))}return o=o?o.then(a,a):a()}})}function O(e,t,n){var r="suspendedStart";return function(o,i){if("executing"===r)throw new Error("Generator is already running");if("completed"===r){if("throw"===o)throw i;return D()}for(n.method=o,n.arg=i;;){var a=n.delegate;if(a){var l=L(a,n);if(l){if(l===f)continue;return l}}if("next"===n.method)n.sent=n._sent=n.arg;else if("throw"===n.method){if("suspendedStart"===r)throw r="completed",n.arg;n.dispatchException(n.arg)}else"return"===n.method&&n.abrupt("return",n.arg);r="executing";var c=d(e,t,n);if("normal"===c.type){if(r=n.done?"completed":"suspendedYield",c.arg===f)continue;return{value:c.arg,done:n.done}}"throw"===c.type&&(r="completed",n.method="throw",n.arg=c.arg)}}}function L(e,t){var n=t.method,r=e.iterator[n];if(void 0===r)return t.delegate=null,"throw"===n&&e.iterator.return&&(t.method="return",t.arg=void 0,L(e,t),"throw"===t.method)||"return"!==n&&(t.method="throw",t.arg=new TypeError("The iterator does not provide a '"+n+"' method")),f;var o=d(r,e.iterator,t.arg);if("throw"===o.type)return t.method="throw",t.arg=o.arg,t.delegate=null,f;var i=o.arg;return i?i.done?(t[e.resultName]=i.value,t.next=e.nextLoc,"return"!==t.method&&(t.method="next",t.arg=void 0),t.delegate=null,f):i:(t.method="throw",t.arg=new TypeError("iterator result is not an object"),t.delegate=null,f)}function k(e){var t={tryLoc:e[0]};1 in e&&(t.catchLoc=e[1]),2 in e&&(t.finallyLoc=e[2],t.afterLoc=e[3]),this.tryEntries.push(t)}function j(e){var t=e.completion||{};t.type="normal",delete t.arg,e.completion=t}function S(e){this.tryEntries=[{tryLoc:"root"}],e.forEach(k,this),this.reset(!0)}function N(e){if(e){var t=e[i];if(t)return t.call(e);if("function"==typeof e.next)return e;if(!isNaN(e.length)){var r=-1,o=function t(){for(;++r<e.length;)if(n.call(e,r))return t.value=e[r],t.done=!1,t;return t.value=void 0,t.done=!0,t};return o.next=o}}return{next:D}}function D(){return{value:void 0,done:!0}}return m.prototype=y,r(w,"constructor",{value:y,configurable:!0}),r(y,"constructor",{value:m,configurable:!0}),m.displayName=s(y,l,"GeneratorFunction"),e.isGeneratorFunction=function(e){var t="function"==typeof e&&e.constructor;return!!t&&(t===m||"GeneratorFunction"===(t.displayName||t.name))},e.mark=function(e){return Object.setPrototypeOf?Object.setPrototypeOf(e,y):(e.__proto__=y,s(e,l,"GeneratorFunction")),e.prototype=Object.create(w),e},e.awrap=function(e){return{__await:e}},E(x.prototype),s(x.prototype,a,(function(){return this})),e.AsyncIterator=x,e.async=function(t,n,r,o,i){void 0===i&&(i=Promise);var a=new x(p(t,n,r,o),i);return e.isGeneratorFunction(n)?a:a.next().then((function(e){return e.done?e.value:a.next()}))},E(w),s(w,l,"Generator"),s(w,i,(function(){return this})),s(w,"toString",(function(){return"[object Generator]"})),e.keys=function(e){var t=Object(e),n=[];for(var r in t)n.push(r);return n.reverse(),function e(){for(;n.length;){var r=n.pop();if(r in t)return e.value=r,e.done=!1,e}return e.done=!0,e}},e.values=N,S.prototype={constructor:S,reset:function(e){if(this.prev=0,this.next=0,this.sent=this._sent=void 0,this.done=!1,this.delegate=null,this.method="next",this.arg=void 0,this.tryEntries.forEach(j),!e)for(var t in this)"t"===t.charAt(0)&&n.call(this,t)&&!isNaN(+t.slice(1))&&(this[t]=void 0)},stop:function(){this.done=!0;var e=this.tryEntries[0].completion;if("throw"===e.type)throw e.arg;return this.rval},dispatchException:function(e){if(this.done)throw e;var t=this;function r(n,r){return a.type="throw",a.arg=e,t.next=n,r&&(t.method="next",t.arg=void 0),!!r}for(var o=this.tryEntries.length-1;o>=0;--o){var i=this.tryEntries[o],a=i.completion;if("root"===i.tryLoc)return r("end");if(i.tryLoc<=this.prev){var l=n.call(i,"catchLoc"),c=n.call(i,"finallyLoc");if(l&&c){if(this.prev<i.catchLoc)return r(i.catchLoc,!0);if(this.prev<i.finallyLoc)return r(i.finallyLoc)}else if(l){if(this.prev<i.catchLoc)return r(i.catchLoc,!0)}else{if(!c)throw new Error("try statement without catch or finally");if(this.prev<i.finallyLoc)return r(i.finallyLoc)}}}},abrupt:function(e,t){for(var r=this.tryEntries.length-1;r>=0;--r){var o=this.tryEntries[r];if(o.tryLoc<=this.prev&&n.call(o,"finallyLoc")&&this.prev<o.finallyLoc){var i=o;break}}i&&("break"===e||"continue"===e)&&i.tryLoc<=t&&t<=i.finallyLoc&&(i=null);var a=i?i.completion:{};return a.type=e,a.arg=t,i?(this.method="next",this.next=i.finallyLoc,f):this.complete(a)},complete:function(e,t){if("throw"===e.type)throw e.arg;return"break"===e.type||"continue"===e.type?this.next=e.arg:"return"===e.type?(this.rval=this.arg=e.arg,this.method="return",this.next="end"):"normal"===e.type&&t&&(this.next=t),f},finish:function(e){for(var t=this.tryEntries.length-1;t>=0;--t){var n=this.tryEntries[t];if(n.finallyLoc===e)return this.complete(n.completion,n.afterLoc),j(n),f}},catch:function(e){for(var t=this.tryEntries.length-1;t>=0;--t){var n=this.tryEntries[t];if(n.tryLoc===e){var r=n.completion;if("throw"===r.type){var o=r.arg;j(n)}return o}}throw new Error("illegal catch attempt")},delegateYield:function(e,t,n){return this.delegate={iterator:N(e),resultName:t,nextLoc:n},"next"===this.method&&(this.arg=void 0),f}},e}function s(e,t,n,r,o,i,a){try{var l=e[i](a),c=l.value}catch(e){return void n(e)}l.done?t(c):Promise.resolve(c).then(r,o)}function p(e){return function(){var t=this,n=arguments;return new Promise((function(r,o){var i=e.apply(t,n);function a(e){s(i,r,o,a,l,"next",e)}function l(e){s(i,r,o,a,l,"throw",e)}a(void 0)}))}}function d(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(e);t&&(r=r.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,r)}return n}function f(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?d(Object(n),!0).forEach((function(t){h(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):d(Object(n)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}function h(e,t,n){return(t=function(e){var t=function(e,t){if("object"!==c(e)||null===e)return e;var n=e[Symbol.toPrimitive];if(void 0!==n){var r=n.call(e,t||"default");if("object"!==c(r))return r;throw new TypeError("@@toPrimitive must return a primitive value.")}return("string"===t?String:Number)(e)}(e,"string");return"symbol"===c(t)?t:String(t)}(t))in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}var m=function(e,t,n){return{icon:t,label:n,title:n,option:e,dataElement:"".concat(e[0].toUpperCase()+e.slice(1),"Button")}},y={OPENFILE:"openFile",RENAME:"rename",SETDEST:"setDestination",DOWNLOAD:"download",DELETE:"delete",OPENFORMFIELDPANEL:"openFormFieldPanel",MOVE_UP:"moveUp",MOVE_DOWN:"moveDown",MOVE_LEFT:"moveLeft",MOVE_RIGHT:"moveRight"},v=[m(y.OPENFORMFIELDPANEL,"icon-edit-form-field","action.edit"),m(y.OPENFILE,"icon-portfolio-file","portfolio.openFile"),m(y.RENAME,"ic_edit_page_24px","action.rename"),m(y.SETDEST,"icon-thumbtack","action.setDestination"),m(y.DOWNLOAD,"icon-download","action.download"),m(y.DELETE,"icon-delete-line","action.delete"),m(y.MOVE_UP,"icon-page-move-up","action.moveUp"),m(y.MOVE_DOWN,"icon-page-move-down","action.moveDown"),m(y.MOVE_LEFT,"icon-page-move-left","action.moveLeft"),m(y.MOVE_RIGHT,"icon-page-move-right","action.moveRight")],g=function(e){var t=e.type,n=e.handleOnClick,a=e.currentFlyout,l=e.flyoutSelector,c=e.shouldHideDeleteButton,s=Object(o.d)();return Object(r.useLayoutEffect)((function(){var e={dataElement:l,className:"MoreOptionsContextMenuFlyout",items:v.map((function(e){var r=e.option,o=!1;return r===y.DELETE&&(o=c),[y.DOWNLOAD,y.OPENFILE].includes(r)&&(o="portfolio"!==t),r===y.SETDEST&&(o="outline"!==t),r===y.OPENFORMFIELDPANEL&&(o=["portfolio","bookmark"].includes(t)),[y.MOVE_UP,y.MOVE_DOWN].includes(r)&&(o=!["portfolio"].includes(t)),[y.MOVE_LEFT,y.MOVE_RIGHT,y.MOVE_UP,y.MOVE_DOWN].includes(r)&&(o="outline"!==t),f(f({},e),{},{hidden:o,dataElement:"".concat(t).concat(e.dataElement),onClick:function(){return n(e.option)}})}))};function r(){return(r=p(u().mark((function t(){return u().wrap((function(t){for(;;)switch(t.prev=t.next){case 0:s(a?i.a.updateFlyout(e.dataElement,e):i.a.addFlyout(e));case 1:case"end":return t.stop()}}),t)})))).apply(this,arguments)}!function(){r.apply(this,arguments)}()}),[]),null};g.propTypes={type:l.a.oneOf(["bookmark","outline","portfolio","indexPanel","indexPanel.folder"]).isRequired,handleOnClick:l.a.func,currentFlyout:l.a.object,flyoutSelector:l.a.string,shouldHideDeleteButton:l.a.bool},t.a=g},1490:function(e,t,n){"use strict";n(41),n(11),n(13),n(35),n(19),n(8),n(14),n(10),n(9),n(12),n(16),n(15),n(20),n(17);var r=n(0),o=n.n(r),i=n(4),a=n.n(i),l=n(18),c=n.n(l),u=n(396),s=n(104),p=n(43),d=n(1262),f=n(1435).a,h=n(42);n(1553);function m(e,t){return function(e){if(Array.isArray(e))return e}(e)||function(e,t){var n=null==e?null:"undefined"!=typeof Symbol&&e[Symbol.iterator]||e["@@iterator"];if(null!=n){var r,o,i,a,l=[],c=!0,u=!1;try{if(i=(n=n.call(e)).next,0===t){if(Object(n)!==n)return;c=!1}else for(;!(c=(r=i.call(n)).done)&&(l.push(r.value),l.length!==t);c=!0);}catch(e){u=!0,o=e}finally{try{if(!c&&null!=n.return&&(a=n.return(),Object(a)!==a))return}finally{if(u)throw o}}return l}}(e,t)||function(e,t){if(!e)return;if("string"==typeof e)return y(e,t);var n=Object.prototype.toString.call(e).slice(8,-1);"Object"===n&&e.constructor&&(n=e.constructor.name);if("Map"===n||"Set"===n)return Array.from(e);if("Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n))return y(e,t)}(e,t)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function y(e,t){(null==t||t>e.length)&&(t=e.length);for(var n=0,r=new Array(t);n<t;n++)r[n]=e[n];return r}var v=function(e,t){var n=m(Object(r.useState)(1),2),o=n[0],i=n[1];return Object(r.useEffect)((function(){for(var n=-1,r=null==e?void 0:e.current;r;)n++,r=r.parentElement.closest(t);i(n)}),[e]),o};function g(e,t){return function(e){if(Array.isArray(e))return e}(e)||function(e,t){var n=null==e?null:"undefined"!=typeof Symbol&&e[Symbol.iterator]||e["@@iterator"];if(null!=n){var r,o,i,a,l=[],c=!0,u=!1;try{if(i=(n=n.call(e)).next,0===t){if(Object(n)!==n)return;c=!1}else for(;!(c=(r=i.call(n)).done)&&(l.push(r.value),l.length!==t);c=!0);}catch(e){u=!0,o=e}finally{try{if(!c&&null!=n.return&&(a=n.return(),Object(a)!==a))return}finally{if(u)throw o}}return l}}(e,t)||function(e,t){if(!e)return;if("string"==typeof e)return b(e,t);var n=Object.prototype.toString.call(e).slice(8,-1);"Object"===n&&e.constructor&&(n=e.constructor.name);if("Map"===n||"Set"===n)return Array.from(e);if("Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n))return b(e,t)}(e,t)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function b(e,t){(null==t||t>e.length)&&(t=e.length);for(var n=0,r=new Array(t);n<t;n++)r[n]=e[n];return r}var w=function(e){var t=e.children;return t&&0!==t.length?o.a.createElement("ul",{className:"panel-list-children"},t.map((function(e,t){return o.a.createElement("li",{key:t},e)}))):null};w.propTypes={children:a.a.oneOfType([a.a.arrayOf(a.a.node),a.a.node])};var E=o.a.memo((function(e){var t=e.iconGlyph,n=e.labelHeader,r=e.onDoubleClick,i=e.onClick,a=e.useI18String,l=e.textColor,u=e.isActive;return o.a.createElement(o.a.Fragment,null,t&&o.a.createElement("div",{className:"panel-list-icon-container"},o.a.createElement(h.a,{glyph:t})),o.a.createElement("div",{className:"panel-list-text-container"},o.a.createElement("div",{className:"panel-list-label-header"},o.a.createElement(p.a,{style:{color:l||"inherit"},ariaLabel:n,label:n,onDoubleClick:r,onClick:i,className:c()({"set-focus":u}),useI18String:a}))))}));E.displayName="PanelItemContent",E.propTypes={iconGlyph:a.a.string,labelHeader:a.a.string.isRequired,onDoubleClick:a.a.func,onClick:a.a.func,useI18String:a.a.bool,textColor:a.a.string,isActive:a.a.bool};var x=function(e){var t=e.checkboxOptions,n=e.children,i=e.contentMenuFlyoutOptions,a=void 0===i?{}:i,l=e.contextMenuMoreButtonOptions,h=void 0===l?{}:l,m=e.description,y=e.enableMoreOptionsContextMenuFlyout,b=e.iconGlyph,x=e.labelHeader,O=e.useI18String,L=void 0===O||O,k=e.onDoubleClick,j=void 0===k?function(){}:k,S=e.onClick,N=void 0===S?function(){}:S,D=e.expanded,C=e.setIsExpandedHandler,P=e.textColor,M=e.isActive,F=Object(r.useRef)(),_=v(F),T=g(Object(r.useState)(null!=D&&D),2),I=T[0],A=T[1],B=Object(u.a)().t,R=a.shouldHideDeleteButton,H=void 0!==R&&R,G=a.currentFlyout,V=a.flyoutSelector,U=a.type,W=a.handleOnClick,q=h.flyoutToggleElement,z=h.moreOptionsDataElement,J=t&&!t.disabled||!1;return o.a.createElement("div",{"data-element":"panelListItem",className:"panel-list-item",ref:F},o.a.createElement("div",{className:c()({"panel-list-grid":!0,"grid-with-2-rows":m,"grid-with-1-row":!m,"grid-with-3-columns":!b&&!t,"grid-with-4-columns":b||t,"grid-with-5-columns":b&&t})},o.a.createElement("div",{className:c()("panel-list-row".concat(t?" with-checkbox":""),"focusable-container")},J&&o.a.createElement("div",{style:{"--checkbox-left":"".concat(-32*_+4,"px")},className:"checkbox"},o.a.createElement(d.a,{role:"checkbox",id:null==t?void 0:t.id,"aria-label":null==t?void 0:t.ariaLabel,"aria-checked":null==t?void 0:t.checked,checked:null==t?void 0:t.checked,onChange:null==t?void 0:t.onChange})),o.a.createElement("div",{onClick:function(){A(!I),C&&C(!I)},className:c()({"chevron-container":!0,toggled:I,visible:n&&n.length>0})},o.a.createElement(p.a,{img:"icon-chevron-right",className:"panel-list-button",ariaExpanded:I,ariaLabel:"".concat(B(I?"action.collapse":"action.expand")," ").concat(x)})),o.a.createElement(E,{iconGlyph:b,labelHeader:x,onDoubleClick:j,onClick:N,useI18String:L,textColor:P,isActive:M}),y&&o.a.createElement("div",{className:"panel-list-more-options"},o.a.createElement(s.a,{className:"toggle-more-button",title:"".concat(B("option.searchPanel.moreOptions")," ").concat(x),toggleElement:q,dataElement:z,img:"icon-tool-more",disabled:!1}),o.a.createElement(f,{type:U,shouldHideDeleteButton:H,currentFlyout:G,flyoutSelector:V,handleOnClick:W}))),m&&o.a.createElement("div",{className:"panel-list-description"},m)),I&&o.a.createElement(w,null,n))};x.propTypes={checkboxOptions:a.a.shape({id:a.a.string,checked:a.a.bool,onChange:a.a.func,ariaLabel:a.a.string,disabled:a.a.bool}),useI18String:a.a.bool,iconGlyph:a.a.string,labelHeader:a.a.string.isRequired,description:a.a.string,enableMoreOptionsContextMenuFlyout:a.a.bool,children:a.a.node,onDoubleClick:a.a.func,onClick:a.a.func,expanded:a.a.bool,textColor:a.a.string,setIsExpandedHandler:a.a.func,contentMenuFlyoutOptions:a.a.shape({shouldHideDeleteButton:a.a.bool,currentFlyout:a.a.object,flyoutSelector:a.a.string,type:a.a.string,handleOnClick:a.a.func}),contextMenuMoreButtonOptions:a.a.shape({flyoutToggleElement:a.a.string,moreOptionsDataElement:a.a.string}),isActive:a.a.bool};t.a=x},1553:function(e,t,n){var r=n(29),o=n(1554);"string"==typeof(o=o.__esModule?o.default:o)&&(o=[[e.i,o,""]]);var i={insert:function(e){if(!window.isApryseWebViewerWebComponent)return void document.head.appendChild(e);let t;t=document.getElementsByTagName("apryse-webviewer"),t.length||(t=function e(t,n=document){const r=[];return n.querySelectorAll(t).forEach(e=>r.push(e)),n.querySelectorAll("*").forEach(n=>{n.shadowRoot&&r.push(...e(t,n.shadowRoot))}),r}("apryse-webviewer"));const n=[];for(let r=0;r<t.length;r++){const o=t[r];if(0===r)o.shadowRoot.appendChild(e),e.onload=function(){n.length>0&&n.forEach(t=>{t.innerHTML=e.innerHTML})};else{const t=e.cloneNode(!0);o.shadowRoot.appendChild(t),n.push(t)}}},singleton:!1};r(o,i);e.exports=o.locals||{}},1554:function(e,t,n){(e.exports=n(30)(!1)).push([e.i,'.panel-list-item{width:100%;display:flex;flex-direction:column;position:relative;box-sizing:border-box;list-style-type:none}.panel-list-item ul{list-style-type:none;margin:0}.panel-list-item li::marker{content:"";margin:0}.panel-list-grid{display:grid;align-items:center;grid-column-gap:8px;-moz-column-gap:8px;column-gap:8px;margin-top:8px;margin-bottom:8px}.panel-list-grid.grid-with-1-row{grid-template-rows:auto}.panel-list-grid.grid-with-2-rows{grid-template-rows:auto auto}.panel-list-grid.grid-with-3-columns{grid-template-columns:auto minmax(0,1fr) auto}.panel-list-grid.grid-with-4-columns{grid-template-columns:auto auto minmax(0,1fr) auto}.panel-list-grid.grid-with-5-columns{grid-template-columns:auto auto auto minmax(0,1fr) auto}.panel-list-grid:hover .panel-list-more-options,.panel-list-grid[focus-within] .panel-list-more-options{visibility:visible}.panel-list-grid:focus-within .panel-list-more-options,.panel-list-grid:hover .panel-list-more-options{visibility:visible}.panel-list-row{display:contents}.panel-list-row.with-checkbox{padding-left:32px}.panel-list-row .checkbox{margin:0;position:relative;left:0;left:var(--checkbox-left,0)}.panel-list-row .chevron-container{min-width:24px;transition:transform .1s ease;visibility:hidden}.panel-list-row .chevron-container.toggled{transform:rotate(90deg)}.panel-list-row .chevron-container.visible{visibility:visible}.panel-list-row .chevron-container:hover{cursor:pointer;border:none;border-radius:4px;box-shadow:inset 0 0 0 1px var(--blue-6);color:var(--blue-6);background-color:var(--faded-component-background)}.panel-list-row .chevron-container .Button{width:24px;height:24px}.panel-list-row .chevron-container .Button .Icon{width:12px;height:12px}.panel-list-row .panel-list-icon-container .Icon{width:24px;height:24px}.panel-list-row .panel-list-text-container{grid-area:1/-3/auto/-2;display:flex;flex-direction:row;height:24px}.panel-list-row .panel-list-text-container .panel-list-label-header{align-content:center;margin:0;width:100%}.panel-list-row .panel-list-text-container .panel-list-label-header .set-focus{color:#2c73ab}.panel-list-row .panel-list-text-container .panel-list-label-header .Button{display:flex;width:auto;max-width:100%;height:100%;padding:2px 0 2px 4px;justify-content:start}.panel-list-row .panel-list-text-container .panel-list-label-header .Button:focus{color:#2c73ab}.panel-list-row .panel-list-text-container .panel-list-label-header .Button:hover{cursor:pointer;border:none;border-radius:4px;box-shadow:unset;color:var(--blue-6)}.panel-list-row .panel-list-text-container .panel-list-label-header .Button span{overflow:hidden;text-overflow:ellipsis;white-space:nowrap;display:inline-block;flex-grow:1}.panel-list-row .panel-list-more-options{grid-area:1/-2/auto/-1;display:flex;justify-content:flex-end;margin-left:2px;visibility:hidden}.panel-list-row .panel-list-more-options .Button{width:24px;height:24px;min-width:24px}.panel-list-row .panel-list-more-options .Button:focus{color:var(--blue-6)}.panel-list-row .panel-list-more-options .Button .Icon{width:12px;height:12px}.panel-list-description{grid-area:2/-3/auto/-2;display:flex;align-items:center;text-overflow:ellipsis;white-space:nowrap;overflow:hidden;padding:2px 0 2px 4px;height:24px}.panel-list-children{padding-left:32px}',""])}}]);
//# sourceMappingURL=4.chunk.js.map