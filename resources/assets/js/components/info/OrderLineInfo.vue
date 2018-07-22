<template>
    <info-block :title="$t('labels.general_data')">
        <div class="md-layout md-gutter">
            <info-block-item :label="$t('validation.attributes.order_date')"
                             :is-date="true"
                             :value="data.order.order_date"
                             class="md-layout-item"/>

            <info-block-item :label="$t('validation.attributes.total')"
                             :is-currency="true"
                             :value="data.total"
                             class="md-layout-item"/>

            <info-block-item :label="$t('validation.attributes.paid')"
                             :is-boolean="true"
                             :value="data.paid"
                             class="md-layout-item"/>
        </div>
    </info-block>
</template>
<script>
import InfoBlock from '../info/InfoBlock';
import InfoBlockItem from '../info/InfoBlockItem';

export default {
    components: {InfoBlock, InfoBlockItem},

    props: ['data']
}

</script>