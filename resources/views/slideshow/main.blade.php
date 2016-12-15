@extends('global')

@section('content')
    <script type="application/javascript" src="{{ asset('js/slideshow.js') }}"></script>
    <script>
        var slideShow = slideShow();
        slideShow.storePictures(["{!! implode($pictures, '", "') !!}"]);
        slideShow.start();
    </script>
    
    <div id="slideShowPanel">
        
    </div>
@endsection