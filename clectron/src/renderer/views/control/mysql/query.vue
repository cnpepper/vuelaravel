<template>
    <el-container>
        <el-main>
            <el-table :data="tableData" border style="width: 100%">
                <el-table-column fixed prop="sentence" label="SQL语句" width="150">
                </el-table-column>
                <el-table-column prop="status" label="状态" width="150">
                </el-table-column>
                <el-table-column prop="creator" label="创建人" width="150">
                </el-table-column>
                <el-table-column prop="created" label="创建时间" width="150">
                </el-table-column>
                <el-table-column prop="check_user" label="审核人" width="150">
                </el-table-column>
                <el-table-column prop="check_time" label="审核时间" width="150">
                </el-table-column>
            </el-table>
        </el-main>
    </el-container>
</template>

<script>
import {asQuerySql} from '@/api/mysql'
    export default {
        created(){
            asQuerySql().then(response=>{
                this.tableData = response.data.result;
            })
        },
        methods: {
            handleClick(row) {
                console.log(row);
            }
        },

        data() {
            return {
                tableData: []
            }
        }
    }
</script>

<style>

</style>