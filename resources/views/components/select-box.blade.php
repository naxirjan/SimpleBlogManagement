<div class="form-group has-float-label position-relative error-l-50">
    <select class="form-control {{$type}}" id="{{$id}}" name="{{$name}}" {{($type == "select2-multiple" ? 'multiple': '')}}  {{(empty($required) ? 'not-required' : 'required')}} data-width="100%">
        @foreach($fieldItems as $key => $fieldItem)
            @switch($recordType)
                @case("Schools")
                    <option value="{{$fieldItem->Key}}">{{$fieldItem->Value}}</option>
                @break
                @case("Countries")
                    <option value="{{$key}}">{{$fieldItem}}</option>
                @break
            @endswitch
        @endforeach
    </select>
    <span>{{$text}}</span>
</div>


