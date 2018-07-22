<template>
    <form novalidate>
        <div class="md-layout md-gutter">
            <div class="md-layout-item">
                <i-text v-model="form.name"
                        :validator="$v"
                        name="name"/>
            </div>
            <div class="md-layout-item">
                <i-text v-model="form.price"
                        :min="0"
                        :step="0.1"
                        :validator="$v"
                        type="number"
                        name="price"/>
            </div>
        </div>

        <i-text-area v-model="form.description"
                     :validator="$v"
                     name="description"/>


    </form>
</template>
<script>
import iText from '../forms/inputs/iText';
import iTextArea from '../forms/inputs/iTextArea';
import FormMixin from '../../mixins/FormMixin';
import validations from './validations/productValidations';

export default {
    components: {iText, iTextArea},

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