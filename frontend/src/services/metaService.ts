import apiClient from './api';

export interface Meta {
  id?: number;
  post_id: number;
  key: string;
  value: string;
}

export default {
  getMetas() {
    return apiClient.get<Meta[]>(`/metas`);
  },
  getMeta(id: number) {
    return apiClient.get<Meta>(`/metas/${id}`);
  },
  createMeta(meta: Meta) {
    return apiClient.post(`/metas`, meta);
  },
  updateMeta(meta: Meta) {
    return apiClient.put(`/metas/${meta.id}`, meta);
  },
  deleteMeta(id: number) {
    return apiClient.delete(`/metas/${id}`);
  },
};
