@props(['disabled' => false])

<select {{ $disabled ? 'disabled' : '' }} {{ $attributes }}>
    {{ $slot }}
</select>
