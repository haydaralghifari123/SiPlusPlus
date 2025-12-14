<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Load Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <title>{{ $title ?? 'Auth' }}</title>
</head>
<body class="min-h-screen bg-gray-100">

    @yield('content')

</body>
</html>
