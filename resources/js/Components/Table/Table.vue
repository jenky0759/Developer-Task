<script setup>
defineProps({
    rows: Array,
    columns: Array,
    action: {
        header: String,
        items: Array
    }
});
</script>

<template>
<table>
    <thead>
    <tr>
        <th v-for="column in columns">
            {{column.header}}
        </th>
        <th v-if="action">
            {{action.header}}
        </th>
    </tr>
    </thead>
    <tbody>
        <tr v-for="(row, index) in rows" :class="index % 2 === 0 ? null : 'row-odd'">
            <td v-for="column in columns">
                {{row[column.field]}}
            </td>
            <td class="action-column" v-if="action && action.items && action.items.length">
                <div v-for="(item, index) in action.items">
                    <div>
                        <a href="javascript:void(0)" @click="$emit(item.name, row)">
                            {{item.label}}
                        </a>
                        <span v-if="index !== action.items.length - 1"> |&nbsp;</span>
                    </div>
                </div>
            </td>
        </tr>
    </tbody>
</table>
</template>

<style scoped>
table {
    border: 1px solid black;
    border-radius: 8px;
    border-spacing: 0px;
    width: 100%;
}

th {
    background: darkgrey;
}

th:first-child {
    border-top-left-radius: 8px;
}

th:last-child {
    border-top-right-radius: 8px;
}

th, td {
    text-align: center;
    border: none;
    padding: 12px;
}

.row-odd td {
    background: #F2F2F2;
}

.action-column {
    display: flex;
    justify-content: center;
}

tbody tr:last-child td:first-child {
    border-bottom-left-radius: 8px;
}

tbody tr:last-child td:last-child {
    border-bottom-right-radius: 8px;
}
</style>
