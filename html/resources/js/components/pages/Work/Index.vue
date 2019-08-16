<template>
    <div class="grid">
        <div class="row">
            <h2>仕事一覧</h2>
        </div>
        <div class="row flex-justify-between pr-4">
            <div v-for="work in works" style="width: 350px;">
                <div class="card">
                    <div class="card-header">
                        {{ work.title }}
                    </div>
                    <div class="card-content p-2">
                        <i class="mif-money"></i>
                        <span>{{ work.reward.toLocaleString() }}</span>
                        <br>
                        <i class="mif-calendar"></i>
                        <span>{{ work.entry_end_at.split(' ')[0] }}</span>
                    </div>
                    <div class="card-footer">
                        <router-link :to="`/works/${work.id}`" class="button secondary">詳細</router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="scss">

</style>

<script>
    export default {
        data() {
            return {
                works: []
            }
        },
        created() {
            axios.get('/api/v1/works').then(res => {
                this.works = res.data.data;
            });
        }
    }
</script>
