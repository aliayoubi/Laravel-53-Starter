(function ($) {
    $.fn.fastpage = function (settings) {
        var opts = $.extend({}, $.fn.fastpage.defaults, settings);
        var options = $.extend({}, opts, $(this).data());
        var outputElement = options.container || document.body;
        var pages = [];
        var timeDiff = 0;

        // preload data
        return this.each(function (el) {
            var $this = $(this);
            var url = this.href;

            timeDiff += 1000;

            // send ajax requests
            setTimeout(function () {
                $.ajax({
                    "type": "GET",
                    "url": url,
                    "cache": false,
                    "success": function (response) {
                        pages.push({"url": url, "data": response});
                    }
                });

            }, timeDiff);

            // override link click handler
            $this.on('click', function (e) {
                var url = $(this).get(0).href;
                var title = $(this).text();

                for (var i = 0; i < pages.length; i++) {
                    if (pages[i].url !== url) {
                        continue;
                    }

                    if (pages[i].data) {
                        outputElement.setAttribute("aria-busy", "true");

                        $(outputElement).html(pages[i].data);

                        history.pushState({href: pages[i].url}, title, pages[i].url);

                        outputElement.setAttribute("aria-busy", "false");

                        e.preventDefault();
                    }
                }
            });

        });

    }
})(jQuery);