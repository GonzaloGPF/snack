<template>
    <div>
        <div class="mt-3">
            <data-table-filter :filter-fields="filters"
                               @filter-set="onFilterSet"
                               @filter-reset="onFilterReset"/>
        </div>

        <md-card class="mt-3">
            <md-card-header>
                <admin-header :title="$t('models.product.products')"
                              :loading="loading"
                              :buttons="['create']"
                              @onCreate="onCreate"/>
            </md-card-header>

            <md-card-content>
                <data-table ref="table"
                            :params="params"
                            :buttons="['view', 'edit', 'delete']"
                            :data-field="dataField"
                            url="products"
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

            <product-form ref="form"
                          v-model="form"
                          :data="product"/>
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
import ProductForm from '../../components/forms/ProductForm';
import Http from "../../objects/Http";
import DataTableMixin from '../../mixins/DataTableMixin';
import productFields from '../../components/tables/dataFields/productFields';
import validations from '../../components/forms/validations/productValidations';
import productFilters from '../../components/tables/dataFilters/productFilters';

export default {
    components: {AdminHeader, DataTable, DataTableFilter, ProductForm},

    mixins: [DataTableMixin],

    data() {
        return {
            showModal: false,
            modalTitle: this.$t('labels.creation', {model: this.$t('models.product.product')}),
            form: {},
            product: {},
            errors: {},
            params: {},
            with: [],
            dataField: [],
            loading: false,
            isCreating: false,
            isEditing: false,
            showDialog: false,
            validations: validations.admin,
            filters: productFilters
        }
    },

    created() {
        this.params = {with: this.with};
        this.dataField = this.buildDataField('productFields', productFields);
    },

    methods: {
        onFilterSet(filters) {
            this.params = Object.assign({with: this.with}, filters);
        },

        onFilterReset() {
            this.params = {with: this.with}
        },

        onView(product) {
            this.$router.push({
                name: 'products.show',
                params: {id: product.id}
            });
        },

        onCreate() {
            this.product = {};
            this.form = {};
            this.isCreating = true;
            this.isEditing = false;
            this.showModal = true;
        },

        onEdit(product) {
            this.form = {};
            this.product = product;
            this.isCreating = false;
            this.isEditing = true;
            this.showModal = true;
        },

        onDelete(product) {
            this.product = product;
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
                Http.post(`products`, this.form)
                    .then(this.onSuccess)
                    .catch(this.onError)
            });
        },

        update() {
            this.$refs['form'].validate(invalid => {
                if (invalid) return;

                this.loading = true;
                Http.put(`products/${this.product.id}`, this.form)
                    .then(this.onSuccess)
                    .catch(this.onError)
            });
        },

        delete() {
            this.loading = true;
            this.showDialog = false;

            Http.delete(`products/${this.product.id}`)
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