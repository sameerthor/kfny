/** Notice * This file contains works from many authors under various (but compatible) licenses. Please see core.txt for more information. **/
(function(){(window.wpCoreControlsBundle=window.wpCoreControlsBundle||[]).push([[21],{591:function(ya,ta,n){n.r(ta);var pa=n(0),na=n(7),oa=n(3);ya=n(61);var ka=n(34),ja=n(17);n=function(){function fa(){this.init()}fa.prototype.init=function(){this.koa=!1;this.Mg=this.bp=this.connection=null;this.pl={};this.ga=this.gO=null};fa.prototype.$N=function(x){for(var y=this,r=0;r<x.length;++r){var h=x[r];switch(h.at){case "create":this.pl[h.author]||(this.pl[h.author]=h.aName);this.uya(h);break;case "modify":this.ga.qs(h.xfdf).then(function(f){y.ga.Eb(f[0])});
break;case "delete":h="<delete><id>".concat(h.aId,"</id></delete>"),this.ga.qs(h)}}};fa.prototype.uya=function(x){var y=this;this.ga.qs(x.xfdf).then(function(r){r=r[0];r.authorId=x.author;y.ga.Eb(r);y.ga.trigger(na.c.UPDATE_ANNOTATION_PERMISSION,[r])})};fa.prototype.Hxa=function(x,y,r){this.bp&&this.bp(x,y,r)};fa.prototype.preloadAnnotations=function(x){this.addEventListener("webViewerServerAnnotationsEnabled",this.Hxa.bind(this,x,"add",{imported:!1}),{once:!0})};fa.prototype.initiateCollaboration=
function(x,y,r){var h=this;if(x){h.Mg=y;h.ga=r.ka();r.addEventListener(na.h.DOCUMENT_UNLOADED,function(){h.disableCollaboration()});h.NLa(x);var f=new XMLHttpRequest;f.addEventListener("load",function(){if(200===f.status&&0<f.responseText.length)try{var b=JSON.parse(f.responseText);h.connection=exports.da.bNa(Object(ka.k)(h.Mg,"blackbox/"),"annot");h.gO=b.id;h.pl[b.id]=b.user_name;h.ga.VX(b.id);h.connection.KQa(function(e){e.t&&e.t.startsWith("a_")&&e.data&&h.$N(e.data)},function(){h.connection.send({t:"a_retrieve",
dId:x});h.trigger(fa.Events.WEBVIEWER_SERVER_ANNOTATIONS_ENABLED,[h.pl[b.id],h.gO])},function(){h.disableCollaboration()})}catch(e){Object(oa.f)(e.message)}});f.open("GET",Object(ka.k)(this.Mg,"demo/SessionInfo.jsp"));f.withCredentials=!0;f.send();h.koa=!0;h.ga.Vca(function(b){return h.pl[b.Author]||b.Author})}else Object(oa.f)("Document ID required for collaboration")};fa.prototype.disableCollaboration=function(){this.bp&&(this.ga.removeEventListener(ja.a.Events.ANNOTATION_CHANGED,this.bp),this.bp=
null);this.connection&&this.connection.wu();this.ga&&this.ga.VX("Guest");this.init();this.trigger(fa.Events.WEBVIEWER_SERVER_ANNOTATIONS_DISABLED)};fa.prototype.NLa=function(x){var y=this;this.bp&&this.ga.removeEventListener(ja.a.Events.ANNOTATION_CHANGED,this.bp);this.bp=function(r,h,f){return Object(pa.b)(this,void 0,void 0,function(){var b,e,a,w,z,aa,ca,ba,ha;return Object(pa.d)(this,function(ea){switch(ea.label){case 0:if(f.imported)return[2];b={t:"a_".concat(h),dId:x,annots:[]};return[4,y.ga.E5()];
case 1:e=ea.aa();"delete"!==h&&(a=(new DOMParser).parseFromString(e,"text/xml"),w=new XMLSerializer);for(z=0;z<r.length;z++)aa=r[z],ba=ca=void 0,"add"===h?(ca=a.querySelector('[name="'.concat(aa.Id,'"]')),ba=w.serializeToString(ca),ha=null,aa.InReplyTo&&(ha=y.ga.yi(aa.InReplyTo).authorId||"default"),b.annots.push({at:"create",aId:aa.Id,author:y.gO,aName:y.pl[y.gO],parent:ha,xfdf:"<add>".concat(ba,"</add>")})):"modify"===h?(ca=a.querySelector('[name="'.concat(aa.Id,'"]')),ba=w.serializeToString(ca),
b.annots.push({at:"modify",aId:aa.Id,xfdf:"<modify>".concat(ba,"</modify>")})):"delete"===h&&b.annots.push({at:"delete",aId:aa.Id});0<b.annots.length&&y.connection.send(b);return[2]}})})}.bind(y);this.ga.addEventListener(ja.a.Events.ANNOTATION_CHANGED,this.bp)};fa.Events={WEBVIEWER_SERVER_ANNOTATIONS_ENABLED:"webViewerServerAnnotationsEnabled",WEBVIEWER_SERVER_ANNOTATIONS_DISABLED:"webViewerServerAnnotationsDisabled"};return fa}();Object(ya.a)(n);ta["default"]=n}}]);}).call(this || window)
