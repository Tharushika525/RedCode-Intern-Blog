<template>
  <div class="min-h-screen bg-gradient-to-b from-[#faedf0] to-white py-10 px-4">
    <div class="max-w-5xl mx-auto">

      <!-- Header -->
      <div class="flex justify-between items-center mb-10 px-2">
        <h1 class="text-3xl font-extrabold text-[#670D2F] tracking-wide">📸 RedCode Feed</h1>
        <Link
          href="/posts/create"
          class="bg-[#670D2F] hover:bg-[#520A25] text-white font-medium px-6 py-2 rounded-full shadow-md transition"
        >
          ➕ New Post
        </Link>
      </div>

      <!-- Flash Message -->
      <div
        v-if="$page.props.flash?.success"
        class="bg-green-50 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded mb-6 shadow"
      >
        {{ $page.props.flash.success }}
      </div>

      <!-- Posts Feed -->
      <div class="flex flex-col gap-8">
        <div
          v-for="post in posts"
          :key="post.id"
          class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden transition hover:shadow-xl"
        >
          <!-- Post Image -->
          <img
            v-if="post.image"
            :src="`/storage/${post.image}`"
            alt="Post Image"
            class="w-full h-72 object-cover"
          />

          <!-- Post Content -->
          <div class="p-6">
            <h2 class="text-xl font-semibold text-[#670D2F] mb-2">
              {{ post.title }}
            </h2>
            <p class="text-gray-600 text-sm line-clamp-3 mb-4">
              {{ post.body }}
            </p>

            <!-- Action Buttons -->
            <div class="flex justify-between text-sm">
              <Link
                :href="`/posts/${post.id}/edit`"
                class="text-[#670D2F] hover:underline font-medium"
              >
                ✏️ Edit
              </Link>
              <button
                @click="deletePost(post.id)"
                class="text-red-500 hover:underline font-medium"
              >
                🗑️ Delete
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- No Posts Message -->
      <div v-if="posts.length === 0" class="text-gray-500 mt-16 text-center text-lg">
        😢 No posts yet. Be the first to share something awesome!
      </div>
    </div>
  </div>
</template>

<script setup>
import MainLayout from '@/layouts/MainLayout.vue';
defineOptions({ layout: MainLayout });

import { Link, router } from '@inertiajs/vue3';
defineProps({ posts: Array });

function deletePost(id) {
  if (confirm("Are you sure?")) {
    router.delete(`/posts/${id}`);
  }
}
</script>

<style scoped>
.line-clamp-3 {
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
</style>
