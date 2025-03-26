import { createRouter, createWebHistory } from "vue-router";
import Home from "../views/Home.vue";
import Layout from "../layouts/DefaultLayout.vue";
import PostForm from "../views/PostForm.vue";
import MetaForm from "../views/MetaForm.vue";
import PostList from "../views/PostList.vue";

const routes = [
  { path: "/", component: Home },
  {
    path: "/",
    component: Layout,
    children: [
      { path: '/posts', component: PostList },
      { path: '/posts/new', component: PostForm },
      { path: '/posts/:id/edit', component: PostForm },
      { path: '/posts/:postId/meta/new', component: MetaForm },
      { path: '/posts/:postId/meta/:id/edit', component: MetaForm },
    ],
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;