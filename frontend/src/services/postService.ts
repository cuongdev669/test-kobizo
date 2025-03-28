import apiClient from './api';
import type { Meta } from './metaService';

export interface Post {
  id?: number;
  title: string;
  content: string;
  status: number;
  created_at?: string;
  updated_at?: string;
  metas?: [
      Meta
  ]
}

export default {
  getPosts() {
    return apiClient.get<{ data: Post[]}>('/posts');
  },
  getPost(id: number) {
    return apiClient.get<Post>(`/posts/${id}`);
  },
  createPost(post: Post) {
    return apiClient.post('/posts', post);
  },
  updatePost(post: Post) {
    return apiClient.put(`/posts/${post.id}`, post);
  },
  deletePost(id: number) {
    return apiClient.delete(`/posts/${id}`);
  },
};
