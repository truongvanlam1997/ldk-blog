<div class="form-group {{ $classes ?? '' }}">
        <label class="form-control-label" for="input-{{ $name }}">
            {{ $label ?? '' }}
            @if(isset($isRequired) && $isRequired)
                <small class="text-danger">*</small>
            @endif
        </label>
        <select id="input-{{ $name }}" class="form-control form-control-alternative" 
            name="{{ $name }}" {{ isset($isRequired) && $isRequired ? 'required' : '' }}>
            @if(isset($placeholder))
                <option value="" {{ old($name, $default) == $placeholder ? 'selected' : '' }}>{{ $placeholder }}</option>
            @endif
            @if(isset($options))
                @foreach($options as $key => $value)
                    <option value="{{ $key }}" {{ old($name, $default) == $key ? 'selected' : '' }}>{{ $value }}</option>
                @endforeach
            @endif
        </select>    
        @error($name)
            <small class="form-text text-danger">{{ $message }}</small>
        @enderror                                        
    </div>