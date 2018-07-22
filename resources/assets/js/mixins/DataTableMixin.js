let translatedDataFields = {};
let translatedFilterFields = {};

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

        getFilterFields(name, filterFields){
            if(! translatedFilterFields[name]) {
                this.translateTitles(filterFields);
                translatedFilterFields[name] = true;
            }

            return filterFields;
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

        boolean(value){
            let result = value ? '&#10003;' : this.$t('controls.no');
            return `<span class="ml-3">${result}</span>`;
        },

        openClose(value) {
            let className = value ? 'badge-success' : 'badge-danger';
            let state = value ? this.$t('labels.open') : this.$t('labels.closed');
            return `<span class="badge ${className}">${state}</span>`
        }

    }
}

