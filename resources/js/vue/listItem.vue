<template>
    <div class="item">
        <input
            type="checkbox"
            @change="updateCheck()"
            v-model="item.completed"
        />

        <span :class="[item.completed ? 'completed' : '', 'item-text']">{{ item.name }}</span>

        <button @click="removeItem()" class="trashcan">
            <font-awesome-icon icon="trash" />
        </button>
    </div>
</template>

<script>
export default {
    props: ["item"],
    methods: {
        updateCheck() {
            axios.put("api/item/" + this.item.id, {
                // getting the whole item
                item: this.item
            })
            .then(response => {
                if (response.status === 200) {
                    // telling the parent component that this item has changed
                    this.$emit("itemchanged")
                }
            })
            .catch(error => {
                console.log(error);
            })
        },
        removeItem() {
            axios.delete("api/item/" + this.item.id)
            .then(response => {
                if (response.status === 200) {
                    this.$emit("itemchanged");
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
    .completed {
        color: #999999;
        text-decoration: line-through;
    }

    .item {
        display: flex;

        align-items: center;
        justify-content: center;
    }

    .item-text {
        margin-left: 20px;
        width: 100%;
    }

    .trashcan {
        background: #e6e6e6;
        border: none;
        color: #ff0000;
        outline: none;
    }
</style>
