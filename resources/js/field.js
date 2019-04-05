Nova.booting((Vue, router, store) => {
    Vue.component('index-inline-select', require('./components/IndexField'))
    Vue.component('detail-inline-select', require('./components/DetailField'))
    Vue.component('form-inline-select', require('./components/FormField'))
})
