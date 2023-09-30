@props(['value' => ''])

<button type="button" {{ $attributes->merge(['class' => 'btn btn-primary']) }}>{{ $value }}</button>