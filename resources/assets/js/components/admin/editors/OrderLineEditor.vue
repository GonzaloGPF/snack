<template>
    <md-card>
        <md-card-header v-if="orderLine">
            <admin-header :buttons="buttons"
                          :title="$t('models.order_line.order_line')"
                          :loading="loading"
                          @onSave="onSubmit"
                          @onEdit="isEditing = true"
                          @onCancel="isEditing = false"/>
        </md-card-header>

        <md-card-content v-if="orderLine">
            <validation-errors/>

            <order-line-form v-if="isEditing"
                             ref="form"
                             v-model="form"
                             :data="orderLine"/>

            <order-line-info v-else :data="orderLine"/>
        </md-card-content>

    </md-card>

</template>
<script>
import Http from '../../../objects/Http';
import AdminHeader from '../../admin/headers/AdminHeader';
import OrderLineInfo from '../../../components/info/OrderLineInfo';
import OrderLineForm from '../../../components/forms/OrderLineForm';
import {mapGetters} from 'vuex';

export default {
    components: {AdminHeader, OrderLineInfo, OrderLineForm},

    props: ['orderLineId'],

    data() {
        return {
            url: `order_lines/${this.orderLineId}`,
            form: {},
            loading: false,
            isEditing: false,
            orderLine: null,
        }
    },

    computed: {
        buttons() {
            return this.isEditing ?
                ['save', 'cancel'] :
                ['edit']
        },

        ...mapGetters(['authUser'])
    },

    created() {
        this.getOrderLine();
    },

    methods: {
        getOrderLine() {
            this.loading = true;
            Http.get(this.url, {
                params: {with: ['order', 'products']}
            })
                .then(({data}) => {
                    this.orderLine = data.data;
                    this.loading = false;
                });
        },

        onSubmit() {
            this.$refs['form'].validate(valid => {
                if (!valid) return;

                this.update(this.form);
            })
        },

        update(attributes) {
            this.loading = true;
            Http.put(this.url, attributes)
                .then(this.onSuccess)
                .catch(this.onError)
        },

        // destroy() {
        //     this.confirmDelete(null, () => {
        //         this.loading = true;
        //         Http.delete(this.url)
        //             .then(this.onSuccessDestroy)
        //             .catch(this.onError);
        //     });
        // },

        onSuccessDestroy() {
            setTimeout(() => this.$router.push({name: 'home'}), 500);
        },

        onSuccess() {
            this.loading = false;
            this.isEditing = false;
            this.getOrderLine();
        },

        onError() {
            this.loading = false;
        },
    }
}
</script>