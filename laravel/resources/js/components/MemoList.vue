<template>
    <div class="memo-list-section">
        <div class="list-header">
            <h2 class="list-title">
                <span class="icon">📄</span> 保存されたメモ
            </h2>
            <span class="memo-count-chip">{{ memos.length }}件</span>
        </div>

        <div class="memo-list">
            <p v-if="memos.length === 0" class="empty-message">
                まだメモがありません。上のフォームから最初のメモを追加しましょう！
            </p>
            <div v-for="memo in memos" :key="memo.id" class="memo-item">
                <p class="memo-content">{{ memo.content }}</p>
                <span class="memo-date">{{ memo.created_at }}</span>
            </div>
        </div>
    </div>
</template>

<script setup>
// ★ 3. 親コンポーネントからデータを受け取るための定義
defineProps({
    memos: {
        type: Array, // 型は配列
        required: true, // このデータは必須
    },
});
</script>

<style scoped>
/* App.vueから持ってきたスタイルをそのまま貼り付け */
.memo-list-section {
    margin-top: 40px;
    max-width:800px;
    margin: 20px auto; /* 上下に20px、左右は自動で中央揃え */

}
.list-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}
.list-title {
    display: flex;
    align-items: center;
    font-size: 1.25rem;
    color: #333;
    margin: 0;
}
.list-title .icon {
    margin-right: 10px;
    font-size: 1.5rem;
}
.memo-count-chip {
    background-color: #edeae7;
    color: #888;
    padding: 4px 10px;
    border-radius: 12px;
    font-size: 0.85rem;
    font-weight: bold;
}
.memo-list {
    display: grid;
    gap: 15px;
}
.memo-item {
    background-color: white;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.memo-item:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 20px rgba(0,0,0,0.08);
}
.memo-content {
    margin: 0 0 15px 0;
    font-size: 1rem;
    color: #333;
    line-height: 1.6;
    white-space: pre-wrap;
    word-break: break-word;
}
.memo-date {
    font-size: 0.85rem;
    color: #999;
}
.empty-message {
    text-align: center;
    color: #888;
    padding: 20px;
}
</style>
