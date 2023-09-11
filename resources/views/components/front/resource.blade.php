@props(["type","src"])
<div>
    @switch($type)
        @case("audio")
        <audio src="{{$src}}"></audio>
        @break
        @case("video")
        <video controls  src="{{$src}}"/>
        @break
        @case("image")
        <img src="{{$src}}" alt="Image">
        @break
        @case("pdf")
        <a target="_blank" href="{{$src}}">{{$src}}</a>
        @break
        @default
            <span class="text-danger">Resource non prise en compte</span>
        @break
    @endswitch
</div>
