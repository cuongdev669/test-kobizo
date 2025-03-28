<template>
  <div class="form-container">
    <h2>{{ isEditMode ? 'Update post' : 'Add post' }}</h2>
    <form @submit.prevent="savePost">
      <label for="title">Title:</label>
      <input v-model="post.title" type="text" id="title" required />

      <label for="content">Content:</label>
      <textarea v-model="post.content" id="content" rows="5" required></textarea>

      <label for="status">Status:</label>
      <select v-model="post.status" id="status">
        <option value="1">Show</option>
        <option value="9">Hide</option>
      </select>

      <button type="submit">{{ isEditMode ? 'Update' : 'Add' }}</button>
    </form>

    <template v-if="isEditMode">
      <h2>Meta list</h2>
      <p class="tag" v-for="meta in post.metas">
        <router-link :to="`/posts/${post.id}/meta/${meta.id}/edit`">
          #{{meta.value}}
        </router-link>
      </p>
      <router-link :to="`/posts/${post.id}/meta/new`">
        Add meta
      </router-link>
    </template>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted, watch } from 'vue';
import { useRoute, useRouter } from 'vue-router';
import postService from '../services/postService';
import type { Post } from '../services/postService';

const route = useRoute();
const router = useRouter();
const isEditMode = ref(false);
const post = ref<Post>({
  title: '',
  content: '',
  status: 1,
});

function getDefaultPost(): Post {
  return {
    title: '',
    content: '',
    status: 1,
  };
}

onMounted(loadPost);
watch(() => route.path, loadPost);

async function loadPost() {
  if (route.params.id) {
    isEditMode.value = true;
    const response = await postService.getPost(Number(route.params.id));
    post.value = response.data;
  } else {
    isEditMode.value = false;
    post.value = getDefaultPost(); // Reset form khi tạo mới
  }
}

const savePost = async () => {
  if (isEditMode.value) {
    await postService.updatePost(post.value);
  } else {
    await postService.createPost(post.value);
  }
  router.push('/posts');
};
</script>

<style scoped>
.form-container {
  max-width: 500px;
  margin: 20px auto;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  background: #f9f9f9;
}

h2 {
  text-align: center;
}

label {
  display: block;
  margin-top: 10px;
}

input,
textarea,
select {
  width: 100%;
  padding: 8px;
  margin-top: 5px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

button {
  display: block;
  width: 100%;
  margin-top: 15px;
  padding: 10px;
  background: #007bff;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

button:hover {
  background: #0056b3;
}
.btn-add-meta {
  background: #0091be;
  color: #fff;
}
</style>