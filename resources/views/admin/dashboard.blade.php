<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ShopLite Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
{{--@include('layouts.admin_nav')--}}

<div class="flex h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-white p-4 shadow">
        <h1 class="text-2xl font-bold mb-4">ShopLite</h1>
        <nav>
            <a href="{{route('admin.dashboard')}}" class="block p-2 hover:bg-gray-100">Dashboard</a>
            <a href="{{route('products.index')}}" class="block p-2 hover:bg-gray-100">Products</a>
            <a href="{{route('categories.index')}}" class="block p-2 hover:bg-gray-100">Categories</a>
            <a href="{{route('orders.index')}}" class="block p-2 hover:bg-gray-100">Orders</a>
            <a href="{{route('admin.roles.index')}}" class="block p-2 hover:bg-gray-100">Admin & Roles</a>
            <form method="POST" action="{{route('admin.logout')}}" class="mt-4">
                @csrf
                <button class="text-red-500">Logout</button>
            </form>
        </nav>
    </aside>
    <!-- Main content -->
    <main class="flex-1 p-6">
        <h2 class="text-3xl font-semibold mb-6">Welcome, Admin</h2>
        <!-- Add dashboard cards here -->
    </main>
</div>
</body>
</html>
