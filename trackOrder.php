
<?php 
session_start();
require_once('admin/query.php');
if (!isset($_SESSION['user'])) {
	echo "<script>window.location.href='login.php';</script>";
}else{
	$orders=$QueryFire->getAllData('orders',' user_id='.$_SESSION['user']['id'].' ORDER BY id desc');

}
	

?>

<!DOCTYPE html>
<html lang="en-US" prefix="og: https://ogp.me/ns#">

<head>
	<meta charset="UTF-8">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="pingback" href="https://pragssalty.com/xmlrpc.php">
	<!-- Optimized with WP Meteor v3.4.0 - https://wordpress.org/plugins/wp-meteor/ -->
	<script data-wpmeteor-nooptimize="true">var _wpmeteor = { "gdpr": true, "rdelay": 86400000, "preload": true, "elementor-animations": true, "elementor-pp": true, "v": "3.4.0", "rest_url": "https:\/\/pragssalty.com\/wp-json\/" }; (() => { try { new MutationObserver(function () { }), new PerformanceObserver(function () { }), Object.assign({}, {}), document.fonts.ready.then(function () { }) } catch { t = "wpmeteordisable=1", i = document.location.href, i.match(/[?&]wpmeteordisable/) || (o = "", i.indexOf("?") == -1 ? i.indexOf("#") == -1 ? o = i + "?" + t : o = i.replace("#", "?" + t + "#") : i.indexOf("#") == -1 ? o = i + "&" + t : o = i.replace("#", "&" + t + "#"), document.location.href = o) } var t, i, o; })();
