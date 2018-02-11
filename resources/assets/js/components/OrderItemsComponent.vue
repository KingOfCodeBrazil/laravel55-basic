<style>
    .add-button {
        color: #3498db;
        cursor: pointer;
    }

    .remove-button {
        cursor: pointer;
        color: #e74c3c; 
        font-size: 25px; 
        font-weight: bold;
    }
</style>

<template>
    <div class="table-responsive">
        <table class="table table-bordered table-form">
            <thead>
                <tr>
                    <th>Grade de Produto</th>
                    
                    <th>Quantidade</th>
                    <th>Desconto</th>
                    <th>Acréscimos</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item, index) in list">
                    <td>
                        <select class="form-control" v-model="item.grid_id" :name="'items[' + index + '][grid_id]'">
                        <option value="">---</option>
                        <option v-for="grid in list_grids" v-bind:value="grid.id">
                            {{ grid.description }}
                        </option>
                        </select>
                    </td>

                    <td>
                    <input :form="form" :name="'items[' + index + '][quantity]'" type="number" class="form-control" v-model="item.quantity" required="required" step="0.1">

                    </td>
                    <td>
                    <input :form="form" :name="'items[' + index + '][discount]'" type="number" class="form-control" v-model="item.discount" required="required" step="0.1">

                    </td>
                    <td>
                    <input :form="form" :name="'items[' + index + '][rate]'" type="number" class="form-control" v-model="item.rate" required="required" step="0.1">

                    </td>
                    <td class="text-center">
                        <span @click="remove(index)" class="remove-button">&times;</span>
                    </td>    
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="100%">
                        <span @click="addLine" class="add-button">+ Add Item</span>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</template>

<script>
    export default {
        props: [
            'form', 
            'items',
            'grids',
        ],

        data () {
            return {
                list: [],
                list_grids: [],
            }
        },

        mounted () {
            this.list = JSON.parse(this.items);
            this.list_grids = JSON.parse(this.grids);
        },

        methods: {
            addLine: function() {
                let lineData = {
                    grid_id: '',
                    quantity: '',
                    discount: '',
                    rate: '',
                };

                this.list.push(lineData);
            },

            remove: function(index) {
                if(confirm('Are you sure to delete this item?'))
                    Vue.delete(this.list, index);
            }
        }
    }
</script>