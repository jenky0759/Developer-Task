<script setup>
defineProps({
    headers: Array,
    rows: Array,
    actions: Array
});
</script>

<template>
<table>
    <thead>
    <tr>
        <th v-for="header in headers">
            {{header}}
        </th>
    </tr>
    </thead>
    <tbody>
        <tr v-for="(row, index) in rows" :class="index % 2 === 0 ? null : 'row-odd'">
            <td v-for="cell in row">
                {{cell}}
            </td>
            <td class="action-column" v-if="actions">
                <div v-for="(action, index) in actions">
                    <div>
                        <a href="javascript:void(0)" @click="$emit(action.name, row)">
                            {{action.label}}
                        </a>
                        <span v-if="index !== actions.length - 1"> |&nbsp;</span>
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
    background: rgba(0,0,0, 0.05);
}

.action-column {
    display: flex;
    justify-content: center;
}
</style>
