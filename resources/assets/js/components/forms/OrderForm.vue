<template>
    <form novalidate>

        <i-date v-model="form.order_date"
                :validator="$v"
                name="order_date"/>

        <i-switch v-if="! hideOpen"
                  v-model="form.open"
                  name="open"/>
    </form>
</template>
<script>
import iDate from '../forms/inputs/iDate';
import iSwitch from '../forms/inputs/iSwitch';
import FormMixin from '../../mixins/FormMixin';
import validations from './validations/orderValidations';

export default {
    components: {iDate, iSwitch},

    mixins: [FormMixin],

    props: ['data', 'hideOpen'],

    data() {
        return {
            form: Object.assign({}, this.data),
        }
    },

    validations: { form: validations },

    methods: {
        validate(callback){
            this.$v.$touch();

            callback(this.$v.$invalid);
        },
    }
}
</script>