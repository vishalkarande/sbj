<?php
session_start();
require_once('admin/query.php');
if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
    $cart_value=count($_SESSION['cart']);
}else{
    $cart_value=0;
}

$social = $QueryFire->getAllData('coupons',' 1');
$socialArray = array();
foreach($social as $soc){
	$socialArray[$soc['code']]=$soc['discount'];
}

if(isset($_GET["pop"]) && isset($_GET["mes"])) {
  $pop=$_GET["pop"];
  $mes=$_GET['mes'];
  if($pop==1 && $mes==1){
    $message="Added to Cart. Continue Shopping";
  }elseif($pop==1 && $mes==2){
    $message="Thank you for Making Order";
  }else{
    $pop=0;
  }
}else{
	$pop=0;
  }


if(isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    // Check if the product is already in the session
    if(isset($_SESSION['cart'][$product_id])) {
      // If yes, update the quantity
      $_SESSION['cart'][$product_id] += $quantity;
     
  } else {
      // If not, add the product to the session
      $_SESSION['cart'][$product_id] = $quantity;
  
  }


  header("Location: {$_SERVER['PHP_SELF']}?pop=1&mes=1#products");
       exit();
  }
  
?>

<!DOCTYPE html>
<html lang="en-US" prefix="og: https://ogp.me/ns#">
  <head>
    <meta charset="UTF-8" />
    <link rel="profile" href="https://gmpg.org/xfn/11" />
    <link rel="pingback" href="/xmlrpc.php" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Optimized with WP Meteor v3.4.0 - https://wordpress.org/plugins/wp-meteor/ -->
    <script data-wpmeteor-nooptimize="true">
      var _wpmeteor = {
        gdpr: true,
        rdelay: 86400000,
        preload: true,
        "elementor-animations": true,
        "elementor-pp": true,
        v: "3.4.0",
        rest_url: "https:\/\/\/wp-json\/",
      };
      (() => {
        try {
          new MutationObserver(function () {}),
            new PerformanceObserver(function () {}),
            Object.assign({}, {}),
            document.fonts.ready.then(function () {});
        } catch {
          (t = "wpmeteordisable=1"),
            (i = document.location.href),
            i.match(/[?&]wpmeteordisable/) ||
              ((o = ""),
              i.indexOf("?") == -1
                ? i.indexOf("#") == -1
                  ? (o = i + "?" + t)
                  : (o = i.replace("#", "?" + t + "#"))
                : i.indexOf("#") == -1
                ? (o = i + "&" + t)
                : (o = i.replace("#", "&" + t + "#")),
              (document.location.href = o));
        }
        var t, i, o;
      })();
    </script>
    <script data-wpmeteor-nooptimize="true">
      (() => {
        var Fe = () => Math.round(performance.now()) / 1e3;
        var g = "addEventListener",
          de = "removeEventListener",
          u = "getAttribute",
          y = "setAttribute",
          pe = "removeAttribute",
          D = "hasAttribute",
          Bt = "querySelector",
          O = Bt + "All",
          G = "appendChild",
          j = "removeChild",
          ue = "createElement",
          _ = "tagName",
          We = "getOwnPropertyDescriptor",
          v = "prototype",
          F = "__lookupGetter__",
          ze = "__lookupSetter__",
          f = "DOMContentLoaded",
          E = "load",
          fe = "error";
        var l = window,
          c = document,
          _e = c.documentElement,
          Ye = () => {},
          x = console.error;
        var $e = !0,
          J = class {
            constructor() {
              this.known = [];
            }
            init() {
              let e,
                n,
                s = (r, i) => {
                  if ($e && r && r.fn && !r.__wpmeteor) {
                    let a = function (o) {
                      return (
                        c[g](f, (d) => {
                          o.call(c, r, d, "jQueryMock");
                        }),
                        this
                      );
                    };
                    this.known.push([r, r.fn.ready, r.fn.init.prototype.ready]),
                      (r.fn.ready = a),
                      (r.fn.init.prototype.ready = a),
                      (r.__wpmeteor = !0);
                  }
                  return r;
                };
              window.jQuery || window.$,
                Object.defineProperty(window, "jQuery", {
                  get() {
                    return e;
                  },
                  set(r) {
                    e = s(r, "jQuery");
                  },
                }),
                Object.defineProperty(window, "$", {
                  get() {
                    return n;
                  },
                  set(r) {
                    n = s(r, "$");
                  },
                });
            }
            unmock() {
              this.known.forEach(([e, n, s]) => {
                (e.fn.ready = n), (e.fn.init.prototype.ready = s);
              }),
                ($e = !1);
            }
          };
        var Ee = "fpo:first-interaction",
          me = "fpo:replay-captured-events";
        var Qe = "fpo:element-loaded",
          be = "fpo:images-loaded",
          M = "fpo:the-end";
        var X = "click",
          W = window,
          Ke = W.addEventListener.bind(W),
          je = W.removeEventListener.bind(W),
          Ae = "removeAttribute",
          ge = "getAttribute",
          Nt = "setAttribute",
          Te = [
            "touchstart",
            "touchmove",
            "touchend",
            "touchcancel",
            "keydown",
            "wheel",
          ],
          Je = ["mouseover", "mouseout", X],
          Ct = [
            "touchstart",
            "touchend",
            "touchcancel",
            "mouseover",
            "mouseout",
            X,
          ],
          R = "data-wpmeteor-";
        var Ge = "dispatchEvent",
          Xe = (t) => {
            let e = new MouseEvent(X, {
              view: t.view,
              bubbles: !0,
              cancelable: !0,
            });
            return (
              Object.defineProperty(e, "target", {
                writable: !1,
                value: t.target,
              }),
              e
            );
          },
          Se = class {
            static capture() {
              let e = !1,
                n = [],
                s = (r) => {
                  if (r.target && Ge in r.target) {
                    if (!r.isTrusted) return;
                    if (r.cancelable && !Te.includes(r.type))
                      try {
                        r.preventDefault();
                      } catch {}
                    r.stopImmediatePropagation(),
                      r.type === X
                        ? n.push(Xe(r))
                        : Ct.includes(r.type) && n.push(r),
                      r.target[Nt](R + r.type, !0),
                      e || ((e = !0), W[Ge](new CustomEvent(Ee)));
                  }
                };
              W.addEventListener(me, () => {
                Je.forEach((a) => je(a, s, { passive: !1, capture: !0 })),
                  Te.forEach((a) => je(a, s, { passive: !0, capture: !0 }));
                let r;
                for (; (r = n.shift()); ) {
                  var i = r.target;
                  i[ge](R + "touchstart") &&
                  i[ge](R + "touchend") &&
                  !i[ge](R + X)
                    ? (i[ge](R + "touchmove") || n.push(Xe(r)),
                      i[Ae](R + "touchstart"),
                      i[Ae](R + "touchend"))
                    : i[Ae](R + r.type),
                    i[Ge](r);
                }
              }),
                Je.forEach((r) => Ke(r, s, { passive: !1, capture: !0 })),
                Te.forEach((r) => Ke(r, s, { passive: !0, capture: !0 }));
            }
          };
        var Ze = Se;
        var Z = class {
          constructor() {
            this.l = [];
          }
          emit(e, n = null) {
            this.l[e] && this.l[e].forEach((s) => s(n));
          }
          on(e, n) {
            (this.l[e] ||= []), this.l[e].push(n);
          }
          off(e, n) {
            this.l[e] = (this.l[e] || []).filter((s) => s !== n);
          }
        };
        var b = new Z();
        var he = c[ue]("span");
        he[y]("id", "elementor-device-mode");
        he[y]("class", "elementor-screen-only");
        var Ot = !1,
          et = () => (
            Ot || c.body[G](he),
            getComputedStyle(he, ":after").content.replace(/"/g, "")
          );
        var tt = (t) => t[u]("class") || "",
          rt = (t, e) => t[y]("class", e),
          nt = () => {
            l[g](E, function () {
              let t = et(),
                e = Math.max(_e.clientWidth || 0, l.innerWidth || 0),
                n = Math.max(_e.clientHeight || 0, l.innerHeight || 0),
                s = [
                  "_animation_" + t,
                  "animation_" + t,
                  "_animation",
                  "_animation",
                  "animation",
                ];
              Array.from(c[O](".elementor-invisible")).forEach((r) => {
                let i = r.getBoundingClientRect();
                if (i.top + l.scrollY <= n && i.left + l.scrollX < e)
                  try {
                    let o = JSON.parse(r[u]("data-settings"));
                    if (o.trigger_source) return;
                    let d = o._animation_delay || o.animation_delay || 0,
                      p,
                      w;
                    for (var a = 0; a < s.length; a++)
                      if (o[s[a]]) {
                        (w = s[a]), (p = o[w]);
                        break;
                      }
                    if (p) {
                      let Q = tt(r),
                        K = p === "none" ? Q : Q + " animated " + p,
                        St = setTimeout(() => {
                          rt(r, K.replace(/\belementor-invisible\b/, "")),
                            s.forEach((Ut) => delete o[Ut]),
                            r[y]("data-settings", JSON.stringify(o));
                        }, d);
                      b.on("fi", () => {
                        clearTimeout(St),
                          rt(r, tt(r).replace(new RegExp("\b" + p + "\b"), ""));
                      });
                    }
                  } catch (o) {
                    console.error(o);
                  }
              });
            });
          };
        var st = "data-in-mega_smartmenus",
          ot = () => {
            let t = c[ue]("div");
            t.innerHTML =
              '<span class="sub-arrow --wp-meteor"><i class="fa" aria-hidden="true"></i></span>';
            let e = t.firstChild,
              n = (s) => {
                let r = [];
                for (; (s = s.previousElementSibling); ) r.push(s);
                return r;
              };
            c[g](f, function () {
              Array.from(c[O](".pp-advanced-menu ul")).forEach((s) => {
                if (s[u](st)) return;
                (s[u]("class") || "").match(/\bmega-menu\b/) &&
                  s[O]("ul").forEach((a) => {
                    a[y](st, !0);
                  });
                let r = n(s),
                  i = r
                    .filter((a) => a)
                    .filter((a) => a[_] === "A")
                    .pop();
                if (
                  (i ||
                    (i = r
                      .map((a) => Array.from(a[O]("a")))
                      .filter((a) => a)
                      .flat()
                      .pop()),
                  i)
                ) {
                  let a = e.cloneNode(!0);
                  i[G](a),
                    new MutationObserver((d) => {
                      d.forEach(({ addedNodes: p }) => {
                        p.forEach((w) => {
                          if (w.nodeType === 1 && w[_] === "SPAN")
                            try {
                              i[j](a);
                            } catch {}
                        });
                      });
                    }).observe(i, { childList: !0 });
                }
              });
            });
          };
        var A = "readystatechange",
          B = "message";
        var Y = "SCRIPT",
          m = "data-wpmeteor-",
          T = Object.defineProperty,
          Pe = Object.defineProperties,
          P = "javascript/blocked",
          Be = /^\s*(application|text)\/javascript|module\s*$/i,
          ht = "requestAnimationFrame",
          vt = "requestIdleCallback",
          ae = "setTimeout",
          k = l.constructor.name + "::",
          le = c.constructor.name + "::",
          yt = function (t, e) {
            e = e || l;
            for (var n = 0; n < this.length; n++) t.call(e, this[n], n, this);
          };
        "NodeList" in l && !NodeList[v].forEach && (NodeList[v].forEach = yt);
        "HTMLCollection" in l &&
          !HTMLCollection[v].forEach &&
          (HTMLCollection[v].forEach = yt);
        _wpmeteor["elementor-animations"] && nt(),
          _wpmeteor["elementor-pp"] && ot();
        var N = [],
          te = [],
          I = [],
          se = !1,
          q = [],
          h = {},
          ke = !1,
          Rt = 0,
          ye = c.visibilityState === "visible" ? l[ht] : l[ae],
          Lt = l[vt] || ye;
        c[g]("visibilitychange", () => {
          (ye = c.visibilityState === "visible" ? l[ht] : l[ae]),
            (Lt = l[vt] || ye);
        });
        var U = l[ae],
          Le,
          ee = ["src", "type"],
          z = Object,
          re = "definePropert";
        z[re + "y"] = (t, e, n) =>
          (t === l && ["jQuery", "onload"].indexOf(e) >= 0) ||
          ((t === c || t === c.body) &&
            ["readyState", "write", "writeln", "on" + A].indexOf(e) >= 0)
            ? (["on" + A, "on" + E].indexOf(e) &&
                n.set &&
                ((h["on" + A] = h["on" + A] || []), h["on" + A].push(n.set)),
              t)
            : t instanceof HTMLScriptElement && ee.indexOf(e) >= 0
            ? (t[e + "Getters"] ||
                ((t[e + "Getters"] = []),
                (t[e + "Setters"] = []),
                T(t, e, {
                  set(s) {
                    t[e + "Setters"].forEach((r) => r.call(t, s));
                  },
                  get() {
                    return t[e + "Getters"].slice(-1)[0]();
                  },
                })),
              n.get && t[e + "Getters"].push(n.get),
              n.set && t[e + "Setters"].push(n.set),
              t)
            : T(t, e, n);
        z[re + "ies"] = (t, e) => {
          for (let n in e) z[re + "y"](t, n, e[n]);
          for (let n of Object.getOwnPropertySymbols(e))
            z[re + "y"](t, n, e[n]);
          return t;
        };
        var De = EventTarget[v][g],
          Dt = EventTarget[v][de],
          $ = De.bind(c),
          xt = Dt.bind(c),
          C = De.bind(l),
          wt = Dt.bind(l),
          _t = Document[v].createElement,
          V = _t.bind(c),
          we = c.__proto__[F]("readyState").bind(c),
          it = "loading";
        T(c, "readyState", {
          get() {
            return it;
          },
          set(t) {
            return (it = t);
          },
        });
        var ct = (t) =>
            q.filter(([e, , n], s) => {
              if (!(t.indexOf(e.type) < 0)) {
                n || (n = e.target);
                try {
                  let r = n.constructor.name + "::" + e.type;
                  for (let i = 0; i < h[r].length; i++)
                    if (h[r][i]) {
                      let a = r + "::" + s + "::" + i;
                      if (!Ne[a]) return !0;
                    }
                } catch {}
              }
            }).length,
          oe,
          Ne = {},
          ie = (t) => {
            q.forEach(([e, n, s], r) => {
              if (!(t.indexOf(e.type) < 0)) {
                s || (s = e.target);
                try {
                  let i = s.constructor.name + "::" + e.type;
                  if ((h[i] || []).length)
                    for (let a = 0; a < h[i].length; a++) {
                      let o = h[i][a];
                      if (o) {
                        let d = i + "::" + r + "::" + a;
                        if (!Ne[d]) {
                          (Ne[d] = !0), (c.readyState = n), (oe = i);
                          try {
                            Rt++,
                              !o[v] || o[v].constructor === o
                                ? o.bind(s)(e)
                                : o(e);
                          } catch (p) {
                            x(p, o);
                          }
                          oe = null;
                        }
                      }
                    }
                } catch (i) {
                  x(i);
                }
              }
            });
          };
        $(f, (t) => {
          q.push([new t.constructor(f, t), we(), c]);
        });
        $(A, (t) => {
          q.push([new t.constructor(A, t), we(), c]);
        });
        C(f, (t) => {
          q.push([new t.constructor(f, t), we(), l]);
        });
        C(E, (t) => {
          (ke = !0),
            q.push([new t.constructor(E, t), we(), l]),
            H || ie([f, A, B, E]);
        });
        var bt = (t) => {
            q.push([t, c.readyState, l]);
          },
          Mt = l[F]("onmessage"),
          Pt = l[ze]("onmessage"),
          kt = () => {
            wt(B, bt),
              (h[k + "message"] || []).forEach((t) => {
                C(B, t);
              }),
              T(l, "onmessage", { get: Mt, set: Pt });
          };
        C(B, bt);
        var At = new J();
        At.init();
        var Ie = () => {
          !H && !se && ((H = !0), Re(), (c.readyState = "loading"), U(S)),
            ke ||
              C(E, () => {
                Ie();
              });
        };
        C(Ee, () => {
          Ie();
        });
        b.on(be, () => {
          Ie();
        });
        _wpmeteor.rdelay >= 0 && Ze.capture();
        var Ce = 1,
          at = () => {
            --Ce || U(b.emit.bind(b, M));
          };
        var H = !1,
          S = () => {
            let t = N.shift();
            if (t)
              t[u](m + "src")
                ? t[D]("async")
                  ? (Ce++, Ue(t, at), U(S))
                  : Ue(t, U.bind(null, S))
                : (t.origtype == P && Ue(t), U(S));
            else if (te.length) {
              for (; te.length; ) N.push(te.shift());
              Re(), U(S);
            } else if (ct([f, A, B])) ie([f, A, B]), U(S);
            else if (ke)
              if (ct([E, B])) ie([E, B]), U(S);
              else if (Ce > 1) Lt(S);
              else if (I.length) {
                for (; I.length; ) N.push(I.shift());
                Re(), U(S);
              } else {
                if (l.RocketLazyLoadScripts)
                  try {
                    RocketLazyLoadScripts.run();
                  } catch (e) {
                    x(e);
                  }
                (c.readyState = "complete"),
                  kt(),
                  At.unmock(),
                  (H = !1),
                  (se = !0),
                  l[ae](at);
              }
            else H = !1;
          },
          Oe = (t) => {
            let e = V(Y),
              n = t.attributes;
            for (var s = n.length - 1; s >= 0; s--)
              n[s].name.startsWith(m) || e[y](n[s].name, n[s].value);
            let r = t[u](m + "type");
            r ? (e.type = r) : (e.type = "text/javascript"),
              (t.textContent || "").match(/^\s*class RocketLazyLoadScripts/)
                ? (e.textContent = t.textContent
                    .replace(
                      /^\s*class\s*RocketLazyLoadScripts/,
                      "window.RocketLazyLoadScripts=class"
                    )
                    .replace("RocketLazyLoadScripts.run();", ""))
                : (e.textContent = t.textContent);
            for (let i of ["onload", "onerror", "onreadystatechange"])
              t[i] && (e[i] = t[i]);
            return e;
          },
          lt = (t, e) => {
            let n = t.parentNode;
            if (n)
              return (
                (n.nodeType === 11 ? V(n.host[_]) : V(n[_]))[G](
                  n.replaceChild(e, t)
                ),
                n.isConnected ? t : void 0
              );
            x("No parent for", t);
          },
          Ue = (t, e) => {
            let n = t[u](m + "src");
            if (n) {
              let s = Oe(t),
                r = De ? De.bind(s) : s[r].bind(s);
              t.getEventListeners &&
                t.getEventListeners().forEach(([o, d]) => {
                  r(o, d);
                }),
                e && (r(E, e), r(fe, e)),
                (s.src = n);
              let i = lt(t, s),
                a = s[u]("type");
              (!i || t[D]("nomodule") || (a && !Be.test(a))) && e && e();
            } else t.origtype === P ? lt(t, Oe(t)) : e && e();
          },
          Ve = (t, e) => {
            let n = (h[t] || []).indexOf(e);
            if (n >= 0) return (h[t][n] = void 0), !0;
          },
          dt = (t, e, ...n) => {
            if (
              "HTMLDocument::" + f == oe &&
              t === f &&
              !e.toString().match(/jQueryMock/)
            ) {
              b.on(M, c[g].bind(c, t, e, ...n));
              return;
            }
            if (e && (t === f || t === A)) {
              let s = le + t;
              (h[s] = h[s] || []), h[s].push(e), se && ie([t]);
              return;
            }
            return $(t, e, ...n);
          },
          pt = (t, e, ...n) => {
            if (t === f) {
              let s = le + t;
              Ve(s, e);
            }
            return xt(t, e, ...n);
          };
        Pe(c, {
          [g]: {
            get() {
              return dt;
            },
            set() {
              return dt;
            },
          },
          [de]: {
            get() {
              return pt;
            },
            set() {
              return pt;
            },
          },
        });
        var ut = {},
          ve = (t) => {
            if (t)
              try {
                t.match(/^\/\/\w+/) && (t = c.location.protocol + t);
                let e = new URL(t),
                  n = e.origin;
                if (n && !ut[n] && c.location.host !== e.host) {
                  let s = V("link");
                  (s.rel = "preconnect"),
                    (s.href = n),
                    c.head[G](s),
                    (ut[n] = !0);
                }
              } catch {}
          },
          ce = {},
          Tt = (t, e, n, s) => {
            var r = V("link");
            (r.rel = e ? "modulepre" + E : "pre" + E),
              (r.as = "script"),
              n && r[y]("crossorigin", n),
              (r.href = t),
              s[G](r),
              (ce[t] = !0);
          },
          Re = () => {
            if (_wpmeteor.preload && N.length) {
              let t = c.createDocumentFragment();
              N.forEach((e) => {
                let n = e[u](m + "src");
                n &&
                  !ce[n] &&
                  !e[u](m + "integrity") &&
                  !e[D]("nomodule") &&
                  Tt(
                    n,
                    e[u](m + "type") == "module",
                    e[D]("crossorigin") && e[u]("crossorigin"),
                    t
                  );
              }),
                ye(c.head[G].bind(c.head, t));
            }
          };
        $(f, () => {
          let t = [...N];
          (N.length = 0),
            [...c[O]("script[type='" + P + "']"), ...t].forEach((e) => {
              if (ne.has(e)) return;
              let n = e[F]("type").bind(e);
              T(e, "origtype", {
                get() {
                  return n();
                },
              }),
                (e[u](m + "src") || "").match(/\/gtm.js\?/)
                  ? I.push(e)
                  : e[D]("async")
                  ? I.unshift(e)
                  : e[D]("defer")
                  ? te.push(e)
                  : N.push(e),
                ne.add(e);
            });
        });
        var xe = function (...t) {
          let e = V(...t);
          if (!t || t[0].toUpperCase() !== Y || !H) return e;
          let n = e[y].bind(e),
            s = e[u].bind(e),
            r = e[D].bind(e),
            i = e[F]("attributes").bind(e),
            a = [];
          return (
            (e.getEventListeners = () => a),
            ee.forEach((o) => {
              let d = e[F](o).bind(e);
              z[re + "y"](e, o, {
                set(p) {
                  return o === "type" && p && !Be.test(p)
                    ? e[y](o, p)
                    : (((o === "src" && p) ||
                        (o === "type" && p && e.origsrc)) &&
                        n("type", P),
                      p ? e[y](m + o, p) : e[pe](m + o));
                },
                get() {
                  return e[u](m + o);
                },
              }),
                T(e, "orig" + o, {
                  get() {
                    return d();
                  },
                });
            }),
            (e[g] = function (o, d) {
              a.push([o, d]);
            }),
            (e[y] = function (o, d) {
              if (ee.includes(o))
                return o === "type" && d && !Be.test(d)
                  ? n(o, d)
                  : (((o === "src" && d) || (o === "type" && d && e.origsrc)) &&
                      n("type", P),
                    d ? n(m + o, d) : e[pe](m + o));
              n(o, d);
            }),
            (e[u] = function (o) {
              return ee.indexOf(o) >= 0 ? s(m + o) : s(o);
            }),
            (e[D] = function (o) {
              return ee.indexOf(o) >= 0 ? r(m + o) : r(o);
            }),
            T(e, "attributes", {
              get() {
                return [...i()]
                  .filter((d) => d.name !== "type")
                  .map((d) => ({
                    name: d.name.match(new RegExp(m))
                      ? d.name.replace(m, "")
                      : d.name,
                    value: d.value,
                  }));
              },
            }),
            e
          );
        };
        Object.defineProperty(Document[v], "createElement", {
          set(t) {
            t !== xe && (Le = t);
          },
          get() {
            return Le || xe;
          },
        });
        var ne = new Set(),
          He = new MutationObserver((t) => {
            H &&
              t.forEach(({ removedNodes: e, addedNodes: n, target: s }) => {
                e.forEach((r) => {
                  r.nodeType === 1 &&
                    Y === r[_] &&
                    "origtype" in r &&
                    ne.delete(r);
                }),
                  n.forEach((r) => {
                    if (r.nodeType === 1)
                      if (Y === r[_]) {
                        if ("origtype" in r) {
                          let i = r[u](m + "src");
                          ne.has(r) && x("Inserted twice", r),
                            r.parentNode
                              ? (ne.add(r),
                                (i || "").match(/\/gtm.js\?/)
                                  ? (I.push(r), ve(i))
                                  : r[D]("async")
                                  ? (I.unshift(r), ve(i))
                                  : r[D]("defer")
                                  ? (te.push(r), ve(i))
                                  : (i &&
                                      !r[u](m + "integrity") &&
                                      !r[D]("nomodule") &&
                                      !ce[i] &&
                                      (Ye(Fe(), "pre preload", N.length),
                                      Tt(
                                        i,
                                        r[u](m + "type") == "module",
                                        r[D]("crossorigin") &&
                                          r[u]("crossorigin"),
                                        c.head
                                      )),
                                    N.push(r)))
                              : (r[g](E, (a) =>
                                  a.target.parentNode[j](a.target)
                                ),
                                r[g](fe, (a) =>
                                  a.target.parentNode[j](a.target)
                                ),
                                s[G](r));
                        }
                      } else
                        r[_] === "LINK" &&
                          r[u]("as") === "script" &&
                          (ce[r[u]("href")] = !0);
                  });
              });
          }),
          Gt = {
            childList: !0,
            subtree: !0,
            attributes: !0,
            attributeOldValue: !0,
          };
        He.observe(c.documentElement, Gt);
        var It = HTMLElement[v].attachShadow;
        HTMLElement[v].attachShadow = function (t) {
          let e = It.call(this, t);
          return t.mode === "open" && He.observe(e, Gt), e;
        };
        var ft = z[We](HTMLIFrameElement[v], "src");
        T(HTMLIFrameElement[v], "src", {
          get() {
            return this.dataset.fpoSrc
              ? this.dataset.fpoSrc
              : ft.get.call(this);
          },
          set(t) {
            delete this.dataset.fpoSrc, ft.set.call(this, t);
          },
        });
        b.on(M, () => {
          (!Le || Le === xe) &&
            ((Document[v].createElement = _t), He.disconnect()),
            dispatchEvent(new CustomEvent(me)),
            dispatchEvent(new CustomEvent(M));
        });
        var Me = (t) => {
            let e, n;
            !c.currentScript || !c.currentScript.parentNode
              ? ((e = c.body), (n = e.lastChild))
              : ((n = c.currentScript), (e = n.parentNode));
            try {
              let s = V("div");
              (s.innerHTML = t),
                Array.from(s.childNodes).forEach((r) => {
                  r.nodeName === Y
                    ? e.insertBefore(Oe(r), n)
                    : e.insertBefore(r, n);
                });
            } catch (s) {
              x(s);
            }
          },
          Et = (t) =>
            Me(
              t +
                `
`
            );
        Pe(c, {
          write: {
            get() {
              return Me;
            },
            set(t) {
              return (Me = t);
            },
          },
          writeln: {
            get() {
              return Et;
            },
            set(t) {
              return (Et = t);
            },
          },
        });
        var mt = (t, e, ...n) => {
            if (k + f == oe && t === f && !e.toString().match(/jQueryMock/)) {
              b.on(M, l[g].bind(l, t, e, ...n));
              return;
            }
            if (k + E == oe && t === E) {
              b.on(M, l[g].bind(l, t, e, ...n));
              return;
            }
            if (e && (t === E || t === f || (t === B && !se))) {
              let s = t === f ? le + t : k + t;
              (h[s] = h[s] || []), h[s].push(e), se && ie([t]);
              return;
            }
            return C(t, e, ...n);
          },
          gt = (t, e) => {
            if (t === E) {
              let n = t === f ? le + t : k + t;
              Ve(n, e);
            }
            return wt(t, e);
          };
        Pe(l, {
          [g]: {
            get() {
              return mt;
            },
            set() {
              return mt;
            },
          },
          [de]: {
            get() {
              return gt;
            },
            set() {
              return gt;
            },
          },
        });
        var qe = (t) => {
          let e;
          return {
            get() {
              return e;
            },
            set(n) {
              return e && Ve(t, n), (h[t] = h[t] || []), h[t].push(n), (e = n);
            },
          };
        };
        C(Qe, (t) => {
          let { target: e, event: n } = t.detail,
            s = e === l ? c.body : e,
            r = s[u](m + "on" + n.type);
          s[pe](m + "on" + n.type);
          try {
            let i = new Function("event", r);
            e === l ? l[g](E, i.bind(e, n)) : i.call(e, n);
          } catch (i) {
            console.err(i);
          }
        });
        {
          let t = qe(k + E);
          T(l, "onload", t),
            $(f, () => {
              T(c.body, "onload", t);
            });
        }
        T(c, "onreadystatechange", qe(le + A));
        T(l, "onmessage", qe(k + B));
        (() => {
          let t = l.innerHeight,
            e = l.innerWidth,
            n = (r) => {
              let a =
                  { "4g": 1250, "3g": 2500, "2g": 2500 }[
                    (navigator.connection || {}).effectiveType
                  ] || 0,
                o = r.getBoundingClientRect(),
                d = {
                  top: -1 * t - a,
                  left: -1 * e - a,
                  bottom: t + a,
                  right: e + a,
                };
              return !(
                o.left >= d.right ||
                o.right <= d.left ||
                o.top >= d.bottom ||
                o.bottom <= d.top
              );
            },
            s = (r = !0) => {
              let i = 1,
                a = -1,
                o = {},
                d = () => {
                  a++, --i || l[ae](b.emit.bind(b, be), _wpmeteor.rdelay);
                };
              Array.from(c.getElementsByTagName("*")).forEach((p) => {
                let w, Q, K;
                if (p[_] === "IMG") {
                  let L = p.currentSrc || p.src;
                  L &&
                    !o[L] &&
                    !L.match(/^data:/i) &&
                    ((p.loading || "").toLowerCase() !== "lazy" || n(p)) &&
                    (w = L);
                } else if (p[_] === Y) ve(p[u](m + "src"));
                else if (
                  p[_] === "LINK" &&
                  p[u]("as") === "script" &&
                  ["pre" + E, "modulepre" + E].indexOf(p[u]("rel")) >= 0
                )
                  ce[p[u]("href")] = !0;
                else if (
                  (Q = l.getComputedStyle(p)) &&
                  (K = (Q.backgroundImage || "").match(/^url\s*\((.*?)\)/i)) &&
                  (K || []).length
                ) {
                  let L = K[0].slice(4, -1).replace(/"/g, "");
                  !o[L] && !L.match(/^data:/i) && (w = L);
                }
                if (w) {
                  o[w] = !0;
                  let L = new Image();
                  r && (i++, L[g](E, d), L[g](fe, d)), (L.src = w);
                }
              }),
                c.fonts.ready.then(() => {
                  d();
                });
            };
          _wpmeteor.rdelay === 0 ? $(f, s) : C(E, s);
        })();
      })();
      //0.1.47
    </script>
    <script type="javascript/blocked" data-wpmeteor-type="text/javascript">
      window.MSInputMethodContext && document.documentMode && document.write('<script src="wp-content/themes/woodmart/js/libs/ie11CustomProperties.min.js"><\/script>');
    </script>
    <script type="javascript/blocked" data-wpmeteor-type="text/javascript">
      window._wca = window._wca || [];
    </script>

    <!-- Search Engine Optimization by Rank Math - https://rankmath.com/ -->
    <title>Saptdhanya - Buy Roasted Millet Snacks and Sweets Online</title>
    <meta
      name="description"
      content="Indulge in the authentic flavors of India! Buy Saptdhanya 100% roasted millet snacks, sweets, and namkeen online for a delicious taste of tradition"
    />
    <meta
      name="robots"
      content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large"
    />
    <link rel="canonical" href="index.html" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta
      property="og:title"
      content="Saptdhanya - Buy Roasted Millet Snacks and Sweets Online"
    />
    <meta
      property="og:description"
      content="Indulge in the authentic flavors of India! Buy Saptdhanya 100% roasted millet snacks, sweets, and namkeen online for a delicious taste of tradition"
    />
   
    <meta property="og:site_name" content="Saptdhanya" />
    <meta property="og:updated_time" content="2024-04-06T19:51:49+05:30" />
    <meta
      property="og:image"
      content="wp-content/uploads/2024/02/Order-Now-91-9001655666-1024x413.webp"
    />
    <meta
      property="og:image:secure_url"
      content="/wp-content/uploads/2024/02/Order-Now-91-9001655666-1024x413.webp"
    />
    <meta property="og:image:width" content="1024" />
    <meta property="og:image:height" content="413" />
    <meta
      property="og:image:alt"
      content="Saptdhanya Banner - 100% roasted millet snacks"
    />
    <meta property="og:image:type" content="image/webp" />
    <meta
      property="article:published_time"
      content="2023-05-19T06:06:02+05:30"
    />
    <meta
      property="article:modified_time"
      content="2024-04-06T19:51:49+05:30"
    />
    <meta name="twitter:card" content="summary_large_image" />
    <meta
      name="twitter:title"
      content="Saptdhanya - Buy Roasted Millet Snacks and Sweets Online"
    />
    <meta
      name="twitter:description"
      content="Indulge in the authentic flavors of India! Buy Saptdhanya 100% roasted millet snacks, sweets, and namkeen online for a delicious taste of tradition"
    />
    <meta
      name="twitter:image"
      content="/wp-content/uploads/2024/02/Order-Now-91-9001655666-1024x413.webp"
    />
    <meta name="twitter:label1" content="Written by" />
    <meta name="twitter:data1" content="Saptdhanya" />
    <meta name="twitter:label2" content="Time to read" />
    <meta name="twitter:data2" content="2 minutes" />
    <script type="application/ld+json" class="rank-math-schema">
      {
        "@context": "https://schema.org",
        "@graph": [
          {
            "@type": "Organization",
            "@id": "/#organization",
            "name": "Saptdhanya"
          },
          {
            "@type": "WebSite",
            "@id": "/#website",
            "url": "",
            "name": "Saptdhanya",
            "publisher": { "@id": "/#organization" },
            "inLanguage": "en-US",
            "potentialAction": {
              "@type": "SearchAction",
              "target": "/?s={search_term_string}",
              "query-input": "required name=search_term_string"
            }
          },
          {
            "@type": "ImageObject",
            "@id": "/wp-content/uploads/2023/11/roasted-1-min-1024x1024.webp",
            "url": "/wp-content/uploads/2023/11/roasted-1-min-1024x1024.webp",
            "width": "200",
            "height": "200",
            "inLanguage": "en-US"
          },
          {
            "@type": "WebPage",
            "@id": "/#webpage",
            "url": "/",
            "name": "Saptdhanya - Buy Roasted Millet Snacks and Sweets Online",
            "datePublished": "2023-05-19T06:06:02+05:30",
            "dateModified": "2024-04-06T19:51:49+05:30",
            "about": { "@id": "/#organization" },
            "isPartOf": { "@id": "/#website" },
            "primaryImageOfPage": {
              "@id": "/wp-content/uploads/2023/11/roasted-1-min-1024x1024.webp"
            },
            "inLanguage": "en-US"
          },
          {
            "@type": "Person",
            "@id": "/author//",
            "name": "Saptdhanya",
            "url": "/author//",
            "image": {
              "@type": "ImageObject",
              "@id": "https://secure.gravatar.com/avatar/80cb3f87f953c593db5fb3f4e3b16c7b?s=96&amp;d=mm&amp;r=g",
              "url": "https://secure.gravatar.com/avatar/80cb3f87f953c593db5fb3f4e3b16c7b?s=96&amp;d=mm&amp;r=g",
              "caption": "Saptdhanya",
              "inLanguage": "en-US"
            },
            "sameAs": [
              "",
              "<?=$socialArray["Facebook"] ?>"
            ],
            "worksFor": { "@id": "/#organization" }
          },
          {
            "@type": "Article",
            "headline": "Saptdhanya - Buy Roasted Millet Snacks and Sweets Online",
            "keywords": "Namkeen,Snacks,Sweets,Chips",
            "datePublished": "2023-05-19T06:06:02+05:30",
            "dateModified": "2024-04-06T19:51:49+05:30",
            "author": {
              "@id": "/author//",
              "name": "Saptdhanya"
            },
            "publisher": { "@id": "/#organization" },
            "description": "Indulge in the authentic flavors of India! Buy Saptdhanya 100% roasted millet snacks, sweets, and namkeen online for a delicious taste of tradition",
            "name": "Saptdhanya - Buy Roasted Millet Snacks and Sweets Online",
            "@id": "/#richSnippet",
            "isPartOf": { "@id": "/#webpage" },
            "image": {
              "@id": "/wp-content/uploads/2023/11/roasted-1-min-1024x1024.webp"
            },
            "inLanguage": "en-US",
            "mainEntityOfPage": { "@id": "/#webpage" }
          }
        ]
      }
    </script>
    <!-- /Rank Math WordPress SEO plugin -->

    <link rel="dns-prefetch" href="https://stats.wp.com/" />
    <link rel="dns-prefetch" href="https://www.googletagmanager.com/" />
    <link rel="dns-prefetch" href="https://fonts.googleapis.com/" />
    <link
      rel="alternate"
      type="application/rss+xml"
      title="Saptdhanya &raquo; Feed"
      href="feed/index.html"
    />
    <link
      rel="alternate"
      type="application/rss+xml"
      title="Saptdhanya &raquo; Comments Feed"
      href="comments/feed/index.html"
    />
    <style id="jetpack-sharing-buttons-style-inline-css" type="text/css">
      .jetpack-sharing-buttons__services-list {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        gap: 0;
        list-style-type: none;
        margin: 5px;
        padding: 0;
      }
      .jetpack-sharing-buttons__services-list.has-small-icon-size {
        font-size: 12px;
      }
      .jetpack-sharing-buttons__services-list.has-normal-icon-size {
        font-size: 16px;
      }
      .jetpack-sharing-buttons__services-list.has-large-icon-size {
        font-size: 24px;
      }
      .jetpack-sharing-buttons__services-list.has-huge-icon-size {
        font-size: 36px;
      }
      @media print {
        .jetpack-sharing-buttons__services-list {
          display: none !important;
        }
      }
      .editor-styles-wrapper .wp-block-jetpack-sharing-buttons {
        gap: 0;
        padding-inline-start: 0;
      }
      ul.jetpack-sharing-buttons__services-list.has-background {
        padding: 1.25em 2.375em;
      }
    </style>
    <style id="rank-math-toc-block-style-inline-css" type="text/css">
      .wp-block-rank-math-toc-block nav ol {
        counter-reset: item;
      }
      .wp-block-rank-math-toc-block nav ol li {
        display: block;
      }
      .wp-block-rank-math-toc-block nav ol li:before {
        content: counters(item, ".") ". ";
        counter-increment: item;
      }
    </style>
    <style id="classic-theme-styles-inline-css" type="text/css">
      /*! This file is auto-generated */
      .wp-block-button__link {
        color: #fff;
        background-color: #32373c;
        border-radius: 9999px;
        box-shadow: none;
        text-decoration: none;
        padding: calc(0.667em + 2px) calc(1.333em + 2px);
        font-size: 1.125em;
      }
      .wp-block-file__button {
        background: #32373c;
        color: #fff;
        text-decoration: none;
      }
    </style>
    <style id="global-styles-inline-css" type="text/css">
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
        --wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(
          135deg,
          rgba(6, 147, 227, 1) 0%,
          rgb(155, 81, 224) 100%
        );
        --wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(
          135deg,
          rgb(122, 220, 180) 0%,
          rgb(0, 208, 130) 100%
        );
        --wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(
          135deg,
          rgba(252, 185, 0, 1) 0%,
          rgba(255, 105, 0, 1) 100%
        );
        --wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(
          135deg,
          rgba(255, 105, 0, 1) 0%,
          rgb(207, 46, 46) 100%
        );
        --wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(
          135deg,
          rgb(238, 238, 238) 0%,
          rgb(169, 184, 195) 100%
        );
        --wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(
          135deg,
          rgb(74, 234, 220) 0%,
          rgb(151, 120, 209) 20%,
          rgb(207, 42, 186) 40%,
          rgb(238, 44, 130) 60%,
          rgb(251, 105, 98) 80%,
          rgb(254, 248, 76) 100%
        );
        --wp--preset--gradient--blush-light-purple: linear-gradient(
          135deg,
          rgb(255, 206, 236) 0%,
          rgb(152, 150, 240) 100%
        );
        --wp--preset--gradient--blush-bordeaux: linear-gradient(
          135deg,
          rgb(254, 205, 165) 0%,
          rgb(254, 45, 45) 50%,
          rgb(107, 0, 62) 100%
        );
        --wp--preset--gradient--luminous-dusk: linear-gradient(
          135deg,
          rgb(255, 203, 112) 0%,
          rgb(199, 81, 192) 50%,
          rgb(65, 88, 208) 100%
        );
        --wp--preset--gradient--pale-ocean: linear-gradient(
          135deg,
          rgb(255, 245, 203) 0%,
          rgb(182, 227, 212) 50%,
          rgb(51, 167, 181) 100%
        );
        --wp--preset--gradient--electric-grass: linear-gradient(
          135deg,
          rgb(202, 248, 128) 0%,
          rgb(113, 206, 126) 100%
        );
        --wp--preset--gradient--midnight: linear-gradient(
          135deg,
          rgb(2, 3, 129) 0%,
          rgb(40, 116, 252) 100%
        );
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
        --wp--preset--shadow--outlined: 6px 6px 0px -3px rgba(255, 255, 255, 1),
          6px 6px rgba(0, 0, 0, 1);
        --wp--preset--shadow--crisp: 6px 6px 0px rgba(0, 0, 0, 1);
      }
      :where(.is-layout-flex) {
        gap: 0.5em;
      }
      :where(.is-layout-grid) {
        gap: 0.5em;
      }
      body .is-layout-flow > .alignleft {
        float: left;
        margin-inline-start: 0;
        margin-inline-end: 2em;
      }
      body .is-layout-flow > .alignright {
        float: right;
        margin-inline-start: 2em;
        margin-inline-end: 0;
      }
      body .is-layout-flow > .aligncenter {
        margin-left: auto !important;
        margin-right: auto !important;
      }
      body .is-layout-constrained > .alignleft {
        float: left;
        margin-inline-start: 0;
        margin-inline-end: 2em;
      }
      body .is-layout-constrained > .alignright {
        float: right;
        margin-inline-start: 2em;
        margin-inline-end: 0;
      }
      body .is-layout-constrained > .aligncenter {
        margin-left: auto !important;
        margin-right: auto !important;
      }
      body
        .is-layout-constrained
        > :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
        max-width: var(--wp--style--global--content-size);
        margin-left: auto !important;
        margin-right: auto !important;
      }
      body .is-layout-constrained > .alignwide {
        max-width: var(--wp--style--global--wide-size);
      }
      body .is-layout-flex {
        display: flex;
      }
      body .is-layout-flex {
        flex-wrap: wrap;
        align-items: center;
      }
      body .is-layout-flex > * {
        margin: 0;
      }
      body .is-layout-grid {
        display: grid;
      }
      body .is-layout-grid > * {
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
        background-color: var(
          --wp--preset--color--luminous-vivid-orange
        ) !important;
      }
      .has-luminous-vivid-amber-background-color {
        background-color: var(
          --wp--preset--color--luminous-vivid-amber
        ) !important;
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
        border-color: var(
          --wp--preset--color--luminous-vivid-orange
        ) !important;
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
        background: var(
          --wp--preset--gradient--vivid-cyan-blue-to-vivid-purple
        ) !important;
      }
      .has-light-green-cyan-to-vivid-green-cyan-gradient-background {
        background: var(
          --wp--preset--gradient--light-green-cyan-to-vivid-green-cyan
        ) !important;
      }
      .has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background {
        background: var(
          --wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange
        ) !important;
      }
      .has-luminous-vivid-orange-to-vivid-red-gradient-background {
        background: var(
          --wp--preset--gradient--luminous-vivid-orange-to-vivid-red
        ) !important;
      }
      .has-very-light-gray-to-cyan-bluish-gray-gradient-background {
        background: var(
          --wp--preset--gradient--very-light-gray-to-cyan-bluish-gray
        ) !important;
      }
      .has-cool-to-warm-spectrum-gradient-background {
        background: var(
          --wp--preset--gradient--cool-to-warm-spectrum
        ) !important;
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
    <style id="woocommerce-inline-inline-css" type="text/css">
      .woocommerce form .form-row .required {
        visibility: visible;
      }
    </style>
    <link
      rel="stylesheet"
      id="wpo_min-header-0-css"
      href="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-header-fe5d2fe7.min.css"
      type="text/css"
      media="all"
    />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <script
      type="javascript/blocked"
      data-wpmeteor-type="text/javascript"
      data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-header-wp-polyfill-inert3.1.2.min.js"
      id="wpo_min-header-0-js"
    ></script>
    <script
      type="javascript/blocked"
      data-wpmeteor-type="text/javascript"
      data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-header-regenerator-runtime0.14.0.min.js"
      id="wpo_min-header-1-js"
    ></script>
    <script
      type="javascript/blocked"
      data-wpmeteor-type="text/javascript"
      data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-header-wp-polyfill-inertregenerator-runtimewp-polyfill3.1.20.14.03.15.0.min.js"
      id="wpo_min-header-2-js"
    ></script>
    <script
      type="javascript/blocked"
      data-wpmeteor-type="text/javascript"
      data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-header-wp-polyfillwp-hooks3.15.02810c76e705dd1a53b18.min.js"
      id="wpo_min-header-3-js"
    ></script>
   
    <script
      type="javascript/blocked"
      data-wpmeteor-type="text/javascript"
      data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-header-jquery-core3.7.1.min.js"
      id="wpo_min-header-5-js"
    ></script>
    <script
      type="javascript/blocked"
      data-wpmeteor-type="text/javascript"
      data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-header-jquery-migrate3.4.1.min.js"
      id="wpo_min-header-6-js"
    ></script>
    <script
      type="javascript/blocked"
      data-wpmeteor-type="text/javascript"
      data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-header-jqueryjquery-blockui3.7.12.7.0-wc.8.7.0.min.js"
      id="wpo_min-header-7-js"
    ></script>
    <script
      type="javascript/blocked"
      data-wpmeteor-type="text/javascript"
      id="wpo_min-header-8-js-extra"
    >
      /* <![CDATA[ */
      var wc_add_to_cart_params = {"ajax_url":"\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/?wc-ajax=%%endpoint%%&jcart_page_id=229","i18n_view_cart":"View cart","cart_url":"https:\/\/\/cart\/","is_cart":"","cart_redirect_after_add":"no"};
      /* ]]> */
    </script>
    <script
      type="javascript/blocked"
      data-wpmeteor-type="text/javascript"
      data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-header-jqueryjquery-blockuiwc-add-to-cart3.7.12.7.0-wc.8.7.08.7.0.min.js"
      id="wpo_min-header-8-js"
    ></script>
    <script
      type="javascript/blocked"
      data-wpmeteor-type="text/javascript"
      data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-header-js-cookie2.1.4-wc.8.7.0.min.js"
      id="wpo_min-header-9-js"
    ></script>
    <script
      type="javascript/blocked"
      data-wpmeteor-type="text/javascript"
      id="wpo_min-header-10-js-extra"
    >
      /* <![CDATA[ */
      var woocommerce_params = {"ajax_url":"\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/?wc-ajax=%%endpoint%%&jcart_page_id=229"};
      /* ]]> */
    </script>
    <script
      type="javascript/blocked"
      data-wpmeteor-type="text/javascript"
      data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-header-jqueryjquery-blockuijs-cookiewoocommerce3.7.12.7.0-wc.8.7.02.1.4-wc.8.7.08.7.0.min.js"
      id="wpo_min-header-10-js"
    ></script>
    <script
      type="javascript/blocked"
      data-wpmeteor-type="text/javascript"
      data-wpmeteor-src=""
      id="woocommerce-analytics-js"
      defer="defer"
      data-wp-strategy="defer"
    ></script>
    <script
      type="javascript/blocked"
      data-wpmeteor-type="text/javascript"
      id="wpo_min-header-12-js-extra"
    >
      /* <![CDATA[ */
      var wc_cart_fragments_params = {"ajax_url":"\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/?wc-ajax=%%endpoint%%&jcart_page_id=229","cart_hash_key":"wc_cart_hash_922703ab473fa9b909b138c94b1e78ba","fragment_name":"wc_fragments_922703ab473fa9b909b138c94b1e78ba","request_timeout":"5000"};
      /* ]]> */
    </script>
    <script
      type="javascript/blocked"
      data-wpmeteor-type="text/javascript"
      data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-header-jqueryjs-cookiewc-cart-fragments3.7.12.1.4-wc.8.7.08.7.0.min.js"
      id="wpo_min-header-12-js"
    ></script>
    <script
      type="javascript/blocked"
      data-wpmeteor-type="text/javascript"
      data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-header-jqueryjquery-bind-first3.7.1.min.js"
      id="wpo_min-header-13-js"
    ></script>
    <script
      type="javascript/blocked"
      data-wpmeteor-type="text/javascript"
      data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-header-js-cookie-pys2.1.3.min.js"
      id="wpo_min-header-14-js"
    ></script>
    <script
      type="javascript/blocked"
      data-wpmeteor-type="text/javascript"
      id="wpo_min-header-15-js-extra"
    >
      /* <![CDATA[ */
      var pysOptions = {"staticEvents":[],"dynamicEvents":[],"triggerEvents":[],"triggerEventTypes":[],"debug":"","siteUrl":"https:\/\/","ajaxUrl":"https:\/\/\/wp-admin\/admin-ajax.php","ajax_event":"59edc6e2e9","enable_remove_download_url_param":"1","cookie_duration":"7","last_visit_duration":"60","enable_success_send_form":"","ajaxForServerEvent":"1","send_external_id":"1","external_id_expire":"180","google_consent_mode":"1","gdpr":{"ajax_enabled":false,"all_disabled_by_api":false,"facebook_disabled_by_api":false,"analytics_disabled_by_api":false,"google_ads_disabled_by_api":false,"pinterest_disabled_by_api":false,"bing_disabled_by_api":false,"externalID_disabled_by_api":false,"facebook_prior_consent_enabled":true,"analytics_prior_consent_enabled":true,"google_ads_prior_consent_enabled":null,"pinterest_prior_consent_enabled":true,"bing_prior_consent_enabled":true,"cookiebot_integration_enabled":false,"cookiebot_facebook_consent_category":"marketing","cookiebot_analytics_consent_category":"statistics","cookiebot_tiktok_consent_category":"marketing","cookiebot_google_ads_consent_category":null,"cookiebot_pinterest_consent_category":"marketing","cookiebot_bing_consent_category":"marketing","consent_magic_integration_enabled":false,"real_cookie_banner_integration_enabled":false,"cookie_notice_integration_enabled":false,"cookie_law_info_integration_enabled":false,"analytics_storage":{"enabled":true,"value":"granted","filter":false},"ad_storage":{"enabled":true,"value":"granted","filter":false},"ad_user_data":{"enabled":true,"value":"granted","filter":false},"ad_personalization":{"enabled":true,"value":"granted","filter":false}},"cookie":{"disabled_all_cookie":false,"disabled_start_session_cookie":false,"disabled_advanced_form_data_cookie":false,"disabled_landing_page_cookie":false,"disabled_first_visit_cookie":false,"disabled_trafficsource_cookie":false,"disabled_utmTerms_cookie":false,"disabled_utmId_cookie":false},"tracking_analytics":{"TrafficSource":"direct","TrafficLanding":"undefined","TrafficUtms":[],"TrafficUtmsId":[]},"woo":{"enabled":true,"enabled_save_data_to_orders":true,"addToCartOnButtonEnabled":true,"addToCartOnButtonValueEnabled":true,"addToCartOnButtonValueOption":"price","singleProductId":null,"removeFromCartSelector":"form.woocommerce-cart-form .remove","addToCartCatchMethod":"add_cart_hook","is_order_received_page":false,"containOrderId":false},"edd":{"enabled":false}};
      /* ]]> */
    </script>
    <script
      type="javascript/blocked"
      data-wpmeteor-type="text/javascript"
      data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-header-jqueryjs-cookie-pysjquery-bind-firstpys3.7.12.1.39.5.5.min.js"
      id="wpo_min-header-15-js"
    ></script>


    
    <script  type="javascript/blocked" data-wpmeteor-type="text/javascript"  data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wd-sticky-add-to-cart7.1.4.min.js" id="wpo_min-footer-66-js"></script>
    
<script  type="javascript/blocked" data-wpmeteor-type="text/javascript"  data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wd-click-on-scroll-btn7.1.4.min.js" id="wpo_min-footer-30-js"></script>
<script  type="javascript/blocked" data-wpmeteor-type="text/javascript"  data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wd-sort-by-widget7.1.4.min.js" id="wpo_min-footer-28-js"></script>

<script  type="javascript/blocked" data-wpmeteor-type="text/javascript"  data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wd-login-tabs7.1.4.min.js" id="wpo_min-footer-36-js"></script>

<script  type="javascript/blocked" data-wpmeteor-type="text/javascript"  data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-jquery-tiptip8.7.0.min.js" id="wpo_min-footer-9-js"></script>
<script  type="javascript/blocked" data-wpmeteor-type="text/javascript"  data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-qlwappe91de9a147a4b721ec5b.min.js" id="wpo_min-footer-10-js"></script>
    <!-- Google tag (gtag.js) snippet added by Site Kit -->

    <!-- Google Analytics snippet added by Site Kit -->
    <script
      type="javascript/blocked"
      data-wpmeteor-type="text/javascript"
      data-wpmeteor-src="https://www.googletagmanager.com/gtag/js?id=GT-PJNB9QPL"
      id="google_gtagjs-js"
      async
    ></script>
    <script
      type="javascript/blocked"
      data-wpmeteor-type="text/javascript"
      id="google_gtagjs-js-after"
    >
      /* <![CDATA[ */
      window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}
      gtag("set","linker",{"domains":[""]});
      gtag("js", new Date());
      gtag("set", "developer_id.dZTNiMT", true);
      gtag("config", "GT-PJNB9QPL");
      /* ]]> */
    </script>

    <!-- End Google tag (gtag.js) snippet added by Site Kit -->
    <script
      type="javascript/blocked"
      data-wpmeteor-type="text/javascript"
      data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-header-jquerywd-device-library3.7.17.1.4.min.js"
      id="wpo_min-header-17-js"
    ></script>
    <link rel="https://api.w.org/" href="wp-json/index.html" />
    <link
      rel="alternate"
      type="application/json"
      href="wp-json/wp/v2/pages/229"
    />
    <link
      rel="EditURI"
      type="application/rsd+xml"
      title="RSD"
      href="xmlrpc.php@rsd"
    />
    <meta name="generator" content="WordPress 6.5.2" />
    <link rel="shortlink" href="index.html" />
    <link
      rel="alternate"
      type="application/json+oembed"
      href="wp-json/oembed/1.0/embed@url=https%253A%252F%252F%252F"
    />
    <link
      rel="alternate"
      type="text/xml+oembed"
      href="wp-json/oembed/1.0/embed@url=https%253A%252F%252F%252F&amp;format=xml"
    />
    <meta name="generator" content="Site Kit by Google 1.124.0" />
    <!-- Google tag (gtag.js) -->
    <!-- <script  type="javascript/blocked" data-wpmeteor-type="text/javascript"  async data-wpmeteor-src="https://www.googletagmanager.com/gtag/js?id=UA-269068220-1"></script>
