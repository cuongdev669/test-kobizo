<template>

  <div class="form-container">
    <h2>{{ isEditMode ? 'Update meta' : 'Add meta' }}</h2>
    <form @submit.prevent="saveMeta">
      <label for="key">Key:</label>
      <input v-model="meta.key" type="text" id="key" required />

      <label for="value">Value:</label>
      <input v-model="meta.value" type="text" id="value" required />

      <button type="submit">{{ isEditMode ? 'Update' : 'Add' }}</button>
    </form>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue';
import { useRoute, useRouter } from 'vue-router';
import metaService from '../services/metaService';
import type { Meta } from '../services/metaService';

const route = useRoute();
const router = useRouter();
const isEditMode = ref(false);
const meta = ref<Meta>({
  post_id: Number(route.params.postId),
  key: '',
  value: '',
});

onMounted(async () => {
  if (route.params.id) {
    isEditMode.value = true;
    const response = await metaService.getMeta(
        Number(route.params.id)
    );
    meta.value = response.data;
  }
});

const saveMeta = async () => {
  if (isEditMode.value) {
    await metaService.updateMeta(meta.value);
  } else {
    await metaService.createMeta(meta.value);
  }
  router.push(`/posts/${meta.value.post_id}/edit`);
};
</script>

<style scoped>
.form-container {
  max-width: 400px;
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
input {
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
</style>