<link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.22.4/dist/bootstrap-table.min.css">
<script src="https://unpkg.com/bootstrap-table@1.22.4/dist/bootstrap-table.min.js"></script>
	</script>
	<script data-wpmeteor-nooptimize="true">(() => {
			var Fe = () => Math.round(performance.now()) / 1e3; var g = "addEventListener", de = "removeEventListener", u = "getAttribute", y = "setAttribute", pe = "removeAttribute", D = "hasAttribute", Bt = "querySelector", O = Bt + "All", G = "appendChild", j = "removeChild", ue = "createElement", _ = "tagName", We = "getOwnPropertyDescriptor", v = "prototype", F = "__lookupGetter__", ze = "__lookupSetter__", f = "DOMContentLoaded", E = "load", fe = "error"; var l = window, c = document, _e = c.documentElement, Ye = () => { }, x = console.error; var $e = !0, J = class { constructor() { this.known = [] } init() { let e, n, s = (r, i) => { if ($e && r && r.fn && !r.__wpmeteor) { let a = function (o) { return c[g](f, d => { o.call(c, r, d, "jQueryMock") }), this }; this.known.push([r, r.fn.ready, r.fn.init.prototype.ready]), r.fn.ready = a, r.fn.init.prototype.ready = a, r.__wpmeteor = !0 } return r }; window.jQuery || window.$, Object.defineProperty(window, "jQuery", { get() { return e }, set(r) { e = s(r, "jQuery") } }), Object.defineProperty(window, "$", { get() { return n }, set(r) { n = s(r, "$") } }) } unmock() { this.known.forEach(([e, n, s]) => { e.fn.ready = n, e.fn.init.prototype.ready = s }), $e = !1 } }; var Ee = "fpo:first-interaction", me = "fpo:replay-captured-events"; var Qe = "fpo:element-loaded", be = "fpo:images-loaded", M = "fpo:the-end"; var X = "click", W = window, Ke = W.addEventListener.bind(W), je = W.removeEventListener.bind(W), Ae = "removeAttribute", ge = "getAttribute", Nt = "setAttribute", Te = ["touchstart", "touchmove", "touchend", "touchcancel", "keydown", "wheel"], Je = ["mouseover", "mouseout", X], Ct = ["touchstart", "touchend", "touchcancel", "mouseover", "mouseout", X], R = "data-wpmeteor-"; var Ge = "dispatchEvent", Xe = t => { let e = new MouseEvent(X, { view: t.view, bubbles: !0, cancelable: !0 }); return Object.defineProperty(e, "target", { writable: !1, value: t.target }), e }, Se = class { static capture() { let e = !1, n = [], s = r => { if (r.target && Ge in r.target) { if (!r.isTrusted) return; if (r.cancelable && !Te.includes(r.type)) try { r.preventDefault() } catch { } r.stopImmediatePropagation(), r.type === X ? n.push(Xe(r)) : Ct.includes(r.type) && n.push(r), r.target[Nt](R + r.type, !0), e || (e = !0, W[Ge](new CustomEvent(Ee))) } }; W.addEventListener(me, () => { Je.forEach(a => je(a, s, { passive: !1, capture: !0 })), Te.forEach(a => je(a, s, { passive: !0, capture: !0 })); let r; for (; r = n.shift();) { var i = r.target; i[ge](R + "touchstart") && i[ge](R + "touchend") && !i[ge](R + X) ? (i[ge](R + "touchmove") || n.push(Xe(r)), i[Ae](R + "touchstart"), i[Ae](R + "touchend")) : i[Ae](R + r.type), i[Ge](r) } }), Je.forEach(r => Ke(r, s, { passive: !1, capture: !0 })), Te.forEach(r => Ke(r, s, { passive: !0, capture: !0 })) } }; var Ze = Se; var Z = class { constructor() { this.l = [] } emit(e, n = null) { this.l[e] && this.l[e].forEach(s => s(n)) } on(e, n) { this.l[e] ||= [], this.l[e].push(n) } off(e, n) { this.l[e] = (this.l[e] || []).filter(s => s !== n) } }; var b = new Z; var he = c[ue]("span"); he[y]("id", "elementor-device-mode"); he[y]("class", "elementor-screen-only"); var Ot = !1, et = () => (Ot || c.body[G](he), getComputedStyle(he, ":after").content.replace(/"/g, "")); var tt = t => t[u]("class") || "", rt = (t, e) => t[y]("class", e), nt = () => { l[g](E, function () { let t = et(), e = Math.max(_e.clientWidth || 0, l.innerWidth || 0), n = Math.max(_e.clientHeight || 0, l.innerHeight || 0), s = ["_animation_" + t, "animation_" + t, "_animation", "_animation", "animation"]; Array.from(c[O](".elementor-invisible")).forEach(r => { let i = r.getBoundingClientRect(); if (i.top + l.scrollY <= n && i.left + l.scrollX < e) try { let o = JSON.parse(r[u]("data-settings")); if (o.trigger_source) return; let d = o._animation_delay || o.animation_delay || 0, p, w; for (var a = 0; a < s.length; a++)if (o[s[a]]) { w = s[a], p = o[w]; break } if (p) { let Q = tt(r), K = p === "none" ? Q : Q + " animated " + p, St = setTimeout(() => { rt(r, K.replace(/\belementor-invisible\b/, "")), s.forEach(Ut => delete o[Ut]), r[y]("data-settings", JSON.stringify(o)) }, d); b.on("fi", () => { clearTimeout(St), rt(r, tt(r).replace(new RegExp("\b" + p + "\b"), "")) }) } } catch (o) { console.error(o) } }) }) }; var st = "data-in-mega_smartmenus", ot = () => { let t = c[ue]("div"); t.innerHTML = '<span class="sub-arrow --wp-meteor"><i class="fa" aria-hidden="true"></i></span>'; let e = t.firstChild, n = s => { let r = []; for (; s = s.previousElementSibling;)r.push(s); return r }; c[g](f, function () { Array.from(c[O](".pp-advanced-menu ul")).forEach(s => { if (s[u](st)) return; (s[u]("class") || "").match(/\bmega-menu\b/) && s[O]("ul").forEach(a => { a[y](st, !0) }); let r = n(s), i = r.filter(a => a).filter(a => a[_] === "A").pop(); if (i || (i = r.map(a => Array.from(a[O]("a"))).filter(a => a).flat().pop()), i) { let a = e.cloneNode(!0); i[G](a), new MutationObserver(d => { d.forEach(({ addedNodes: p }) => { p.forEach(w => { if (w.nodeType === 1 && w[_] === "SPAN") try { i[j](a) } catch { } }) }) }).observe(i, { childList: !0 }) } }) }) }; var A = "readystatechange", B = "message"; var Y = "SCRIPT", m = "data-wpmeteor-", T = Object.defineProperty, Pe = Object.defineProperties, P = "javascript/blocked", Be = /^\s*(application|text)\/javascript|module\s*$/i, ht = "requestAnimationFrame", vt = "requestIdleCallback", ae = "setTimeout", k = l.constructor.name + "::", le = c.constructor.name + "::", yt = function (t, e) { e = e || l; for (var n = 0; n < this.length; n++)t.call(e, this[n], n, this) }; "NodeList" in l && !NodeList[v].forEach && (NodeList[v].forEach = yt); "HTMLCollection" in l && !HTMLCollection[v].forEach && (HTMLCollection[v].forEach = yt); _wpmeteor["elementor-animations"] && nt(), _wpmeteor["elementor-pp"] && ot(); var N = [], te = [], I = [], se = !1, q = [], h = {}, ke = !1, Rt = 0, ye = c.visibilityState === "visible" ? l[ht] : l[ae], Lt = l[vt] || ye; c[g]("visibilitychange", () => { ye = c.visibilityState === "visible" ? l[ht] : l[ae], Lt = l[vt] || ye }); var U = l[ae], Le, ee = ["src", "type"], z = Object, re = "definePropert"; z[re + "y"] = (t, e, n) => t === l && ["jQuery", "onload"].indexOf(e) >= 0 || (t === c || t === c.body) && ["readyState", "write", "writeln", "on" + A].indexOf(e) >= 0 ? (["on" + A, "on" + E].indexOf(e) && n.set && (h["on" + A] = h["on" + A] || [], h["on" + A].push(n.set)), t) : t instanceof HTMLScriptElement && ee.indexOf(e) >= 0 ? (t[e + "Getters"] || (t[e + "Getters"] = [], t[e + "Setters"] = [], T(t, e, { set(s) { t[e + "Setters"].forEach(r => r.call(t, s)) }, get() { return t[e + "Getters"].slice(-1)[0]() } })), n.get && t[e + "Getters"].push(n.get), n.set && t[e + "Setters"].push(n.set), t) : T(t, e, n); z[re + "ies"] = (t, e) => { for (let n in e) z[re + "y"](t, n, e[n]); for (let n of Object.getOwnPropertySymbols(e)) z[re + "y"](t, n, e[n]); return t }; var De = EventTarget[v][g], Dt = EventTarget[v][de], $ = De.bind(c), xt = Dt.bind(c), C = De.bind(l), wt = Dt.bind(l), _t = Document[v].createElement, V = _t.bind(c), we = c.__proto__[F]("readyState").bind(c), it = "loading"; T(c, "readyState", { get() { return it }, set(t) { return it = t } }); var ct = t => q.filter(([e, , n], s) => { if (!(t.indexOf(e.type) < 0)) { n || (n = e.target); try { let r = n.constructor.name + "::" + e.type; for (let i = 0; i < h[r].length; i++)if (h[r][i]) { let a = r + "::" + s + "::" + i; if (!Ne[a]) return !0 } } catch { } } }).length, oe, Ne = {}, ie = t => { q.forEach(([e, n, s], r) => { if (!(t.indexOf(e.type) < 0)) { s || (s = e.target); try { let i = s.constructor.name + "::" + e.type; if ((h[i] || []).length) for (let a = 0; a < h[i].length; a++) { let o = h[i][a]; if (o) { let d = i + "::" + r + "::" + a; if (!Ne[d]) { Ne[d] = !0, c.readyState = n, oe = i; try { Rt++, !o[v] || o[v].constructor === o ? o.bind(s)(e) : o(e) } catch (p) { x(p, o) } oe = null } } } } catch (i) { x(i) } } }) }; $(f, t => { q.push([new t.constructor(f, t), we(), c]) }); $(A, t => { q.push([new t.constructor(A, t), we(), c]) }); C(f, t => { q.push([new t.constructor(f, t), we(), l]) }); C(E, t => { ke = !0, q.push([new t.constructor(E, t), we(), l]), H || ie([f, A, B, E]) }); var bt = t => { q.push([t, c.readyState, l]) }, Mt = l[F]("onmessage"), Pt = l[ze]("onmessage"), kt = () => { wt(B, bt), (h[k + "message"] || []).forEach(t => { C(B, t) }), T(l, "onmessage", { get: Mt, set: Pt }) }; C(B, bt); var At = new J; At.init(); var Ie = () => { !H && !se && (H = !0, Re(), c.readyState = "loading", U(S)), ke || C(E, () => { Ie() }) }; C(Ee, () => { Ie() }); b.on(be, () => { Ie() }); _wpmeteor.rdelay >= 0 && Ze.capture(); var Ce = 1, at = () => { --Ce || U(b.emit.bind(b, M)) }; var H = !1, S = () => { let t = N.shift(); if (t) t[u](m + "src") ? t[D]("async") ? (Ce++, Ue(t, at), U(S)) : Ue(t, U.bind(null, S)) : (t.origtype == P && Ue(t), U(S)); else if (te.length) { for (; te.length;)N.push(te.shift()); Re(), U(S) } else if (ct([f, A, B])) ie([f, A, B]), U(S); else if (ke) if (ct([E, B])) ie([E, B]), U(S); else if (Ce > 1) Lt(S); else if (I.length) { for (; I.length;)N.push(I.shift()); Re(), U(S) } else { if (l.RocketLazyLoadScripts) try { RocketLazyLoadScripts.run() } catch (e) { x(e) } c.readyState = "complete", kt(), At.unmock(), H = !1, se = !0, l[ae](at) } else H = !1 }, Oe = t => { let e = V(Y), n = t.attributes; for (var s = n.length - 1; s >= 0; s--)n[s].name.startsWith(m) || e[y](n[s].name, n[s].value); let r = t[u](m + "type"); r ? e.type = r : e.type = "text/javascript", (t.textContent || "").match(/^\s*class RocketLazyLoadScripts/) ? e.textContent = t.textContent.replace(/^\s*class\s*RocketLazyLoadScripts/, "window.RocketLazyLoadScripts=class").replace("RocketLazyLoadScripts.run();", "") : e.textContent = t.textContent; for (let i of ["onload", "onerror", "onreadystatechange"]) t[i] && (e[i] = t[i]); return e }, lt = (t, e) => { let n = t.parentNode; if (n) return (n.nodeType === 11 ? V(n.host[_]) : V(n[_]))[G](n.replaceChild(e, t)), n.isConnected ? t : void 0; x("No parent for", t) }, Ue = (t, e) => { let n = t[u](m + "src"); if (n) { let s = Oe(t), r = De ? De.bind(s) : s[r].bind(s); t.getEventListeners && t.getEventListeners().forEach(([o, d]) => { r(o, d) }), e && (r(E, e), r(fe, e)), s.src = n; let i = lt(t, s), a = s[u]("type"); (!i || t[D]("nomodule") || a && !Be.test(a)) && e && e() } else t.origtype === P ? lt(t, Oe(t)) : e && e() }, Ve = (t, e) => { let n = (h[t] || []).indexOf(e); if (n >= 0) return h[t][n] = void 0, !0 }, dt = (t, e, ...n) => { if ("HTMLDocument::" + f == oe && t === f && !e.toString().match(/jQueryMock/)) { b.on(M, c[g].bind(c, t, e, ...n)); return } if (e && (t === f || t === A)) { let s = le + t; h[s] = h[s] || [], h[s].push(e), se && ie([t]); return } return $(t, e, ...n) }, pt = (t, e, ...n) => { if (t === f) { let s = le + t; Ve(s, e) } return xt(t, e, ...n) }; Pe(c, { [g]: { get() { return dt }, set() { return dt } }, [de]: { get() { return pt }, set() { return pt } } }); var ut = {}, ve = t => { if (t) try { t.match(/^\/\/\w+/) && (t = c.location.protocol + t); let e = new URL(t), n = e.origin; if (n && !ut[n] && c.location.host !== e.host) { let s = V("link"); s.rel = "preconnect", s.href = n, c.head[G](s), ut[n] = !0 } } catch { } }, ce = {}, Tt = (t, e, n, s) => { var r = V("link"); r.rel = e ? "modulepre" + E : "pre" + E, r.as = "script", n && r[y]("crossorigin", n), r.href = t, s[G](r), ce[t] = !0 }, Re = () => { if (_wpmeteor.preload && N.length) { let t = c.createDocumentFragment(); N.forEach(e => { let n = e[u](m + "src"); n && !ce[n] && !e[u](m + "integrity") && !e[D]("nomodule") && Tt(n, e[u](m + "type") == "module", e[D]("crossorigin") && e[u]("crossorigin"), t) }), ye(c.head[G].bind(c.head, t)) } }; $(f, () => { let t = [...N]; N.length = 0, [...c[O]("script[type='" + P + "']"), ...t].forEach(e => { if (ne.has(e)) return; let n = e[F]("type").bind(e); T(e, "origtype", { get() { return n() } }), (e[u](m + "src") || "").match(/\/gtm.js\?/) ? I.push(e) : e[D]("async") ? I.unshift(e) : e[D]("defer") ? te.push(e) : N.push(e), ne.add(e) }) }); var xe = function (...t) { let e = V(...t); if (!t || t[0].toUpperCase() !== Y || !H) return e; let n = e[y].bind(e), s = e[u].bind(e), r = e[D].bind(e), i = e[F]("attributes").bind(e), a = []; return e.getEventListeners = () => a, ee.forEach(o => { let d = e[F](o).bind(e); z[re + "y"](e, o, { set(p) { return o === "type" && p && !Be.test(p) ? e[y](o, p) : ((o === "src" && p || o === "type" && p && e.origsrc) && n("type", P), p ? e[y](m + o, p) : e[pe](m + o)) }, get() { return e[u](m + o) } }), T(e, "orig" + o, { get() { return d() } }) }), e[g] = function (o, d) { a.push([o, d]) }, e[y] = function (o, d) { if (ee.includes(o)) return o === "type" && d && !Be.test(d) ? n(o, d) : ((o === "src" && d || o === "type" && d && e.origsrc) && n("type", P), d ? n(m + o, d) : e[pe](m + o)); n(o, d) }, e[u] = function (o) { return ee.indexOf(o) >= 0 ? s(m + o) : s(o) }, e[D] = function (o) { return ee.indexOf(o) >= 0 ? r(m + o) : r(o) }, T(e, "attributes", { get() { return [...i()].filter(d => d.name !== "type").map(d => ({ name: d.name.match(new RegExp(m)) ? d.name.replace(m, "") : d.name, value: d.value })) } }), e }; Object.defineProperty(Document[v], "createElement", { set(t) { t !== xe && (Le = t) }, get() { return Le || xe } }); var ne = new Set, He = new MutationObserver(t => { H && t.forEach(({ removedNodes: e, addedNodes: n, target: s }) => { e.forEach(r => { r.nodeType === 1 && Y === r[_] && "origtype" in r && ne.delete(r) }), n.forEach(r => { if (r.nodeType === 1) if (Y === r[_]) { if ("origtype" in r) { let i = r[u](m + "src"); ne.has(r) && x("Inserted twice", r), r.parentNode ? (ne.add(r), (i || "").match(/\/gtm.js\?/) ? (I.push(r), ve(i)) : r[D]("async") ? (I.unshift(r), ve(i)) : r[D]("defer") ? (te.push(r), ve(i)) : (i && !r[u](m + "integrity") && !r[D]("nomodule") && !ce[i] && (Ye(Fe(), "pre preload", N.length), Tt(i, r[u](m + "type") == "module", r[D]("crossorigin") && r[u]("crossorigin"), c.head)), N.push(r))) : (r[g](E, a => a.target.parentNode[j](a.target)), r[g](fe, a => a.target.parentNode[j](a.target)), s[G](r)) } } else r[_] === "LINK" && r[u]("as") === "script" && (ce[r[u]("href")] = !0) }) }) }), Gt = { childList: !0, subtree: !0, attributes: !0, attributeOldValue: !0 }; He.observe(c.documentElement, Gt); var It = HTMLElement[v].attachShadow; HTMLElement[v].attachShadow = function (t) { let e = It.call(this, t); return t.mode === "open" && He.observe(e, Gt), e }; var ft = z[We](HTMLIFrameElement[v], "src"); T(HTMLIFrameElement[v], "src", { get() { return this.dataset.fpoSrc ? this.dataset.fpoSrc : ft.get.call(this) }, set(t) { delete this.dataset.fpoSrc, ft.set.call(this, t) } }); b.on(M, () => { (!Le || Le === xe) && (Document[v].createElement = _t, He.disconnect()), dispatchEvent(new CustomEvent(me)), dispatchEvent(new CustomEvent(M)) }); var Me = t => { let e, n; !c.currentScript || !c.currentScript.parentNode ? (e = c.body, n = e.lastChild) : (n = c.currentScript, e = n.parentNode); try { let s = V("div"); s.innerHTML = t, Array.from(s.childNodes).forEach(r => { r.nodeName === Y ? e.insertBefore(Oe(r), n) : e.insertBefore(r, n) }) } catch (s) { x(s) } }, Et = t => Me(t + `
`); Pe(c, { write: { get() { return Me }, set(t) { return Me = t } }, writeln: { get() { return Et }, set(t) { return Et = t } } }); var mt = (t, e, ...n) => { if (k + f == oe && t === f && !e.toString().match(/jQueryMock/)) { b.on(M, l[g].bind(l, t, e, ...n)); return } if (k + E == oe && t === E) { b.on(M, l[g].bind(l, t, e, ...n)); return } if (e && (t === E || t === f || t === B && !se)) { let s = t === f ? le + t : k + t; h[s] = h[s] || [], h[s].push(e), se && ie([t]); return } return C(t, e, ...n) }, gt = (t, e) => { if (t === E) { let n = t === f ? le + t : k + t; Ve(n, e) } return wt(t, e) }; Pe(l, { [g]: { get() { return mt }, set() { return mt } }, [de]: { get() { return gt }, set() { return gt } } }); var qe = t => { let e; return { get() { return e }, set(n) { return e && Ve(t, n), h[t] = h[t] || [], h[t].push(n), e = n } } }; C(Qe, t => { let { target: e, event: n } = t.detail, s = e === l ? c.body : e, r = s[u](m + "on" + n.type); s[pe](m + "on" + n.type); try { let i = new Function("event", r); e === l ? l[g](E, i.bind(e, n)) : i.call(e, n) } catch (i) { console.err(i) } }); { let t = qe(k + E); T(l, "onload", t), $(f, () => { T(c.body, "onload", t) }) } T(c, "onreadystatechange", qe(le + A)); T(l, "onmessage", qe(k + B)); (() => { let t = l.innerHeight, e = l.innerWidth, n = r => { let a = { "4g": 1250, "3g": 2500, "2g": 2500 }[(navigator.connection || {}).effectiveType] || 0, o = r.getBoundingClientRect(), d = { top: -1 * t - a, left: -1 * e - a, bottom: t + a, right: e + a }; return !(o.left >= d.right || o.right <= d.left || o.top >= d.bottom || o.bottom <= d.top) }, s = (r = !0) => { let i = 1, a = -1, o = {}, d = () => { a++, --i || l[ae](b.emit.bind(b, be), _wpmeteor.rdelay) }; Array.from(c.getElementsByTagName("*")).forEach(p => { let w, Q, K; if (p[_] === "IMG") { let L = p.currentSrc || p.src; L && !o[L] && !L.match(/^data:/i) && ((p.loading || "").toLowerCase() !== "lazy" || n(p)) && (w = L) } else if (p[_] === Y) ve(p[u](m + "src")); else if (p[_] === "LINK" && p[u]("as") === "script" && ["pre" + E, "modulepre" + E].indexOf(p[u]("rel")) >= 0) ce[p[u]("href")] = !0; else if ((Q = l.getComputedStyle(p)) && (K = (Q.backgroundImage || "").match(/^url\s*\((.*?)\)/i)) && (K || []).length) { let L = K[0].slice(4, -1).replace(/"/g, ""); !o[L] && !L.match(/^data:/i) && (w = L) } if (w) { o[w] = !0; let L = new Image; r && (i++, L[g](E, d), L[g](fe, d)), L.src = w } }), c.fonts.ready.then(() => { d() }) }; _wpmeteor.rdelay === 0 ? $(f, s) : C(E, s) })();
		})();
		//0.1.47

	</script>
	<script type="javascript/blocked"
		data-wpmeteor-type="text/javascript">window.MSInputMethodContext && document.documentMode && document.write('<script src="wp-content/themes/woodmart/js/libs/ie11CustomProperties.min.js"><\/script>');</script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript">window._wca = window._wca || [];</script>

	<!-- Search Engine Optimization by Rank Math - https://rankmath.com/ -->
	<title>Track your order - Prags Salty</title>
	<meta name="description" content="Order Tracking" />
	<meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large" />
	<link rel="canonical" href="https://pragssalty.com/track-order/" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="article" />
	<meta property="og:title" content="Track your order - Prags Salty" />
	<meta property="og:description" content="Order Tracking" />
	<meta property="og:url" content="https://pragssalty.com/track-order/" />
	<meta property="og:site_name" content="Prags Salty" />
	<meta property="article:author" content="https://www.facebook.com/pragssaltyjodhpur" />
	<meta property="og:updated_time" content="2023-08-17T10:27:45+05:30" />
	<meta property="article:published_time" content="2023-06-15T03:21:20+05:30" />
	<meta property="article:modified_time" content="2023-08-17T10:27:45+05:30" />
	<meta name="twitter:card" content="summary_large_image" />
	<meta name="twitter:title" content="Track your order - Prags Salty" />
	<meta name="twitter:description" content="Order Tracking" />
	<meta name="twitter:label1" content="Time to read" />
	<meta name="twitter:data1" content="Less than a minute" />
	<script type="application/ld+json"
		class="rank-math-schema">{"@context":"https://schema.org","@graph":[{"@type":"Organization","@id":"https://pragssalty.com/#organization","name":"Prags Salty"},{"@type":"WebSite","@id":"https://pragssalty.com/#website","url":"https://pragssalty.com","name":"Prags Salty","publisher":{"@id":"https://pragssalty.com/#organization"},"inLanguage":"en-US"},{"@type":"WebPage","@id":"https://pragssalty.com/track-order/#webpage","url":"https://pragssalty.com/track-order/","name":"Track your order - Prags Salty","datePublished":"2023-06-15T03:21:20+05:30","dateModified":"2023-08-17T10:27:45+05:30","isPartOf":{"@id":"https://pragssalty.com/#website"},"inLanguage":"en-US"},{"@type":"Person","@id":"https://pragssalty.com/author/pragssaltyjodhpur/","name":"Prags Salty","url":"https://pragssalty.com/author/pragssaltyjodhpur/","image":{"@type":"ImageObject","@id":"https://secure.gravatar.com/avatar/80cb3f87f953c593db5fb3f4e3b16c7b?s=96&amp;d=mm&amp;r=g","url":"https://secure.gravatar.com/avatar/80cb3f87f953c593db5fb3f4e3b16c7b?s=96&amp;d=mm&amp;r=g","caption":"Prags Salty","inLanguage":"en-US"},"sameAs":["https://pragssalty.com","https://www.facebook.com/pragssaltyjodhpur"],"worksFor":{"@id":"https://pragssalty.com/#organization"}},{"@type":"Article","headline":"Track your order - Prags Salty","datePublished":"2023-06-15T03:21:20+05:30","dateModified":"2023-08-17T10:27:45+05:30","author":{"@id":"https://pragssalty.com/author/pragssaltyjodhpur/","name":"Prags Salty"},"publisher":{"@id":"https://pragssalty.com/#organization"},"description":"Order Tracking","name":"Track your order - Prags Salty","@id":"https://pragssalty.com/track-order/#richSnippet","isPartOf":{"@id":"https://pragssalty.com/track-order/#webpage"},"inLanguage":"en-US","mainEntityOfPage":{"@id":"https://pragssalty.com/track-order/#webpage"}}]}</script>
	<!-- /Rank Math WordPress SEO plugin -->

	<link rel='dns-prefetch' href='//stats.wp.com' />
	<link rel='dns-prefetch' href='//www.googletagmanager.com' />
	<link rel='dns-prefetch' href='//fonts.googleapis.com' />
	<link rel="alternate" type="application/rss+xml" title="Prags Salty &raquo; Feed"
		href="https://pragssalty.com/feed/" />
	<link rel="alternate" type="application/rss+xml" title="Prags Salty &raquo; Comments Feed"
		href="https://pragssalty.com/comments/feed/" />
	<style id='jetpack-sharing-buttons-style-inline-css' type='text/css'>
		.jetpack-sharing-buttons__services-list {
			display: flex;
			flex-direction: row;
			flex-wrap: wrap;
			gap: 0;
			list-style-type: none;
			margin: 5px;
			padding: 0
		}

		.jetpack-sharing-buttons__services-list.has-small-icon-size {
			font-size: 12px
		}

		.jetpack-sharing-buttons__services-list.has-normal-icon-size {
			font-size: 16px
		}

		.jetpack-sharing-buttons__services-list.has-large-icon-size {
			font-size: 24px
		}

		.jetpack-sharing-buttons__services-list.has-huge-icon-size {
			font-size: 36px
		}

		@media print {
			.jetpack-sharing-buttons__services-list {
				display: none !important
			}
		}

		.editor-styles-wrapper .wp-block-jetpack-sharing-buttons {
			gap: 0;
			padding-inline-start: 0
		}

		ul.jetpack-sharing-buttons__services-list.has-background {
			padding: 1.25em 2.375em
		}
	</style>
	<style id='rank-math-toc-block-style-inline-css' type='text/css'>
		.wp-block-rank-math-toc-block nav ol {
			counter-reset: item
		}

		.wp-block-rank-math-toc-block nav ol li {
			display: block
		}

		.wp-block-rank-math-toc-block nav ol li:before {
			content: counters(item, ".") ". ";
			counter-increment: item
		}
	</style>
	<style id='classic-theme-styles-inline-css' type='text/css'>
		/*! This file is auto-generated */
		.wp-block-button__link {
			color: #fff;
			background-color: #32373c;
			border-radius: 9999px;
			box-shadow: none;
			text-decoration: none;
			padding: calc(.667em + 2px) calc(1.333em + 2px);
			font-size: 1.125em
		}

		.wp-block-file__button {
			background: #32373c;
			color: #fff;
			text-decoration: none
		}
	</style>
	<style id='global-styles-inline-css' type='text/css'>
		body {
			--wp--preset--color--black: #000000;
			--wp--preset--color--cyan-bluish-gray: #abb8c3;
			--wp--preset--color--white: #ffffff;
			--wp--preset--color--pale-pink: #f78da7;
			--wp--preset--color--vivid-red: #cf2e2e;
			--wp--preset--color--luminous-vivid-orange: #ff6900;
			--wp--preset--color--luminous-vivid-amber: #fcb900;
			--wp--preset--color--light-green-cyan: #7bdcb5;
			--wp--preset--color--vivid-green-cyan: #00d084;
			--wp--preset--color--pale-cyan-blue: #8ed1fc;
			--wp--preset--color--vivid-cyan-blue: #0693e3;
			--wp--preset--color--vivid-purple: #9b51e0;
			--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg, rgba(6, 147, 227, 1) 0%, rgb(155, 81, 224) 100%);
			--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg, rgb(122, 220, 180) 0%, rgb(0, 208, 130) 100%);
			--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg, rgba(252, 185, 0, 1) 0%, rgba(255, 105, 0, 1) 100%);
			--wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg, rgba(255, 105, 0, 1) 0%, rgb(207, 46, 46) 100%);
			--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg, rgb(238, 238, 238) 0%, rgb(169, 184, 195) 100%);
			--wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg, rgb(74, 234, 220) 0%, rgb(151, 120, 209) 20%, rgb(207, 42, 186) 40%, rgb(238, 44, 130) 60%, rgb(251, 105, 98) 80%, rgb(254, 248, 76) 100%);
			--wp--preset--gradient--blush-light-purple: linear-gradient(135deg, rgb(255, 206, 236) 0%, rgb(152, 150, 240) 100%);
			--wp--preset--gradient--blush-bordeaux: linear-gradient(135deg, rgb(254, 205, 165) 0%, rgb(254, 45, 45) 50%, rgb(107, 0, 62) 100%);
			--wp--preset--gradient--luminous-dusk: linear-gradient(135deg, rgb(255, 203, 112) 0%, rgb(199, 81, 192) 50%, rgb(65, 88, 208) 100%);
			--wp--preset--gradient--pale-ocean: linear-gradient(135deg, rgb(255, 245, 203) 0%, rgb(182, 227, 212) 50%, rgb(51, 167, 181) 100%);
			--wp--preset--gradient--electric-grass: linear-gradient(135deg, rgb(202, 248, 128) 0%, rgb(113, 206, 126) 100%);
			--wp--preset--gradient--midnight: linear-gradient(135deg, rgb(2, 3, 129) 0%, rgb(40, 116, 252) 100%);
			--wp--preset--font-size--small: 13px;
			--wp--preset--font-size--medium: 20px;
			--wp--preset--font-size--large: 36px;
			--wp--preset--font-size--x-large: 42px;
			--wp--preset--spacing--20: 0.44rem;
			--wp--preset--spacing--30: 0.67rem;
			--wp--preset--spacing--40: 1rem;
			--wp--preset--spacing--50: 1.5rem;
			--wp--preset--spacing--60: 2.25rem;
			--wp--preset--spacing--70: 3.38rem;
			--wp--preset--spacing--80: 5.06rem;
			--wp--preset--shadow--natural: 6px 6px 9px rgba(0, 0, 0, 0.2);
			--wp--preset--shadow--deep: 12px 12px 50px rgba(0, 0, 0, 0.4);
			--wp--preset--shadow--sharp: 6px 6px 0px rgba(0, 0, 0, 0.2);
			--wp--preset--shadow--outlined: 6px 6px 0px -3px rgba(255, 255, 255, 1), 6px 6px rgba(0, 0, 0, 1);
			--wp--preset--shadow--crisp: 6px 6px 0px rgba(0, 0, 0, 1);
		}

		:where(.is-layout-flex) {
			gap: 0.5em;
		}

		:where(.is-layout-grid) {
			gap: 0.5em;
		}

		body .is-layout-flow>.alignleft {
			float: left;
			margin-inline-start: 0;
			margin-inline-end: 2em;
		}

		body .is-layout-flow>.alignright {
			float: right;
			margin-inline-start: 2em;
			margin-inline-end: 0;
		}

		body .is-layout-flow>.aligncenter {
			margin-left: auto !important;
			margin-right: auto !important;
		}

		body .is-layout-constrained>.alignleft {
			float: left;
			margin-inline-start: 0;
			margin-inline-end: 2em;
		}

		body .is-layout-constrained>.alignright {
			float: right;
			margin-inline-start: 2em;
			margin-inline-end: 0;
		}

		body .is-layout-constrained>.aligncenter {
			margin-left: auto !important;
			margin-right: auto !important;
		}

		body .is-layout-constrained> :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
			max-width: var(--wp--style--global--content-size);
			margin-left: auto !important;
			margin-right: auto !important;
		}

		body .is-layout-constrained>.alignwide {
			max-width: var(--wp--style--global--wide-size);
		}

		body .is-layout-flex {
			display: flex;
		}

		body .is-layout-flex {
			flex-wrap: wrap;
			align-items: center;
		}

		body .is-layout-flex>* {
			margin: 0;
		}

		body .is-layout-grid {
			display: grid;
		}

		body .is-layout-grid>* {
			margin: 0;
		}

		:where(.wp-block-columns.is-layout-flex) {
			gap: 2em;
		}

		:where(.wp-block-columns.is-layout-grid) {
			gap: 2em;
		}

		:where(.wp-block-post-template.is-layout-flex) {
			gap: 1.25em;
		}

		:where(.wp-block-post-template.is-layout-grid) {
			gap: 1.25em;
		}

		.has-black-color {
			color: var(--wp--preset--color--black) !important;
		}

		.has-cyan-bluish-gray-color {
			color: var(--wp--preset--color--cyan-bluish-gray) !important;
		}

		.has-white-color {
			color: var(--wp--preset--color--white) !important;
		}

		.has-pale-pink-color {
			color: var(--wp--preset--color--pale-pink) !important;
		}

		.has-vivid-red-color {
			color: var(--wp--preset--color--vivid-red) !important;
		}

		.has-luminous-vivid-orange-color {
			color: var(--wp--preset--color--luminous-vivid-orange) !important;
		}

		.has-luminous-vivid-amber-color {
			color: var(--wp--preset--color--luminous-vivid-amber) !important;
		}

		.has-light-green-cyan-color {
			color: var(--wp--preset--color--light-green-cyan) !important;
		}

		.has-vivid-green-cyan-color {
			color: var(--wp--preset--color--vivid-green-cyan) !important;
		}

		.has-pale-cyan-blue-color {
			color: var(--wp--preset--color--pale-cyan-blue) !important;
		}

		.has-vivid-cyan-blue-color {
			color: var(--wp--preset--color--vivid-cyan-blue) !important;
		}

		.has-vivid-purple-color {
			color: var(--wp--preset--color--vivid-purple) !important;
		}

		.has-black-background-color {
			background-color: var(--wp--preset--color--black) !important;
		}

		.has-cyan-bluish-gray-background-color {
			background-color: var(--wp--preset--color--cyan-bluish-gray) !important;
		}

		.has-white-background-color {
			background-color: var(--wp--preset--color--white) !important;
		}

		.has-pale-pink-background-color {
			background-color: var(--wp--preset--color--pale-pink) !important;
		}

		.has-vivid-red-background-color {
			background-color: var(--wp--preset--color--vivid-red) !important;
		}

		.has-luminous-vivid-orange-background-color {
			background-color: var(--wp--preset--color--luminous-vivid-orange) !important;
		}

		.has-luminous-vivid-amber-background-color {
			background-color: var(--wp--preset--color--luminous-vivid-amber) !important;
		}

		.has-light-green-cyan-background-color {
			background-color: var(--wp--preset--color--light-green-cyan) !important;
		}

		.has-vivid-green-cyan-background-color {
			background-color: var(--wp--preset--color--vivid-green-cyan) !important;
		}

		.has-pale-cyan-blue-background-color {
			background-color: var(--wp--preset--color--pale-cyan-blue) !important;
		}

		.has-vivid-cyan-blue-background-color {
			background-color: var(--wp--preset--color--vivid-cyan-blue) !important;
		}

		.has-vivid-purple-background-color {
			background-color: var(--wp--preset--color--vivid-purple) !important;
		}

		.has-black-border-color {
			border-color: var(--wp--preset--color--black) !important;
		}

		.has-cyan-bluish-gray-border-color {
			border-color: var(--wp--preset--color--cyan-bluish-gray) !important;
		}

		.has-white-border-color {
			border-color: var(--wp--preset--color--white) !important;
		}

		.has-pale-pink-border-color {
			border-color: var(--wp--preset--color--pale-pink) !important;
		}

		.has-vivid-red-border-color {
			border-color: var(--wp--preset--color--vivid-red) !important;
		}

		.has-luminous-vivid-orange-border-color {
			border-color: var(--wp--preset--color--luminous-vivid-orange) !important;
		}

		.has-luminous-vivid-amber-border-color {
			border-color: var(--wp--preset--color--luminous-vivid-amber) !important;
		}

		.has-light-green-cyan-border-color {
			border-color: var(--wp--preset--color--light-green-cyan) !important;
		}

		.has-vivid-green-cyan-border-color {
			border-color: var(--wp--preset--color--vivid-green-cyan) !important;
		}

		.has-pale-cyan-blue-border-color {
			border-color: var(--wp--preset--color--pale-cyan-blue) !important;
		}

		.has-vivid-cyan-blue-border-color {
			border-color: var(--wp--preset--color--vivid-cyan-blue) !important;
		}

		.has-vivid-purple-border-color {
			border-color: var(--wp--preset--color--vivid-purple) !important;
		}

		.has-vivid-cyan-blue-to-vivid-purple-gradient-background {
			background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;
		}

		.has-light-green-cyan-to-vivid-green-cyan-gradient-background {
			background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;
		}

		.has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background {
			background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;
		}

		.has-luminous-vivid-orange-to-vivid-red-gradient-background {
			background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;
		}

		.has-very-light-gray-to-cyan-bluish-gray-gradient-background {
			background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;
		}

		.has-cool-to-warm-spectrum-gradient-background {
			background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;
		}

		.has-blush-light-purple-gradient-background {
			background: var(--wp--preset--gradient--blush-light-purple) !important;
		}

		.has-blush-bordeaux-gradient-background {
			background: var(--wp--preset--gradient--blush-bordeaux) !important;
		}

		.has-luminous-dusk-gradient-background {
			background: var(--wp--preset--gradient--luminous-dusk) !important;
		}

		.has-pale-ocean-gradient-background {
			background: var(--wp--preset--gradient--pale-ocean) !important;
		}

		.has-electric-grass-gradient-background {
			background: var(--wp--preset--gradient--electric-grass) !important;
		}

		.has-midnight-gradient-background {
			background: var(--wp--preset--gradient--midnight) !important;
		}

		.has-small-font-size {
			font-size: var(--wp--preset--font-size--small) !important;
		}

		.has-medium-font-size {
			font-size: var(--wp--preset--font-size--medium) !important;
		}

		.has-large-font-size {
			font-size: var(--wp--preset--font-size--large) !important;
		}

		.has-x-large-font-size {
			font-size: var(--wp--preset--font-size--x-large) !important;
		}

		.wp-block-navigation a:where(:not(.wp-element-button)) {
			color: inherit;
		}

		:where(.wp-block-post-template.is-layout-flex) {
			gap: 1.25em;
		}

		:where(.wp-block-post-template.is-layout-grid) {
			gap: 1.25em;
		}

		:where(.wp-block-columns.is-layout-flex) {
			gap: 2em;
		}

		:where(.wp-block-columns.is-layout-grid) {
			gap: 2em;
		}

		.wp-block-pullquote {
			font-size: 1.5em;
			line-height: 1.6;
		}
	</style>
	<style id='woocommerce-inline-inline-css' type='text/css'>
		.woocommerce form .form-row .required {
			visibility: visible;
		}
	</style>
	<link rel='stylesheet' id='wpo_min-header-0-css'
		href='wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-header-09fede6a.min.css' type='text/css'
		media='all' />
	<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-header-wp-polyfill-inert3.1.2.min.js"
		id="wpo_min-header-0-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-header-regenerator-runtime0.14.0.min.js"
		id="wpo_min-header-1-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-header-wp-polyfill-inertregenerator-runtimewp-polyfill3.1.20.14.03.15.0.min.js"
		id="wpo_min-header-2-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-header-wp-polyfillwp-hooks3.15.02810c76e705dd1a53b18.min.js"
		id="wpo_min-header-3-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript" data-wpmeteor-src="https://stats.wp.com/w.js"
		id="woo-tracks-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-header-jquery-core3.7.1.min.js"
		id="wpo_min-header-5-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-header-jquery-migrate3.4.1.min.js"
		id="wpo_min-header-6-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-header-jqueryjquery-blockui3.7.12.7.0-wc.8.7.0.min.js"
		id="wpo_min-header-7-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript" id="wpo_min-header-8-js-extra">
/* <![CDATA[ */
var wc_add_to_cart_params = {"ajax_url":"\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/?wc-ajax=%%endpoint%%&jcart_page_id=2197","i18n_view_cart":"View cart","cart_url":"https:\/\/pragssalty.com\/cart\/","is_cart":"","cart_redirect_after_add":"no"};
/* ]]> */
</script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-header-jqueryjquery-blockuiwc-add-to-cart3.7.12.7.0-wc.8.7.08.7.0.min.js"
		id="wpo_min-header-8-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-header-js-cookie2.1.4-wc.8.7.0.min.js"
		id="wpo_min-header-9-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript" id="wpo_min-header-10-js-extra">
/* <![CDATA[ */
var woocommerce_params = {"ajax_url":"\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/?wc-ajax=%%endpoint%%&jcart_page_id=2197"};
/* ]]> */
</script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-header-jqueryjquery-blockuijs-cookiewoocommerce3.7.12.7.0-wc.8.7.02.1.4-wc.8.7.08.7.0.min.js"
		id="wpo_min-header-10-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="https://stats.wp.com/s-202415.js" id="woocommerce-analytics-js" defer="defer"
		data-wp-strategy="defer"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript" id="wpo_min-header-12-js-extra">
/* <![CDATA[ */
var wc_cart_fragments_params = {"ajax_url":"\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/?wc-ajax=%%endpoint%%&jcart_page_id=2197","cart_hash_key":"wc_cart_hash_922703ab473fa9b909b138c94b1e78ba","fragment_name":"wc_fragments_922703ab473fa9b909b138c94b1e78ba","request_timeout":"5000"};
/* ]]> */
</script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-header-jqueryjs-cookiewc-cart-fragments3.7.12.1.4-wc.8.7.08.7.0.min.js"
		id="wpo_min-header-12-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-header-jqueryjquery-bind-first3.7.1.min.js"
		id="wpo_min-header-13-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-header-js-cookie-pys2.1.3.min.js"
		id="wpo_min-header-14-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript" id="wpo_min-header-15-js-extra">
/* <![CDATA[ */
var pysOptions = {"staticEvents":[],"dynamicEvents":[],"triggerEvents":[],"triggerEventTypes":[],"debug":"","siteUrl":"https:\/\/pragssalty.com","ajaxUrl":"https:\/\/pragssalty.com\/wp-admin\/admin-ajax.php","ajax_event":"ef3f681bba","enable_remove_download_url_param":"1","cookie_duration":"7","last_visit_duration":"60","enable_success_send_form":"","ajaxForServerEvent":"1","send_external_id":"1","external_id_expire":"180","google_consent_mode":"1","gdpr":{"ajax_enabled":false,"all_disabled_by_api":false,"facebook_disabled_by_api":false,"analytics_disabled_by_api":false,"google_ads_disabled_by_api":false,"pinterest_disabled_by_api":false,"bing_disabled_by_api":false,"externalID_disabled_by_api":false,"facebook_prior_consent_enabled":true,"analytics_prior_consent_enabled":true,"google_ads_prior_consent_enabled":null,"pinterest_prior_consent_enabled":true,"bing_prior_consent_enabled":true,"cookiebot_integration_enabled":false,"cookiebot_facebook_consent_category":"marketing","cookiebot_analytics_consent_category":"statistics","cookiebot_tiktok_consent_category":"marketing","cookiebot_google_ads_consent_category":null,"cookiebot_pinterest_consent_category":"marketing","cookiebot_bing_consent_category":"marketing","consent_magic_integration_enabled":false,"real_cookie_banner_integration_enabled":false,"cookie_notice_integration_enabled":false,"cookie_law_info_integration_enabled":false,"analytics_storage":{"enabled":true,"value":"granted","filter":false},"ad_storage":{"enabled":true,"value":"granted","filter":false},"ad_user_data":{"enabled":true,"value":"granted","filter":false},"ad_personalization":{"enabled":true,"value":"granted","filter":false}},"cookie":{"disabled_all_cookie":false,"disabled_start_session_cookie":false,"disabled_advanced_form_data_cookie":false,"disabled_landing_page_cookie":false,"disabled_first_visit_cookie":false,"disabled_trafficsource_cookie":false,"disabled_utmTerms_cookie":false,"disabled_utmId_cookie":false},"tracking_analytics":{"TrafficSource":"direct","TrafficLanding":"undefined","TrafficUtms":[],"TrafficUtmsId":[]},"woo":{"enabled":true,"enabled_save_data_to_orders":true,"addToCartOnButtonEnabled":true,"addToCartOnButtonValueEnabled":true,"addToCartOnButtonValueOption":"price","singleProductId":null,"removeFromCartSelector":"form.woocommerce-cart-form .remove","addToCartCatchMethod":"add_cart_hook","is_order_received_page":false,"containOrderId":false},"edd":{"enabled":false}};
/* ]]> */
</script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-header-jqueryjs-cookie-pysjquery-bind-firstpys3.7.12.1.39.5.5.min.js"
		id="wpo_min-header-15-js"></script>

	<!-- Google tag (gtag.js) snippet added by Site Kit -->

	<!-- Google Analytics snippet added by Site Kit -->
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="https://www.googletagmanager.com/gtag/js?id=GT-PJNB9QPL" id="google_gtagjs-js"
		async></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript" id="google_gtagjs-js-after">
/* <![CDATA[ */
window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}
gtag("set","linker",{"domains":["pragssalty.com"]});
gtag("js", new Date());
gtag("set", "developer_id.dZTNiMT", true);
gtag("config", "GT-PJNB9QPL");
/* ]]> */
</script>

	<!-- End Google tag (gtag.js) snippet added by Site Kit -->
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-header-jquerywd-device-library3.7.17.1.4.min.js"
		id="wpo_min-header-17-js"></script>
	<link rel="https://api.w.org/" href="wp-json/" />
	<link rel="alternate" type="application/json" href="wp-json/wp/v2/pages/2197" />
	<link rel="EditURI" type="application/rsd+xml" title="RSD" href="https://pragssalty.com/xmlrpc.php?rsd" />
	<meta name="generator" content="WordPress 6.5.2" />
	<link rel='shortlink' href='https://pragssalty.com/?p=2197' />
	<link rel="alternate" type="application/json+oembed"
		href="wp-json/oembed/1.0/embed?url=https%3A%2F%2Fpragssalty.com%2Ftrack-order%2F" />
	<link rel="alternate" type="text/xml+oembed"
		href="wp-json/oembed/1.0/embed?url=https%3A%2F%2Fpragssalty.com%2Ftrack-order%2F&#038;format=xml" />
	<meta name="generator" content="Site Kit by Google 1.124.0" /><!-- Google tag (gtag.js) -->
	<!-- <script  type="javascript/blocked" data-wpmeteor-type="text/javascript"  async data-wpmeteor-src="https://www.googletagmanager.com/gtag/js?id=UA-269068220-1"></script>
<script  type="javascript/blocked" data-wpmeteor-type="text/javascript" >
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-269068220-1');
</script>
 -->
	<!-- Google Tag Manager -->
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript">(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-K2CZWRP');</script>
	<!-- End Google Tag Manager -->
	<meta name="facebook-domain-verification" content="kx1eppvmtjv31auyzv53zejkvu70b5" />
	<style>
		img#wpstats {
			display: none
		}
	</style>
	<meta name="theme-color" content="rgb(53,94,59)">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<noscript>
		<style>
			.woocommerce-product-gallery {
				opacity: 1 !important;
			}
		</style>
	</noscript>
	<meta name="generator"
		content="Elementor 3.20.4; features: e_optimized_assets_loading, e_optimized_css_loading, additional_custom_breakpoints, block_editor_assets_optimize, e_image_loading_optimization; settings: css_print_method-external, google_font-enabled, font_display-swap">
	<!-- Facebook Pixel Code -->
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript">
			!function (f, b, e, v, n, t, s) {
				if (f.fbq) return;
				n = f.fbq = function () {
					n.callMethod ?
						n.callMethod.apply(n, arguments) : n.queue.push(arguments)
				};
				if (!f._fbq) f._fbq = n;
				n.push = n;
				n.loaded = !0;
				n.version = '2.0';
				n.queue = [];
				t = b.createElement(e);
				t.async = !0;
				t.src = v;
				s = b.getElementsByTagName(e)[0];
				s.parentNode.insertBefore(t, s)
			}(window, document, 'script',
				'https://connect.facebook.net/en_US/fbevents.js');
			fbq('init', '1962479990797312');
					fbq( 'track', 'PageView' );
				</script>

	<!-- Google Tag Manager snippet added by Site Kit -->
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript">
/* <![CDATA[ */

			( function( w, d, s, l, i ) {
				w[l] = w[l] || [];
				w[l].push( {'gtm.start': new Date().getTime(), event: 'gtm.js'} );
				var f = d.getElementsByTagName( s )[0],
					j = d.createElement( s ), dl = l != 'dataLayer' ? '&l=' + l : '';
				j.async = true;
				j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
				f.parentNode.insertBefore( j, f );
			} )( window, document, 'script', 'dataLayer', 'GTM-K8G9NDDJ' );
			
/* ]]> */
</script>

	<!-- End Google Tag Manager snippet added by Site Kit -->
	<link rel="icon" href="wp-content/uploads/2024/01/slazzer-edit-image-1-32x32.png" sizes="32x32" />
	<link rel="icon" href="wp-content/uploads/2024/01/slazzer-edit-image-1-300x300.png" sizes="192x192" />
	<link rel="apple-touch-icon" href="wp-content/uploads/2024/01/slazzer-edit-image-1-300x300.png" />
	<meta name="msapplication-TileImage" content="wp-content/uploads/2024/01/slazzer-edit-image-1-300x300.png" />
	<style type="text/css" id="wp-custom-css">
		.sku_wrapper {
			display: none !important;
		}

		.product-tabs-wrapper {
			background-color: rgb(245, 245, 245) !important
		}

		.wc-cancel-order::after {
			content: "Order"
		}

		.wc-cancel-order::after {
			content: none;
		}

		.wd-entities-title {
			font-weight: 600 !important;
			font-size: 16px !important;
			white-space: nowrap !important;
			overflow: hidden !important;
			text-overflow: ellipsis !important;
			width: 100%;
		}

		.wd-entities-title>a {
			white-space: nowrap !important;
			overflow: hidden !important;
			text-overflow: ellipsis !important;
			width: 100%;
			display: inline-block;
		}

		.wd-empty-page:before {
			color: #355e3b !important;
		}

		.wd-empty-mini-cart:before {
			color: #355e3b !important;
		}

		/* .required{
	display:none;
} */



		.cart-actions .button[name="update_cart"] {
			display: none;
		}


		/* Style the empty cart button */
		.button.empty-cart {
			background-color: #963232;
			color: #fff;
			padding: 10px 20px;
			border-radius: 5px;

		}

		.button.empty-cart:hover {
			background-color: #963232;
		}

		.quick-shop-wrapper [class*="wd-reset-bottom"].variation-swatch-selected {
			--wd-var-table-mb: 5px !important;
		}

		}
	</style>
	<style>

	</style>
	<style>
		:root {
			--qlwapp-scheme-font-family: inherit;
			--qlwapp-scheme-font-size: 18px;
			--qlwapp-scheme-icon-size: 60px;
			--qlwapp-scheme-icon-font-size: 24px;
			--qlwapp-button-animation-name: none;
		}
	</style>
	<style id="wpforms-css-vars-root">
		:root {
			--wpforms-field-border-radius: 3px;
			--wpforms-field-background-color: #ffffff;
			--wpforms-field-border-color: rgba(0, 0, 0, 0.25);
			--wpforms-field-text-color: rgba(0, 0, 0, 0.7);
			--wpforms-label-color: rgba(0, 0, 0, 0.85);
			--wpforms-label-sublabel-color: rgba(0, 0, 0, 0.55);
			--wpforms-label-error-color: #d63637;
			--wpforms-button-border-radius: 3px;
			--wpforms-button-background-color: #066aab;
			--wpforms-button-text-color: #ffffff;
			--wpforms-page-break-color: #066aab;
			--wpforms-field-size-input-height: 43px;
			--wpforms-field-size-input-spacing: 15px;
			--wpforms-field-size-font-size: 16px;
			--wpforms-field-size-line-height: 19px;
			--wpforms-field-size-padding-h: 14px;
			--wpforms-field-size-checkbox-size: 16px;
			--wpforms-field-size-sublabel-spacing: 5px;
			--wpforms-field-size-icon-size: 1;
			--wpforms-label-size-font-size: 16px;
			--wpforms-label-size-line-height: 19px;
			--wpforms-label-size-sublabel-font-size: 14px;
			--wpforms-label-size-sublabel-line-height: 17px;
			--wpforms-button-size-font-size: 17px;
			--wpforms-button-size-height: 41px;
			--wpforms-button-size-padding-h: 15px;
			--wpforms-button-size-margin-top: 10px;

		}
	</style>
</head>

<body
	class="page-template-default page page-id-2197 theme-woodmart woocommerce-no-js wrapper-full-width  woodmart-ajax-shop-on offcanvas-sidebar-mobile offcanvas-sidebar-tablet sticky-toolbar-on elementor-default elementor-kit-227 elementor-page elementor-page-2197">
	<!-- Google Tag Manager (noscript) snippet added by Site Kit -->
	<noscript>
		<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K8G9NDDJ" height="0" width="0"
			style="display:none;visibility:hidden"></iframe>
	</noscript>
	<!-- End Google Tag Manager (noscript) snippet added by Site Kit -->
	<!-- Google Tag Manager (noscript) -->
	<!-- <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K2CZWRP"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript> -->
	<!-- End Google Tag Manager (noscript) -->
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript" id="wd-flicker-fix">// Flicker fix.</script>

	<div class="website-wrapper">
		<header class="whb-header whb-default_header whb-sticky-shadow whb-scroll-stick whb-sticky-real">
			<link rel="stylesheet" id="wd-header-base-css"
				href="wp-content/themes/woodmart/css/parts/header-base.min.css?ver=7.1.4" type="text/css" media="all" />
			<link rel="stylesheet" id="wd-mod-tools-css"
				href="wp-content/themes/woodmart/css/parts/mod-tools.min.css?ver=7.1.4" type="text/css" media="all" />
			<div class="whb-main-header">

				<div
					class="whb-row whb-top-bar whb-not-sticky-row whb-with-bg whb-without-border whb-color-dark whb-flex-flex-middle">
					<div class="container">
						<div class="whb-flex-row whb-top-bar-inner">
							<div class="whb-column whb-col-left whb-visible-lg whb-empty-column">
							</div>
							<div class="whb-column whb-col-center whb-visible-lg">
								<link rel="stylesheet" id="wd-header-elements-base-css"
									href="wp-content/themes/woodmart/css/parts/header-el-base.min.css?ver=7.1.4"
									type="text/css" media="all" />
								<div class="wd-header-text set-cont-mb-s reset-last-child ">
									<h5 style="text-align: center;"><span style="color: #ffffff;">Navratri Sale Live!
											Flat 10% off on orders above ₹499. Code: "NAVRATRI"</span></h5>
								</div>
							</div>
							<div class="whb-column whb-col-right whb-visible-lg whb-empty-column">
							</div>
							<div class="whb-column whb-col-mobile whb-hidden-lg">

								<div class="wd-header-text set-cont-mb-s reset-last-child ">
									<h5 style="text-align: center;"><span style="color: #ffffff;">Navratri Sale Live!
											Flat 10% off on orders above ₹499. Code: "NAVRATRI</span></h5>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div
					class="whb-row whb-general-header whb-sticky-row whb-with-bg whb-border-fullwidth whb-color-dark whb-flex-flex-middle">
					<div class="container">
						<div class="whb-flex-row whb-general-header-inner">
							<div class="whb-column whb-col-left whb-visible-lg">
								<div class="site-logo">
									<a href="https://pragssalty.com/" class="wd-logo wd-main-logo" rel="home">
										<img src="wp-content/uploads/2024/01/slazzer-edit-image-1.png" alt="Prags Salty"
											style="max-width: 250px;" /> </a>
								</div>
							</div>
							<div class="whb-column whb-col-center whb-visible-lg">
								<div class="wd-header-nav wd-header-main-nav text-left wd-design-1" role="navigation"
									aria-label="Main navigation">
									<ul id="menu-main-menu" class="menu wd-nav wd-nav-main wd-style-default wd-gap-s">
										<li id="menu-item-1380"
											class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-1380 item-level-0 menu-simple-dropdown wd-event-hover">
											<a href="https://pragssalty.com/" class="woodmart-nav-link"><span
													class="nav-link-text">Home</span></a></li>
										<li id="menu-item-1388"
											class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1388 item-level-0 menu-simple-dropdown wd-event-hover">
											<a href="https://pragssalty.com/about-us/" class="woodmart-nav-link"><span
													class="nav-link-text">About Us</span></a></li>
										<li id="menu-item-1381"
											class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1381 item-level-0 menu-simple-dropdown wd-event-hover">
											<a href="https://pragssalty.com/products/" class="woodmart-nav-link"><span
													class="nav-link-text">Products</span></a>
											<div
												class="color-scheme-dark wd-design-default wd-dropdown-menu wd-dropdown">
												<div class="container">
													<ul class="wd-sub-menu color-scheme-dark">
														<li id="menu-item-2264"
															class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2264 item-level-1 wd-event-hover">
															<a href="https://pragssalty.com/product-category/roasted/"
																class="woodmart-nav-link">Roasted</a></li>
														<li id="menu-item-2265"
															class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2265 item-level-1 wd-event-hover">
															<a href="https://pragssalty.com/product-category/namkeen/"
																class="woodmart-nav-link">Namkeen</a></li>
														<li id="menu-item-2266"
															class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2266 item-level-1 wd-event-hover">
															<a href="https://pragssalty.com/product-category/fox-nuts/"
																class="woodmart-nav-link">Fox Nuts</a></li>
														<li id="menu-item-2969"
															class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2969 item-level-1 wd-event-hover">
															<a href="https://pragssalty.com/product-category/sweets/"
																class="woodmart-nav-link">Sweets</a></li>
														<li id="menu-item-11236"
															class="menu-item menu-item-type-custom menu-item-object-custom menu-item-11236 item-level-1 wd-event-hover">
															<a href="https://pragssalty.com/product-category/combos/"
																class="woodmart-nav-link">Combos</a></li>
													</ul>
												</div>
											</div>
										</li>
										<li id="menu-item-10676"
											class="menu-item menu-item-type-custom menu-item-object-custom menu-item-10676 item-level-0 menu-simple-dropdown wd-event-hover">
											<a href="https://pragssalty.com/blogs/" class="woodmart-nav-link"><span
													class="nav-link-text">Blogs</span></a></li>
										<li id="menu-item-1389"
											class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1389 item-level-0 menu-simple-dropdown wd-event-hover">
											<a href="https://pragssalty.com/contact-us/" class="woodmart-nav-link"><span
													class="nav-link-text">Contact Us</span></a></li>
									</ul>
								</div><!--END MAIN-NAV-->
								<link rel="stylesheet" id="wd-header-search-css"
									href="wp-content/themes/woodmart/css/parts/header-el-search.min.css?ver=7.1.4"
									type="text/css" media="all" />
								<link rel="stylesheet" id="wd-header-search-form-css"
									href="wp-content/themes/woodmart/css/parts/header-el-search-form.min.css?ver=7.1.4"
									type="text/css" media="all" />
								<link rel="stylesheet" id="wd-wd-search-results-css"
									href="wp-content/themes/woodmart/css/parts/wd-search-results.min.css?ver=7.1.4"
									type="text/css" media="all" />
								<link rel="stylesheet" id="wd-wd-search-form-css"
									href="wp-content/themes/woodmart/css/parts/wd-search-form.min.css?ver=7.1.4"
									type="text/css" media="all" />
								<div
									class="wd-search-form wd-header-search-form wd-display-form whb-duljtjrl87kj7pmuut6b">


									<form role="search" method="get"
										class="searchform  wd-style-default wd-cat-style-bordered woodmart-ajax-search"
										action="https://pragssalty.com/" data-thumbnail="1" data-price="1"
										data-post_type="product" data-count="20" data-sku="0" data-symbols_count="3">
										<input type="text" class="s" placeholder="Search for products" value="" name="s"
											aria-label="Search" title="Search for products" required />
										<input type="hidden" name="post_type" value="product">
										<button type="submit" class="searchsubmit">
											<span>
												Search </span>
										</button>
									</form>



									<div class="search-results-wrapper">
										<div class="wd-dropdown-results wd-scroll wd-dropdown">
											<div class="wd-scroll-content"></div>
										</div>
									</div>


								</div>
								<div class="whb-space-element " style="width:30px;"></div>
							</div>
							<div class="whb-column whb-col-right whb-visible-lg">
								<link rel="stylesheet" id="wd-header-my-account-dropdown-css"
									href="wp-content/themes/woodmart/css/parts/header-el-my-account-dropdown.min.css?ver=7.1.4"
									type="text/css" media="all" />
								<link rel="stylesheet" id="wd-woo-mod-login-form-css"
									href="wp-content/themes/woodmart/css/parts/woo-mod-login-form.min.css?ver=7.1.4"
									type="text/css" media="all" />
								<link rel="stylesheet" id="wd-header-my-account-css"
									href="wp-content/themes/woodmart/css/parts/header-el-my-account.min.css?ver=7.1.4"
									type="text/css" media="all" />
								<div
									class="wd-header-my-account wd-tools-element wd-event-hover wd-design-1 wd-account-style-icon whb-2b8mjqhbtvxz16jtxdrd">
									<a href="https://pragssalty.com/my-account/" title="My account">

										<span class="wd-tools-icon">
										</span>
										<span class="wd-tools-text">
											Login / Register </span>

									</a>


									<div class="wd-dropdown wd-dropdown-register">
										<div class="login-dropdown-inner">
											<span class="wd-heading"><span class="title">Sign in</span><a
													class="create-account-link"
													href="https://pragssalty.com/my-account/?action=register">Create an
													Account</a></span>
											<form method="post" class="login woocommerce-form woocommerce-form-login
						" action="https://pragssalty.com/my-account/">



												<p
													class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide form-row-username">
													<label for="username">Username or email address&nbsp;<span
															class="required">*</span></label>
													<input type="text"
														class="woocommerce-Input woocommerce-Input--text input-text"
														name="username" id="username" value="" />
												</p>
												<p
													class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide form-row-password">
													<label for="password">Password&nbsp;<span
															class="required">*</span></label>
													<input class="woocommerce-Input woocommerce-Input--text input-text"
														type="password" name="password" id="password"
														autocomplete="current-password" />
												</p>

												<div class="g-recaptcha-wrap" style="padding:10px 0 10px 0">
													<div id="woo_recaptcha_1" class="g-recaptcha"
														data-sitekey="6LcQbn0pAAAAAK6GbM71LXlWQOqPJBrv8raQ6NdA"></div>
												</div>
												<p class="form-row">
													<input type="hidden" id="woocommerce-login-nonce"
														name="woocommerce-login-nonce" value="d79e3d26d0" /><input
														type="hidden" name="_wp_http_referer" value="/track-order/" />
													<button type="submit"
														class="button woocommerce-button woocommerce-form-login__submit"
														name="login" value="Log in">Log in</button>
												</p>

												<p class="login-form-footer">
													<a href="https://pragssalty.com/my-account/lost-password/"
														class="woocommerce-LostPassword lost_password">Lost your
														password?</a>
													<label
														class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
														<input
															class="woocommerce-form__input woocommerce-form__input-checkbox"
															name="rememberme" type="checkbox" value="forever"
															title="Remember me" aria-label="Remember me" />
														<span>Remember me</span>
													</label>
												</p>

												<link rel="stylesheet" id="wd-woo-opt-social-login-css"
													href="wp-content/themes/woodmart/css/parts/woo-opt-social-login.min.css?ver=7.1.4"
													type="text/css" media="all" />
												<p class="title wd-login-divider "><span>Or login with</span></p>
												<div class="wd-social-login">
													<a href="https://pragssalty.com/my-account/?social_auth=google"
														class="login-goo-link btn">Google</a>
												</div>

											</form>


										</div>
									</div>
								</div>
								<link rel="stylesheet" id="wd-header-cart-side-css"
									href="wp-content/themes/woodmart/css/parts/header-el-cart-side.min.css?ver=7.1.4"
									type="text/css" media="all" />
								<link rel="stylesheet" id="wd-woo-mod-quantity-css"
									href="wp-content/themes/woodmart/css/parts/woo-mod-quantity.min.css?ver=7.1.4"
									type="text/css" media="all" />
								<link rel="stylesheet" id="wd-header-cart-css"
									href="wp-content/themes/woodmart/css/parts/header-el-cart.min.css?ver=7.1.4"
									type="text/css" media="all" />
								<link rel="stylesheet" id="wd-widget-shopping-cart-css"
									href="wp-content/themes/woodmart/css/parts/woo-widget-shopping-cart.min.css?ver=7.1.4"
									type="text/css" media="all" />
								<link rel="stylesheet" id="wd-widget-product-list-css"
									href="wp-content/themes/woodmart/css/parts/woo-widget-product-list.min.css?ver=7.1.4"
									type="text/css" media="all" />
								<div
									class="wd-header-cart wd-tools-element wd-design-5 cart-widget-opener whb-5u866sftq6yga790jxf3">
									<a href="https://pragssalty.com/cart/" title="Shopping cart">

										<span class="wd-tools-icon wd-icon-alt">
											<span class="wd-cart-number wd-tools-count">8 <span>items</span></span>
										</span>
										<span class="wd-tools-text">

											<span class="wd-cart-subtotal"><span
													class="woocommerce-Price-amount amount"><bdi><span
															class="woocommerce-Price-currencySymbol">&#8377;</span>4,903.00</bdi></span></span>
										</span>

									</a>
								</div>
							</div>
							<div class="whb-column whb-mobile-left whb-hidden-lg">
								<div
									class="wd-tools-element wd-header-mobile-nav wd-style-icon wd-design-1 whb-wn5z894j1g5n0yp3eeuz">
									<a href="#" rel="nofollow" aria-label="Open mobile menu">

										<span class="wd-tools-icon">
										</span>

										<span class="wd-tools-text">Menu</span>

									</a>
								</div><!--END wd-header-mobile-nav-->
							</div>
							<div class="whb-column whb-mobile-center whb-hidden-lg">
								<div class="site-logo">
									<a href="https://pragssalty.com/" class="wd-logo wd-main-logo" rel="home">
										<img src="wp-content/uploads/2024/01/slazzer-edit-image-1.png" alt="Prags Salty"
											style="max-width: 149px;" /> </a>
								</div>
							</div>
							<div class="whb-column whb-mobile-right whb-hidden-lg">

								<div
									class="wd-header-search wd-tools-element wd-header-search-mobile wd-display-icon whb-6o3ywcqlos79wmtp8ui8 wd-style-icon wd-design-1">
									<a href="#" rel="nofollow noopener" aria-label="Search">

										<span class="wd-tools-icon">
										</span>

										<span class="wd-tools-text">
											Search </span>

									</a>
								</div>

								<div
									class="wd-header-cart wd-tools-element wd-design-5 cart-widget-opener whb-u6cx6mzhiof1qeysah9h">
									<a href="https://pragssalty.com/cart/" title="Shopping cart">

										<span class="wd-tools-icon wd-icon-alt">
											<span class="wd-cart-number wd-tools-count">8 <span>items</span></span>
										</span>
										<span class="wd-tools-text">

											<span class="wd-cart-subtotal"><span
													class="woocommerce-Price-amount amount"><bdi><span
															class="woocommerce-Price-currencySymbol">&#8377;</span>4,903.00</bdi></span></span>
										</span>

									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>

		<div class="main-page-wrapper">

			<link rel="stylesheet" id="wd-page-title-css"
				href="wp-content/themes/woodmart/css/parts/page-title.min.css?ver=7.1.4" type="text/css" media="all" />
			<div class="page-title  page-title-default title-size-small title-design-centered color-scheme-light"
				style="">
				<div class="container">
					<h1 class="entry-title title">
						Track your order </h1>


				</div>
			</div>

			<!-- MAIN CONTENT AREA -->
			<div class="container">
				<div class="row content-layout-wrapper align-items-start">

					<div class="site-content col-lg-12 col-12 col-md-12" role="main">

						<article id="post-2197" class="post-2197 page type-page status-publish hentry">

							<div class="entry-content">
								<div data-elementor-type="wp-page" data-elementor-id="2197"
									class="elementor elementor-2197" data-elementor-post-type="page">
									<section data-particle_enable="false" data-particle-mobile-disabled="false"
										class="wd-negative-gap elementor-section elementor-top-section elementor-element elementor-element-64467d09 elementor-section-boxed elementor-section-height-default elementor-section-height-default wd-section-disabled"
										data-id="64467d09" data-element_type="section">
										<div class="elementor-container elementor-column-gap-default">
											<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-6e2ee7c"
												data-id="6e2ee7c" data-element_type="column">
												<div class="elementor-widget-wrap elementor-element-populated">
													<div class="elementor-element elementor-element-11a38ef9 elementor-widget elementor-widget-wd_title"
														data-id="11a38ef9" data-element_type="widget"
														data-widget_type="wd_title.default">
														<div class="elementor-widget-container">
															<link rel="stylesheet" id="wd-section-title-css"
																href="wp-content/themes/woodmart/css/parts/el-section-title.min.css?ver=7.1.4"
																type="text/css" media="all" />
															<div
																class="title-wrapper set-mb-s reset-last-child wd-title-color-default wd-title-style-default wd-title-size-default text-center">


																<div class="liner-continer">
																	<h4
																		class="woodmart-title-container title wd-fontsize-l">
																		Order Tracking</h4>
																</div>

															</div>
														</div>
													</div>
													<div class="elementor-element elementor-element-6bead01b elementor-widget elementor-widget-wc-elements"
														data-id="6bead01b" data-element_type="widget"
														data-widget_type="wc-elements.default">
														

 										<div class="container" style=" overflow-x: scroll;">


<table id="table" 
			 data-toggle="table"
			 data-search="true"
			 data-filter-control="true" 
			 data-show-export="true"
			 data-click-to-select="true"
			 data-toolbar="#toolbar"
       class="table-responsive">
	<thead>
		<tr>
			<th data-field="state" data-checkbox="true"></th>
			<th data-field="prenom" data-filter-control="input" data-sortable="true">Name</th>
			<th data-field="date" data-filter-control="select" data-sortable="true">Address</th>
			<th data-field="examen" data-filter-control="select" data-sortable="true">Total Amount</th>
			<th data-field="note" data-sortable="true">Order Date</th>
		</tr>
	</thead>
	<tbody>

	<?php foreach($orders as $row){
		?>
		<tr>
			<td class="bs-checkbox "><a href="orderDetail.php?id=<?=$row["id"] ?>"><button name="track">Show Detail</button></a></td>
			<td><?=$row["user_name"] ?></td>
			<td><?=$row["address"] ?></td>
			<td><?=$row["grand_total"] ?></td>
			<td><?=$row["date"] ?></td>
           
		</tr>
		
<?php } ?>
  
	</tbody>
</table>
</div>
												</div>
											</div>
										</div>
									</section>
								</div>
							</div>


						</article><!-- #post -->



					</div><!-- .site-content -->



					<link rel="stylesheet" id="wd-widget-collapse-css"
						href="wp-content/themes/woodmart/css/parts/opt-widget-collapse.min.css?ver=7.1.4"
						type="text/css" media="all" />
				</div><!-- .main-page-wrapper -->
			</div> <!-- end row -->
		</div> <!-- end container -->

<script>
</script>
		<footer class="footer-container color-scheme-light">
			<link rel="stylesheet" id="wd-footer-base-css"
				href="wp-content/themes/woodmart/css/parts/footer-base.min.css?ver=7.1.4" type="text/css" media="all" />
			<div class="container main-footer">
				<link rel="stylesheet" id="elementor-post-2129-css"
					href="wp-content/uploads/elementor/css/post-2129.css?ver=1712761393" type="text/css" media="all">
				<div data-elementor-type="wp-post" data-elementor-id="2129" class="elementor elementor-2129"
					data-elementor-post-type="cms_block">
					<section data-particle_enable="false" data-particle-mobile-disabled="false"
						class="wd-negative-gap elementor-section elementor-top-section elementor-element elementor-element-93e20ab wd-section-stretch elementor-section-boxed elementor-section-height-default elementor-section-height-default"
						data-id="93e20ab" data-element_type="section"
						data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
						<div class="elementor-container elementor-column-gap-default">
							<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-23181e4"
								data-id="23181e4" data-element_type="column">
								<div class="elementor-widget-wrap elementor-element-populated">
									<div class="elementor-element elementor-element-e28036a elementor-position-top elementor-widget elementor-widget-image-box"
										data-id="e28036a" data-element_type="widget"
										data-widget_type="image-box.default">
										<div class="elementor-widget-container">
											<style>
												/*! elementor - v3.20.0 - 10-04-2024 */
												.elementor-widget-image-box .elementor-image-box-content {
													width: 100%
												}

												@media (min-width:768px) {

													.elementor-widget-image-box.elementor-position-left .elementor-image-box-wrapper,
													.elementor-widget-image-box.elementor-position-right .elementor-image-box-wrapper {
														display: flex
													}

													.elementor-widget-image-box.elementor-position-right .elementor-image-box-wrapper {
														text-align: right;
														flex-direction: row-reverse
													}

													.elementor-widget-image-box.elementor-position-left .elementor-image-box-wrapper {
														text-align: left;
														flex-direction: row
													}

													.elementor-widget-image-box.elementor-position-top .elementor-image-box-img {
														margin: auto
													}

													.elementor-widget-image-box.elementor-vertical-align-top .elementor-image-box-wrapper {
														align-items: flex-start
													}

													.elementor-widget-image-box.elementor-vertical-align-middle .elementor-image-box-wrapper {
														align-items: center
													}

													.elementor-widget-image-box.elementor-vertical-align-bottom .elementor-image-box-wrapper {
														align-items: flex-end
													}
												}

												@media (max-width:767px) {
													.elementor-widget-image-box .elementor-image-box-img {
														margin-left: auto !important;
														margin-right: auto !important;
														margin-bottom: 15px
													}
												}

												.elementor-widget-image-box .elementor-image-box-img {
													display: inline-block
												}

												.elementor-widget-image-box .elementor-image-box-title a {
													color: inherit
												}

												.elementor-widget-image-box .elementor-image-box-wrapper {
													text-align: center
												}

												.elementor-widget-image-box .elementor-image-box-description {
													margin: 0
												}
											</style>
											<div class="elementor-image-box-wrapper">
												<figure class="elementor-image-box-img"><img width="512" height="512"
														src="wp-content/uploads/2023/06/premium.png"
														class="attachment-full size-full wp-image-2121" alt="" />
												</figure>
												<div class="elementor-image-box-content">
													<h3 class="elementor-image-box-title">Premium Products</h3>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-1283b3a"
								data-id="1283b3a" data-element_type="column">
								<div class="elementor-widget-wrap elementor-element-populated">
									<div class="elementor-element elementor-element-74934b0 elementor-position-top elementor-widget elementor-widget-image-box"
										data-id="74934b0" data-element_type="widget"
										data-widget_type="image-box.default">
										<div class="elementor-widget-container">
											<div class="elementor-image-box-wrapper">
												<figure class="elementor-image-box-img"><img width="512" height="512"
														src="wp-content/uploads/2023/06/healthy-heart.png"
														class="attachment-full size-full wp-image-10916" alt="" />
												</figure>
												<div class="elementor-image-box-content">
													<h3 class="elementor-image-box-title">Healthy Snacks</h3>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-9b1581f"
								data-id="9b1581f" data-element_type="column">
								<div class="elementor-widget-wrap elementor-element-populated">
									<div class="elementor-element elementor-element-8a0cf4c elementor-position-top elementor-widget elementor-widget-image-box"
										data-id="8a0cf4c" data-element_type="widget"
										data-widget_type="image-box.default">
										<div class="elementor-widget-container">
											<div class="elementor-image-box-wrapper">
												<figure class="elementor-image-box-img"><img width="512" height="512"
														src="wp-content/uploads/2023/06/delivery-car.png"
														class="attachment-full size-full wp-image-2123" alt="" />
												</figure>
												<div class="elementor-image-box-content">
													<h3 class="elementor-image-box-title">Fast Delivery</h3>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-b8bb875"
								data-id="b8bb875" data-element_type="column">
								<div class="elementor-widget-wrap elementor-element-populated">
									<div class="elementor-element elementor-element-00d9126 elementor-position-top elementor-widget elementor-widget-image-box"
										data-id="00d9126" data-element_type="widget"
										data-widget_type="image-box.default">
										<div class="elementor-widget-container">
											<div class="elementor-image-box-wrapper">
												<figure class="elementor-image-box-img"><img width="512" height="512"
														src="wp-content/uploads/2023/06/padlock-1.png"
														class="attachment-full size-full wp-image-2124" alt="" />
												</figure>
												<div class="elementor-image-box-content">
													<h3 class="elementor-image-box-title">Safe & Secure</h3>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
					<section data-particle_enable="false" data-particle-mobile-disabled="false"
						class="wd-negative-gap elementor-section elementor-top-section elementor-element elementor-element-3962f7b wd-section-stretch elementor-section-boxed elementor-section-height-default elementor-section-height-default"
						data-id="3962f7b" data-element_type="section"
						data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
						<div class="elementor-container elementor-column-gap-default">
							<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-00a14fb"
								data-id="00a14fb" data-element_type="column">
								<div class="elementor-widget-wrap elementor-element-populated">
									<div class="elementor-element elementor-element-0bdfb46 elementor-widget elementor-widget-wd_title"
										data-id="0bdfb46" data-element_type="widget"
										data-widget_type="wd_title.default">
										<div class="elementor-widget-container">
											<div
												class="title-wrapper set-mb-s reset-last-child wd-title-color-default wd-title-style-default wd-title-size-default text-left">


												<div class="liner-continer">
													<h4 class="woodmart-title-container title wd-fontsize-l">Contact us
													</h4>
												</div>

											</div>
										</div>
									</div>
									<div class="elementor-element elementor-element-7bc57ee elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list"
										data-id="7bc57ee" data-element_type="widget"
										data-widget_type="icon-list.default">
										<div class="elementor-widget-container">
											<link rel="stylesheet"
												href="wp-content/plugins/elementor/assets/css/widget-icon-list.min.css">
											<ul class="elementor-icon-list-items">
												<li class="elementor-icon-list-item">
													<span class="elementor-icon-list-icon">
														<i aria-hidden="true" class="fas fa-map-marker-alt"></i> </span>
													<span class="elementor-icon-list-text">Plot no. 98, Sindhi Colony,
														near Jaljog Circle, Jodhpur, Rajasthan, 342003</span>
												</li>
											</ul>
										</div>
									</div>
									<div class="elementor-element elementor-element-0c3b68f elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list"
										data-id="0c3b68f" data-element_type="widget"
										data-widget_type="icon-list.default">
										<div class="elementor-widget-container">
											<ul class="elementor-icon-list-items">
												<li class="elementor-icon-list-item">
													<a href="tel:9929321144">

														<span class="elementor-icon-list-icon">
															<i aria-hidden="true" class="fas fa-phone-alt"></i> </span>
														<span class="elementor-icon-list-text">(+91) 9929321144</span>
													</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="elementor-element elementor-element-db07235 elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list"
										data-id="db07235" data-element_type="widget"
										data-widget_type="icon-list.default">
										<div class="elementor-widget-container">
											<ul class="elementor-icon-list-items">
												<li class="elementor-icon-list-item">
													<a href="mailto:contact@pragssalty.com">

														<span class="elementor-icon-list-icon">
															<i aria-hidden="true" class="fas fa-envelope"></i> </span>
														<span
															class="elementor-icon-list-text">contact@pragssalty.com</span>
													</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="elementor-element elementor-element-a322d2e elementor-shape-circle e-grid-align-mobile-left e-grid-align-left elementor-grid-0 elementor-widget elementor-widget-social-icons"
										data-id="a322d2e" data-element_type="widget"
										data-widget_type="social-icons.default">
										<div class="elementor-widget-container">
											<style>
												/*! elementor - v3.20.0 - 10-04-2024 */
												.elementor-widget-social-icons.elementor-grid-0 .elementor-widget-container,
												.elementor-widget-social-icons.elementor-grid-mobile-0 .elementor-widget-container,
												.elementor-widget-social-icons.elementor-grid-tablet-0 .elementor-widget-container {
													line-height: 1;
													font-size: 0
												}

												.elementor-widget-social-icons:not(.elementor-grid-0):not(.elementor-grid-tablet-0):not(.elementor-grid-mobile-0) .elementor-grid {
													display: inline-grid
												}

												.elementor-widget-social-icons .elementor-grid {
													grid-column-gap: var(--grid-column-gap, 5px);
													grid-row-gap: var(--grid-row-gap, 5px);
													grid-template-columns: var(--grid-template-columns);
													justify-content: var(--justify-content, center);
													justify-items: var(--justify-content, center)
												}

												.elementor-icon.elementor-social-icon {
													font-size: var(--icon-size, 25px);
													line-height: var(--icon-size, 25px);
													width: calc(var(--icon-size, 25px) + 2 * var(--icon-padding, .5em));
													height: calc(var(--icon-size, 25px) + 2 * var(--icon-padding, .5em))
												}

												.elementor-social-icon {
													--e-social-icon-icon-color: #fff;
													display: inline-flex;
													background-color: #69727d;
													align-items: center;
													justify-content: center;
													text-align: center;
													cursor: pointer
												}

												.elementor-social-icon i {
													color: var(--e-social-icon-icon-color)
												}

												.elementor-social-icon svg {
													fill: var(--e-social-icon-icon-color)
												}

												.elementor-social-icon:last-child {
													margin: 0
												}

												.elementor-social-icon:hover {
													opacity: .9;
													color: #fff
												}

												.elementor-social-icon-android {
													background-color: #a4c639
												}

												.elementor-social-icon-apple {
													background-color: #999
												}

												.elementor-social-icon-behance {
													background-color: #1769ff
												}

												.elementor-social-icon-bitbucket {
													background-color: #205081
												}

												.elementor-social-icon-codepen {
													background-color: #000
												}

												.elementor-social-icon-delicious {
													background-color: #39f
												}

												.elementor-social-icon-deviantart {
													background-color: #05cc47
												}

												.elementor-social-icon-digg {
													background-color: #005be2
												}

												.elementor-social-icon-dribbble {
													background-color: #ea4c89
												}

												.elementor-social-icon-elementor {
													background-color: #d30c5c
												}

												.elementor-social-icon-envelope {
													background-color: #ea4335
												}

												.elementor-social-icon-facebook,
												.elementor-social-icon-facebook-f {
													background-color: #3b5998
												}

												.elementor-social-icon-flickr {
													background-color: #0063dc
												}

												.elementor-social-icon-foursquare {
													background-color: #2d5be3
												}

												.elementor-social-icon-free-code-camp,
												.elementor-social-icon-freecodecamp {
													background-color: #006400
												}

												.elementor-social-icon-github {
													background-color: #333
												}

												.elementor-social-icon-gitlab {
													background-color: #e24329
												}

												.elementor-social-icon-globe {
													background-color: #69727d
												}

												.elementor-social-icon-google-plus,
												.elementor-social-icon-google-plus-g {
													background-color: #dd4b39
												}

												.elementor-social-icon-houzz {
													background-color: #7ac142
												}

												.elementor-social-icon-instagram {
													background-color: #262626
												}

												.elementor-social-icon-jsfiddle {
													background-color: #487aa2
												}

												.elementor-social-icon-link {
													background-color: #818a91
												}

												.elementor-social-icon-linkedin,
												.elementor-social-icon-linkedin-in {
													background-color: #0077b5
												}

												.elementor-social-icon-medium {
													background-color: #00ab6b
												}

												.elementor-social-icon-meetup {
													background-color: #ec1c40
												}

												.elementor-social-icon-mixcloud {
													background-color: #273a4b
												}

												.elementor-social-icon-odnoklassniki {
													background-color: #f4731c
												}

												.elementor-social-icon-pinterest {
													background-color: #bd081c
												}

												.elementor-social-icon-product-hunt {
													background-color: #da552f
												}

												.elementor-social-icon-reddit {
													background-color: #ff4500
												}

												.elementor-social-icon-rss {
													background-color: #f26522
												}

												.elementor-social-icon-shopping-cart {
													background-color: #4caf50
												}

												.elementor-social-icon-skype {
													background-color: #00aff0
												}

												.elementor-social-icon-slideshare {
													background-color: #0077b5
												}

												.elementor-social-icon-snapchat {
													background-color: #fffc00
												}

												.elementor-social-icon-soundcloud {
													background-color: #f80
												}

												.elementor-social-icon-spotify {
													background-color: #2ebd59
												}

												.elementor-social-icon-stack-overflow {
													background-color: #fe7a15
												}

												.elementor-social-icon-steam {
													background-color: #00adee
												}

												.elementor-social-icon-stumbleupon {
													background-color: #eb4924
												}

												.elementor-social-icon-telegram {
													background-color: #2ca5e0
												}

												.elementor-social-icon-threads {
													background-color: #000
												}

												.elementor-social-icon-thumb-tack {
													background-color: #1aa1d8
												}

												.elementor-social-icon-tripadvisor {
													background-color: #589442
												}

												.elementor-social-icon-tumblr {
													background-color: #35465c
												}

												.elementor-social-icon-twitch {
													background-color: #6441a5
												}

												.elementor-social-icon-twitter {
													background-color: #1da1f2
												}

												.elementor-social-icon-viber {
													background-color: #665cac
												}

												.elementor-social-icon-vimeo {
													background-color: #1ab7ea
												}

												.elementor-social-icon-vk {
													background-color: #45668e
												}

												.elementor-social-icon-weibo {
													background-color: #dd2430
												}

												.elementor-social-icon-weixin {
													background-color: #31a918
												}

												.elementor-social-icon-whatsapp {
													background-color: #25d366
												}

												.elementor-social-icon-wordpress {
													background-color: #21759b
												}

												.elementor-social-icon-x-twitter {
													background-color: #000
												}

												.elementor-social-icon-xing {
													background-color: #026466
												}

												.elementor-social-icon-yelp {
													background-color: #af0606
												}

												.elementor-social-icon-youtube {
													background-color: #cd201f
												}

												.elementor-social-icon-500px {
													background-color: #0099e5
												}

												.elementor-shape-rounded .elementor-icon.elementor-social-icon {
													border-radius: 10%
												}

												.elementor-shape-circle .elementor-icon.elementor-social-icon {
													border-radius: 50%
												}
											</style>
											<div class="elementor-social-icons-wrapper elementor-grid">
												<span class="elementor-grid-item">
													<a class="elementor-icon elementor-social-icon elementor-social-icon-facebook elementor-repeater-item-ba7e7c7"
														href="https://www.facebook.com/pragssaltyjodhpur"
														target="_blank">
														<span class="elementor-screen-only">Facebook</span>
														<i class="fab fa-facebook"></i> </a>
												</span>
												<span class="elementor-grid-item">
													<a class="elementor-icon elementor-social-icon elementor-social-icon-instagram elementor-repeater-item-62f5036"
														href="https://www.instagram.com/prags_salty/" target="_blank">
														<span class="elementor-screen-only">Instagram</span>
														<i class="fab fa-instagram"></i> </a>
												</span>
												<span class="elementor-grid-item">
													<a class="elementor-icon elementor-social-icon elementor-social-icon-youtube elementor-repeater-item-f00cb28"
														href="https://youtube.com/@PRagsSalty" target="_blank">
														<span class="elementor-screen-only">Youtube</span>
														<i class="fab fa-youtube"></i> </a>
												</span>
												<span class="elementor-grid-item">
													<a class="elementor-icon elementor-social-icon elementor-social-icon-pinterest elementor-repeater-item-2745444"
														href="https://in.pinterest.com/prags_salty/" target="_blank">
														<span class="elementor-screen-only">Pinterest</span>
														<i class="fab fa-pinterest"></i> </a>
												</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-c1a6497"
								data-id="c1a6497" data-element_type="column">
								<div class="elementor-widget-wrap elementor-element-populated">
									<div class="elementor-element elementor-element-ad2b6f9 elementor-widget elementor-widget-wd_title"
										data-id="ad2b6f9" data-element_type="widget"
										data-widget_type="wd_title.default">
										<div class="elementor-widget-container">
											<div
												class="title-wrapper set-mb-s reset-last-child wd-title-color-default wd-title-style-default wd-title-size-default text-left">


												<div class="liner-continer">
													<h4 class="woodmart-title-container title wd-fontsize-l">SHOP BY
														CATEGORY</h4>
												</div>

											</div>
										</div>
									</div>
									<div class="elementor-element elementor-element-21a95c9 elementor-widget elementor-widget-wd_list"
										data-id="21a95c9" data-element_type="widget" data-widget_type="wd_list.default">
										<div class="elementor-widget-container">
											<link rel="stylesheet" id="wd-list-css"
												href="wp-content/themes/woodmart/css/parts/el-list.min.css?ver=7.1.4"
												type="text/css" media="all" />
											<ul
												class="wd-list color-scheme-custom wd-fontsize-xs wd-list-type-icon wd-list-style-default wd-justify-left">
												<li class="elementor-repeater-item-c77fc22">

													<span class="list-content">
														Roasted </span>


													<a href="https://pragssalty.com/product-category/roasted/"
														class="wd-fill" aria-label="List item link"></a>
												</li>
												<li class="elementor-repeater-item-b7b0231">

													<span class="list-content">
														Namkeen </span>


													<a href="https://pragssalty.com/product-category/namkeen/"
														class="wd-fill" aria-label="List item link"></a>
												</li>
												<li class="elementor-repeater-item-f93516b">

													<span class="list-content">
														Fox Nuts </span>


													<a href="https://pragssalty.com/product-category/fox-nuts/"
														class="wd-fill" aria-label="List item link"></a>
												</li>
												<li class="elementor-repeater-item-1540aa8">

													<span class="list-content">
														Sweets </span>


													<a href="https://pragssalty.com/product-category/sweets/"
														class="wd-fill" aria-label="List item link"></a>
												</li>
												<li class="elementor-repeater-item-e92cf53">

													<span class="list-content">
														Combos </span>


													<a href="https://pragssalty.com/product-category/combos/"
														class="wd-fill" aria-label="List item link"></a>
												</li>
											</ul>

										</div>
									</div>
								</div>
							</div>
							<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-dd3cc4a"
								data-id="dd3cc4a" data-element_type="column">
								<div class="elementor-widget-wrap elementor-element-populated">
									<div class="elementor-element elementor-element-ffafd20 elementor-widget elementor-widget-wd_title"
										data-id="ffafd20" data-element_type="widget"
										data-widget_type="wd_title.default">
										<div class="elementor-widget-container">
											<div
												class="title-wrapper set-mb-s reset-last-child wd-title-color-default wd-title-style-default wd-title-size-default text-left">


												<div class="liner-continer">
													<h4 class="woodmart-title-container title wd-fontsize-l">our company
													</h4>
												</div>

											</div>
										</div>
									</div>
									<div class="elementor-element elementor-element-51858ce elementor-widget elementor-widget-wd_list"
										data-id="51858ce" data-element_type="widget" data-widget_type="wd_list.default">
										<div class="elementor-widget-container">
											<ul
												class="wd-list color-scheme-custom wd-fontsize-xs wd-list-type-icon wd-list-style-default wd-justify-left">
												<li class="elementor-repeater-item-1540aa8">

													<span class="list-content">
														About Us </span>


													<a href="https://pragssalty.com/about-us/" class="wd-fill"
														aria-label="List item link"></a>
												</li>
												<li class="elementor-repeater-item-c77fc22">

													<span class="list-content">
														Contact Us </span>


													<a href="https://pragssalty.com/contact-us/" class="wd-fill"
														aria-label="List item link"></a>
												</li>
												<li class="elementor-repeater-item-f93516b">

													<span class="list-content">
														Our Blog </span>


													<a href="https://pragssalty.com/blog/" class="wd-fill"
														aria-label="List item link"></a>
												</li>
											</ul>

										</div>
									</div>
									<div class="elementor-element elementor-element-ee4ed93 elementor-widget elementor-widget-image"
										data-id="ee4ed93" data-element_type="widget" data-widget_type="image.default">
										<div class="elementor-widget-container">
											<style>
												/*! elementor - v3.20.0 - 10-04-2024 */
												.elementor-widget-image {
													text-align: center
												}

												.elementor-widget-image a {
													display: inline-block
												}

												.elementor-widget-image a img[src$=".svg"] {
													width: 48px
												}

												.elementor-widget-image img {
													vertical-align: middle;
													display: inline-block
												}
											</style> <img
												src="wp-content/uploads/elementor/thumbs/FSSAI_logo-qhknfg5w7q5sou0mwj9etsyho23217v1nl6qnl44cg.png"
												title="FSSAI_logo" alt="pragssalty - fssai" loading="lazy" />
										</div>
									</div>
									<div class="elementor-element elementor-element-0c93ff4 elementor-widget elementor-widget-wd_title"
										data-id="0c93ff4" data-element_type="widget"
										data-widget_type="wd_title.default">
										<div class="elementor-widget-container">
											<div
												class="title-wrapper set-mb-s reset-last-child wd-title-color-default wd-title-style-default wd-title-size-default text-left">


												<div class="liner-continer">
													<h4 class="woodmart-title-container title wd-fontsize-l">FSSAI:
														12224999000078<br />
														<br>GST: 08ABDFP3093N1ZQ<br />
													</h4>
												</div>

											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-9ef8958"
								data-id="9ef8958" data-element_type="column">
								<div class="elementor-widget-wrap elementor-element-populated">
									<div class="elementor-element elementor-element-36033b4 elementor-widget elementor-widget-wd_title"
										data-id="36033b4" data-element_type="widget"
										data-widget_type="wd_title.default">
										<div class="elementor-widget-container">
											<div
												class="title-wrapper set-mb-s reset-last-child wd-title-color-default wd-title-style-default wd-title-size-default text-left">


												<div class="liner-continer">
													<h4 class="woodmart-title-container title wd-fontsize-l">Useful
														Links</h4>
												</div>

											</div>
										</div>
									</div>
									<div class="elementor-element elementor-element-b7a4a23 elementor-widget elementor-widget-wd_list"
										data-id="b7a4a23" data-element_type="widget" data-widget_type="wd_list.default">
										<div class="elementor-widget-container">
											<ul
												class="wd-list color-scheme-custom wd-fontsize-xs wd-list-type-icon wd-list-style-default wd-justify-left">
												<li class="elementor-repeater-item-1402af2">

													<span class="list-content">
														FAQ’s </span>


													<a href="https://pragssalty.com/faqs/" class="wd-fill"
														aria-label="List item link"></a>
												</li>
												<li class="elementor-repeater-item-c77fc22">

													<span class="list-content">
														Track Your Order </span>


													<a href="https://pragssalty.com/track-order/" class="wd-fill"
														aria-label="List item link"></a>
												</li>
												<li class="elementor-repeater-item-c373d8d">

													<span class="list-content">
														Privacy Policy </span>


													<a href="https://pragssalty.com/privacy-policy/" class="wd-fill"
														aria-label="List item link"></a>
												</li>
												<li class="elementor-repeater-item-1540aa8">

													<span class="list-content">
														Return Policy </span>


													<a href="https://pragssalty.com/refund-and-returns-policy/"
														class="wd-fill" aria-label="List item link"></a>
												</li>
												<li class="elementor-repeater-item-02e96b0">

													<span class="list-content">
														Shipping Policy </span>


													<a href="https://pragssalty.com/shipping/" class="wd-fill"
														aria-label="List item link"></a>
												</li>
												<li class="elementor-repeater-item-f93516b">

													<span class="list-content">
														Terms & Conditions </span>


													<a href="https://pragssalty.com/terms-conditions/" class="wd-fill"
														aria-label="List item link"></a>
												</li>
											</ul>

										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
					<section data-particle_enable="false" data-particle-mobile-disabled="false"
						class="wd-negative-gap elementor-section elementor-top-section elementor-element elementor-element-a974a75 wd-section-stretch elementor-section-boxed elementor-section-height-default elementor-section-height-default"
						data-id="a974a75" data-element_type="section"
						data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
						<div class="elementor-container elementor-column-gap-default">
							<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-2d2ba05"
								data-id="2d2ba05" data-element_type="column">
								<div class="elementor-widget-wrap elementor-element-populated">
									<div class="elementor-element elementor-element-eea18e5 elementor-widget elementor-widget-wd_title"
										data-id="eea18e5" data-element_type="widget"
										data-widget_type="wd_title.default">
										<div class="elementor-widget-container">
											<div
												class="title-wrapper set-mb-s reset-last-child wd-title-color-default wd-title-style-default wd-title-size-default text-center">


												<div class="liner-continer">
													<h4 class="woodmart-title-container title wd-fontsize-l">© 2024
														PRags Salty™. All Rights Reserved<br />
													</h4>
												</div>

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
		</footer>
	</div> <!-- end wrapper -->
	<div class="wd-close-side wd-fill"></div>
	<link rel="stylesheet" id="wd-scroll-top-css"
		href="wp-content/themes/woodmart/css/parts/opt-scrolltotop.min.css?ver=7.1.4" type="text/css" media="all" /> <a
		href="#" class="scrollToTop" aria-label="Scroll to top button"></a>
	<div class="mobile-nav wd-side-hidden wd-left">
		<div class="wd-search-form">


			<form role="search" method="get" class="searchform  wd-cat-style-bordered woodmart-ajax-search"
				action="https://pragssalty.com/" data-thumbnail="1" data-price="1" data-post_type="product"
				data-count="20" data-sku="0" data-symbols_count="3">
				<input type="text" class="s" placeholder="Search for products" value="" name="s" aria-label="Search"
					title="Search for products" required />
				<input type="hidden" name="post_type" value="product">
				<button type="submit" class="searchsubmit">
					<span>
						Search </span>
				</button>
			</form>



			<div class="search-results-wrapper">
				<div class="wd-dropdown-results wd-scroll wd-dropdown">
					<div class="wd-scroll-content"></div>
				</div>
			</div>


		</div>
		<ul id="menu-main-menu-1" class="mobile-pages-menu wd-nav wd-nav-mobile wd-active">
			<li
				class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-1380 item-level-0">
				<a href="https://pragssalty.com/" class="woodmart-nav-link"><span class="nav-link-text">Home</span></a>
			</li>
			<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1388 item-level-0"><a
					href="https://pragssalty.com/about-us/" class="woodmart-nav-link"><span class="nav-link-text">About
						Us</span></a></li>
			<li
				class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1381 item-level-0">
				<a href="https://pragssalty.com/products/" class="woodmart-nav-link"><span
						class="nav-link-text">Products</span></a>
				<ul class="wd-sub-menu">
					<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2264 item-level-1"><a
							href="https://pragssalty.com/product-category/roasted/"
							class="woodmart-nav-link">Roasted</a></li>
					<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2265 item-level-1"><a
							href="https://pragssalty.com/product-category/namkeen/"
							class="woodmart-nav-link">Namkeen</a></li>
					<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2266 item-level-1"><a
							href="https://pragssalty.com/product-category/fox-nuts/" class="woodmart-nav-link">Fox
							Nuts</a></li>
					<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2969 item-level-1"><a
							href="https://pragssalty.com/product-category/sweets/" class="woodmart-nav-link">Sweets</a>
					</li>
					<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-11236 item-level-1"><a
							href="https://pragssalty.com/product-category/combos/" class="woodmart-nav-link">Combos</a>
					</li>
				</ul>
			</li>
			<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-10676 item-level-0"><a
					href="https://pragssalty.com/blogs/" class="woodmart-nav-link"><span
						class="nav-link-text">Blogs</span></a></li>
			<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1389 item-level-0"><a
					href="https://pragssalty.com/contact-us/" class="woodmart-nav-link"><span
						class="nav-link-text">Contact Us</span></a></li>
			<li class="menu-item  menu-item-account wd-with-icon"><a href="https://pragssalty.com/my-account/">Login /
					Register</a></li>
		</ul>
	</div><!--END MOBILE-NAV-->
	<div class="cart-widget-side wd-side-hidden wd-right">
		<div class="wd-heading">
			<span class="title">Shopping cart</span>
			<div class="close-side-widget wd-action-btn wd-style-text wd-cross-icon">
				<a href="#" rel="nofollow">Close</a>
			</div>
		</div>
		<div class="widget woocommerce widget_shopping_cart">
			<div class="widget_shopping_cart_content"></div>
		</div>
	</div>
	<link rel="stylesheet" id="wd-cookies-popup-css"
		href="wp-content/themes/woodmart/css/parts/opt-cookies.min.css?ver=7.1.4" type="text/css" media="all" />
	<div class="wd-cookies-popup">
		<div class="wd-cookies-inner">
			<div class="cookies-info-text">
				We use cookies to improve your experience on our website. By browsing this website, you agree to our use
				of cookies. </div>
			<div class="cookies-buttons">
				<a href="#" rel="nofollow noopener"
					class="btn btn-size-small btn-color-primary cookies-accept-btn">Accept</a>
			</div>
		</div>
	</div>
	<link rel="stylesheet" id="wd-bottom-toolbar-css"
		href="wp-content/themes/woodmart/css/parts/opt-bottom-toolbar.min.css?ver=7.1.4" type="text/css" media="all" />
	<div class="wd-toolbar wd-toolbar-label-show">
		<div class="wd-toolbar-shop wd-toolbar-item wd-tools-element">
			<a href="https://pragssalty.com/products/">
				<span class="wd-tools-icon"></span>
				<span class="wd-toolbar-label">
					Shop </span>
			</a>
		</div>
		<div class="wd-header-cart wd-tools-element wd-design-5 cart-widget-opener" title="My cart">
			<a href="https://pragssalty.com/cart/">
				<span class="wd-tools-icon wd-icon-alt">
					<span class="wd-cart-number wd-tools-count">8 <span>items</span></span>
				</span>
				<span class="wd-toolbar-label">
					Cart </span>
			</a>
		</div>
		<div class="wd-header-my-account wd-tools-element wd-style-icon ">
			<a href="https://pragssalty.com/my-account/">
				<span class="wd-tools-icon"></span>
				<span class="wd-toolbar-label">
					My account </span>
			</a>
		</div>
		<div class="wd-toolbar-link wd-tools-element wd-toolbar-item wd-tools-custom-icon">
			<a href="https://wa.link/rukdzb">
				<span class="wd-toolbar-icon wd-tools-icon wd-icon wd-custom-icon">
					<img width="150" height="150" src="wp-content/uploads/2023/06/whatsapp-1-150x150.webp"
						class="attachment-thumbnail size-thumbnail" alt="" decoding="async"
						srcset="wp-content/uploads/2023/06/whatsapp-1-150x150.webp 150w, wp-content/uploads/2023/06/whatsapp-1-300x300.webp 300w, wp-content/uploads/2023/06/whatsapp-1-32x32.webp 32w, wp-content/uploads/2023/06/whatsapp-1.webp 512w"
						sizes="(max-width: 150px) 100vw, 150px" /> </span>

				<span class="wd-toolbar-label">
					Enquire </span>
			</a>
		</div>
	</div>
	<div class="wcjfw-total-placeholder wcjfw-hidden">
		<input type="hidden" id="wcjfw-cart-total" value="4903">
	</div>
	<div id="qlwapp" class="qlwapp qlwapp-free qlwapp-bubble qlwapp-bottom-left qlwapp-desktop qlwapp-rounded">
		<div class="qlwapp-container">

			<a class="qlwapp-toggle" data-action="open" data-phone="9929321144" data-message="Hello!" role="button"
				tabindex="0" target="_blank">
				<i class="qlwapp-icon qlwapp-whatsapp-icon"></i>
				<i class="qlwapp-close" data-action="close">&times;</i>
			</a>
		</div>
	</div>

	<div class="cr-pswp pswp" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="pswp__bg"></div>
		<div class="pswp__scroll-wrap">
			<div class="pswp__container">
				<div class="pswp__item"></div>
				<div class="pswp__item"></div>
				<div class="pswp__item"></div>
			</div>
			<div class="pswp__ui pswp__ui--hidden">
				<div class="pswp__top-bar">
					<div class="pswp__counter"></div>
					<button class="pswp__button pswp__button--close" aria-label="Close (Esc)"></button>
					<button class="pswp__button pswp__button--share" aria-label="Share"></button>
					<button class="pswp__button pswp__button--fs" aria-label="Toggle fullscreen"></button>
					<button class="pswp__button pswp__button--zoom" aria-label="Zoom in/out"></button>
					<div class="pswp__preloader">
						<div class="pswp__preloader__icn">
							<div class="pswp__preloader__cut">
								<div class="pswp__preloader__donut"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
					<div class="pswp__share-tooltip"></div>
				</div>
				<button class="pswp__button pswp__button--arrow--left" aria-label="Previous (arrow left)"></button>
				<button class="pswp__button pswp__button--arrow--right" aria-label="Next (arrow right)"></button>
				<div class="pswp__caption">
					<div class="pswp__caption__center"></div>
				</div>
			</div>
		</div>
	</div>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript">
		(function () {
			var c = document.body.className;
			c = c.replace(/woocommerce-no-js/, 'woocommerce-js');
			document.body.className = c;
		})();
	</script>
	<script type="text/template" id="tmpl-variation-template">
	<div class="woocommerce-variation-description">{{{ data.variation.variation_description }}}</div>
	<div class="woocommerce-variation-price">{{{ data.variation.price_html }}}</div>
	<div class="woocommerce-variation-availability">{{{ data.variation.availability_html }}}</div>
</script>
	<script type="text/template" id="tmpl-unavailable-variation-template">
	<p>Sorry, this product is unavailable. Please choose a different combination.</p>
</script>
	<link rel='stylesheet' id='0-css'
		href='https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,0,4000,7000,500&#038;family=Roboto:ital,wght@0,0,1001,1000,2001,2000,3001,3000,4001,4000,5001,5000,6001,6000,7001,7000,8001,8000,9001,900&#038;family=Roboto+Slab:ital,wght@0,0,1001,1000,2001,2000,3001,3000,4001,4000,5001,5000,6001,6000,7001,7000,8001,8000,9001,900&#038;family=Mulish:ital,wght@0,0,1001,1000,2001,2000,3001,3000,4001,4000,5001,5000,6001,6000,7001,7000,8001,8000,9001,900&#038;family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&#038;display=swap'
		type='text/css' media='all' />
	<link rel='stylesheet' id='wpo_min-footer-0-css'
		href='wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-dce42836.min.css' type='text/css'
		media='all' />
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript" id="wpo_min-footer-0-js-extra">
/* <![CDATA[ */
var wd_cart_fragments_params = {"ajax_url":"\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/?wc-ajax=%%endpoint%%","cart_hash_key":"wc_cart_hash_922703ab473fa9b909b138c94b1e78ba","fragment_name":"wc_fragments_922703ab473fa9b909b138c94b1e78ba","request_timeout":"5000"};
/* ]]> */
</script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wd-update-cart-fragments-fix7.1.4.min.js"
		id="wpo_min-footer-0-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript" id="wpo_min-footer-1-js-extra">
/* <![CDATA[ */
var cr_ajax_object = {"ajax_url":"https:\/\/pragssalty.com\/wp-admin\/admin-ajax.php"};
var cr_ajax_object = {"ajax_url":"https:\/\/pragssalty.com\/wp-admin\/admin-ajax.php","disable_lightbox":"0"};
/* ]]> */
</script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-cr-frontend-js5.47.0.min.js"
		id="wpo_min-footer-1-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-cr-colcade5.47.0.min.js"
		id="wpo_min-footer-2-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wbvp.min.js"
		id="wpo_min-footer-3-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-sourcebuster-js8.7.0.min.js"
		id="wpo_min-footer-4-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript" id="wpo_min-footer-5-js-extra">
/* <![CDATA[ */
var wc_order_attribution = {"params":{"lifetime":1.0e-5,"session":30,"ajaxurl":"https:\/\/pragssalty.com\/wp-admin\/admin-ajax.php","prefix":"wc_order_attribution_","allowTracking":true},"fields":{"source_type":"current.typ","referrer":"current_add.rf","utm_campaign":"current.cmp","utm_source":"current.src","utm_medium":"current.mdm","utm_content":"current.cnt","utm_id":"current.id","utm_term":"current.trm","session_entry":"current_add.ep","session_start_time":"current_add.fd","session_pages":"session.pgs","session_count":"udata.vst","user_agent":"udata.uag"}};
/* ]]> */
</script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wc-order-attribution8.7.0.min.js"
		id="wpo_min-footer-5-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-underscore1.13.4.min.js"
		id="wpo_min-footer-6-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript" id="wpo_min-footer-7-js-extra">
/* <![CDATA[ */
var _wpUtilSettings = {"ajax":{"url":"\/wp-admin\/admin-ajax.php"}};
/* ]]> */
</script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wp-util.min.js"
		id="wpo_min-footer-7-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-woo-feed-facebook-pixel,1.0.0.min.js"
		id="wpo_min-footer-8-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-qlwappe91de9a147a4b721ec5b.min.js"
		id="wpo_min-footer-9-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript" id="wpo_min-footer-10-js-extra">
/* <![CDATA[ */
var wc_timeline = {"url":"https:\/\/pragssalty.com\/wp-admin\/admin-ajax.php","open_on_add":"0","cart_url":"https:\/\/pragssalty.com\/cart\/","is_cart_page":"","goals_count":"0","has_carousel":"1"};
/* ]]> */
</script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wc_j_upsellator_js3.4.7.min.js"
		id="wpo_min-footer-10-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-elementor-pro-webpack-runtime3.20.0.min.js"
		id="wpo_min-footer-11-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-elementor-webpack-runtime3.20.4.min.js"
		id="wpo_min-footer-12-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-elementor-frontend-modules3.20.4.min.js"
		id="wpo_min-footer-13-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wp-i18n5e580eb46a90c2b997e6.min.js"
		id="wpo_min-footer-14-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-elementor-pro-frontend3.20.0.min.js"
		id="wpo_min-footer-15-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-elementor-waypoints4.0.2.min.js"
		id="wpo_min-footer-16-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-jquery-ui-core1.13.2.min.js"
		id="wpo_min-footer-17-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-elementor-frontend3.20.4.min.js"
		id="wpo_min-footer-18-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-pro-elements-handlers3.20.0.min.js"
		id="wpo_min-footer-19-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript" id="wpo_min-footer-20-js-extra">
/* <![CDATA[ */
var wpformsElementorVars = {"captcha_provider":"recaptcha","recaptcha_type":"v2"};
var wpformsElementorVars = {"captcha_provider":"recaptcha","recaptcha_type":"v2"};
/* ]]> */
</script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wpforms-elementor1.8.7.min.js"
		id="wpo_min-footer-20-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript" id="wpo_min-footer-21-js-extra">
/* <![CDATA[ */
var woodmart_settings = {"menu_storage_key":"woodmart_8ce3279f3268b69002b606679d8624f3","ajax_dropdowns_save":"1","photoswipe_close_on_scroll":"1","woocommerce_ajax_add_to_cart":"yes","variation_gallery_storage_method":"new","elementor_no_gap":"enabled","adding_to_cart":"Processing","added_to_cart":"Product was successfully added to your cart.","continue_shopping":"Continue shopping","view_cart":"View Cart","go_to_checkout":"Checkout","loading":"Loading...","countdown_days":"days","countdown_hours":"hr","countdown_mins":"min","countdown_sec":"sc","cart_url":"https:\/\/pragssalty.com\/cart\/","ajaxurl":"https:\/\/pragssalty.com\/wp-admin\/admin-ajax.php","add_to_cart_action":"popup","added_popup":"no","categories_toggle":"no","enable_popup":"no","popup_delay":"2000","popup_event":"time","popup_scroll":"1000","popup_pages":"0","promo_popup_hide_mobile":"no","product_images_captions":"no","ajax_add_to_cart":"1","all_results":"View all results","zoom_enable":"yes","ajax_scroll":"yes","ajax_scroll_class":".main-page-wrapper","ajax_scroll_offset":"100","infinit_scroll_offset":"300","product_slider_auto_height":"yes","product_slider_dots":"no","price_filter_action":"click","product_slider_autoplay":"","close":"Close (Esc)","share_fb":"Share on Facebook","pin_it":"Pin it","tweet":"Tweet","download_image":"Download image","off_canvas_column_close_btn_text":"Close","cookies_version":"1","header_banner_version":"1","promo_version":"1","header_banner_close_btn":"yes","header_banner_enabled":"no","whb_header_clone":"\n    <div class=\"whb-sticky-header whb-clone whb-main-header <%wrapperClasses%>\">\n        <div class=\"<%cloneClass%>\">\n            <div class=\"container\">\n                <div class=\"whb-flex-row whb-general-header-inner\">\n                    <div class=\"whb-column whb-col-left whb-visible-lg\">\n                        <%.site-logo%>\n                    <\/div>\n                    <div class=\"whb-column whb-col-center whb-visible-lg\">\n                        <%.wd-header-main-nav%>\n                    <\/div>\n                    <div class=\"whb-column whb-col-right whb-visible-lg\">\n                        <%.wd-header-my-account%>\n                        <%.wd-header-search:not(.wd-header-search-mobile)%>\n\t\t\t\t\t\t<%.wd-header-wishlist%>\n                        <%.wd-header-compare%>\n                        <%.wd-header-cart%>\n                        <%.wd-header-fs-nav%>\n                    <\/div>\n                    <%.whb-mobile-left%>\n                    <%.whb-mobile-center%>\n                    <%.whb-mobile-right%>\n                <\/div>\n            <\/div>\n        <\/div>\n    <\/div>\n","pjax_timeout":"5000","split_nav_fix":"","shop_filters_close":"no","woo_installed":"1","base_hover_mobile_click":"no","centered_gallery_start":"1","quickview_in_popup_fix":"","one_page_menu_offset":"150","hover_width_small":"1","is_multisite":"","current_blog_id":"1","swatches_scroll_top_desktop":"no","swatches_scroll_top_mobile":"no","lazy_loading_offset":"0","add_to_cart_action_timeout":"no","add_to_cart_action_timeout_number":"3","single_product_variations_price":"no","google_map_style_text":"Custom style","quick_shop":"yes","sticky_product_details_offset":"150","preloader_delay":"300","comment_images_upload_size_text":"Some files are too large. Allowed file size is 1 MB.","comment_images_count_text":"You can upload up to 3 images to your review.","single_product_comment_images_required":"no","comment_required_images_error_text":"Image is required.","comment_images_upload_mimes_text":"You are allowed to upload images only in png, jpeg formats.","comment_images_added_count_text":"Added %s image(s)","comment_images_upload_size":"1048576","comment_images_count":"3","search_input_padding":"no","comment_images_upload_mimes":{"jpg|jpeg|jpe":"image\/jpeg","png":"image\/png"},"home_url":"https:\/\/pragssalty.com\/","shop_url":"https:\/\/pragssalty.com\/products\/","age_verify":"no","banner_version_cookie_expires":"60","promo_version_cookie_expires":"7","age_verify_expires":"30","cart_redirect_after_add":"no","swatches_labels_name":"no","product_categories_placeholder":"Select a category","product_categories_no_results":"No matches found","cart_hash_key":"wc_cart_hash_922703ab473fa9b909b138c94b1e78ba","fragment_name":"wc_fragments_922703ab473fa9b909b138c94b1e78ba","photoswipe_template":"<div class=\"pswp\" aria-hidden=\"true\" role=\"dialog\" tabindex=\"-1\"><div class=\"pswp__bg\"><\/div><div class=\"pswp__scroll-wrap\"><div class=\"pswp__container\"><div class=\"pswp__item\"><\/div><div class=\"pswp__item\"><\/div><div class=\"pswp__item\"><\/div><\/div><div class=\"pswp__ui pswp__ui--hidden\"><div class=\"pswp__top-bar\"><div class=\"pswp__counter\"><\/div><button class=\"pswp__button pswp__button--close\" title=\"Close (Esc)\"><\/button> <button class=\"pswp__button pswp__button--share\" title=\"Share\"><\/button> <button class=\"pswp__button pswp__button--fs\" title=\"Toggle fullscreen\"><\/button> <button class=\"pswp__button pswp__button--zoom\" title=\"Zoom in\/out\"><\/button><div class=\"pswp__preloader\"><div class=\"pswp__preloader__icn\"><div class=\"pswp__preloader__cut\"><div class=\"pswp__preloader__donut\"><\/div><\/div><\/div><\/div><\/div><div class=\"pswp__share-modal pswp__share-modal--hidden pswp__single-tap\"><div class=\"pswp__share-tooltip\"><\/div><\/div><button class=\"pswp__button pswp__button--arrow--left\" title=\"Previous (arrow left)\"><\/button> <button class=\"pswp__button pswp__button--arrow--right\" title=\"Next (arrow right)>\"><\/button><div class=\"pswp__caption\"><div class=\"pswp__caption__center\"><\/div><\/div><\/div><\/div><\/div>","load_more_button_page_url":"yes","load_more_button_page_url_opt":"no","menu_item_hover_to_click_on_responsive":"no","clear_menu_offsets_on_resize":"yes","three_sixty_framerate":"60","three_sixty_prev_next_frames":"5","ajax_search_delay":"300","animated_counter_speed":"3000","site_width":"1222","cookie_secure_param":"1","slider_distortion_effect":"sliderWithNoise","current_page_builder":"elementor","collapse_footer_widgets":"yes","ajax_fullscreen_content":"yes","grid_gallery_control":"hover","grid_gallery_enable_arrows":"none","ajax_links":".wd-nav-product-cat a, .website-wrapper .widget_product_categories a, .widget_layered_nav_filters a, .woocommerce-widget-layered-nav a, .filters-area:not(.custom-content) a, body.post-type-archive-product:not(.woocommerce-account) .woocommerce-pagination a, body.tax-product_cat:not(.woocommerce-account) .woocommerce-pagination a, .wd-shop-tools a:not(.breadcrumb-link), .woodmart-woocommerce-layered-nav a, .woodmart-price-filter a, .wd-clear-filters a, .woodmart-woocommerce-sort-by a, .woocommerce-widget-layered-nav-list a, .wd-widget-stock-status a, .widget_nav_mega_menu a, .wd-products-shop-view a, .wd-products-per-page a, .category-grid-item a, .wd-cat a, body[class*=\"tax-pa_\"] .woocommerce-pagination a","wishlist_expanded":"no","wishlist_show_popup":"enable","wishlist_page_nonce":"7ac956ed16","wishlist_fragments_nonce":"a1b90d19b7","wishlist_remove_notice":"Do you really want to remove these products?","wishlist_hash_name":"woodmart_wishlist_hash_cd293198e35f34019acb34031f535867","wishlist_fragment_name":"woodmart_wishlist_fragments_cd293198e35f34019acb34031f535867","frequently_bought":"ccf2fc0a0c","is_criteria_enabled":"","summary_criteria_ids":"","myaccount_page":"https:\/\/pragssalty.com\/my-account\/","vimeo_library_url":"https:\/\/pragssalty.com\/wp-content\/themes\/woodmart\/js\/libs\/vimeo-player.min.js","reviews_criteria_rating_required":"no","is_rating_summary_filter_enabled":""};
var woodmart_page_css = [];
/* ]]> */
</script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-woodmart-theme7.1.4.min.js"
		id="wpo_min-footer-21-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wd-woocommerce-notices7.1.4.min.js"
		id="wpo_min-footer-22-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wd-scrollbar7.1.4.min.js"
		id="wpo_min-footer-23-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript" id="wpo_min-footer-24-js-extra">
/* <![CDATA[ */
var localize = {"ajaxurl":"https:\/\/pragssalty.com\/wp-admin\/admin-ajax.php","nonce":"18f5fb8f9e","i18n":{"added":"Added ","compare":"Compare","loading":"Loading..."},"eael_translate_text":{"required_text":"is a required field","invalid_text":"Invalid","billing_text":"Billing","shipping_text":"Shipping","fg_mfp_counter_text":"of"},"page_permalink":"https:\/\/pragssalty.com\/track-order\/","cart_redirectition":"no","cart_page_url":"https:\/\/pragssalty.com\/cart\/","el_breakpoints":{"mobile":{"label":"Mobile Portrait","value":767,"default_value":767,"direction":"max","is_enabled":true},"mobile_extra":{"label":"Mobile Landscape","value":880,"default_value":880,"direction":"max","is_enabled":false},"tablet":{"label":"Tablet Portrait","value":1024,"default_value":1024,"direction":"max","is_enabled":true},"tablet_extra":{"label":"Tablet Landscape","value":1200,"default_value":1200,"direction":"max","is_enabled":false},"laptop":{"label":"Laptop","value":1366,"default_value":1366,"direction":"max","is_enabled":false},"widescreen":{"label":"Widescreen","value":2400,"default_value":2400,"direction":"min","is_enabled":false}},"ParticleThemesData":{"default":"{\"particles\":{\"number\":{\"value\":160,\"density\":{\"enable\":true,\"value_area\":800}},\"color\":{\"value\":\"#ffffff\"},\"shape\":{\"type\":\"circle\",\"stroke\":{\"width\":0,\"color\":\"#000000\"},\"polygon\":{\"nb_sides\":5},\"image\":{\"src\":\"img\/github.svg\",\"width\":100,\"height\":100}},\"opacity\":{\"value\":0.5,\"random\":false,\"anim\":{\"enable\":false,\"speed\":1,\"opacity_min\":0.1,\"sync\":false}},\"size\":{\"value\":3,\"random\":true,\"anim\":{\"enable\":false,\"speed\":40,\"size_min\":0.1,\"sync\":false}},\"line_linked\":{\"enable\":true,\"distance\":150,\"color\":\"#ffffff\",\"opacity\":0.4,\"width\":1},\"move\":{\"enable\":true,\"speed\":6,\"direction\":\"none\",\"random\":false,\"straight\":false,\"out_mode\":\"out\",\"bounce\":false,\"attract\":{\"enable\":false,\"rotateX\":600,\"rotateY\":1200}}},\"interactivity\":{\"detect_on\":\"canvas\",\"events\":{\"onhover\":{\"enable\":true,\"mode\":\"repulse\"},\"onclick\":{\"enable\":true,\"mode\":\"push\"},\"resize\":true},\"modes\":{\"grab\":{\"distance\":400,\"line_linked\":{\"opacity\":1}},\"bubble\":{\"distance\":400,\"size\":40,\"duration\":2,\"opacity\":8,\"speed\":3},\"repulse\":{\"distance\":200,\"duration\":0.4},\"push\":{\"particles_nb\":4},\"remove\":{\"particles_nb\":2}}},\"retina_detect\":true}","nasa":"{\"particles\":{\"number\":{\"value\":250,\"density\":{\"enable\":true,\"value_area\":800}},\"color\":{\"value\":\"#ffffff\"},\"shape\":{\"type\":\"circle\",\"stroke\":{\"width\":0,\"color\":\"#000000\"},\"polygon\":{\"nb_sides\":5},\"image\":{\"src\":\"img\/github.svg\",\"width\":100,\"height\":100}},\"opacity\":{\"value\":1,\"random\":true,\"anim\":{\"enable\":true,\"speed\":1,\"opacity_min\":0,\"sync\":false}},\"size\":{\"value\":3,\"random\":true,\"anim\":{\"enable\":false,\"speed\":4,\"size_min\":0.3,\"sync\":false}},\"line_linked\":{\"enable\":false,\"distance\":150,\"color\":\"#ffffff\",\"opacity\":0.4,\"width\":1},\"move\":{\"enable\":true,\"speed\":1,\"direction\":\"none\",\"random\":true,\"straight\":false,\"out_mode\":\"out\",\"bounce\":false,\"attract\":{\"enable\":false,\"rotateX\":600,\"rotateY\":600}}},\"interactivity\":{\"detect_on\":\"canvas\",\"events\":{\"onhover\":{\"enable\":true,\"mode\":\"bubble\"},\"onclick\":{\"enable\":true,\"mode\":\"repulse\"},\"resize\":true},\"modes\":{\"grab\":{\"distance\":400,\"line_linked\":{\"opacity\":1}},\"bubble\":{\"distance\":250,\"size\":0,\"duration\":2,\"opacity\":0,\"speed\":3},\"repulse\":{\"distance\":400,\"duration\":0.4},\"push\":{\"particles_nb\":4},\"remove\":{\"particles_nb\":2}}},\"retina_detect\":true}","bubble":"{\"particles\":{\"number\":{\"value\":15,\"density\":{\"enable\":true,\"value_area\":800}},\"color\":{\"value\":\"#1b1e34\"},\"shape\":{\"type\":\"polygon\",\"stroke\":{\"width\":0,\"color\":\"#000\"},\"polygon\":{\"nb_sides\":6},\"image\":{\"src\":\"img\/github.svg\",\"width\":100,\"height\":100}},\"opacity\":{\"value\":0.3,\"random\":true,\"anim\":{\"enable\":false,\"speed\":1,\"opacity_min\":0.1,\"sync\":false}},\"size\":{\"value\":50,\"random\":false,\"anim\":{\"enable\":true,\"speed\":10,\"size_min\":40,\"sync\":false}},\"line_linked\":{\"enable\":false,\"distance\":200,\"color\":\"#ffffff\",\"opacity\":1,\"width\":2},\"move\":{\"enable\":true,\"speed\":8,\"direction\":\"none\",\"random\":false,\"straight\":false,\"out_mode\":\"out\",\"bounce\":false,\"attract\":{\"enable\":false,\"rotateX\":600,\"rotateY\":1200}}},\"interactivity\":{\"detect_on\":\"canvas\",\"events\":{\"onhover\":{\"enable\":false,\"mode\":\"grab\"},\"onclick\":{\"enable\":false,\"mode\":\"push\"},\"resize\":true},\"modes\":{\"grab\":{\"distance\":400,\"line_linked\":{\"opacity\":1}},\"bubble\":{\"distance\":400,\"size\":40,\"duration\":2,\"opacity\":8,\"speed\":3},\"repulse\":{\"distance\":200,\"duration\":0.4},\"push\":{\"particles_nb\":4},\"remove\":{\"particles_nb\":2}}},\"retina_detect\":true}","snow":"{\"particles\":{\"number\":{\"value\":450,\"density\":{\"enable\":true,\"value_area\":800}},\"color\":{\"value\":\"#fff\"},\"shape\":{\"type\":\"circle\",\"stroke\":{\"width\":0,\"color\":\"#000000\"},\"polygon\":{\"nb_sides\":5},\"image\":{\"src\":\"img\/github.svg\",\"width\":100,\"height\":100}},\"opacity\":{\"value\":0.5,\"random\":true,\"anim\":{\"enable\":false,\"speed\":1,\"opacity_min\":0.1,\"sync\":false}},\"size\":{\"value\":5,\"random\":true,\"anim\":{\"enable\":false,\"speed\":40,\"size_min\":0.1,\"sync\":false}},\"line_linked\":{\"enable\":false,\"distance\":500,\"color\":\"#ffffff\",\"opacity\":0.4,\"width\":2},\"move\":{\"enable\":true,\"speed\":6,\"direction\":\"bottom\",\"random\":false,\"straight\":false,\"out_mode\":\"out\",\"bounce\":false,\"attract\":{\"enable\":false,\"rotateX\":600,\"rotateY\":1200}}},\"interactivity\":{\"detect_on\":\"canvas\",\"events\":{\"onhover\":{\"enable\":true,\"mode\":\"bubble\"},\"onclick\":{\"enable\":true,\"mode\":\"repulse\"},\"resize\":true},\"modes\":{\"grab\":{\"distance\":400,\"line_linked\":{\"opacity\":0.5}},\"bubble\":{\"distance\":400,\"size\":4,\"duration\":0.3,\"opacity\":1,\"speed\":3},\"repulse\":{\"distance\":200,\"duration\":0.4},\"push\":{\"particles_nb\":4},\"remove\":{\"particles_nb\":2}}},\"retina_detect\":true}","nyan_cat":"{\"particles\":{\"number\":{\"value\":150,\"density\":{\"enable\":false,\"value_area\":800}},\"color\":{\"value\":\"#ffffff\"},\"shape\":{\"type\":\"star\",\"stroke\":{\"width\":0,\"color\":\"#000000\"},\"polygon\":{\"nb_sides\":5},\"image\":{\"src\":\"http:\/\/wiki.lexisnexis.com\/academic\/images\/f\/fb\/Itunes_podcast_icon_300.jpg\",\"width\":100,\"height\":100}},\"opacity\":{\"value\":0.5,\"random\":false,\"anim\":{\"enable\":false,\"speed\":1,\"opacity_min\":0.1,\"sync\":false}},\"size\":{\"value\":4,\"random\":true,\"anim\":{\"enable\":false,\"speed\":40,\"size_min\":0.1,\"sync\":false}},\"line_linked\":{\"enable\":false,\"distance\":150,\"color\":\"#ffffff\",\"opacity\":0.4,\"width\":1},\"move\":{\"enable\":true,\"speed\":14,\"direction\":\"left\",\"random\":false,\"straight\":true,\"out_mode\":\"out\",\"bounce\":false,\"attract\":{\"enable\":false,\"rotateX\":600,\"rotateY\":1200}}},\"interactivity\":{\"detect_on\":\"canvas\",\"events\":{\"onhover\":{\"enable\":false,\"mode\":\"grab\"},\"onclick\":{\"enable\":true,\"mode\":\"repulse\"},\"resize\":true},\"modes\":{\"grab\":{\"distance\":200,\"line_linked\":{\"opacity\":1}},\"bubble\":{\"distance\":400,\"size\":40,\"duration\":2,\"opacity\":8,\"speed\":3},\"repulse\":{\"distance\":200,\"duration\":0.4},\"push\":{\"particles_nb\":4},\"remove\":{\"particles_nb\":2}}},\"retina_detect\":true}"},"eael_login_nonce":"a72fac3df5","eael_register_nonce":"a57e28adaf","eael_lostpassword_nonce":"05043b5222","eael_resetpassword_nonce":"4a5372780f"};
/* ]]> */
</script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-eael-general5.9.15.min.js"
		id="wpo_min-footer-24-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="https://stats.wp.com/e-202415.js" id="jetpack-stats-js" data-wp-strategy="defer"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript" id="jetpack-stats-js-after">
/* <![CDATA[ */
_stq = window._stq || [];
_stq.push([ "view", JSON.parse("{\"v\":\"ext\",\"blog\":\"217092730\",\"post\":\"2197\",\"tz\":\"5.5\",\"srv\":\"pragssalty.com\",\"j\":\"1:13.3.1\"}") ]);
_stq.push([ "clickTrackerInit", "217092730", "2197" ]);
/* ]]> */
</script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wd-header-builder7.1.4.min.js"
		id="wpo_min-footer-26-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wd-menu-offsets7.1.4.min.js"
		id="wpo_min-footer-27-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wd-menu-setup7.1.4.min.js"
		id="wpo_min-footer-28-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wd-autocomplete-library7.1.4.min.js"
		id="wpo_min-footer-29-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wd-ajax-search7.1.4.min.js"
		id="wpo_min-footer-30-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wd-login-dropdown7.1.4.min.js"
		id="wpo_min-footer-31-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wd-mini-cart-quantity7.1.4.min.js"
		id="wpo_min-footer-32-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wd-woocommerce-quantity7.1.4.min.js"
		id="wpo_min-footer-33-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wd-on-remove-from-cart7.1.4.min.js"
		id="wpo_min-footer-34-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wd-mobile-search7.1.4.min.js"
		id="wpo_min-footer-35-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wd-widget-collapse7.1.4.min.js"
		id="wpo_min-footer-36-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wd-scroll-top7.1.4.min.js"
		id="wpo_min-footer-37-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wd-mobile-navigation7.1.4.min.js"
		id="wpo_min-footer-38-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wd-cart-widget7.1.4.min.js"
		id="wpo_min-footer-39-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wd-cookies-popup7.1.4.min.js"
		id="wpo_min-footer-40-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-zoom1.7.21-wc.8.7.0.min.js"
		id="wpo_min-footer-41-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript" id="wpo_min-footer-42-js-extra">
/* <![CDATA[ */
var wc_add_to_cart_variation_params = {"wc_ajax_url":"\/?wc-ajax=%%endpoint%%&jcart_page_id=2197","i18n_no_matching_variations_text":"Sorry, no products matched your selection. Please choose a different combination.","i18n_make_a_selection_text":"Please select some product options before adding this product to your cart.","i18n_unavailable_text":"Sorry, this product is unavailable. Please choose a different combination."};
/* ]]> */
</script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wc-add-to-cart-variation8.7.0.min.js"
		id="wpo_min-footer-42-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript" id="wpo_min-footer-43-js-extra">
/* <![CDATA[ */
var wc_single_product_params = {"i18n_required_rating_text":"Please select a rating","review_rating_required":"yes","flexslider":{"rtl":false,"animation":"slide","smoothHeight":true,"directionNav":false,"controlNav":"thumbnails","slideshow":false,"animationSpeed":500,"animationLoop":false,"allowOneSlide":false},"zoom_enabled":"","zoom_options":[],"photoswipe_enabled":"","photoswipe_options":{"shareEl":false,"closeOnScroll":false,"history":false,"hideAnimationDuration":0,"showAnimationDuration":0},"flexslider_enabled":""};
/* ]]> */
</script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wc-single-product8.7.0.min.js"
		id="wpo_min-footer-43-js"></script>

	<script type="javascript/blocked" data-wpmeteor-type="text/javascript">
jQuery(document).ready(function($) {
$('.checkout_coupon').show();
});
</script>
</body>

</html>