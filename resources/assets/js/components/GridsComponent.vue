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
                    
                    <th>Descrição</th>
                    <th>Cód. Barras</th>
                    <th>Un. Medida</th>
                    <th>Tamanho</th>
                    <th>Cor</th>
                    <th>Preço</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(grid, index) in list">

                    <td>
                    <input :form="form" :name="'grids[' + index + '][description]'" type="text" class="form-control" v-model="grid.description" required="required">

                    </td>
                    <td>
                    <input :form="form" :name="'grids[' + index + '][barcode]'" type="text" class="form-control" v-model="grid.barcode" required="required">

                    </td>
                    <td>
                    <select :form="form" :name="'grids[' + index + '][measure]'" class="form-control" v-model="grid.measure" required="required">
                        <option value="">---</option>
                        <option value="unity">Unidade</option>
                        <option value="meters">Metro</option>
                    </select>

                    </td>
                    <td>
                    <input :form="form" :name="'grids[' + index + '][size]'" type="text" class="form-control" v-model="grid.size" required="required">

                    </td>
                    <td>
                    <input :form="form" :name="'grids[' + index + '][color]'" type="text" class="form-control" v-model="grid.color" required="required">

                    </td>
                    <td>
                    <input :form="form" :name="'grids[' + index + '][price]'" type="number" class="form-control" v-model="grid.price" required="required" step="0.1">

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
        ],

        data () {
            return {
                list: [],
            }
        },

        mounted () {
            this.list = JSON.parse(this.items);
        },

        methods: {
            addLine: function() {
                let lineData = {
                    description: '',
                    barcode: '',
                    measure: '',
                    size: '',
                    color: '',
                    price: '',
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