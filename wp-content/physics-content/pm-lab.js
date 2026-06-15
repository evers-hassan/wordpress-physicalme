/**
 * pm-lab.js — tiny helper widgets use to report experiment results
 * back to the mobile-app shell (or to the website, harmlessly).
 *
 * USAGE (inside a widget):
 *
 *   window.pmLab.recordResult({
 *     summary: "T = 1.4s",                  // optional, human-friendly
 *     data:    { period: 1.4, length: 0.5 } // free-form payload
 *   });
 *
 * The shell listens with window.addEventListener('message', ...). When this
 * file runs *outside* an iframe (or the parent ignores the message), it's a
 * no-op — so it's safe to ship on the public site too.
 */
(function () {
  if (window.pmLab) return; // already loaded

  function post(payload) {
    try {
      // Same-origin parent (article view on the site) or app-shell parent (mobile).
      if (window.parent && window.parent !== window) {
        window.parent.postMessage(payload, '*');
      }
    } catch (e) {
      // postMessage to a cross-origin parent that blocks us — silently drop.
    }
  }

  window.pmLab = {
    /**
     * Record an experiment result. Pass at least one of `summary` or `data`.
     * The shell stores the latest N runs per widget and shows them in آزمایشگاه.
     */
    recordResult: function (resultLike) {
      var r = resultLike || {};
      post({
        pmEvent: 'experiment-result',
        summary: typeof r.summary === 'string' ? r.summary : undefined,
        data:    (r.data && typeof r.data === 'object') ? r.data : {},
      });
    },

    /**
     * Notify the shell that a screen/scene changed so the iframe-autosize
     * script (on the site) can re-measure. The site already debounces; the
     * mobile shell currently ignores this — harmless either way.
     */
    notifyScreenChange: function () {
      post({ pmEvent: 'screen-change' });
    },

    /** True when this widget is being rendered inside an iframe parent. */
    isEmbedded: function () {
      try { return window.parent && window.parent !== window; }
      catch (_) { return false; }
    },
  };
})();
