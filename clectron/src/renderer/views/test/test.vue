<template>
    <div>
        <el-button @click="handleClick">点击</el-button>    
    </div>    
</template>

<script>
import {asTestQuery} from '@/api/test'
export default {
    methods:{
        handleClick(){
            asTestQuery().then(
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

