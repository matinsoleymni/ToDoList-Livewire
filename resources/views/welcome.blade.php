<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ToDo App</title>
    @vite("./resources/css/app.css")
    <script src="https://unpkg.com/alpinejs" defer></script>
</head>
<body>
    <div class="container mx-auto">
        @livewire("todos")
    </div>
</body>
</html>