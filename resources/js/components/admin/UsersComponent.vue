<template>
    <transition name="fade" mode="out-in">
        <v-server-table
            :url="url"
            :columns="columns"
            :options="options"
        >
            <span
                :class="props.row.deleted_at"
                slot="deleted_at"
                slot-scope="props"
                v-html="setStatus(props.row.deleted_at)"
            ></span>
            <span slot="action" slot-scope="props">
                <a href="#" :href="'/admin/users/'+props.row.id" class="text-primary">
                    <i class="fas fa-eye"></i>
                </a>
                <a :href="props.row.id" class="text-success">
                    <i class="fas fa-pencil-alt"></i>
                </a>
                <a :href="props.row.id" class="text-danger">
                    <i class="far fa-trash-alt"></i>
                </a>
            </span>
        </v-server-table>
    </transition>
</template>

<script>
    import {ServerTable, ClientTable, Event} from 'vue-tables-2';
    import moment from 'moment';

    export default {
        name: "UsersComponent",
        comments: {
            ClientTable,
            Event,
            ServerTable,
        },
        data: function() {
            return {
                url: '/admin/fetch-users',
                columns: [
                    'id',
                    'name',
                    'email',
                    'deleted_at',
                    'created_at',
                    'action',
                ],
                options: {
                    theme: "bootstrap4",
                    template: "footerPagination",
                    headings: {
                        deleted_at: 'Status',
                    },
                    filterByColumn: true,
                    filterable: [
                        'name',
                        'email',
                        'created_at',
                    ],
                    sortable: [
                        'id',
                        'name',
                        'email',
                        'created_at',
                        'deleted_at',
                    ],
                    pagination: {
                        chunk: 20,
                        edge: true,
                    },
                    sortIcon: {
                        is: 'fa-sort',
                        base: 'fa',
                        up: 'fa-sort-up',
                        down: 'fa-sort-down',
                    },
                    dateColumns:[
                        'created_at',
                    ],
                    datepickerOptions: {
                        showDropdowns: true,
                        autoUpdateInput: true,
                    },
                    templates: {
                        created_at(h, row) {
                            return moment(row.created_at).format('DD-MM-YYYY')
                        },
                    },
                    perPage: 25,
                    debounce: 1000,
                },
            }
        },
        methods: {
            setStatus(data) {
                let active = '<i class="far fa-check-circle text-success"></i>';
                let inactive = '<i class="fas fa-ban text-danger"></i>';

                return data ? inactive : active;
            },
        }
    }
</script>

<style>
    .fade-enter-active,
    .fade-leave-active {
        transition: opacity .4s
    }

    .fade-enter,
    .fade-leave-to {
        opacity: 0
    }
</style>
