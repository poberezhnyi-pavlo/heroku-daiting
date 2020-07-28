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
                v-html="showStatus(props.row.deleted_at)"
            ></span>
            <div slot="afterLimit" class="ml-auto p-2">
                <a href="/admin/users/create?type=woman" class="btn btn-success">
                    <i class="fas fa-female"></i> Add woman
                </a>
                <a href="/admin/users/create?type=man" class="btn btn-dark">
                    <i class="fas fa-male"></i> Add man
                </a>
                <a
                    href="/admin/users/create?type=admin"
                    class="btn btn-info"
                    v-if="isAdmin()"
                >
                    <i class="fas fa-plus-circle"></i> Add admin user
                </a>
            </div>
            <span slot="action" slot-scope="props">
                <a :href="'/admin/users/' + props.row.id"
                   class="text-primary"
                   data-toggle="tooltip"
                   data-placement="top"
                   title="View account"
                >
                    <i class="fas fa-eye"></i>
                </a>
                <a :href="'/admin/users/' + props.row.id + '/edit'"
                   class="text-success"
                   data-toggle="tooltip"
                   data-placement="top"
                   title="Edit account"
                >
                    <i class="fas fa-pencil-alt"></i>
                </a>
                <a
                    href="#"
                    :class="props.row.deleted_at ? 'text-success' : 'text-danger'"
                    data-toggle="tooltip"
                    data-placement="top"
                    :title="props.row.deleted_at ? 'Enable account' : 'Disable account'"
                    @click.prevent="setStatus(props.row.id, props.row.deleted_at)"
                >
                    <i :class="props.row.deleted_at ? 'far fa-check-circle' : 'fas fa-ban'"></i>
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
        props: {
            userType: String,
            currentUser: Object,
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
                    'role',
                    'user_type',
                    'action',
                ],
                options: {
                    theme: "bootstrap4",
                    template: "footerPagination",
                    headings: {
                        deleted_at: 'Status',
                    },
                    hiddenColumns: [
                        'user_type',
                    ],
                    filterByColumn: true,
                    filterable: [
                        'name',
                        'email',
                        'created_at',
                        'user_type'
                    ],
                    initFilters: {
                        'user_type': this.userType,
                    },
                    customFilters: [
                        'byUserType',
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
            showStatus(data) {
                let active = '<i class="far fa-check-circle text-success"></i>';
                let inactive = '<i class="fas fa-ban text-danger"></i>';

                return data ? inactive : active;
            },
            setStatus(id, data) {
                return axios.put(`/admin/users/updateJson/${id}`, {
                    deleted_at: data ? null : moment().format(),
                })
                    .then((response) => {
                        Vue.$toast.success('Profile updated successfully!')
                    })
                    .catch((error) => {
                        Vue.$toast.error('Something wrong.')
                    })
                    .then(() => {
                        this.$refs.table.refresh();
                    });
            },
            isAdmin() {
                return (this.currentUser.role === 'admin')
                    || (this.currentUser.role === 'superAdmin');
            },
        }
    }
</script>

<style>

</style>
