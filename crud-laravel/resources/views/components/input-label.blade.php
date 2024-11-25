<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    @props(['value'])

    <label {{ $attributes->merge(['class' => 'block font-medium text-sm text-white']) }}>
        {{ $value ?? $slot }}
        <span class="text-red-500">*</span>
    </label>
</body>
</html>
