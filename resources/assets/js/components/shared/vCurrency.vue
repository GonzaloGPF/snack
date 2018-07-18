<template>
    <div>
        <span v-text="$n(displayValue, 'currency', currency)"/>
    </div>
</template>
<script>
import config from '../../config';

// Locales map from 'locale' in config/app.php
let locales = {
    'es': 'es-ES',
    'en': 'en-EN',
    'us': 'en-US'
};

export default {
    props: ['value'],

    data(){
        return {
            currency: this.getCurrency()
        }
    },

    computed: {
        displayValue() {
            if (isNaN(this.value) || this.isEmpty(this.value)) return 0;

            return this.value;
        },

        /**
         * Find a currency by the current locale of i18n plugin
         *
         * @returns {string}
         */
        getCurrency() {
            let currencyName = locales[this.$i18n.locale];
            return currencyName ? currencyName : 'en-US';
        },

        /**
         *
         * @returns {string}
         */
        getCurrencySymbol() {
            let currencyData = config.numberFormats[this.getCurrency()];
            return currencyData ? currencyData['currency']['symbol'] : '$';
        },
    }
}
</script>