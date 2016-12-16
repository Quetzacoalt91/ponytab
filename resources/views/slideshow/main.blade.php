@extends('global')

@section('content')
    <script type="application/javascript" src="{{ asset('js/slideshow.js') }}"></script>
    <script src="//widget.time.is/fr.js"></script>
    <script>
        var slideShow = slideShow();
        slideShow.storePictures(["{!! implode($pictures, '", "') !!}"]);
        slideShow.start();
        
        time_is_widget.init({London_z716:{template:"TIME DATE", time_format:"hours:minutes", date_format:"dayname daynum/monthnum/year"}});
    </script>
    
    <div id="slideShowPanel">
        
    </div>
    <div id="clock">
        <a href="https://time.is/London" id="time_is_link" rel="nofollow"></a>
        <span class="clock" id="London_z716"></span>
    </div>
@endsection