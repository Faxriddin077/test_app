<template>
    <div class="wrapper">
        <div class="navbar">
            <div class="btns">
                <button> <i class="fa-solid fa-chevron-left"></i> Мои закупки</button>
                <button @dblclick="reloadPage">Новая закупка</button>
            </div>

        </div>
        <div class="form">
            <div class="form_start">
                <div class="form_text">
                    <h3>Новая закупка</h3>
                </div>
                <div class="form_content">
                    <div class="form_content-start">
                        <div class="form_content-text">
                            <h3>Товарные позиции</h3>
                        </div>
                        <div class="form_content-info">
                            <div v-for="(item, index) in errors" class="error_box">
                                <h3>{{ item[0] }}</h3>
                                <a @click="clearError(index)"><i class="fa-solid fa-xmark"></i></a>
                            </div>
                            <div class="forn_content-info-text">
                                <h5>Наименнование продукта</h5>
                                <h5>Количество шт</h5>
                                <h5>Стоимость продукта</h5>
                            </div>
                            <div class="order-items">
                                <order-item v-for="(item, index) in orderItems" :key="item.id" :item="item" @remove-item="removeItem(index)" />
                            </div>

                            <div class="add_element">
                                <div class="element" @click="addItem">
                                    <span><i class="fa-solid fa-plus"></i> Добавить</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form_btns">
                    <button class="btn1">Отмена</button>
                    <button class="btn2" @click="sendOrder">Сохранить</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import OrderItem from './OrderItem.vue'

export default {
    components: {
        OrderItem
    },
    data() {
        return {
            orderItems: [
                { id: 1, name: '', quantity: '', price: ''}
            ],
            nextId: 2,
            errors: []
        };
    },
    methods: {
        addItem() {
            this.orderItems.push({ id: this.nextId++, name: '', quantity: '', price: '' });
        },
        removeItem(index) {
            if (this.orderItems.length > 1) {
                this.orderItems.splice(index, 1);
            }
        },
        sendOrder() {
            const orderData = {
                orders: this.orderItems
            };

            this.$store.dispatch('post', {url: '/api/orders/save', model: orderData})
                .then(res => {
                    if (res.status === 200 || res.status === 201) {
                        this.orderItems = [{}]
                        this.nextId = 2;
                        alert('Success');
                    } else {
                        this.errors = res.data.errors
                    }
                })
        },
        clearError(index) {
            delete this.errors[index];
        },
        reloadPage() {
            window.location.reload()
        }
    }
}
</script>


<style scoped>

</style>
