/** Notice * This file contains works from many authors under various (but compatible) licenses. Please see core.txt for more information. **/
(function(){(window.wpCoreControlsBundle=window.wpCoreControlsBundle||[]).push([[4],{588:function(ya,ta,n){n.r(ta);var pa=n(0),na=n(610),oa=n(611),ka;(function(ja){ja[ja.EXTERNAL_XFDF_NOT_REQUESTED=0]="EXTERNAL_XFDF_NOT_REQUESTED";ja[ja.EXTERNAL_XFDF_NOT_AVAILABLE=1]="EXTERNAL_XFDF_NOT_AVAILABLE";ja[ja.EXTERNAL_XFDF_AVAILABLE=2]="EXTERNAL_XFDF_AVAILABLE"})(ka||(ka={}));ya=function(){function ja(fa){this.ba=fa;this.state=ka.EXTERNAL_XFDF_NOT_REQUESTED}ja.prototype.zxa=function(){var fa=this;return function(x,
y,r){return Object(pa.b)(fa,void 0,void 0,function(){var h,f,b,e,a,w,z,aa=this,ca;return Object(pa.d)(this,function(ba){switch(ba.label){case 0:if(this.state!==ka.EXTERNAL_XFDF_NOT_REQUESTED)return[3,2];h=this.ba.getDocument().by();return[4,this.mva(h)];case 1:f=ba.aa(),b=this.fpa(f),this.tS=null!==(ca=null===b||void 0===b?void 0:b.parse())&&void 0!==ca?ca:null,this.state=null===this.tS?ka.EXTERNAL_XFDF_NOT_AVAILABLE:ka.EXTERNAL_XFDF_AVAILABLE,ba.label=2;case 2:if(this.state===ka.EXTERNAL_XFDF_NOT_AVAILABLE)return r(x),
[2];e=new DOMParser;a=e.parseFromString(x,"text/xml");y.forEach(function(ha){aa.merge(a,aa.tS,ha-1)});w=new XMLSerializer;z=w.serializeToString(a);r(z);return[2]}})})}};ja.prototype.ZX=function(fa){this.mva=fa};ja.prototype.cg=function(){this.tS=void 0;this.state=ka.EXTERNAL_XFDF_NOT_REQUESTED};ja.prototype.fpa=function(fa){return fa?Array.isArray(fa)?new na.a(fa):"string"!==typeof fa?null:(new DOMParser).parseFromString(fa,"text/xml").querySelector("xfdf > add")?new na.a(fa):new oa.a(fa):null};ja.prototype.merge=
function(fa,x,y){var r=this;0===y&&(this.fBa(fa,x.Yt),this.hBa(fa,x.$R));var h=x.ea[y];h&&(this.iBa(fa,h.St),this.kBa(fa,h.Bfa,x.EC),this.jBa(fa,h.page,y),this.gBa(fa,h.U4));h=this.ba.Db();if(y===h-1){var f=x.EC;Object.keys(f).forEach(function(b){f[b].mU||r.f$(fa,b,f[b])})}};ja.prototype.fBa=function(fa,x){null!==x&&(fa=this.CB(fa),this.Av(fa,"calculation-order",x))};ja.prototype.hBa=function(fa,x){null!==x&&(fa=this.CB(fa),this.Av(fa,"document-actions",x))};ja.prototype.iBa=function(fa,x){var y=
this,r=this.BB(fa.querySelector("xfdf"),"annots");Object.keys(x).forEach(function(h){y.Av(r,'[name="'.concat(h,'"]'),x[h])})};ja.prototype.kBa=function(fa,x,y){var r=this;if(0!==x.length){var h=this.CB(fa);x.forEach(function(f){var b=f.getAttribute("field"),e=y[b];e&&(r.f$(fa,b,e),r.Av(h,"null",f))})}};ja.prototype.f$=function(fa,x,y){var r=this.CB(fa),h=r.querySelector('ffield[name="'.concat(x,'"]'));null!==y.XJ&&null===h&&this.Av(r,'ffield[name="'.concat(x,'"]'),y.XJ);fa=this.BB(fa.querySelector("xfdf"),
"xfdf > fields","fields");x=x.split(".");this.VW(fa,x,0,y.value);y.mU=!0};ja.prototype.jBa=function(fa,x,y){null!==x&&(fa=this.CB(fa),fa=this.BB(fa,"pages"),this.Av(fa,'[number="'.concat(y+1,'"]'),x))};ja.prototype.gBa=function(fa,x){Object.keys(x).forEach(function(y){(y=fa.querySelector('annots [name="'.concat(y,'"]')))&&y.parentElement.removeChild(y)})};ja.prototype.VW=function(fa,x,y,r){if(y===x.length)x=document.createElementNS("","value"),x.textContent=r,this.Av(fa,"value",x);else{var h=x[y];
this.BB(fa,'[name="'.concat(h,'"]'),"field").setAttribute("name",h);fa=fa.querySelectorAll('[name="'.concat(h,'"]'));1===fa.length?this.VW(fa[0],x,y+1,r):(h=this.yta(fa),this.VW(y===x.length-1?h:this.sKa(fa,h),x,y+1,r))}};ja.prototype.yta=function(fa){for(var x=null,y=0;y<fa.length;y++){var r=fa[y];if(0===r.childElementCount||1===r.childElementCount&&"value"===r.children[0].tagName){x=r;break}}return x};ja.prototype.sKa=function(fa,x){for(var y=0;y<fa.length;y++)if(fa[y]!==x)return fa[y];return null};
ja.prototype.Av=function(fa,x,y){x=fa.querySelector(x);null!==x&&fa.removeChild(x);fa.appendChild(y)};ja.prototype.CB=function(fa){var x=fa.querySelector("pdf-info");if(null!==x)return x;x=this.BB(fa.querySelector("xfdf"),"pdf-info");x.setAttribute("xmlns","http://www.pdftron.com/pdfinfo");x.setAttribute("version","2");x.setAttribute("import-version","4");return x};ja.prototype.BB=function(fa,x,y){var r=fa.querySelector(x);if(null!==r)return r;r=document.createElementNS("",y||x);fa.appendChild(r);
return r};return ja}();ta["default"]=ya},599:function(ya,ta){ya=function(){function n(){}n.prototype.iI=function(pa){var na={Yt:null,$R:null,EC:{},ea:{}};pa=(new DOMParser).parseFromString(pa,"text/xml");na.Yt=pa.querySelector("pdf-info calculation-order");na.$R=pa.querySelector("pdf-info document-actions");na.EC=this.HCa(pa);na.ea=this.VCa(pa);return na};n.prototype.HCa=function(pa){var na=pa.querySelector("fields");pa=pa.querySelectorAll("pdf-info > ffield");if(null===na&&null===pa)return{};var oa=
{};this.Gla(oa,na);this.Ela(oa,pa);return oa};n.prototype.Gla=function(pa,na){if(null!==na&&na.children){for(var oa=[],ka=0;ka<na.children.length;ka++){var ja=na.children[ka];oa.push({name:ja.getAttribute("name"),element:ja})}for(;0!==oa.length;)for(na=oa.shift(),ka=0;ka<na.element.children.length;ka++)ja=na.element.children[ka],"value"===ja.tagName?pa[na.name]={value:ja.textContent,XJ:null,mU:!1}:ja.children&&oa.push({name:"".concat(na.name,".").concat(ja.getAttribute("name")),element:ja})}};n.prototype.Ela=
function(pa,na){na.forEach(function(oa){var ka=oa.getAttribute("name");pa[ka]?pa[ka].XJ=oa:pa[ka]={value:null,XJ:oa,mU:!1}})};n.prototype.VCa=function(pa){var na=this,oa={};pa.querySelectorAll("pdf-info widget").forEach(function(ka){var ja=parseInt(ka.getAttribute("page"),10)-1;na.nL(oa,ja);oa[ja].Bfa.push(ka)});pa.querySelectorAll("pdf-info page").forEach(function(ka){var ja=parseInt(ka.getAttribute("number"),10)-1;na.nL(oa,ja);oa[ja].page=ka});this.W6(pa).forEach(function(ka){var ja=parseInt(ka.getAttribute("page"),
10),fa=ka.getAttribute("name");na.nL(oa,ja);oa[ja].St[fa]=ka});this.F6(pa).forEach(function(ka){var ja=parseInt(ka.getAttribute("page"),10);ka=ka.textContent;na.nL(oa,ja);oa[ja].U4[ka]=!0});return oa};n.prototype.nL=function(pa,na){pa[na]||(pa[na]={St:{},U4:{},Bfa:[],page:null})};return n}();ta.a=ya},610:function(ya,ta,n){var pa=n(0),na=n(1);n.n(na);ya=function(oa){function ka(ja){var fa=oa.call(this)||this;fa.hta=Array.isArray(ja)?ja:[ja];return fa}Object(pa.c)(ka,oa);ka.prototype.parse=function(){var ja=
this,fa={Yt:null,$R:null,EC:{},ea:{}};this.hta.forEach(function(x){fa=Object(na.merge)(fa,ja.iI(x))});return fa};ka.prototype.W6=function(ja){var fa=[];ja.querySelectorAll("add > *").forEach(function(x){fa.push(x)});ja.querySelectorAll("modify > *").forEach(function(x){fa.push(x)});return fa};ka.prototype.F6=function(ja){return ja.querySelectorAll("delete > *")};return ka}(n(599).a);ta.a=ya},611:function(ya,ta,n){var pa=n(0);ya=function(na){function oa(ka){var ja=na.call(this)||this;ja.ita=ka;return ja}
Object(pa.c)(oa,na);oa.prototype.parse=function(){return this.iI(this.ita)};oa.prototype.W6=function(ka){return ka.querySelectorAll("annots > *")};oa.prototype.F6=function(){return[]};return oa}(n(599).a);ta.a=ya}}]);}).call(this || window)
