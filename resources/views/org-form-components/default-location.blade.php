@if(settings()->get($settingsKey) && !$organization->id)
@foreach ($data as $item)
@if(settings()->get($settingsKey) == $item->id)
<option value="{{ $item->id }}" selected>{{ $item->name }}</option>
@endif
@endforeach
@endif
