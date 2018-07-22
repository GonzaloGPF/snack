<template>
    <md-menu md-align-trigger md-size="auto">

        <md-button md-menu-trigger class="md-icon-button" :title="$t('labels.administration')">
            <v-icon icon="cog"/>
        </md-button>

        <md-menu-content>
            <md-menu-item>
                <md-button @click="$router.push({name: 'admin.users.index'})" v-text="$t('labels.users')"/>
            </md-menu-item>

            <md-menu-item>
                <md-button @click="$router.push({name: 'admin.products.index'})" v-text="$t('labels.products')"/>
            </md-menu-item>

            <md-menu-item>
                <md-button @click="$router.push({name: 'admin.orders.index'})" v-text="$t('labels.orders')"/>
            </md-menu-item>
        </md-menu-content>
    </md-menu>
</template>
<script>
export default {
    data(){
        return {

        }
    }
}
</script>