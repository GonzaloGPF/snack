<template>
    <form novalidate>

        <i-select v-model="form.products"
                  :selected="form.products ? form.products.map(item => item.id) : null"
                  :multiple="true"
                  name="products"
                  url="products"/>
    </form>
</template>
<script>
import iSelect from '../forms/inputs/iSelect';
import FormMixin from '../../mixins/FormMixin';
import validations from './validations/orderLineValidations';

export default {
    components: {iSelect},

    mixins: [FormMixin],

    props: ['data'],

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