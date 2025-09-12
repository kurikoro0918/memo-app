<template>
    <div class="app-main-content">
        <div class="form-container">
            <div class="form-header">
               <PlusImage/>
                <h2 class="form-title">新しいメモ</h2>
            </div>

            <textarea
                ref="textareaRef"
                v-model="memoContent"
                @keydown.enter.prevent="handleEnter"
                placeholder="メモを入力してください... (Enterで保存)"
                rows="5"
                class="memo-input"

            ></textarea>

            <div class="form-actions">
                <button type="button" @click="submitMemo" class="save-button" :disabled="memoContent.trim() === ''">
                    <span class="plus-icon">+メモを保存</span>
                </button>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import PlusImage from './svgs/PlusSvg.vue';
const memoContent = ref('');
const textareaRef = ref(null);

// closeイベントは不要になったので削除
const emit = defineEmits(['save-memo']);

// onMounted と handleEnter のロジックは変更なし
onMounted(() => {
    if (textareaRef.value) {
        textareaRef.value.focus();
    }
});

const handleEnter = (event) => {
    if (event.shiftKey) {
        // Shift + Enter の場合は改行を挿入
        const start = event.target.selectionStart;
        const end = event.target.selectionEnd;
        memoContent.value = memoContent.value.substring(0, start) + '\n' + memoContent.value.substring(end);
        event.target.selectionStart = event.target.selectionEnd = start + 1;
    } else {
        // Enter の場合はメモを保存
        submitMemo();
    }
};

const submitMemo = () => {
    if (memoContent.value.trim() !== '') {
        emit('save-memo', {
            title: memoContent.value.substring(0, 30),
            content: memoContent.value,
        });
        memoContent.value = ''; // 保存後、入力欄をクリア
    }
};
</script>

<style scoped>
/* モーダル用の fixed ポジションや z-index を削除 */
.form-container {
    width: 80%;
    padding: 25px;
    margin-right:auto;
    margin-left: auto;
    background-color: white;
    border-radius: 12px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    //box-sizing: border-box; /* padding を含めて幅を計算 */
}
.app-main-content {
    /* フォームを中央に配置するための設定 */
    max-width: 800px; /* フォームの最大幅 */
    margin: 20px auto; /* 上下に20px、左右は自動で中央揃え */
    padding: 0 20px; /* 左右のパディング */
}
/* その他のスタイルは基本的に変更なし */
.form-header { display: flex; align-items: center; margin-bottom: 20px; color: #333; }
.plus-icon { font-size: 1.5rem; font-weight: bold; color: #f7a977; margin-right: 10px; line-height: 1; }
.form-title { font-size: 1.25rem; margin: 0; }
.memo-input { width: 100%; padding: 15px; border: 1px solid #e0e0e0; border-radius: 8px; font-size: 1rem; line-height: 1.5; box-sizing: border-box; resize: vertical; min-height: 120px;}
.memo-input:focus { outline: none; border-color: #f7a977; box-shadow: 0 0 0 2px rgba(247, 169, 119, 0.2); }
.form-actions { text-align: center; margin-top: 25px; }
.save-button { display: inline-flex; align-items: center; padding: 12px 25px; background: linear-gradient(to right, #ffb38f, #f7a977); color: white; border: none; border-radius: 8px; font-size: 1.1rem; font-weight: bold; cursor: pointer; box-shadow: 0 4px 10px rgba(247, 169, 119, 0.3); transition: all 0.2s ease; }
.save-button .plus-icon { font-size: 1.2rem; margin-right: 8px; color: white; width:400px; }
.save-button:hover { transform: translateY(-2px); box-shadow: 0 6px 15px rgba(247, 169, 119, 0.4); }
.save-button:disabled {
    background: linear-gradient(to right, #ffc8b4, #f9c0a3);
    box-shadow: none;
    cursor: not-allowed;
    transform: none;
}


</style>
