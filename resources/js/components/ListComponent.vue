<template>
    <div id="app">
        <table-component :data="fetchData">
            <table-column show="first_name" label="First name"></table-column>
            <table-column show="last_name" label="Last name"></table-column>
            <table-column label="Avatar" :sortable="false" :filterable="false">
                <template slot-scope="row">
                    <img :src="row.avatar" alt="" style="max-height: 100px;">
                </template>
            </table-column>
            <table-column label="Skills" :sortable="false" :filterable="false">
                <template slot-scope="row">
                    <tr>
                        <td>
                            <ul>
                                <li  v-for="feature in row.features">
                                    {{ feature.title }} - {{ feature.pivot.value }}
                                </li>
                            </ul>
                        </td>
                    </tr>
                </template>
            </table-column>
            <table-column label="Total projects" :sortable="false" :filterable="false">
                <template slot-scope="row">
                    <tr>
                        <td>
                           {{ row.projectsNumber }}
                        </td>
                    </tr>
                </template>
            </table-column>
            <table-column label="Avg skill mark" :sortable="false" :filterable="false">
                <template slot-scope="row">
                    <tr>
                        <td>
                            {{ row.averageSkill }}
                        </td>
                    </tr>
                </template>
            </table-column>
        </table-component>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        methods: {
            fetchData({ page, filter, sort }) {
                return new Promise(resolve=>{
                    axios.get(`employees/data?filter=${filter}&sort=${sort.order}&page=${page}`).then(response=>resolve({
                        data: response.data.data,
                        pagination: {
                            totalPages: response.data.totalPages,
                            currentPage: page,
                            count: response.data.count
                        },
                    }))
                });
            }
        }
    }
</script>
