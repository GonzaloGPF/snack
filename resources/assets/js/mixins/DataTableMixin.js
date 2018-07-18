let translatedDataFields = {};

export default {
    methods: {
        /**
         * Builds up the complete data field needed by vue-table-2.
         * It translate titles if necessary and adds common fields
         *
         * @param {string} name
         * @param {array} dataField
         * @returns {*}
         */
        buildDataField(name, dataField) {
            if(! translatedDataFields[name]) {
                dataField = this.translateTitles(dataField);
                translatedDataFields[name] = true;
            }

            return this.addCommonFields(dataField);
        },

        /**
         * It translates all 'title' attributes of the give array, excepting '#' values.
         *
         * @param {array} array
         * @returns {*}
         */
        translateTitles(array) {
            return array.map((item) => {
                if (item.title !== '#') item.title = this.$t(`validation.attributes.${item.title}`);
                return item;
            });
        },

        /**
         * Adds __sequence and _slot:actions field to given data field.
         *
         * @param {array} dataField
         * @returns {array}
         */
        addCommonFields(dataField) {
            let tableFields = [{
                name: '__sequence',
                title: '#',
                titleClass: 'text-center',
                dataClass: 'text-center'
            }];

            tableFields = tableFields.concat(dataField);

            tableFields.push({
                name: '__slot:actions',
                title: this.$t('validation.attributes.actions'),
                titleClass: 'text-center',
                dataClass: 'text-center'
            });

            return tableFields;
        },

        /*
        getLabels(items) {
            let labels = items.map((element) => element.label || element.name);
            return labels.join(', ')
        },

        state(name){
            let translated = this.$t(`models.state.${name}`);
            switch (name){
                case 'waiting':
                    return `<span class="badge badge-secondary">${translated}</span>`;
                case 'in_progress':
                    return `<span class="badge badge-info">${translated}</span>`;
                case 'finished':
                    return `<span class="badge badge-primary">${translated}</span`;
                case 'delivered':
                    return `<span class="badge badge-success">${translated}</span>`;
            }
        },
        */
        boolean(value){
            let result = value ? '&#10003;' : this.$t('controls.no');
            return `<span class="ml-3">${result}</span>`;
        }

    }
}

