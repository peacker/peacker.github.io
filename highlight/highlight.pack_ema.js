/*! highlight.js v9.1.0 | BSD3 License | git.io/hljslicense */ ! function(e) {
    "undefined" != typeof exports ? e(exports) : (self.hljs = e({}), "function" == typeof define && define.amd && define("hljs", [], function() {
        return self.hljs
    }))
}(function(e) {
    function n(e) {
        return e.replace(/&/gm, "&amp;").replace(/</gm, "&lt;").replace(/>/gm, "&gt;")
    }

    function t(e) {
        return e.nodeName.toLowerCase()
    }

    function r(e, n) {
        var t = e && e.exec(n);
        return t && 0 == t.index
    }

    function a(e) {
        return /^(no-?highlight|plain|text)$/i.test(e)
    }

    function i(e) {
        var n, t, r, i = e.className + " ";
        if (i += e.parentNode ? e.parentNode.className : "", t = /\blang(?:uage)?-([\w-]+)\b/i.exec(i)) return E(t[1]) ? t[1] : "no-highlight";
        for (i = i.split(/\s+/), n = 0, r = i.length; r > n; n++)
            if (E(i[n]) || a(i[n])) return i[n]
    }

    function o(e, n) {
        var t, r = {};
        for (t in e) r[t] = e[t];
        if (n)
            for (t in n) r[t] = n[t];
        return r
    }

    function u(e) {
        var n = [];
        return function r(e, a) {
            for (var i = e.firstChild; i; i = i.nextSibling) 3 == i.nodeType ? a += i.nodeValue.length : 1 == i.nodeType && (n.push({
                event: "start",
                offset: a,
                node: i
            }), a = r(i, a), t(i).match(/br|hr|img|input/) || n.push({
                event: "stop",
                offset: a,
                node: i
            }));
            return a
        }(e, 0), n
    }

    function c(e, r, a) {
        function i() {
            return e.length && r.length ? e[0].offset != r[0].offset ? e[0].offset < r[0].offset ? e : r : "start" == r[0].event ? e : r : e.length ? e : r
        }

        function o(e) {
            function r(e) {
                return " " + e.nodeName + '="' + n(e.value) + '"'
            }
            l += "<" + t(e) + Array.prototype.map.call(e.attributes, r).join("") + ">"
        }

        function u(e) {
            l += "</" + t(e) + ">"
        }

        function c(e) {
            ("start" == e.event ? o : u)(e.node)
        }
        for (var s = 0, l = "", f = []; e.length || r.length;) {
            var g = i();
            if (l += n(a.substr(s, g[0].offset - s)), s = g[0].offset, g == e) {
                f.reverse().forEach(u);
                do c(g.splice(0, 1)[0]), g = i(); while (g == e && g.length && g[0].offset == s);
                f.reverse().forEach(o)
            } else "start" == g[0].event ? f.push(g[0].node) : f.pop(), c(g.splice(0, 1)[0])
        }
        return l + n(a.substr(s))
    }

    function s(e) {
        function n(e) {
            return e && e.source || e
        }

        function t(t, r) {
            return new RegExp(n(t), "m" + (e.cI ? "i" : "") + (r ? "g" : ""))
        }

        function r(a, i) {
            if (!a.compiled) {
                if (a.compiled = !0, a.k = a.k || a.bK, a.k) {
                    var u = {},
                        c = function(n, t) {
                            e.cI && (t = t.toLowerCase()), t.split(" ").forEach(function(e) {
                                var t = e.split("|");
                                u[t[0]] = [n, t[1] ? Number(t[1]) : 1]
                            })
                        };
                    "string" == typeof a.k ? c("keyword", a.k) : Object.keys(a.k).forEach(function(e) {
                        c(e, a.k[e])
                    }), a.k = u
                }
                a.lR = t(a.l || /\b\w+\b/, !0), i && (a.bK && (a.b = "\\b(" + a.bK.split(" ").join("|") + ")\\b"), a.b || (a.b = /\B|\b/), a.bR = t(a.b), a.e || a.eW || (a.e = /\B|\b/), a.e && (a.eR = t(a.e)), a.tE = n(a.e) || "", a.eW && i.tE && (a.tE += (a.e ? "|" : "") + i.tE)), a.i && (a.iR = t(a.i)), void 0 === a.r && (a.r = 1), a.c || (a.c = []);
                var s = [];
                a.c.forEach(function(e) {
                    e.v ? e.v.forEach(function(n) {
                        s.push(o(e, n))
                    }) : s.push("self" == e ? a : e)
                }), a.c = s, a.c.forEach(function(e) {
                    r(e, a)
                }), a.starts && r(a.starts, i);
                var l = a.c.map(function(e) {
                    return e.bK ? "\\.?(" + e.b + ")\\.?" : e.b
                }).concat([a.tE, a.i]).map(n).filter(Boolean);
                a.t = l.length ? t(l.join("|"), !0) : {
                    exec: function() {
                        return null
                    }
                }
            }
        }
        r(e)
    }

    function l(e, t, a, i) {
        function o(e, n) {
            for (var t = 0; t < n.c.length; t++)
                if (r(n.c[t].bR, e)) return n.c[t]
        }

        function u(e, n) {
            if (r(e.eR, n)) {
                for (; e.endsParent && e.parent;) e = e.parent;
                return e
            }
            return e.eW ? u(e.parent, n) : void 0
        }

        function c(e, n) {
            return !a && r(n.iR, e)
        }

        function g(e, n) {
            var t = N.cI ? n[0].toLowerCase() : n[0];
            return e.k.hasOwnProperty(t) && e.k[t]
        }

        function h(e, n, t, r) {
            var a = r ? "" : x.classPrefix,
                i = '<span class="' + a,
                o = t ? "" : "</span>";
            return i += e + '">', i + n + o
        }

        function p() {
            if (!L.k) return n(M);
            var e = "",
                t = 0;
            L.lR.lastIndex = 0;
            for (var r = L.lR.exec(M); r;) {
                e += n(M.substr(t, r.index - t));
                var a = g(L, r);
                a ? (B += a[1], e += h(a[0], n(r[0]))) : e += n(r[0]), t = L.lR.lastIndex, r = L.lR.exec(M)
            }
            return e + n(M.substr(t))
        }

        function d() {
            var e = "string" == typeof L.sL;
            if (e && !R[L.sL]) return n(M);
            var t = e ? l(L.sL, M, !0, y[L.sL]) : f(M, L.sL.length ? L.sL : void 0);
            return L.r > 0 && (B += t.r), e && (y[L.sL] = t.top), h(t.language, t.value, !1, !0)
        }

        function b() {
            return void 0 !== L.sL ? d() : p()
        }

        function v(e, t) {
            var r = e.cN ? h(e.cN, "", !0) : "";
            e.rB ? (k += r, M = "") : e.eB ? (k += n(t) + r, M = "") : (k += r, M = t), L = Object.create(e, {
                parent: {
                    value: L
                }
            })
        }

        function m(e, t) {
            if (M += e, void 0 === t) return k += b(), 0;
            var r = o(t, L);
            if (r) return k += b(), v(r, t), r.rB ? 0 : t.length;
            var a = u(L, t);
            if (a) {
                var i = L;
                i.rE || i.eE || (M += t), k += b();
                do L.cN && (k += "</span>"), B += L.r, L = L.parent; while (L != a.parent);
                return i.eE && (k += n(t)), M = "", a.starts && v(a.starts, ""), i.rE ? 0 : t.length
            }
            if (c(t, L)) throw new Error('Illegal lexeme "' + t + '" for mode "' + (L.cN || "<unnamed>") + '"');
            return M += t, t.length || 1
        }
        var N = E(e);
        if (!N) throw new Error('Unknown language: "' + e + '"');
        s(N);
        var w, L = i || N,
            y = {},
            k = "";
        for (w = L; w != N; w = w.parent) w.cN && (k = h(w.cN, "", !0) + k);
        var M = "",
            B = 0;
        try {
            for (var C, j, I = 0;;) {
                if (L.t.lastIndex = I, C = L.t.exec(t), !C) break;
                j = m(t.substr(I, C.index - I), C[0]), I = C.index + j
            }
            for (m(t.substr(I)), w = L; w.parent; w = w.parent) w.cN && (k += "</span>");
            return {
                r: B,
                value: k,
                language: e,
                top: L
            }
        } catch (O) {
            if (-1 != O.message.indexOf("Illegal")) return {
                r: 0,
                value: n(t)
            };
            throw O
        }
    }

    function f(e, t) {
        t = t || x.languages || Object.keys(R);
        var r = {
                r: 0,
                value: n(e)
            },
            a = r;
        return t.forEach(function(n) {
            if (E(n)) {
                var t = l(n, e, !1);
                t.language = n, t.r > a.r && (a = t), t.r > r.r && (a = r, r = t)
            }
        }), a.language && (r.second_best = a), r
    }

    function g(e) {
        return x.tabReplace && (e = e.replace(/^((<[^>]+>|\t)+)/gm, function(e, n) {
            return n.replace(/\t/g, x.tabReplace)
        })), x.useBR && (e = e.replace(/\n/g, "<br>")), e
    }

    function h(e, n, t) {
        var r = n ? w[n] : t,
            a = [e.trim()];
        return e.match(/\bhljs\b/) || a.push("hljs"), -1 === e.indexOf(r) && a.push(r), a.join(" ").trim()
    }

    function p(e) {
        var n = i(e);
        if (!a(n)) {
            var t;
            x.useBR ? (t = document.createElementNS("http://www.w3.org/1999/xhtml", "div"), t.innerHTML = e.innerHTML.replace(/\n/g, "").replace(/<br[ \/]*>/g, "\n")) : t = e;
            var r = t.textContent,
                o = n ? l(n, r, !0) : f(r),
                s = u(t);
            if (s.length) {
                var p = document.createElementNS("http://www.w3.org/1999/xhtml", "div");
                p.innerHTML = o.value, o.value = c(s, u(p), r)
            }
            o.value = g(o.value), e.innerHTML = o.value, e.className = h(e.className, n, o.language), e.result = {
                language: o.language,
                re: o.r
            }, o.second_best && (e.second_best = {
                language: o.second_best.language,
                re: o.second_best.r
            })
        }
    }

    function d(e) {
        x = o(x, e)
    }

    function b() {
        if (!b.called) {
            b.called = !0;
            var e = document.querySelectorAll("pre code");
            Array.prototype.forEach.call(e, p)
        }
    }

    function v() {
        addEventListener("DOMContentLoaded", b, !1), addEventListener("load", b, !1)
    }

    function m(n, t) {
        var r = R[n] = t(e);
        r.aliases && r.aliases.forEach(function(e) {
            w[e] = n
        })
    }

    function N() {
        return Object.keys(R)
    }

    function E(e) {
        return e = (e || "").toLowerCase(), R[e] || R[w[e]]
    }
    var x = {
            classPrefix: "hljs-",
            tabReplace: null,
            useBR: !1,
            languages: void 0
        },
        R = {},
        w = {};
    return e.highlight = l, e.highlightAuto = f, e.fixMarkup = g, e.highlightBlock = p, e.configure = d, e.initHighlighting = b, e.initHighlightingOnLoad = v, e.registerLanguage = m, e.listLanguages = N, e.getLanguage = E, e.inherit = o, e.IR = "[a-zA-Z]\\w*", e.UIR = "[a-zA-Z_]\\w*", e.NR = "\\b\\d+(\\.\\d+)?", e.CNR = "(-?)(\\b0[xX][a-fA-F0-9]+|(\\b\\d+(\\.\\d*)?|\\.\\d+)([eE][-+]?\\d+)?)", e.BNR = "\\b(0b[01]+)", e.RSR = "!|!=|!==|%|%=|&|&&|&=|\\*|\\*=|\\+|\\+=|,|-|-=|/=|/|:|;|<<|<<=|<=|<|===|==|=|>>>=|>>=|>=|>>>|>>|>|\\?|\\[|\\{|\\(|\\^|\\^=|\\||\\|=|\\|\\||~", e.BE = {
        b: "\\\\[\\s\\S]",
        r: 0
    }, e.ASM = {
        cN: "string",
        b: "'",
        e: "'",
        i: "\\n",
        c: [e.BE]
    }, e.QSM = {
        cN: "string",
        b: '"',
        e: '"',
        i: "\\n",
        c: [e.BE]
    }, e.PWM = {
        b: /\b(a|an|the|are|I|I'm|isn't|don't|doesn't|won't|but|just|should|pretty|simply|enough|gonna|going|wtf|so|such|will|you|your|like)\b/
    }, e.C = function(n, t, r) {
        var a = e.inherit({
            cN: "comment",
            b: n,
            e: t,
            c: []
        }, r || {});
        return a.c.push(e.PWM), a.c.push({
            cN: "doctag",
            b: "(?:TODO|FIXME|NOTE|BUG|XXX):",
            r: 0
        }), a
    }, e.CLCM = e.C("//", "$"), e.CBCM = e.C("/\\*", "\\*/"), e.HCM = e.C("#", "$"), e.NM = {
        cN: "number",
        b: e.NR,
        r: 0
    }, e.CNM = {
        cN: "number",
        b: e.CNR,
        r: 0
    }, e.BNM = {
        cN: "number",
        b: e.BNR,
        r: 0
    }, e.CSSNM = {
        cN: "number",
        b: e.NR + "(%|em|ex|ch|rem|vw|vh|vmin|vmax|cm|mm|in|pt|pc|px|deg|grad|rad|turn|s|ms|Hz|kHz|dpi|dpcm|dppx)?",
        r: 0
    }, e.RM = {
        cN: "regexp",
        b: /\//,
        e: /\/[gimuy]*/,
        i: /\n/,
        c: [e.BE, {
            b: /\[/,
            e: /\]/,
            r: 0,
            c: [e.BE]
        }]
    }, e.TM = {
        cN: "title",
        b: e.IR,
        r: 0
    }, e.UTM = {
        cN: "title",
        b: e.UIR,
        r: 0
    }, e
});

hljs.registerLanguage("cpp", function(t) {
    var e = {
            cN: "keyword",
            b: "\\b[a-z\\d_]*_t\\b"
        },
        r = {
            cN: "string",
            v: [t.inherit(t.QSM, {
                b: '((u8?|U)|L)?"'
            }), {
                b: '(u8?|U)?R"',
                e: '"',
                c: [t.BE]
            }, {
                b: "'\\\\?.",
                e: "'",
                i: "."
            }]
        },
        i = {
            cN: "number",
            v: [{
                b: "\\b(\\d+(\\.\\d*)?|\\.\\d+)(u|U|l|L|ul|UL|f|F)"
            }, {
                b: t.CNR
            }],
            r: 0
        },
        s = {
            cN: "meta",
            b: "#",
            e: "$",
            k: {
                "meta-keyword": "if else elif endif define undef warning error line pragma ifdef ifndef"
            },
            c: [{
                b: /\\\n/,
                r: 0
            }, {
                bK: "include",
                e: "$",
                k: {
                    "meta-keyword": "include"
                },
                c: [t.inherit(r, {
                    cN: "meta-string"
                }), {
                    cN: "meta-string",
                    b: "<",
                    e: ">",
                    i: "\\n"
                }]
            }, r, t.CLCM, t.CBCM]
        },
        a = t.IR + "\\s*\\(",
        c = {
            keyword: "int float while private char catch export virtual operator sizeof dynamic_cast|10 typedef const_cast|10 const struct for static_cast|10 union namespace unsigned long volatile static protected bool template mutable if public friend do goto auto void enum else break extern using class asm case typeid short reinterpret_cast|10 default double register explicit signed typename try this switch continue inline delete alignof constexpr decltype noexcept static_assert thread_local restrict _Bool complex _Complex _Imaginary atomic_bool atomic_char atomic_schar atomic_uchar atomic_short atomic_ushort atomic_int atomic_uint atomic_long atomic_ulong atomic_llong atomic_ullong",
            built_in: "std string cin cout cerr clog stdin stdout stderr stringstream istringstream ostringstream auto_ptr deque list queue stack vector map set bitset multiset multimap unordered_set unordered_map unordered_multiset unordered_multimap array shared_ptr abort abs acos asin atan2 atan calloc ceil cosh cos exit exp fabs floor fmod fprintf fputs free frexp fscanf isalnum isalpha iscntrl isdigit isgraph islower isprint ispunct isspace isupper isxdigit tolower toupper labs ldexp log10 log malloc realloc memchr memcmp memcpy memset modf pow printf putchar puts scanf sinh sin snprintf sprintf sqrt sscanf strcat strchr strcmp strcpy strcspn strlen strncat strncmp strncpy strpbrk strrchr strspn strstr tanh tan vfprintf vprintf vsprintf endl initializer_list unique_ptr",
            literal: "true false nullptr NULL"
        };
    return {
        aliases: ["c", "cc", "h", "c++", "h++", "hpp"],
        k: c,
        i: "</",
        c: [e, t.CLCM, t.CBCM, i, r, s, {
            b: "\\b(deque|list|queue|stack|vector|map|set|bitset|multiset|multimap|unordered_map|unordered_set|unordered_multiset|unordered_multimap|array)\\s*<",
            e: ">",
            k: c,
            c: ["self", e]
        }, {
            b: t.IR + "::",
            k: c
        }, {
            bK: "new throw return else",
            r: 0
        }, {
            cN: "function",
            b: "(" + t.IR + "[\\*&\\s]+)+" + a,
            rB: !0,
            e: /[{;=]/,
            eE: !0,
            k: c,
            i: /[^\w\s\*&]/,
            c: [{
                b: a,
                rB: !0,
                c: [t.TM],
                r: 0
            }, {
                cN: "params",
                b: /\(/,
                e: /\)/,
                k: c,
                r: 0,
                c: [t.CLCM, t.CBCM, r, i]
            }, t.CLCM, t.CBCM, s]
        }]
    }
});
hljs.registerLanguage("python", function(e) {
    var r = {
            cN: "meta",
            b: /^(>>>|\.\.\.) /
        },
        b = {
            cN: "string",
            c: [e.BE],
            v: [{
                b: /(u|b)?r?'''/,
                e: /'''/,
                c: [r],
                r: 10
            }, {
                b: /(u|b)?r?"""/,
                e: /"""/,
                c: [r],
                r: 10
            }, {
                b: /(u|r|ur)'/,
                e: /'/,
                r: 10
            }, {
                b: /(u|r|ur)"/,
                e: /"/,
                r: 10
            }, {
                b: /(b|br)'/,
                e: /'/
            }, {
                b: /(b|br)"/,
                e: /"/
            }, e.ASM, e.QSM]
        },
        a = {
            cN: "number",
            r: 0,
            v: [{
                b: e.BNR + "[lLjJ]?"
            }, {
                b: "\\b(0o[0-7]+)[lLjJ]?"
            }, {
                b: e.CNR + "[lLjJ]?"
            }]
        },
        l = {
            cN: "params",
            b: /\(/,
            e: /\)/,
            c: ["self", r, a, b]
        };
    return {
        aliases: ["py", "gyp"],
        k: {
            keyword: "and elif is global as in if from raise for except finally print import pass return exec else break not with class assert yield try while continue del or def lambda async await nonlocal|10 None True False",
            built_in: "Ellipsis NotImplemented"
        },
        i: /(<\/|->|\?)/,
        c: [r, a, b, e.HCM, {
            v: [{
                cN: "function",
                bK: "def",
                r: 10
            }, {
                cN: "class",
                bK: "class"
            }],
            e: /:/,
            i: /[${=;\n,]/,
            c: [e.UTM, l, {
                b: /->/,
                eW: !0,
                k: "None"
            }]
        }, {
            cN: "meta",
            b: /^[\t ]*@/,
            e: /$/
        }, {
            b: /\b(print|exec)\(/
        }]
    }
});

//////////////////////////////////////////////////////////////////////////////
/*
hljs.registerLanguage("magma", function(t) {
    var e = {
            cN: "keyword",
            b: "\\b[a-z\\d_]*_t\\b"
        },
        r = {
            cN: "string",
            v: [t.inherit(t.QSM, {
                b: '((u8?|U)|L)?"'
            }), {
                b: '(u8?|U)?R"',
                e: '"',
                c: [t.BE]
            }, {
                b: "'\\\\?.",
                e: "'",
                i: "."
            }]
        },
        i = {
            cN: "number",
            v: [{
                b: "\\b(\\d+(\\.\\d*)?|\\.\\d+)(u|U|l|L|ul|UL|f|F)"
            }, {
                b: t.CNR
            }],
            r: 0
        },
        s = {
            cN: "meta",
            b: "#",
            e: "$",
            k: {
                "meta-keyword": "if else elif endif define undef warning error line pragma ifdef ifndef"
            },
            c: [{
                b: /\\\n/,
                r: 0
            }, {
                bK: "include",
                e: "$",
                k: {
                    "meta-keyword": "include"
                },
                c: [t.inherit(r, {
                    cN: "meta-string"
                }), {
                    cN: "meta-string",
                    b: "<",
                    e: ">",
                    i: "\\n"
                }]
            }, r, t.CLCM, t.CBCM]
        },
        a = t.IR + "\\s*\\(",
        c = {
            keyword: "end if then else elif return for while do until function intrinsic local",
            built_in: "",
            literal: "or and not true false eq gt ge lt le div mod"
        };
    return {
        aliases: ["Magma", "MAGMA"],
        k: c,
        i: "</",
        c: [e, t.CLCM, t.CBCM, i, r, s, {
            b: "\\b(deque|list|queue|stack|vector|map|set|bitset|multiset|multimap|unordered_map|unordered_set|unordered_multiset|unordered_multimap|array)\\s*<",
            e: ">",
            k: c,
            c: ["self", e]
        }, {
            b: t.IR + "::",
            k: c
        }, {
            bK: "new throw return else",
            r: 0
        }, {
            cN: "function",
            b: "(" + t.IR + "[\\*&\\s]+)+" + a,
            rB: !0,
            e: /[{;=]/,
            eE: !0,
            k: c,
            i: /[^\w\s\*&]/,
            c: [{
                b: a,
                rB: !0,
                c: [t.TM],
                r: 0
            }, {
                cN: "params",
                b: /\(/,
                e: /\)/,
                k: c,
                r: 0,
                c: [t.CLCM, t.CBCM, r, i]
            }, t.CLCM, t.CBCM, s]
        }]
    }
});
*/
hljs.registerLanguage("magma", function(t) {
    var e = {
            cN: "keyword",
            b: "\\b[a-z\\d_]*_t\\b"
        },
        r = {
            cN: "string",
            v: [t.inherit(t.QSM, {
                b: '((u8?|U)|L)?"'
            }), {
                b: '(u8?|U)?R"',
                e: '"',
                c: [t.BE]
            }, {
                b: "'\\\\?.",
                e: "",
                i: "."
            }]
        },
        i = {
            cN: "number",
            v: [{
                b: "\\b(\\d+(\\.\\d*)?|\\.\\d+)(u|U|l|L|ul|UL|f|F)"
            }, {
                b: t.CNR
            }],
            r: 0
        },
        s = {
            cN: "meta",
            b: "##",
            e: "$",
            k: {
                "meta-keyword": ""
            },
            c: [{
                b: /\\\n/,
                r: 0
            }, {
                bK: "include",
                e: "$",
                k: {
                    "meta-keyword": "include"
                },
                c: [t.inherit(r, {
                    cN: "meta-string"
                }), {
                    cN: "meta-string",
                    b: "<",
                    e: ">",
                    i: "\\n"
                }]
            }, r, t.CLCM, t.CBCM, t.CBCM2 = t.C("{\\n", "}")]
        },
        a = t.IR + "\\s*\\(",
        c = {
            keyword: "end if then else elif case try catch return for to by while do repeat until function procedure intrinsic local require requirege requirerange where is break",
            built_in: "time vtime print printf fprint fprintf vprint vprintf eval delete load",
            literal: "in or and not xor true false eq ne cmpeq cmpne gt ge lt le div mod"
        };

    return {
        aliases: ["Magma", "MAGMA"],
        k: c,
        i: "</",
        c: [e, t.CLCM, t.CBCM, t.CBCM2, i, r, s, {
            b: "\\b(deque|list|queue|stack|vector|map|set|bitset|multiset|multimap|unordered_map|unordered_set|unordered_multiset|unordered_multimap|array)\\s*<",
            e: ">",
            k: c,
            c: ["self", e]
        }, {
            b: t.IR + "::",
            k: c
        }, {
            bK: "new throw return else",
            r: 0
        }]
    }
});
