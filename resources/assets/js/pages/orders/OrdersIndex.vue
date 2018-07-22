<template>
    <div class="container">
        <md-card v-for="order in orders"
                 :key="order.id"
                 class="m-3">
            <md-card-header>
                <v-date :value="order.order_date"/>
            </md-card-header>
            <md-card-content>
                order content
            </md-card-content>
        </md-card>
    </div>
</template>
<script>
import Http from "../../objects/Http";

export default {
    data(){
        return {
            loading: false,
            orders: []
        }
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