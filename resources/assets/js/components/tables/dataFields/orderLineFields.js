export default [
    {
        name: 'user.name',
        title: 'user_id',
        sortField: 'user_id',
    },
    {
        name: 'total',
        title: 'total',
        sortField: 'total',
        callback: 'isCurrency'
    },
    {
        name: 'paid',
        title: 'paid',
        sortField: 'paid',
        callback: 'boolean'
    },
    // {
    //     name: 'products_count',
    //     title: 'products_count',
    //     sortField: 'products_count',
    // },
]