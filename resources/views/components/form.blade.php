<form {{$attributes->merge(["method"=>"POST","id"=>"submitForm"])}} >
    @csrf
    <input type="hidden" name="id" id="id" value="">
    {{$slot}}
    <div class="col-md-12 col-sm-12 mb-3 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-danger">Reset</button>
    </div>
</form>