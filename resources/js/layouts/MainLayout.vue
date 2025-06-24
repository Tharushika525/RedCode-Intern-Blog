<template>
  <div>
    <!-- Navbar -->
    <nav class="bg-white shadow border-b border-gray-200 sticky top-0 z-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
        <!-- Left: Logo / Title -->
        <Link href="/" class="text-[#670D2F] text-2xl font-bold tracking-wide">
          RedCode Blog
        </Link>

        <!-- Right: Navigation Links -->
        <div class="space-x-4 text-sm font-medium">
          <Link
            href="/posts"
            class="text-gray-700 hover:text-[#670D2F] transition"
          >
            Posts
          </Link>
          <Link
            href="/posts/create"
            class="bg-[#670D2F] hover:bg-[#520A25] text-white px-4 py-2 rounded shadow transition"
          >
            ➕ Create
          </Link>
        </div>
      </div>
    </nav>

    <!-- Page Content Area -->
    <main class="py-8 px-4 bg-gradient-to-b from-[#fff0f3] to-white min-h-screen">
      <slot />
    </main>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
</script>
