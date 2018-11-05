<template>
    <div>
        <el-container>
            <el-header>
                <el-button size="mini" type="primary" @click="dialogVisible = true">新建SQL</el-button>
                <el-button size="mini" type="primary" icon="el-icon-refresh" @click="handleRefreshClick"></el-button>
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
                    <el-table-column fixed="right" label="操作" width="100">
                    <template slot-scope="scope">
                        <el-button @click="handleEditorClick(scope.row)" type="text" size="small">重建</el-button>
                    </template>
                </el-table-column>
                </el-table>
            </el-main>
        </el-container>
        <el-dialog title="新建SQL语句" :visible.sync="dialogVisible" width="60%">
            <span>
                <create-sql-form :data="editData" ref="createSqlForm" />
            </span>
            <span slot="footer" class="dialog-footer">
                <el-button @click="dialogVisible = false">取 消</el-button>
                <el-button type="primary" @click="handleSubmit">确定</el-button>
            </span>
        </el-dialog>
    </div>
</template>

<script>
    import {asQuerySql} from '@/api/workspace/sql'
    import createSqlForm from './createSqlForm'
    export default {
        components: {
            createSqlForm
        },
        data() {
            return {
                editData:'',
                dialogVisible: false,
                tableData: []
            }
        },
        created() {
            this.getTableData()
        },
        methods: {
            handleClick(row, event, column) {
            },
            handleSubmit() {
                this.$refs.createSqlForm.submit()
                this.getTableData()
                this.dialogVisible = false
            },
            getTableData() {
                asQuerySql({}).then(response => {
                    this.tableData = response.data.result;
                })
            },handleEditorClick(row){
                console.log(row)
                this.editData = row.sentence
                this.dialogVisible = true
            },
            handleRefreshClick(){
                this.getTableData()
            }

        }
    }
</script>

<style>

</style>