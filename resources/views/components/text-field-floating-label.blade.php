<div class="form-group has-float-label position-relative error-l-50">
    <span>{{$text}}</span>
    <input type="{{$type}}" class="form-control" id="{{$id}}" name="{{$name}}" value="{{$value}}" {{(empty($required)? 'not-required' : 'required')}}>
    @if(!empty($required))
        <div class="invalid-tooltip">The {{strtolower($text)}} field is required.</div>
    @endif
    @if(!empty($errors->first($name)))
        <div class="invalid-tooltip d-block">{{$errors->first($name)}}</div>
    @endif
</div>
