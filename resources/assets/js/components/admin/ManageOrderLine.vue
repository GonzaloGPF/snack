<template>
    <div>
        <v-loader :loading="loading"/>

        <div class="md-layout md-gutter">
            <div class="md-layout-item">
                <md-button class="md-icon-button md-dense md-raised"
                           @click="$refs['table'].refresh()">
                    <v-icon icon="sync"/>
                </md-button>
            </div>

            <div class="md-layout-item">
                <order-line-editor v-if="orderLineId"
                                   :order-line-id="orderLineId"/>

                <md-button v-else
                           class="md-icon-button md-dense md-raised md-primary"
                           @click="onCreate">
                    <v-icon icon="plus"/>
                </md-button>
            </div>
        </div>




        <data-table ref="table"
                    :params="params"
                    :data-field="dataField"
                    :url="'order_lines?order_id=' + orderId"
                    detail-row="order-details"
                    class="mt-3"/>

    </div>
</template>
<script>
import Http from "../../objects/Http";
import OrderLineEditor from '../admin/editors/OrderLineEditor';
import DataTable from '../../components/tables/DataTable';
import DataTableMixin from '../../mixins/DataTableMixin';
import orderLineFields from '../../components/tables/dataFields/orderLineFields';

export default {
    components: {DataTable, OrderLineEditor},

    mixins: [DataTableMixin],

    props: ['orderId', 'userId'],

    data() {
        return {
            orderLineId: null,
            showModal: false,
            modalTitle: this.$t('labels.creation', {model: this.$t('models.order_line.order_line')}),
            form: {},
            orderLine: {},
            errors: {},
            params: {},
            with: ['user', 'products'],
            dataField: [],
            loading: false,
            isCreating: false,
            isEditing: false,
            showDialog: false,
        }
    },

    created() {
        this.params = {with: this.with};
        this.dataField = this.buildDataField('orderLineFields', orderLineFields, true);
        this.getOrderLineId();
    },

    methods: {
        getOrderLineId() {
            Http.get(`order_lines?order_id=${this.orderId}&user_id=${this.userId}`)
                .then(({data}) => {
                    if (data.data && data.data.length > 0) this.orderLineId = data.data[0].id
                })
        },

        onCreate() {
            this.orderLine = {};
            this.form = {};
            this.isCreating = true;
            this.isEditing = false;
            this.showModal = true;
        },

        onEdit(orderLine) {
            this.form = {};
            this.orderLine = orderLine;
            this.isCreating = false;
            this.isEditing = true;
            this.showModal = true;
        },

        onDelete(orderLine) {
            this.orderLine = orderLine;
            this.showDialog = true;
        },

        onSubmit() {
            if (this.isCreating) this.create();
            if (this.isEditing) this.update();
        },

        create() {
            this.$refs['form'].validate(invalid => {
                if (invalid) return;

                this.loading = true;
                Http.post(`order_lines`, this.form)
                    .then(this.onSuccess)
                    .catch(this.onError)
            });
        },

        update() {
            this.$refs['form'].validate(invalid => {
                if (invalid) return;

                this.loading = true;
                Http.put(`order_lines/${this.orderLine.id}`, this.form)
                    .then(this.onSuccess)
                    .catch(this.onError)
            });
        },

        delete() {
            this.loading = true;
            this.showDialog = false;

            Http.delete(`order_lines/${this.orderLine.id}`)
                .then(this.onSuccess)
                .catch(this.onError)
        },

        onSuccess() {
            this.loading = false;
            this.showModal = false;
            this.$refs['table'].refresh();
        },

        onError() {
            this.loading = false;
        }
    }
}
</script>