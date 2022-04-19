let calendar = new Vue({
    el: '#calendar',
    delimiters: ['${', '}$'],
    date: new Date(),
    options: {
        format: 'DD/MM/YYYY',
        useCurrent: false
    },
    components: {
        datePicker
    }
})
