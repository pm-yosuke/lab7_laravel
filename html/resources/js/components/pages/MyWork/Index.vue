<template>
    <div class="grid">
        <div class="row">
            <h2>発注一覧</h2>
            <router-link to="/myworks/create" class="button info ml-auto mr-5">新規作成</router-link>
        </div>
        <div class="row pr-4">
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
                        <router-link :to="`/myworks/${work.id}`" class="button secondary">詳細</router-link>
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
            axios.get('/api/v1/myworks').then(res => {
                this.works = res.data.data;
            });
        }
    }
</script>
