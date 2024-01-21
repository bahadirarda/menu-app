<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $restaurant->name }} Restoranı</title>
</head>
<body id="app" class="bg-gray-100 text-gray-800">
    <div>
        </navbar>
        </div>
        <header class="bg-white shadow">
            <div class="container mx-auto p-6">
                <h1 class="text-xl font-semibold underline">{{ $restaurant->name }}</h1>
            </div>
        </header>
        <section class="container mx-auto p-6">
            <h2 class="text-2xl font-semibold mb-4">Menü</h2>
            <ul>
                @foreach($restaurant->menus as $menu)
                    <li class="mb-4">
                        <h3 class="text-lg font-semibold">{{ $menu->name }}</h3>
                        <ul class="pl-4 mt-2">
                            @foreach($menu->categories as $category)
                                <li class="list-disc">{{ $category->name }}</li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </section>
        <footer class="bg-white shadow mt-8">
            <div class="container mx-auto p-6">
                <p class="text-sm text-center">© {{ date('Y') }} {{ $restaurant->name }}. Tüm Hakları Saklıdır.</p>
            </div>
        </footer>
        </div> 

</body>
</html>
