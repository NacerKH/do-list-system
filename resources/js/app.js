import './bootstrap';

import { createApp } from 'vue';
import App from './TodoList.vue'
import TodoStore from './store/index.js'
const app = createApp(App)
app.use(TodoStore)
app.mount('#app')
