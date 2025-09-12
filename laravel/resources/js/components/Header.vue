<template>
    <header class="app-header">
        <div class="header-content">
            <img :src="DocumentImage" alt="Document Icon" class="header-icon"/>
            <h1 class="header-title">メモアプリ</h1>
            <h2>aaa</h2>
        </div>
    </header>
</template>

<script setup>
import DocumentImage from '../../Documentsvg.png';
</script>
<style scoped>
.app-header {
    display: flex; /* 要素を横並びにする */
    justify-content: center; /* ★ここを追加・変更★ 横方向の中央揃え */
    align-items: center; /* 垂直方向の中央揃え */
    padding: 30px 20px; /* 上下左右のパディング */
    background-color: white; /* ヘッダーの背景色 */
    color: orangered; /* テキストの色 */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* 軽い影で立体感を出す */

}
.header-content {
    display: flex; /* アイコンとタイトルを再度Flexboxで横並びにする */
    align-items: center; /* 垂直方向の中央揃え */
    /* 必要であれば、ここに最大幅などを設定できます */
}

.header-icon {
    width: 30px; /* アイコンの幅 */
    height: 30px; /* アイコンの高さ */
    margin-right: 15px; /* アイコンとタイトルの間の余白 */
    /* PNG画像の場合、必要であればfilterで色を調整することもできますが、
       元画像の色を活かすのが一般的です。 */
    /* filter: invert(1) grayscale(1) brightness(2); */
}

.header-title {
    font-size: 1.5rem; /* タイトルの文字サイズ */
    margin: 0; /* h1タグのデフォルトマージンをリセット */
    font-weight: extrabold; /* タイトルの太さ */
}
</style>
