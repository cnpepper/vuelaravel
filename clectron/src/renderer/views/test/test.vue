<template>
    <div>
        <el-button @click="handleClick">点击</el-button>    
    </div>    
</template>

<script>
import {axTestQuery} from '@/api/test'
export default {
    methods:{
        handleClick(){
            axTestQuery().then(
                response=>{
                    console.log(response)
                }
            )
        }
    }
}
</script>

<style>

</style>

