<script lang="ts">
import { defineComponent } from 'vue'
import TableHeaderColumn from "@/Components/Table/TableHeaderColumn.vue";
import TableRow from "@/Components/Table/TableRow.vue";

export default defineComponent({
    name: "MainTable",
    components: { TableRow, TableHeaderColumn },
    props: {
        headers: {
            type: Array,
            required: true
        },
        items: {
            type: Array,
            required: true
        }
    }
})
</script>

<template>
    <table class="text-left table-auto min-w-max">
        <thead>
        <tr>
            <template v-for="header in headers">
                <TableHeaderColumn :name="header.title"/>
            </template>
        </tr>
        </thead>
        <tbody>
        <template v-for="item in items">
            <TableRow :item="item" :headers="headers"/>
        </template>
        </tbody>
    </table>
</template>

<style scoped>

</style>
