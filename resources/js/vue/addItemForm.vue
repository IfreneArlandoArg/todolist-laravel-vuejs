<template>
    <div class="add-item">
        <input type="text" v-model="item.name" />
        <font-awesome-icon
            icon="plus-square"
            @click="addItem()"
            :class="[ item.name ? 'active' : 'inactive', 'plus' ]"
        />


    </div>
</template>

<script>
export default {
    data: function() {
        return {
            item: {
                name: ""
            }
        }
    },
    methods: {
        addItem() {
            if ( this.item.name === "") {
                return;
            }

            axios.post("api/item/store", {
                item: this.item
            })
            .then(response => {
                // reset input
                if (response.status === 201) {
                    this.item.name = ""
                    this.$emit("reloadlist");
                }
            })
            .catch(error => {
                console.log(error);
            })
        }
    }
}
</script>

<style scoped>
    .add-item {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    input {
        background: #f7f7f7;
        border: 0;
        margin-right: 10px;
        outline: none;
        padding: 5px;
        width: 100%;
    }

    .active {
        color: #00ce25;
    }

    .inactive {
        color: #999999;
    }

    .plus {
        font-size: 20px;
    }
</style>
