<template>
  <div class="post-list">
    <h2>Post list</h2>
    <router-link to="/posts/new" class="add-button">Add post</router-link>
    <ul>
      <li v-for="post in posts" :key="post.id">
        <strong>{{ post.title }}</strong>
        <p>{{ post.content }}</p>
        <p><em>Status: {{ post.status == 1 ? 'Show' : 'Hide' }}</em></p>
        <p class="tag" v-for="meta in post.metas">
          <router-link :to="`/posts/${post.id}/meta/${meta.id}/edit`">
            #{{meta.value}}
          </router-link>
        </p>
        <p>
          <router-link :to="`/posts/${post.id}/edit`">Update</router-link>
        </p>
        <router-link :to="`/posts/${post.id}/meta/new`">Add meta</router-link>
        <button @click="deletePost(post.id!)">Delete</button>
      </li>
    </ul>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue';
import postService from '../services/postService';
import type { Post } from '../services/postService';

const posts = ref<Post[]>([]);

onMounted(async () => {
  const response = await postService.getPosts();
  posts.value = response.data;
});

const deletePost = async (id: number) => {
  await postService.deletePost(id);
  posts.value = posts.value.filter(post => post.id !== id);
};
</script>

<style scoped>
.post-list {
  max-width: 600px;
  margin: 20px auto;
}
h2 {
  text-align: center;
}
.add-button {
  display: block;
  margin-bottom: 10px;
  padding: 8px;
  background: green;
  color: white;
  text-align: center;
  border-radius: 5px;
  text-decoration: none;
}
ul {
  list-style: none;
  padding: 0;
}
li {
  border: 1px solid #ccc;
  margin: 10px 0;
  padding: 10px;
  border-radius: 5px;
  background: #f9f9f9;
}
button {
  margin-left: 10px;
  padding: 5px;
  background: red;
  color: white;
  border: none;
  cursor: pointer;
}
.tag {
  color: #0091be;
  text-decoration: underline;
}
</style>
