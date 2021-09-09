import { createI18n } from 'vue-i18n/index'
import en from '../../lang/en.json'

export const i18n = createI18n({
    locale: localStorage.getItem('locale') || 'ar',
    fallbackLocale: 'en',
    messages: {
        en
    },
})
