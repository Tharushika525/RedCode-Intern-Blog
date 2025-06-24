<template>
  <footer class="bg-[#670D2F] text-white mt-12">
    <div class="max-w-7xl mx-auto px-6 py-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      <!-- Logo + Name -->
      <div>
        <h2 class="text-2xl font-bold mb-2">RedCode Blog</h2>
        <p class="text-sm text-white/80">Intern Insights Powered by RedCode.</p>
      </div>

      <!-- Navigation -->
      <div>
        <h3 class="text-lg font-semibold mb-2">Quick Links</h3>
        <ul class="space-y-1">
          <li><Link href="/" class="hover:underline text-sm">🏠 Home</Link></li>
          <li><Link href="/posts" class="hover:underline text-sm">📝 Posts</Link></li>
          <li><Link href="/posts/create" class="hover:underline text-sm">➕ Create Post</Link></li>
        </ul>
      </div>

      <!-- Social or Note -->
      <div>
        <h3 class="text-lg font-semibold mb-2">About</h3>
        <p class="text-sm text-white/80">
          RedCode Blog is a simple Laravel + Inertia + Vue app created for learning full-stack development with modern design.
        </p>
      </div>
    </div>

    <div class="bg-[#520A25] text-center py-4 text-sm text-white/70">
      © 2025 RedCode Blog. All rights reserved.
    </div>
  </footer>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
</script>
