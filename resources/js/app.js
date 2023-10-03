import './bootstrap';
import { createApp } from 'vue/dist/vue.esm-bundler.js'

import Contacts from './component/Contacts'

const app = createApp({})

app.component('contacts', Contacts)


app.mount("#app")