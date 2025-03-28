<template>
  <nav>
    <router-link to="/">Home</router-link>
    <router-link to="/posts">Post list</router-link>
    <router-link to="/posts/new">Add post</router-link>
  </nav>
</template>
<style>
nav {
  display: flex;
  gap: 15px;
  padding: 10px;
  background: #007bff;
  color: white;
}
nav a {
  color: white;
  text-decoration: none;
}
nav a:hover {
  text-decoration: underline;
}
</style>