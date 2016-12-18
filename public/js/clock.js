var clock = function() {
    return {
        check: function() {
            var d = new Date();
            var n = d.getHours();
            var overlay = $("#clockOverlay");

            if ((n < 10 || n >= 22) && !overlay.hasClass('night')) {
                console.log('Switching to night mode');
                $("#clockOverlay").addClass('night');
            } else if (overlay.hasClass('night')) {
                console.log('Switching to day mode');
                $("#clockOverlay").removeClass('night');
            }
        },
        start: function() {
            setInterval('clock().check()', 10000);
        }
    };
};
