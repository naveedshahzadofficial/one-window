require('./bootstrap')
import { createApp } from "vue"
import {store} from "./store/store"
import {router} from "./router/router"
import App from './App.vue'
import './plugins/sweetaler2'
import pagination from 'v-pagination-3'
import {i18n} from "./plugins/i18n"
import Select2 from 'vue3-select2-component';

import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'


const app = createApp(App);

app.use(store);
app.use(router);
app.use(i18n);
app.component('pagination', pagination);
app.component('Select2', Select2)
app.component('font-awesome-icon', FontAwesomeIcon)

app.mount('#app');

document.title = store.state.app_title
