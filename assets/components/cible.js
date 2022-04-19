let cibles = new Vue({
    el: '#cibles',
    delimiters: ['${', '}$'],
    data: {
        cibles: [],
        newCibleLibelle: '',
        newCibleLatitude: '',
        newCibleLongitude: '',
    },
    methods: {
        addCible() {
            if (this.newCibleLibelle != '' && this.newCibleLatitude != '' && this.newCibleLongitude != '') {
                this.cibles.push({
                    completed: false,
                    libelle: this.newCibleLibelle,
                    longitude: this.newCibleLongitude,
                    latitude: this.newCibleLatitude
                })
                this.newCibleLibelle = '';
                this.newCibleLatitude = '';
                this.newCibleLongitude = '';
            } else {
                alert('Veuillez remplir tous les champs');
            }
            console.log(this.cibles);
        }
    }
})
