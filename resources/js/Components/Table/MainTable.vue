<script lang="ts">
import { defineComponent } from 'vue'
import TableHeaderColumn from "@/Components/Table/TableHeaderColumn.vue";
import TableRow from "@/Components/Table/TableRow.vue";
import { mapState } from "vuex";

export default defineComponent({
    name: "MainTable",
    components: { TableRow, TableHeaderColumn },
    computed: {
        ...mapState("playerStore", ["trackSrc"]),
    },
    props: {
        headers: {
            type: Array,
            required: true
        },
        items: {
            type: Array,
            required: true
        }
    },
    emits: ['rowAction']
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
            <TableRow :item="{...item, isActive: item.path === trackSrc}"
                      :headers="headers"
                      @click="this.$emit('rowAction', item)"
            />
        </template>
        </tbody>
    </table>
</template>

<style scoped>

</style>
