var slideShow = function() {
    var pictures = [];
    return {
        storePictures: function(srcPictures) {
            pictures = srcPictures;
        },
        showOne: function() {
            if (0 === pictures.length) {
                location.reload();
            }
            var url = pictures.shift();            
            var img = $("<img class='polaroid my-hidden' />").attr('src', url)
                .on('load', function() {
                    if (this.complete && typeof this.naturalWidth != "undefined" && this.naturalWidth > 0) {
                        $("#slideShowPanel").append(img);
                        setTimeout(function() {
                            img.removeClass('my-hidden');
                        }, 100);
                    }
                });
        },
        start: function() {
            setInterval('slideShow.showOne()', 5000);
            this.showOne();
        }
    };
};