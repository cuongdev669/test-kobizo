<script setup lang="ts">
import NavBar from "../components/NavBar.vue";
</script>

<template>
  <div>
    <NavBar />
    <div class="content">
      <router-view />
    </div>
  </div>
</template>

<style scoped>
.content {
  padding: 20px;
}
</style>
