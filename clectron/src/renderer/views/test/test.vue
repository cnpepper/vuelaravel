<template>
    <div>
        <el-button @click="handleClick">点击</el-button>    
    </div>    
</template>

<script>
import {asTest} from '@/api/test'
export default {
    methods:{
        handleClick(){
            asTest().then(
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

