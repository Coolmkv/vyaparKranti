<div class="{{$attributes["div_class"]??"col-md-4 col-sm-12 mb-3"}} ">
    <label class="form-label" for="{{$attributes["id"]}}">{{ $attributes["title"] }} 
        @if(isset($attributes["required"]))<span class="required">*</span>@endif </label>
    <input {{$attributes->merge(["type"=>"text","class"=>"form-control"])}}>
</div>