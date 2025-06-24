<template>
  <div class="min-h-screen bg-gradient-to-br from-[#fbecef] to-white py-12 px-4 flex justify-center items-start">

     <!-- Back Button (Top-Left) -->
      <div class="absolute top-6 left-6">
        <Link
          href="/posts"
          class="inline-flex items-center text-[#670D2F] hover:text-[#520A25] text-xl font-semibold transition"
        >
          <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
          </svg>
          Back to Posts
        </Link>
      </div>
      
    <div class="w-full max-w-2xl bg-white rounded-2xl shadow-xl p-8 border border-gray-200 relative">



      <!-- Title -->
      <h1 class="text-3xl font-bold text-[#670D2F] mb-6 text-center">✍️ Create New Post</h1>

      <form @submit.prevent="submit" enctype="multipart/form-data" class="space-y-6">

        <!-- Title Field -->
        <div>
          <label class="block text-gray-700 font-medium mb-1">Title</label>
          <input
            v-model="form.title"
            type="text"
            placeholder="Enter title"
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#670D2F]"
          />
          <div v-if="form.errors.title" class="text-red-500 text-sm mt-1">
            {{ form.errors.title }}
          </div>
        </div>

        <!-- Body Field -->
        <div>
          <label class="block text-gray-700 font-medium mb-1">Body</label>
          <textarea
            v-model="form.body"
            rows="6"
            placeholder="Write your blog post here..."
            class="w-full border border-gray-300 rounded-lg px-4 py-2 resize-none focus:outline-none focus:ring-2 focus:ring-[#670D2F]"
          />
          <div v-if="form.errors.body" class="text-red-500 text-sm mt-1">
            {{ form.errors.body }}
          </div>
        </div>

        <!-- Image Upload -->
        <div>
          <label class="block text-gray-700 font-medium mb-1">Cover Image</label>
          <input
            type="file"
            @change="handleFileChange"
            accept="image/*"
            class="block w-full text-sm text-gray-800 file:mr-4 file:py-2 file:px-4
                   file:rounded-full file:border-0
                   file:text-sm file:font-semibold
                   file:bg-[#670D2F]/10 file:text-[#670D2F]
                   hover:file:bg-[#670D2F]/20"
          />
          <div v-if="form.errors.image" class="text-red-500 text-sm mt-1">
            {{ form.errors.image }}
          </div>
        </div>

        <!-- Submit Button -->
        <div class="text-center">
          <button
            type="submit"
            class="bg-[#670D2F] hover:bg-[#520A25] text-white px-6 py-3 rounded-full font-medium shadow transition"
            :disabled="form.processing"
          >
            {{ form.processing ? 'Saving...' : '📤 Publish Post' }}
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup>
import { useForm, Link } from '@inertiajs/vue3'; // ✅ Link imported

const form = useForm({
  title: '',
  body: '',
  image: null,
});

function handleFileChange(event) {
  form.image = event.target.files[0];
}

function submit() {
  form.post('/posts', {
    forceFormData: true, // ✅ Required for file upload
  });
}
</script>
