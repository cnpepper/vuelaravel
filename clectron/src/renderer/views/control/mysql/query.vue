<template>
    <div>
        <el-container>
            <el-header>
                <el-button size="mini" type="primary" @click="dialogVisible = true">新建SQL</el-button>
            </el-header>
            <el-main>
                <el-table :data="tableData" border style="width: 100%" @row-click="handleClick">
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
        <el-dialog title="新建SQL语句" :visible.sync="dialogVisible" width="60%">
            <span>
                <create-sql-form ref="createSqlForm" />
            </span>
            <span slot="footer" class="dialog-footer">
                <el-button @click="dialogVisible = false">取 消</el-button>
                <el-button type="primary" @click="handleSubmit">确定</el-button>
            </span>
        </el-dialog>

    </div>
</template>

<script>
    import {
        asQuerySql
    } from '@/api/mysql'

    import createSqlForm from './createSqlForm'
    export default {
        components: {
            createSqlForm
        },
        data() {
            return {
                user_id:this.$store.state.user.user_id,
                dialogVisible: false,
                tableData: []
            }
        },
        created() {
            this.getTableData()
        },
        methods: {
            handleClick(row, event, column) {
                //console.log(row);
                console.log(this.$store.state.user.user_id)
            },
            handleSubmit() {
                this.$refs.createSqlForm.submit()
                this.getTableData()
                this.dialogVisible = false
            },
            getTableData() {
                asQuerySql(this.user_id).then(response => {
                    this.tableData = response.data.result;
                })
            }

        }
    }
</script>

<style>

</style>