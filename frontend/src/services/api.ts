import axios from 'axios';

const username = "admin";
const password = "password123!@#";
const apiClient = axios.create({
  baseURL: 'http://localhost:8000/api',
  headers: {
    'Content-Type': 'application/json',
    Authorization: `Basic ${btoa(`${username}:${password}`)}`,
  },
});

export default apiClient;
