<button type="{{$type}}" id="{{$id}}" name="{{$name}}" class="{{$class}}" data-toggle="tooltip" data-placement="{{$placement}}" title="" data-original-title="{{$msgToolTip}}">
    @if(!empty($icon))
        <i class="{{$icon}}"></i>
    @endif
    {{$text}}
</button>
