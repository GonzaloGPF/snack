<template>
    <div class="container">
        <ul class="list-group">
            <li v-for="product in rowData.products"
                :key="product.id"
                class="list-group-item w-25">
                <span v-text="product.name"/>
                <v-currency :value="product.price" class="d-inline ml-5"/>
            </li>
        </ul>

    </div>
</template>
<script>
export default {
    props: ['rowData', 'rowIndex'],
    data(){
        return {

        }
    }
}
</script>