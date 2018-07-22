export default [
    {
        name: 'name',
        title: 'name',
        sortField: 'name',
    },
    {
        name: 'description',
        title: 'description',
        sortField: 'description',
    },
    {
        name: 'price',
        title: 'price',
        sortField: 'price',
        callback: 'isCurrency'
    },
]