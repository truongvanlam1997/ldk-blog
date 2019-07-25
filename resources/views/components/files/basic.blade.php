<div class="form-group {{ $classes ?? '' }}">
    <label class="form-control-label" for="file-{{ $name }}">
        {{ $label ?? '' }}
        @if(isset($isRequired) && $isRequired)
            <small class="text-danger">*</small>
        @endif
    </label>
    <input type="file" id="file-{{ $name }}" name="{{$name}}" class="form-control" >
        
    @error($name)
        <small class="form-text text-danger">{{ $message }}</small>
    @enderror                                        
</div>