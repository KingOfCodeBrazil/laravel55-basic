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
                    
                    <th>Telefone</th>
                    <th>Operadora</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(phone, index) in list">

                    <td>
                    <input :form="form" :name="'phones[' + index + '][phone]'" type="text" class="form-control" v-model="phone.phone" required="required">

                    </td>
                    <td>
                    <select :form="form" :name="'phones[' + index + '][company]'" class="form-control" v-model="phone.company" required="required">
                        <option value="">---</option>
                        <option value="oi">Oi</option>
                        <option value="vivo">Vivo</option>
                        <option value="tim">Tim</option>
                        <option value="claro">Claro</option>
                        <option value="nextel">Nextel</option>
                    </select>

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
                    phone: '',
                    company: '',
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