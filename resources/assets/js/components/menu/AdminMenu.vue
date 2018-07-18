<template>
    <md-menu md-align-trigger>

        <md-button md-menu-trigger class="md-icon-button">
            <v-icon icon="cog"/>
        </md-button>

        <md-menu-content>
            <md-menu-item>
                <md-button @click="goTo({name: 'admin.users.index'})" v-text="$t('labels.users')"/>
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