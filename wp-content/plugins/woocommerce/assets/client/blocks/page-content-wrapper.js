(()=>{var e,t={6951:(e,t,o)=>{"use strict";o.r(t);var r=o(9196);const i=window.wp.blocks;var a=o(5736);const n=window.wp.blockEditor;var s=o(7255);const l=window.wc.wcSettings;var c,p,d,u,g,m,w,v,S,k;const b=(0,l.getSetting)("wcBlocksConfig",{buildPhase:1,pluginUrl:"",productCount:0,defaultAvatar:"",restApiRoutes:{},wordCountType:"words"}),f=(b.pluginUrl,b.pluginUrl,b.buildPhase,null===(c=l.STORE_PAGES.shop)||void 0===c||c.permalink,null===(p=l.STORE_PAGES.checkout)||void 0===p?void 0:p.id),O=(null===(d=l.STORE_PAGES.checkout)||void 0===d||d.permalink,null===(u=l.STORE_PAGES.privacy)||void 0===u||u.permalink,null===(g=l.STORE_PAGES.privacy)||void 0===g||g.title,null===(m=l.STORE_PAGES.terms)||void 0===m||m.permalink,null===(w=l.STORE_PAGES.terms)||void 0===w||w.title,null===(v=l.STORE_PAGES.cart)||void 0===v?void 0:v.id),E=(null===(S=l.STORE_PAGES.cart)||void 0===S||S.permalink,null!==(k=l.STORE_PAGES.myaccount)&&void 0!==k&&k.permalink?l.STORE_PAGES.myaccount.permalink:(0,l.getSetting)("wpLoginUrl","/wp-login.php"),(0,l.getSetting)("localPickupEnabled",!1),(0,l.getSetting)("countries",{})),y=(0,l.getSetting)("countryData",{}),h=(Object.fromEntries(Object.keys(y).filter((e=>!0===y[e].allowBilling)).map((e=>[e,E[e]||""]))),Object.fromEntries(Object.keys(y).filter((e=>!0===y[e].allowBilling)).map((e=>[e,y[e].states||[]]))),Object.fromEntries(Object.keys(y).filter((e=>!0===y[e].allowShipping)).map((e=>[e,E[e]||""]))),Object.fromEntries(Object.keys(y).filter((e=>!0===y[e].allowShipping)).map((e=>[e,y[e].states||[]]))),Object.fromEntries(Object.keys(y).map((e=>[e,y[e].locale||[]]))),{address:["first_name","last_name","company","address_1","address_2","city","postcode","country","state","phone"],contact:["email"],order:[]});(0,l.getSetting)("addressFieldsLocations",h).address,(0,l.getSetting)("addressFieldsLocations",h).contact,(0,l.getSetting)("addressFieldsLocations",h).order,(0,l.getSetting)("additionalOrderFields",{}),(0,l.getSetting)("additionalContactFields",{}),(0,l.getSetting)("additionalAddressFields",{});var _=o(9307);const P=JSON.parse('{"name":"woocommerce/page-content-wrapper","version":"1.0.0","title":"WooCommerce Page","description":"Displays WooCommerce page content.","category":"woocommerce","keywords":["WooCommerce"],"textdomain":"woocommerce","supports":{"html":false,"multiple":false,"inserter":false},"attributes":{"page":{"type":"string","default":""}},"providesContext":{"postId":"postId","postType":"postType"},"apiVersion":2,"$schema":"https://schemas.wp.org/trunk/block.json"}');o(1889),(0,i.registerBlockType)(P,{icon:{src:s.Z},edit:({attributes:e,setAttributes:t})=>{const o=(0,n.useBlockProps)({className:"wp-block-woocommerce-page-content-wrapper"});return(0,_.useEffect)((()=>{if(!e.postId&&e.page){let o=0;"checkout"===e.page&&(o=f),"cart"===e.page&&(o=O),o&&t({postId:o,postType:"page"})}}),[e,t]),(0,r.createElement)("div",{...o},(0,r.createElement)(n.InnerBlocks,{template:[["core/post-title",{align:"wide",level:1}],["core/post-content",{align:"wide"}]]}))},save:()=>(0,r.createElement)(n.InnerBlocks.Content,null),variations:[{name:"checkout-page",title:(0,a.__)("Checkout Page","woocommerce"),attributes:{page:"checkout"},isActive:(e,t)=>e.page===t.page},{name:"cart-page",title:(0,a.__)("Cart Page","woocommerce"),attributes:{page:"cart"},isActive:(e,t)=>e.page===t.page}]})},1889:()=>{},9196:e=>{"use strict";e.exports=window.React},9307:e=>{"use strict";e.exports=window.wp.element},5736:e=>{"use strict";e.exports=window.wp.i18n},444:e=>{"use strict";e.exports=window.wp.primitives}},o={};function r(e){var i=o[e];if(void 0!==i)return i.exports;var a=o[e]={exports:{}};return t[e].call(a.exports,a,a.exports,r),a.exports}r.m=t,e=[],r.O=(t,o,i,a)=>{if(!o){var n=1/0;for(p=0;p<e.length;p++){for(var[o,i,a]=e[p],s=!0,l=0;l<o.length;l++)(!1&a||n>=a)&&Object.keys(r.O).every((e=>r.O[e](o[l])))?o.splice(l--,1):(s=!1,a<n&&(n=a));if(s){e.splice(p--,1);var c=i();void 0!==c&&(t=c)}}return t}a=a||0;for(var p=e.length;p>0&&e[p-1][2]>a;p--)e[p]=e[p-1];e[p]=[o,i,a]},r.n=e=>{var t=e&&e.__esModule?()=>e.default:()=>e;return r.d(t,{a:t}),t},r.d=(e,t)=>{for(var o in t)r.o(t,o)&&!r.o(e,o)&&Object.defineProperty(e,o,{enumerable:!0,get:t[o]})},r.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t),r.r=e=>{"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},r.j=6413,(()=>{var e={6413:0};r.O.j=t=>0===e[t];var t=(t,o)=>{var i,a,[n,s,l]=o,c=0;if(n.some((t=>0!==e[t]))){for(i in s)r.o(s,i)&&(r.m[i]=s[i]);if(l)var p=l(r)}for(t&&t(o);c<n.length;c++)a=n[c],r.o(e,a)&&e[a]&&e[a][0](),e[a]=0;return r.O(p)},o=self.webpackChunkwebpackWcBlocksMainJsonp=self.webpackChunkwebpackWcBlocksMainJsonp||[];o.forEach(t.bind(null,0)),o.push=t.bind(null,o.push.bind(o))})();var i=r.O(void 0,[2869],(()=>r(6951)));i=r.O(i),((this.wc=this.wc||{}).blocks=this.wc.blocks||{})["page-content-wrapper"]=i})();