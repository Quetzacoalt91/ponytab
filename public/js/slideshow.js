var slideShow = function() {
    var pictures = [];
    
    var cleanUp = function() {
        var imgs = $("img.polaroid");
        if (imgs.length < 10) {
            return;
        }
        imgs.first().hide().html('');
    };
    
    return {
        storePictures: function(srcPictures) {
            pictures = srcPictures;
        },
        showOne: function() {
            if (0 !== $('.night').length) {
                return;
            }
            if (0 === pictures.length) {
                location.reload();
            }
            var url = pictures.shift();            
            var img = $("<img class='polaroid my-hidden' />").attr('src', url)
                .on('load', function() {
                    if (this.complete && typeof this.naturalWidth != "undefined" && this.naturalWidth > 0) {
                        $("#slideShowPanel").append(img);
                        
                       cleanUp();
                        setTimeout(function() {
                            img.removeClass('my-hidden');
                        }, 500);
                    }
                });
        },
        start: function() {
            setInterval('slideShow.showOne()', 10000);
        }
    };
};
