<template>
    <el-row>
        <el-row>
            <el-col :span="6">创建权限</el-col>
            <el-col :span="6"><el-input v-model="create_name"></el-input></el-col>
            <el-col :span="6"><el-button @click="handleClick">创建</el-button></el-col>
        </el-row>
        <el-row>
            <el-col :span="6">添加权限</el-col>
            <el-col :span="6"><el-input v-model="user_id"></el-input></el-col>
            <el-col :span="6"><el-input v-model="add_name"></el-input></el-col>
            <el-col :span="6"><el-button @click="handleAddClick">添加</el-button></el-col>
        </el-row>
    </el-row>
</template>

<script>
import { asPermissionCreate,asPermissionGive } from '@/api/permission'
export default {
    data(){
        return {
            add_name:'',
            create_name:'',
            user_id:0
        }
    },
    methods:{
        handleClick(){
            console.log('添加了一个权限'+this.create_name)
            asPermissionCreate({
                name:this.create_name
            }).then(response=>{
                console.log(response)
            })
        },
        handleAddClick(){
            console.log('添加了一个权限'+this.user_id+this.add_name)
            asPermissionGive({
                user_id:this.user_id,
                name:this.add_name
            }).then(response=>{
                console.log(response)
            })
        },
    }
}
</script>

<style>

</style>
