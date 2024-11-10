// For async request to server I have used Jquery ajax.
// Self invoking fnction that tracks user website

// If JQuery is found then run the visitor function.
if (typeof window.jQuery != 'undefined') {
  (function ($) {
    let siteUrl = window.location.href;
    let userAgent = navigator.userAgent;

    //getting website name for cookie name
    let webname = siteUrl;
    webname = webname.split('/');
    let visitor_cookie = webname[3];

    //Ajax request to visitor api if cookie is not set
    if (!getCookie(visitor_cookie)) {
      $.ajax({
        url: 'http://localhost:8888/tracker_stats/stats/visitor_tracker', // url to visitor api
        type: 'POST',
        data: { siteUrl: siteUrl, userAgent: userAgent },
        success: function (res) {
          // console.log(res);
          let response = JSON.parse(res);

          //on success seeting a cookie to prevent ajax call till one hour
          setCookie(visitor_cookie, new Date());
          console.log(response.message);
          console.log('Visitor cookie added.');
        },
        error: function (xhr, status, error) {
          console.log(error);
        },
      });
    } else {
      console.log('Visitor already added.');
    }

    function setCookie(cookieName, cookieValue) {
      const d = new Date();
      d.setTime(d.getTime() + 3600000); // cookie expire 1 hour
      // d.setTime(d.getTime() + 60000); // temp 1 minute for testing
      let expires = 'expires=' + d.toUTCString();
      document.cookie =
        cookieName + '=' + cookieValue + ';' + expires + ';path=/';
    }

    function getCookie(cookieName) {
      let name = cookieName + '=';
      let decodedCookie = decodeURIComponent(document.cookie);
      let ca = decodedCookie.split(';');
      for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
          c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
          return c.substring(name.length, c.length);
        }
      }
      return false;
    }
  })(jQuery);
} else {
  // JQuery not found.
  alert('JQuery not found. Please make sure Jquery library is loaded.');
}
