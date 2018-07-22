<template>
    <div class="container">
        <v-loader :loading="loading"/>

        <md-card v-for="order in orders"
                 :key="order.id"
                 class="m-3">
            <md-card-header>
                <v-date :value="order.order_date"/>
            </md-card-header>
            <md-card-content>
                <manage-order-line :order-id="order.id"
                                   :user-id="authUser.id"/>
            </md-card-content>
        </md-card>
    </div>
</template>
<script>
import Http from "../../objects/Http";
import ManageOrderLine from '../../components/admin/ManageOrderLine';
import {mapGetters} from 'vuex';

export default {
    components: {ManageOrderLine},

    data(){
        return {
            loading: false,
            orders: []
        }
    },

    computed: {
        ...mapGetters(['authUser'])
    },

    created(){
        this.getOrders();
    },

    methods: {
        getOrders() {
            this.loading = true;

            Http.get('orders')
                .then(({data}) => {
                    this.loading = false;
                    this.orders = data.data;
                })
        }
    }
}
</script>