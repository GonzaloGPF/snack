<template>
    <md-field :class="{'md-invalid': hasErrors()}">
        <label v-text="label"/>

        <md-datepicker v-model="date"
                       :name="name"
                       :placeholder="label"
                       :disabled="disabled"
                       @change="onChange"/>

        <validation-messages v-if="validator && validator.form"
                             :input-data="validator.form[name]"
                             :label="label"/>
    </md-field>
</template>
<script>
export default {
    props: ['name', 'value', 'validator', 'disabled'],

    data(){
        return {
            label: this.$t('validation.attributes.' + this.name),
            date: this.value,
            pickerOptions: {}
        }
    },

    created() {
        // if(this.options) {
        //     this.pickerOptions = this.parseOptions();
        // }
    },

    methods: {
        setValue(value) {
            this.date = value;
            this.onChange();
        },

        onChange() {
            this.$emit('input', this.date)
        },

        // parseOptions() {
        //     let pickerOptions = {};
        //
        //     if (this.options.minDate) {
        //         pickerOptions.disabledDate = this.minDate;
        //     }
        //
        //     return pickerOptions;
        // },
        //
        // minDate(time, date) {
        //     return (time) => time.getTime() > date;
        // }
    }
}
</script>