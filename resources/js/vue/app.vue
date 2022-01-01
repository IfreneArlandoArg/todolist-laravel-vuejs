<template>
    <div class="todo-list-container">
        <div class="heading">
            <h2 id="title">Todo List</h2>
            <add-item-form
                v-on:reloadlist="getList()"
            />
        </div>

        <!-- in a larger application, you would use state to do this -->
        <list-view
            :items="items"
            v-on:reloadlist="getList()"
        />

    </div>

</template>

<script>
import addItemForm from "./addItemForm.vue";
import listView from "./listView.vue";

export default {
    components: {
        addItemForm,
        listView
    },
    data: function() {
        return {
            items: []
        }
    },
    methods: {
        getList() {
            axios.get("api/items")
            .then( response => {
                this.items = response.data
                this.$emit("reloadlist");
            })
            .catch( error => {
                console.log(error);
            })
        }
    },
    created() {
        this.getList();
        console.log(this.items);
    }
}
</script>

<style scoped>
    #title {
        text-align: center;
    }

    .heading {
        background: #e6e6e6;
        padding: 10px;
    }

    .todo-list-container {
        margin: auto;
        width: 350px;
    }
</style>
