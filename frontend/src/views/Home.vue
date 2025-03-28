<script setup lang="ts">
import { useRouter } from "vue-router";

const router = useRouter();
const goToPosts = () => {
  router.push("/posts");
};
</script>

<template>
  <div class="home">
    <button @click="goToPosts">Go to Post List</button>
  </div>
</template>

<style scoped>
.home {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

button {
  padding: 10px 20px;
  font-size: 18px;
  cursor: pointer;
}
</style>
