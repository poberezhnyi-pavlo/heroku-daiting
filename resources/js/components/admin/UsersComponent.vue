<template>
    <transition name="fade" mode="out-in">
        <v-server-table
            ref="table"
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
                <a :href="'/admin/users/'+props.row.id"
                   class="text-primary"
                   data-toggle="tooltip"
                   data-placement="top"
                   title="View account"
                >
                    <i class="fas fa-eye"></i>
                </a>
                <a :href="props.row.id"
                   class="text-success"
                   data-toggle="tooltip"
                   data-placement="top"
                   title="Edit account"
                >
                    <i class="fas fa-pencil-alt"></i>
                </a>
                <a
                    href="#"
                    class="text-danger"
                    data-toggle="tooltip"
                    data-placement="top"
                    title="Disable account"
                    @click.prevent="disable(props.row.id)"
                >
                    <i class="fas fa-ban"></i>
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
                url: '/admin/users/fetch',
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
                    resizableColumns: true,
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
            disable(id) {
                return axios.delete(`/admin/users/deactivate/${id}`)
                    .then((response) => {
                        Vue.$toast.success('Profile deactivated successfully!')
                    })
                    .catch((error) => {
                        Vue.$toast.error('Something wrong.')
                    })
                    .then(() => {
                        this.$refs.table.refresh();
                    });
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
