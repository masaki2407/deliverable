<!-- body内だけを表示しています。 -->
<body>
    <h1 class="title">編集画面</h1>
    <div class="content">
        <form action="/posts/{{ $post->id }}" method="POST">
            @csrf
            @method('PUT')
             <div class='content__title'>
                <h2>タイトル</h2>
                <input type="text" name='post[category_id]' list="example">
                <datalist id="example">
                    <option value="1">"出席"</option>
                    <option value="2">"欠席"</option>
                    <option value="3">"遅刻"</option>
                    <option value="4">"公欠"</option>
                </datalist>
            </div>
            <input type="date" name='post[created_at]'>
            <input type="submit" value="保存">
        </form>
    </div>
</body>