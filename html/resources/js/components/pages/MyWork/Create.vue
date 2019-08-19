<template>
    <div>
        <h2>発注作成</h2>
        <hr>
        <form @submit.prevent="store">
            <div class="form-group">
                <label for="title">タイトル</label>
                <input type="text" v-model="title" id="title">
            </div>
            <div class="form-group">
                <label for="description">内容</label>
                <textarea v-model="description" id="description"></textarea>
            </div>
            <div class="form-group">
                <label for="reward">報酬</label>
                <input type="number" v-model="reward" id="reward" min="0">
            </div>
            <div class="form-group">
                <label for="entry-end-at">募集期限</label>
                <input v-model="entry_end_at" id="entry-end-at"
                       data-role="calendarpicker" data-locale="ja-JP" data-input-format="yyyy-mm-dd"
                       @change="changeEntryEndAt">
            </div>
            <div class="form-group">
                <button class="button primary">登録</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                title: '',
                description: '',
                reward: 0,
                entry_end_at: '2019-08-19'
            }
        },
        methods: {
            // METRO 4 のカレンダーを使うとv-modelで値が変わらないので独自で実装
            changeEntryEndAt(e) {
                this.entry_end_at = e.target.value;
            },
            store() {
                axios.post('/api/v1/myworks', {
                    title: this.title,
                    description: this.description,
                    reward: this.reward,
                    entry_end_at: this.entry_end_at
                }).then(res => {
                    this.$router.push({path: `/myworks/${res.data.data.id}?create=success`});
                }).catch(error => {
                    console.error(error);
                    Metro.notify.create('作成に失敗しました。', 'エラー', {cls: 'alert'});
                });
            }
        }
    };
</script>
