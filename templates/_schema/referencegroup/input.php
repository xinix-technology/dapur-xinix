<select name="{{ $self['name'] }}" data-value="{{ @$value }}">
    <option value="">&mdash; Select one  &mdash;</option>
    @foreach ($self->optionData() as $opt => $value)
			<optgroup label="{{ $opt }}" >
    	@foreach ($value as $key => $entry)
	        <option value="{{{ $self->optionValue($key, $entry) }}}"
	            {{{ $self->optionValue($key, $entry) === $value ? 'selected' : '' }}}>
	            {{ $self->optionLabel($key, $entry) }}
	        </option>
	    @endforeach
	    </optgroup>
    @endforeach
</select>