<script  type="javascript/blocked" data-wpmeteor-type="text/javascript" >
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-269068220-1');
</script>
 -->
    <!-- Google Tag Manager -->
    <script type="javascript/blocked" data-wpmeteor-type="text/javascript">
      (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-K2CZWRP');
    </script>
    <!-- End Google Tag Manager -->
    <meta
      name="facebook-domain-verification"
      content="kx1eppvmtjv31auyzv53zejkvu70b5"
    />
    <style>
      img#wpstats {
        display: none;
      }
    </style>
    <meta name="theme-color" content="rgb(53,94,59)" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <noscript
      ><style>
        .woocommerce-product-gallery {
          opacity: 1 !important;
        }
      </style></noscript
    >
    <meta
      name="generator"
      content="Elementor 3.20.4; features: e_optimized_assets_loading, e_optimized_css_loading, additional_custom_breakpoints, block_editor_assets_optimize, e_image_loading_optimization; settings: css_print_method-external, google_font-enabled, font_display-swap"
    />
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
      	'');
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
    <link
      rel="icon"
      href="wp-content/uploads/2024/01/slazzer-edit-image-1-32x32.png"
      sizes="32x32"
    />
    <link
      rel="icon"
      href="wp-content/uploads/2024/01/slazzer-edit-image-1-300x300.png"
      sizes="192x192"
    />
    <link
      rel="apple-touch-icon"
      href="wp-content/uploads/2024/01/slazzer-edit-image-1-300x300.png"
    />
    <meta
      name="msapplication-TileImage"
      content="/wp-content/uploads/2024/01/slazzer-edit-image-1-300x300.png"
    />
    <style type="text/css" id="wp-custom-css">
      			.sku_wrapper{
      	display: none !important;
      }

      .product-tabs-wrapper{
      	background-color: rgb(245,245,245) !important
      }

      .wc-cancel-order::after{
      	content: "Order"
      }
      .wc-cancel-order::after{
      	content: none;
      }
      .wd-entities-title{
      	font-weight:600 !important;
      	font-size: 16px !important;
      	white-space: nowrap !important;
        overflow: hidden !important;
        text-overflow: ellipsis !important;
      	width: 100%;
      }

      .wd-entities-title>a{
          white-space: nowrap !important;
          overflow: hidden !important;
          text-overflow: ellipsis !important;
          width: 100%;
          display: inline-block;
      }

      .wd-empty-page:before {
          color: #355e3b !important;
      }

      .wd-empty-mini-cart:before{
      	color: #355e3b !important;
      }

      /* .required{
      	display:none;
      } */



      .cart-actions .button[name="update_cart"]{
      	display:none ;
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

      
    </style>
    <style></style>
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
    class="home page-template-default page page-id-229 theme-woodmart woocommerce-no-js wrapper-full-width woodmart-ajax-shop-on offcanvas-sidebar-mobile offcanvas-sidebar-tablet sticky-toolbar-on elementor-default elementor-kit-227 elementor-page elementor-page-229"
  >
    <!-- Google Tag Manager (noscript) snippet added by Site Kit -->
    <noscript>
      <iframe
        src="https://www.googletagmanager.com/ns.html?id=GTM-K8G9NDDJ"
        height="0"
        width="0"
        style="display: none; visibility: hidden"
      ></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) snippet added by Site Kit -->
    <!-- Google Tag Manager (noscript) -->
    <!-- <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K2CZWRP"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript> -->
    <!-- End Google Tag Manager (noscript) -->
    <script
      type="javascript/blocked"
      data-wpmeteor-type="text/javascript"
      id="wd-flicker-fix"
    >
      // Flicker fix.
    </script>

    <div class="website-wrapper">
    <?php require_once('headerbar.php'); ?>