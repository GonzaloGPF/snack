<template>
    <div>
        <div class="mt-3">
            <data-table-filter :filter-fields="filters"
                               @filter-set="onFilterSet"
                               @filter-reset="onFilterReset"/>
        </div>

        <md-card class="mt-3">
            <md-card-header>
                <admin-header :title="$t('models.order.orders')"
                              :loading="loading"
                              :buttons="['create']"
                              @onCreate="onCreate"/>
            </md-card-header>

            <md-card-content>
                <data-table ref="table"
                            :params="params"
                            :buttons="['view', 'edit', 'delete']"
                            :data-field="dataField"
                            url="orders"
                            @onView="onView"
                            @onEdit="onEdit"
                            @onDelete="onDelete"/>
            </md-card-content>

        </md-card>

        <v-modal :show="showModal"
                 :title="modalTitle"
                 :loading="loading"
                 @close="showModal = false"
                 @submit="onSubmit">
            <validation-errors/>

            <order-form ref="form"
                        v-model="form"
                        :hideOpen="hideOpen"
                        :data="order"/>
        </v-modal>

        <v-dialog :active="showDialog"
                  :disabled="loading"
                  @onConfirm="this.delete"
                  @onCancel="showDialog = false"/>
    </div>
</template>
<script>
import DataTable from '../../components/tables/DataTable';
import DataTableFilter from '../../components/tables/DataTableFilter';
import AdminHeader from '../../components/admin/headers/AdminHeader';
import OrderForm from '../../components/forms/OrderForm';
import Http from "../../objects/Http";
import DataTableMixin from '../../mixins/DataTableMixin';
import orderFields from '../../components/tables/dataFields/orderFields';
import validations from '../../components/forms/validations/orderValidations';
import orderFilters from '../../components/tables/dataFilters/orderFilters';

export default {
    components: {AdminHeader, DataTable, DataTableFilter, OrderForm},

    mixins: [DataTableMixin],

    data() {
        return {
            showModal: false,
            modalTitle: this.$t('labels.creation', {model: this.$t('models.order.order')}),
            form: {},
            order: {},
            errors: {},
            params: {},
            with: [],
            dataField: [],
            loading: false,
            isCreating: false,
            isEditing: false,
            showDialog: false,
            validations: validations.admin,
            filters: orderFilters,
            hideOpen: true
        }
    },

    created() {
        this.params = {with: this.with};
        this.dataField = this.buildDataField('orderFields', orderFields);
    },

    methods: {
        onFilterSet(filters) {
            this.params = Object.assign({with: this.with}, filters);
        },

        onFilterReset() {
            this.params = {with: this.with}
        },

        onView(order) {
            this.$router.push({
                name: 'orders.show',
                params: {id: order.id}
            });
        },

        onCreate() {
            this.hideOpen = true;
            this.order = {};
            this.form = {};
            this.isCreating = true;
            this.isEditing = false;
            this.showModal = true;
        },

        onEdit(order) {
            this.hideOpen = false;
            this.form = {};
            this.order = order;
            this.isCreating = false;
            this.isEditing = true;
            this.showModal = true;
        },

        onDelete(order) {
            this.order = order;
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
                Http.post(`orders`, this.form)
                    .then(this.onSuccess)
                    .catch(this.onError)
            });
        },

        update() {
            this.$refs['form'].validate(invalid => {
                if (invalid) return;

                this.loading = true;
                Http.put(`orders/${this.order.id}`, this.form)
                    .then(this.onSuccess)
                    .catch(this.onError)
            });
        },

        delete() {
            this.loading = true;
            this.showDialog = false;

            Http.delete(`orders/${this.order.id}`)
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