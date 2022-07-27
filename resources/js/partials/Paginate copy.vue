<template>
    <div class="btn-group">
        <button
            v-for="(page, index) in data.links" :key="index"
            :disabled="page.url === null"
            @click="getPaginate(page.url)"
            type="button" class="btn" :class="page.active === true ? 'btn-primary' : 'btn-default'"
            v-html="page.label"
        />
    </div>
</template>
<script>
export default {
    props: [
        'data'
    ],
    methods: {
        getPaginate(url){
            if(url !== null){
                let number = url.split(this.data.path+'?page=');
                this.$emit('change', number[1])
            }
        }
    }
}
</script>
