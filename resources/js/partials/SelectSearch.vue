<template>
    <div :class="invalidclass">
        <multiselect
            :value="value" :options="options"
            :searchable="true" :close-on-select="true"
            :show-labels="false"
            :allowEmpty="true"
            :placeholder="placeholder"
            :loading="isLoading"
            @search-change="asyncFind"
            :label="label"
            selectLabel="Klik Untuk Pilih"
            selectedLabel="Selected"
            @select="selectedItem"
        >
        <template slot="singleLabel" slot-scope="{ option }">
            <strong>{{ option.text_menu }}</strong>
            <span class="multiselect__clear_selected" @mousedown.prevent.stop="clearSelected"><i class="fa-solid fa-xmark"></i></span>
        </template>
        </multiselect>
    </div>
</template>
<script>
export default {
    props: [
        'value', 'placeholder', 'label', 'url', 'invalidclass'
    ],
    data() {
        return {
            options: [],
            isLoading: false,
        }
    },
    methods: {
        asyncFind(val){
            this.isLoading = true;
            this.$axios.defaults.headers.common['Authorization'] = `Bearer ${this.$store.state.AUTH.token}`;
            this.$axios.get(this.url, {params:{q: val}})
				.then(response => {
                    this.options = response.data;
				})
				.catch(error => {
                    alert('ada kesalahan check console')
					console.log(error)
				})
                .finally(() => this.isLoading = false );
        },
        selectedItem(item){
            this.$emit('select', item);
        },
        clearSelected(){
            this.$emit('clear');
        }
    },
}
</script>
<style>
.multiselect__clear_selected {
    position:absolute;
    right:0;
    font-size:20px;
}
.multiselect__clear_selected:hover {
    cursor: pointer;
    color: red;
}

.is-invalid .multiselect__tags {
    border: 1px solid #ff0000 !important;
}

</style>
