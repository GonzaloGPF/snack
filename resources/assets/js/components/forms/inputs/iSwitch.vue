<template>
    <md-field :class="{'md-invalid': hasErrors()}">
        <label v-text="label"/>
        <md-switch v-model="val"
                   :name="name"
                   :value="val"
                   :disabled="disabled"
                   @change="onInput"/>
    </md-field>
</template>
<script>
export default {
    props: ['name', 'value', 'disabled'],

    data(){
        return {
            val: this.value || false,
        }
    },

    methods: {
        reset() {
            this.val = false;
        },

        onInput() {
            this.$emit('input', this.val);
        }
    }
}
</script>