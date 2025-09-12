<template>
    <div id="app">
        <Header />

        <main>
            <MemoForm @save-memo="handleNewMemo" />
            <MemoList :memos="memos"/>
        </main>
    </div>
</template>

<script setup>
import { ref ,onMounted} from 'vue';
import Header from '@/components/Header.vue';
import MemoForm from '@/components/MemoForm.vue';
import axios from 'axios';
import MemoList from "@/components/MemoList.vue"; // ★ 1. Axiosをインポート
const memos = ref([]);
// 新しいメモが作成されたときに実行される関数

const fetchMemos = async () => {
    try {
        const response = await axios.get('/api/memos');
        memos.value = response.data.data; // 取得したデータでmemos配列を上書き
    } catch (error) {
        console.error('メモの取得に失敗しました:', error);
        alert('メモの読み込みに失敗しました。');
    }
};

// ★ 4. コンポーネントがマウントされたら、fetchMemos関数を実行
onMounted(() => {
    fetchMemos();
});
const handleNewMemo = async(newMemo) => {
    try {
        // ★ 3. APIを呼び出してデータを送信
        const response = await axios.post('/api/memos', newMemo);
        memos.value.unshift(response.data.data);

    }
    catch (error) {
        // ★ 5. エラーが発生した場合の処理
        console.error('API呼び出し中にエラーが発生しました:', error);
        alert('メモの保存に失敗しました。');
    }
};
</script>

<style>
/* グローバルスタイル */
html, body, #app {
    margin: 0;
    padding: 0;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;
    background-color: #f8f9fa;
}


</style>
