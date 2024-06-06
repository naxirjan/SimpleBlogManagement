<div class="custom-control custom-radio ml-2">
    <input type="radio" id="{{$id}}" name="{{$name}}" value="{{$value}}" class="custom-control-input" {{(empty($checked) ? '' : 'checked')}}>
    <label class="custom-control-label" for="{{$id}}">{{$text}}</label>
</div>
