<div>
    @if(empty($filename))
        <img src="{{ asset('images/noimg.png')}}">
    @else
        <img src="{{ asset('images/strage/shops' . $filename)}}">
    @endif
</div>
