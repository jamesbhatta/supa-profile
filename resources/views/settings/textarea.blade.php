<textarea name="{{ $name }}" class="form-control {{ invalid_class($name) }}" id="" cols="30" rows="10">{{ old($name, settings()->get($name)) }}</textarea>
