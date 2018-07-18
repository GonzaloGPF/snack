<template>
    <div>
        <info-block-item :label="$t('validation.attributes.name')"
                         :value="data.name"/>
        <info-block-item :label="$t('validation.attributes.email')"
                         :value="data.email"/>
    </div>
</template>
<script>
import InfoBlockItem from '../info/InfoBlockItem';

export default {
    components: {InfoBlockItem},

    props: ['data'],

    data(){
        return {

        }
    }
}
</script>