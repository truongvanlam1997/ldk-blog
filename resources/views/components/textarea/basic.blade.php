

<div class="form-group {{ $classes ?? '' }}">
    <label class="form-control-label" for="textarea-{{ $name }}">
        {{ $label ?? '' }}
        @if(isset($isRequired) && $isRequired)
            <small class="text-danger">*</small>
        @endif
    </label>
<textarea id="textarea-{{ $name }}" name="{{ $name }}"   {{ isset($isRequired) && $isRequired ? 'required' : '' }} rows="{{$row}}"  class="form-control form-control-alternative" placeholder="{{ $placeholder ?? '' }}" value="{{ old($name, $default) }}"></textarea></textarea>
    @error($name)
        <small class="form-text text-danger">{{ $message }}</small>
    @enderror                                        
</div>