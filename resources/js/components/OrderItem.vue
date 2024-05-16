<template>
    <div class="form_content-info-input">
        <input type="text" v-model="item.name" placeholder="Наименование продукта" required>
        <input type="number" v-model="item.quantity" placeholder="Количество шт" required>
        <input type="number" v-model="item.price" placeholder="Стоимость продукта" required>
        <button class="delete" @click="removeItem"><i class="fa-solid fa-trash"></i></button>
    </div>
</template>

<script>
export default {
    name: "OrderItem",
    props: {
        item: {
            type: Object,
            required: true
        }
    },
    methods: {
        removeItem() {
            this.$emit('remove-item');
        }
    }
};
</script>

<style scoped>
/* Add your styles here */
</style>
