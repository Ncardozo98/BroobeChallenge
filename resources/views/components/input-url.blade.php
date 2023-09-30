@props(['id', 'name' => ''])

<div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon3">https://</span>
    </div>
    <input type="text" {{ $attributes->merge(['class' => 'form-control']) }} id="{{ $id }}" name={{ $name }} aria-describedby="basic-addon3">
</div>